<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>省代理添加</title>
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
URL = 'http://localhost/yiyuan/index.php/Admin/Sheng/edit/did/35';
APP = 'http://localhost/yiyuan/YIYUAN';
COMMON = 'http://localhost/yiyuan/YIYUAN/Common';
HDPHP = 'http://localhost/yiyuan/hdphp/hdphp';
HDPHPDATA = 'http://localhost/yiyuan/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/yiyuan/hdphp/hdphp/Extend';
MODULE = 'http://localhost/yiyuan/index.php/Admin';
CONTROLLER = 'http://localhost/yiyuan/index.php/Admin/Sheng';
ACTION = 'http://localhost/yiyuan/index.php/Admin/Sheng/edit';
STATIC = 'http://localhost/yiyuan/Static';
HDPHPTPL = 'http://localhost/yiyuan/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/yiyuan/YIYUAN/Admin/View';
PUBLIC = 'http://localhost/yiyuan/YIYUAN/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/yiyuan/YIYUAN/Admin/View/Sheng';
HISTORY = 'http://localhost/yiyuan/index.php/Admin/Sheng/index';
</script>
</head>
<body>
	<div class='wrap'>
		<div class='menu_list'>
			<ul>
				<li>
					<a href="<?php echo U('index');?>">点击去省代理列表</a>
				</li>
		</ul>
		</div>
		<form action="" method='post'>
			<div class='title-header'>添加省代理</div>
			<table class='table1 hd-form'>

				<tr>
					<th>省份</th>
					<td>
						<select name="pid" id="">
							<option value="">请选择省份</option>
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

								<option value="<?php echo $s['sid'];?>"><?php echo $s['sname'];?></option>
							<?php $hd["list"]["s"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
						</select>
					</td>
				</tr>
				<tr>
					<th>公司名称</th>
					<td>
						<input type="text" name='dname' class='w200' value="<?php echo $dl['dname'];?>">
					</td>
				</tr>				
				<tr>
					<th>负责人姓名</th>
					<td>
						<input type="text" value='<?php echo $dl['duser'];?>' name='duser' class='w200'> 
					</td>
				</tr>
				<tr>
					<th>负责人联系方式</th>
					<td>
						<input type="text" value='<?php echo $dl['dnumber'];?>' name='dnumber' class='w200'> 
					</td>
				</tr>
				<tr>
					<th>公司地址</th>
					<td>
						<input type="text" value='<?php echo $dl['ddizhi'];?>' name='ddizhi' class='w200'> 
					</td>
				</tr>
				<tr>
					<th>代理登录权限帐号</th>
					<td>
						<input type="text"  value="<?php echo $dl['dkey'];?>" name='dkey' class='w200'> 
					</td>
				</tr>
				<tr>
					<th>代理登陆权限密码</th>
					<td>
						<input type="text" value="<?php echo $dl['dpassword'];?>" name='dpassword' class="w200">
					</td>
				</tr>
			</table>
			<input type="submit" class='hd-success' value='修改'/>
	</form>
	</div>
	
</body>
</html>