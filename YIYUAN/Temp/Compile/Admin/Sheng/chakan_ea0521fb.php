<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
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
URL = 'http://localhost/yiyuan/index.php/Admin/Sheng/chakan';
APP = 'http://localhost/yiyuan/YIYUAN';
COMMON = 'http://localhost/yiyuan/YIYUAN/Common';
HDPHP = 'http://localhost/yiyuan/hdphp/hdphp';
HDPHPDATA = 'http://localhost/yiyuan/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/yiyuan/hdphp/hdphp/Extend';
MODULE = 'http://localhost/yiyuan/index.php/Admin';
CONTROLLER = 'http://localhost/yiyuan/index.php/Admin/Sheng';
ACTION = 'http://localhost/yiyuan/index.php/Admin/Sheng/chakan';
STATIC = 'http://localhost/yiyuan/Static';
HDPHPTPL = 'http://localhost/yiyuan/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/yiyuan/YIYUAN/Admin/View';
PUBLIC = 'http://localhost/yiyuan/YIYUAN/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/yiyuan/YIYUAN/Admin/View/Sheng';
HISTORY = 'http://localhost/yiyuan/index.php/Admin/Sheng/chakan';
</script>
	<style type="text/css">
        .daili{
            position: absolute;
            width: 300px;
            height: 30px;
            /*background: yellow;*/
            left: 500px;
            top: 30px;
            font-family: "微软雅黑";
            font-size: 23px;
            color: black;
        }
	</style>
    <script type="text/javascript" src="http://localhost/yiyuan/YIYUAN/Admin/View/Sheng/Js/js.js"></script>
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
<?php $hd["list"]["c"]["total"]=0;if(isset($cs) && !empty($cs)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($cs));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($cs,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

    <span class="daili"><?php echo $c['sname'];?>代理信息</span>
<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
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
    <?php $hd["list"]["c"]["total"]=0;if(isset($cs) && !empty($cs)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($cs));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($cs,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

        <tr>
            <td style="display:none;"><?php echo $c['did'];?></td>
            <td><?php echo $c['sname'];?></td>
            <td><?php echo $c['dname'];?></td>
            <td><?php echo $c['duser'];?></td>
            <td><?php echo $c['dnumber'];?></td>
            <td><?php echo $c['ddizhi'];?></td>
            <td><?php echo $c['dkey'];?></td>
            <td><?php echo $c['dpassword'];?></td>
            <td>
                <a href="<?php echo U('edit',array('did'=>$c['did']));?>">编辑</a> |
                <a href="<?php echo U('del',array('did'=>$c['did']));?>" onclick="return confirm('你确定将该代理的代理资格删除么?');">取消代理资格</a> 
                 |
                <a href="<?php echo U('Product/manage',array('goods_gid'=>$d['gid']));?>">查看其管理医院</a>
            </td>
        </tr>
    <?php $hd["list"]["c"]["first"]=false;
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