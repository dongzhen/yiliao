<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>保健医生申请处理</title>
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
URL = 'http://127.0.0.1/baojiandaifu/index.php/Index/Yonghuyisheng/kan/uid/2';
APP = 'http://127.0.0.1/baojiandaifu/YIYUAN';
COMMON = 'http://127.0.0.1/baojiandaifu/YIYUAN/Common';
HDPHP = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp';
HDPHPDATA = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend';
MODULE = 'http://127.0.0.1/baojiandaifu/index.php/Index';
CONTROLLER = 'http://127.0.0.1/baojiandaifu/index.php/Index/Yonghuyisheng';
ACTION = 'http://127.0.0.1/baojiandaifu/index.php/Index/Yonghuyisheng/kan';
STATIC = 'http://127.0.0.1/baojiandaifu/Static';
HDPHPTPL = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://127.0.0.1/baojiandaifu/YIYUAN/Index/View';
PUBLIC = 'http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Public';
CONTROLLERVIEW = 'http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng';
HISTORY = 'http://127.0.0.1/baojiandaifu/index.php/Index/Yonghuyisheng/shenqing';
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
<div class='
menu_list'>
    <ul>
        <li>
                
                <a href="<?php echo U('Yonghuyisheng/fanhui');?>" target="_self">
                    [返回医生信息列表]
                </a>
        </li>
                <li>
                

        </li>
    </ul>
</div>
    <div id="out">
    
        <div class="one">
            保健医生信息
        </div>
        <div class="two">
            <div class="three">
                <div class="img">
                    <img src="http://127.0.0.1/baojiandaifu/<?php echo $data['ys_img'];?>" alt="">
                </div> 
                <ul> 
                    <li>姓名：<?php echo $data['yishengname'];?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp出生日期：<?php echo $data['shengri'];?></li>
                    <li>性别：<?php echo $data['xingbie'];?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp民族：<?php echo $data['minzu'];?></li>
                    <li>所属医院:<?php echo $data['yiyuanname'];?></li>
                    <li>所属科室：<?php echo $data['keshi'];?></li>
                    <li>联系电话：<?php echo $data['yishengnumber'];?></li>
                    <li>单位固定电话：<?php echo $data['guhua'];?></li>


                </ul>
            </div>

        </div>
    </div>

</body>
</html>