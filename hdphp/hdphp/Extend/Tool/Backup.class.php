<?php
// .-----------------------------------------------------------------------------------
// |  Software: [HDPHP framework]
// |   Version: 2013.01
// |      Site: http://www.hdphp.com
// |-----------------------------------------------------------------------------------
// |    Author: 向军 <houdunwangxj@gmail.com>
// | Copyright (c) 2012-2013, http://houdunwang.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------
// |   License: http://www.apache.org/licenses/LICENSE-2.0
// '-----------------------------------------------------------------------------------

/**
 * 数据库备份类
 * @package     tools_class
 * @author      后盾向军 <houdunwangxj@gmail.com>
 */
final class Backup
{
    //备份选项
    private static $config;
    //备份目录
    private static $dir;

    //构造函数
    public function __construct()
    {

    }

    //还原数据
    static public function recovery($option)
    {
        if (!Q('status')) F('backupDir', null);
        if (!F('backupDir')) {
            F('backupDir', $option['dir']);
        }
        $dir = F('backupDir');
        //检测目录是否存在
        if (!is_dir($dir)) {
            F('backupDir', null);
            halt('备份目录不存在');
        }
        self::$config = require($dir . '/config.php');
        //文件id
        $fid = Q("get.bid", null, "intval");
        //表前缀
        $db = M();
        $db_prefix = C("DB_PREFIX");
        //首次执行还原操作
        if (is_null($fid)) {
            //还原表结构
            if (is_file($dir . '/structure.php')) {
                require $dir . '/structure.php';
            }
            $url = U(ACTION, array('bid' => 1, 'status' => 'run'));
            return array('status' => 'run', 'message' => '还原数据初始化...', 'url' => $url);
        }
        foreach (glob($dir . '/*') as $d) {
            if (preg_match("@_bk_{$fid}.php$@i", $d)) {
                require $d;
                $_GET['bid'] += 1;
                $url = U(ACTION, array('bid' => $_GET['bid'], 'status' => 'run'));
                return array('status' => 'run', 'message' => "分卷{$fid}还原完毕!", 'url' => $url);
            }
        }
        return array('status' => 'success', 'message' => "所有分卷还原完毕...");
    }

    //备份数据表
    static public function backup($config = array())
    {
        //首次执行时没有备份状态
        if (!Q("get.status")) F('backupDir', null);
        //获取备份目录
        $backupDir = F('backupDir');
        //2+备份时
        if (Q("get.status")) {
            if(!is_dir($backupDir) && is_writable($backupDir)){
                halt('备份目录'.$backupDir.'不存在或不可写');
            }
            self::$dir = $backupDir;
            self::$config = require(self::$dir . '/config.php');
            return self::backup_data();
        } else {
            //首次执行时创建配置文件
            self::$dir = isset($config['dir']) ? $config['dir'] : C('DB_BACKUP');
            //缓存备份目录
            F('backupDir', self::$dir);
            //创建备份配置文件与目录
            if (!self::init($config)) {
                halt('备份初始化失败');
            }
            //是否备份表结构
            $structure = isset($config['structure']) ? $config['structure'] : TRUE;
            if ($structure) {
                self::backup_structure();
            }
            //记录备份目录
            $url = U(ACTION, array('status' => 'run'));
            return array('status' => 'run', 'message' => '正在进行备份初始化...', 'url' => $url);
        }
    }

    //备份表结构
    static private function backup_structure()
    {
        $sql = "<?php if(!defined('HDPHP_PATH'))EXIT;\n";
        $db = M();
        $db_prefix = C("DB_PREFIX");
        foreach (self::$config as $table => $config) {
            $tmp = $db->query("SHOW CREATE TABLE $table");
            $create_table_sql = str_ireplace("`" . $db_prefix, "`\".\$db_prefix.\"", $tmp[0]['Create Table']);
            $sql .= "\$db->exe(\"DROP TABLE IF EXISTS `\".\$db_prefix.\"" . str_replace($db_prefix, '', $table) . "`\");\n";
            $sql .= "\$db->exe(\"{$create_table_sql}\");\n";
        }
        file_put_contents(self::$dir . '/structure.php', $sql);
    }

    //执行备份
    static private function backup_data()
    {
        foreach (self::$config as $table => $config) {
            //已经备份过的表忽略
            if ($config['success']){
                continue;
            }
            //当前备份行
            $current_row = $config['current_row'];
            C('DB_DATABASE', $config['database']);
            $db = M($table, TRUE);
            //字段缓存
            $fieldCache = F(C('DB_DATABASE') . '.' . $table, false, APP_TABLE_PATH);
            $backup_str = "";
            do {
                $data = $db->limit("$current_row,20")->select();
                $current_row += 20;
                self::$config[$table]['current_row'] = $current_row;
                //表中无数据
                if (!$data) {
                    self::$config[$table]['success'] = true;
                    return self::write_backup_data($table, $backup_str, $current_row);
                } else {
                    foreach ($data as $d) {
                        $field = $value = array();
                        foreach ($d as $f => $v) {
                            $field[] = $f;
                            $v = addslashes($v);
                            $value[] = preg_match('@int@i', $fieldCache[$f]['type']) ? intval($v) : "'$v'";
                        }
                        //表名
                        $table_name = "\".\$db_prefix.\"" . str_ireplace(C("DB_PREFIX"), "", $table);
                        $backup_str .= "\$db->exe(\"REPLACE INTO $table_name (`" . implode("`,`", $field) . "`)
						VALUES(" . implode(",", array_values($value)) . ")\");\n";
                    }
                }
                //检测本次备份是否超出分卷大小
                if (strlen($backup_str) > self::$config[$table]['size']) {
                    return self::write_backup_data($table, $backup_str, $current_row);
                }
            } while (true);
        }
        F('backupDir', null);
        return array('status' => "success", 'message' => '完成所有数据备份...');
    }

    //写入备份数据
    static private function write_backup_data($table, $data, $current_row)
    {
        //当前备份分卷id
        $fid = Q("get.bid", 1, 'intval');
        file_put_contents(self::$dir . "/{$table}_bk_{$fid}.php", "<?php if(!defined('HDPHP_PATH'))EXIT;\n{$data}");
        return self::next_backup($table);
    }

    /**
     * 返回备份信息
     * @param string $table 当前备份的表
     * @return array
     */
    static private function next_backup($table)
    {
        self::update_config_file();
        //增加下一次分卷数
        $_GET['bid'] += 1;
        $url = U(ACTION, array('status' => 1, 'bid' => $_GET['bid']));
        return array('status' => 'run', 'message' => "分卷{$_GET['bid']}备份完成，继续备份{$table}表", 'url' => $url);
    }

    //初始化
    static private function init($config)
    {
        //创建备份目录
        is_dir(self::$dir) or Dir::create(self::$dir);
        //检测目录
        if (!is_dir(self::$dir)) {
            return false;
        }
        //所有表信息
        $tableInfo = M()->getAllTableInfo();
        self::$config = array();
        //没有设置表时，备份当前库所有表
        if (empty($config['table'])) {
            $config['table'] = array();
            if (empty($tableInfo['table'])) {
                return false;
            }
            foreach ($tableInfo['table'] as $t => $v) {
                $config['table'][] = $t;
            }
        }
        //分卷大小,单位kb
        if (!isset($config['size'])) {
            $config['size'] = 200;
        }
        //备份成功后的跳转url
        $config['url'] = isset($config['url']) ? $config['url'] : '';
        //数据库
        $config['database'] = isset($config['database']) ? $config['database'] : C('DB_DATABASE');
        foreach ($config['table'] as $table) {
            self::$config[$table] = array();
            //共有行数
            self::$config[$table]["row"] = $tableInfo['table'][$table]['rows'];
            //是否已经备份成功
            self::$config[$table]['success'] = false;
            //当前备份行
            self::$config[$table]['current_row'] = 0;
            self::$config[$table]['size'] = $config['size'] * 1000;
            self::$config[$table]['url'] = $config['url'];
            self::$config[$table]['step_time'] = isset($config['step_time']) ? $config['step_time'] * 1000 : 200;
            self::$config[$table]['database'] = $config['database'];
        }
        return self::update_config_file();
    }

    //修改配置文件
    static function update_config_file()
    {
        //写入配置文件
        $s = "<?php if(!defined('HDPHP_PATH'))exit;\nreturn " . var_export(self::$config, true) . ";\n?>";
        return file_put_contents(self::$dir . '/config.php', $s);
    }
}