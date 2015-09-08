/**
 * 表单验证
 * @category validate
 */

$.fn.extend({
    validate : function(options) {
        //验证的form表单
        var formObj = $(this);
        //验证规则
        var method = {
            //比较两个表单
            "confirm" : function(data) {
                var field = $("[name='" + options[data.name].rule["confirm"] + "']");
                //比较表单内容是否相等
                stat = data.obj.val() == field.val();
                //验证结果处理，提示信息等
                method.call_handler(stat, data);
            },
            //数字
            "num" : function(data) {
                //内容不为空时验证
                if (data.obj.val()) {
                    var opt = options[data.name].rule["num"].split(/\s*,\s*/);
                    var val = data.obj.val() * 1;
                    //验证表单
                    stat = val >= opt[0] * 1 && val <= opt[1] * 1;
                    //验证结果处理，提示信息等
                    method.call_handler(stat, data);
                }
            },
            //验证手机
            "phone" : function(data) {
                //内容不为空时验证
                if (data.obj.val()) {
                    //验证表单
                    stat = /^\d{11}$/.test(data.obj.val());
                    //验证结果处理，提示信息等
                    method.call_handler(stat, data);
                }
            },
            //QQ号
            "qq" : function(data) {
                //内容不为空时验证
                if (data.obj.val()) {
                    //验证表单
                    stat = /^\d{5,10}$/.test(data.obj.val());
                    //验证结果处理，提示信息等
                    method.call_handler(stat, data);
                }
            },
            //验证固定电话
            "tel" : function(data) {
                //内容不为空时验证
                if (data.obj.val()) {
                    //验证表单
                    stat = /(?:\(\d{3,4}\)|\d{3,4}-?)\d{8}/.test(data.obj.val());
                    //验证结果处理，提示信息等
                    method.call_handler(stat, data);
                }
            },
            //验证身份证
            "identity" : function(data) {
                //内容不为空时验证
                if (data.obj.val()) {
                    //验证表单
                    stat = /^(\d{15}|\d{18})$/.test(data.obj.val());
                    //验证结果处理，提示信息等
                    method.call_handler(stat, data);
                }
            },
            //网址
            "http" : function(data) {
                //内容不为空时验证
                if (data.obj.val()) {
                    //验证表单
                    stat = /^(http[s]?:)?(\/{2})?([a-z0-9]+\.)?[a-z0-9]+(\.(com|cn|cc|org|net|com.cn))$/i.test(data.obj.val());
                    //验证结果处理，提示信息等
                    method.call_handler(stat, data);
                }
            },
            //中文
            "china" : function(data) {
                //内容不为空时验证
                if (data.obj.val()) {
                    //验证表单
                    stat = /^([^u4e00-u9fa5]|\w)+$/i.test(data.obj.val());
                    //验证结果处理，提示信息等
                    method.call_handler(stat, data);
                }
            },
            //最小长度
            "minlen" : function(data) {
                //内容不为空时验证
                if (data.obj.val()) {
                    //验证表单
                    stat = data.obj.val().length >= options[data.name].rule["minlen"];
                    //验证结果处理，提示信息等
                    method.call_handler(stat, data);
                }
            },
            //最大长度
            "maxlen" : function(data) {
                //内容不为空时验证
                if (data.obj.val()) {
                    //验证表单
                    stat = data.obj.val().length <= options[data.name].rule["maxlen"];
                    //验证结果处理，提示信息等
                    method.call_handler(stat, data);
                }
            },
            //正则验证处理
            "regexp" : function(data) {
                if (data.obj.val()) {
                    //是否正则对象
                    if (options[data.name].rule["regexp"] instanceof RegExp) {
                        //是否必须验证
                        var reg = options[data.name].rule["regexp"];
                        stat = reg.test(data.obj.val());
                        //验证结果处理，提示信息等
                        method.call_handler(stat, data);
                    }
                }
            },
            //验证邮箱
            "email" : function(data) {
                //内容不为空时验证
                if (data.obj.val()) {
                    //验证表单
                    stat = /^([a-zA-Z0-9_\-\.])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/i.test(data.obj.val());
                    //验证结果处理，提示信息等
                    method.call_handler(stat, data);
                }
            },
            //验证用户名
            "user" : function(data) {
                if (data.obj.val()) {
                    //user: "6,20"  opt为拆分"6,20"
                    var opt = options[data.name].rule["user"].split(/\s*,\s*/);
                    var reg = new RegExp("^[a-z]\\\w{" + (opt[0] - 1) + "," + (opt[1] - 1) + "}$", "i");
                    //验证表单
                    stat = reg.test(data.obj.val());
                    //验证结果处理，提示信息等
                    method.call_handler(stat, data);
                }
            },
            //验证表单是否必须添写
            "required" : function(data) {
                var required = options[data.name].rule["required"];
                //是否必须验证
                if (required) {
                    //不为空
                    stat = $.trim(data.obj.val()) != "";
                    //验证结果处理，提示信息等
                    method.call_handler(stat, data);
                } else if (data.obj.val() == '') {//非必填项，当表单内容为空时，清除提示信息
                    method.call_handler(true, data);
                }
            },
            "ajax" : function(data) {
                if ($(data.obj).attr('ajax_run'))
                    return;
                if (data.obj.attr('ajax_validate') == 1) {
                    if (data.send)
                        formObj.trigger("submit");
                    return;
                }
                //----------------------------------异步提交的参数值--------------------------

                //Ajax验证的参数 Object or String
                var requestData = options[data.name].rule["ajax"];
                var param = {};
                //异步传参
                var url = '';
                //请求的Url
                if ( typeof requestData == 'object') {//传参为对象
                    url = requestData.url;
                    //请求Url
                    param[data.name] = data.obj.val();
                    //附加请求参数
                    if (requestData['data']) {
                        for (var i in requestData['data']) {
                            param[i] = requestData['data'][i];
                        }
                    }
                    //附附加字段，有field属性
                    if (requestData['field']) {
                        for (var i = 0; i < requestData['field'].length; i++) {
                            var name = requestData['field'][i];
                            param[name] = $("[name='" + name + "']").val();
                        }
                    }
                } else {
                    url = requestData;
                    param[data.name] = data.obj.val();
                }
                $(data.obj).attr('ajax_run', 1);
                //----------------------------------异步提交的参数值--------------------------
                //发送异步
                $.ajax({
                    url : url+'&_'+Math.random(),
                    cache : false,
                    async : true,
                    type : 'POST',
                    data : param,
                    success : function(status) {
                        $(data.obj).removeAttr('ajax_run');
                        //成功时，如果是提交暂停状态则再次提交
                        if (status == 1) {
                            //记录验证结果
                            data.obj.attr('ajax_validate', 1);
                            //验证结果处理，提示信息等
                            method.call_handler(1, data);
                            //如果是通过submit调用，则提交
                            if (data.send) {
                                formObj.trigger("submit");
                            }
                        } else {
                            //验证结果处理，提示信息等
                            method.call_handler(0, data);
                        }
                    }
                });
            },
            //调用事件处理程序（设置错误信息）
            call_handler : function(stat, data) {
                var obj = data.obj;
                //表单对象
                $(data.spanObj).removeClass("validate-error validate-success validate-message").html('');
                //验证回调函数
                if(data.handler){
                    stat = data.handler();
                }
                if (stat) {//验证通过
                    //添加表单属性validate
                    obj.attr("validate", 1);
                    //设置正确提示信息
                    var msg = (options[data.name].success || options[data.name].message);
                    //如果非必填项，且内容为空时，为没有错误
                    if (!data.required && data.obj.val() == '') {
                        msg = options[data.name].message || '';
                        if (msg)
                            $(data.spanObj).addClass("validate-message").html(msg);
                    } else if (options[data.name].success) {
                        $(data.spanObj).addClass("validate-success").html(msg);
                    } else if (msg) {
                        $(data.spanObj).addClass("validate-success").html(msg);
                    }
                } else {
                    //验证失败
                    obj.attr("validate", 0);
                    //添加表单属性validate
                    //设置错误提示信息
                    if (options[data.name].error && options[data.name].error[data.rule])
                        var msg = (options[data.name].error[data.rule]);
                    else
                        var msg = "输入错误";
                    $(data.spanObj).addClass("validate-error").html(msg);
                }

            },
            /**
             * 添加验证设置
             * @param name 表单名
             * @param spanObj 提示信息span
             */
            set : function(name, spanObj) {
                //如果没有设置rule属性时，添加rule属性
                if (!options[name].rule) {
                    options[name].rule = {};
                    options[name].rule.required = false;
                }
                var obj = method.getSpanElement(name);
                //表单
                var fieldObj = obj[0];
                //错误提示信息span对象
                var spanObj = obj[1];
                //设置默认提示信息
                method.setDefaultMessage(name, spanObj);
                //获得焦点时设置默认提示信息
                fieldObj.live("focus", function(event, send) {
                    var msg = options[name].message || '';
                    if (msg)
                        spanObj.removeClass('validate-error validate-success').addClass('validate-message').html(msg);
                })
                //没有设置required必须验证时，默认为不用验证
                options[name].rule.required || (options[name].rule.required = false);
                //默认添加validate属性为1（即成功），必须验证字段设置为0
                if (options[name].rule.required) {
                    fieldObj.attr("validate", 0);
                } else {
                    fieldObj.attr("validate", 1);
                }
                //密码确认表单，默认为验证失败（必须验证）
                if (options[name]['rule']['confirm']) {
                    $(fieldObj).attr("validate", 0);
                }
                //获取表单斛发的事件(blur 或 change)
                fieldObj.live('blur', function(event, send) {
                    //如果有Ajax，移除焦点时将validate设为0,否则设置为1
                    if (options[name].rule.ajax) {
                        fieldObj.attr('ajax_validate', 0);
                    }else{
                        fieldObj.attr('ajax_validate', 1);
                    }
                    var required = options[name].rule.required;
                    //没有设置required并且内容为空时，验证通过
                    if (!required && $(this).val() == '' && !options[name]['rule']['confirm'] ) {
                        $(this).attr('validate', 1).attr('ajax_validate', 1);
                        var msg = options[name].message || '';
                        if (msg) {
                            spanObj.removeClass('validate-error validate-success validate-message').addClass(' validate-message').html(msg);
                        } else {
                            spanObj.removeClass('validate-error validate-success validate-message').html(msg);
                        }
                    } else {
                        for (var rule in options[name].rule) {
                            //验证方法存在
                            if (method[rule]) {
                                //验证回调函数
                                if(options[name].handler&& options[name].handler[rule]){
                                    handler = options[name].handler[rule];
                                }else{
                                    handler=undefined;
                                }
                                /**
                                 * 验证失败 终止验证
                                 * 参数说明：
                                 * name 表单name属性
                                 * obj 表单对象
                                 * rule 规则的具体值
                                 * send 是否为submit激活的
                                 * handler 处理函数
                                 */
                                method[rule]({
                                    event : event,
                                    name : name,
                                    obj : fieldObj,
                                    rule : rule,
                                    spanObj : spanObj,
                                    send : send,
                                    required : required,
                                    handler:handler
                                });
                                if (fieldObj.attr('validate') == 0)
                                    break;
                            }
                        }
                    }
                });
            },
            /**
             * 设置默认提示信息
             * @param name 表单名
             * @param spanObj 提示信息span
             */
            setDefaultMessage : function(name, spanObj) {
                var msg = options[name].message;
                if (msg) {
                    spanObj.addClass('validate-message').html(msg);
                }
            },
            //获得span提示信息标签
            getSpanElement : function(name) {
                var fieldObj = $("[name='" + name + "']");
                var spanId = "hd_" + name;
                //span提示信息表单的id
                if ($("[id='" + spanId + "']").length == 0) {
                    fieldObj.after("<span id='" + spanId + "'></span>");
                }
                spanObj = $("[id='" + spanId + "']");
                return [fieldObj, spanObj];
            }
        };
        //处理事件
        for (var name in options) {
            //验证表单规则
            method.set(name);
        }
        /**
         * 阻止回车提交表单
         */
        $(this).keydown(function(event) {
            if (event.keyCode == 13)
                return false;
        })
        /**
         * 提交验证
         * action
         */
        $(this).submit(function(event, action) {
            //触发表单事件
            $('[validate=0]', this).trigger('blur', 'submit');
            $('[ajax_validate=0]', this).trigger('blur', 'submit');
            //如果是通过hd_submit提交时，此方法失效
            if ($(this).attr('disabled'))return false;
            //表单都验证合法
            if ($(this).find("[validate='0']").length == 0 && $(this).find("[ajax_validate='0']").length == 0) {
                return true;
            }else{
                return false;
            }
        })
    },
    //验证表单
    is_validate : function() {
        $('[validate=0]', this).trigger('blur', 'submit');
        $('[ajax_validate=0]', this).trigger('blur', 'submit');
        if ($(this).find("[validate='0']").length == 0 && $(this).find("[ajax_validate='0']").length == 0) {
            return true;
        }
        return false;
    }
});