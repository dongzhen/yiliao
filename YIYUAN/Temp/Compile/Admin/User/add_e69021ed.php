<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC >
<html>
<head>
<style type="text/css">
	ul{
		list-style: none;
		margin-top: 20px;


	}
	ul li{
		width:400px;
		height:60px;
		line-height: 80px;
		text-align: center;
		font-size: 20px;
		color: #143350;
		font-weight: 500;
		font-family: "微软雅黑";
		/*background: yellow;*/
	}
	.tianjia{
		font-size: 20px;
		color: #143350;
		font-weight: 500;
		font-family: "微软雅黑";
	}
	.hd-success{
		width: 50px;
		height: 30px;
		margin-left: 6%;
		cursor: pointer;
	}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script src="http://localhost/baojiandaifu/YIYUAN/Admin/View/User/js/jquery-1.7.min.js" type="text/javascript"></script>
<script src="http://localhost/baojiandaifu/YIYUAN/Admin/View/User/js/Area.js" type="text/javascript"></script>
<script src="http://localhost/baojiandaifu/YIYUAN/Admin/View/User/js/AreaData_min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function (){
	initComplexArea('seachprov', 'seachcity', 'seachdistrict', area_array, sub_array, '44', '0', '0');
});

//得到地区码
function getAreaID(){
	var area = 0;          
	if($("#seachdistrict").val() != "0"){
		area = $("#seachdistrict").val();                
	}else if ($("#seachcity").val() != "0"){
		area = $("#seachcity").val();
	}else{
		area = $("#seachprov").val();
	}
	return area;
}

function showAreaID() {
	//地区码
	var areaID = getAreaID();
	//地区名
	var areaName = getAreaNamebyID(areaID) ;
	alert("您选择的地区码：" + areaID + "      地区名：" + areaName);            
}

//根据地区码查询地区名
function getAreaNamebyID(areaID){
	var areaName = "";
	if(areaID.length == 2){
		areaName = area_array[areaID];
	}else if(areaID.length == 4){
		var index1 = areaID.substring(0, 2);
		areaName = area_array[index1] + " " + sub_array[index1][areaID];
	}else if(areaID.length == 6){
		var index1 = areaID.substring(0, 2);
		var index2 = areaID.substring(0, 4);
		areaName = area_array[index1] + " " + sub_array[index1][index2] + " " + sub_arr[index2][areaID];
	}
	return areaName;
}
</script>

</head>
<body>
<center>
<ul>
<form action="" method='post'>
	<li class="tianjia">添加帐号</li>
	<li>帐号：<input type="text"  value="" name="username"></li>
	<li>密码：<input type="text" value="" name="password"></li>
	<li>权限等级：<input type="radio"  value="1" name="quanxian">一级<input type="radio"  value="2" name="quanxian">二级</li>
</ul>
<input type="submit" class='hd-success' value='添加'/>
</form>
</span>



</center>
<div style="text-align:center;clear:both">
</div>
</body>
</html>