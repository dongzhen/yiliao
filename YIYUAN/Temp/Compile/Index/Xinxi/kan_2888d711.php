<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>保健医生信息查看</title>
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
URL = 'http://localhost/baojiandaifu/index.php/Index/Xinxi/kan/xid/16';
APP = 'http://localhost/baojiandaifu/YIYUAN';
COMMON = 'http://localhost/baojiandaifu/YIYUAN/Common';
HDPHP = 'http://localhost/baojiandaifu/hdphp/hdphp';
HDPHPDATA = 'http://localhost/baojiandaifu/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/baojiandaifu/hdphp/hdphp/Extend';
MODULE = 'http://localhost/baojiandaifu/index.php/Index';
CONTROLLER = 'http://localhost/baojiandaifu/index.php/Index/Xinxi';
ACTION = 'http://localhost/baojiandaifu/index.php/Index/Xinxi/kan';
STATIC = 'http://localhost/baojiandaifu/Static';
HDPHPTPL = 'http://localhost/baojiandaifu/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/baojiandaifu/YIYUAN/Index/View';
PUBLIC = 'http://localhost/baojiandaifu/YIYUAN/Index/View/Public';
CONTROLLERVIEW = 'http://localhost/baojiandaifu/YIYUAN/Index/View/Xinxi';
HISTORY = 'http://localhost/baojiandaifu/index.php/Index/Xinxi/index';
</script>
    <style type="text/css">
        #duihao{
            color: green;
            font-weight: 800;
            font-size: 12px;
        }
        #cuohao{
            color:red;
            font-weight: 800;
            font-size: 12px;
        }
        .zuijin{
            font-size: 20px;
            color: black;
            /*background: yellow;*/
            position: absolute;
            left: 600px;
            top: 0px;
        }
        #one{
            width: 100%;
        }
        #one td{
            width:258px;
            height: 40px;
            text-align: center;
            border-bottom: 1px solid #DBEAF9;
        }
        #zhuti{
        	width: 800px;
        	height: 400px;
        	margin: 0 auto;
            font-size: 23px;
            font-family: "微软雅黑";
            font-weight: 500;
        	/*border:1px solid red;*/
        	background: #F1F1F1;
        }
        #title{
        	width: 800px;
        	height: 60px;
        	border-bottom: 1px solid white;
        	text-align: center;
        	font-family: "微软雅黑";
        	font-size: 35px;
        	line-height: 60px;
        	/*background: white;*/
        }
        #beizhu{
        	width: 400px;
        	height: 60px;
            margin: 0 auto;
        	/*border-bottom: 1px solid black;*/
        	/*background: white;*/
            line-height: 60px;
            text-align: center;
        }
        #content{
            width: 600px;
            height: 400px;
            margin: 0 auto;
            font-family: "微软雅黑";
            font-size: 23px;
            font-weight: 500;
            /*background: yellow;*/
        }
    </style>
</head>
<body>
<div class='
menu_list'>
    <ul>
        <li>
                
                <a href="<?php echo U('Xinxi/index');?>" target="_self">
                    [返回信息列表]
                </a>
        </li>
                <li>
                

        </li>
    </ul>
</div>
<div class='menu_list'>
    <ul>
        <li class="zuijin">
                保健医生信息
        </li>
    </ul>
</div>
<table id="one">
    <thead>
    <tr>

    </tr>
    </thead>
    <tbody>
<div id="zhuti">
	<div id="title"><?php echo $data['title'];?></div>
	<div id="beizhu">
		<span >
			备注：<?php echo $data['beizhu'];?>
		</span>

	</div>
    <div id="content">
        <?php echo $data['content'];?>
        
    </div>
   
	
</div>
    </tbody>
</table>
<script type="text/javascript" src="http://localhost/baojiandaifu/YIYUAN/Index/View/Xinxi/js/js.js"></script>
<div class='page1'>
   <?php echo $page;?>
</div>
<div id="beizhu">
	
</div>
</body>
</html>
