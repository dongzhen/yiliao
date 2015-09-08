<?php if (!defined('HDPHP_PATH')) exit; ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
    div#hd_debug {
        font-family: "微软雅黑";
        position: fixed;
        left: 0px;
        right: 0px;
        bottom: 0px;;
        height: 235px;
        z-index: 2000;
        font-size: 12px;
        padding: 0px;
        margin: 0px;
        overflow: hidden;
        background: #ffffff;
        padding-top:3px;
        _position: absolute;
        _bottom:0px;
    }
    div#hd_debug a {
        color: #005e15;
        text-decoration: none;
    }
    div#hd_debug div#debug_menu {
        height: 25px;
        border-bottom: solid 5px #027d39;
    }

    div#hd_debug div#debug_menu ul {
        list-style: none;
        padding: 0px;
        margin: 0px;
    }

    div#hd_debug div#debug_menu ul li {
        font-weight: bold;
        background: #eee;
        color:#005e15;
        float: left;
        cursor: pointer;
        height: 24px;
        width: 65px;
        text-align: center;
        line-height: 28px;
        overflow: hidden;
        border: solid 1px #32b16c;
        border-bottom: none;
        margin-right: 6px;
    }

    div#hd_debug div#debug_menu ul li.active {
        background: #027d39;
        color: #fff;
        height: 25px;
        border: none;
    }

    div#hd_debug div#debug_con div {
        display: none;
        height: 200px;
        overflow-x: hidden;
        overflow-y: auto;
        background: #f3f3f3;
    }

    div#hd_debug div#debug_con div.active {
        display: block;
    }

    div#hd_debug div#debug_con div table {
        width: 100%;
        border-collapse: collapse;
    }

    div#hd_debug div#debug_con div table thead tr {
        background: #f3f3f3;
    }
    div#hd_debug div#debug_con div table thead tr td{
        background: #F3F3F3;
        font-weight: normal;
    }
    div#hd_debug div#debug_con div table tr td {
        border-bottom: solid 1px #ddd;
        font-size: 12px;
        font-weight: normal;
        color: #666;
        padding: 0px 8px;
        word-break: break-all;
        background: #fff;
        height: 25px;
        text-align: left;
    }
    #hd_debug_bt {
        background: url("<?php echo __HDPHP__;?>/Lib/Tpl/static/debug.png") no-repeat;
        border-radius: 0px;
        cursor: pointer;
        z-index: 2000;
        width: 30px;
        height:30px;
        text-indent: -9999px;
        position: fixed;
        bottom: 5px;
        position: fixed;
        top:50%;
        right:10px;
        display:block;
        border-radius: 2px;
        _position: absolute;
    }
</style>

<!--DEBUG-->
<div id="hd_debug" style="display: <?php echo DEBUG_TOOL?'block':'none';?>;">
    <div id="debug_menu">
        <ul>
            <li id="_server" class="active">运行环境</li>
            <li id="_tpl">模板编译</li>
            <li id="_sql">SQL查询</li>
            <li id="_require">引导流程</li>
            <li id="_cache">缓存监控</li>
            <li id="_session">SESSION</li>
            <li id="_cookie">COOKIE</li>
            <li id="_const">常量</li>
            <li id="_request">REQUEST</li>
            <li id="_post">POST</li>
            <li id="_get">GET</li>
            <li><a href="http://www.hdphp.com" target="_blank">官网</a></li>
            <li style="width:80px;"><a href="http://www.houdunwang.com" target="_blank">PHP实训</a></li>
<!--            <li><a href="http://www.kuaipinwang.com" target="_blank">快聘网</a></li>-->
<!--            <li><a href="http://www.kuaixuewang.com" target="_blank">快学网</a></li>-->
        </ul>
    </div>
    <div id="debug_con">
        <!--服务器-->
        <div id="server" class="active">
            <table>
                <tr>
                    <td width="80">运行时间</td>
                    <td><?php echo Debug::runtime('APP_BEGIN')?>s</td>
                </tr>
                <tr>
                    <td width="80">服务器信息</td>
                    <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
                </tr>
                <tr>
                    <td>客户端代理</td>
                    <td><?php echo $_SERVER['HTTP_USER_AGENT']; ?></td>
                </tr>
                <tr>
                    <td>PHP版本</td>
                    <td><?php echo PHP_VERSION; ?></td>
                </tr>
                <tr>
                    <td>请求方式</td>
                    <td><?php echo $_SERVER['REQUEST_METHOD']; ?></td>
                </tr>
                <tr>
                    <td>当前模块</td>
                    <td><?php echo MODULE_PATH .'Controller/'. CONTROLLER . C("CONTROLLER_FIX") . ".class.php"; ?></td>
                </tr>
                <tr>
                    <td>会话ID</td>
                    <td><?php echo session_id(); ?></td>
                </tr>
                <tr>
                    <td>框架版本</td>
                    <td><?php echo HDPHP_VERSION ?>
                        <a href='http://www.hdphp.com' target='_blank'>查看新版</a>
                    </td>
                </tr>
            </table>
        </div>
        <!--引导流程-->
        <div id="require">
            <table>
                <thead>
                <tr>
                    <td width="30">ID</td>
                    <td>File</td>
                </tr>
                </thead>
                <?php $id = 1;
                foreach ($debug['file'] as $f => $d): ?>
                    <tr>
                        <td>[<?php echo $id++; ?>]</td>
                        <td><?php echo $f; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <!--模板编译-->
        <div id="tpl">
            <table>
                <thead>
                <tr>
                    <td width="100">模板文件</td>
                    <td>编译文件</td>
                </tr>
                </thead>
                <?php foreach (self::$tpl as $k => $v): ?>
                    <tr>
                        <td style="font-size:12px;width:100px;padding:6px;"><?php echo $v[0] ?></td>
                        <td style="font-size:12px;padding:6px;">
                            <?php echo str_replace(array(" / ", "\\"), DS, $v[1]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <!--SQL查询-->
        <div id="sql">
            <table>
                <thead>
                <tr>
                    <td width="30">ID</td>
                    <td>SQL命令</td>
                </tr>
                </thead>
                <?php foreach (self::$sqlExeArr as $k => $v): ?>
                    <tr>
                        <td width='35'>[<?php echo $k + 1 ?>]</td>
                        <td><?php echo htmlspecialchars($v) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <!--缓存监控-->
        <div id="cache">
            <table width=100%>
                <tr>
                    <td width="30" style='background:#f3f3f3;color:#333;padding-left:5px;'>写入</td>
                    <td width="80"> 成功:<?php echo self::$cache['write_s']; ?>次</td>
                    <td width="80">失败:<?php echo self::$cache['write_f']; ?>次</td>
                    <td>
                        命中:<?php echo self::$cache['write_s'] + self::$cache['write_f'] ? round(self::$cache['write_s'] / (self::$cache['write_s'] + self::$cache['write_f']) * 100, 2) . "%" : 0; ?></td>
                </tr>
                <tr>
                    <td style='background:#f3f3f3;color:#333;padding-left:5px;'>读取</td>
                    <td> 成功:<?php echo self::$cache['read_s']; ?>次</td>
                    <td>失败:<?php echo self::$cache['read_f']; ?>次</td>
                    <td>
                        命中:<?php echo self::$cache['read_s'] + self::$cache['read_f'] ? round(self::$cache['read_s'] / (self::$cache['read_s'] + self::$cache['read_f']) * 100, 2) . "%" : 0; ?></td>
                </tr>
            </table>
        </div>
        <!--SESSION-->
        <div id="session">
            <table width=100%>
                <thead>
                <tr>
                    <td width="100">name</td>
                    <td>
                        value
                    </td>
                </tr>
                </thead>
                <?php foreach ($_SESSION as $name => $value): ?>
                    <tr>
                        <td><?php echo $name;?></td>
                        <td><?php echo print_r($value,true);?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <!--COOKIE-->
        <div id="cookie">
            <table width=100%>
                <thead>
                <tr>
                    <td width="100">name</td>
                    <td>value</td>
                </tr>
                </thead>
                <?php foreach ($_COOKIE as $name => $value): ?>
                    <tr>
                        <td><?php echo $name;?></td>
                        <td><?php echo print_r($value,true);?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <!--常量-->
        <div id="const">
            <table width=100%>
                <thead>
                <tr>
                    <td width="150">name</td>
                    <td>value</td>
                </tr>
                </thead>
                <?php $const = get_defined_constants(true);foreach ($const['user'] as $name => $value): ?>
                    <tr>
                        <td><?php echo $name;?></td>
                        <td><?php echo $value;?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div id="request">
            <table width=100%>
                <thead>
                <tr>
                    <td width="150">name</td>
                    <td>value</td>
                </tr>
                </thead>
                <?php foreach ($_REQUEST as $name => $value): ?>
                    <tr>
                        <td><?php echo $name;?></td>
                        <td><?php echo $value;?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div id="post">
            <table width=100%>
                <thead>
                <tr>
                    <td width="150">name</td>
                    <td>value</td>
                </tr>
                </thead>
                <?php foreach ($_POST as $name => $value): ?>
                    <tr>
                        <td><?php echo $name;?></td>
                        <td><?php echo $value;?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div id="get">
            <table width=100%>
                <thead>
                <tr>
                    <td width="150">name</td>
                    <td>value</td>
                </tr>
                </thead>
                <?php foreach ($_GET as $name => $value): ?>
                    <tr>
                        <td><?php echo $name;?></td>
                        <td><?php echo $value;?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    var _div_con = document.getElementById("debug_con").getElementsByTagName('div');
    var _li_menu = document.getElementById("debug_menu").getElementsByTagName('li');
    for (var i = 0; i < _li_menu.length; i++) {
        _li_menu[i].onclick = function () {
            //超链接
            if(!this.id)return;
            //隐藏所有菜单
            for (var n = 0; n < _li_menu.length; n++) {
                _li_menu[n].className = '';
            }
            //隐藏所有div
            for (var n = 0; n < _div_con.length; n++) {
                _div_con[n].className = '';
            }
            this.className = 'active';
            document.getElementById(this.id.substr(1)).className = 'active';
        }
    }
</script>

<!--开启debug按钮-->
<div id="hd_debug_bt">HDPHP </div>
<script>
    var _hd_debug_bt = document.getElementById("hd_debug_bt");
    var _hd_debug = document.getElementById("hd_debug");
    document.getElementById("hd_debug_bt").onclick = function () {
        var _display =_hd_debug.style.display;
        if(_display=='block'){
            _hd_debug.style.display = "none";
        }else{
            _hd_debug.style.display = "block";
        }
    }
</script>