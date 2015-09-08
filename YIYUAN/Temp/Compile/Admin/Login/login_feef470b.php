<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理登录</title>
	<style type="text/css">
		*{ padding: 0; margin: 0; background: #f4f7f9;}
		input{ border: none;}
		#boxs{ 
			width: 400px;
			height: 300px; 
			position: relative; 
			top:10%; 
			left: 50%; 
			margin-left:-226px; 
			margin-top:120px; 
			background: #fff; border: 2px #e5e5e5 solid; border-radius: 8px;}
		#boxs .tops{ height: 50px; background: url(http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/images/login_bg.png) repeat-x; border-radius:5px 5px 0px 0px; text-align: center; line-height: 50px; letter-spacing: 1px; color: #fff;}
		#boxs form { padding: 20px 40px; background: #fff;}
		#boxs form .tb{ background: #fff; width:340px; }
		#boxs form tr{ height: 50px;}
		#boxs form .tb .tdl{ width: 60px; height: 35px; line-height: 35px; font-size: 14px; color: #4574b4; }
		#boxs form .tb .tbr{ height: 40px; }
		#boxs form .tb .tbr .input_text{ height: 35px; padding-left: 10px; width: 240px; background: #fff; border: 1px #ccc solid; color: #7f7f7f;}
		#boxs form .tb .tbr .pass{ height: 35px; padding-left: 10px; width: 240px; background: #fff; border: 1px #ccc solid; color: #7f7f7f;}
		#boxs form .tb .tbr .yzm{ height: 35px; padding-left: 10px; width: 80px; background: #fff; border: 1px #ccc solid; color: #7f7f7f; float: left;  margin-right: 10px;}
		#boxs form .tb .tbr .imgs{ width: 80px; height: 35px; border: 1px #ccc solid; float: left; background: #fff;}
		#boxs form .tb .tbr a{ height: 35px; line-height: 35px; display: block; width: 70px; text-align: center;  float: left; background: #fff; color: #87a2bc; text-decoration: none; }
		#boxs form .tb td{ background: #fff;}
		#boxs .sub{ width: 100px; height: 35px; background: url(http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/images/login_user.png) repeat-x; border-radius: 5px; color: #fff; font-weight: 700; margin-top: 15px; font-size: 14px; letter-spacing: 2px;}
		#quanxian{
			width: 300px;
			height: 400px;
			/*background: yellow;*/
			position: absolute;
			left: 65%;
			top: 10%;
		}
		#qxxz{
			width: 300px;
			height: 40px;
			color: #5078D7;
			font-family: "微软雅黑";
			font-weight: 500;
			font-size: 18px;
			line-height: 40px;
			text-align: center;
			position: absolute;
			top: 100px;
		}
		#sd{
			width: 300px;
			height: 40px;
			color: #5078D7;
			font-family: "微软雅黑";
			font-weight: 500;
			font-size: 18px;
			line-height: 40px;
			text-align: center;
			position: absolute;
			background: #578CD8;
			top: 160px;
			cursor: pointer;
			color: white;
		}
		a{
			background: #578CD8;
			text-decoration: none;
			color: white;
			width: 300px;
			height: 40px;
		}
		a:hover{
			color: red;
		}
		.sub{
			margin-left: 115px;
			cursor: pointer;
		}
		#yd{
			width: 300px;
			height: 40px;
			color: #5078D7;
			font-family: "微软雅黑";
			font-weight: 500;
			font-size: 18px;
			line-height: 40px;
			text-align: center;
			position: absolute;
			background: #578CD8;
			top: 210px;
			cursor: pointer;
			color: white;
		}
		#quanxian{
			width: 150px;
			height: 200px;
			/*background: yellow;*/
			position: absolute;
			top: 36%;
			right: 10%;
		}
		#yisheng{
			position: absolute;
			width: 150px;
			height: 50px;background: #578FD9;
			text-decoration: none;
			text-align: center;
			line-height: 50px;
			cursor: pointer;
		}
		#yiyuan{
			position: absolute;
			width: 150px;
			top: 70px;
			height: 50px;background: #578FD9;
			text-decoration: none;
			text-align: center;
			line-height: 50px;
			cursor: pointer;
		}


	</style>
</head>
<body>
	<div id="boxs">
		<div class="tops">
			医疗网站管理系统
		</div>
		<form action="" method="post">
			<table border="0" class="tb">
				<tr>
					<td class="tdl">用户名</td>
					<td class="tbr"><input type="text" name="username" class="input_text"></td>
				</tr>
				<tr>
					<td class="tdl">密&nbsp;&nbsp;&nbsp;&nbsp;码</td>
					<td class="tbr"><input type="password" name="password" class="pass"></td>
				</tr>
				<tr>
					<td class="tdl">验证码</td>
					<td class="tbr">
						<input type="text" maxlength="4" size="4" name="code" class="yzm">
						<img src="<?php echo U('code');?>" onclick="this.src='<?php echo U('code');?>&'+Math.random()" class='imgs'><a href="">换一张</a>
					</td>
				</tr>
			</table>
			<input type="submit" value="登录" class="sub">
		</form>
	</div>

	<div id="quanxian">
		<a id="yisheng" href="<?php echo U('login/ylogin');?>">保健医生入口</a>
		<a id="yiyuan" href="<?php echo U('Index/login/yylogin');?>">保健医院入口</a>
	</div>
</body>
</html>