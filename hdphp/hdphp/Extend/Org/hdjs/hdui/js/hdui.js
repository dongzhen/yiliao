// ====================================================================================
// ===================================--|HDJS前端库|--======================================
// ====================================================================================
// .-----------------------------------------------------------------------------------
// |  Software: [HDJS framework]
// |   Version: 2013.08
// |      Site: http://www.hdphp.com
// |-----------------------------------------------------------------------------------
// |    Author: 后盾网向军 <houdunwangxj@gmail.com>
// | Copyright (c) 2012-2013, http://www.houdunwang.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------
// |   License: http://www.apache.org/licenses/LICENSE-2.0
// '-----------------------------------------------------------------------------------
//去除超链接虚线
$(function () {
    $("a").focus(function () {
        $(this).trigger("blur")
    });
})
//新窗口打开链接
function hd_open_window(url, name) {
    name || '';
    window.open(url, name);
}

/**
 * 关闭窗口
 * @param msg 提示信息
 * @private
 */
function hd_close_window(msg) {
    //    msg = msg || '确定关闭吗？';
    if (msg && confirm(msg))
        window.close()
    else
        window.close();
}

/**
 * 获得对象在页面中心的位置
 * @author hdxj
 * @category functions
 * @param obj 对象
 * @returns {Array} 坐标
 */
function center_pos(obj) {
    var pos = [];
    //位置
    pos[0] = ($(window).width() - obj.width()) / 2
    pos[1] = $(window).scrollTop() + ($(window).height() - obj.height()) / 2
    return pos
}

// ====================================================================================
// =====================================--|UI|--=======================================
// ====================================================================================
// .-----------------------------------------------------------------------------------
// |  Software: [HDJS framework]
// |   Version: 2013.08
// |      Site: http://www.hdphp.com
// |-----------------------------------------------------------------------------------
// |    Author: 向军 <houdunwangxj@gmail.com>
// | Copyright (c) 2012-2013, http://www.houdunwang.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------
// |   License: http://www.apache.org/licenses/LICENSE-2.0
// '-----------------------------------------------------------------------------------
/**
 * tab面板使用
 * @author hdxj
 * @category ui
 */
$(function () {
    //首页加载显示第一1个
    var index = $("div.tab ul.tab_menu li a").index($("a.action:gt(0)"));
    index = index > 0 ? index : 0;
    $("div.tab ul.tab_menu li a").removeClass("action");
    $("div.tab ul.tab_menu li:eq(" + index + ") a").addClass("action");
    $("div.tab div.tab_content").children("div").eq(index).addClass("action");
    $("div.tab_content").children("div").addClass("hd_tab_content_div");
    //点击切换
    $("div.tab ul.tab_menu li").click(function () {
        //改变标题 如果是链接，直接跳转
        if (/^http/i.test($(this).find("a").attr("href"))) {
            return true;
        }
        $("div.tab ul.tab_menu li a").removeClass("action");
        $("a", this).addClass("action");
        var _id = $(this).attr("lab");
        $("div.tab_content div").removeClass("action");
        $("div.tab_content div#" + _id).addClass("action");
    })
})
/**
 * dialog对话框
 */
$.extend({
    "close_dialog": function () {
        $("div.dialog_bg").remove();
        $("div.dialog").remove();
    },
    "dialog": function (options) {
        var _default = {
            "type": "success"//类型 CSS样式
            ,
            "message": "message属性配置错误"//提示信息
            ,
            "timeout": 1//自动关闭时间
            ,
            "close_handler": function () {
            }//关闭时的回调函数
        };
        var opt = $.extend(_default, options);
        //创建元素
        if ($("div.dialog").length == 0) {
            //移除dialog_message对话框
            $('#hd_dialog_message').remove();
            $('#hd_dialog_message_bg').remove();
            var div = '';
            div += '<div class="dialog">';
            div += '<div class="close">';
            div += '<a href="#" title="关闭">×</a></div>';
            div += '<h2 id="dialog_title">提示信息</h2>';
            div += '<div class="con ' + opt.type + '"><strong>ico</strong>';
            div += '<span>' + opt.message + '</span>';
            div += '</div>';
            div += '</div>';
            div += '<div class="dialog_bg"></div>'
            $(div).appendTo("body");

        }
        var _w = $(document).width();
        var _h = $(document).height();
        $("div.dialog_bg").css({
            opacity: 0.8
        }).show();
        $("div.dialog").show();
        //定时id
        var dialog_id;
        //点击关闭dialog
        $("div.dialog div.close a").click(function () {
            opt.close_handler();
            $("div.dialog_bg").remove();
            $("div.dialog").remove();
            clearTimeout(dialog_id);
        })
        //自动关闭
        dialog_id = setTimeout(function () {
            //如果dialog已经关闭，不执行事件
            if ($("div.dialog").length == 0)
                return;
            opt.close_handler();
            $("div.dialog_bg").remove();
            $("div.dialog").remove();
        }, opt.timeout * 1000);
    }
})
//简单提示框
function dialog_message(message, timeOut) {
    //删除提示框
    if (message === false) {
        $('#hd_dialog_message').remove();
        $('#hd_dialog_message_bg').remove();
    } else {
        var timeOut = timeOut ? timeOut * 1000 : 2000;
        //创建背景色
        var html = '<div id="hd_dialog_message_bg"></div>';
        html += "<div id='hd_dialog_message'>" + message + "</div>";
        $("body").append(html);
        //改变背景色
        $("div#hd_dialog_message_bg").css({
            opacity: 0.8
        });
        setTimeout(function () {
            $("div#hd_dialog_message").fadeOut("fast");
            $("div#hd_dialog_message_bg").remove();
        }, timeOut);
    }
}

/**
 * 模态对话框
 * @category ui
 */
$.extend({
    "modal": function (options) {
        var _default = {
            title: '',
            content: '',
            height: 400,
            width: 600,
            button_success: '',
            button_cancel: '',
            message: false,
            type: "success",
            cancel: false, //事件
            success: false, //事件
            show: true//是否显示
        };
        var opt = $.extend(_default, options);
        //----------删除所有弹出框
        $("div.modal").remove();
        var div = '';
        var show = opt.show ? "" : ";display:none;"
        div += '<div class="hd-modal" style="position:fixed;left:50%;top:50px;margin-left:-' + (opt['width'] / 2) + 'px;width:' + opt['width'] + 'px;' + show + 'height:' + opt['height'] + 'px;z-index:1000">';
        //---------------标题设置
        if (opt['title']) {
            div += '<div class="hd-modal-title">' + opt['title'];
            //---------x关闭按钮
            div += '<button class="close" aria-hidden="true" data-dismiss="modal" type="button" onclick="$.removeModal()">×</button>';
            div += '</div>';
        }
        //--------------内容区域
        content_height = opt.height - 32;
        if (opt.button_success || opt.button_cancel) {
            content_height -= 46;
        }
        div += '<div class="content" style="height:' + content_height + 'px;overflow:hidden;">';
        if (opt.message) {
            div += '<div class="hd-modal-message"><strong class="' + opt.type + '"></strong><span>' + opt.message + '</span></div>';
        } else {
            div += opt.content;
        }
        div += '</div>';
        //------------按钮处理
        if (opt.button_success || opt.button_cancel) {
            div += '<div class="hd-modal-footer" ' + (opt.message ? 'style="text-align:center"' : "") + '>';
            //确定按钮
            if (opt.button_success) {
                div += '<a href="javascript:;" class="btn btn-primary hd-success">' + opt.button_success + '</a>';
            }
            //放弃按钮
            if (opt.button_cancel) {
                div += '<a href="javascript:;" class="btn hd-cancel">' + opt.button_cancel + '</a>';
            }
            div += '</div>';
        }
        div += '</div>';
        div += '<div class="hd-modal-bg" style="' + show + '"></div>';
        $(div).appendTo("body");
        var pos = center_pos($(".modal"));
        //点击确定
        $("div.hd-modal-footer a.hd-success").click(function () {
            if (opt.success) {
                opt.success();
            } else {
                $("div.hd-modal-footer a.hd-cancel").trigger("click");
            }
            return true;
        })
        var _w = $(document).width();
        var _h = $(document).height();
        $("div.hd-modal-bg").css({
            opacity: 0.6
        });
        if (opt.show) {
            $("div.hd-modal-bg").show();
        }
        //点击关闭modal
        if (opt.cancel) {
            $("div.hd-modal-footer a.hd-cancel").live("click", opt.cancel);
        } else {
            $("div.hd-modal-footer a.hd-cancel").bind("click", function () {
                $.removeModal();
                return false;
            })
        }
    },
    "removeModal": function () {
        $("div.hd-modal").fadeOut().remove();
        $("div.hd-modal-bg").remove();
    },
    modalShow: function (func) {
        $("div.hd-modal").show();
        $("div.hd-modal-bg").show();
        if (typeof func == 'function')
            func();
    }
});
function hd_confirm(message, success, error) {
    return $.modal({
        width: 320,
        height: 160,
        title: "温馨提示",
        message: message,
        button_success: "确定",
        button_cancel: "关闭",
        type: 'notice', //类型
        success: function () {
            $.removeModal();
            //关闭模态
            success();
        }
    });

}

// ====================================================================================
// ===================================--|表单验证|--=====================================
// ====================================================================================
// .-----------------------------------------------------------------------------------
// |  Software: [HDJS framework]
// |   Version: 2013.08
// |      Site: http://www.hdphp.com
// |-----------------------------------------------------------------------------------
// |    Author: 后盾网向军 <houdunwangxj@gmail.com>
// | Copyright (c) 2012-2013, http://www.houdunwang.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------
// |   License: http://www.apache.org/licenses/LICENSE-2.0
// '-----------------------------------------------------------------------------------

/**
 * 表单提交，没有确定按钮，倒计时关闭窗口
 * @param obj form表单对象
 * @param url 成功时的跳转url
 * @param timeout 超时时间
 * @returns {boolean}
 */
function hd_submit(obj, url, func, timeout) {
    if ($(obj).is_validate()) {
        //阻止多次点击提交按钮表单提交，提交结束后在hd_submit方法中解锁
        if ($(obj).attr('disabled')) {
            return false;
        }
        $(obj).attr('disabled', "");
        var post = $(obj).serialize();
        $.ajax({
            type: "POST",
            url: $(obj).attr("action"),
            dataType : "JSON",
            cache: false,
            data: post,
            success: function (data) {
                $(obj).removeAttr('disabled');
                if (data.status == 1) {
                    $.dialog({
                        message: data.message,
                        timeout: timeout || 1,
                        type: "success",
                        close_handler: function () {
                            if (url) {
                                location.href = url
                            }
                            if (func) {
                                func();
                            }
                        }
                    });
                } else {
                    //解锁
                    $(obj).removeAttr('disabled');
                    $.dialog({
                        message: data.message || "操作失败",
                        timeout: data.timeout || 3,
                        type: "error"
                    });

                }
            }
        })
    }
    return false;
}

/**
 * 笛卡尔乘积
 * @param object list 对象
 * @returns {*}
 * <code>
 * var result = descartes({'a':['a','b'],'b':[1,2]});
 * 或
 * var result = descartes(['a','b'],[1,2]);
 * alert(result);//result就是笛卡尔积
 * </code>
 */
function descarte(list) {
    //parent上一级索引;count指针计数
    var point = {};
    var result = [];
    var pIndex = null;
    var tempCount = 0;
    var temp = [];
    //根据参数列生成指针对象
    for (var index in list) {
        if (typeof list[index] == 'object') {
            point[index] = {
                'parent': pIndex,
                'count': 0
            }
            pIndex = index;
        }
    }
    //单维度数据结构直接返回
    if (pIndex == null) {
        return list;
    }

    //动态生成笛卡尔积
    while (true) {
        for (var index in list) {
            tempCount = point[index]['count'];
            temp.push(list[index][tempCount]);
        }
        //压入结果数组
        result.push(temp);
        temp = [];
        //检查指针最大值问题
        while (true) {
            if (point[index]['count'] + 1 >= list[index].length) {
                point[index]['count'] = 0;
                pIndex = point[index]['parent'];
                if (pIndex == null) {
                    return result;
                }
                //赋值parent进行再次检查
                index = pIndex;
            } else {
                point[index]['count']++;
                break;
            }
        }
    }
}

/**
 * jQuery增强函数
 */
jQuery.extend({
    //过滤空数组
    "array_filter": function (arr) {
        return $.grep(arr, function (n, i) {
            if ($.trim(n)) {
                return true;
            }
        })
    }
})
/**
 * 异步提交操作
 * @param obj
 * @param url
 * @returns {boolean}
 */
function hd_ajax(requestUrl, postData, url) {
    $.ajax({
        type: "POST",
        url: requestUrl,
        cache: false,
        data: postData || {},
        success: function (data) {
            if (data.substr(0, 1) == '{') {
                data = jQuery.parseJSON(data);
                if (data.status == 1) {
                    $.dialog({
                        message: data.message,
                        timeout: data.timeout || 1,
                        type: "success",
                        close_handler: function () {
                            if (url) {
                                location.href = url
                            } else {
                                window.location.reload(true);
                            }
                        }
                    });
                } else {
                    $.dialog({
                        message: data.message || "操作失败",
                        timeout: data.timeout || 1,
                        type: "error"
                    });
                }
            } else {
                $.dialog({
                    message: '操作失败',
                    timeout: 3,
                    type: "error"
                });
            }
        }
    })
}

/**
 * 表单提交，有确定按钮，需要点击确定按钮关闭窗口
 * @param obj form表单对象
 * @param url 成功时的跳转url
 * @returns {boolean}
 */
function hd_submit_confirm(obj, url) {
    if ($(obj).is_validate()) {
        var _post = $(obj).serialize();
        $.ajax({
            type: "POST",
            url: $(obj).attr("action"),
            cache: false,
            data: _post,
            success: function (data) {
                if (data.substr(0, 1) == '{') {
                    data = jQuery.parseJSON(data);
                    if (data.status == 1) {
                        $.modal({
                            width: 250,
                            height: 180,
                            title: '温馨提示',
                            button_cancel: "关闭",
                            message: data.message,
                            type: "success",
                            //点击确定窗口
                            cancel: function () {
                                if (url) {
                                    location.href = url
                                } else {
                                    window.location.reload(true);
                                }
                            }
                        })
                    } else {
                        $.dialog({
                            message: data.message || "操作失败",
                            type: "error",
                            close_handler: function () {
                                location.href = url;
                            }
                        });
                    }
                } else {
                    $.dialog({
                        message: "操作失败",
                        type: "error",
                        close_handler: function () {
                            location.href = url;
                        }
                    });
                }
            }
        })
    }
    return false;
}

//＝＝＝＝＝＝加入收藏夹＝＝＝＝＝＝＝＝＝＝＝
function AddFavorite(sURL, sTitle) {
    try {
        window.external.addFavorite(sURL, sTitle);
    } catch (e) {
        try {
            window.sidebar.addPanel(sTitle, sURL, "");
        } catch (e) {
            alert("加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}
//设置首页
function SetHome(obj, vrl) {
    try {
        obj.style.behavior = 'url(#default#homepage)';
        obj.setHomePage(vrl);
    } catch (e) {
        if (window.netscape) {
            try {
                netscape.security.PRivilegeManager.enablePrivilege("UniversalXPConnect");
            } catch (e) {
                alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将[signed.applets.codebase_principal_support]设置为'true'");
            }
            var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
            prefs.setCharPref('browser.startup.homepage', vrl);
        }
    }
}

//＝＝＝＝＝＝加入收藏夹＝＝＝＝＝＝＝＝＝＝＝

/**
 * 全选
 * @param element
 */
function select_all(element) {
    $(element).find($("[type='checkbox']")).attr("checked", "checked");
}

/**
 * 反选
 * @param element
 */
function reverse_select(element) {
    $(element).find($("[type='checkbox']")).attr("checked", function () {
        return !$(this).attr("checked") == 1
    });
}

/**
 * cookie操作类
 */
var cookie = {
    set: function (name, value, iDay) {
        var oDate = new Date();
        oDate.setDate(oDate.getDate() + iDay);
        document.cookie = name + '=' + value + ';expires=' + oDate;
    },
    get: function (name) {
        var arr = document.cookie.split('; ');
        for (var i = arr.length - 1; i >= 0; i--) {
            var arr2 = arr[i].split('=');
            if (arr2[0] === name) {
                return arr2[1];
            }
        }
        return '';
    },
    del: function (name) {
        cookie.setCookie(name, 1, -1);
    }
}
