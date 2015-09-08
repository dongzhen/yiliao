<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户信息管理</title>
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
URL = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Index/yindex';
APP = 'http://127.0.0.1/baojiandaifu/YIYUAN';
COMMON = 'http://127.0.0.1/baojiandaifu/YIYUAN/Common';
HDPHP = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp';
HDPHPDATA = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend';
MODULE = 'http://127.0.0.1/baojiandaifu/index.php/Admin';
CONTROLLER = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Index';
ACTION = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Index/yindex';
STATIC = 'http://127.0.0.1/baojiandaifu/Static';
HDPHPTPL = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View';
PUBLIC = 'http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Public';
CONTROLLERVIEW = 'http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index';
HISTORY = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Login/ylogin';
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
    </style>
</head>
<body>
<div class='menu_list'>
    <ul>
        <li>
                
                <a href="<?php echo U('Login/gogo');?>" target="_self">
                    [退出]
                </a>
        </li>
                <li>
                
                <a href="<?php echo U('Yisheng/jiage');?>" target="_self">
                    [服务价格]
                </a>
        </li>
    </ul>
</div>
<div class='menu_list'>
    <ul>
        <li class="zuijin">
                用户健康信息管理
        </li>
    </ul>
</div>
<table id="one">
    <thead>
    <tr>
        <td class=''>姓名</td>
        <td class="">民族</td>
        <td class="">联系方式</td>
        <td class="">性别</td>
        <td class="">家庭住址</td>
<!--         <td class="w300">联系电话</td>
        <td class="w300">公司地址</td>
        <td>登录帐号</td>
        <td>登录密码</td> -->
        <td class="">操作</td>
    </tr>
    </thead>
    <tbody>
    <?php $hd["list"]["d"]["total"]=0;if(isset($data) && !empty($data)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($data));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($data,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

        <tr>
            <td style="display:none;"><?php echo $d['hid'];?></td>
            <td><?php echo $d['xingming'];?></td>
            <td><?php echo $d['minzu'];?></td>
            <td><?php echo $d['number'];?></td>
            <td><?php echo $d['xingbie'];?></td>
            <td><?php echo $d['zhiye'];?></td>
            <td>
                <a href="<?php echo U('kan',array('hid'=>$d['hid']));?>">查其健康信息</a> | <a href="<?php echo U('fa',array('hid'=>$d['hid']));?>">发送诊断信息</a>
                
            </td>
        </tr>
    <?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </tbody>
</table>
<script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/js/js.js"></script>
<div class='page1'>
   <?php echo $page;?>
</div>
</body>
</html>