<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}
		a{
			text-decoration: none;
			color: black;
			font-family: "微软雅黑";
			margin-top: 5px;
		}
		a:hover{
			color: white;
		}
		#zhu{
			width: 1400px;
			height: 700px;
			margin: 0 auto;
		}
		#denglu{
			width: 400px;
			height: 340px;
			border: 1px solid #D7D6D2;
			position: absolute;
			left: 57%;
			top:16%;
			background:white;
		}
		.biao{
			width: 400px;
			height: 60px;
			background: #DADEDF;
			text-align: center;
			line-height: 60px;
			font-family: "微软雅黑";
			font-size: 20px;
			color: black;
		}
		.shu{
			width: 360px;
			height: 200px;
			/*background: #DADEDF;*/
			margin: 0 auto;
			margin-top: 20px;

		}
		#login{
			list-style: none;
		}
		#login li{
			height:60px;
			width: 360px;
			line-height: 60px;
			/*border: 1px solid red;*/
			text-align: center;
			font-family: "微软雅黑";
		}
		.kuang{
			height: 40px;
			width: 266px;
		}
		.deng{
			width: 120px;
			height: 40px;
			background: #317EF3;
			color: white;
			font-family: "微软雅黑";
			border: none;
			cursor: pointer;
			font-weight: 500;
			font-size: 20px;
		}
		.deng:hover{
			color: black;
		}
		#zhuce{
			width: 400px;
			height: 60px;
			border-top: 1px solid #D7D6D2;
			text-align: center;
			color: #5B5B5B;
			font-family: "微软雅黑";
			font-size: 14px;
			font-weight: 400;
			background: #CCCCCC;
		}
		#xuan{
			margin-top: 5px;
		}
		</style>
	</head>
	<body>
		<div id="zhu">
			<img src="http://localhost/baojiandaifu/YIYUAN/Index/View/Login/1.jpg" alt="" style="width:1400px;height:700px;">
		</div>

		<div id="denglu">
			<div class="biao">
				中国保健大夫用户登录
			</div>
			<form action="" method="post">
			<div class="shu">
				<ul id="login">
					<li>卡号：<input type="text" class="kuang" name="kahao"></li>
					<li>密码：<input type="text" class="kuang" name="password"></li>
					<li><input type="submit" value="登录" class="deng"></li>
				</ul>
			</div>
			</form>

			<div id="zhuce">
				<span>没注册卡号？先注册后才能进入哦！</span>
				<div id="xuan"><a href="">注册&nbsp</a><span style="color:black;">|</span><a href="">&nbsp保健医生申请</a><span style="color:black;">&nbsp|&nbsp</span><a href="">保健医院申请</a></div>
			</div>
		</div>
	</body>

</html>
