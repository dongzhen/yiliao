<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    	<script src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng/data/tongji-1.js" type="text/javascript" charset="utf-8"></script>
    	<script type="text/javascript">
    		var showInfoStatu=0;
                var lianheStatu=0;
    		if (showInfoStatu == -1) {
        		baihe.bhtongji.tongji({'event':'0','spm':'4.10.58.236.711'});
    		}else{
    			var bhtjtype = baihe.bhtongji.tj_getCookie("tongjiType");
    			if(bhtjtype!='cate01' && bhtjtype!='zonghe' && bhtjtype!='newlandpage'){
    				baihe.bhtongji.tongji({'event':'1','spm':'4.10.67.236.800'});
    			}
        	}
            /********************************3g跳转**********************************/
            var browserName_ = navigator.userAgent ;
            if(browserName_.indexOf("iPad")<0&&browserName_.indexOf("Windows NT")<0&&browserName_.indexOf("Macintosh")<0){
                if(browserName_.indexOf("Linux")>0){
                    if(browserName_.indexOf("Mobile")>0||browserName_.indexOf("U;")>0){
                        location.href="";
                    }
                }
                else{
                    location.href="";
                }
            } else{
                if(browserName_.indexOf("baidu Transcoder")>0){
                    location.href="";
                }
            }           
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>保健医生查询</title>
        <link href="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng/data/public.css" rel="stylesheet" type="text/css">
        <link href="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng/data/topics.css" rel="stylesheet" type="text/css">
        <link href="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng/data/pop.css" rel="stylesheet" type="text/css">
        <link href="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng/data/20140925.css" rel="stylesheet" type="text/css">
        <link href="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng/data/formStyle.css" rel="stylesheet" type="text/css">
        <style>

    /*头部开始*/
        body{
            margin: 0;
            padding: 0;
        }
        #top{
            height: 30px;
            width: 100%;
            background: #A9DBF6;
        }
        .top_center{
            width: 1500px;
            height: 30px;
            margin: 0 auto;
            /*background: yellow;*/
        }
        .huanying{
            width: 300px;
            height: 30px;
            color: white;
            font-size: 18px;
            font-weight: 500;
            font-family: "微软雅黑";
            text-align: center;
            float: left;
            /*background: green;*/
        }
        .tuichu{
            float: right;
            height: 28px;
            width: 128px;
            color: white;
            border: 2px solid white;
            border-right: none;
            border-top: none;
            border-bottom: none;
            text-align: center;
            font-size: 18px;
            font-family: "微软雅黑";
            cursor: pointer;
        position: absolute;
        left: 1100px;
            /*background: yellow;*/
        }
        /*导航块开始*/
        #daohang{
            width: 1583px;
            height: 80px;
            border: 1px solid #E6E6E6;
            border-right: none;
            border-left: none;
            border-top: none;
            margin: 0 auto;
            margin-top: 20px;
            /*border: 1px solid red;*/
        }
        .d_center{
            width: 1280px;
            height: 80px;
            margin: 0 auto;
            /*background: green;*/
            position: relative;

        }
        .logo{
            width: 180px;
            height: 80px;
            position: absolute;
            top: -10px;

        }
        .dianhua{
            width: 1100px;
            height: 40px;
            position: absolute;
            left: 180px;
            top: 0;
            /*background:yellow;*/
            /*border: 1px solid red;*/
        }
        .tubiao{
            /*background: yellow;*/
            position: absolute;
            top: -10px;
        }
        .dh{
            width: 400px;
            height: 40px;
            /*background: green;*/
            left: 700px;
            position: absolute;
        }
        .nb{
            width: 350px;
            height: 40px;
            position: absolute;
            left: 670px;
            color: #67A331;
            font-size: 25px;
            font-family: "微软雅黑";
            font-weight: 600;
            text-align: center;
            line-height: 40px;

        }
        .fuwu{
            width: 1100px;
            height: 40px;
            position: absolute;
            left: 100px;
            top: 40px;
            line-height: 10px;
            /*border: 1px solid red;*/
            /*background: yellow;*/
        }
        .fw{
            list-style: none;
            position: absolute;
            width: 600px;
            height: 40px;
            left: 650px;

        }
        .fw a{
            text-decoration: none; 
            font-size: 18px;
            font-family: "微软雅黑"; 
            color: #423232;          
        }
        .fw a:hover{
            color: red;
        }
        .fw li{
            float: left;
            margin-left: 20px;

        }
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
        #anniu{
            background: #67A331;
        }
        #toubu{
        	position: absolute;
        	left: 46%;
        	top: 20px;
        }
                #wanshan{
        	position: absolute;
        	top: 70px;
        	left:44%;
        }
        #neirong{
        	        	position: absolute;
        	left: 34%;
        }
            .cont .infolayer01 a.selectHeight{
                background: #ff8000; color: #fff;}
            </style>
            <script type="text/javascript">
                //var g_ = 1;
                //var ta = "她";
                var showVerify=0;
                var jsonuserinfo = {"userAccount":"856296660@qq.com","nickname":"","gender":"","birthday":"","city":"","height":"","education":"","income":"","marriage":"1","country":"","province":"","district":"","familyDescription":"","mobileContact":"","isCreditedByMobile":"","cityChn":""};
                function  baidu_stat(){
                    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
                    document.write("<div id='baidu_stat_id' style='display:none;'>");
                    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F5caa30e0c191a1c525d4a6487bf45a9d' type='text/javascript'%3E%3C/script%3E"));
                    document.write("</div>");
                }
                baidu_stat();
                document.getElementById("baidu_stat_id").style.display="none"; 
            </script></head><body><div id="baidu_stat_id" style="display:none;"><script src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng/data/h.js" type="text/javascript"></script></div>
            <script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng/data/jquery-1.js" charset="utf-8"></script>
            <script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng/data/baihe.js" charset="utf-8"></script>
            <script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng/data/city.js" charset="utf-8"></script>
            <script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng/data/jquery.js" charset="utf-8"></script>    
            <script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng/data/reg_landpage.js" charset="utf-8"></script>
            <script language="javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Yonghuyisheng/data/ckadinfo.js" charset="utf-8"></script>
			
            <script language="javascript">history.forward(1);</script>
        
 <!-- 头部开始 -->
        <div id="top">
            <div class="top_center">
                <span class="huanying">欢迎您</span>
                <span class="tuichu"><a href="<?php echo U('Login/out');?>" style="color:black;">安全退出</a></span>
            </div>
        </div>
    <!-- 导航块开始 -->
        <div id="daohang">
            <div class="d_center">
                <div class="logo"> 
                    中国保健大夫               
                </div>
                <div class="fuwu">
                    <ul class="fw">
                <a class="li" href="<?php echo U('Index/yonghu');?>">首页</a>&nbsp|
                <a class="li" href="<?php echo U('Yonghuyisheng/shenqing');?>">申请保健医生</a>&nbsp|
                <a class="li" href="<?php echo U('Yonghuyiyuan/shenqing');?>">申请保健医院</a>&nbsp|
                <a class="li" href="<?php echo U('Xinxi/index');?>">健康信息反馈</a>
                    </ul>
                </div>       
            </div>
        </div>
        
            <div class="header">
            <input value="-1" id="lpGenderH" type="hidden">
            <input value="" id="lpEmailH" type="hidden">
            <input value="" id="lpPasswordH" type="hidden">
            <input value="" id="lpNicknameH" type="hidden">

            <h1 id="toubu"><strong>查找您想要申请为保健医生的医生</strong></h1>
                <div class="angle"></div>
            </div>
            
        </div>
        <form id="regForm" name="regForm" action="" method="POST" enctype='multipart/form-data'>
            <div class="content" id="neirong">
                <div class="cont">
                    <div class="apply">
                        <div id="infoSta">
                            <div id="accountstatus2">
                            	  <dl id="authValiCode">
                            	                                      
																											<dt>地区</dt>
									<dd style="z-index:5">
										<input name="dizhi" id="mycityId" value="" type="hidden">
										<div class="bor">
											<input name="" id="ci1" value="请选择" readonly="readonly" class="inp03" type="text">
											<input name="" id="ci2" value="请选择" readonly="readonly" class="inp03" type="text">
											<input name="" id="ci3" value="请选择" readonly="readonly" class="inp03" style="padding-right: 12px;" type="text">                             
										</div>
	
										<div class="prompt" id="mycity_msg"></div>
	
										<div class="infolayer" style="display:none;" id="_ci1">
											<p>
												<a id="8611" href="javascript:choosePro('8611');">北京市</a>
												<a id="8612" href="javascript:choosePro('8612');">天津市</a>
												<a id="8613" href="javascript:choosePro('8613');">河北省</a>
												<a id="8614" href="javascript:choosePro('8614');">山西省</a>
												<a id="8615" href="javascript:choosePro('8615');">内蒙古</a>
												<a id="8621" href="javascript:choosePro('8621');">辽宁省</a>
												<a id="8622" href="javascript:choosePro('8622');">吉林省</a>
												<a id="8623" href="javascript:choosePro('8623');">黑龙江省</a>
												<a id="8631" href="javascript:choosePro('8631');">上海市</a>
												<a id="8632" href="javascript:choosePro('8632');">江苏省</a>
												<a id="8633" href="javascript:choosePro('8633');">浙江省</a>
												<a id="8634" href="javascript:choosePro('8634');">安徽省</a>
												<a id="8635" href="javascript:choosePro('8635');">福建省</a>
												<a id="8636" href="javascript:choosePro('8636');">江西省</a>
												<a id="8637" href="javascript:choosePro('8637');">山东省</a>
												<a id="8641" href="javascript:choosePro('8641');">河南省</a>
												<a id="8642" href="javascript:choosePro('8642');">湖北省</a>
												<a id="8643" href="javascript:choosePro('8643');">湖南省</a>
												<a id="8644" href="javascript:choosePro('8644');">广东省</a>
												<a id="8645" href="javascript:choosePro('8645');">广西</a>
												<a id="8646" href="javascript:choosePro('8646');">海南省</a>
												<a id="8650" href="javascript:choosePro('8650');">重庆市</a>
												<a id="8651" href="javascript:choosePro('8651');">四川省</a>
												<a id="8652" href="javascript:choosePro('8652');">贵州省</a>
												<a id="8653" href="javascript:choosePro('8653');">云南省</a>
												<a id="8654" href="javascript:choosePro('8654');">西藏</a>
												<a id="8661" href="javascript:choosePro('8661');">陕西省</a>
												<a id="8662" href="javascript:choosePro('8662');">甘肃省</a>
												<a id="8663" href="javascript:choosePro('8663');">青海省</a>
												<a id="8664" href="javascript:choosePro('8664');">宁夏</a>
												<a id="8665" href="javascript:choosePro('8665');">新疆</a>
												<a id="8671" href="javascript:choosePro('8671');">台湾省</a>
												<a id="8681" href="javascript:choosePro('8681');">香港</a>
												<a id="8682" href="javascript:choosePro('8682');">澳门</a>
											</p>
										</div>
	
										<div class="infolayer" style="display:none;" id="_ci2">
											<p>
											</p>
										</div>
	
										<div class="infolayer" style="display:none;" id="_ci3">
											<p>
											</p>
										</div>
	
										
									</dd>
									</dl>
                            </div>
                        </div>
                        <dl>
                            

                                                                                   
                            <div id="vCodeInfo"></div>
                        </dl>
                        <!-- <div id="showverifydiv" class="clear"></div> -->
                        <div class="clear"></div>
                        <div style="display:none;"><textarea name="goldUserDesc_userDesc" id="userdesc" cols="30" rows="10"></textarea></div>

                        <!--a href="javascript:checkAll();" class="icon">注册完成</a-->
                        <input name="" value="查找" class="icon"  type="submit">
                    </div>
                   </div>
            </div>
        </form>

         
    

</body></html>