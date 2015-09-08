var baihe_pro = 0 ;//是否profile页
function pcc_getCookieVal(offset) {
    var endstr = document.cookie.indexOf (";", offset);
    if (endstr == -1) {
        endstr = document.cookie.length;
    }
    return unescape(document.cookie.substring(offset, endstr));
}

function pcc_getCookie(name) {
    var arg = name + "=";
    var alen = arg.length;
    var clen = document.cookie.length;
    var i = 0;
    while (i < clen) {
        var j = i + alen;
        if (document.cookie.substring(i, j) == arg) {
            return pcc_getCookieVal(j);
        }
        i = document.cookie.indexOf(" ", i) + 1;
        if (i == 0) break; 
    }
    return "";
}

function pcc_setCookie(name, value, expires, path, domain, secure) {
    document.cookie = name + "=" + escape (value) +
        ((expires) ? "; expires=" + expires : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
}


function pcc_deleteCookie(name,path,domain) {
    if (pcc_getCookie(name)) {
        document.cookie = name + "=" +
            ((path) ? "; path=" + path : "") +
            ((domain) ? "; domain=" + domain : "") +
            "; expires=Thu, 01-Jan-70 00:00:01 GMT";
    }
}

function pcc_getExpDate(days, hours, minutes) {
    var expDate = new Date( );
    if (typeof days == "number" && typeof hours == "number" && 
        typeof hours == "number") {
        expDate.setDate(expDate.getDate( ) + parseInt(days));
        expDate.setHours(expDate.getHours( ) + parseInt(hours));
        expDate.setMinutes(expDate.getMinutes( ) + parseInt(minutes));
        return expDate.toGMTString( );
    }
}

var pcc_ck_name = "cookie_pcc";

var policy_seo = "601";
var policy_link = "701";

function generateADInfoCookie(){
	var pcc_cookie = getPccFromCookie();
  var pcc_param = getPccFromParam();
	var policy = "";

	if(pcc_cookie != null){		
		policy = pcc_cookie.policy;
	}

	if(pcc_param.policy.length + pcc_param.Channel.length + pcc_param.Code.length == 0){
		
		if(policy != policy_seo){
			var pcc_refer = getPccFromRefer();
			if(pcc_refer != null){
				if(pcc_refer.policy == policy_seo || policy != policy_link){
					setPccCookie(pcc_ck_name,pcc_refer);
				}
			}
		}

	}else{
		setPccCookie(pcc_ck_name,pcc_param);
	}

}

//第一个数组全部跳转，第二个数组50%流量
var redirectArr = [['policy=1&Channel=sogou&Code=6-06094'], ['policy=1&Channel=sgwzz&Code=140099-mb','policy=1&Channel=sgwzz-k&Code=140099-b'], 
                   ['policy=1&Channel=360-pp&Code=360pp-010', 'policy=1&Channel=baidu-pp&Code=350002-001']];
var redirectURL = "";
var redirectzonghe6URL = "";
var redirectNewLpURL = "";
var channel_3g = "";
var code_3g = "";
function getPccFromParam(){
	var param_pcc = {"policy":"","Channel":"","Code":"","ReferUrl":document.referrer};
	var locurl = location.href;
	var org_locurl = locurl ;

	if(locurl.indexOf('http://www.baihe.com/?') >= 0){
		var lo = locurl.split("?");
		if(lo.length==2){
			var checkVal = lo[1];
			for(var i=0;i<redirectArr.length;i++){
				for(var j=0;j<redirectArr[i].length;j++){
					if(redirectArr[i][j] == checkVal){
						if(i==0&&j==0){
							location.replace(redirectzonghe6URL);
						}else if(i==2){
							//location.replace(redirectNewLpURL);
							location.replace(redirectURL);
						}else{
							if((new Date().getSeconds()) % 2 == 1){
								location.replace(redirectURL);
							}
						}
					}
				}
			}
		}
	}

	var num=locurl.indexOf("?");
	
	if(num > 0 && num < locurl.length){
		locurl=locurl.substr(num+1);

		var arr = locurl.split("&");
		
		for(var i = 0 ; i < arr.length ; i ++){
			var p = arr[i];

			var arr1 = p.split("=");
			
			if(arr1[0] == "policy"){
				param_pcc.policy = arr1[1];
			}else if(arr1[0] == "Channel"){
				param_pcc.Channel = arr1[1];
				channel_3g = arr1[1];
			}else if(arr1[0] == "Code"){
				param_pcc.Code = arr1[1];
				code_3g = arr1[1];
			}
			else if(arr1[0] == "baihePro"){
				   var baihe_pro_t = arr1[1];
				   if(baihe_pro_t!=null&&baihe_pro_t!=''&&!isNaN(baihe_pro_t)){
				   baihe_pro = baihe_pro_t ;
				 }
			}
		}
	}
	if(org_locurl.indexOf("")>-1&&baihe_pro>0){
		   var img = new Image();                                                                                   
			 img.src="";
			 pcc_setCookie("baihe_pro_ck",baihe_pro+"",pcc_getExpDate(365,0,0),"/","baihe.com");
	}
  if(param_pcc.Channel == 'sogou'){
  	document.writeln(unescape("") );
  }
	return param_pcc;
}

function getPccFromCookie(){
	var ck_str = pcc_getCookie(pcc_ck_name);

	if(ck_str != ""){
		ck_str = unescape(ck_str);
		
		var arr = ck_str.split("||");

		return {"policy":arr[0],"Channel":arr[1],"Code":arr[2],"ReferUrl":arr[3]};
	}else{
		return null;
	}
}

function getPccFromRefer(){
	var referurl = document.referrer;

	if(referurl == ""){
		return null;
	}

	var pos = referurl.indexOf("?");
	var subrefer = referurl;
	if(pos > 0){
		subrefer = referurl.substring(0,pos);
	}
	if(subrefer.indexOf("baihe.com") > 0){
		return null;
	}
	
	for(var i = 0 ; i  < seoUrlArr.length ; i ++){
		if(referurl.indexOf(seoUrlArr[i][1]) == 0){
			return {"policy":policy_seo,"Channel":seoUrlArr[i][0],"Code":"","ReferUrl":referurl};
		}
	}
	
	referurl = referurl.replace("?","/");
	var pos0 = referurl.indexOf("//");
	var pos1 = referurl.indexOf("/",pos0+2);

	if(pos1 < 0){
		pos1 = referurl.length;
	}

	return {"policy":policy_link,"Channel":referurl.substring(pos0+2,pos1),"Code":"","ReferUrl":referurl};
}

var seoUrlArr = [["",""],
			["",""],
			["",""],
			[""],
			[""],
			[""],
			[""],
			[""],
			[""],
			[""],
			[""]];


function setPccCookie(ckName,pcc){
	pcc_setCookie(ckName,pcc.policy+"||"+pcc.Channel+"||"+pcc.Code+"||"+pcc.ReferUrl,pcc_getExpDate(365,0,0),"/","baihe.com");
}
function setPccCookie_mobile(ckName,pcc){
	
	var ckVal = pcc.policy+"||"+pcc.Channel+"||"+pcc.Code+"||"+pcc.ReferUrl+"||"+pcc.landPhoneNum+"||"+pcc.landPhoneValidCode ;
	pcc_setCookie(ckName,ckVal,pcc_getExpDate(365,0,0),"/","baihe.com");
	
	
}
generateADInfoCookie();