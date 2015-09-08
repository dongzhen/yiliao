<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>

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

                .table2{
                    width: 1200px;
                    margin: 0 auto;
                }
                .zouqi{
                    width: 200px;
                    /*height: 60px;*/
                    /*line-height: 60px;*/
                    text-align: center;
                    font-size: 13px;
                }

            </style>
        
 <!-- 头部开始 -->
        <div id="top">
            <div class="top_center">
                <span class="huanying">欢迎您</span>
                <span class="tuichu"><a href="<?php echo U('Login/out');?>">安全退出</a></span>
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
        

            
        </div>
<table class='table2'>
    <thead>
    <tr>
        <td class="zouqi">医生姓名</td>
        <td class="zouqi">所属医院</td>
        <td class="zouqi">所属科室</td>
        <td class='zouqi'>联系电话</td>
        <td class="zouqi">所属医院</td>
        <td class="zouqi">操作</td>
    </tr>
    </thead>
    <tbody>
    <?php $hd["list"]["y"]["total"]=0;if(isset($ys) && !empty($ys)):$_id_y=0;$_index_y=0;$lasty=min(1000,count($ys));
$hd["list"]["y"]["first"]=true;
$hd["list"]["y"]["last"]=false;
$_total_y=ceil($lasty/1);$hd["list"]["y"]["total"]=$_total_y;
$_data_y = array_slice($ys,0,$lasty);
if(count($_data_y)==0):echo "";
else:
foreach($_data_y as $key=>$y):
if(($_id_y)%1==0):$_id_y++;else:$_id_y++;continue;endif;
$hd["list"]["y"]["index"]=++$_index_y;
if($_index_y>=$_total_y):$hd["list"]["y"]["last"]=true;endif;?>

        <tr>
            <td style="display:none;"><?php echo $y['uid'];?></td>
            <td class="zouqi"><?php echo $y['yiyuanname'];?></td>
            <td class="zouqi"><?php echo $y['yishengname'];?></td>
            <td class="zouqi"><?php echo $y['keshi'];?></td>
            <td class="zouqi"><?php echo $y['yishengnumber'];?></td>
            <td class="zouqi"><?php echo $y['yiyuanname'];?></td>
            <td class="zouqi">
                <a href="<?php echo U('cunru',array('uid'=>$y['uid']));?>" onclick="return confirm('你确定申请该医生为保健医生么?');">申请为保健医生</a>  |
                <a href="<?php echo U('kan',array('uid'=>$y['uid']));?>">查看其从医资料</a>
            </td>
        </tr>
    <?php $hd["list"]["y"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </tbody>
</table>



         
    

</body></html>