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
			<form action="" method="post">
			<ul id="buchong">
				<li>姓名：<input type="text" name="xingming" value="<?php echo $data['xingming'];?>">性别：<input type="text" name="xingbie" value="<?php echo $data['xingbie'];?>">出生日期：	<input type="text" name="shengri" value="<?php echo $data['shengri'];?>">民族：<input type="text" name="minzu" value="<?php echo $data['minzu'];?>">
				</li>
				<li>
					婚姻：<input type="text" name="hunyin" value="<?php echo $data['hunyin'];?>">职业：<input type="text" name="zhiye" value="<?php echo $data['zhiye'];?>">血型：<input type="text" name="xuexing" value="<?php echo $data['xuexing'];?>">
				</li>
				<li id="t">
					过敏史：<textarea name="guominshi" id="" cols="" rows="" style="width:600px;height:100px;margin-left:100px;" value="<?php echo $data['jiwangshi'];?>"><?php echo $data['guominshi'];?></textarea>
				</li>
				<li style="height:30px;"></li>
				<li id="t">
					既往史：<textarea name="jiwangshi" id="" cols="" rows=""style="width:600px;height:100px;margin-left:100px;" ><?php echo $data['jiwangshi'];?></textarea>
				</li>
				<li>
					<input type="submit" value="提交信息" >
				</li>
			</ul>
		</div>
		</form>
		

	</body>
</html>
