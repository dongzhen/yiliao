<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>您所要查看对应地区的保健医生</title>
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
URL = 'http://localhost/baojiandaifu/index.php/Admin/Yiyuan/chakan';
APP = 'http://localhost/baojiandaifu/YIYUAN';
COMMON = 'http://localhost/baojiandaifu/YIYUAN/Common';
HDPHP = 'http://localhost/baojiandaifu/hdphp/hdphp';
HDPHPDATA = 'http://localhost/baojiandaifu/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/baojiandaifu/hdphp/hdphp/Extend';
MODULE = 'http://localhost/baojiandaifu/index.php/Admin';
CONTROLLER = 'http://localhost/baojiandaifu/index.php/Admin/Yiyuan';
ACTION = 'http://localhost/baojiandaifu/index.php/Admin/Yiyuan/chakan';
STATIC = 'http://localhost/baojiandaifu/Static';
HDPHPTPL = 'http://localhost/baojiandaifu/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/baojiandaifu/YIYUAN/Admin/View';
PUBLIC = 'http://localhost/baojiandaifu/YIYUAN/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/baojiandaifu/YIYUAN/Admin/View/Yiyuan';
HISTORY = 'http://localhost/baojiandaifu/index.php/Admin/Yiyuan/chakan';
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
    <script type="text/javascript" src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yiyuan/Js/js.js"></script>
    <script src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yiyuan/js/jquery-1.7.min.js" type="text/javascript"></script>
<script src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yiyuan/js/Area.js" type="text/javascript"></script>
<script src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yiyuan/js/AreaData_min.js" type="text/javascript"></script>


</head>
<body>
<div class='menu_list'>
    <ul>
        <li>
            <a href="<?php echo U('add');?>">添加保健医生</a>
        </li>
        <li>
            <a href="<?php echo U('chakan');?>">查看保健医生</a>
        </li>
    </ul>
</div>

<table class='table2'>
    <thead>
    <tr>
        <td class=''>医生名称</td>
        <td class="">医院等级</td>
        <td class=''>联系电话</td>
        <td class="">医院类型</td>
        <td class="">后台管理账号</td>
        <td class="">后台管理密码</td>
        <td class="">操作</td>
    </tr>
    </thead>
    <tbody>
    <?php $hd["list"]["y"]["total"]=0;if(isset($yy) && !empty($yy)):$_id_y=0;$_index_y=0;$lasty=min(1000,count($yy));
$hd["list"]["y"]["first"]=true;
$hd["list"]["y"]["last"]=false;
$_total_y=ceil($lasty/1);$hd["list"]["y"]["total"]=$_total_y;
$_data_y = array_slice($yy,0,$lasty);
if(count($_data_y)==0):echo "";
else:
foreach($_data_y as $key=>$y):
if(($_id_y)%1==0):$_id_y++;else:$_id_y++;continue;endif;
$hd["list"]["y"]["index"]=++$_index_y;
if($_index_y>=$_total_y):$hd["list"]["y"]["last"]=true;endif;?>

        <tr>
            <td style="display:none;"><?php echo $y['nid'];?></td>
            <td><?php echo $y['yiyuanname'];?></td>
            <td><?php echo $y['yiyuandengji'];?></td>
            <td><?php echo $y['yishengnumber'];?></td>
            <td><?php echo $y['yiyuanleixing'];?></td>
            <td><?php echo $y['yypassword'];?></td>
            <td><?php echo $y['yyusername'];?></td>
            <td>
                <a href="<?php echo U('edit',array('uid'=>$y['uid']));?>">编辑</a> |
                <a href="<?php echo U('del',array('uid'=>$y['uid']));?>" onclick="return confirm('你确定将该代理的代理资格删除么?');">解除合作</a> |
                <a href="">查看其管理用户</a>
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
<script type="text/javascript" src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yiyuan/js/js.js"></script>
<div class='page1'>
   <?php echo $page;?>
</div>
</body>
</html>


















