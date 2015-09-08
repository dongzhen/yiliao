<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
        <title>后台管理中心</title>
        <script type='text/javascript' src='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdui/css/hdui.css' rel='stylesheet' media='screen'>
<script src='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdui/js/hdui.js'></script>
<link href='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/css/hdvalidate.css' rel='stylesheet' media='screen'>
<script src='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/js/hdvalidate.js'></script>
<script src='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/cal/lhgcalendar.min.js'></script>
<script src='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdslide/js/hdslide.js'></script>
<script type='text/javascript'>
HOST = 'http://127.0.0.1';
ROOT = 'http://127.0.0.1/baojiandaifu';
WEB = 'http://127.0.0.1/baojiandaifu/index.php';
URL = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Index/index';
APP = 'http://127.0.0.1/baojiandaifu/YIYUAN';
COMMON = 'http://127.0.0.1/baojiandaifu/YIYUAN/Common';
HDPHP = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp';
HDPHPDATA = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend';
MODULE = 'http://127.0.0.1/baojiandaifu/index.php/Admin';
CONTROLLER = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Index';
ACTION = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Index/index';
STATIC = 'http://127.0.0.1/baojiandaifu/Static';
HDPHPTPL = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View';
PUBLIC = 'http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Public';
CONTROLLERVIEW = 'http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index';
HISTORY = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Login/Login';
</script>
        <script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/js/menu.js"></script>
        <script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/js/quick_menu.js"></script>
        <link type="text/css" rel="stylesheet" href="http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/css/css.css"/>
        <link type="text/css" rel="stylesheet" href="http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/css/quick_menu.css"/>
        <base target="iframe">
        <style type="text/css">
            .guanli{
                height: 60px;
                /*color: green;*/
                font-size: 20px;
                font-family: "微软雅黑";
            }
            .biaozhi{
                width: 100px;
                height: 40px;
                line-height: 40px;
                font-size: 23px;
                font-family: "微软雅黑";
            }
            .biaozhi:hover{
                background: #5AA020;
            }
            #top{
                background: #FF8000;
                /*height: 80px;*/
            }
            #zuishang{
                font-family: "微软雅黑";
                font-size: 18px;
                color: white;
            }
            #tuichu{
                color: black;
                font-family: "微软雅黑";
                font-size: 18px;
                height: 40px;
                line-height: 10px;
                position: absolute;
                left: 80%;
                top: 15px;
            }
            #one{
                border: 1px solid #D3D1D1;
                border-top: none;
                font-family: "微软雅黑";
                font-size: 20px;
                width: 120px;
                height: 56px;
                line-height: 56px;
            }
            #one:hover{
                background: #FF8000;
            }
            #one a:hover{
                background: #FF8000;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="nav" id="top">
            <!--头部左侧导航-->
            <div class="top_menu" id="zuishang" style="height：30px;line-height:40px;">
                    中国保健大夫后台管理中心
            </div>
            <!--头部左侧导航-->
            <!--头部右侧导航-->
            <div class="r_menu">
                
                <a href="<?php echo U('Login/out');?>" target="_self" id="tuichu">
                    [安全退出]
                </a>
            </div>
            <!--头部右侧导航-->
        </div>
        <!--左侧导航-->
        <div class="main">
            <!--主体左侧导航-->
            <div class="left_menu">
                <dl>
                    <dt ><span class="guanli">功能管理</span></dt>
                    <?php if($_SESSION['user']['quanxian'] == 1){?>
                    <dd id="one">
                        <a href="<?php echo U('yonghu/chuxian');?>" class="biaozhi">用户管理</a>
                    </dd>
                    <dd id="one">
                        <a href="<?php echo U('Yisheng/index');?>" class="biaozhi">保健医生管理</a>
                    </dd>

                    <dd id="one">
                        <a href="<?php echo U('Yiyuan/index');?>" class="biaozhi">保健医院管理</a>
                    </dd>
                    <dd id="one">
                        <a href="<?php echo U('Shuju/index');?>" class="biaozhi">数据写入测试</a>
                    </dd>
                    <dd id="one">
                        <a href="<?php echo U('Zhuanhuan/index');?>" class="biaozhi">数据转换测试</a>
                    </dd>
                     <?php }?>
                    <dd id="one">
                        <a href="<?php echo U('User/index');?>" class="biaozhi">后台账号管理</a>
                    </dd>
                    <dd id="one">
                        <a href="<?php echo U('Yssq/index');?>" class="biaozhi">保健医生申请</a>
                    </dd>
                    <dd id="one">
                        <a href="<?php echo U('Yysq/index');?>" class="biaozhi">保健医院申请</a>
                    </dd>
                    <dd id="one">
                        <a href="<?php echo U('Qingqiu/index');?>" class="biaozhi">会员申请保健医生</a>
                    </dd>
                    <dd id="one">
                        <a href="<?php echo U('Qingqiua/index');?>" class="biaozhi">会员申请保健医院</a>
                    </dd>


                </dl>
            </div>
            <!--主体左侧导航-->
            <!--内容显示区域-->
            <div class="top_content">
                <iframe src="http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/welcome.html" nid="0" scrolling="auto" frameborder="0" name='iframe'
                style="height: 100%;width: 100%;"></iframe>
            </div>
            <!--内容显示区域-->
        </div>  
    </body>
</html>