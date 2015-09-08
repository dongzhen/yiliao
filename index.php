<?php
//定义字符集
header("Content-type:text/html;charset=utf-8");
//定义时区
date_default_timezone_set("PRC");
//定义应用目录
define("APP_PATH", "YIYUAN/");
//开启调试模式
define("DEBUG","True");
//定义模块目录
define("MODULE_LIST","Admin,Index,Memerber" );
//引入框架
require"hdphp/hdphp/hdphp.php";
?>