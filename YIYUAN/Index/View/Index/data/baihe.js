var baihe = baihe || {};

baihe.validateRegExp = {
    mobile: "^1[0-9]{10}$",
    // 手机
    password: "^[A-Za-z0-9\\ww`~!@#$%^&*()_+\\-=<>?:\"\';,.\\/\\[\\]\\{\\}]{6,30}$",
    // 密码   
    nikename: "^[\u4E00-\u9FA5a-zA-Z0-9]{1,12}$",
    // 昵称
    decmal: "^([+-]?)\\d*\\.\\d+$",
    // 浮点数
    decmal1: "^[1-9]\\d*.\\d*|0.\\d*[1-9]\\d*$",
    // 正浮点数
    decmal2: "^-([1-9]\\d*.\\d*|0.\\d*[1-9]\\d*)$",
    // 负浮点数
    decmal3: "^-?([1-9]\\d*.\\d*|0.\\d*[1-9]\\d*|0?.0+|0)$",
    // 浮点数
    decmal4: "^[1-9]\\d*.\\d*|0.\\d*[1-9]\\d*|0?.0+|0$",
    // 非负浮点数（正浮点数 + 0）
    decmal5: "^(-([1-9]\\d*.\\d*|0.\\d*[1-9]\\d*))|0?.0+|0$",
    // 非正浮点数（负浮点数 +
    // 0）
    intege: "^-?[1-9]\\d*$",
    // 整数
    intege1: "^[1-9]\\d*$",
    // 正整数
    intege2: "^-[1-9]\\d*$",
    // 负整数
    num: "^([+-]?)\\d*\\.?\\d+$",
    // 数字
    num1: "^[1-9]\\d*|0$",
    // 正数（正整数 + 0）
    num2: "^-[1-9]\\d*|0$",
    // 负数（负整数 + 0）
    ascii: "^[\\x00-\\xFF]+$",
    // 仅ACSII字符
    chinese: "^[\\u4e00-\\u9fa5]+$",
    // 仅中文
    color: "^[a-fA-F0-9]{6}$",
    // 颜色
    date: "^\\d{4}(\\-|\\/|\.)\\d{1,2}\\1\\d{1,2}$",
    // 日期
    email: "^[A-Za-z0-9]+[A-Za-z0-9_\\-.]*[A-Za-z0-9]+\\@[A-Za-z0-9\\-_]+(((\\._-)[A-Za-z0-9]+)*\\.[A-Za-z0-9]+)+$",
    // 身份证
    ip4: "^(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)\\.(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)\\.(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)\\.(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)$",
    // ip地址
    letter: "^[A-Za-z]+$",
    // 字母
    letter_l: "^[a-z]+$",
    // 小写字母
    letter_u: "^[A-Z]+$",
    // 大写字母
    notempty: "^\\S+$",
    // 非空
    fullNumber: "^[0-9]+$",
    // 数字
    picture: "(.*)\\.(jpg|bmp|gif|ico|pcx|jpeg|tif|png|raw|tga)$",
    // 图片
    qq: "^[1-9]*[1-9][0-9]*$",
    // QQ号码
    rar: "(.*)\\.(rar|zip|7zip|tgz)$",
    // 压缩文件
    tel: "^[0-9\-()（）]{7,18}$",
    // 电话号码的函数(包括验证国内区号,国际区号,分机号)
    url: "^http[s]?:\\/\\/([\\w-]+\\.)+[\\w-]+([\\w-./?%&=]*)?$",
    // url
    username: "^[A-Za-z0-9_\\-\\u4e00-\\u9fa5]+$",
    // 户名
    deptname: "^[A-Za-z0-9_()（）\\-\\u4e00-\\u9fa5]+$",
    // 单位名
    zipcode: "^\\d{6}$",
    // 邮编
    realname: "^[A-Za-z\\u4e00-\\u9fa5]+$",
    // 真实姓名
    companyname: "^[A-Za-z0-9_()（）\\-\\u4e00-\\u9fa5]+$",
    companyaddr: "^[A-Za-z0-9_()（）\\#\\-\\u4e00-\\u9fa5]+$",
    companysite: "^http[s]?:\\/\\/([\\w-]+\\.)+[\\w-]+([\\w-./?%&#=]*)?$",
    //去除空格
    trim: "(^\\s*)|(\\s*$)"
};

// 验证规则
baihe.validateRules = {
    isNull: function(str) {
        return (str == "" || typeof str != "string");
    },
    betweenLength: function(str, _min, _max) {
        return (str.length >= _min && str.length <= _max);
    },
    isUid: function(str) {
        return new RegExp(baihe.validateRegExp.username).test(str);
    },
    fullNumberName: function(str) {
        return new RegExp(baihe.validateRegExp.fullNumber).test(str);
    },
    isPwd: function(str) {
        return new RegExp(baihe.validateRegExp.password).test(str);
    },
    isPwdRepeat: function(str1, str2) {
        return (str1 == str2);
    },
    isEmail: function(str) {
        return new RegExp(baihe.validateRegExp.email).test(str);
    },
    isLoginEmail:function(str){
        return new RegExp(baihe.validateRegExp.loginEmail).test(str);
    },
    isTel: function(str) {
        return new RegExp(baihe.validateRegExp.tel).test(str);
    },
    isMobile: function(str) {
        return new RegExp(baihe.validateRegExp.mobile).test(str);
    },
    checkType: function(element) {
        return (element.attr("type") == "checkbox" || element.attr("type") == "radio" || element.attr("rel") == "select");
    },
    isRealName: function(str) {
        return new RegExp(baihe.validateRegExp.realname).test(str);
    },
    isCompanyname: function(str) {
        return new RegExp(baihe.validateRegExp.companyname).test(str);
    },
    isCompanyaddr: function(str) {
        return new RegExp(baihe.validateRegExp.companyaddr).test(str);
    },
    isCompanysite: function(str) {
        return new RegExp(baihe.validateRegExp.companysite).test(str);
    },
    simplePwd: function(str) {
        // var pin = $("#regName").val();
        // if (pin.length > 0) {
        // pin = strTrim(pin);
        // if (pin == str) {
        // return true;
        // }
        // }
        return pwdLevel(str) == 1;
    },
    weakPwd: function(str) {
        for (var i = 0; i < weakPwdArray.length; i++) {
            if (weakPwdArray[i] == str) {
                return true;
            }
        }
        return false;
    },
    trim: function(str) {
        return str.replace(new RegExp(baihe.validateRegExp.trim, "g"), "");
    }
};
/**
 * 获取下拉菜单的值
 * @param  {[string]} ele [包含select的父集元素]
 * @return {[string]}     [description]
 */
baihe.getBaiHeSelectVal = function(ele) {
    var wrapper = $(ele);
    return $('select option:selected', wrapper).val();
};
/**
 * 设置下拉菜单的值
 * @param {[string]} ele [包含select的父集元素]
 * @param {[string]} val [值]
 */
baihe.setBaiHeSelectVal = function(ele, val) {
    var wrapper = $(ele);
    selectIndex = $("select option[value='" + val + "']", wrapper).index();
    $('ul a:eq(' + selectIndex + ')', wrapper).trigger('click');
};
/**
 * [获取时间]
 * @param  {[type]} ele [日期包含标签]
 * @return {[string]}     [时间/19010101]
 */
baihe.getBaiHeDatePickerVal = function(ele) {
        var dBirth = "";
        $('select', $(ele)).each(function() {
            dBirth += parseInt($("option:selected", this).val()) > 9 ? $("option:selected", this).val() : ('0' + $("option:selected", this).val());
        });
        return dBirth;
    }
    /**
     * 设置时间
     * @param {string} ele {日期包含标签}
     * @param {string} val {日期格式 19870105}
     */

baihe.setBaiHeDatePickerVal = function(ele, val) {
    var dBirth = [];
    dBirth.push(parseInt(val.slice(0, 4)));
    dBirth.push(parseInt(val.slice(4, 6)));
    dBirth.push(parseInt(val.slice(6, 8)));
    $('select', ele).each(function(index) {
        var selectIndex = $("option[value='" + dBirth[index] + "']", this).index();
        var wrapper = $(this).parent();
        $('ul a:eq(' + selectIndex + ')', wrapper).trigger('click');

    });
};

baihe.getBaiHeDistrictDataVal = function(ele) {    
    return  $(ele).attr('data-val')?$(ele).attr('data-val'):'';
};

baihe.getBaiHeDistrictVal = function(ele) {    
    return  $(ele).attr('value')?$(ele).attr('value'):'';
};

baihe.setBaiHeDistrict = function(ele,value,data) {    
    $(ele).val(value).attr('data-val',data);
};

baihe.getBaiHeUniversityDataVal = function(ele) {    
    return  $(ele).attr('data-val')?$(ele).attr('data-val'):'';
};

baihe.getBaiHeUniversityVal = function(ele) {    
    return  $(ele).attr('value')?$(ele).attr('value'):'';
};

baihe.setBaiHeUniversity = function(ele,value,data) {    
    $(ele).val(value).attr('data-val',data);
};


// 公用提示框
baihe.block = function(opt){
    opt = $.extend({
                type: 0, // 默认没取消按钮
                title: "提示", //标题
                text: '提示内容', //提示内容
                callback: false // 回调函数
            }, opt);
    var tmep = opt.type == 1 ? '<div class="pop_layer often"><a href="#" class="popClose">关闭</a><div class="popTit">'+opt.title+'</div><div class="oftenCont">'+opt.text+'</div><div class="oftenIcon"><a href="#" class="orange js_confirm">确 定</a><a href="#" class="grey js_cancel">取 消</a></div></div>' : '<div class="pop_layer often"><a href="#" class="popClose">关闭</a><div class="popTit">'+opt.title+'</div><div class="oftenCont">'+opt.text+'</div><a href="#" class="orange btn js_confirm">确 定</a></div>';
    
    $.blockUI({ message: tmep });
    $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI);
    $('.blockMsg .popClose, .blockMsg .js_cancel').click(function(event){
        event.preventDefault();
        $.unblockUI();
    });
    $('.blockMsg .js_confirm').click(function(event){
        event.preventDefault();
        $.unblockUI();
        if(opt.callback){
            opt.callback();
        }     
    });
};

//阻止冒泡
baihe.stopBubble = function (e) {
    if (e && e.stopPropagation) {
        e.stopPropagation();
    } else {
        window.event.cancelBubble = true;
    }
};
/**
 * [获取url的参数值]
 * @param  {[string]} url  [url字符串]
 * @param  {[string]} name [参数名]
 * @return {[string]}      [参数值]
 */
baihe.getUrlParaments = function(url, name) {
    if (url.split('?').length <= 1) {
        return '';
    }
    var arrName = url.split('?')[1].split('&');
    if (name) {
        for (var i = 0; i < arrName.length; i++) {
            if (arrName[i].split('=')[0] == name) {
                return arrName[i].split('=')[1];
            }
        }
    } else {
        return url.split('?')[1];
    }
    return '';
};



(function() {
    var rRoute, rFormat;
    /**
     * 在一个对象中查询指定路径代表的值，找不到时返回undefined
     * @param {Object} obj 被路由的对象
     * @param {Object} path 路径
     */
    $.route = function(obj, path) {
        obj = obj || {};
        var m;
        (rRoute || (rRoute = /([\d\w_]+)/g)).lastIndex = 0;
        while ((m = rRoute.exec(path)) !== null) {
            obj = obj[m[0]];
            if (obj == undefined) {
                break;
            }
        }
        return obj;
    };
    /**
     * 格式化一个字符串
     */
    $.format = function() {
        var args = $.makeArray(arguments),
            str = String(args.shift() || ""),
            ar = [],
            first = args[0];
        args = $.isArray(first) ? first : typeof(first) == 'object' ? args : [args];
        $.each(args, function(i, o) {
            ar.push(str.replace(rFormat || (rFormat = /\{([\d\w\.]+)\}/g), function(m, n, v) {
                v = n === 'INDEX' ? i : n.indexOf(".") < 0 ? o[n] : $.route(o, n);
                return v === undefined ? m : ($.isFunction(v) ? v.call(o, n) : v)
            }));
        });
        return ar.join('');
    };
})();






/*!
 * jQuery blockUI plugin
 * Version 2.70.0-2014.11.23
 * Requires jQuery v1.7 or later
 *
 * Examples at: http://malsup.com/jquery/block/
 * Copyright (c) 2007-2013 M. Alsup
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * Thanks to Amir-Hossein Sobhi for some excellent contributions!
 */

(function() {
/*jshint eqeqeq:false curly:false latedef:false */
"use strict";

    function setup($) {
        $.fn._fadeIn = $.fn.fadeIn;

        var noOp = $.noop || function() {};

        // this bit is to ensure we don't call setExpression when we shouldn't (with extra muscle to handle
        // confusing userAgent strings on Vista)
        var msie = /MSIE/.test(navigator.userAgent);
        var ie6  = /MSIE 6.0/.test(navigator.userAgent) && ! /MSIE 8.0/.test(navigator.userAgent);
        var mode = document.documentMode || 0;
        var setExpr = $.isFunction( document.createElement('div').style.setExpression );

        // global $ methods for blocking/unblocking the entire page
        $.blockUI   = function(opts) { install(window, opts); };
        $.unblockUI = function(opts) { remove(window, opts); };

        // convenience method for quick growl-like notifications  (http://www.google.com/search?q=growl)
        $.growlUI = function(title, message, timeout, onClose) {
            var $m = $('<div class="growlUI"></div>');
            if (title) $m.append('<h1>'+title+'</h1>');
            if (message) $m.append('<h2>'+message+'</h2>');
            if (timeout === undefined) timeout = 3000;

            // Added by konapun: Set timeout to 30 seconds if this growl is moused over, like normal toast notifications
            var callBlock = function(opts) {
                opts = opts || {};

                $.blockUI({
                    message: $m,
                    fadeIn : typeof opts.fadeIn  !== 'undefined' ? opts.fadeIn  : 700,
                    fadeOut: typeof opts.fadeOut !== 'undefined' ? opts.fadeOut : 1000,
                    timeout: typeof opts.timeout !== 'undefined' ? opts.timeout : timeout,
                    centerY: false,
                    showOverlay: false,
                    onUnblock: onClose,
                    css: $.blockUI.defaults.growlCSS
                });
            };

            callBlock();
            var nonmousedOpacity = $m.css('opacity');
            $m.mouseover(function() {
                callBlock({
                    fadeIn: 0,
                    timeout: 30000
                });

                var displayBlock = $('.blockMsg');
                displayBlock.stop(); // cancel fadeout if it has started
                displayBlock.fadeTo(300, 1); // make it easier to read the message by removing transparency
            }).mouseout(function() {
                $('.blockMsg').fadeOut(1000);
            });
            // End konapun additions
        };

        // plugin method for blocking element content
        $.fn.block = function(opts) {
            if ( this[0] === window ) {
                $.blockUI( opts );
                return this;
            }
            var fullOpts = $.extend({}, $.blockUI.defaults, opts || {});
            this.each(function() {
                var $el = $(this);
                if (fullOpts.ignoreIfBlocked && $el.data('blockUI.isBlocked'))
                    return;
                $el.unblock({ fadeOut: 0 });
            });

            return this.each(function() {
                if ($.css(this,'position') == 'static') {
                    this.style.position = 'relative';
                    $(this).data('blockUI.static', true);
                }
                this.style.zoom = 1; // force 'hasLayout' in ie
                install(this, opts);
            });
        };

        // plugin method for unblocking element content
        $.fn.unblock = function(opts) {
            if ( this[0] === window ) {
                $.unblockUI( opts );
                return this;
            }
            return this.each(function() {
                remove(this, opts);
            });
        };

        $.blockUI.version = 2.70; // 2nd generation blocking at no extra cost!

        // override these in your code to change the default behavior and style
        $.blockUI.defaults = {
            // message displayed when blocking (use null for no message)
            message:  '<h1>Please wait...</h1>',

            title: null,        // title string; only used when theme == true
            draggable: true,    // only used when theme == true (requires jquery-ui.js to be loaded)

            theme: false, // set to true to use with jQuery UI themes

            // styles for the message when blocking; if you wish to disable
            // these and use an external stylesheet then do this in your code:
            // $.blockUI.defaults.css = {};
            css: {
                padding:    0,
                margin:     0,
                width:      '30%',
                top:        '40%',
                left:       '35%',
                textAlign:  'center',
                color:      '#000',
                border:     '',
                backgroundColor:'#fff',
                cursor:     'wait'
            },

            // minimal style set used when themes are used
            themedCSS: {
                width:  '30%',
                top:    '40%',
                left:   '35%'
            },

            // styles for the overlay
            overlayCSS:  {
                backgroundColor:    '#000',
                opacity:            0.6,
                cursor:             'wait'
            },

            // style to replace wait cursor before unblocking to correct issue
            // of lingering wait cursor
            cursorReset: 'default',

            // styles applied when using $.growlUI
            growlCSS: {
                width:      '350px',
                top:        '10px',
                left:       '',
                right:      '10px',
                border:     'none',
                padding:    '5px',
                opacity:    0.6,
                cursor:     'default',
                color:      '#fff',
                backgroundColor: '#000',
                '-webkit-border-radius':'10px',
                '-moz-border-radius':   '10px',
                'border-radius':        '10px'
            },

            // IE issues: 'about:blank' fails on HTTPS and javascript:false is s-l-o-w
            // (hat tip to Jorge H. N. de Vasconcelos)
            /*jshint scripturl:true */
            iframeSrc: /^https/i.test(window.location.href || '') ? 'javascript:false' : 'about:blank',

            // force usage of iframe in non-IE browsers (handy for blocking applets)
            forceIframe: false,

            // z-index for the blocking overlay
            baseZ: 1000,

            // set these to true to have the message automatically centered
            centerX: true, // <-- only effects element blocking (page block controlled via css above)
            centerY: true,

            // allow body element to be stetched in ie6; this makes blocking look better
            // on "short" pages.  disable if you wish to prevent changes to the body height
            allowBodyStretch: true,

            // enable if you want key and mouse events to be disabled for content that is blocked
            bindEvents: true,

            // be default blockUI will supress tab navigation from leaving blocking content
            // (if bindEvents is true)
            constrainTabKey: true,

            // fadeIn time in millis; set to 0 to disable fadeIn on block
            fadeIn:  200,

            // fadeOut time in millis; set to 0 to disable fadeOut on unblock
            fadeOut:  400,

            // time in millis to wait before auto-unblocking; set to 0 to disable auto-unblock
            timeout: 0,

            // disable if you don't want to show the overlay
            showOverlay: true,

            // if true, focus will be placed in the first available input field when
            // page blocking
            focusInput: true,

            // elements that can receive focus
            focusableElements: ':input:enabled:visible',

            // suppresses the use of overlay styles on FF/Linux (due to performance issues with opacity)
            // no longer needed in 2012
            // applyPlatformOpacityRules: true,

            // callback method invoked when fadeIn has completed and blocking message is visible
            onBlock: null,

            // callback method invoked when unblocking has completed; the callback is
            // passed the element that has been unblocked (which is the window object for page
            // blocks) and the options that were passed to the unblock call:
            //  onUnblock(element, options)
            onUnblock: null,

            // callback method invoked when the overlay area is clicked.
            // setting this will turn the cursor to a pointer, otherwise cursor defined in overlayCss will be used.
            onOverlayClick: null,

            // don't ask; if you really must know: http://groups.google.com/group/jquery-en/browse_thread/thread/36640a8730503595/2f6a79a77a78e493#2f6a79a77a78e493
            quirksmodeOffsetHack: 4,

            // class name of the message block
            blockMsgClass: 'blockMsg',

            // if it is already blocked, then ignore it (don't unblock and reblock)
            ignoreIfBlocked: false
        };

        // private data and functions follow...

        var pageBlock = null;
        var pageBlockEls = [];

        function install(el, opts) {
            var css, themedCSS;
            var full = (el == window);
            //var msg = (opts && opts.message !== undefined ? opts.message : undefined);
             var msg = opts && opts.message !== undefined ? opts.message : opts;    // 2015/1/08 yangyanguang  支持v2之前版本的老方法 $.blockUI(message);
            opts = $.extend({}, $.blockUI.defaults, opts || {});

            if (opts.ignoreIfBlocked && $(el).data('blockUI.isBlocked'))
                return;

            opts.overlayCSS = $.extend({}, $.blockUI.defaults.overlayCSS, opts.overlayCSS || {});
            css = $.extend({}, $.blockUI.defaults.css, opts.css || {});
            if (opts.onOverlayClick)
                opts.overlayCSS.cursor = 'pointer';

            themedCSS = $.extend({}, $.blockUI.defaults.themedCSS, opts.themedCSS || {});
            msg = msg === undefined ? opts.message : msg;

            // remove the current block (if there is one)
            if (full && pageBlock)
                remove(window, {fadeOut:0});

            // if an existing element is being used as the blocking content then we capture
            // its current place in the DOM (and current display style) so we can restore
            // it when we unblock
            if (msg && typeof msg != 'string' && (msg.parentNode || msg.jquery)) {
                var node = msg.jquery ? msg[0] : msg;
                var data = {};
                $(el).data('blockUI.history', data);
                data.el = node;
                data.parent = node.parentNode;
                data.display = node.style.display;
                data.position = node.style.position;
                if (data.parent)
                    data.parent.removeChild(node);
            }

            $(el).data('blockUI.onUnblock', opts.onUnblock);
            var z = opts.baseZ;

            // blockUI uses 3 layers for blocking, for simplicity they are all used on every platform;
            // layer1 is the iframe layer which is used to supress bleed through of underlying content
            // layer2 is the overlay layer which has opacity and a wait cursor (by default)
            // layer3 is the message content that is displayed while blocking
            var lyr1, lyr2, lyr3, s;
            if (msie || opts.forceIframe)
                lyr1 = $('<iframe class="blockUI" style="z-index:'+ (z++) +';display:none;border:none;margin:0;padding:0;position:absolute;width:100%;height:100%;top:0;left:0" src="'+opts.iframeSrc+'"></iframe>');
            else
                lyr1 = $('<div class="blockUI" style="display:none"></div>');

            if (opts.theme)
                lyr2 = $('<div class="blockUI blockOverlay ui-widget-overlay" style="z-index:'+ (z++) +';display:none"></div>');
            else
                lyr2 = $('<div class="blockUI blockOverlay" style="z-index:'+ (z++) +';display:none;border:none;margin:0;padding:0;width:100%;height:100%;top:0;left:0"></div>');

            if (opts.theme && full) {
                s = '<div class="blockUI ' + opts.blockMsgClass + ' blockPage ui-dialog ui-widget ui-corner-all" style="z-index:'+(z+10)+';display:none;position:fixed">';
                if ( opts.title ) {
                    s += '<div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">'+(opts.title || '&nbsp;')+'</div>';
                }
                s += '<div class="ui-widget-content ui-dialog-content"></div>';
                s += '</div>';
            }
            else if (opts.theme) {
                s = '<div class="blockUI ' + opts.blockMsgClass + ' blockElement ui-dialog ui-widget ui-corner-all" style="z-index:'+(z+10)+';display:none;position:absolute">';
                if ( opts.title ) {
                    s += '<div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">'+(opts.title || '&nbsp;')+'</div>';
                }
                s += '<div class="ui-widget-content ui-dialog-content"></div>';
                s += '</div>';
            }
            else if (full) {
                s = '<div class="blockUI ' + opts.blockMsgClass + ' blockPage" style="z-index:'+(z+10)+';display:none;position:fixed"></div>';
            }
            else {
                s = '<div class="blockUI ' + opts.blockMsgClass + ' blockElement" style="z-index:'+(z+10)+';display:none;position:absolute"></div>';
            }
            lyr3 = $(s);

            // if we have a message, style it
            if (msg) {
                if (opts.theme) {
                    lyr3.css(themedCSS);
                    lyr3.addClass('ui-widget-content');
                }
                else
                    lyr3.css(css);
            }

            // style the overlay
            if (!opts.theme /*&& (!opts.applyPlatformOpacityRules)*/)
                lyr2.css(opts.overlayCSS);
            lyr2.css('position', full ? 'fixed' : 'absolute');

            // make iframe layer transparent in IE
            if (msie || opts.forceIframe)
                lyr1.css('opacity',0.0);

            //$([lyr1[0],lyr2[0],lyr3[0]]).appendTo(full ? 'body' : el);
            var layers = [lyr1,lyr2,lyr3], $par = full ? $('body') : $(el);
            $.each(layers, function() {
                this.appendTo($par);
            });

            if (opts.theme && opts.draggable && $.fn.draggable) {
                lyr3.draggable({
                    handle: '.ui-dialog-titlebar',
                    cancel: 'li'
                });
            }

            // ie7 must use absolute positioning in quirks mode and to account for activex issues (when scrolling)
            var expr = setExpr && (!$.support.boxModel || $('object,embed', full ? null : el).length > 0);
            if (ie6 || expr) {
                // give body 100% height
                if (full && opts.allowBodyStretch && $.support.boxModel)
                    $('html,body').css('height','100%');

                // fix ie6 issue when blocked element has a border width
                if ((ie6 || !$.support.boxModel) && !full) {
                    var t = sz(el,'borderTopWidth'), l = sz(el,'borderLeftWidth');
                    var fixT = t ? '(0 - '+t+')' : 0;
                    var fixL = l ? '(0 - '+l+')' : 0;
                }

                // simulate fixed position
                $.each(layers, function(i,o) {
                    var s = o[0].style;
                    s.position = 'absolute';
                    if (i < 2) {
                        if (full)
                            s.setExpression('height','Math.max(document.body.scrollHeight, document.body.offsetHeight) - (jQuery.support.boxModel?0:'+opts.quirksmodeOffsetHack+') + "px"');
                        else
                            s.setExpression('height','this.parentNode.offsetHeight + "px"');
                        if (full)
                            s.setExpression('width','jQuery.support.boxModel && document.documentElement.clientWidth || document.body.clientWidth + "px"');
                        else
                            s.setExpression('width','this.parentNode.offsetWidth + "px"');
                        if (fixL) s.setExpression('left', fixL);
                        if (fixT) s.setExpression('top', fixT);
                    }
                    else if (opts.centerY) {
                        if (full) s.setExpression('top','(document.documentElement.clientHeight || document.body.clientHeight) / 2 - (this.offsetHeight / 2) + (blah = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"');
                        s.marginTop = 0;
                    }
                    else if (!opts.centerY && full) {
                        var top = (opts.css && opts.css.top) ? parseInt(opts.css.top, 10) : 0;
                        var expression = '((document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + '+top+') + "px"';
                        s.setExpression('top',expression);
                    }
                });
            }

            // show the message
            if (msg) {
                if (opts.theme)
                    lyr3.find('.ui-widget-content').append(msg);
                else
                    lyr3.append(msg);
                if (msg.jquery || msg.nodeType)
                    $(msg).show();
            }

            if ((msie || opts.forceIframe) && opts.showOverlay)
                lyr1.show(); // opacity is zero
            if (opts.fadeIn) {
                var cb = opts.onBlock ? opts.onBlock : noOp;
                var cb1 = (opts.showOverlay && !msg) ? cb : noOp;
                var cb2 = msg ? cb : noOp;
                if (opts.showOverlay)
                    lyr2._fadeIn(opts.fadeIn, cb1);
                if (msg)
                    lyr3._fadeIn(opts.fadeIn, cb2);
            }
            else {
                if (opts.showOverlay)
                    lyr2.show();
                if (msg)
                    lyr3.show();
                if (opts.onBlock)
                    opts.onBlock.bind(lyr3)();
            }

            // bind key and mouse events
            bind(1, el, opts);

            if (full) {
                pageBlock = lyr3[0];
                pageBlockEls = $(opts.focusableElements,pageBlock);
                if (opts.focusInput)
                    setTimeout(focus, 20);
            }
            else
                center(lyr3[0], opts.centerX, opts.centerY);

            if (opts.timeout) {
                // auto-unblock
                var to = setTimeout(function() {
                    if (full)
                        $.unblockUI(opts);
                    else
                        $(el).unblock(opts);
                }, opts.timeout);
                $(el).data('blockUI.timeout', to);
            }
        }

        // remove the block
        function remove(el, opts) {
            var count;
            var full = (el == window);
            var $el = $(el);
            var data = $el.data('blockUI.history');
            var to = $el.data('blockUI.timeout');
            if (to) {
                clearTimeout(to);
                $el.removeData('blockUI.timeout');
            }
            opts = $.extend({}, $.blockUI.defaults, opts || {});
            bind(0, el, opts); // unbind events

            if (opts.onUnblock === null) {
                opts.onUnblock = $el.data('blockUI.onUnblock');
                $el.removeData('blockUI.onUnblock');
            }

            var els;
            if (full) // crazy selector to handle odd field errors in ie6/7
                els = $('body').children().filter('.blockUI').add('body > .blockUI');
            else
                els = $el.find('>.blockUI');

            // fix cursor issue
            if ( opts.cursorReset ) {
                if ( els.length > 1 )
                    els[1].style.cursor = opts.cursorReset;
                if ( els.length > 2 )
                    els[2].style.cursor = opts.cursorReset;
            }

            if (full)
                pageBlock = pageBlockEls = null;

            if (opts.fadeOut) {
                count = els.length;
                els.stop().fadeOut(opts.fadeOut, function() {
                    if ( --count === 0)
                        reset(els,data,opts,el);
                });
            }
            else
                reset(els, data, opts, el);
        }

        // move blocking element back into the DOM where it started
        function reset(els,data,opts,el) {
            var $el = $(el);
            if ( $el.data('blockUI.isBlocked') )
                return;

            els.each(function(i,o) {
                // remove via DOM calls so we don't lose event handlers
                if (this.parentNode)
                    this.parentNode.removeChild(this);
            });

            if (data && data.el) {
                data.el.style.display = data.display;
                data.el.style.position = data.position;
                data.el.style.cursor = 'default'; // #59
                if (data.parent)
                    data.parent.appendChild(data.el);
                $el.removeData('blockUI.history');
            }

            if ($el.data('blockUI.static')) {
                $el.css('position', 'static'); // #22
            }

            if (typeof opts.onUnblock == 'function')
                opts.onUnblock(el,opts);

            // fix issue in Safari 6 where block artifacts remain until reflow
            var body = $(document.body), w = body.width(), cssW = body[0].style.width;
            body.width(w-1).width(w);
            body[0].style.width = cssW;
        }

        // bind/unbind the handler
        function bind(b, el, opts) {
            var full = el == window, $el = $(el);

            // don't bother unbinding if there is nothing to unbind
            if (!b && (full && !pageBlock || !full && !$el.data('blockUI.isBlocked')))
                return;

            $el.data('blockUI.isBlocked', b);

            // don't bind events when overlay is not in use or if bindEvents is false
            if (!full || !opts.bindEvents || (b && !opts.showOverlay))
                return;

            // bind anchors and inputs for mouse and key events
            var events = 'mousedown mouseup keydown keypress keyup touchstart touchend touchmove';
            if (b)
                $(document).bind(events, opts, handler);
            else
                $(document).unbind(events, handler);

        // former impl...
        //      var $e = $('a,:input');
        //      b ? $e.bind(events, opts, handler) : $e.unbind(events, handler);
        }

        // event handler to suppress keyboard/mouse events when blocking
        function handler(e) {
            // allow tab navigation (conditionally)
            if (e.type === 'keydown' && e.keyCode && e.keyCode == 9) {
                if (pageBlock && e.data.constrainTabKey) {
                    var els = pageBlockEls;
                    var fwd = !e.shiftKey && e.target === els[els.length-1];
                    var back = e.shiftKey && e.target === els[0];
                    if (fwd || back) {
                        setTimeout(function(){focus(back);},10);
                        return false;
                    }
                }
            }
            var opts = e.data;
            var target = $(e.target);
            if (target.hasClass('blockOverlay') && opts.onOverlayClick)
                opts.onOverlayClick(e);

            // allow events within the message content
            if (target.parents('div.' + opts.blockMsgClass).length > 0)
                return true;

            // allow events for content that is not being blocked
            return target.parents().children().filter('div.blockUI').length === 0;
        }

        function focus(back) {
            if (!pageBlockEls)
                return;
            var e = pageBlockEls[back===true ? pageBlockEls.length-1 : 0];
            if (e)
                e.focus();
        }

        function center(el, x, y) {
            var p = el.parentNode, s = el.style;
            var l = ((p.offsetWidth - el.offsetWidth)/2) - sz(p,'borderLeftWidth');
            var t = ((p.offsetHeight - el.offsetHeight)/2) - sz(p,'borderTopWidth');
            if (x) s.left = l > 0 ? (l+'px') : '0';
            if (y) s.top  = t > 0 ? (t+'px') : '0';
        }

        function sz(el, p) {
            return parseInt($.css(el,p),10)||0;
        }

    }


    /*global define:true */
    if (typeof define === 'function' && define.amd && define.amd.jQuery) {
        define(['jquery'], setup);
    } else {
        setup(jQuery);
    }

})();

/**
 * 1、设置cookie的值，比如我们要设置变量名为userid对应值为123的cookie，代码如下：
 * baihe.cookie('userid','123');
 * 2、新建一个cookie，并设置cookie的有效期 路径 域名等，代码如下：
 * baihe.cookie('userid, '123', {expires: 7, path: '/', domain: 'jquery.com', secure: true});
 * 注意：如果去掉后面{}的参数，新建后将以默认设置生效。
 * 3、删除cookie，即把对应cookie值置为null，代码如下：
 * baihe.cookie('userid', null);
 * 4、读取cookie，如读取变量名为userid的cookie值，代码如下：
 * var uId= baihe.cookie('userid');
 */
// baihe.cookie = function(name, value, options) {
//     if (typeof value != 'undefined') {
//         options = options || {};
//         if (value === null) {
//             value = '';
//             options = $.extend({}, options);
//             options.expires = -1;
//         }
//         var expires = '';
//         if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
//             var date;
//             if (typeof options.expires == 'number') {
//                 date = new Date();
//                 date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
//             } else {
//                 date = options.expires;
//             }
//             expires = '; expires=' + date.toUTCString();
//         }
//         var path = options.path ? '; path=' + (options.path) : '';
//         var domain = options.domain ? '; domain=' + (options.domain) : '';
//         var secure = options.secure ? '; secure' : '';
//         document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
//     } else {
//         var cookieValue = null;
//         if (document.cookie && document.cookie != '') {
//             var cookies = document.cookie.split(';');
//             for (var i = 0; i < cookies.length; i++) {
//                 var cookie = cookies[i].replace(/(^\s*)|(\s*$)/g, "");
//                 if (cookie.substring(0, name.length + 1) == (name + '=')) {
//                     cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
//                     break;
//                 }
//             }
//         }
//         return cookieValue;
//     }
// };

baihe.cookie=baihe.cookie||{};
// baihe.cookie.getCookieVal=function(offset) {
//     var endstr = document.cookie.indexOf (";", offset);
//     if (endstr == -1) {
//         endstr = document.cookie.length;
//     }
//     return unescape(document.cookie.substring(offset, endstr));
// }
baihe.cookie.getCookie=function(name) {
    var arg = name + "=";
    var alen = arg.length;
    var clen = document.cookie.length;
    var i = 0;
    while (i < clen) {
        var j = i + alen;
        if (document.cookie.substring(i, j) == arg) {
            var endstr = document.cookie.indexOf (";", j);
            if (endstr == -1) {
                endstr = document.cookie.length;
            }
            return unescape(document.cookie.substring(j, endstr));           
        }
        i = document.cookie.indexOf(" ", i) + 1;
        if (i == 0) break; 
    }
    return "";
}
baihe.cookie.setCookie=function(name, value, expires, path, domain, secure) {
    document.cookie = name + "=" + escape (value) +
    ((expires) ? "; expires=" + expires : "") +
    ((path) ? "; path=" + path : "") +
    ((domain) ? "; domain=" + domain : "") +
    ((secure) ? "; secure" : "");
}
baihe.cookie.deleteCookie=function(name,path,domain) {
    if (baihe.cookie.getCookie(name)) {
        document.cookie = name + "=" +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        "; expires=Thu, 01-Jan-70 00:00:01 GMT";
    }
}
baihe.cookie.getExpDate=function(days, hours, minutes) {
    var expDate = new Date( );
    if (typeof days == "number" && typeof hours == "number" && 
            typeof hours == "number") {
        expDate.setDate(expDate.getDate( ) + parseInt(days));
        expDate.setHours(expDate.getHours( ) + parseInt(hours));
        expDate.setMinutes(expDate.getMinutes( ) + parseInt(minutes));
        return expDate.toGMTString( );
    }
}
//统计npm
baihe.statistics = function(options) {
    options = $.extend({
        spm: '',
        ggCode: ''
    }, options);
    var img1 = new Image();
    img1.src = 'http://bhtg.baihe.com/stat.html?ggCode=' + options.ggCode;
    var img2 = new Image();
    img2.src = 'http://spm.baihe.com/?spm=' + options.spm;
}






