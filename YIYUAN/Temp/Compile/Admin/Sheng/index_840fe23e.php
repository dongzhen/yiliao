<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>代理省份列表</title>
	<script type='text/javascript' src='http://localhost/yiyuan/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://localhost/yiyuan/hdphp/hdphp/Extend/Org/hdjs/hdui/css/hdui.css' rel='stylesheet' media='screen'>
<script src='http://localhost/yiyuan/hdphp/hdphp/Extend/Org/hdjs/hdui/js/hdui.js'></script>
<link href='http://localhost/yiyuan/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/css/hdvalidate.css' rel='stylesheet' media='screen'>
<script src='http://localhost/yiyuan/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/js/hdvalidate.js'></script>
<script src='http://localhost/yiyuan/hdphp/hdphp/Extend/Org/cal/lhgcalendar.min.js'></script>
<script src='http://localhost/yiyuan/hdphp/hdphp/Extend/Org/hdjs/hdslide/js/hdslide.js'></script>
<script type='text/javascript'>
HOST = 'http://localhost';
ROOT = 'http://localhost/yiyuan';
WEB = 'http://localhost/yiyuan/index.php';
URL = 'http://localhost/yiyuan/index.php/Admin/Sheng/index';
APP = 'http://localhost/yiyuan/YIYUAN';
COMMON = 'http://localhost/yiyuan/YIYUAN/Common';
HDPHP = 'http://localhost/yiyuan/hdphp/hdphp';
HDPHPDATA = 'http://localhost/yiyuan/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/yiyuan/hdphp/hdphp/Extend';
MODULE = 'http://localhost/yiyuan/index.php/Admin';
CONTROLLER = 'http://localhost/yiyuan/index.php/Admin/Sheng';
ACTION = 'http://localhost/yiyuan/index.php/Admin/Sheng/index';
STATIC = 'http://localhost/yiyuan/Static';
HDPHPTPL = 'http://localhost/yiyuan/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/yiyuan/YIYUAN/Admin/View';
PUBLIC = 'http://localhost/yiyuan/YIYUAN/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/yiyuan/YIYUAN/Admin/View/Sheng';
HISTORY = 'http://localhost/yiyuan/index.php/Admin/Index/index';
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
            top: 34px;
        }
	</style>
</head>
<body>
<div class='menu_list'>
    <ul>
        <li>
            <a href="<?php echo U('add');?>">添加省代理</a>
        </li>
        <li>
            <a href="<?php echo U('chakan');?>">查看省份代理</a>  
        </li>
    </ul>
</div>
<div class='menu_list'>
    <ul>
        <li class="zuijin">
                最近添加的省代理商
        </li>
    </ul>
</div>
<table class='table2'>
    <thead>
    <tr>
        <td class='w60'>代理省份</td>
        <td class="w100">公司名称</td>
        <td class='w60'>负责人</td>
        <td class="w300">联系电话</td>
        <td class="w300">公司地址</td>
        <td>登录帐号</td>
        <td>登录密码</td>
        <td class="200w">操作</td>
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
            <td style="display:none;"><?php echo $d['did'];?></td>
            <td><?php echo $d['sname'];?></td>
            <td><?php echo $d['dname'];?></td>
            <td><?php echo $d['duser'];?></td>
            <td><?php echo $d['dnumber'];?></td>
            <td><?php echo $d['ddizhi'];?></td>
            <td><?php echo $d['dkey'];?></td>
            <td><?php echo $d['dpassword'];?></td>
            <td>
                <a href="<?php echo U('edit',array('did'=>$d['did']));?>">编辑</a> |
                <a href="<?php echo U('del',array('did'=>$d['did']));?>" onclick="return confirm('你确定将该代理的代理资格删除么?');">取消代理资格</a> |
                <a href="<?php echo U('Product/manage',array('goods_gid'=>$d['gid']));?>">查看其管理医院</a>
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
<script type="text/javascript" src="http://localhost/yiyuan/YIYUAN/Admin/View/Sheng/js/js.js"></script>
<div class='page1'>
   <?php echo $page;?>
</div>
</body>
</html>