<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户列表</title>
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
URL = 'http://localhost/baojiandaifu/index.php/Admin/Yonghu/chuxian';
APP = 'http://localhost/baojiandaifu/YIYUAN';
COMMON = 'http://localhost/baojiandaifu/YIYUAN/Common';
HDPHP = 'http://localhost/baojiandaifu/hdphp/hdphp';
HDPHPDATA = 'http://localhost/baojiandaifu/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/baojiandaifu/hdphp/hdphp/Extend';
MODULE = 'http://localhost/baojiandaifu/index.php/Admin';
CONTROLLER = 'http://localhost/baojiandaifu/index.php/Admin/Yonghu';
ACTION = 'http://localhost/baojiandaifu/index.php/Admin/Yonghu/chuxian';
STATIC = 'http://localhost/baojiandaifu/Static';
HDPHPTPL = 'http://localhost/baojiandaifu/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/baojiandaifu/YIYUAN/Admin/View';
PUBLIC = 'http://localhost/baojiandaifu/YIYUAN/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/baojiandaifu/YIYUAN/Admin/View/Yonghu';
HISTORY = 'http://localhost/baojiandaifu/index.php/Admin/Index/index';
</script>
	<style type="text/css">
    body{
        background: yello;
    }
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
            width: 200px;
            position: absolute;
            left: 600px;
            top: 0px;
        }
	</style>
</head>
<body>
<div class='menu_list'>
    <ul>
<!--         <li>
            <a href="<?php echo U('add');?>">添加保健医生</a>
        </li>
        <li>
            <a href="<?php echo U('chakan');?>">查看保健医生</a>  
        </li> -->
    </ul>
</div>
<div class='menu_list'>
    <ul>
        <li class="zuijin">
                用户列表
        </li>
    </ul>
</div>
<table class='table2'>
    <thead>
    <tr>
        <td class=''>用户姓名</td>
        <td class="">性别</td>
        <td class=''>联系电话</td>
        <td class=''>民族</td>
        <td class="">操作</td>
    </tr>
    </thead>
    <tbody>
    <?php $hd["list"]["y"]["total"]=0;if(isset($yh) && !empty($yh)):$_id_y=0;$_index_y=0;$lasty=min(1000,count($yh));
$hd["list"]["y"]["first"]=true;
$hd["list"]["y"]["last"]=false;
$_total_y=ceil($lasty/1);$hd["list"]["y"]["total"]=$_total_y;
$_data_y = array_slice($yh,0,$lasty);
if(count($_data_y)==0):echo "";
else:
foreach($_data_y as $key=>$y):
if(($_id_y)%1==0):$_id_y++;else:$_id_y++;continue;endif;
$hd["list"]["y"]["index"]=++$_index_y;
if($_index_y>=$_total_y):$hd["list"]["y"]["last"]=true;endif;?>

        <tr>
            <td style="display:none;"><?php echo $y['hid'];?></td>
            <td><?php echo $y['xingming'];?></td>
            <td><?php echo $y['xingbie'];?></td>
            <td><?php echo $y['number'];?></td>
            <td><?php echo $y['minzu'];?></td>
            <td>
                
                <a href="<?php echo U('del',array('hid'=>$y['hid']));?>" onclick="return confirm('你确定要与该保健医生解除合作关系么?');">删除该用户</a> 
                
            </td>
        </tr>
    <?php $hd["list"]["y"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </tbody>
</table>
<script type="text/javascript" src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yonghu/js/js.js"></script>
<div class='page1'>
   <?php echo $page;?>
</div>
</body>
</html>