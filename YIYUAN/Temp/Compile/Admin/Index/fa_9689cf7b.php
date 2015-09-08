<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style type="text/css">
		*{ padding: 0; margin: 0;}
		body{ background: #FFF;}
		#cont_right{ position: absolute; top: 0px; left: 0px; right: 0; bottom: 0; }
		 .cont_lr{ height: 28px; border-top: 1px #fff solid; border-bottom: 1px #d4d4d4 solid; background: url(http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/images/navs_bg.png) repeat-x;}
		 .cont_lr p{ font-weight: 700; color: #555; line-height: 28px; font-size: 12px; padding-left: 10px;}
		 .contt{ padding: 10px;}
		table .tds{ width: 90px; font-size: 12px; font-weight: 700; text-align: right; color: #555571; height: 40px;}
		table .input_text{ height: 30px; line-height: 30px; border: 1px #ccc solid; width: 180px; padding-left: 10px; color: #00052E; background: #F6F6F6;}
		table .input_texts{ height: 30px; line-height: 30px; border: 1px #ccc solid; width: 80px; padding-left: 10px; color: #00052E; background: #F6F6F6;}
		table .inputs{ height: 30px; line-height: 30px; border: 1px #ccc solid; width: 120px; padding-left: 10px; color: #00052E; background: #F6F6F6;}
		table .inputss{ height: 30px; line-height: 30px; border: 1px #ccc solid; width: 50px; padding-left: 10px; color: #00052E; background: #F6F6F6;}
		table .inputt{ height: 30px; line-height: 30px; border: 1px #ccc solid; width: 450px; padding-left: 10px; color: #00052E; background: #F6F6F6;}
		table .input_textss{ height: 30px; line-height: 30px; border: 1px #ccc solid; width: 170px; padding-left: 10px; color: #00052E; background: #F6F6F6;}
		table .sele{ height: 32px; border: 1px #ccc solid; width: 100px; color: #00052E; background: #F6F6F6;}
		table .textarea{ height: 90px; border: 1px #ccc solid; width: 285px; color: #00052E; background: #F6F6F6; padding-left: 5px; line-height: 24px; margin:5px 0; resize:none; float: left;}
		table #input1{ border:1px solid #ccc; height: 30px; padding-left: 10px; background: #F6F6F6; width: 107px;}  
        table #btn1{ width:70px; height:32px; font-size:12px; background: url(http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/images/login_user.png) repeat-x; border: none; color: #fff; letter-spacing: 1px; border-radius: 3px; padding-left: 10px;} 
		.sub{ width: 80px; height: 32px; color: #fff; background: url(http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/images/login_user.png) repeat-x; border: none; border-radius: 2px; font-size: 14px; letter-spacing: 1px; margin:5px 0 5px 80px; font-weight: 700;}
		table label{ font-size: 12px; height: 24px; line-height: 24px; color: #555571;}
		table .zhu{ font-size: 12px; color: #ac0000;}
		table .zhus{ font-size: 12px; color: #ac0000; line-height: 100px;}
		.contt table td ul li{ margin-top: 5px;}
		.contt table td ul li a{ cursor: pointer;}
		.contt table td ul .lists a{ cursor: pointer; width: 50px;}
		.contt table td ul .lists a span{ width: 20px; float: right; line-height: 21px; height: 21px; display: block; background: url(http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/images/jia.png) no-repeat;}
		.contt table td ul .lists a b{ width: 20px; float: right; height: 21px; line-height: 21px; display: block; background: url(http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/images/jian.png) no-repeat;}
		.contt table td .attrs .listattr{ background: #fcfcfc; border: 1px #f0f0f0 solid; border-top: 2px #555571 solid;}

		.sub{
			position: absolute;
			top: 95%;
			left: 45%;
		}

	</style>
	<script>
        var goods_gid=0;
    </script>
	<script type='text/javascript' src='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdui/css/hdui.css' rel='stylesheet' media='screen'>
<script src='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdui/js/hdui.js'></script>
<link href='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/css/hdvalidate.css' rel='stylesheet' media='screen'>
<script src='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/js/hdvalidate.js'></script>
<script src='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/cal/lhgcalendar.min.js'></script>
<script src='http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/hdjs/hdslide/js/hdslide.js'></script>
<script type='text/javascript'>
HOST = 'http://127.0.0.1';
ROOT = 'http://127.0.0.1/baojiandaifu';
WEB = 'http://127.0.0.1/baojiandaifu/index.php';
URL = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Index/fa/hid/34';
APP = 'http://127.0.0.1/baojiandaifu/YIYUAN';
COMMON = 'http://127.0.0.1/baojiandaifu/YIYUAN/Common';
HDPHP = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp';
HDPHPDATA = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend';
MODULE = 'http://127.0.0.1/baojiandaifu/index.php/Admin';
CONTROLLER = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Index';
ACTION = 'http://127.0.0.1/baojiandaifu/index.php/Admin/Index/fa';
STATIC = 'http://127.0.0.1/baojiandaifu/Static';
HDPHPTPL = 'http://127.0.0.1/baojiandaifu/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View';
PUBLIC = 'http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Public';
CONTROLLERVIEW = 'http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index';
</script>
</head>
<body>
<div id="cont_right">

<div class="contt">
<form action="" method='post' enctype='multipart/form-data'>
	<div class="tab" style="list-style:none;">
		    <li style="width：50px;height:30px;">
		        <a>编辑信息并发送</a>
		    </li>

	        <div id="content">
	        	<table border="0">
	        		<tr>
	                    <td class="tds">标题：</td>
	                    <td>
	                        <input type="text" name="title" class="input_text" />
	                    </td>
	                </tr>
	                <tr>
	                    <td class="tds">备注：</td>
	                    <td>
	                        <textarea class="textarea" name="beizhu"></textarea>
	                    </td>
	                </tr>
	                <tr>
	        			<td class="tds">诊断信息：</td>
	        			<td>
	        				<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/Ueditor/ueditor.config.js"></script><script type="text/javascript" charset="utf-8" src="http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/Ueditor/ueditor.all.min.js"></script><script type="text/javascript">UEDITOR_HOME_URL="http://127.0.0.1/baojiandaifu/hdphp/hdphp/Extend/Org/Ueditor/"</script><script id="hd_content" name="content" type="text/plain"></script>
        <script type='text/javascript'>
        $(function(){
                var ue = UE.getEditor('hd_content',{
                serverUrl:'http://127.0.0.1/baojiandaifu/index.php?m=Admin&c=Index&hid=34&a=ueditor_upload&water='//图片上传脚本
                ,zIndex : 1000
                ,initialFrameWidth:"100%" //宽度1000
                ,catchRemoteImageEnable:false//关闭远程图片自动保存到本地
                ,initialFrameHeight:"300" //宽度1000
                ,imagePath:''//图片修正地址
                ,autoHeightEnabled:false //是否自动长高,默认true
                ,autoFloatEnabled:false //是否保持toolbar的位置不动,默认true
                ,toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat', 'formatmatch', 'autotypeset',
            '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', '|',
            'lineheight', '|','paragraph', 'fontfamily', 'fontsize', '|',
             'indent','justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|',
            'link', 'unlink', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'insertimage', 'emotion',   'map',  'insertcode',  'pagebreak','horizontal', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow',  'insertcol',  'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols']
            ]//工具按钮
                ,enableAutoSave: false//关闭自动保存
                ,initialStyle:'p{line-height:1em; font-size: 14px; }'
            });
        })
        </script>
	        			</td>
        			</tr>
	        	</table>
	        </div>


	        
	    </div>
	</div>
	<input type="submit" value='发送信息' class='sub' style=" cursor: pointer;">
</form>
</div>
</div>
<script>
	//添加上传表单
	function addUploadForm(){
		var html='<li class="lists">\
                            		<input type="file" name="img_original[]"/>\
                            		&nbsp;&nbsp;<a onclick="delUploadForm(this)"><b></b></a>\
	        					</li>';
		$(".contt table td ul").append(html);
		 
	}
	//移除上传表单
	function delUploadForm(Obj){
		$(Obj).parent().remove();
	}
</script>
<script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/Js/js.js"></script>
</body>
</html>