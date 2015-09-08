<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    	<script src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yisheng/data/tongji-1.js" type="text/javascript" charset="utf-8"></script>
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
        <title>中国保健大夫保健医生申请</title>
        <link href="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yisheng/data/public.css" rel="stylesheet" type="text/css">
        <link href="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yisheng/data/topics.css" rel="stylesheet" type="text/css">
        <link href="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yisheng/data/pop.css" rel="stylesheet" type="text/css">
        <link href="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yisheng/data/20140925.css" rel="stylesheet" type="text/css">
        <link href="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yisheng/data/formStyle.css" rel="stylesheet" type="text/css">
        <style>
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
            </script></head><body><div id="baidu_stat_id" style="display:none;"><script src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yisheng/data/h.js" type="text/javascript"></script></div>
            <script type="text/javascript" src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yisheng/data/jquery-1.js" charset="utf-8"></script>
            <script type="text/javascript" src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yisheng/data/baihe.js" charset="utf-8"></script>
            <script type="text/javascript" src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yisheng/data/city.js" charset="utf-8"></script>
            <script type="text/javascript" src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yisheng/data/jquery.js" charset="utf-8"></script>    
            <script type="text/javascript" src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yisheng/data/reg_landpage.js" charset="utf-8"></script>
            <script language="javascript" src="http://localhost/baojiandaifu/YIYUAN/Admin/View/Yisheng/data/ckadinfo.js" charset="utf-8"></script>
			
            <script language="javascript">history.forward(1);</script>
        

        
            <div class="header">
            <input value="-1" id="lpGenderH" type="hidden">
            <input value="" id="lpEmailH" type="hidden">
            <input value="" id="lpPasswordH" type="hidden">
            <input value="" id="lpNicknameH" type="hidden">

            <h1 id="toubu"><strong>修改保健医生信息</strong></h1>
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
                            	                                      <dt id="mobile_dt">姓名</dt>
									<dd>
										<input class="inp" name="yishengname" id="nikename" type="text" value="<?php echo $y['yishengname'];?>">
										<div class="prompt" id="nikename_msg"></div>
									</dd>
                                    <dt id="mobile_dt">联系方式</dt>
                                    <dd id="mobile_dd">
                                        <input class="inp" name="yishengnumber" id="mobile_new" type="text" value="<?php echo $y['yishengnumber'];?>">
                                        <div class="prompt" id="mobile_msg"></div>
                                    </dd>
                                    <dt id="mobile_dt">单位电话</dt>
                                    <dd id="mobile_dd">
                                        <input class="inp" name="guhua" id="mobile_new" type="text" value="<?php echo $y['guhua'];?>">
                                        <div class="prompt" id="mobile_msg"></div>
                                    </dd>
									<dt id="mobile_dt">照片上传</dt>
                                    <dd id="mobile_dd">
                    <input type="file" name='img' value="<?php echo $y['img'];?>" class='inp'/>
                  </li>
                                        <div class="prompt" id="mobile_msg"></div>
                                    </dd>
									<dt id="mobile_dt">所属医院</dt>
                                    <dd id="mobile_dd">
                                        <input class="inp" name="yiyuanname" id="mobile_new" type="text" value="<?php echo $y['yiyuanname'];?>">
                                        <div class="prompt" id="mobile_msg"></div>
                                    </dd>
                                    <dt id="mobile_dt">管理账号</dt>
                                    <dd id="mobile_dd">
                                        <input class="inp" name="username" id="mobile_new" type="text"  value="<?php echo $y['username'];?>">
                                        <div class="prompt" id="mobile_msg"></div>
                                    </dd>
                                    <dt id="mobile_dt">管理密码</dt>
                                    <dd id="mobile_dd">
                                        <input class="inp" name="password" id="mobile_new" type="text" value="<?php echo $y['password'];?>">
                                        <div class="prompt" id="mobile_msg"></div>
                                    </dd>

                            <dt id="mobile_dt">职称</dt>
                                    <dd id="mobile_dd">
                                        <input class="inp" name="ys_zhiwei" id="mobile_new" type="text" value="<?php echo $y['ys_zhiwei'];?>">
                                        <div class="prompt" id="mobile_msg"></div>
                                    </dd>
                            <dt style="width:42px;">科室</dt>
                            <dd class="w02" style="z-index:3">
                                <input name="" value="内科" readonly="readonly" class="inp02" id="mymarriage" type="text" value="<?php echo $y['keshi'];?>">
                                <input name="keshi" id="csmarriage" value="内科" type="hidden">
                                <div class="prompt" id="mymarriage_msg"><div class="ok">正确</div></div>

                                <div class="infolayer01" style="height:70px; display:none;" id="_mymarriage">
                                    <a class="selectHeight" href="#" value="1_五官科">五官科</a>
                                    <a href="#" value="2_内科">内科</a>
                                    <a href="#" value="3_外科">外科</a>
                                    <a href="#" value="3_妇产科">妇产科</a>
                                    <a href="#" value="3_心理门诊">心理门诊</a>
                                    <a href="#" value="3_放射科">放射科</a>
                                </div>
                            </dd>


                                                                                   
                            <div id="vCodeInfo"></div>
                        </dl>
                        <!-- <div id="showverifydiv" class="clear"></div> -->
                        <div class="clear"></div>
                        <div style="display:none;"><textarea name="goldUserDesc_userDesc" id="userdesc" cols="30" rows="10"></textarea></div>

                        <!--a href="javascript:checkAll();" class="icon">注册完成</a-->
                        <input name="" value="提交申请" class="icon"  type="submit">
                    </div>
                   </div>
            </div>
        </form>

         
    

</body></html>