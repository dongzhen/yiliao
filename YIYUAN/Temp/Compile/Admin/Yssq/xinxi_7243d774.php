<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>保健医生申请处理</title>
    <script type='text/javascript' src='http://localhost/baojiandaifu/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://localhost/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdui/css/hdui.css' rel='stylesheet' media='screen'>
<script src='http://localhost/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdui/js/hdui.js'></script>
<link href='http://localhost/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/css/hdvalidate.css' rel='stylesheet' media='screen'>
<script src='http://localhost/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/js/hdvalidate.js'></script>
<script src='http://localhost/baojiandaifu/hdphp/hdphp/Extend/Org/cal/lhgcalendar.min.js'></script>
<script src='http://localhost/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdslide/js/hdslide.js'></script>
<script type='text/javascript'>
HOST = 'http://localhost';
ROOT = 'http://localhost/baojiandaifu';
WEB = 'http://localhost/baojiandaifu/index.php';
URL = 'http://localhost/baojiandaifu/index.php/Admin/Yssq/xinxi/ys_id/8';
APP = 'http://localhost/baojiandaifu/YIYUAN';
COMMON = 'http://localhost/baojiandaifu/YIYUAN/Common';
HDPHP = 'http://localhost/baojiandaifu/hdphp/hdphp';
HDPHPDATA = 'http://localhost/baojiandaifu/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/baojiandaifu/hdphp/hdphp/Extend';
MODULE = 'http://localhost/baojiandaifu/index.php/Admin';
CONTROLLER = 'http://localhost/baojiandaifu/index.php/Admin/Yssq';
ACTION = 'http://localhost/baojiandaifu/index.php/Admin/Yssq/xinxi';
STATIC = 'http://localhost/baojiandaifu/Static';
HDPHPTPL = 'http://localhost/baojiandaifu/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/baojiandaifu/YIYUAN/Admin/View';
PUBLIC = 'http://localhost/baojiandaifu/YIYUAN/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/baojiandaifu/YIYUAN/Admin/View/Yssq';
HISTORY = 'http://localhost/baojiandaifu/index.php/Admin/Yssq/index';
</script>
    <style type="text/css">
        #out{
            width: 800px;
            height: 800px;
            background:#E2DDDD;
            margin: 0 auto;
            /*border: 1px solid red;*/
        }
        .one{
            width: 100%;
            height: 10%;
            border-bottom: 2px solid #FAE480;
            line-height: 80px;
            text-align: center;
            font-family: "微软雅黑";
            font-size: 40px;
        }
        .two{
            width: 100%;
            height: 90%;
            position: relative;
        }
        .img{
            position: absolute;
            width: 108px;
            height: 137px;
            left: 71%;
            /*background: white;*/
        }
        .three{
            width: 70%;
            height: 90%;
            background: white;
            margin: 0 auto;
        }
        li{
            font-family: "微软雅黑";
            /*text-align: center;*/
            font-size: 18px;
            height: 80px;
            line-height: 80px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="out">
    
        <div class="one">
            申请保健医生用户信息
        </div>
        <div class="two">
            <div class="three">
                <div class="img">
                    <img src="http://localhost/baojiandaifu/<?php echo $data['ys_img'];?>" alt="">
                </div> 
                <ul> 
                    <li>姓名：<?php echo $data['ys_name'];?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp出生日期：<?php echo $data['ys_birthday'];?></li>
                    <li>性别：<?php echo $data['ys_xingbie'];?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp民族：<?php echo $data['ys_minzu'];?></li>
                    <li>所属医院:<?php echo $data['ys_yiyuan'];?></li>
                    <li>医院担任职位：<?php echo $data['ys_zhiwei'];?></li>
                    <li>联系电话：<?php echo $data['ys_number'];?></li>
                    <li>单位固定电话：<?php echo $data['ys_guhua'];?></li>


                </ul>
            </div>

        </div>
    </div>

</body>
</html>