var validArr = new Array();
var msgTips = new Array();
var errTips = new Array();
var temId = '';
var H='';
var isMobileSend = false;
var isEmailSend = false;
msgTips['ok'] = '<div class="ok">正确</div>';
msgTips['error'] = '<div class="error">错误</div>';
msgTips['account'] = '请填写您的注册邮箱或手机号';
msgTips['regMobile'] = '请填写您的注册手机号';
msgTips['regEmail'] = '请填写您的注册邮箱';
msgTips['password'] = '请填写您的注册密码';
msgTips['nikename'] = '请填写昵称';
msgTips['mobile'] = '请输入您的手机号';
msgTips['mybirth'] = '请选择您的生日';
msgTips['mycity'] = '请输入您所在地区';
msgTips['mobileValiCode'] = msgTips['mobileAuthValiCode'] = msgTips['picValiCode'] = "请填写您的验证码";
errTips['mobileValiCode'] = errTips['mobileAuthValiCode'] = errTips['picValiCode'] = "验证码不正确";
errTips['password'] = '请输入6-16位英文或数字';
errTips['nikename'] = '最多可输入12个汉字、字母或数字';
errTips['mobile'] = '请输入正确的手机号';
errTips['mybirth'] = '请选择您的生日';
errTips['mycity'] = '请输入您所在地区';

var _bigMonths = new Array("1", "3", "5", "7", "8", "10", "12");
var _smallMonths = new Array("4", "6", "9", "11");

var sendValiCode = function(msg) {
    var msgType = '',
        msgPhone = '';
    if ($('#regMobile').size() > 0) {
        if ($('#regMobile').prop('checked')) {            
            msgPhone = $('#account').val();
            msgType = $('#mobileValiCode_btn').attr('msg-type');
            // if (showInfoStatu == -1) {
            //     baihe.bhtongji.tongji({
            //         'event': '0',
            //         'spm': '4.10.58.238.713'
            //     });
            // }
        } else {
            msgPhone = $('#mobile_new').val();
            msgType = $('#mobileAuthValiCode_btn').attr('msg-type');
        }
    } else {
        msgPhone = $('#mobile_new').val();
        msgType = $('#mobileAuthValiCode_btn').attr('msg-type');
    }

    if(!msgPhone){
        return false;
    }

     if (showInfoStatu == -1) {
            if(msgType == 1)
            {
                baihe.bhtongji.tongji({'event': '0','spm': '4.10.58.238.713'});
            }else{
                 baihe.bhtongji.tongji({'event': '0','spm': '4.10.58.272.812'});
            }
        }

    newCheckValiCode(msgType, msgPhone);
    // $.ajax({
    //     url: 'http://my.baihe.com/Getinterregist/checkPhoneAuth?jsonCallBack=?',
    //     dataType: 'jsonp',
    //     data: {
    //         'phone': msgPhone
    //     },
    //     success: function(data) {
    //         if (data && data.state == 1 && data.data == 1) {
    //             baihe.block({
    //                 text: '此手机号已经手机认证过，注册成功后将此手机号与原账号解绑，并绑定此账号？',
    //                 callback: function(){checkValiCode(msgType,msgPhone)}
    //             });
    //         }else{
    //             checkValiCode(msgType,msgPhone);
    //         }
    //     }
    // });

};

function checkValiCode(msgType, msgPhone) {
    $("#mobileValiCode_btn").addClass('grey').text('60秒后可重新获取').die();
     var P = 60;
                H = window.setInterval(function() {
                    if (--P == 0) {
                        $("#mobileValiCode_btn").die().attr('msg-type', 2).removeClass('grey').addClass('verLink').text('获取语音验证码').live('click', sendValiCode);
                        $("#callTel").html('').hide();
                        window.clearInterval(H);
                        $("#callTel").hide();
                        isMobileSend = false;
                    } else {
                        $("#mobileValiCode_btn").html(P + "秒后可重新获取");

                    }
                }, 1000);
    $.ajax({
        url: 'http://my.baihe.com/Getinterregist/getPhoneCode?jsonCallBack=?',
        dataType: 'jsonp',
        data: {
            'type': msgType,
            'phone': msgPhone
        },
        success: function(data) {
            if (data && data.data == 1) {                
                if (msgType == 1) {
                    $("#callTel").html('短信验证码已发送。').show();
                    $("#mobileValiCode_nomsg").hide();
                } else if (msgType == 2) {
                    $("#callTel").html('电话拨打中…请接听来自400-029-9520的电话。').show();
                }                
                isMobileSend = true;               
            } else if (data && data.data == -212) {
                window.clearInterval(H);
                $("#mobileValiCode_btn").addClass('grey').text('获取语音验证码').die();
                if (msgType == 1)
                    $('#mobileValiCode_msg').html('短信验证码超过每天最大次数');
                if (msgType == 2)
                    $('#mobileValiCode_msg').html('语音验证码超过每天最大次数');
            } else if (data && data.data == -112) {
                 window.clearInterval(H);
                $("#mobileValiCode_btn").addClass('grey').text('获取语音验证码').die();
                if (msgType == 1)
                    $('#mobileValiCode_msg').html('短信验证码每分钟只能发一次');
                if (msgType == 2)
                    $('#mobileValiCode_msg').html('语音验证码每分钟只能发一次');
            } else if (data && data.data == -113) {
                 window.clearInterval(H);
                $('#mobileValiCode_msg').html('超过每天3次验证');
            }
        }
    });
}

function newCheckValiCode(msgType, msgPhone) {
    //$("#mobileValiCode_btn").addClass('grey').text('60秒后可重新获取').die();
    isMobileSend = true;
    var P = 60;
     H= window.setInterval(function() {
        if (--P == 0) {
            $("#mobileValiCode_btn").die().attr('msg-type', 2).removeClass('grey').addClass('verLink').text('获取语音验证码').live('click', sendValiCode);
            $("#callTel").html('').hide();
            window.clearInterval(H);
            $("#callTel").hide();
            isMobileSend = false;
        } else {
            $("#mobileValiCode_btn").html(P + "秒后可重新获取");

        }
    }, 1000);
    $.ajax({
        url: 'http://my.baihe.com/Getinterregist/getPhoneVerifyCode?jsonCallBack=?',
        dataType: 'jsonp',
        data: {
            'type': msgType,
            'phone': msgPhone
        },
        success: function(data) {
            if (data.state == '0') {
                window.clearInterval(H);
                $("#mobileValiCode_btn").die().attr('msg-type', 1).removeClass('grey').addClass('verLink').text('获取短信验证码').live('click', sendValiCode);
                $('#mobileValiCode_msg').html('参数错误');
            } else if (data.state == '1' && data.data == '0') {
                window.clearInterval(H);
                $("#mobileValiCode_btn").die().attr('msg-type', 1).removeClass('grey').addClass('verLink').text('获取短信验证码').live('click', sendValiCode);
                baihe.block({
                    text: '此手机号已经手机认证过，注册成功后将此手机号与原账号解绑，并绑定此账号？',
                    callback: function() {
                        checkValiCode(msgType, msgPhone)
                    }
                });
                $

            } else if (data.state == '1' && data.data == '1') {
                $("#mobileValiCode_btn").addClass('grey').text('60秒后可重新获取').die();
                if (msgType == 1) {
                    $("#callTel").html('短信验证码已发送。').show();
                    $("#mobileValiCode_nomsg").hide();
                } else if (msgType == 2) {
                    $("#callTel").html('电话拨打中…请接听来自400-029-9520的电话。').show();
                }
            } else if (data.state == '1' && data.data == '-1') {
                window.clearInterval(H);
                $("#mobileValiCode_btn").die().attr('msg-type', 1).removeClass('grey').addClass('verLink').text('获取短信验证码').live('click', sendValiCode);
                $('#mobileValiCode_msg').html('请求失败,请重试');
            } else if (data.state == '1' && data.data == '-212') {
                window.clearInterval(H);
                $('#mobileValiCode_msg').html('超过每天最大此时');
            } else if (data.state == '1' && data.data == '-112') {
                window.clearInterval(H);
                $('#mobileValiCode_msg').html('每分钟只能发一次');
            }else if (data.state == '1' && data.data == '-313') {
                window.clearInterval(H);
                $('#mobileValiCode_msg').html('超过每天3次验证');
            }
        }
    });
}



//$("#mobileValiCode_btn").live('click', sendValiCode);

var sendAuthValiCode = function(msg) {
    var msgType = '',
        msgPhone = '';
    if ($('#regMobile').size() > 0) {
        if ($('#regMobile').prop('checked')) {
            msgPhone = $('#account').val();
            msgType = $('#mobileValiCode_btn').attr('msg-type');
        } else {
            msgPhone = $('#mobile_new').val();
            msgType = $('#mobileAuthValiCode_btn').attr('msg-type');
        }
    } else {
        msgPhone = $('#mobile_new').val();
        msgType = $('#mobileAuthValiCode_btn').attr('msg-type');
    }
    if(!msgPhone){
        return false;
    }
    var tongjiType = baihe.cookie.getCookie('tongjiType');
    if (showInfoStatu == -1) {
        if (msgType == 1) {
            baihe.bhtongji.tongji({
                'event': '0',
                'spm': '4.10.58.241.716'
            });
        } else {
            baihe.bhtongji.tongji({
                'event': '0',
                'spm': '4.10.58.273.813'
            });
        }
    } else {
    if (tongjiType == 'cate01') {
        if (msgType == 1) {
            baihe.bhtongji.tongji({
                'event': '1',
                'spm': '4.10.55.229.695'
            });
        } else {
            baihe.bhtongji.tongji({
                'event': '1',
                'spm': '4.10.55.270.809'
            });
        }
    } else if (tongjiType == 'zonghe') {
        if (msgType == 1) {
            baihe.bhtongji.tongji({
                'event': '1',
                'spm': '4.10.54.229.689'
            });
        } else {
            baihe.bhtongji.tongji({
                'event': '1',
                'spm': '4.10.54.270.808'
            });
        }
    } else if (tongjiType == 'newlandpage') {
        if (msgType == 1) {
            baihe.bhtongji.tongji({
                'event': '1',
                'spm': '4.10.56.229.701'
            });
        } else {
            baihe.bhtongji.tongji({
                'event': '1',
                'spm': '4.10.56.270.810'
            });
        }
    } else {
        if (msgType == 1) {
            baihe.bhtongji.tongji({
                'event': '1',
                'spm': '4.10.67.266.801'
            });
        } else {
            baihe.bhtongji.tongji({
                'event': '1',
                'spm': '4.10.67.274.814'
            });
        }
    }
}

    

    newCheckAuth(msgType, msgPhone);
    // $.ajax({
    //     url: 'http://my.baihe.com/Getinterregist/checkPhoneAuth?jsonCallBack=?',
    //     dataType: 'jsonp',
    //     data: {
    //         'phone': msgPhone
    //     },
    //     success: function(data) {
    //         if (data && data.state == 1 && data.data == 1) {

    //             baihe.block({
    //                 text: '此手机号已经手机认证过，注册成功后将此手机号与原账号解绑，并绑定此账号？',
    //                 callback: function(){checkAuth(msgType,msgPhone)}
    //             });
    //         }else if(data && data.state == 1 && data.data == 0){
    //             checkAuth(msgType,msgPhone);
    //         }
    //     }
    // });
};

function checkAuth(msgType, msgPhone) {
    $("#mobileAuthValiCode_btn").addClass('grey').text('60秒后可重新获取').die();
    var P = 60;
    H = window.setInterval(function() {
        if (--P == 0) {
            window.clearInterval(H);
            $("#mobileAuthValiCode_btn").die().attr('msg-type', 2).removeClass('grey').addClass('verLink').text('获取语音验证码').live('click', sendAuthValiCode);
            $("#callTel").html('').hide();                        
            $("#callAuthTel").hide();
            isEmailSend = false;
        } else {
            $("#mobileAuthValiCode_btn").html(P + "秒后可重新获取");
        }
    }, 1000);
    $.ajax({
        url: 'http://my.baihe.com/Getinterregist/getPhoneCode?jsonCallBack=?&l' + (new Date()).getTime(),
        dataType: 'jsonp',
        data: {
            'type': msgType,
            'phone': msgPhone
        },
        success: function(data) {
            if (data && data.data == 1) {                
                if (msgType == 1) {
                    $("#callAuthTel").html('短信验证码已发送。').show();
                    $("#mobileAuthValiCode_nomsg").hide();
                } else if (msgType == 2) {
                    $("#callAuthTel").html('电话拨打中…请接听来自400-029-9520的电话。').show();
                }                
                isEmailSend = true;                
            } else if (data && data.data == -212) {
                window.clearInterval(H);
                $("#mobileAuthValiCode_btn").addClass('grey').text('获取语音验证码').die();
                if (msgType == 1)
                    $('#mobileAuthValiCode_msg').html('短信验证码超过每天最大次数');
                if (msgType == 2)
                    $('#mobileAuthValiCode_msg').html('语音验证码超过每天最大次数');
            } else if (data && data.data == -112) {
                window.clearInterval(H);
                $("#mobileAuthValiCode_btn").addClass('grey').text('获取语音验证码').die();
                if (msgType == 1)
                    $('#mobileAuthValiCode_msg').html('短信验证码每分钟只能发一次');
                if (msgType == 2)
                    $('#mobileAuthValiCode_msg').html('语音验证码每分钟只能发一次');
            } else if (data && data.data == -113) {
                 window.clearInterval(H);
                $('#mobileAuthValiCode_msg').html('超过每天3次验证');
            }
        }
    });
}

function newCheckAuth(msgType, msgPhone) {
    //$("#mobileAuthValiCode_btn").addClass('grey').text('60秒后可重新获取').die();
    isEmailSend = true;
    var P = 60;

    H = window.setInterval(function() {
        if (--P == 0) {
            $("#mobileAuthValiCode_btn").die().attr('msg-type', 2).removeClass('grey').addClass('verLink').text('获取语音验证码').live('click', sendAuthValiCode);
            $("#callTel").html('').hide();
            window.clearInterval(H);
            $("#callAuthTel").hide();
            isEmailSend = false;
        } else {
            $("#mobileAuthValiCode_btn").html(P + "秒后可重新获取");

        }
    }, 1000);
    $.ajax({
        url: 'http://my.baihe.com/Getinterregist/getPhoneVerifyCode?jsonCallBack=?&l' + (new Date()).getTime(),
        dataType: 'jsonp',
        data: {
            'type': msgType,
            'phone': msgPhone
        },
        success: function(data) {
            if (data.state == '0') {
                window.clearInterval(H);
                $("#mobileAuthValiCode_btn").die().attr('msg-type', 1).removeClass('grey').addClass('verLink').text('获取短信验证码').live('click', sendAuthValiCode);                
                $('#mobileAuthValiCode_msg').html('参数错误');
            } else if (data.state == '1' && data.data == '0') {
                window.clearInterval(H);
                baihe.block({
                    text: '此手机号已经手机认证过，注册成功后将此手机号与原账号解绑，并绑定此账号？',
                    callback: function() {
                        checkAuth(msgType, msgPhone)
                    }
                });
            } else if (data.state == '1' && data.data == '1') {
                $("#mobileAuthValiCode_btn").addClass('grey').text('60秒后可重新获取').die();
                if (msgType == 1) {
                    $("#callAuthTel").html('短信验证码已发送。').show();
                    $("#mobileAuthValiCode_nomsg").hide();
                } else if (msgType == 2) {
                    $("#callTel").html('电话拨打中…请接听来自400-029-9520的电话。').show();
                }
            } else if (data.state == '1' && data.data == '-1') {
                 window.clearInterval(H);
                $("#mobileAuthValiCode_btn").die().attr('msg-type', 1).removeClass('grey').addClass('verLink').text('获取短信验证码').live('click', sendAuthValiCode);               
                $('#mobileAuthValiCode_msg').html('请求失败,请重试');
            } else if (data.state == '1' && data.data == '-212') {
                window.clearInterval(H);
                $('#mobileAuthValiCode_msg').html('超过每天最大此时');
            } else if (data.state == '1' && data.data == '-112') {
                window.clearInterval(H);
                $('#mobileAuthValiCode_msg').html('每分钟只能发一次');
            }else if (data.state == '1' && data.data == '-313') {
                window.clearInterval(H);
                $('#mobileAuthValiCode_msg').html('超过每天3次验证');
            }
        }
    });
}

//选中生日
function chooseBirth(sel, id) {
        $("#" + sel + " a").each(function() {
            if ($(this).attr("id") != id) {
                $(this).removeClass("now");
            } else {
                $(this).attr("class", "now");
            }
        });
        if (sel == "_se1") {
            $("#se1").val(id);
            $("#se2").val("请选择");
            $("#se3").val("请选择");
            $("#mybirth_msg").html(msgTips['error'] + msgTips['mybirth']);
            validArr['mybirth'] = false;
            changeClass("se2");
            getDayList();

        } else if (sel == "_se2") {
            $("#se2").val(id);
            $("#se3").val("请选择");
            $("#mybirth_msg").html(msgTips['error'] + msgTips['mybirth']);
            validArr['mybirth'] = false;
            changeClass("se3");
            getDayList();

        } else {
            $("#se3").val(id);
            $("#_se3").css("display", "none");
            var y = $("#se1").val();
            var m = $("#se2").val();
            var d = $("#se3").val();
            if (m < 10) {
                m = "0" + m;
            }
            if (d < 10) {
                d = "0" + d;
            }
            $("#myBirthday1").val(y + m + d); //给生日赋值
            $("#mybirth_msg").html(msgTips['error'] + msgTips['mybirth']);

            validArr['mybirth'] = true;
            $("#mybirth_msg").html(msgTips['ok']);
        }
    }
    //得到日期
function getDayList() {
    //判断年和月是否已经被选择
    var yearC = $("#se1").val();
    var monthC = $("#se2").val();
    var days = "";
    if (yearC != '请选择' && monthC != '请选择') {
        if (monthC != "2") {
            for (var i = 0; i < _bigMonths.length; i++) {
                if (monthC == _bigMonths[i]) {
                    for (var j = 1; j <= 31; j++) {
                        days += "<a style='cursor:pointer' onclick='javascript:chooseBirth(\"_se3\"," + j + ")'>" + j + "&nbsp;</a>";
                        if (j == 18) {
                            days += "<br/>";
                        }
                    }
                }
            }
            for (var i = 0; i < _smallMonths.length; i++) {
                if (monthC == _smallMonths[i]) {
                    for (var j = 1; j <= 30; j++) {
                        days += "<a style='cursor:pointer' onclick='javascript:chooseBirth(\"_se3\"," + j + ")'>" + j + "&nbsp;</a>";
                        if (j == 18) {
                            days += "<br/>";
                        }
                    }
                }
            }
        } else {
            var dayNum = 28;
            var year = yearC * 1;
            if (((year % 4) == 0 && (year % 100) != 0) || (year % 400 == 0)) {
                dayNum = "29";
            }
            for (var j = 1; j <= dayNum; j++) {
                days += "<a style='cursor:pointer' onclick='javascript:chooseBirth(\"_se3\"," + j + ")'>" + j + "&nbsp;</a>";
                if (j == 18) {
                    days += "<br/>";
                }
            }
        }
    }
    $("#_se3").find("p").html(days);
}

function changeClass(sid) {
    for (var i = 1; i <= 3; i++) {
        if (("se" + i) == sid) {
            $("#" + ("_se" + i)).css("display", "block");
        } else {
            $("#" + ("_se" + i)).css("display", "none");
        }
    }
}

var countryC = "86";
var proC = "8611";
var cityC = "861301";

//改变城市控件显示 样式
function changeCityClass(_sid) {
    for (var i = 1; i <= 3; i++) {
        if (("ci" + i) == _sid) {
            $("#" + ("_ci" + i)).css("display", "block");
        } else {
            $("#" + ("_ci" + i)).css("display", "none");
        }
    }
}


//点击选择其他国家
function selectOtherCountry() {
    validArr['mycity'] = false;
    $("#mycity_msg").html(msgTips['error'] + msgTips['mycity']);
    $("#ci1").val($("#otherCountry").html());
    $("#_ci1").css("display", "none");
    $("#" + ("ci2")).val("请选择").removeAttr('disabled');
    $("#" + ("ci3")).val("请选择").removeAttr('disabled');
    var countryHtmlExp = $("#countryExp").html();
    $("#_ci2").html(countryHtmlExp);
    $("#" + ("_ci2")).css("display", "block");
}

//选择国家
function chooseCountry(cid) {
    $("#mycity_msg").html(msgTips['error'] + msgTips['mycity']);
    countryC = cid;
    $("#ci3").removeAttr("disabled").val("请选择");
    $("#_ci2 a").each(function() {
        if ($(this).attr("id") != cid) {} else {
            validArr['mycity'] = false;

            $("#ci2").val($(this).html());
            $("#_ci2").css("display", "none");
            var myprovince = new Array();
            myprovince = getProvinces(cid);
            loadDropMyProvinceNew(cid, myprovince);
        }
    });
}

//其他国家中选择省市
function chooseOtherPro(cc) {
    $("#mycity_msg").html(msgTips['error'] + msgTips['mycity']);
    $("#_ci3 a").each(function() {
        if ($(this).attr("id") != cc) {} else {
            $("#ci3").val($(this).html());
            $("#_ci3").css("display", "none");
            $("#mycityId").val(cc);

            $("#mycity_msg").html(msgTips['ok']);
            validArr['mycity'] = true;
            // var country = countryC;
            // var province = cc;
            // $("#dropOpCountry >option").each(function() {
            //     if ($(this).val() == country) {
            //         $(this).attr("selected", "selected");
            //         return;
            //     }
            // });
            // opCountryChange();
            // $("#dropOpProvince >option").each(function() {
            //     if ($(this).val() == province) {
            //         $(this).attr("selected", "selected");
            //         return;
            //     }
            // });
            // opOtherProvinceChange();
            // checkOpCity();
            // validArr2['opcitycode'] = true;
        }
    });
}

//中国选择省市
function choosePro(cc) {
    $("#mycity_msg").html(msgTips['error'] + msgTips['mycity']);
    $("#_ci1 a").each(function() {
        if ($(this).attr("id") != cc) {} else {
            $("#ci1").val($(this).html());
            $("#_ci1").css("display", "none");
            countryC = "86";
            proC = cc;
            var cityArray = new Array();
            cityArray = getCitys(cc);
            loadDropMyCityNew(countryC, cc, cityArray);
        }
    });
}

//选择市区
function chooseCity(cc) {
    $("#mycity_msg").html(msgTips['error'] + msgTips['mycity']);
    $("#_ci2 a").each(function() {
        if ($(this).attr("id") != cc) {} else {
            $("#ci2").val($(this).html());
            $("#_ci2").css("display", "none");
            cityC = cc;
            var countyArray = new Array();
            countyArray = getCountys(cc);
            loadDropMyCountyNew(countryC, proC, cc, countyArray);
        }
    });
}

//选择区县
function chooseCounty(cc) {
        $("#mycity_msg").html(msgTips['error'] + msgTips['mycity']);
        $("#_ci3 a").each(function() {
            if ($(this).attr("id") != cc) {} else {
                $("#ci3").val($(this).html());
                $("#_ci3").css("display", "none");
                $("#mycityId").val(cc);

                $("#mycity_msg").html(msgTips['ok']);
                validArr['mycity'] = true;
                // validArr2['citycode'] = true;
                // var country = countryC;
                // var province = proC;
                // var city = cityC;
                // $("#dropOpCountry >option").each(function() {
                //     if ($(this).val() == country) {
                //         $(this).attr("selected", "selected");
                //         return;
                //     }
                // });
                // opCountryChange();
                // $("#dropOpProvince >option").each(function() {
                //     if ($(this).val() == province) {
                //         $(this).attr("selected", "selected");
                //         return;
                //     }
                // });
                // opProvinceChange();
                // $("#dropOpCity").html("<option value='" + city + "'>" + getCityName(city) + "</option>");
                // opCityChange();
                // checkOpCity();
                // validArr2['opcitycode'] = true;
            }
        });
    }
    // 获取相关市或区的信息，并将信息转换到一个数组中，该书组中存放City对象
function getCitys(provinceCode) {
    var cityArray = new Array();
    var fa = filterProvince(provinceCode);
    if (fa != null) {
        cityArray[0] = fa;
    } else {
        var j = 0;
        for (var i = 0; i < allCities.length; i++) {
            var mtstr1items = allCities[i].split("|");
            if (mtstr1items[1] == provinceCode && mtstr1items.length <= 4) {
                objCity = new City(mtstr1items[2], mtstr1items[3]);
                cityArray[j] = objCity;
                j = j + 1;
            }
        }
    }
    return cityArray;
}
var filterCode = new Array("8611", "8612", "8631");

function filterProvince(provinceCode) {
        for (var i = 0; i < filterCode.length; i++) {
            if (provinceCode == filterCode[i]) {
                // return new City(filterCode1[i],provinceCode);
            }
        }
        return null;
    }
    // 省实体
function Province(mytext, mycode) {
        this.text = mytext;
        this.code = mycode;
    }
    // 市实体
function City(mytext, mycode) {
    this.text = mytext;
    this.code = mycode;
}

function County(mytext, mycode) {
    this.text = mytext;
    this.code = mycode;
}

function loadDropMyCityNew(countryVal, proVal, cityArray) {
    $("#ci2").val("请选择").removeAttr("disabled");
    $("#ci3").val("请选择").removeAttr("disabled");
    $("#_ci2").css("display", "block");
    if (cityArray.length == 0 || cityArray == null || typeof(cityArray) == "undefined") { // 地区为空
        if (proVal != -1 && countryVal != "86") { // 国家不是中国，省份不为空
            validArr['citycode'] = true;
            validArr2['citycode'] = true;
            $("#ci2").val("不限").attr("disabled", "disabled");
            $("#ci3").val("不限").attr("disabled", "disabled");
            $("#_ci2").css("display", "none");
            $("#_ci3").css("display", "none");
            $("#mycityId").val(proVal);
            $("#mycity_msg").html(msgTips['ok']);
            // opProvinceChange();
            // checkOpCity();
            validArr2['opcitycode'] = true;
        } else {
            if (proVal == 8681 || proVal == 8682 || proVal == 8683) {
                validArr['mycity'] = true;
                // validArr2['citycode'] = true;
                $("#mycity_msg").html(msgTips['ok']);
                $("#ci2").val("不限").attr("disabled", "disabled");
                $("#ci3").val("不限").attr("disabled", "disabled");
                $("#_ci2").css("display", "none");
                $("#_ci3").css("display", "none");
                $("#mycityId").val(proVal);
                // opProvinceChange();
                // checkOpCity();
                // validArr2['opcitycode'] = true;
            } else {
                alert("省市加载失败");
            }
        }
    } else {
        validArr['mycity'] = false;
        //加载市
        var cityHtml = "";
        for (var i = 0; i < cityArray.length; i++) {
            cityHtml += "<a href='javascript:chooseCity(\"" + cityArray[i].code + "\");' id='" + cityArray[i].code + "'>" + cityArray[i].text + "</a>";
        }
        $("#_ci2").find("p").html(cityHtml);
    }
}

//选择市区后加载区县信息
function loadDropMyCountyNew(countryVal, proVal, cityVal, countyArray) {
    $("#ci3").val("请选择").removeAttr("disabled");
    $("#_ci3").css("display", "block");
    if (countyArray == null || countyArray.length == 0 || typeof(countyArray) == "undefined") { // 区县为空
        if (cityVal != -1 && countryVal != "86") { // 国家不是中国，市区不为空
            validArr['mycity'] = true;
            $("#ci3").val("不限").attr("disabled", "disabled");
            $("#_ci2").css("display", "none");
            $("#_ci3").css("display", "none");
            $("#mycityId").val(cityVal);
            $("#mycity_msg").html(msgTips['ok']);
            // var country = countryC;
            // var province = proC;
            // var city = cityVal;
            // $("#dropOpCountry >option").each(function() {
            //     if ($(this).val() == country) {
            //         $(this).attr("selected", "selected");
            //         return;
            //     }
            // });
            // opCountryChange();
            // $("#dropOpProvince >option").each(function() {
            //     if ($(this).val() == province) {
            //         $(this).attr("selected", "selected");
            //         return;
            //     }
            // });
            // opProvinceChange();
            // $("#dropOpCity").html("<option value='" + city + "'>" + getCityName(city) + "</option>");
            // opCityChange();

            // checkOpCity();
            // validArr2['opcitycode']=true;
        } else {
            validArr['mycity'] = true;
            $("#mycity_msg").html(msgTips['ok']);
            $("#ci3").val("不限").attr("disabled", "disabled");
            $("#_ci2").css("display", "none");
            $("#_ci3").css("display", "none");
            $("#mycityId").val(cityVal);
            // var country = countryC;
            // var province = proC;
            // var city = cityVal;
            // $("#dropOpCountry >option").each(function() {
            //     if ($(this).val() == "86") {
            //         $(this).attr("selected", "selected");
            //         return;
            //     }
            // });
            // opCountryChange();
            // $("#dropOpProvince >option").each(function() {
            //     if ($(this).val() == province) {
            //         $(this).attr("selected", "selected");
            //         return;
            //     }
            // });
            // opProvinceChange();
            // $("#dropOpCity").html("<option value='" + city + "'>" + getCityName(city) + "</option>");
            // opCityChange();
            // checkOpCity();
            // validArr2['opcitycode'] = true;
        }
    } else {
        validArr['mycity'] = false;
        //加载区县
        var countyHtml = "";
        for (var i = 0; i < countyArray.length; i++) {
            countyHtml += "<a href='javascript:chooseCounty(\"" + countyArray[i].code + "\");' id='" + countyArray[i].code + "'>" + countyArray[i].text + "</a>";
        }
        $("#_ci3").find("p").html(countyHtml);
    }
}

function loadDropMyProvinceNew(countryVal, provinceArray) {
        $("#ci3").val("请选择");
        $("#_ci3").css("display", "block");
        if (provinceArray == null || provinceArray.length <= 1 || typeof(provinceArray) == "undefined") { // 省份为空
            if (countryVal != -1 && countryVal != "86") { //国家不是中国
                validArr['mycity'] = true;
                $("#ci3").val("不限").attr("disabled", "disabled");
                $("#_ci3").css("display", "none");
                $("#mycityId").val(countryVal);
                $("#mycity_msg").html(msgTips['ok']);
                var country = countryC;
                var province = proC;
                $("#dropOpCountry >option").each(function() {
                    if ($(this).val() == country) {
                        $(this).attr("selected", "selected");
                        return;
                    }
                });
                // opCountryChange();
                /*$("#dropOpProvince >option").each(function(){
                    if($(this).val()==province){
                        $(this).attr("selected","selected");
                        return ;
                    }   
                });
                opProvinceChange();*/
                // checkOpCity();
                // validArr2['opcitycode']=true;    


            } else { // 国家是中国
                alert("省加载错误");
            }
        } else { // 省份不为空
            validArr['mycity'] = false;
            $("#_ci3").css("width", "355px").css("height", "125px");
            //加载省
            var proHtml = "";
            if (countryVal == "86") {
                for (var i = 0; i < provinceArray.length; i++) {
                    proHtml += "<a href='javascript:choosePro(\"" + provinceArray[i].code + "\");' id='" + provinceArray[i].code + "'>" + provinceArray[i].text + "</a>";
                    if ((i + 1) % 7 == 0) {
                        proHtml += "<br/>";
                    }
                }
            } else {
                $("#_ci3").css("width", "380px");
                // if (countryVal == "49") {
                //     $("#_ci3").css("height", "200px").css("width", "440px");
                //     for (var i = 0; i < provinceArray.length; i++) {
                //         proHtml += "<a href='javascript:chooseOtherPro(\"" + provinceArray[i].code + "\");' id='" + provinceArray[i].code + "'>" + provinceArray[i].text + "</a>";
                //         if ((i + 1) % 6 == 0) {
                //             proHtml += "<br/>";
                //         }
                //     }
                // } else {
                for (var i = 0; i < provinceArray.length; i++) {
                    if (provinceArray[i].text == '不限') {
                        proHtml += "<a href='javascript:chooseOtherPro(\"" + countryVal + "\");' id='" + countryVal + "'>" + provinceArray[i].text + "</a>";
                    } else {
                        proHtml += "<a href='javascript:chooseOtherPro(\"" + provinceArray[i].code + "\");' id='" + provinceArray[i].code + "'>" + provinceArray[i].text + "</a>";
                    }
                    if ((i + 1) % 4 == 0) {
                        proHtml += "<br/>";
                    }
                }
                // }
            }
            $("#_ci3").find("p").html(proHtml);
        }
    }
    // 获取相关的省的信息,并将信息转换到一个数组中，该数组存放Province对象
function getProvinces(countryCode) {
        var provinceArray = new Array();
        var j = 0;
        for (var i = 0; i < allProvinces.length; i++) {
            var mtstritems = allProvinces[i].split("|");
            if (mtstritems[0] == parseInt(countryCode)) {
                objProvince = new Province(mtstritems[1], mtstritems[2]);
                provinceArray[j] = objProvince;
                j = j + 1;
            }
        }
        return provinceArray;
    }
    // 获取相关区县的信息，并将信息转换到一个数组中，该数组中存放County对象
function getCountys(cityCode) {
        var countyArray = new Array();
        var j = 0;
        for (var i = 0; i < allDistrict.length; i++) {
            var mtstr1items = allDistrict[i].split("|");
            if (mtstr1items[2] == cityCode && mtstr1items.length >= 4) {
                objCounty = new County(mtstr1items[3], mtstr1items[4]);
                countyArray[j] = objCounty;
                j = j + 1;
            }
        }
        return countyArray;
    }
    //其他国家中最后一步确定省市
function opOtherProvinceChange() {
    initCity();
    opprovince = dropOpProvince.value;
    var cityArray = new Array();
    loadDropOpCity(cityArray);
}

function initCity() {
    dropOpCountry = document.getElementById("dropOpCountry");
    dropOpProvince = document.getElementById("dropOpProvince");
    dropOpCity = document.getElementById("dropOpCity");
    dropOpCounty = document.getElementById("dropOpCounty");
}

function regLogin() {
    if (showInfoStatu == 1 || showInfoStatu == 0) {
        var jsonData = {
            'gender': jsonuserinfo['gender'] !== '' ? jsonuserinfo['gender'] : $('#gender').val(),
            'nickname': jsonuserinfo['nickname'] ? jsonuserinfo['nickname'] : $('#nikename').val(),
            'birthday': jsonuserinfo['birthday'] ? jsonuserinfo['birthday'] : $('#myBirthday1').val(),
            'district': jsonuserinfo['district'] ? jsonuserinfo['district'] : $('#mycityId').val(),
            'height': $('#csheight').val(),
            'education': $('#csdegree').val(),
            'marriage': $('#csmarriage').val(),
            'income': $('#csincome').val(),
            'mobileContact': $('#mobile_new').val(),
            'familyDescription': jsonuserinfo['familyDescription'] ? jsonuserinfo['familyDescription'] : $('#userdesc').val(),
            'phoneCode': $('#txtMobileAuthValiCode').val(),
            'codeId': temId,
            'codeValue': $('#codeVal').size() > 0 ? $('#codeVal').val() : ''
        };        
       
        var tongjiType = baihe.cookie.getCookie('tongjiType');
        if (tongjiType == 'cate01') {
            jsonData['event'] = '2';
            jsonData['spmp'] = '4.10.55.231.697';

        } else if (tongjiType == 'zonghe') {
            jsonData['event'] = '2';
            jsonData['spmp'] = '4.10.54.231.691';

        } else if (tongjiType == 'newlandpage') {
            jsonData['event'] = '2';
            jsonData['spmp'] = '4.10.56.231.703';

        } else {
            jsonData['event'] = '2';
            jsonData['spmp'] = '4.10.67.268.803';
        }

        $.ajax({
            url: 'http://my.baihe.com/Getinterregist/perfectUserInfo?jsonCallBack=?',
            dataType: 'jsonp',
            data: jsonData,

            success: function(data) {
                if (data && data.state == 1 && data.data == 1) {                   
                    
                    if (jsonData.gender == 1) {
                        window.location.href = 'http://bhtg.baihe.com/stat.html?ggCode=zhuceyouhua_7#http://my.baihe.com/headphoto/';
                    } else {
                        window.location.href = 'http://bhtg.baihe.com/stat.html?ggCode=zhuceyouhua_8#http://my.baihe.com/headphoto/';
                    }
                } else if (data && data.state == 1 && data.data == 0) {
                    baihe.block({
                        text: '完善资料失败,请重试！',
                        callback: function() {
                            getIPTimes();
                        }
                    });
                }
            }
        });
    } else if (showInfoStatu == -1) {
        var jsonData = {
            'userAccount': $('#account').val(),
            'password': $('#password').val(),
            'gender': $('#gender').val(),
            'nickname': $('#nikename').val(),
            'birthday': $('#myBirthday1').val(),
            'district': $('#mycityId').val(),
            'height': $('#csheight').val(),
            'education': $('#csdegree').val(),
            'marriage': $('#csmarriage').val(),
            'income': $('#csincome').val(),
            'mobileContact': $('#regMobile').prop('checked') ? $('#account').val() : $('#mobile_new').val(),
            'familyDescription': $('#userdesc').val(),
            'phoneCode': $('#regMobile').prop('checked') ? $('#txtMobileValiCode').val() : $('#txtMobileAuthValiCode').val(),
            'codeId': temId,
            'codeValue': $('#codeVal').size() > 0 ? $('#codeVal').val() : ''
        };

        if ($('#regMobile').prop('checked')) {
            jsonData['event'] = '2';
            jsonData['spmp'] = '4.10.58.240.715';

        } else {

            jsonData['event'] = '2';
            jsonData['spmp'] = '4.10.58.243.718';

        }

        $.ajax({
            url: 'http://my.baihe.com/Getinterregist/createAccount?jsonCallBack=?',
            dataType: 'jsonp',
            data: jsonData,
            success: function(data) {
                if (data && data.state == 1 && data.data == 1) {
                   
                    if (jsonData.gender == 1) {
                        window.location.href = 'http://bhtg.baihe.com/stat.html?ggCode=zhuceyouhua_7#http://my.baihe.com/headphoto/';
                    } else {
                        window.location.href = 'http://bhtg.baihe.com/stat.html?ggCode=zhuceyouhua_8#http://my.baihe.com/headphoto/';
                    }
                } else if (data && data.state == 1 && data.data == 0) {
                    baihe.block({
                        text: '完善资料失败,请重试！',
                        callback: function() {
                            getIPTimes();
                        }
                    });
                }
            }
        });
    }
};

var landPageRegister = {
    init: function() {
        var _this = this;
        var t1 = '<h3></h3>';
        var t4 = '<h3 class="bt"></h3>';
        t4 = '';
        var t2 = '<div class="clear"></div><h4>完善资料</h4><div class="clear"></div>';
        var t3 = '<div class="clear"></div><h4>完善资料,快速结识缘分</h4><div class="clear"></div>';

        if(showInfoStatu!='-1'){
            $('#save').val('提交');
            $('#sexPmt').html('<span>*</span>&nbsp;提交后不可更改');
        }    
        //var lianheStatu=lianheStatu||'';    
        if(lianheStatu!=undefined&&(lianheStatu=='1'||lianheStatu=='7'||lianheStatu=='4'||lianheStatu=='11'||lianheStatu=='15'||lianheStatu=='3'||lianheStatu=='5')){
            t2='<div class="clear"></div><h4 style="display:none;">完善资料</h4><div class="clear"></div>';
            t3 = '<div class="clear"></div><h4 style="display:none;">完善资料,快速结识缘分</h4><div class="clear"></div>';
        }
        if (showInfoStatu == '1') {
            $("#infoStatu1").html(t4 + $("#infoStatu1").html());
            $("#infoStatu2").html(t3 + $("#infoStatu2").html());
            $("#accountstatus").css("display", "none");

            validArr['mobileValiCode'] = true;
            $("#mobileAuthValiCode_btn").die().attr('msg-type', 1).live('click', sendAuthValiCode).removeClass('grey').addClass('verLink');
            if (baihe.validateRules.isMobile($('#mobile_new').val())) {
                validArr['mobile'] = true;
                $('#mobile_msg').html(msgTips['ok']);
                $('#mobile_new').blur();
            }
            _this.mobile();
            if (!baihe.validateRules.isMobile($('#mobile_new').val())) {
                $("#mobileAuthValiCode_btn").removeClass('verLink').addClass('grey').die();
            }            
            
        } else if (showInfoStatu == '0') {
            $("#infoStatu1").html(t4 + $("#infoStatu1").html() + t3);
            $("#accountstatus").css("display", "none");
            $('#authValiCode').show();
            $("#mobileAuthValiCode_btn").die().attr('msg-type', 1).live('click', sendAuthValiCode).removeClass('grey').addClass('verLink');
            if (!baihe.validateRules.isMobile($('#mobile_new').val())) {
                $("#mobileAuthValiCode_btn").removeClass('verLink').addClass('grey').die();
            }            
            _this.nikename();
            _this.sex();
            _this.mobile();
            _this.mobileValiCode();
            _this.mybirth();
            _this.mycity();
            _this.cityInit();
            validArr['mobileValiCode'] = true;
            validArr['account'] = true;
            if (baihe.validateRules.isMobile($('#mobile_new').val())) {
                validArr['mobile'] = true;
                $('#mobile_msg').html(msgTips['ok']);
                 $('#mobile_new').blur();
            }
        } else {
            $("#infoStatu1").html(t1 + $("#infoStatu1").html() + t2);
            _this.account();
            _this.password();
            _this.nikename();
            _this.sex();
            _this.mobileValiCode();
            _this.mybirth();
            _this.mycity();
            _this.cityInit();
            _this.mobile();
            validArr['mobileAuthValiCode'] = true;
            validArr['mobile'] = true;
        }
        //_this.mobile();
        _this.mobileAuthValiCode();
        _this.height();
        _this.degree();
        _this.income();
        _this.marriage();
        _this.clickPromit();
        //_this.code();
        _this.submitFn();

        _this.isShowAccountPW();

        if (jsonuserinfo) {
            if (jsonuserinfo['nickname']) {
                validArr['nikename'] = true;
            }
            if (jsonuserinfo['birthday']) {
                validArr['mybirth'] = true;
            }
            if (jsonuserinfo['city']) {
                validArr['mycity'] = true;
            }
            if (jsonuserinfo['isCreditedByMobile'] == '1') {
                validArr['mobile'] = true;
                validArr['mobileAuthValiCode'] = true;
                $("#authValiCode").css("display", "none");
            }
            if (jsonuserinfo['gender'] !== '') {
                validArr['gender'] = true;
            }

            if (jsonuserinfo['promit']) {
                validArr['promit'] = true;
            }
        }

        $(document).bind('click', function() {
            $('.apply .infolayer, .apply .infolayer01').css('display', 'none');
        });
    },
    submitFn: function() {
        var _this = this;
        $('#save').click(function(event) {
            event.preventDefault();
            if (isBlackIP) {
                baihe.block({
                    text: '您的IP存在风险，无法注册'
                });
                return false;
            }

            //_this.account_reset($('#account').val(), $('#account_msg'));
            //_this.password_reset($('#password').val(), $('#password_msg'));
            //_this.nikename_reset($('#nikename').val(), $('#nikename_msg'));
            _this.userDesc();
            var isSubmit = 0;
            if ($("#regMobile").size() > 0) {
                if ($("#regMobile").prop('checked')) {
                    validArr['mobileAuthValiCode'] = true;
                } else {
                    validArr['mobileValiCode'] = true;
                }
            } else {
                validArr['mobileValiCode'] = true;
            }
            for (ele in validArr) {
                if (validArr[ele] == false) {
                    if (ele != 'promit') {
                        if (ele == 'account') {
                            if (!$('#account_msg').html()) {
                                $('#' + ele + '_msg').html(msgTips['error'] + msgTips[ele]);
                            }
                        } else {
                            $('#' + ele + '_msg').html(msgTips['error'] + msgTips[ele]);
                        }
                    } else {
                        baihe.block({
                            text: '请勾选“百合服务条款”'
                        });
                    }
                    isSubmit++;
                }
            }
            // console.log(isSubmit);
            if (isSubmit <= 0) {
                baihe.statistics({
                    spm: '2.13.47.70.278',
                    ggCode: 'newversion_172'
                });

                //$('#codeVal').size() > 0 ? codeTest() : $('#regForm').submit();
                $('#codeVal').size() > 0 ? codeTest() : regLogin();
            }
        });
    },
    tips: function(obj, is, str, sub) {
        var _this = this;
        if (is == true) {
            obj.html(msgTips['ok']);
            sub ? (validArr[sub] = true) : '';
        } else {
            obj.html(msgTips['error'] + str);
            sub ? (validArr[sub] = false) : '';
        }
    },
    isShowAccountPW: function() {
        if ($('#account').val() != '' && $('#password').val() != '') {
            $("#accountstatus").css("display", "none");
        }
    },
    account: function() {
        var _this = this;
        var oTips = $('#account_msg');
        validArr['account'] = false;
        $('#account').bind('focus', function() {
            var str = $(this).val();

            if (str == '') {
                if ($("#regMobile").prop('checked'))
                    oTips.html('请输入您常用的手机号码');
                if ($("#regEmail").prop('checked'))
                    oTips.html('请输入您常用的邮箱地址');
            }
        });
        $('#account').bind('blur', function() {
            var str = $(this).val();
            _this.account_reset(str, oTips);
        });
    },
    account_reset: function(val, tipsPos) {
        var _this = this;
        var isOk = false;
        $("#mobileValiCode_btn").removeClass('verLink').addClass('grey').die();
        $("#mobileAuthValiCode_btn").removeClass('verLink').addClass('grey').die();
        $("#mobileValiCode_voice").die();
        $("#mobileAuthValiCode_voice").die();
        if (val == '') {
            tipsPos.html('');
            return;
        }
        var isRegType = $("#regEmail").prop('checked');
        if (isRegType) {
            isOk = baihe.validateRules.isEmail(val);
            if (isOk == false)
                _this.tips(tipsPos, isOk, '邮箱格式错误，重新填写', 'account');
        } else {
            isOk = baihe.validateRules.isMobile(val);
            if (isOk == false)
                _this.tips(tipsPos, isOk, '手机格式错误，重新填写', 'account');
        }
        if (isOk == true) {

            $.ajax({
                url: 'http://my.baihe.com/register/emailCheckForXs?jsonCallBack=?&l' + (new Date()).getTime(),
                dataType: 'jsonp',
                data: {
                    'email': val
                },
                success: function(data) {
                    if (data && data.state == 0) {
                        if (!isRegType) {
                            $('#account_msg').html('手机号已注册，<a href="http://my.baihe.com/login">请直接登录</a>');
                            //$('#divValiCode').hide();
                        } else if (isRegType) {
                            $('#account_msg').html('邮箱已注册，<a href="http://my.baihe.com/login">请直接登录</a>');
                            //$('#authValiCode').hide();
                        }
                    } else if (data && data.state == 1) {
                        if (!isRegType && !isMobileSend) {
                            validArr['account'] = true;
                            //$('#account_msg').html('手机号已注册，<a href="http://my.baihe.com/login">请直接登录</a>');
                            //$('#divValiCode').hide();
                            $("#mobileValiCode_btn").die().attr('msg-type', 1).removeClass('grey').addClass('verLink').live('click', sendValiCode);
                            $("#mobileValiCode_voice").click(function(event) {
                                $("#mobileValiCode_btn").text('获取语音验证码');
                                $("#mobileValiCode_btn").attr('msg-type', 2);
                                $("#mobileValiCode_btn").die().live('click', sendValiCode);
                                $(this).parent('.written').hide();
                            });
                            _this.tips(tipsPos, isOk, '', 'account');
                        } else if (isRegType && !isEmailSend) {
                            // validArr['account'] = true;
                            // // $('#account_msg').html('邮箱已注册，<a href="http://my.baihe.com/login">请直接登录</a>');
                            // // $('#authValiCode').hide();
                            // $("#mobileAuthValiCode_btn").die().attr('msg-type', 1).live('click', sendAuthValiCode).removeClass('grey').addClass('verLink');
                            // $("#mobileAuthValiCode_voice").click(function(event) {
                            //     $("#mobileAuthValiCode_btn").text('获取语音验证码');
                            //     $("#mobileAuthValiCode_btn").attr('msg-type', 2);
                            //     $("#mobileAuthValiCode_btn").die().live('click', sendAuthValiCode);
                            //     $(this).parent('.written').hide();

                            // });
                            _this.tips(tipsPos, isOk, '', 'account');
                        }
                    }
                }
            });

            // $.getJSON('http://my.baihe.com/register/emailCheckForXs?jsonCallBack=?', {
            //     email: val
            // }, function(data) {
            //     if (data.state == 1) {
            //         _this.tips(tipsPos, true, '', 'account');
            //     } else {
            //         _this.tips(tipsPos, false, data.data + '，<a href="http://my.baihe.com/login/">直接登录</a>', 'account');
            //     }
            // });
        }
    },
    password: function() {
        var _this = this;
        var oTips = $('#password_msg');
        validArr['password'] = false;
        $('#password').bind('focus', function() {
            var str = $(this).val();
            if (str == '') {
                oTips.html('6-16位英文字母或数字');
            }
        });
        $('#password').bind('blur', function() {
            var str = $(this).val();
            _this.password_reset(str, oTips);
        });
    },
    password_reset: function(val, tipsPos) {
        var _this = this;
        var isOk = false;
        var isOk = new RegExp(baihe.validateRegExp.password).test(val);
        if (val == '') {
            tipsPos.html('');
            return;
        }
        _this.tips(tipsPos, isOk, errTips['password'], 'password');
    },
    mobileValiCode: function() {
        var _this = this;
        validArr['mobileValiCode'] = false;
        var oTips = $('#mobileValiCode_msg');
        $("#txtMobileValiCode").bind('focus', function() {
            validArr['mobileValiCode'] = false;
            var str = $(this).val();
            if (str == '') {
                oTips.html('请输入验证码');
            }
        }).bind('blur', function(event) {
            var str = $(this).val();
            var isOk = /\d{4}/.test(str);
            if (str == "") {
                oTips.html('');
                return;
            } else if (isOk) {
                var msgPhone = $()
                $.ajax({
                    url: 'http://my.baihe.com/Getinterregist/checkPhoneCode?jsonCallBack=?',
                    dataType: 'jsonp',
                    data: {
                        'phone': $('#account').val(),
                        'code': str
                    },
                    success: function(data) {
                        if (data && data.data == 1) {
                            window.clearInterval(H);
                            $('#txtMobileValiCode').prop('disabled',true);
                             $("#mobileValiCode_btn").removeClass('verLink').addClass('grey').die();
                             $('#callTel').hide();
                            if (showInfoStatu == -1) {
                                baihe.bhtongji.tongji({
                                    'event': '0',
                                    'spm': '4.10.58.239.714'
                                });
                            }
                            isOk = true;
                        }else if(data&&data.state=='1' && data.data == "-113"){
                            isOk = false;
                             _this.tips(oTips, isOk, '超过每天3次验证', 'mobileValiCode');
                             return false;
                        } else {
                            isOk = false;
                        }
                        _this.tips(oTips, isOk, errTips['mobileValiCode'], 'mobileValiCode');
                    }
                });
            } else {
                _this.tips(oTips, isOk, errTips['mobileValiCode'], 'mobileValiCode');
            }
        });
    },


    mobileAuthValiCode: function() {
        var _this = this;
        validArr['mobileAuthValiCode'] = false;
        var oTips = $('#mobileAuthValiCode_msg');
        $("#txtMobileAuthValiCode").die().live('focus', function() {
            validArr['mobileValiCode'] = false;
            var str = $(this).val();
            if (str == '') {
                oTips.html('请输入验证码');
            }
        }).live('blur', function(event) {
            var str = $(this).val();
            var isOk = /\d{4}/.test(str);
            if (str == "") {
                oTips.html('');
                return;
            } else if (isOk) {
                //var msgPhone=$()
                $.ajax({
                    url: 'http://my.baihe.com/Getinterregist/checkPhoneCode?jsonCallBack=?',
                    dataType: 'jsonp',
                    data: {
                        'phone': $('#mobile_new').val(),
                        'code': str
                    },
                    success: function(data) {
                    if (data && data.data == 1) {
                        window.clearInterval(H);
                        $('#txtMobileAuthValiCode').prop('disabled', true);
                        $("#mobileAuthValiCode_btn").html('获取语音验证码').removeClass('verLink').addClass('grey').die();
                        $('#callAuthTel').hide();
                        var tongjiType = baihe.cookie.getCookie('tongjiType');
                        if (showInfoStatu == -1) {
                            baihe.bhtongji.tongji({
                                'event': '0',
                                'spm': '4.10.58.242.717'
                            });
                        } else {
                            if (tongjiType == 'cate01') {
                                baihe.bhtongji.tongji({
                                    'event': '1',
                                    'spm': '4.10.55.230.696'
                                });
                            } else if (tongjiType == 'zonghe') {
                                baihe.bhtongji.tongji({
                                    'event': '1',
                                    'spm': '4.10.54.230.690'
                                });
                            } else if (tongjiType == 'newlandpage') {
                                baihe.bhtongji.tongji({
                                    'event': '1',
                                    'spm': '4.10.56.230.702'
                                });
                            } else {
                                baihe.bhtongji.tongji({
                                    'event': '1',
                                    'spm': '4.10.67.267.802'
                                });
                            }
                        }

                        isOk = true;
                    }else if(data&&data.state=='1' && data.data == "-113"){
                            isOk = false;
                             _this.tips(oTips, isOk, '超过每天3次验证', 'mobileAuthValiCode');
                             return false;
                        }  else {
                        isOk = false;
                    }
                        _this.tips(oTips, isOk, errTips['mobileAuthValiCode'], 'mobileAuthValiCode');
                    }
                });
            } else {
                _this.tips(oTips, isOk, errTips['mobileAuthValiCode'], 'mobileAuthValiCode');
            }
        });
    },


    nikename: function() {
        var _this = this;
        var oTips = $('#nikename_msg');
        validArr['nikename'] = false;
        $('#nikename').bind('focus', function() {
            var str = $(this).val();
            if (str == '') {
                oTips.html('最多可输入12个汉字、字母或数字');
            }
        });
        $('#nikename').bind('blur', function() {
            var str = $(this).val();
            _this.nikename_reset(str, oTips);
        });
    },
    nikename_reset: function(val, tipsPos) {
        var _this = this;
        var isOk = false;
        var isOk = new RegExp(baihe.validateRegExp.nikename).test(val);
        if (val == '') {
            tipsPos.html('');
            return;
        }
        _this.tips(tipsPos, isOk, errTips['nikename'], 'nikename');
    },
    sex: function() {
        var _this = this;
        $('#gender_1, #gender_0').bind('click', function(event) {
            event.preventDefault();
            $(this).addClass('active').siblings('a').removeClass('active');
            $('#gender').val($(this).index() == 0 ? 1 : 0);
            _this.chooseHeight(($("#gender").val() == 1) ? 175 : 160);
        });
        $('#gender').val() == 1 ? $('#gender_1').addClass('active') : $('#gender_0').addClass('active');
    },
    mobile: function() {
        var _this = this;
        var oTips = $('#mobile_msg');
        validArr['mobile'] = false;
        $('#mobile_new').bind('focus', function() {
            var str = $(this).val();
            validArr['mobile'] = true;
            if (str == '') {
                oTips.html('请输入您的手机号');
            }
        });
        $('#mobile_new').bind('blur', function() {
            var str = $(this).val();
            var isOk = new RegExp(baihe.validateRegExp.mobile).test(str);
            if (str == '') {
                oTips.html('');
                return;
            } else {
                validArr['mobile'] = isOk;
            }
            if (isOk && !isEmailSend) {
                // $('#account_msg').html('邮箱已注册，<a href="http://my.baihe.com/login">请直接登录</a>');
                // $('#authValiCode').hide();
                $("#mobileAuthValiCode_btn").die().attr('msg-type', 1).live('click', sendAuthValiCode).removeClass('grey').addClass('verLink');
                $("#mobileAuthValiCode_voice").click(function(event) {
                    $("#mobileAuthValiCode_btn").text('获取语音验证码').removeClass('grey').addClass('verLink');
                    $("#mobileAuthValiCode_btn").attr('msg-type', 2);
                    $("#mobileAuthValiCode_btn").die().live('click', sendAuthValiCode);
                    $(this).parent('.written').hide();

                });
                //_this.tips(tipsPos, isOk, '', 'account');
            }
            _this.tips(oTips, isOk, errTips['mobile'], 'mobile');
        });
    },
    mybirth: function() {
        var _this = this;
        validArr['mybirth'] = false;
        $('#se1, #se2, #se3').click(function(event) {
            event.preventDefault();
            baihe.stopBubble(event);

            changeClass($(this).attr('id'));
        });

        $("#_se1 a").each(function() {
            $(this).attr("id", $(this).html());
            $(this).attr("href", "javascript:chooseBirth('_se1'," + $(this).attr('id') + ")");
        });
        $("#_se2 a").each(function() {
            $(this).attr("id", $(this).html());
            $(this).attr("href", "javascript:chooseBirth('_se2'," + $(this).attr('id') + ")");
        });
    },
    mycity: function() {
        var _this = this;
        validArr['mycity'] = false;
        $('#ci1, #ci2, #ci3').click(function(event) {
            event.preventDefault();
            baihe.stopBubble(event);

            changeCityClass($(this).attr('id'));
        });
    },
    cityInit: function() {
        var _this = this;

        if (!$('#mycityId').val()) {
            return;
        }
        var cityJson = resolveCity($('#mycityId').val());

        $('#ci1').val(cityJson[0]);
        $('#ci2').val(cityJson[1]);
        $('#ci3').val(cityJson[2]);

        if (cityJson[3] != 0) {
            choosePro(cityJson[3]);
        }
        if (cityJson[3] == -1) {
            selectOtherCountry();
        }
        if (cityJson[4] != 0) {
            if (cityJson[3] == -1) {
                chooseCountry(cityJson[4] < 10 ? '0' + cityJson[4] : cityJson[4]);
            } else {
                chooseCity(cityJson[4]);
            }
        }
        if (cityJson[5] != 0) {
            if (cityJson[3] == -1) {
                chooseOtherPro(cityJson[5]);
            } else {
                chooseCounty(cityJson[5]);
            }
        }

    },
    height: function() {
        var _this = this;
        $('#_myheight a').click(function(event) {
            event.preventDefault();
            _this.chooseHeight($(this).attr('value'));
        });
        $('#myheight').click(function(event) {
            baihe.stopBubble(event);
            selectMyHeight($(this));
        });

        function selectMyHeight(tool) {
            var _sid = tool.attr('id');
            //$("#_"+_sid).css("display","block");
            fnSelect(tool, _sid);
        }

        function fnSelect(tool, _sid) {
            var _val = tool.val();
            $("#_" + _sid).css("display", "block");
            $('#_' + _sid + ' a').removeClass('selectHeight').mouseover(function() {
                $('#_' + _sid + ' a').removeClass('selectHeight');
            });
            if (_val == 144) {
                document.getElementById('_' + _sid).scrollTop = 0;
                $('#_' + _sid + ' a').first().addClass('selectHeight');
            } else if (_val == 196) {
                document.getElementById('_' + _sid).scrollTop = ($('#_' + _sid + ' a').length + 1) * 24;
                $('#_' + _sid + ' a').last().addClass('selectHeight');
            } else {

                var _height = $('#_' + _sid + ' a:contains(' + _val + ')').index() * 24;
                if (_val == 175 || _val == 160) {
                    document.getElementById('_' + _sid).scrollTop = _height - 24 * 5;
                } else {
                    document.getElementById('_' + _sid).scrollTop = _height;
                }
                $('#_' + _sid + ' a:contains(' + _val + ')').first().addClass('selectHeight');
            }
        }
        if (!$('#csheight').val()) {
            _this.chooseHeight(($("#gender").val() == 1) ? 175 : 160);
        } else {
            _this.chooseHeight($('#csheight').val());
        }

    },
    chooseHeight: function(ch) {
        $("#myheight_msg").html(msgTips['ok']);
        $("#_myheight a").each(function() {
            $("#myheight").val(ch);
            $("#csheight").val(ch);
            $("#_myheight").css("display", "none");

        });
    },
    degree: function() {
        var aArr = ['1_初中', '2_中专/职高/技校', '3_高中', '4_大专', '5_本科', '6_硕士', '7_博士', '8_博士后'];
        $('#_mydegree a').click(function(event) {
            event.preventDefault();
            chooseDegree($(this).attr('value'));
        });
        $('#mydegree').click(function(event) {
            baihe.stopBubble(event);
            selectMyDegree($(this));
        });

        function selectMyDegree(tool) {
            var _sid = tool.attr('id');
            $("#_" + _sid).css("display", "block");
        }

        function chooseDegree(cdegree) {
            $("#mydegree_msg").html(msgTips['ok']);
            $("#_mydegree a").each(function() {

                $("#csdegree").val(cdegree.split("_")[0]);
                $("#mydegree").val(cdegree.split("_")[1]);
                $("#_mydegree").css("display", "none").mouseover(function() {
                    $(this).find('a').removeClass('selectHeight');
                });
                $('#_mydegree a').each(function(index) {
                    if ($(this).attr('value') == cdegree) {
                        $(this).addClass('selectHeight');
                    } else {
                        $(this).removeClass('selectHeight');
                    }
                });
            });
        }
        if ($('#csdegree').val() == '') {
            chooseDegree('5_本科');
        } else {
            chooseDegree(aArr[$('#csdegree').val() - 1]);
        }
    },
    income: function() {
        var aArr = ['1_2000以下', '2_2000-3000', '3_3000-4000', '4_4000-5000', '5_5000-7000', '6_7000-10000', '7_10000-15000', '8_15000-20000', '9_20000-25000', '10_25000-30000', '11_30000-50000', '12_50000以上'];
        $('#_myincome a').click(function(event) {
            event.preventDefault();
            chooseDegree($(this).attr('value'));
        });
        $('#myincome').click(function(event) {
            baihe.stopBubble(event);
            selectMyDegree($(this));
        });

        function selectMyDegree(tool) {
            var _sid = tool.attr('id');
            $("#_" + _sid).css("display", "block");
        }

        function chooseDegree(cdegree) {
            $("#myincome_msg").html(msgTips['ok']);
            $("#_myincome a").each(function() {

                $("#csincome").val(cdegree.split("_")[0]);
                $("#myincome").val(cdegree.split("_")[1]);
                $("#_myincome").css("display", "none").mouseover(function() {
                    $(this).find('a').removeClass('selectHeight');
                });
                $('#_myincome a').each(function(index) {
                    if ($(this).attr('value') == cdegree) {
                        $(this).addClass('selectHeight');
                    } else {
                        $(this).removeClass('selectHeight');
                    }
                });
            });
        }
        if ($('#csincome').val() == '') {
            chooseDegree('4_4000-5000');
        } else {
            chooseDegree(aArr[$('#csincome').val() - 1]);
        }
    },
    marriage: function() {
        var aArr = ['1_未婚', '2_离异', '3_丧偶'];
        $('#_mymarriage a').click(function(event) {
            event.preventDefault();
            chooseDegree($(this).attr('value'));
        });
        $('#mymarriage').click(function(event) {
            baihe.stopBubble(event);
            selectMyDegree($(this));
        });

        function selectMyDegree(tool) {
            var _sid = tool.attr('id');
            $("#_" + _sid).css("display", "block");
        }

        function chooseDegree(cdegree) {
            $("#mymarriage_msg").html(msgTips['ok']);
            $("#_mymarriage a").each(function() {

                $("#csmarriage").val(cdegree.split("_")[0]);
                $("#mymarriage").val(cdegree.split("_")[1]);
                $("#_mymarriage").css("display", "none").mouseover(function() {
                    $(this).find('a').removeClass('selectHeight');
                });
                $('#_mymarriage a').each(function(index) {
                    if ($(this).attr('value') == cdegree) {
                        $(this).addClass('selectHeight');
                    } else {
                        $(this).removeClass('selectHeight');
                    }
                });
            });
        }
        if ($('#csmarriage').val() == '') {
            chooseDegree('1_未婚');
        } else {
            chooseDegree(aArr[$('#csmarriage').val() - 1]);
        }
    },
    /*百合服务条款*/
    clickPromit: function() {
        validArr['promit'] = true;
        $("#promit").click(function(event) {
            if ($(this).attr("checked")) {
                validArr['promit'] = true;
            } else {
                validArr['promit'] = false;
                msgTips['promit'] = '请勾选“已阅读并同意百合服务条款”。　';
            }
        });
    },
    // code: function() {
    //     if (showVerify == 1) {
    //         var d = '';
    //         d += "<dl id='yzm'>";
    //         d += "    <dt style='width:60px;'>验证码</dt>";
    //         d += "    <dd class='w02'>";
    //         d += "        <input style='width:90px;' class='inputbox' name='' type='text' id='codeVal' /><img id='codeImg' class='code' src='/register/getVerifyPic?time=" + new Date().getTime() + "' width='68' height='23' /><a class='name' href='javascript:freshCheckCode()'>看不清换一张</a>";
    //         d += "    </dd>";
    //         d += "</dl>";
    //         $("#showverifydiv").html(d);
    //     }
    // },

    picValiCode: function() {
        validArr['picValiCode'] = false;
        var val = $('#codeVal').val();
        if (val) {
            validArr['picValiCode'] = true;
        }
    },

    userDesc: function() {
        var descList = new Array();
        //descList[0] = "大家好，我是来自{city}的{genderdesc}，在百合网真心寻找一个靠谱的{genderchn}，希望在以后的生活中相互扶持，过上幸福安逸的美好生活，我的愿望并不大，只希望有你相伴。";
        descList[0] = "大家好，我来自{city}，在百合网真心寻找一个靠谱的{genderchn}，希望在以后的生活中相互扶持，过上幸福安逸的美好生活，我的愿望并不大，只希望有你相伴。";
        descList[1] = "你们好：我是{nick}，不知道你看我的资料还觉得合适吗？我想要找一个心灵相通，相互理解，开开心心的另一半，如果你是的话，那就快给我写信吧！";
        descList[2] = "幸福是什么呢？不就是两人牵手偕老过一辈子吗？我已经准备迎接心爱的人，但不知道我的{genderchn}在哪里？希望你尽早出现！";
        var citystr = '',
            gender = '',
            nickname = '';
        if (jsonuserinfo && jsonuserinfo['cityChn']) {
            citystr = jsonuserinfo['cityChn'];
        } else {
            citystr = $("#ci1").val() + $("#ci2").val();
        }
        if (jsonuserinfo['gender'] !== '') {
            gender = jsonuserinfo['gender']
        } else {
            gender = $("#gender").val();
        }
        if (jsonuserinfo && jsonuserinfo['nickname']) {
            nickname = jsonuserinfo['nickname'];
        } else {
            nickname = $("#nikename").val();
        }

        var genderdesc = "";
        var genderchn = "";
        var mydesccontext = "";
        //var nickstr = $("#nikename").val();

        if (gender == 1) {
            genderdesc = "小伙子";
            genderchn = "她";
        } else {
            genderdesc = "姑娘";
            genderchn = "他";
        }
        var domnum = Math.floor(Math.random() * descList.length);
        if (domnum == 0) {
            mydesccontext = descList[domnum];
            mydesccontext = mydesccontext.replace("{city}", citystr);
            //mydesccontext = mydesccontext.replace("{genderdesc}", genderdesc);
            mydesccontext = mydesccontext.replace("{genderchn}", genderchn);
        } else {
            if (domnum == 1) {
                mydesccontext = descList[domnum];
                mydesccontext = mydesccontext.replace("{nick}", nickname);
            } else {
                mydesccontext = descList[domnum];
                mydesccontext = mydesccontext.replace("{genderchn}", genderchn);
            }
        }
        $('#userdesc').val(mydesccontext);
    }
};

function freshCheckCode() {
    $("#codeImg").attr("src", "/register/getVerifyPic?time=" + new Date().getTime());
}
var checkCodePatn = /^(([\u4e00-\u9fa5]{4})|([0-9A-Za-z]{4}))$/;

// function codeTest() {
//     var val = $("#codeVal").val();
//     if (val == '' || val == null) {
//         baihe.block({
//             text: '请填写图片验证码'
//         });
//         return;
//     } else {
//         if (checkCodePatn.test(val)) {
//             $("#codeVal").attr("disabled", true);
//             $.getJSON('http://my.baihe.com/register/checkVerifyPic?jsonCallBack=?', {
//                 checkcode: encodeURI(encodeURI(val))
//             }, function(data) {
//                 if (data.data == 1) {
//                     if ($("#gender").val() == 1) {
//                         var img = new Image();
//                         img.src = "http://bhtg.baihe.com/stat.html?ggCode=zhuceyouhua_7";
//                     } else {
//                         var img = new Image();
//                         img.src = "http://bhtg.baihe.com/stat.html?ggCode=zhuceyouhua_8";
//                     }
//                     $("#regForm").submit();
//                 } else {
//                     baihe.block({
//                         text: '您输入的验证码不正确'
//                     });
//                     freshCheckCode();
//                     $("#codeVal").attr("disabled", false);
//                     return;
//                 }
//             });
//         } else {
//             baihe.block({
//                 text: '您输入的验证码不正确'
//             });
//             return;
//         }
//     }
// }
// 

function codeTest() {
    var val = $("#codeVal").val();

    if (val == '' || val == null) {
        baihe.block({
            text: '请填写图片验证码'
        });
        return;
    } else {
        if (checkCodePatn.test(val)) {
            //$("#codeVal").attr("disabled", true);
            $.getJSON('http://my.baihe.com/Getinterlogin/checkVerifyPic?jsonCallBack=?', {
                'tmpId': temId,
                'checkcode': val
            }, function(data) {
                if (data && data.data == 1) {
                    // if ($("#gender").val() == 1) {
                    //     var img = new Image();
                    //     img.src = "http://bhtg.baihe.com/stat.html?ggCode=zhuceyouhua_7";
                    // } else {
                    //     var img = new Image();
                    //     img.src = "http://bhtg.baihe.com/stat.html?ggCode=zhuceyouhua_8";
                    // }
                    //$("#regForm").submit();
                    regLogin();
                } else {
                    baihe.block({
                        text: '您输入的验证码不正确'
                    });
                    picValiCode();
                    //$("#codeVal").attr("disabled", false);
                    return;
                }
            });
        } else {
            baihe.block({
                text: '您输入的验证码不正确'
            });
            return;
        }
    }
}


/**
 * [resolveCity 根据code初始化地区联动]
 * @param  {[type]} str [code]
 * @return {[type]}     [Array]
 */
function resolveCity(str) {
    var nOne, nTow, nThree, cOne, cTow, cThree;
    if (str.length <= 2) {
        //国家
        for (var i = 0; i < allCountries.length; i++) {
            if (allCountries[i].split('|')[1] == parseInt(str)) {
                nOne = '其他国家', nTow = allCountries[i].split('|')[0], nThree = '不限';
                cOne = -1, cTow = allCountries[i].split('|')[1], cThree = 0;
            }
        }
    } else if (str.length == 4) {
        //外国城市、中国省份    
        for (var i = 0; i < allProvinces.length; i++) {
            if (allProvinces[i].split('|')[2] == parseInt(str)) {
                if (allProvinces[i].split('|')[0] == 86) {
                    nOne = allProvinces[i].split('|')[1], nTow = '不限', nThree = '不限';
                    cOne = allProvinces[i].split('|')[2], cTow = 0, cThree = 0;
                } else {
                    for (var j = 0; j < allCountries.length; j++) {
                        if (parseInt(allCountries[j].split('|')[1]) == allProvinces[i].split('|')[0]) {
                            nOne = '其他国家', nTow = allCountries[j].split('|')[0], nThree = allProvinces[i].split('|')[1];
                            cOne = -1, cTow = allCountries[j].split('|')[1], cThree = allProvinces[i].split('|')[2];
                        }
                    }
                }
            } else if (allProvinces[i].split('|')[0] == parseInt(str.substring(0, 2))) {
                for (var j = 0; j < allCountries.length; j++) {
                    if (parseInt(allCountries[j].split('|')[1]) == allProvinces[i].split('|')[0]) {
                        nOne = '其他国家', nTow = allCountries[j].split('|')[0], '不限';
                        cOne = -1, cTow = allCountries[j].split('|')[1], cThree = allCountries[j].split('|')[1];
                    }
                }
            }
        }
    } else if (str.length == 6) {
        //中国城市    
        for (var i = 0; i < allCities.length; i++) {
            if (allCities[i].split('|')[3] == parseInt(str)) {
                nTow = allCities[i].split('|')[2];
                cTow = allCities[i].split('|')[3];
            }
        }
        for (var i = 0; i < allProvinces.length; i++) {
            if (allProvinces[i].split('|')[2] == str.substring(0, 4)) {
                nOne = allProvinces[i].split('|')[1];
                cOne = allProvinces[i].split('|')[2];
            }
        }
        nThree = '不限', cThree = 0;
    } else if (str.length == 8) {
        //区县    
        for (var i = 0; i < allDistrict.length; i++) {
            if (allDistrict[i].split('|')[4] == parseInt(str)) {
                nThree = allDistrict[i].split('|')[3];
                cThree = allDistrict[i].split('|')[4];
            }
        }
        for (var i = 0; i < allCities.length; i++) {
            if (allCities[i].split('|')[3] == str.substring(0, 6)) {
                nTow = allCities[i].split('|')[2];
                cTow = allCities[i].split('|')[3];
            }
        }
        for (var i = 0; i < allProvinces.length; i++) {
            if (allProvinces[i].split('|')[2] == str.substring(0, 4)) {
                nOne = allProvinces[i].split('|')[1];
                cOne = allProvinces[i].split('|')[2];
            }
        }
    }
    return [nOne, nTow, nThree, cOne, cTow, cThree];
}


function picValiCode() {
    temId = (new Date()).getTime() + Math.floor(Math.random() * 10000);
    $("#picValiCode").attr('src', 'http://my.baihe.com/Getinterlogin/getVerifyPic?jsonCallBack=?&tmpId=' + temId);
    $("#codeVal").val('');
    landPageRegister.picValiCode();
    var _this = this;
    var oTips = $('#picValiCode_msg');
    validArr['picValiCode'] = false;
    $('#codeVal').bind('focus', function() {
        var str = $(this).val();
        if (str == '') {
            oTips.html('请输入验证码');
        }
    });
    $('#codeVal').bind('blur', function() {
        var str = $(this).val();
        oTips.html('');
        if (str) {
            validArr['picValiCode'] = true;
        }
    });
}

var isBlackIP = false;

function getIPTimes() {
    $.ajax({
        url: 'http://my.baihe.com/Getinterregist/getIPTimes?jsonCallBack=?',
        dataType: 'jsonp',
        success: function(data) {
            // $("#vCodeInfo").html('<dt>验证码</dt>\
            //         <dd style="z-index:2;">\
            //         <input name="" type="text" class="inp02" id="codeVal"/>\
            //         <img src="" alt="验证码" width="77" style="cursor:pointer;" height="30" class="verImg" id="picValiCode">\
            //         <a href="javascript:void(0);" class="refresh" id="refreshValiCode">刷新</a>\
            //         <div class="prompt" id="picValiCode_msg"></div>\
            //         </dd>').css('clear', 'both');
            // picValiCode();
            if (data && data.state == 1) {
                if (data.data['isBlackIP'] == 2) {
                    isBlackIP = true;
                    baihe.block({
                        type: 0,
                        title: '提示',
                        text: '您的IP存在风险，无法注册',
                        callback: null
                    });
                } else if (data.data['showCode'] == true) {
                    $("#vCodeInfo").html('<dt>验证码</dt>\
                        <dd style="z-index:2;">\
                        <input name="" type="text" class="inp02" id="codeVal"/>\
                        <img src="" alt="验证码" width="77" style="cursor:pointer;" height="30" class="verImg" id="picValiCode">\
                        <a href="javascript:void(0);" class="refresh" id="refreshValiCode">刷新</a>\
                        <div class="prompt" id="picValiCode_msg"></div>\
                        </dd>').css('clear', 'both');
                    picValiCode();
                }
            }
        }
    });

};

$(document).ready(function() {

    //$("#mobileAuthValiCode_btn").bind('click', sendAuthValiCode);
    // if (showInfoStatu == '-1') {
    //     getIPTimes();
    // }

     getIPTimes();

    $("#refreshValiCode").bind('click', function(event) {
        var validCode = baihe.verifyCode();
        if (validCode) {
            $("#picValiCode").attr('src', validCode);
        }
    });

    function checkMobil(type, arg) {
        $.ajax({
            url: 'http://my.baihe.com/register/emailCheckForXs?jsonCallBack=?&l' + (new Date()).getTime(),
            dataType: 'jsonp',
            data: {
                'email': arg
            },
            success: function(data) {
                if (data && data.state == 0) {
                    if (type == "phone") {
                        $('#account_msg').html('手机号已注册，<a href="http://my.baihe.com/login">请直接登录</a>');
                        $('#divValiCode').hide();
                    } else if (type == "email") {
                        $('#account_msg').html('邮箱已注册，<a href="http://my.baihe.com/login">请直接登录</a>');
                        $('#authValiCode').hide();
                    }
                }
            }
        });
    }



    $("#picValiCode,#refreshValiCode").live('click', picValiCode);

    landPageRegister.init();
    if (showInfoStatu == -1) {
        $('input:radio').jqTransRadio();
        $("#regMobile").trigger('click');
        $("#regMobile").trigger('click').click(function() {
            $("#authValiCode").slideUp("slow");
            $("#divValiCode").slideDown("slow");
            validArr['mobile'] = true;
            // if (validArr['mobileValiCode']) {
            //     validArr['mobileValiCode'] = true;
            // } else {
            //     validArr['mobileValiCode'] = false;
            // }
            validArr['mobileValiCode'] = false;
            validArr['mobileAuthValiCode'] = true;
            if (!$("#regMobile").prop('checked')) {
                $("#account,#password").val('');
                $('#account,#password').trigger('blur');
            }
        }).trigger('click');

        $("#regEmail").click(function() {
            validArr['mobileValiCode'] = true;
            validArr['mobile'] = false;
            // if (validArr['mobileAuthValiCode']) {
            //     validArr['mobileAuthValiCode'] = true;
            // } else {
            //     validArr['mobileAuthValiCode'] = false;
            // }
            validArr['mobileAuthValiCode'] = false;
            $("#authValiCode").slideDown("slow");
            $("#divValiCode").slideUp("slow");
            //landPageRegister.mobile();
            //landPageRegister.mobileAuthValiCode();
            if (!$("#regEmail").prop('checked')) {
                $("#account,#password").val('');
                $('#account,#password').trigger('blur');
            }
        });
    } else {
        $("#authValiCode").show();
        //validArr['mobileValiCode'] = true;
        //validArr['mobileAuthValiCode'] = false;
    }
});