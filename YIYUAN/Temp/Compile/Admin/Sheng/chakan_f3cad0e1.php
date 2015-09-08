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

            <div class='title-header' class="h100">查找条件</div>
            <table class='table1 hd-form'>

                <tr>
                    <th>省份</th>
                    <form action="" method='post'>
                    <td>
                    
                        <select name="pid" id="">
                            <option value="0">选择省份</option>
                            <?php $hd["list"]["s"]["total"]=0;if(isset($sf) && !empty($sf)):$_id_s=0;$_index_s=0;$lasts=min(1000,count($sf));
$hd["list"]["s"]["first"]=true;
$hd["list"]["s"]["last"]=false;
$_total_s=ceil($lasts/1);$hd["list"]["s"]["total"]=$_total_s;
$_data_s = array_slice($sf,0,$lasts);
if(count($_data_s)==0):echo "";
else:
foreach($_data_s as $key=>$s):
if(($_id_s)%1==0):$_id_s++;else:$_id_s++;continue;endif;
$hd["list"]["s"]["index"]=++$_index_s;
if($_index_s>=$_total_s):$hd["list"]["s"]["last"]=true;endif;?>

                                <option value="<?php echo $s['pid'];?>"><a href=""><?php echo $s['sname'];?></a></option>
                            <?php $hd["list"]["s"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                        </select>
                        <input type="submit" class='hd-success' value='查找'/>
                    </td>
                    <form/>

<!--                     <th>负责人姓名</th>
                    <form action="" method='post'>                    
                    <td>
                        <input type="text" value='' name='duser' class='w200'> 
                        <input type="submit" class='hd-success' value='查找'/>
                    </td>
                    </form> -->

<!--                     <form action="" method='post'> 
                    <th>负责人联系方式</th>
                    <td>
                        <input type="text" value='' name='dnumber' class='w200'>
                        <input type="submit" class='hd-success' value='查找'/> 
                    </td>
                    </form> -->
                </tr>             
            </table>

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
    <?php $hd["list"]["s"]["total"]=0;if(isset($sf) && !empty($sf)):$_id_s=0;$_index_s=0;$lasts=min(1000,count($sf));
$hd["list"]["s"]["first"]=true;
$hd["list"]["s"]["last"]=false;
$_total_s=ceil($lasts/1);$hd["list"]["s"]["total"]=$_total_s;
$_data_s = array_slice($sf,0,$lasts);
if(count($_data_s)==0):echo "";
else:
foreach($_data_s as $key=>$s):
if(($_id_s)%1==0):$_id_s++;else:$_id_s++;continue;endif;
$hd["list"]["s"]["index"]=++$_index_s;
if($_index_s>=$_total_s):$hd["list"]["s"]["last"]=true;endif;?>

        <tr>
            <td style="display:none;"><?php echo $s['did'];?></td>
            <td><?php echo $s['sname'];?></td>
            <td><?php echo $s['dname'];?></td>
            <td><?php echo $s['duser'];?></td>
            <td><?php echo $s['dnumber'];?></td>
            <td><?php echo $s['ddizhi'];?></td>
            <td><?php echo $s['dkey'];?></td>
            <td><?php echo $s['dpassword'];?></td>
            <td>
                <a href="<?php echo U('edit',array('did'=>$s['did']));?>">编辑</a> |
                <a href="<?php echo U('del',array('did'=>$s['did']));?>" onclick="return confirm('你确定将该代理的代理资格删除么?');">取消代理资格</a> |
                <a href="<?php echo U('Product/manage',array('goods_gid'=>$d['gid']));?>">查看其管理医院</a>
            </td>
        </tr>
    <?php $hd["list"]["s"]["first"]=false;
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