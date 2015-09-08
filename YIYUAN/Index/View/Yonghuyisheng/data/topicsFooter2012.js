if(typeof(bzt_headType)!='undefined'&&bzt_headType == 0){
	if(!bzt_isMainUser){
			writeGoogleCode_indexPage();
	}
}
var bzw_html = "";
bzw_html += "<div id='topicsFooter'>";
bzw_html += "	北京百合在线科技有限公司　|　版权所有© 2005 - 2015 百合网 　京ICP证041124号　 京公网安备110105000655号";
bzw_html += "</div>";

document.write(bzw_html);

var  stronline = "<div align=center style='display:none;'><script language='javascript' src='http://log.baihe.com/'></script></div>";
document.write(eval("stronline"));

var fromURLParam="";
var ggCode="";
var beViewedUserId="";
var locurlPre="";
var _baiheHead_ready_time = new Date();
var locUrlSrc = location.href;
var num=locUrlSrc.indexOf("?");
var start=locUrlSrc.indexOf("http://");
var referurl = document.referrer;
var fromURL="";
var rfstart =referurl.indexOf("http://");
var num1=referurl.indexOf("?");
 var img = new Image();
 var loadTime = 0;
 if(typeof(_baiheHead_start_time)!='undefined' && _baiheHead_start_time){
	loadTime=_baiheHead_ready_time-_baiheHead_start_time;
}

if(num > 0){
	locurlPre=locUrlSrc.substr(num+1)+"";
	var _num = locurlPre.indexOf("#");
	
	if(_num > 0){
			locurlPre = locurlPre.substring(0,_num);
	}
}else{
	locurlPre = "";
}
	
if(num>=0){
	 var locURL=locUrlSrc.substring(start,num);	
}
 else{
	 locURL=locUrlSrc;
}
	
if(num1>0){
	fromURL=referurl.substring(rfstart,num1);
    getBhtg_ggcode();                    
}else{
	fromURL=referurl;
}

function getBhtg_ggcode(){

	fromURLParam=referurl.substr(num1+1)+"";
	if(fromURLParam!=null&&fromURLParam!=''){
			var fromParams = fromURLParam.split("&");
			for(var i = 0 ; i < fromParams.length ; i ++){
					var p = fromParams[i];    
				  var p1 = 	p.split("=")
					if(ggCode==''&& p1[0] == "ggCode"){
							ggCode = p1[1];
					}
					if(p1[0] == "rvCode"){
							ggCode = p1[1];
					}
			}
	}
	if(ggCode.length>0){
	  var	ggCodeEIdx=ggCode.indexOf("_");
		beViewedUserId=ggCode.substr(ggCodeEIdx+1)+"";
		ggCode=ggCode.substring(0,ggCodeEIdx)+"";
	}
}

function bzw_getCookieVal(offset) {
    var endstr = document.cookie.indexOf (";", offset);
    if (endstr == -1) {
        endstr = document.cookie.length;
    }
    return unescape(document.cookie.substring(offset, endstr));
}

// primary function to retrieve cookie by name
function bzw_getCookie(name) {
    var arg = name + "=";
    var alen = arg.length;
    var clen = document.cookie.length;
    var i = 0;
    while (i < clen) {
        var j = i + alen;
        if (document.cookie.substring(i, j) == arg) {
            return bzw_getCookieVal(j);
        }
        i = document.cookie.indexOf(" ", i) + 1;
        if (i == 0) break; 
    }
    return "";
}

// store cookie value with optional details as needed
function bzw_setCookie(name, value, expires, path, domain, secure) {
    document.cookie = name + "=" + escape (value) +
        ((expires) ? "; expires=" + expires : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
}

// remove the cookie by setting ancient expiration date
function bzw_deleteCookie(name,path,domain) {
    if (bzw_getCookie(name)) {
        document.cookie = name + "=" +
            ((path) ? "; path=" + path : "") +
            ((domain) ? "; domain=" + domain : "") +
            "; expires=Thu, 01-Jan-70 00:00:01 GMT";
    }
}

// utility function to retrieve an expiration date in proper
// format; pass three integer parameters for the number of days, hours,
// and minutes from now you want the cookie to expire (or negative
// values for a past date); all three parameters are required,
// so use zeros where appropriate
function bzw_getExpDate(days, hours, minutes) {
    var expDate = new Date();
    if (typeof days == "number" && typeof hours == "number" && 
        typeof hours == "number") {
        expDate.setDate(expDate.getDate( ) + parseInt(days));
        expDate.setHours(expDate.getHours( ) + parseInt(hours));
        expDate.setMinutes(expDate.getMinutes( ) + parseInt(minutes));
        return expDate.toGMTString( );
    }
}


var _ck_pcc = bzw_getCookie("cookie_pcc");

var pcc_userId = bzw_getCookie("GCUserID");
if(pcc_userId == ""){
	pcc_userId = "0";
}

var pcc_tmpId = bzw_getCookie("tempID");
if(pcc_tmpId == ""){
	var cur_timestamp=new Date().getTime()+"";
	pcc_tmpId = Math.round(Math.random()*1000000)+1+"";	
	
	pcc_tmpId=cur_timestamp.substr(cur_timestamp.length+pcc_tmpId.length-9,8-pcc_tmpId.length)+pcc_tmpId;
	bzw_setCookie("tempID",pcc_tmpId,bzw_getExpDate(365,0,0),"/","baihe.com");
}


img.src="http://report1.baihe.com/qudao.html?questStr="+locurlPre+"&&locURL="+locURL+"&Referer="+fromURL+"&loadTime="+loadTime+"&ck_pcc="+escape(_ck_pcc)+"&GCUserID="+pcc_userId+"&tempId="+pcc_tmpId+"&ggCode="+ggCode+"&BVUserID="+beViewedUserId;

//var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
//document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
function GoogleJs()
{
 
 if(typeof(_gat)=="object" && typeof(_gat._getTracker())=="object")
 {
  var pageTracker = _gat._getTracker("UA-8269452-1");
  pageTracker._trackPageview();
 }
 else
 {
  setTimeout("GoogleJs()",200);
 }
}
//GoogleJs();
