<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
        <!-- 头部样式开始 -->
        <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        a{
            text-decoration: none;
            color: black;
        }
            #top{
                width: 100%;
                height: 30px;
                border:1px solid #989898;
                margin: 0 auto;
                background: #A9DBF6;
                position: relative;

            }
            .mz{
                width: 300px;
                height: 30px;
                /*background: yellow;*/
                position: absolute;
                left: 40px;
                color: black;
                font-family: "微软雅黑";
                font-size: 15px;
                font-weight: 500;
                line-height: 30px;
            }
            .hy{
                position: absolute;
                left: 80%;
                height: 30px;
                width: 100px;
                line-height: 30px;
                font-family: "微软雅黑";
                font-size: 15px;
                font-weight: 500;
                line-height: 30px;

            }
            /*导航开始*/
            .zouqi{
                width: 400px;
                height: 45px;
                line-height: 45px;
                position: absolute;
                /*background: yellow;*/
                top: 0;
                left: 866px;
                color: green;
                font-family: "微软雅黑";
                font-size: 17px;
                font-weight: 500;
            }
            #daohang{
                position: relative;
                width: 95.1%;
                margin: 0 auto;
                height: 45px;
                border: 1px solid #A9DBF6;
                margin-top: 20px;
                background: #FF8000;
                line-height: 45px;
            }
            .li{
                cursor: pointer;
            }
            .li:hover{
                color: white;
            }
            /*用户信息区域开始*/
            #xinxi{
                width: 95%;
                height: 300px;
                border: 1px solid #A9DBF6;
                margin: 0 auto;
                position: relative;
                /*margin-top: 20px;*/
                background: #ECECED;
                overflow: hidden;
            }
            .left{
                width: 60%;
                height: 300px;
                /*background: yellow;*/
                position: relative;
                border-right: 1px solid #A9DBF6;

            }
            .left_b{
                width: 100%;
                height: 220px;
                /*background: green;*/
                /*border: 1px solid red;*/
                list-style: none;
            }
            .left_b li{
                border: 1px solid #A9DBF6;
                height: 55px;
                width: 50%;
                line-height: 55px;
                /*text-align: center;*/
                border-bottom: none;
                border-left: none;
                font-size: 13px;
                font-weight: 400;
                font-family: "微软雅黑";
            }
            .left_top{
                width: 100%;
                height: 76px;
                border-top: none;
                font-size: 25px;
                font-family: "微软雅黑";
                text-align: center;
                line-height: 76px;
            }
            .right{
                width: 10%;
                border:1px solid #A9DBF6;
                height: 223px;
                position: absolute;
                left:50%;
                border-left: none;
                border-bottom: none;
                top: 25.2%;
                line-height: 223px;
                text-align: center;
                color: #1F5690;
                font-size: 20px;
                font-family: '微软雅黑';
            }
            .right_b{
                position: absolute;
                left: 60%;
                width: 40%;
                top: 25.2%;
                height: 220px;
                /*border: 1px solid red;*/
                list-style: none;
            }
            .right_b li{
                border: 1px solid #A9DBF6;
                height: 55px;
                width: 100%;
                line-height: 55px;
                text-align: center;
                line-height: 55px;
                text-align: center;
                border-right: none;
                font-size: 13px;
                font-weight: 400;
                font-family: "微软雅黑";
                border-bottom: none;
            }
            #right{
/*              width: 37.9%;
                height: 300px;
                top: 14.3%;
                left: 57.6%;
                background: yellow;*/
                width: 40%;
                height: 300px;
                left: 60%;
                /*background: yellow;*/
                position: absolute;
                /*background: yellow;*/
                top: 0;
                border-right: 1px solid #A9DBF6;

            }
            .yh{

                /*width: 100%;
                height:100px;
                border-top: none;
                font-size: 25px;
                font-family: "微软雅黑";
                text-align: center;
                line-height: 100px;*/
                width: 100%;
                height: 76px;
                border-top: none;
                font-size: 25px;
                font-family: "微软雅黑";
                text-align: center;
                line-height: 76px;
                border: 1px solid #A9DBF6;
                border-top: none;
                border-left: none;
                border-right: none;
            
            }
            #cao{
                position: absolute;
                top:30px;
                left: 35px;
                border: 1px solid black;
                border-radius:0.9;
                background: #FF8000;
                font-family: "微软雅黑";
                font-size: 15px;
            }
            #cao:hover{
                background: white;
                color: green;
            }


            /*折线图开始*/
            #fenxi{
                width:95.1%;
                height: 900px;
                margin: 0 auto;
                margin-top: 10px;
                border:1px solid #A9DBF6;
                background: #ECECED;
            }
            #xdt{
                width: 95.1%;
                height: 100px;
                border:1px solid #A9DBF6;
                background: #ECECED;
                margin: 0 auto;
                margin-top: 20px;
                color: black;
                font-size: 25px;
                font-family: "微软雅黑";
                line-height: 100px;


            }
            .biaoti{
                width: 100%;
                height: 60px;
                border:1px solid #A9DBF6;
                border-left: none;
                border-right: none;
                border-top: none;
                text-align: center;
                line-height: 60px;
                font-family: "微软雅黑";
                font-size: 20px;
                font-weight: 500;
                background: #FF8000;
            }
            .leixing{
                width: 100%;
                height: 50px;
                border:1px solid #A9DBF6;
                border-left: none;
                border-right: none;
                border-top: none;
                text-align: center;
                line-height: 60px;
                font-family: "微软雅黑";
                font-size: 20px;
                font-weight: 500;
                /*background: #6BC439;*/
            }
            .lei{
                height: 50px;
                width: 12.2%;
                /*background: yellow;*/
                display: block;
                float: left;
                border: 1px solid #377BD9;
                border-left: none;
                text-align: center;
                line-height: 50px;
            }
            .hd-success{
                height: 50px;
                width: 100%;
            }
            .hd-success:hover{
                cursor: pointer;
            }
            .jiazu{
                border-bottom: none;
            }
            .xinxi{
                width:500px;
                height: 23%;
                float: left;
                font-size: 14px;
                font-family: "微软雅黑";
                text-align: center;
                /*line-height: 76px;*/
                /*position: absolute;top: 100px;*/
                text-align: center;
                /*border: 1px solid black;*/
                border-bottom: none;
            }
            .right_b li{
                text-align: left;
                /*padding-left: 30px;*/
            }
            .m{
                color: #1F5690;
                font-size: 15px;
                font-family: '微软雅黑'; 
            }
            .left_b li{
                overflow: hidden;
                border-right: none;
                height: 25%;
                /*width: 50%;*/
            }
            #one{
                width: 25%;
                /*background: yellow;*/
            }
            #center{
                width: 25.2%;
                height: 75%;
                position: absolute;
                top: 25.2%;
                border: 1px solid #A9DBF6;
                border-left: none;
                border-bottom: none;
                /*background: green;*/
                left: 25%;
                list-style: none;
                border-bottom: none;
            }
            #center li{
                width: 100%;
                height: 25%;
                border: 1px solid #A9DBF6;
                border-top: none;
                border-right: none;
                line-height:53px;
                font-size: 13px;
                font-weight: 400;
                font-family: "微软雅黑";
            }
            #bottom{
                border-bottom: none;
            }
            #kahao{
                font-size: 16px;
                font-family: '微软雅黑';
                font-weight: 400;
            }
            #yhxx{
                list-style: none;
                border-right: none;
            }
            #yhxx li{
                width: 100%;
                height: 55px;
                border: 1px solid #A9DBF6;
                border-top: none;
                border-left: none;
                border-right: none;
                /*text-align: center;*/
                line-height: 50px;
                font-family: "微软雅黑";
                font-size: 16px;
            }
            #diyi{
                width: 33%;
                height: 100%;
                display: block;
                border:  1px solid #A9DBF6;
                border-right: none;
                border-top: none;
                float: left;
                border-bottom: none;
                text-align: center;
                line-height: 50px;
                font-family: "微软雅黑";
                font-size: 16px;
                /*border-right: none;*/
            }
            #kuang{
                text-align: center;
            }



        </style>
    </head>
    <body>
      <div id="top">
         <div class="mz">
            中国保健大夫，最专业的家庭保健医生。
         </div>
      </div>

      <!-- 导航开始 -->
      <div id="daohang">
                   
        <div class="zouqi">
               
                <a class="li" href="<?php echo U('Index/yindex');?>">返回用户管理列表</a>
                
        </div>

      </div>
        
        <!-- 用户信息数据区域开始 -->
        <div id="xinxi">
            <!-- 测量数据 -->
            <div class="left">
                <div class="left_top">用户今日健康测量数据</div>
                <ul class="left_b">
                    <li id="one">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp收缩压（<?php echo $shuju['gaoya'];?>mmol/L ）</li>
                    <li style="border-top:none;" id="one">&nbsp&nbsp<span class="m">血压</span>：舒张压（<?php echo $shuju['diya'];?>mmol/L ）</li>
                    <li style="border-top:none;" id="one">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp心率&nbsp&nbsp&nbsp（<?php echo $shuju['xinlv'];?>mmol/L ）</li>
                    <li id="one"><span class="m">&nbsp&nbsp血糖</span>：(<?php echo $shuju['xuetang'];?>mg/dL)</li>
                </ul>
                <ul id="center">
                    <li><span class="m">&nbsp&nbsp&nbsp身高</span>：***cm</li>
                    <li><span class="m">&nbsp&nbsp&nbsp体重</span>：***kg</li>
                    <li><span class="m">&nbsp&nbsp&nbsp血氧饱和度</span>：***mmol/L</li>
                    <li style="border-bottom:none;"><span class="m">&nbsp&nbsp&nbsp待定</span></li>
                </ul>
                
                <div class="right">血脂</div>
                <ul class="right_b">
                    <li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="m">总胆固醇</span>：***mmol/L</li>
                    <li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="m">甘油三酯</span>：***mmol/L</li>
                    <li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="m">高密度脂蛋白</span>：***mmol/L</li>
                    <li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="m">低密度脂蛋白</span>：***mmol/L</li>
                </ul>
            </div>

            <div id="right">
            <!-- <a id="cao" href="<?php echo U('Yh/wanshan');?>">完善用户信息</a> -->
                <div class="yh">

                用户信息
                </div>
                    <ul id="yhxx">
                        <li>
                            <a href="" id="diyi" style="border-left:none;">姓名：<?php echo $shuju['xingming'];?></a>
                            <a href="" id="diyi">性别：<?php echo $shuju['xingbie'];?></a>
                            <a href="" id="diyi">出生日期：<?php echo $shuju['shengri'];?></a>
                        </li>
                        <li id="kuang">&nbsp&nbsp&nbsp&nbsp&nbsp婚姻状况：<?php echo $shuju['hunyin'];?></li>
                        <li>&nbsp&nbsp&nbsp&nbsp&nbsp既往史：<?php echo $shuju['jiwangshi'];?></li>
                        <li style="border:none;">&nbsp&nbsp&nbsp&nbsp&nbsp过敏史：<?php echo $shuju['guominshi'];?></li>
                    </ul>
                <!-- <ul style="width:100%;height:74%;border-left:none;border-bottom:none;border-right:none;" id="ul"> -->

<!--                    <a href="" class="xinxi">姓名：<?php echo $shuju['xingming'];?>&nbsp&nbsp性别：<?php echo $shuju['xingbie'];?>&nbsp&nbsp出生日期：<?php echo $shuju['shengri'];?></a>
                    <a href="" class="xinxi">婚姻：<?php echo $shuju['hunyin'];?>&nbsp&nbsp民族：<?php echo $shuju['minzu'];?></a>
                    <a href="" class="xinxi">既往史：<?php echo $shuju['jiwangshi'];?></a>
                    <a href="" class="xinxi">过敏史：<?php echo $shuju['guominshi'];?></a> -->

                    
                <!-- </ul> -->


                
            </div>
            
        </div>

            <div id="xdt">
                &nbsp&nbsp&nbsp&nbsp心电图今日测量数据图
            <img src="http://127.0.0.1/baojiandaifu/YIYUAN/Admin/View/Index/2.gif" style="height:100px;margin-left:360px; width:70%; margin-top:-100px;" alt="">
                
            </div>

        <!-- 用户数据信息折线图 -->
        <div id="fenxi">
            <div class="biaoti">
                测量数据分析
            </div>
            <div class="leixing">
                <a href="" class="lei"><input type="submit" value="血压" class='hd-success'></a>
                <a href="" class="lei"><input type="submit" value="血糖" class='hd-success'></a>
                <a href="" class="lei"><input type="submit" value="体温" class='hd-success'></a>
                <a href="" class="lei"><input type="submit" value="血脂" class='hd-success'></a>
                <a href="" class="lei"><input type="submit" value="尿常规" class='hd-success'></a>
                <a href="" class="lei"><input type="submit" value="血常规" class='hd-success'></a>
                <a href="" class="lei"><input type="submit" value="血生化" class='hd-success'></a>
                <a href="" class="lei"><input type="submit" value="待开发" class='hd-success'></a>
            </div>
        </div>
    </body>
</html>
