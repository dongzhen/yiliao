<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<style type="text/css">
			#wanshan{
				width: 1000px;
				background: #DDDDDD;
				height: 600px;
				/*margin: 0 auto;*/
				margin-left: 200px;
			}
			.top{
				width: 100%;
				height: 80px;
				font-family: "微软雅黑";
				text-align: center;
				line-height: 80px;

			}
			#buchong{
				width:950px;
				height: 500px;
				/*margin: 0 auto;*/
				/*background: yellow;*/
				list-style: none;
			}
			#buchong li{
				text-align: center;
			}
			#buchong li{
				height: 100px;
				line-height: 100px;
			}
			#t{
				height: 120px;
				width: 1000px;
				line-height: 120px;
			}

		</style>
	</head>
	<body>
		<div id="wanshan">
			<div class="top">
				请完善您的健康信息
			</div>
			<ul id="buchong">
				<li>姓名：<input type="text">性别：<input type="text">出生日期：	<input type="text">民族：<input type="text">
				</li>
				<li>
					婚姻：<input type="text">职业：<input type="text">血型：<input type="text">
				</li>
				<li id="t">
					<textarea name="jiwangshi" id="" cols="" rows="" style="width:600px;height:100px;margin-left:100px;">在这里填入您的过敏史</textarea>
				</li>
				<li style="height:30px;"></li>
				<li id="t">
					<textarea name="" id="" cols="" rows=""style="width:600px;height:100px;margin-left:100px;">在这里填入您的既往史</textarea>
				</li>
				<li>
					<input type="submit" value="提交信息" >
				</li>
			</ul>
		</div>
		

	</body>
</html>
