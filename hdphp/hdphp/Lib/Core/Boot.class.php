<?php
//.-----------------------------------------------------------------------------------
// |  Software: [HDPHP framework]
// |   Version: 2013.05
// |      Site: http://www.hdphp.com
// |-----------------------------------------------------------------------------------
// |    Author: 向军 <houdunwangxj@gmail.com>
// | Copyright (c) 2012-2013, http://www.houdunwang.com.All Rights Reserved.
// |-----------------------------------------------------------------------------------
// |   License: http://www.apache.org/licenses/LICENSE-2.0
// '-----------------------------------------------------------------------------------
/**
 * 生成编译文件
 * @package hdphp
 * @supackage core
 * @author hdxj<houdunwangxj@gmail.com>
 */
final class Boot
{
    /**
     * 运行框架
     * 在单入口文件引入框架hdphp.php文件会自动执行run()方法，所以不用单独执行run方法
     * @access public
     * @return void
     */
    static public function run()
    {
        if (version_compare(PHP_VERSION, '5.4.0', '<')) {
            ini_set('magic_quotes_runtime', 0);
            define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc() ? TRUE : FALSE);
        } else {
            define('MAGIC_QUOTES_GPC', false);
        }
        $root = str_replace('\\','/',dirname($_SERVER['SCRIPT_FILENAME']));
        define('ROOT_PATH',             $root.'/'); //根目录
        define("DS",                    DIRECTORY_SEPARATOR); //目录分隔符
        define('IS_CGI',                substr(PHP_SAPI, 0, 3) == 'cgi' ? TRUE : FALSE);
        define('IS_WIN',                strstr(PHP_OS, 'WIN') ? TRUE : FALSE);
        define('IS_CLI',                PHP_SAPI == 'cli' ? TRUE : FALSE);
        define("HDPHP_DATA_PATH",       HDPHP_PATH . 'Data/'); //数据目录
        define("HDPHP_LIB_PATH",        HDPHP_PATH . 'Lib/'); //lib目录
        define("HDPHP_CONFIG_PATH",     HDPHP_PATH . 'Config/'); //配置目录
        define("HDPHP_CORE_PATH",       HDPHP_LIB_PATH . 'Core/'); //核心目录
        define("HDPHP_EXTEND_PATH",     HDPHP_PATH . 'Extend/'); //扩展目录
        define("HDPHP_ORG_PATH",        HDPHP_EXTEND_PATH . 'Org/'); //org目录
        define("HDPHP_TPL_PATH",        HDPHP_PATH . 'Lib/Tpl/'); //框架Tpl目录
        define("HDPHP_DRIVER_PATH",     HDPHP_LIB_PATH . 'Driver/'); //驱动目录
        define("HDPHP_FUNCTION_PATH",   HDPHP_LIB_PATH . 'Function/'); //函数目录
        define("HDPHP_LANGUAGE_PATH",   HDPHP_LIB_PATH . 'Language/'); //语言目录
        defined("STATIC_PATH")          or define("STATIC_PATH",'Static/'); //网站静态文件目录
        defined("APP_COMMON_PATH")      or define("APP_COMMON_PATH", APP_PATH. 'Common/'); //应用公共目录
        defined("APP_CONFIG_PATH")      or define("APP_CONFIG_PATH", APP_COMMON_PATH . 'Config/' ); //应用公共目录
        defined("APP_MODEL_PATH")       or define("APP_MODEL_PATH",  APP_COMMON_PATH . 'Model/' ); //应用公共目录
        defined("APP_CONTROLLER_PATH")  or define("APP_CONTROLLER_PATH",  APP_COMMON_PATH . 'Controller/'); //应用公共目录
        defined("APP_LANGUAGE_PATH")    or define("APP_LANGUAGE_PATH", APP_COMMON_PATH . 'Language/'); //应用语言包目录
        defined("APP_ADDON_PATH")       or define("APP_ADDON_PATH", APP_PATH . 'Addons/' ); //插件目录
        defined("APP_HOOK_PATH")        or define("APP_HOOK_PATH", APP_COMMON_PATH . 'Hook/' ); //应用钓子目录
        defined("APP_TAG_PATH")         or define("APP_TAG_PATH",  APP_COMMON_PATH . 'Tag/'); //应用标签目录
        defined("APP_LIB_PATH")         or define("APP_LIB_PATH", APP_COMMON_PATH . 'Lib/' ); //应用扩展包目录
        defined("APP_COMPILE_PATH")     or define("APP_COMPILE_PATH", TEMP_PATH . 'Compile/' ); //应用编译包目录
        defined("APP_CACHE_PATH")       or define("APP_CACHE_PATH", TEMP_PATH . 'Cache/' ); //应用缓存目录
        defined("APP_TABLE_PATH")       or define("APP_TABLE_PATH", TEMP_PATH . 'Table/' ); //表字段缓存
        defined("APP_LOG_PATH")         or define("APP_LOG_PATH", TEMP_PATH . 'Log/' ); //应用日志目录
        //加载核心文件
        self::loadCoreFile();
        //加载基本配置
        self::loadConfig();
        //编译核心文件
        self::compile();
        //应用初始化
        HDPHP::init();
        //创建应用目录
        self::mkDirs();
        //运行应用
        App::run();
    }

    /**
     * 加载核心文件
     * @access private
     * @return void
     */
    static private function loadCoreFile()
    {
        $files = array(
            HDPHP_CORE_PATH . 'HDPHP.class.php', //HDPHP顶级类
            HDPHP_CORE_PATH . 'Controller.class.php', //HDPHP顶级类
            HDPHP_CORE_PATH . 'HdException.class.php', //异常处理类
            HDPHP_CORE_PATH . 'App.class.php', //HDPHP顶级类
            HDPHP_CORE_PATH . 'Route.class.php', //URL处理类
            HDPHP_CORE_PATH . 'Hook.class.php', //钓子处理类
            HDPHP_CORE_PATH . 'Log.class.php', //公共函数
            HDPHP_FUNCTION_PATH . 'Functions.php', //应用函数
            HDPHP_CORE_PATH . 'Debug.class.php', //Debug处理类
        );
        foreach ($files as $v) {
            require($v);
        }
    }

    /**
     * 加载基本配置
     * @access private
     */
    static private function loadConfig()
    {
        //系统配置
        C(require(HDPHP_CONFIG_PATH . 'config.php'));
        //系统语言
        L(require(HDPHP_LANGUAGE_PATH . 'zh.php'));
        //应用别名导入
        alias_import(C('ALIAS'));
    }
    /**
     * 创建项目运行目录
     * @access private
     * @return void
     */
    static public function mkDirs()
    {
        if (is_dir(APP_COMMON_PATH)) return;
        //目录
        $dirs = array(
            APP_PATH,
            //临时目录
            TEMP_PATH,
            //应用组目录
            APP_COMMON_PATH,
            APP_CONFIG_PATH,
            APP_ADDON_PATH,
            APP_MODEL_PATH,
            APP_CONTROLLER_PATH,
            APP_LANGUAGE_PATH,
            APP_HOOK_PATH,
            APP_TAG_PATH,
            APP_LIB_PATH,
            APP_COMPILE_PATH,
            APP_CACHE_PATH,
            APP_TABLE_PATH,
            APP_LOG_PATH,
            //模块目录
            MODULE_CONTROLLER_PATH,
            MODULE_CONFIG_PATH,
            MODULE_LANGUAGE_PATH,
            MODULE_MODEL_PATH,
            MODULE_HOOK_PATH,
            MODULE_TAG_PATH,
            MODULE_LIB_PATH,
            MODULE_VIEW_PATH,
            //控制器目录
            CONTROLLER_VIEW_PATH,
            MODULE_PUBLIC_PATH,
            //公共目录
            STATIC_PATH
        );
        foreach ($dirs as $d) {
            if (!dir_create($d, 0755)):
                header("Content-type:text/html;charset=utf-8");
                exit("目录{$d}创建失败，请检查权限");
            endif;
        }
        //复制视图
        is_file(CONTROLLER_VIEW_PATH . "index.html")   or copy(HDPHP_PATH . 'Lib/Tpl/view.html', CONTROLLER_VIEW_PATH . "index.html");
        //复制公共模板文件
        is_file(MODULE_PUBLIC_PATH . "success.html")    or copy(HDPHP_PATH . 'Lib/Tpl/success.html', MODULE_PUBLIC_PATH . "success.html");
        is_file(MODULE_PUBLIC_PATH . "error.html")      or copy(HDPHP_PATH . 'Lib/Tpl/error.html', MODULE_PUBLIC_PATH . "error.html");
        //复制模块配置文件
        is_file(MODULE_CONFIG_PATH . "config.php")      or copy(HDPHP_PATH . 'Lib/Tpl/configModule.php', MODULE_CONFIG_PATH . "config.php");
        is_file(APP_CONFIG_PATH . "config.php")         or copy(HDPHP_PATH . 'Lib/Tpl/configApp.php', APP_CONFIG_PATH . "config.php");
        //创建测试控制器
        is_file(MODULE_CONTROLLER_PATH . 'IndexController.class.php') or file_put_contents(MODULE_CONTROLLER_PATH . 'IndexController.class.php', file_get_contents(HDPHP_PATH . 'Lib/Tpl/controller.php'));
        //创建安全文件
        self::safeFile();
        //批量创建模块
        if(defined('MODULE_LIST')){
            $module = explode(',',MODULE_LIST);
            if(!empty($module)){
                foreach($module as $m){
                    dir::create(APP_PATH.$m);
                    dir::copy(MODULE_PATH,APP_PATH.$m);
                }

            }
        }
    }

    /**
     * 创建安全文件
     * @access private
     * @return void
     */
    static private function safeFile()
    {
        if (defined("DIR_SAFE") && DIR_SAFE===false) return;
        $dirs = array(
            APP_PATH,
            //临时目录
            TEMP_PATH,
            //应用组目录
            APP_COMMON_PATH,
            APP_CONFIG_PATH,
            APP_ADDON_PATH,
            APP_MODEL_PATH,
            APP_CONTROLLER_PATH,
            APP_LANGUAGE_PATH,
            APP_HOOK_PATH,
            APP_TAG_PATH,
            APP_LIB_PATH,
            APP_COMPILE_PATH,
            APP_CACHE_PATH,
            APP_TABLE_PATH,
            APP_LOG_PATH,
            //模块目录
            MODULE_CONTROLLER_PATH,
            MODULE_CONFIG_PATH,
            MODULE_LANGUAGE_PATH,
            MODULE_MODEL_PATH,
            MODULE_HOOK_PATH,
            MODULE_TAG_PATH,
            MODULE_LIB_PATH,
            MODULE_VIEW_PATH,
            //控制器目录
            CONTROLLER_VIEW_PATH,
            MODULE_PUBLIC_PATH,
            //公共目录
            STATIC_PATH
        );
        $file = HDPHP_PATH . 'Lib/Tpl/index.html';
        foreach ($dirs as $d) {
            is_file($d . '/index.html') || copy($file, $d . '/index.html');
        }
    }

    /**
     * 编译核心文件
     * @access private
     */
    static private function compile()
    {
        if (DEBUG) {
            is_file(TEMP_FILE) and unlink(TEMP_FILE);
            return;
        }
        $compile = '';
        //常量编译
        $_define = get_defined_constants(true);
        foreach ($_define['user'] as $n => $d) {
            if ($d == '\\') $d = "'\\\\'";
            else $d = is_int($d) ? intval($d) : "'{$d}'";
            $compile .= "defined('{$n}') OR define('{$n}',{$d});";
        }
        $files = array(
            HDPHP_CORE_PATH . 'App.class.php', //HDPHP顶级类
            HDPHP_CORE_PATH . 'Controller.class.php', //控制器基类
            HDPHP_CORE_PATH . 'Debug.class.php', //Debug处理类
            HDPHP_CORE_PATH . 'Hook.class.php', //事件处理类
            HDPHP_CORE_PATH . 'HDPHP.class.php', //HDPHP顶级类
            HDPHP_CORE_PATH . 'HdException.class.php', //异常处理类
            HDPHP_CORE_PATH . 'Log.class.php', //Log日志类
            HDPHP_CORE_PATH . 'Route.class.php', //URL处理类
            HDPHP_FUNCTION_PATH . 'Functions.php', //应用函数
            HDPHP_DRIVER_PATH . 'Cache/Cache.class.php', //缓存基类
            HDPHP_DRIVER_PATH . 'Cache/CacheFactory.class.php', //缓存工厂类
            HDPHP_DRIVER_PATH . 'Cache/CacheFile.class.php', //文件缓存处理类
            HDPHP_DRIVER_PATH . 'Db/Db.class.php', //数据处理基类
            HDPHP_DRIVER_PATH . 'Db/DbFactory.class.php', //数据工厂类
            HDPHP_DRIVER_PATH . 'Db/DbInterface.class.php', //数据接口类
            HDPHP_DRIVER_PATH . 'Db/DbMysql.class.php', //Mysqli驱动类
            HDPHP_DRIVER_PATH . 'Model/Model.class.php', //模型基类
            HDPHP_DRIVER_PATH . 'Model/RelationModel.class.php', //关联模型类
            HDPHP_DRIVER_PATH . 'Model/ViewModel.class.php', //视图模型类
            HDPHP_DRIVER_PATH . 'View/ViewHd.class.php', //Hd视图驱动类
            HDPHP_DRIVER_PATH . 'View/View.class.php', //视图库
            HDPHP_DRIVER_PATH . 'View/ViewFactory.class.php', //视图工厂库
            HDPHP_DRIVER_PATH . 'View/ViewCompile.class.php', //模板编译类
            HDPHP_EXTEND_PATH . 'Tool/Dir.class.php', //目录操作类
        );
        foreach ($files as $f) {
            $con = compress(trim(file_get_contents($f)));
            $compile .= substr($con, -2) == '?>' ? trim(substr($con, 5, -2)) : trim(substr($con, 5));
        }
        //HDPHP框加核心配置
        $compile .= 'C(' . var_export(C(), true) . ');';
        //HDPHP框架核心语言包
        $compile .= 'L(' . var_export(L(), true) . ');';
        //别名配置文件
        $compile .= 'alias_import(' . var_export(alias_import(), true) . ');';
        //编译内容
        $compile = '<?php if(!defined(\'DEBUG\'))exit;' . $compile . 'HDPHP::init();App::run();?>';
        //创建Boot编译文件
        if (is_dir(TEMP_PATH) or dir_create(TEMP_PATH) and is_writable(TEMP_PATH))
            return file_put_contents(TEMP_FILE, compress($compile));
        header("Content-type:text/html;charset=utf-8");
        exit("<div style='border:solid 1px #dcdcdc;padding:30px;'>请修改" . realpath(dirname(TEMP_PATH)) . "目录权限</div>");
    }

}