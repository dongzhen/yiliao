<?php
if (!defined('HDPHP_PATH'))exit('No direct script access allowed');
//基本配置文件
return array(
    /********************************基本参数********************************/
    'CHARSET'                       => 'utf8',      //字符集
    'DEFAULT_TIME_ZONE'             => 'PRC',       //时区
    'LANGUAGE'                      => '',          //语言包
    'AUTH_KEY'                      => 'HouDunWang',//加密Key(如果使用建议定期更换AUTH_KEY)
    'CHECK_FILE_CASE'               => TRUE,        //windows区分大小写
    'AUTO_LOAD_FILE'                => array(),     //自动加载应用Lib目录或应用组Common/Lib目录下的文件
    'FILTER_FUNCTION'               => array('htmlspecialchars','strip_tags'), //过滤函数会在Q(),date_format()等函数中使用
    'HTML_PATH'						=>'html/',//静态html文件储存目录
    /********************************数据库********************************/
    'DB_DRIVER'                     => 'Mysqli',    //数据库驱动
    'DB_CHARSET'                    => 'utf8',      //数据库字符集
    'DB_HOST'                       => '127.0.0.1', //数据库连接主机  如127.0.0.1
    'DB_PORT'                       => 3306,        //数据库连接端口
    'DB_USER'                       => 'root',      //数据库用户名
    'DB_PASSWORD'                   => '',          //数据库密码
    'DB_DATABASE'                   => '',          //数据库名称
    'DB_PREFIX'                     => '',          //表前缀
    'DB_BACKUP'                     => 'backup/',   //数据库备份目录
    'DB_PCONNECT'                     => false,   //数据库持久链接
    /********************************储存********************************/
    'STORAGE_DRIVER'		=>'File',//储存驱动 支持File与Memcache储存
    /********************************表单TOKEN令牌********************************/
    'TOKEN_ON'                      => FALSE,       //开启令牌
    'TOKEN_NAME'                    => '__TOKEN__', //令牌的表单name
    /********************************系统调试********************************/
    '404_URL'                       => '',          //404跳转url
    'ERROR_URL'                     => '',          //错误跳转URL
    'ERROR_MESSAGE'                 => '网站出错了，请稍候再试...', //关闭DEBUG显示的错误信息
    'SHOW_NOTICE'                   => TRUE,        //显示Warning与Notice错误显示
    /********************************LOG日志处理********************************/
    'LOG_SIZE'                      => 2000000,     //日志文件大小
    'LOG_RECORD'                    => TRUE,       //记录日志
    'LOG_LEVEL'                     => array('FATAL','ERROR','WARNING','SQL'),//写入日志的错误级别
    'LOG_EXCEPTION_RECORD'          => TRUE,        // 记录异常
    /********************************SESSION********************************/
    'SESSION_AUTO_START'            => TRUE,        //自动开启SESSION
    'SESSION_TYPE'                  => '',          //引擎:mysql,memcache,redis
    'SESSION_OPTIONS'               =>array(),
    /********************************COOKIE********************************/
    'COOKIE_EXPIRE'                 => 0,           // Coodie有效期
    'COOKIE_DOMAIN'                 => '',          // Cookie有效域名
    'COOKIE_PATH'                   => '/',         // Cookie路径
    'COOKIE_PREFIX'                 => '',          // Cookie前缀 避免冲突
    /********************************URL设置********************************/
    'HTTPS'                         => FALSE,       //基于https协议
    'URL_REWRITE'                   => FALSE,       //url重写模式
    'URL_TYPE'                      => 1,           //类型 1:PATHINFO模式 2:普通模式 3:兼容模式
    'PATHINFO_DLI'                  => '/',         //URL分隔符 URL_TYPE为1、3时起效
    'PATHINFO_VAR'                  => 'q',         //兼容模式get变量
    'HTML_SUFFIX'                   => '',          //伪静态扩展名
    /********************************url变量********************************/
    'VAR_GROUP'                     => 'g',         //模块组URL变量
    'VAR_MODULE'                    => 'm',         //模块URL变量
    'VAR_CONTROLLER'                => 'c',         //控制器URL变量
    'VAR_ACTION'                    => 'a',         //动作URL变量
    /********************************项目参数********************************/
    'DENY_MODULE'                   => array('Common','Temp','Addons'),//禁止使用的模块
    'DEFAULT_MODULE'                => 'Index',     //默认模块
    'DEFAULT_CONTROLLER'            => 'Index',     //默认控制器
    'DEFAULT_ACTION'                => 'index',     //默认方法
    'CONTROLLER_FIX'                => 'Controller',//控制器文件后缀
    'MODEL_FIX'                     => 'Model',     //模型文件名后缀
    /********************************URL路由********************************/
    'route' => array(),                             //路由规则
    /********************************缓存********************************/
    'CACHE_TYPE'                    => 'file',      //类型:file memcache redis
    'CACHE_TIME'                    => 0,        //全局默认缓存时间 0为永久缓存 -1 不缓存
    'CACHE_MEMCACHE'                => array(       //多个服务器设置二维数组
        'host'      => '127.0.0.1',     //主机
        'port'      => 11211,           //端口
        'timeout'   => 1,               //超时时间(单位为秒)
        'weight'    => 1,               //权重
        'pconnect'  => 1,               //持久连接
    ),
    'CACHE_REDIS'                   => array( //多个服务器设置二维数组
        'host'      => '127.0.0.1',     //主机
        'port'      => 6379,            //端口
        'password'  => '',              //密码
        'timeout'   => 1,               //超时时间(单位为秒)
        'Db'        => 0,               //数据库
        'pconnect'  => 0,               //持久连接
    ),
    'CACHE_SELECT_TIME'             => -1,          //SQL SELECT查询缓存时间 -1为不缓存 0为永久缓存
    'CACHE_SELECT_LENGTH'           => 30,          //缓存最大条数
    'CACHE_TPL_TIME'                => -1,          //模板缓存时间 -1为不缓存 0为永久缓存
    /********************************文件上传********************************/
    'UPLOAD_THUMB_ON'               => FALSE,       //上传图片缩略图处理
    'UPLOAD_ALLOW_TYPE'             => array('jpg','jpeg','gif','png','zip','rar','doc','txt'),//允许上传类型
    'UPLOAD_ALLOW_SIZE'             => 2097152,     //允许上传文件大小 单位B
    'UPLOAD_PATH'                   => 'Upload/',   //上传路径
    /********************************图像水印处理********************************/
    'WATER_ON'                      => TRUE,           //开关
    'WATER_FONT'                    => HDPHP_PATH . 'Data/Font/font.ttf',   //水印字体
    'WATER_IMG'                     => HDPHP_PATH . 'Data/Image/water.png', //水印图像
    'WATER_POS'                     => 9,           //位置  1~9九个位置  0为随机
    'WATER_PCT'                     => 60,          //透明度
    'WATER_QUALITY'                 => 80,          //压缩比
    'WATER_TEXT'                    => 'WWW.HOUDUNWANG.COM', //水印文字
    'WATER_TEXT_COLOR'              => '#f00f00',   //文字颜色
    'WATER_TEXT_SIZE'               => 12,          //文字大小
    /********************************图片缩略图********************************/
    'THUMB_PREFIX'                  => '',          //缩略图前缀
    'THUMB_ENDFIX'                  => '_thumb',    //缩略图后缀
    'THUMB_TYPE'                    => 6,  //生成方式,
                                            //1:固定宽度,高度自增 2:固定高度,宽度自增 3:固定宽度,高度裁切
                                            //4:固定高度,宽度裁切 5:缩放最大边       6:自动裁切图片
    'THUMB_WIDTH'                   => 300,         //缩略图宽度
    'THUMB_HEIGHT'                  => 300,         //缩略图高度
    /********************************验证码********************************/
    'CODE_FONT'                     => HDPHP_PATH . 'Data/Font/font.ttf',       //字体
    'CODE_STR'                      => '123456789', //验证码种子
    'CODE_WIDTH'                    => 120,         //宽度
    'CODE_HEIGHT'                   => 35,          //高度
    'CODE_BG_COLOR'                 => '#ffffff',   //背景颜色
    'CODE_LEN'                      => 4,           //文字数量
    'CODE_FONT_SIZE'                => 20,          //字体大小
    'CODE_FONT_COLOR'               => '',   //字体颜色
    /********************************分页处理********************************/
    'PAGE_VAR'                      => 'page',      //分页GET变量
    'PAGE_ROW'                      => 10,          //页码数量
    'PAGE_SHOW_ROW'                 => 10,          //每页显示条数
    'PAGE_STYLE'                    => 2,           //页码风格
    'PAGE_DESC'                     => array('pre' => '上一页', 'next' => '下一页',//分页文字设置
                                            'first' => '首页', 'end' => '尾页', 'unit' => '条'),
    /********************************模板参数********************************/
    'TPL_PATH'                      => 'View',      //模板目录
    'TPL_STYLE'                     => '',          //风格
    'TPL_FIX'                       => '.html',     //模版文件扩展名
    'TPL_TAGS'                      => array(),     //模板标签
    'TPL_ERROR'                     => 'error',     //错误信息模板
    'TPL_SUCCESS'                   => 'success',   //正确信息模板
    'TPL_ENGINE'                    => 'HD',        //模板引擎 HD,Smarty
    'TPL_TAG_LEFT'                  => '<',         //左标签
    'TPL_TAG_RIGHT'                 => '>',         //右标签
    /********************************购物车参数********************************/
    'CART_NAME'                     => 'cart',      //储存在$_SESSION购物车名称
    /********************************文本编辑器********************************/
    'EDITOR_TYPE'                   => 2,           //复文本编辑器  1 baidu  2 kindeditor
    'EDITOR_STYLE'                  => 1,           //1 完全模式  2 精简模式
    'EDITOR_WIDTH'                  => '100%',      //编辑器高度
    'EDITOR_HEIGHT'                 => 300,         //编辑器高度
    'EDITOR_SAVE_PATH'              => 'upload/editor/', //文件储存目录
    'EDITOR_IMAGE_WATER'            => false,        //图片水印控制

    /********************************RBAC权限控制********************************/
    'RBAC_TYPE'                     => 1,           //1时时认证｜2登录认证
    'RBAC_SUPER_ADMIN'              => 'super_admin', //超级管理员SESSION名
    'RBAC_USERNAME_FIELD'           => 'username',  //用户名字段
    'RBAC_PASSWORD_FIELD'           => 'password',  //密码字段
    'RBAC_AUTH_KEY'                 => 'uid',       //用户SESSION名
    'RBAC_NO_AUTH'                  => array(),     //不需要验证的控制器或方法如:array('index/index')表示index控制器的index方法不需要验证
    'RBAC_USER_TABLE'               => 'user',      //用户表
    'RBAC_ROLE_TABLE'               => 'role',      //角色表
    'RBAC_NODE_TABLE'               => 'node',      //节点表
    'RBAC_ROLE_USER_TABLE'          => 'user_role', //角色与用户关联表
    'ACCESS_TABLE'                  => 'access',    //权限分配表
    /********************************邮箱配置********************************/
    'EMAIL_USERNAME'                => '',          //邮箱用户名
    'EMAIL_PASSWORD'                => '',          //邮箱密码
    'EMAIL_HOST'                    => '',          //smtp地址如smtp.gmail.com或smtp.126.com建议使用126服务器
    'EMAIL_PORT'                    => 25,          //smtp端口 126为25，gmail为465
    'EMAIL_SSL'                     => 0,           //是否采用SSL,126为false,google必须为true
    'EMAIL_CHARSET'                 => 'utf8',          //字符集设置,中文乱码就是这个没有设置好 如utf8
    'EMAIL_FORMMAIL'                => '',          //发送人发件箱显示的邮箱址址
    'EMAIL_FROMNAME'                => '后盾网',      //发送人发件箱显示的用户名
    /********************************钓子********************************/
    'HOOK'                          => array(),
    /********************************别名导入********************************/
    'ALIAS'                         =>array(
        "UEDITOR_UPLOAD"    => HDPHP_EXTEND_PATH . 'Org/Ueditor/php/ueditor_upload.php', //ueditor
        "HD_UPLOADIFY"      => HDPHP_EXTEND_PATH . 'Org/Uploadify/hd_uploadify.php', //uploadify上传
        "HD_UPLOADIFY_DEL"  => HDPHP_EXTEND_PATH . 'Org/Uploadify/hd_uploadify.php', //uploadify删除
    )
);
?>