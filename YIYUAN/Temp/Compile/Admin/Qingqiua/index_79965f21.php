<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>会员保健医生申请处理</title>
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
URL = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Qingqiua/index';
APP = 'http://127.0.0.1/baojiandaifu/YIYUAN';
COMMON = 'http://127.0.0.1/baojiandaifu/YIYUAN/Common';
HDPHP = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp';
HDPHPDATA = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend';
MODULE = 'http://127.0.0.1/baojiandaifu/index.php/Admin';
CONTROLLER = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Qingqiua';
ACTION = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Qingqiua/index';
STATIC = 'http://127.0.0.1/baojiandaifu/Static';
HDPHPTPL = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View';
PUBLIC = 'http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Public';
CONTROLLERVIEW = 'http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Qingqiua';
HISTORY = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Index/index';
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
        <li>
            <!-- <a href="<?php echo U('add');?>">添加保健医生</a> -->
        </li>
        <li>
            <!-- <a href="<?php echo U('chakan');?>">查看保健医生</a>   -->
        </li>
    </ul>
</div>
<div class='menu_list'>
    <ul>
        <li class="zuijin">
                会员申请保健医生
        </li>
    </ul>
</div>
<table class='table2'>
    <thead>
    <tr>
        <td class=''>用户姓名</td>
        <td class="">用户手机号</td>
        <!-- <td class=''>联系电话</td> -->
        <td>所选保健医院</td>
        <td>保健医院等级</td>
        <td>保健医生联系方式</td>
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
            <td style="display:none;"><?php echo $d['nid'];?></td>
            <td style="display:none;"><?php echo $d['hid'];?></td>
            <!-- <td><?php echo $d['yishengname'];?></td> -->
            <td><?php echo $d['yhname'];?></td>
            <td><?php echo $d['yhnumber'];?></td>
            <td><?php echo $d['yiyuanname'];?></td>
            <td><?php echo $d['yiyuandengji'];?></td>
            <td><?php echo $d['yiyuannumber'];?></td>
            <!-- <td><?php echo $d['password'];?></td> -->
            <td>
                <a href="<?php echo U('tongyi',array('nid'=>$d['nid'],'hid'=>$d['hid']));?>">同意申请</a> |
                <a href="<?php echo U('del',array('uid'=>$d['uid']));?>" onclick="return confirm('你确定要与该保健医生解除合作关系么?');">标记已读</a> |
                <a href="<?php echo U('',array('goods_gid'=>$d['gid']));?>">删除该申请</a>
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
<script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Qingqiua/js/js.js"></script>
<div class='page1'>
   <?php echo $page;?>
</div>
</body>
</html>