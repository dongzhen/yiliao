<?php
// .-----------------------------------------------------------------------------------
// |  Software: [HDPHP framework]
// |   Version: 2013.01
// |      Site: http://www.hdphp.com
// |-----------------------------------------------------------------------------------
// |    Author: 向军 <houdunwangxj@gmail.com>
// | Copyright (c) 2012-2013, http://houdunwang.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------
// |   License: http://www.apache.org/licenses/LICENSE-2.0
// '-----------------------------------------------------------------------------------

/**
 * HDPHP模板引擎标签解析类
 * @package        View
 * @subpackage  HDPHP模板
 * @author           后盾向军 <houdunwangxj@gmail.com>
 */
class ViewTag
{
    //为Literal标签使用，记录literal标签号
    static $literal=array();
    /**
     * block 块标签       1为块标签  0独立标签
     * 块标题不用设置，行标签必须设置
     * 设置时不用加前面的_
     */
    public $tag = array(
        'foreach' => array('block' => 1, 'level' => 4),
        'while' => array('block' => 1, 'level' => 4),
        'if' => array('block' => 1, 'level' => 5),
        'elseif' => array('block' => 0),
        'else' => array('block' => 0),
        'switch' => array('block' => 1),
        'case' => array('block' => 1),
        'break' => array('block' => 0),
        'default' => array('block' => 0),
        'include' => array('block' => 0),
        'list' => array('block' => 1, 'level' => 5),
        'js' => array('block' => 0),
        'css' => array('block' => 0),
        'noempty' => array('block' => 0),
        'jsconst' => array('block' => 0), //定义JS常量
        'define' => array('block' => 0),
        'literal'=>array('block' => 1, 'level' => 5),//Literal 标签区域内的数据将被当作文本处理
        'jquery' => array('block' => 0),

        'ueditor' => array('block' => 0),
        'codehighlight'=>array('block' => 0),//代码高亮
        'jcrop' => array('block' => 0),
        'upload' => array('block' => 0), //uploadif上传组件
        'zoom' => array('block' => 0), //图片放大镜
        'bootstrap' => array('block' => 0),
        'hdjs' => array('block' => 0),//包括hdui、hdvalidate、hdslide等
        'hdui' => array('block' => 0),//hdjs前台ui库
        'hdvalidate'=>array('block'=>0),//hdvalidate前端验证
        'hdslide' => array('block' => 0),//轮换版
        'cal' => array('block' => 0),//日历

    );

    /**
     * 标签区域内的数据将被当作文本处理
     * @param $attr
     * @param $content
     * @return mixed
     */
    public function _literal($attr,$content){
       self::$literal[]=$content;
       $id=count(self::$literal)-1;
       return '###hd:Literal'.$id.'###';
    }
    //格式化参数 字符串加引号
    private function formatArg($arg)
    {
        $valueFormat = trim(trim($arg, "'"), '"');
        return is_numeric($valueFormat) ? $valueFormat : '"' . $valueFormat . '"';
    }

    /**
     * 替换标签属性变量或常量为php表示形式
     * @param array $attr 标签属性
     * @param bool $php 返回PHP语法格式
     * @return mixed
     */
    private function replaceAttrConstVar($attr, $php = true)
    {
        foreach ($attr as $k => $at) {
            //替换变量
            $attr[$k] = preg_replace('/\$\w+\[.*\](?!=\[)|\$\w+(?!=[a-z])/', '<?php echo \0;?>', $attr[$k]);
        }
        return $attr;
    }

    //定义常量
    public function _define($attr, $content)
    {
        $name = $attr['name'];
        $value = is_numeric($attr['value']) ? $attr['value'] : "'" . $attr['value'] . "'";
        $str = "";
        $str .= "<?php ";
        $str .= "define('{$name}',$value);";
        $str .= ";?>";
        return $str;
    }

    //图片放大镜
    public function _zoom($attr, $content)
    {
        if (!isset($attr['data']) || !isset($attr['big']) || !isset($attr['small']))return;
        $data = $attr['data'];
        $big = $attr['big'];
        $small = $attr['small'];
        $left = isset($attr['left']) ? $attr['left'] : 20;
        $top = isset($attr['right']) ? $attr['right'] : 20;
        $width = isset($attr['width']) ? $attr['width'] : 300;
        $height = isset($attr['height']) ? $attr['height'] : 250;
        $swfupload_path = __HDPHP_EXTEND__ . '/Org/Jqzoom'; //插件目录
        $str = '';
        $str .= "<link rel = 'stylesheet' href = '" . $swfupload_path . "/css/jquery.jqzoom.css' type = 'text/css'>";
        $str .= "<script src = '" . $swfupload_path . "/js/jquery.jqzoom-core.js' type = 'text/javascript'></script>";
        $str .= "
        <script type = 'text/javascript'>
        $(function() {
        $('#$big').append(triumph);
        $('#$small').append(smalls);
        $('.jqzoom').jqzoom({
        zoomType: 'standard',
        lens:true,
        title: false,
        preloadImages: true,
        alwaysOn:false,
        zoomWidth: $width,
        zoomHeight: $height,
        xOffset:$left,
        yOffset:$top
        });
        });
        </script>
        ";
        $str .= "<script type = 'text/javascript'>";
        $str .= "
    var triumph = \" <a href='<?php echo " . $data . "[0][2]?>' class='jqzoom' rel='gal1'>\
    <img src='<?php echo " . $data . "[0][1]?>' title='triumph' style='border: 4px solid #666;'>\
    </a>\";";
        $str .= "var smalls=\"";
        $str .= "<?php foreach( " . $data . ' as $k=>$v):?>';
        $str .= '<?php $zoomThumbActive = $k==0?"zoomThumbActive":""?>';
        $str .= "
    <li>\
    <a class='<?php echo \$zoomThumbActive?>' href='javascript:void(0);' rel=\\\"{gallery: 'gal1', smallimage: '<?php echo \$v[1];?>',largeimage: '<?php echo \$v[2];?>'}\\\">\
    <img src='<?php echo \$v[0];?>'>\
    </a>\
    </li>\
    ";
        $str .= "<?php endforeach;?>";
        $str .= "\";</script>";
        return $str;
    }

    //文件上传插件
    public function _upload($attr, $content, $view = null)
    {
        $uploadify_url = __HDPHP_EXTEND__ . '/Org/Uploadify/'; //uploadify目录
        static $_hd_uploadify_js = false; //js文件只加载一次
        $attr = array_change_key_case_d($attr, 0);
        //表单类型 是点击input过来的，还是img图片（缩略图）过来的
        $_input_type = isset($attr['input_type']) ? $attr['input_type'] : "input";
        $_elem_id = isset($attr['elem_id']) && !empty($attr['elem_id']) ? $attr['elem_id'] : ""; //表单类型
        $_name = isset($attr['name']) ? $attr['name'] : false; //上传表单name
        $post = isset($attr['post']) ? $attr['post'] . ',' : ''; //POST数据
        if ($_name === false) {
            throw_exception("upload上传标签必须设置name属性");
        }
        $name = str_replace("[]", "", $_name);
        $id = "hd_uploadify_" . $name;
        //是否加水印
        $water = isset($attr['water']) && $attr['water']==1?1:0;
        $waterbtn = isset($attr['waterbtn']) && $attr['waterbtn'] == 1 ? 1 : 0;
        $width = isset($attr['width']) ? trim($attr['width'], "px") : "200"; //是否加水印
        $height = isset($attr['height']) ? trim($attr['height'], "px") : "150"; //是否加水印
        $size = isset($attr['size']) ? str_ireplace("MB", "", $attr['size']) . "MB" : "2MB"; //文件上传大小单位KB、MB、GB
        //允许上传文件类型
        if (isset($attr['type']) && !empty($attr['type'])) {
            $allowUploadType = explode(',',$attr['type']);
            foreach ($allowUploadType as $_type_k => $_type_t) {
                $allowUploadType[$_type_k] = '*.' . $_type_t;
            }
            $type = implode(";", $allowUploadType);
        } else {
            $type = "*.gif;*.jpg;*.png;*.jpeg";
        }
        $upload_dir = isset($attr['dir']) ? $attr['dir'] : ""; //上传文件存放目录
        //是否显示描述
        $alt = isset($attr['alt']) && $attr['alt'] == 'true' ? 1 : 0;
        //是上传文件大小等提示信息true是false不显示
        $message = isset($attr['message']) && $attr['message']==0?0:1;
        $limit = isset($attr['limit']) ? $attr['limit'] : "100"; //上传文件数量
        $thumb = isset($attr['thumb']) ? $attr['thumb'] : ''; //生成缩略图尺寸
        $data = isset($attr['data']) ? $attr['data'] : false; //编辑时的图片数据
        //设置上传成功的图片数，上传时0，编辑时统计图片数据
        if ($data && isset($view->vars[$data])) {
            //编辑时统计图片数量
            $uploadsSuccessful = count($view->vars[$varName]);
        } else {
            //上传时初始上传成功文件为0
            $uploadsSuccessful = 0;
        }
        //编辑视图时显示缩略图片
        $uploadFileStr = '';
        if ($data) {
            $uploadFileStr .= "<?php
            \$_uploadImageData=$data;";
            $uploadFileStr.='
            $_uploadStr="";//编译文件需要的PHP字符串表示
            $upFileId=0;//第几张图片
            if(!empty($_uploadImageData)){
            //读取图片数据
            foreach ($_uploadImageData as $f) {
                //图片不存在
                if(empty($f["path"]) || !is_file($f["path"]))continue;
                $upFileId++;
                $url = \'__ROOT__/\' . $f["path"];
        $_uploadStr.="<li><div class=\'delUploadFile\'></div>";
        $_uploadStr.="<img src=" . $url . " path=" . $f["path"] . " width=\'' . $width . 'px\' height=\'' . $height . 'px\'/>";
        //显示图片alt
        if(isset($f["alt"])){
        $_uploadStr.="<div class=\'upload_title\'>
<input type=\'text\'  value=\'".$f["alt"]."\' name=\'' . $name . '[".$upFileId."][alt]\'>
</div>";
        }
        //显示原图
                $_uploadStr.="<input t=\'file\' type=\'hidden\' name=\'' . $name . '[".$upFileId."][path]\' value=\'" . $f["path"] . "\'/>";
                //缩略图
                if(isset($f["thumb"])){
                    foreach($f["thumb"] as $thumbFile){
                        $_uploadStr.="<input t=\'file\' type=\'hidden\' name=\'' . $name . '[".$upFileId."][thumb][]\' value=\'" . $thumbFile. "\'/>";
                    }
                }
                $_uploadStr.="</li>";
            }
            }
        echo $_uploadStr;
        ;
        ?>';
        }
        $get = $_GET;
        unset($get['a']);
        $phpScript = __WEB__ . '?' . http_build_query($get) . '&a=hd_uploadify'; //PHP处理文件
        $str = '';
        if (!$_hd_uploadify_js) {
            $_hd_uploadify_js = true; //只加载一次
            $str .= '<link rel="stylesheet" type="text/css" href="' . $uploadify_url . 'uploadify.css" />
            <script type="text/javascript" src="' . $uploadify_url . 'jquery.uploadify.min.js"></script>
            <script type="text/javascript">
            var HDPHP_CONTROL         = "' . $phpScript . '";
            var UPLOADIFY_URL    = "' . $uploadify_url . '";
            var HDPHP_UPLOAD_THUMB    ="' . $thumb . "\";\n";
            //已经成功上传的文件
            $uploadTotal = 0;
            if ($data && isset($view->vars[$data])) {
                $uploadTotal = count($view->vars[$varName]);
            }
            //定义上传成功文件数用于JS使用，主要是编辑时使用
            $str .= 'HDPHP_UPLOAD_TOTAL = ' . $uploadTotal;
            $str .= '</script>
            <script type="text/javascript" src="' . $uploadify_url . 'hd_uploadify.js"></script>';
        }

        $str .= '
<script type="text/javascript">
    $(function() {
        hd_uploadify_options.removeTimeout  =0;//提示框消息时间
        hd_uploadify_options.fileSizeLimit  ="' . $size . '";
        hd_uploadify_options.fileTypeExts   ="' . $type . '";
        hd_uploadify_options.showalt        =' . $alt . ';
        hd_uploadify_options.uploadLimit    =' . $limit . ';
        hd_uploadify_options.input_type    ="' . $_input_type . '";
        hd_uploadify_options.elem_id    ="' . $_elem_id . '";
        hd_uploadify_options.success_msg    ="正在上传...";//上传成功提示文字
        hd_uploadify_options.formData ={' . $post .'type:"'.$type. '",water : "' . $water . '",fileSizeLimit:' . (intval($size) * 1024 * 1024) . ', someOtherKey:1,' . session_name() . ':"' . session_id() . '",upload_dir:"' . $upload_dir . '",hdphp_upload_thumb:"' . $thumb . '"};
        hd_uploadify_options.thumb_width =' . $width . ';
        hd_uploadify_options.thumb_height          =' . $height . ';
        hd_uploadify_options.uploadsSuccessNums = ' . $uploadsSuccessful . ';
        $("#' . $id . '").uploadify(hd_uploadify_options);
        });
</script>
<input type="file" name="up" id="' . $id . '"/>';
        $str .= '<div class="' . $id . '_msg num_upload_msg">';
        //水印按钮
        if ($waterbtn) {
            $str .= '<input type="checkbox" id="add_upload_water" uploadify_id="hd_uploadify_' . $_name . '" ' . ($water ? "checked='checked'" : "") . '/><strong style="color:#03565E">是否添加水印</strong> ';
        }
        //显示上传提示信息
        if ($message) {
            $str .= '<span></span>单文件最大<strong>' . $size . '，允许上传类型' . $type . '</strong>';
        }
        $str.='</div>';
        $str .= '<div id="' . $id . '_queue"></div>
        <div class="' . $id . '_files uploadify_upload_files" input_file_id ="' . $id . '">
            <ul>' . $uploadFileStr . '</ul>
            <div style="clear:both;"></div>
        </div>';
        return $str;
    }

    //百度编辑器
    public function _ueditor($attr, $content)
    {
        $attr = array_change_key_case_d($attr, 0);
        $attr = $this->replaceAttrConstVar($attr);
        $style = isset($attr['style']) ? $attr['style'] : C("EDITOR_STYLE"); //1 完整  2精简
        $name = isset($attr['name']) ? $attr['name'] : "content";
        $content = isset($attr['content']) ? $attr['content'] : ''; //初始化编辑器的内容
        $width = isset($attr['width']) ? intval($attr['width']) : C("EDITOR_WIDTH"); //编辑器宽度
        $width = '"' . $width . '"';
        $height = isset($attr['height']) ? intval($attr['height']) : C("EDITOR_HEIGHT"); //编辑器高度
        $height = '"' . $height . '"';
        $water = isset($attr['water']) ? $attr['water'] : C('EDITOR_IMAGE_WATER');
        $get = $_GET;
        unset($get['a']);
        $phpScript = isset($attr['php']) ? $attr['php'] : __WEB__ . '?' . http_build_query($get) . '&a=ueditor_upload'; //PHP处理文件
        //图片按钮
        if ($style == 2) {
            $toolbars = "[['FullScreen', 'Bold','simpleupload','insertcode']]";
        } else {
            $toolbars = "[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat', 'formatmatch', 'autotypeset',
            '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', '|',
            'lineheight', '|','paragraph', 'fontfamily', 'fontsize', '|',
             'indent','justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|',
            'link', 'unlink', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'insertimage', 'emotion',   'map',  'insertcode',  'pagebreak','horizontal', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow',  'insertcol',  'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols']
            ]";
        }
        $str = '';
        if (!defined("HD_UEDITOR")) {
            $str .= '<script type="text/javascript" charset="utf-8" src="' . __HDPHP_EXTEND__ . '/Org/Ueditor/ueditor.config.js"></script>';
            $str .= '<script type="text/javascript" charset="utf-8" src="' . __HDPHP_EXTEND__ . '/Org/Ueditor/ueditor.all.min.js"></script>';
            $str .= '<script type="text/javascript">UEDITOR_HOME_URL="' . __HDPHP_EXTEND__ . '/Org/Ueditor/"</script>';
            define("HD_UEDITOR", true);
        }
        $str .= '<script id="hd_' . $name . '" name="' . $name . '" type="text/plain">' . $content . '</script>';
        $str .= "
        <script type='text/javascript'>
        $(function(){
                var ue = UE.getEditor('hd_{$name}',{
                serverUrl:'" . $phpScript . "&water={$water}'//图片上传脚本
                ,zIndex : 1000
                ,initialFrameWidth:{$width} //宽度1000
                ,catchRemoteImageEnable:false//关闭远程图片自动保存到本地
                ,initialFrameHeight:{$height} //宽度1000
                ,imagePath:''//图片修正地址
                ,autoHeightEnabled:false //是否自动长高,默认true
                ,autoFloatEnabled:false //是否保持toolbar的位置不动,默认true
                ,toolbars:$toolbars//工具按钮
                ,enableAutoSave: false//关闭自动保存
                ,initialStyle:'p{line-height:1em; font-size: 14px; }'
            });
        })
        </script>";
        return $str;
    }
    //代码高亮
    public function _codehighlight($attr,$content){
        $php=<<<php
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shCore.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushBash.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushCpp.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushCSharp.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushCss.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushDelphi.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushDiff.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushGroovy.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushJava.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushJScript.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushPhp.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushPlain.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushPython.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushRuby.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushScala.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushSql.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushVb.js"></script>
            <script type="text/javascript" src="__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/shBrushXml.js"></script>
            <link type="text/css" rel="stylesheet" href="__HDPHP_EXTEND__/Org/SyntaxHighlighter/styles/shCore.css"/>
            <link type="text/css" rel="stylesheet" href="__HDPHP_EXTEND__/Org/SyntaxHighlighter/styles/shThemeDefault.css"/>
            <script type="text/javascript">
                SyntaxHighlighter.config.clipboardSwf = '__HDPHP_EXTEND__/Org/SyntaxHighlighter/scripts/clipboard.swf';
                SyntaxHighlighter.all();
            </script>
php;
        return $php;
    }
    //加载CSS文件
    public function _css($attr, $content)
    {
        $attr = $this->replaceAttrConstVar($attr, true);
        return '<link type="text/css" rel="stylesheet" href="' . $attr['file'] . '"/>';
    }

    public function _js($attr, $content)
    {
        if (!isset($attr['file'])) return;
        $attr = $this->replaceAttrConstVar($attr, true);
        return '<script type="text/javascript" src="' . $attr['file'] . '"></script>';
    }


    public function _list($attr, $content)
    {
        if (!isset($attr['from']) || !isset($attr['name'])) return;
        $var = $attr['from'];
        $name = str_replace('$', '', $attr['name']);
        $empty = isset($attr['empty']) ? $attr['empty'] : ''; //无数据时
        $start = isset($attr['start']) ? intval($attr['start'] - 1) : 0;
        $step = isset($attr['step']) ? (int)$attr['step'] : 1;
        $php = '<?php ';
        $php .= '$hd["list"]["' . $name . '"]["total"]=0;'; //初始总计录条数
        $php .= 'if(isset(' . $var . ') && !empty(' . $var . ')):';
        $php .= '$_id_' . $name . '=0;'; //记录集中的第几条
        $php .= '$_index_' . $name . '=0;'; //采用的第几条
        $row = isset($attr['row']) ? (int)$attr['row'] * $step : 1000;
        $php .= '$last' . $name . '=min(' . $row . ',count(' . $var . '));' . "\n"; //共取几条记录
        $php .= '$hd["list"]["' . $name . '"]["first"]=true;' . "\n"; //第一条记录
        $php .= '$hd["list"]["' . $name . '"]["last"]=false;' . "\n"; //第最后一条记录
        $php .= '$_total_' . $name . '=ceil($last' . $name . '/' . $step . ');'; //共有多少条记录
        $php .= '$hd["list"]["' . $name . '"]["total"]=$_total_' . $name . ";\n"; //总记录条数
        $php .= "\$_data_" . $name . " = array_slice($var,$start,\$last" . $name . ");" . "\n"; //取要遍历的数据
        $php .= 'if(count($_data_' . $name . ')==0):echo "' . $empty . '";' . "\n"; //数组为空
        $php .= 'else:' . "\n"; //数组不为空时进行遍历
        $php .= 'foreach($_data_' . $name . ' as $key=>$' . $name . '):' . "\n";
        $php .= 'if(($_id_' . $name . ')%' . $step . '==0):$_id_' . $name . '++;else:$_id_' . $name . '++;continue;endif;' . "\n";
        $php .= '$hd["list"]["' . $name . '"]["index"]=++$_index_' . $name . ';' . "\n"; //第一条记录
        $php .= 'if($_index_' . $name . '>=$_total_' . $name . '):$hd["list"]["' . $name . '"]["last"]=true;endif;?>' . "\n"; //最后一条
        $php .= $content;
        $php .= '<?php $hd["list"]["' . $name . '"]["first"]=false;' . "\n";
        $php .= 'endforeach;' . "\n";
        $php .= 'endif;' . "\n";
        $php .= 'else:' . "\n";
        $php .= 'echo "' . $empty . '";' . "\n";
        $php .= 'endif;?>';
        return $php;
    }

    public function _foreach($attr, $content)
    {
        if (!isset($attr['from']))return;
        $php = ''; //组合成PHP
        $from = $attr['from'];
        $key = isset($attr['key']) ? $attr['key'] : '$key';
        $value = isset($attr['value']) ? $attr['value'] : '$value';
        $php .= "<?php if(is_array($from)){?>";
        $php .= '<?php ' . " foreach($from as $key=>$value){ ?>";
        $php .= $content;
        $php .= '<?php }}?>';
        return $php;
    }

    /**
     * 加载模板文件
     * @param $attr
     * @param $content
     * @return string
     */
    public function _include($attr, $content)
    {
        if (!isset($attr['file'])) return;
        $const = print_const(false, true);
        foreach ($const as $k => $v) {
            $attr['file'] = str_replace($k, $v, $attr['file']);
        }
        $file = str_replace(__ROOT__ . '/', '', trim($attr['file']));
        $view = new ViewHd();
        $view->fetch($file);
        return $view->getCompileContent();
    }

    public function _switch($attr, $content, $res)
    {
        $value = $attr['value'];
        $php = ''; //组合成PHP
        $php .= '<?php ' . " switch($value):?>\r\n";
        $php .= preg_replace("/\s*<case/i", "<case", $content);
        $php .= '<?php endswitch;?>';
        return $php;
    }

    public function _case($attr, $content, $res)
    {
        $value = $this->formatArg($attr['value']);
        $php = ''; //组合成PHP
        $php .= '<?php ' . " case $value:{?>";
        $php .= $content;
        $php .= '<?php break;}?>';
        return $php;
    }

    public function _break($attr, $content, $res)
    {
        return '<?php break;?>';
    }

    public function _default($attr, $content, $res)
    {
        return '<?php default;?>';
    }

    public function _if($attr, $content, $res)
    {
        if (empty($attr['value']))return;
        $value = $attr['value'];
        $php = ''; //组合成PHP
        $php .= '<?php if(' . $value . '){?>';
        $php .= $content;
        $php .= '<?php }?>';
        return $php;
    }

    public function _elseif($attr, $content, $res)
    {
        $value = $attr['value'];
        $php = ''; //组合成PHP
        $php .= '<?php ' . " }elseif($value){ ?>";
        $php .= $content;
        return $php;
    }

    public function _else($attr, $content, $res)
    {
        $php = ''; //组合成PHP
        $php .= '<?php ' . " }else{ ?>";
        return $php;
    }

    public function _while($attr, $content, $res)
    {
        if (empty($attr['value'])) return;
        $value = $attr['value'];
        $php = ''; //组合成PHP
        $php .= '<?php ' . " while($value){ ?>";
        $php .= $content;
        $php .= '<?php }?>';
        return $php;
    }

    public function _empty($attr, $content, $res)
    {
        if (empty($attr['value']))return;
        $value = $attr['value'];
        $php = "";
        $php = '<?php $_emptyVar =isset(' . $value . ')?' . $value . ':null?>';
        $php .= '<?php ' . ' if( empty($_emptyVar)){?>';
        $php .= $content;
        $php .= '<?php }?>';
        return $php;
    }

    public function _noempty($attr, $content)
    {
        return '<?php }else{ ?>';
    }

    //设置js常量
    public function _jsconst($attr, $content)
    {
        $const = get_defined_constants(true);
        $arr = preg_grep("/http/", $const['user']);
        $str = "<script type='text/javascript'>\n";
        foreach ($arr as $k => $v) {
            $k = str_replace('_', '', $k);
            $str .= $k . " = '$v';\n";
        }
        $str .= "</script>";
        return $str;
    }

    //bootstrap
    public function _bootstrap($attr, $content)
    {
        $str = '';
        $str .= "<link href='__HDPHP_EXTEND__/Org/bootstrap/css/bootstrap.min.css' rel='stylesheet' media='screen'>\n";
        $str .= "<script src='__HDPHP_EXTEND__/Org/bootstrap/js/bootstrap.min.js'></script>";
        return $str;
    }

    //jquery
    public function _jquery($attr, $content)
    {
        return "<script type='text/javascript' src='__HDPHP_EXTEND__/Org/Jquery/jquery-1.8.2.min.js'></script>\n";
    }

    //日历
    public function _cal($attr, $content)
    {
        return "<script src='__HDPHP_EXTEND__/Org/cal/lhgcalendar.min.js'></script>\n";
    }
    //hdjs
    public function _hdjs($attr, $content)
    {
        $php = '';
        $php.=$this->_jquery(null,null);
        $php.=$this->_hdui(null,null);
        $php.=$this->_hdvalidate(null,null);
        $php.=$this->_cal(null,null);
        $php.=$this->_hdslide(null,null);
        $php.=$this->_jsconst(null,null);
        return $php;
    }
    //hdui前端框架
    public function _hdui($attr, $content)
    {
        $php = '';
        $php .= "<link href='__HDPHP_EXTEND__/Org/hdjs/hdui/css/hdui.css' rel='stylesheet' media='screen'>\n";
        $php .= "<script src='__HDPHP_EXTEND__/Org/hdjs/hdui/js/hdui.js'></script>\n";
        return $php;
    }
    //hdvalidate
    public function _hdvalidate($attr, $content)
    {
        $php = '';
        $php .= "<link href='__HDPHP_EXTEND__/Org/hdjs/hdvalidate/css/hdvalidate.css' rel='stylesheet' media='screen'>\n";
        $php .= "<script src='__HDPHP_EXTEND__/Org/hdjs/hdvalidate/js/hdvalidate.js'></script>\n";
        return $php;
    }
    //js轮换版
    public function _hdslide($attr,$content){
        $php = '';
        $php .= "<script src='__HDPHP_EXTEND__/Org/hdjs/hdslide/js/hdslide.js'></script>\n";
        return $php;
    }
    //Jcrop图片裁切
    public function _jcrop($attr, $content)
    {
        return "<link type='text/css' rel='stylesheet' href='__HDPHP_EXTEND__/Org/jcrop/css/jquery.Jcrop.min.css'/>\n
        <script src='__HDPHP_EXTEND__/Org/jcrop/js/jquery.Jcrop.min.js'></script>\n";
    }
}