<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    	<script src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Login/data/tongji-1.js" type="text/javascript" charset="utf-8"></script>
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
        <title>中国保健大夫用户注册</title>
        <link href="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Login/data/public.css" rel="stylesheet" type="text/css">
        <link href="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Login/data/topics.css" rel="stylesheet" type="text/css">
        <link href="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Login/data/pop.css" rel="stylesheet" type="text/css">
        <link href="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Login/data/20140925.css" rel="stylesheet" type="text/css">
        <link href="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Login/data/formStyle.css" rel="stylesheet" type="text/css">
        <style>
        #toubu{
        	position: absolute;
        	left: 38%;
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
            </script></head><body><div id="baidu_stat_id" style="display:none;"><script src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Login/data/h.js" type="text/javascript"></script></div>
            <script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Login/data/jquery-1.js" charset="utf-8"></script>
            <script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Login/data/baihe.js" charset="utf-8"></script>
            <script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Login/data/city.js" charset="utf-8"></script>
            <script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Login/data/jquery.js" charset="utf-8"></script>    
            <script type="text/javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Login/data/reg_landpage.js" charset="utf-8"></script>
            <script language="javascript" src="http://127.0.0.1/baojiandaifu/YIYUAN/Index/View/Login/data/ckadinfo.js" charset="utf-8"></script>
			
            <script language="javascript">history.forward(1);</script>
        

        
            <div class="header">
            <input value="-1" id="lpGenderH" type="hidden">
            <input value="" id="lpEmailH" type="hidden">
            <input value="" id="lpPasswordH" type="hidden">
            <input value="" id="lpNicknameH" type="hidden">

            <h1 id="toubu"><strong>最方便</strong>最专业<span>|</span>实时健康监护<span>|</span>家庭健康保健开创者！</h1>
                <div class="angle"></div>
            </div>
        </div>
        <form id="regForm" name="regForm" action="" method="POST">
            <div class="content" id="neirong">
                <div class="cont">
                    <div class="apply">
                        <div id="infoSta                                                                       ">
                            <div id="accountstatus2">
                            	                                <dl id="authValiCode">
									<dt id="mobile_dt">手机号</dt>
                                    <dd id="mobile_dd">
                                        <input class="inp" name="number" id="mobile_new" type="text">
                                        <div class="prompt" id="mobile_msg"></div>
                                    </dd>
									<dt id="mobile_dt">卡号</dt>
                                    <dd id="mobile_dd">
                                        <input class="inp" name="kahao" id="mobile_new" type="text">
                                        <div class="prompt" id="mobile_msg"></div>
                                    </dd>
									<dt id="mobile_dt">密码</dt>
                                    <dd id="mobile_dd">
                                        <input class="inp" name="password" id="mobile_new" type="text">
                                        <div class="prompt" id="mobile_msg"></div>
                                    </dd>
                                    <dt id="mobile_dt">身份证号</dt>
                                    <dd id="mobile_dd">
                                        <input class="inp" name="shenfenzheng" id="mobile_new" type="text">
                                        <div class="prompt" id="mobile_msg"></div>
                                    </dd>
                                    <dt id="mobile_dt">民族</dt>
                                    <dd id="mobile_dd">
                                        <input class="inp" name="minzu" id="mobile_new" type="text">
                                        <div class="prompt" id="mobile_msg"></div>
                                    </dd>
                                    <dt id="mobile_dt">姓名</dt>
									<dd>
										<input class="inp" name="xingming" id="nikename" type="text">
										<div class="prompt" id="nikename_msg"></div>
									</dd>
																	   
																		<dt>性别</dt>
									<dd>
										<a href="#" class="sex active" id="gender_1">男</a>
										<a href="#" class="sex" id="gender_0">女</a>
										<input name="xingbie" id="gender" value="1" type="hidden">
	
										<div class="prompt" id="sexPmt"><span>*</span>&nbsp;提交后不可更改</div>
									</dd>
																		
																		<dt>生日</dt>
									<dd style="z-index:6">		                		
										<input name="shengri" id="myBirthday1" value="0" type="hidden">
										<input value="请选择" readonly="readonly" class="inp01" id="se1" type="text">
										<input value="请选择" readonly="readonly" class="inp01" id="se2" type="text">
										<input value="请选择" readonly="readonly" class="inp01" id="se3" type="text">
										<div class="prompt" id="mybirth_msg"></div>
	
										<!-- 年 -->
										<div class="infolayer" style="display:none;" id="_se1">
											<p>
												<!-- <span>90后：</span> -->
												<a id="1997" href="javascript:chooseBirth('_se1',1997)">1997</a>
												<a id="1996" href="javascript:chooseBirth('_se1',1996)">1996</a>
												<a id="1995" href="javascript:chooseBirth('_se1',1995)">1995</a>
												<a id="1994" href="javascript:chooseBirth('_se1',1994)">1994</a>
												<a id="1993" href="javascript:chooseBirth('_se1',1993)">1993</a>
												<a id="1992" href="javascript:chooseBirth('_se1',1992)">1992</a>
												<a id="1991" href="javascript:chooseBirth('_se1',1991)">1991</a>
												<a id="1990" href="javascript:chooseBirth('_se1',1990)">1990</a>
											</p>
											<p>
												<!-- <span>80后：</span> -->
												<a id="1989" href="javascript:chooseBirth('_se1',1989)">1989</a>
												<a id="1988" href="javascript:chooseBirth('_se1',1988)">1988</a>
												<a id="1987" href="javascript:chooseBirth('_se1',1987)">1987</a>
												<a id="1986" href="javascript:chooseBirth('_se1',1986)">1986</a>
												<a id="1985" href="javascript:chooseBirth('_se1',1985)">1985</a>
												<a id="1984" href="javascript:chooseBirth('_se1',1984)">1984</a>
												<a id="1983" href="javascript:chooseBirth('_se1',1983)">1983</a>
												<a id="1982" href="javascript:chooseBirth('_se1',1982)">1982</a>
												<a id="1981" href="javascript:chooseBirth('_se1',1981)">1981</a>
												<a id="1980" href="javascript:chooseBirth('_se1',1980)">1980</a>
											</p>
											<p>
												<!-- <span>70后：</span> -->
												<a id="1979" href="javascript:chooseBirth('_se1',1979)">1979</a>
												<a id="1978" href="javascript:chooseBirth('_se1',1978)">1978</a>
												<a id="1977" href="javascript:chooseBirth('_se1',1977)">1977</a>
												<a id="1976" href="javascript:chooseBirth('_se1',1976)">1976</a>
												<a id="1975" href="javascript:chooseBirth('_se1',1975)">1975</a>
												<a id="1974" href="javascript:chooseBirth('_se1',1974)">1974</a>
												<a id="1973" href="javascript:chooseBirth('_se1',1973)">1973</a>
												<a id="1972" href="javascript:chooseBirth('_se1',1972)">1972</a>
												<a id="1971" href="javascript:chooseBirth('_se1',1971)">1971</a>
												<a id="1970" href="javascript:chooseBirth('_se1',1970)">1970</a>
											</p>
											<p>
												<!-- <span>60后：</span> -->
												<a id="1969" href="javascript:chooseBirth('_se1',1969)">1969</a>
												<a id="1968" href="javascript:chooseBirth('_se1',1968)">1968</a>
												<a id="1967" href="javascript:chooseBirth('_se1',1967)">1967</a>
												<a id="1966" href="javascript:chooseBirth('_se1',1966)">1966</a>
												<a id="1965" href="javascript:chooseBirth('_se1',1965)">1965</a>
												<a id="1964" href="javascript:chooseBirth('_se1',1964)">1964</a>
												<a id="1963" href="javascript:chooseBirth('_se1',1963)">1963</a>
												<a id="1962" href="javascript:chooseBirth('_se1',1962)">1962</a>
												<a id="1961" href="javascript:chooseBirth('_se1',1961)">1961</a>
												<a id="1960" href="javascript:chooseBirth('_se1',1960)">1960</a>
											</p>
											<p>
												<!-- <span>50后：</span> -->
												<a id="1959" href="javascript:chooseBirth('_se1',1959)">1959</a>
												<a id="1958" href="javascript:chooseBirth('_se1',1958)">1958</a>
												<a id="1957" href="javascript:chooseBirth('_se1',1957)">1957</a>
												<a id="1956" href="javascript:chooseBirth('_se1',1956)">1956</a>
												<a id="1955" href="javascript:chooseBirth('_se1',1955)">1955</a>
												<a id="1954" href="javascript:chooseBirth('_se1',1954)">1954</a>
												<a id="1953" href="javascript:chooseBirth('_se1',1953)">1953</a>
												<a id="1952" href="javascript:chooseBirth('_se1',1952)">1952</a>
												<a id="1951" href="javascript:chooseBirth('_se1',1951)">1951</a>
												<a id="1950" href="javascript:chooseBirth('_se1',1950)">1950</a>
											</p>
										</div>
	
										<!-- 月 -->
										<div class="infolayer" style="display:none;" id="_se2">
											<p>
												<a id="1" href="javascript:chooseBirth('_se2',1)">1</a>
												<a id="2" href="javascript:chooseBirth('_se2',2)">2</a>
												<a id="3" href="javascript:chooseBirth('_se2',3)">3</a>
												<a id="4" href="javascript:chooseBirth('_se2',4)">4</a>
												<a id="5" href="javascript:chooseBirth('_se2',5)">5</a>
												<a id="6" href="javascript:chooseBirth('_se2',6)">6</a>
												<a id="7" href="javascript:chooseBirth('_se2',7)">7</a>
												<a id="8" href="javascript:chooseBirth('_se2',8)">8</a>
												<a id="9" href="javascript:chooseBirth('_se2',9)">9</a>
												<a id="10" href="javascript:chooseBirth('_se2',10)">10</a>
												<a id="11" href="javascript:chooseBirth('_se2',11)">11</a>
												<a id="12" href="javascript:chooseBirth('_se2',12)">12</a>
											</p>
										</div>
	
										<!-- 日 -->
										<div class="infolayer" style="display:none" id="_se3">
											<p></p>
										</div>
									</dd>
																											<dt>地区</dt>
									<dd style="z-index:5">
										<input name="zhuzhi" id="mycityId" value="" type="hidden">
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
												<a id="8683" href="javascript:choosePro('8683');">钓鱼岛</a>
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
                            <dt>身高</dt>
                            <dd class="w01" style="z-index:4">
                                <input name="" value="175" readonly="readonly" class="inp02" id="myheight" type="text">
                                <input name="shengao" value="175" id="csheight" type="hidden">
                                <div class="prompt" id="myheight_msg"><div class="ok">正确</div></div>

                                <div class="infolayer01" style="display:none;" id="_myheight">
                                    <a href="#" value="144">145厘米以下</a>
                                    <a href="#" value="145">145厘米</a>
                                    <a href="#" value="146">146厘米</a>
                                    <a href="#" value="147">147厘米</a>
                                    <a href="#" value="148">148厘米</a>
                                    <a href="#" value="149">149厘米</a>
                                    <a href="#" value="150">150厘米</a>
                                    <a href="#" value="151">151厘米</a>
                                    <a href="#" value="152">152厘米</a>
                                    <a href="#" value="153">153厘米</a>
                                    <a href="#" value="154">154厘米</a>
                                    <a href="#" value="155">155厘米</a>
                                    <a href="#" value="156">156厘米</a>
                                    <a href="#" value="157">157厘米</a>
                                    <a href="#" value="158">158厘米</a>
                                    <a href="#" value="159">159厘米</a>
                                    <a href="#" value="160">160厘米</a>
                                    <a href="#" value="161">161厘米</a>
                                    <a href="#" value="162">162厘米</a>
                                    <a href="#" value="163">163厘米</a>
                                    <a href="#" value="164">164厘米</a>
                                    <a href="#" value="165">165厘米</a>
                                    <a href="#" value="166">166厘米</a>
                                    <a href="#" value="167">167厘米</a>
                                    <a href="#" value="168">168厘米</a>
                                    <a href="#" value="169">169厘米</a>
                                    <a href="#" value="170">170厘米</a>
                                    <a href="#" value="171">171厘米</a>
                                    <a href="#" value="172">172厘米</a>
                                    <a href="#" value="173">173厘米</a>
                                    <a href="#" value="174">174厘米</a>
                                    <a href="#" value="175">175厘米</a>
                                    <a href="#" value="176">176厘米</a>
                                    <a href="#" value="177">177厘米</a>
                                    <a href="#" value="178">178厘米</a>
                                    <a href="#" value="179">179厘米</a>
                                    <a href="#" value="180">180厘米</a>
                                    <a href="#" value="181">181厘米</a>
                                    <a href="#" value="182">182厘米</a>
                                    <a href="#" value="183">183厘米</a>
                                    <a href="#" value="184">184厘米</a>
                                    <a href="#" value="185">185厘米</a>
                                    <a href="#" value="186">186厘米</a>
                                    <a href="#" value="187">187厘米</a>
                                    <a href="#" value="188">188厘米</a>
                                    <a href="#" value="189">189厘米</a>
                                    <a href="#" value="190">190厘米</a>
                                    <a href="#" value="191">191厘米</a>
                                    <a href="#" value="192">192厘米</a>
                                    <a href="#" value="193">193厘米</a>
                                    <a href="#" value="194">194厘米</a>
                                    <a href="#" value="195">195厘米</a>
                                    <a href="#" value="196">195厘米以上</a>
                                </div>
                            </dd>
                                            
                            <dt style="width:42px;">血型</dt>
                            <dd class="w02" style="z-index:3">
                                <input name="" value="A" readonly="readonly" class="inp02" id="mymarriage" type="text">
                                <input name="xuexing" id="csmarriage" value="A" type="hidden">
                                <div class="prompt" id="mymarriage_msg"><div class="ok">正确</div></div>

                                <div class="infolayer01" style="height:70px; display:none;" id="_mymarriage">
                                    <a class="selectHeight" href="#" value="1_A">A</a>
                                    <a href="#" value="2_B">B</a>
                                    <a href="#" value="3_AB">AB</a>
                                    <a href="#" value="3_O">O</a>
                                </div>
                            </dd>
                            <div id="vCodeInfo"></div>
                        </dl>
                        <!-- <div id="showverifydiv" class="clear"></div> -->
                        <div class="clear"></div>
                        <div style="display:none;"><textarea name="goldUserDesc_userDesc" id="userdesc" cols="30" rows="10"></textarea></div>

                        <!--a href="javascript:checkAll();" class="icon">注册完成</a-->
                        <input name="" value="注册" class="icon"  type="submit">
                    </div>                </div>
            </div>
        </form>

         
    

</body></html>