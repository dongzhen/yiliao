(function(){var h={},mt={},c={id:"5caa30e0c191a1c525d4a6487bf45a9d",dm:["baihe.com"],js:"tongji.baidu.com/hm-web/js/",etrk:[],icon:'',ctrk:false,align:-1,nv:-1,vdur:1800000,age:31536000000,rec:0,rp:[],trust:0,vcard:0,qiao:0,lxb:0,conv:0,apps:''};var p=!0,q=null,r=!1;mt.i={};mt.i.Ca=/msie (\d+\.\d+)/i.test(navigator.userAgent);mt.i.cookieEnabled=navigator.cookieEnabled;mt.i.javaEnabled=navigator.javaEnabled();mt.i.language=navigator.language||navigator.browserLanguage||navigator.systemLanguage||navigator.userLanguage||"";mt.i.ma=(window.screen.width||0)+"x"+(window.screen.height||0);mt.i.colorDepth=window.screen.colorDepth||0;mt.cookie={};
mt.cookie.set=function(a,b,g){var e;g.B&&(e=new Date,e.setTime(e.getTime()+g.B));document.cookie=a+"="+b+(g.domain?"; domain="+g.domain:"")+(g.path?"; path="+g.path:"")+(e?"; expires="+e.toGMTString():"")+(g.Ga?"; secure":"")};mt.cookie.get=function(a){return(a=RegExp("(^| )"+a+"=([^;]*)(;|$)").exec(document.cookie))?a[2]:q};mt.o={};mt.o.xa=function(a){return document.getElementById(a)};mt.o.ya=function(a,b){for(b=b.toUpperCase();(a=a.parentNode)&&1==a.nodeType;)if(a.tagName==b)return a;return q};
(mt.o.ka=function(){function a(){if(!a.r){a.r=p;for(var b=0,g=e.length;b<g;b++)e[b]()}}function b(){try{document.documentElement.doScroll("left")}catch(e){setTimeout(b,1);return}a()}var g=r,e=[],k;document.addEventListener?k=function(){document.removeEventListener("DOMContentLoaded",k,r);a()}:document.attachEvent&&(k=function(){"complete"===document.readyState&&(document.detachEvent("onreadystatechange",k),a())});(function(){if(!g)if(g=p,"complete"===document.readyState)a.r=p;else if(document.addEventListener)document.addEventListener("DOMContentLoaded",
k,r),window.addEventListener("load",a,r);else if(document.attachEvent){document.attachEvent("onreadystatechange",k);window.attachEvent("onload",a);var e=r;try{e=window.frameElement==q}catch(m){}document.documentElement.doScroll&&e&&b()}})();return function(b){a.r?b():e.push(b)}}()).r=r;mt.event={};mt.event.d=function(a,b,g){a.attachEvent?a.attachEvent("on"+b,function(b){g.call(a,b)}):a.addEventListener&&a.addEventListener(b,g,r)};
mt.event.preventDefault=function(a){a.preventDefault?a.preventDefault():a.returnValue=r};mt.l={};mt.l.parse=function(){return(new Function('return (" + source + ")'))()};
mt.l.stringify=function(){function a(a){/["\\\x00-\x1f]/.test(a)&&(a=a.replace(/["\\\x00-\x1f]/g,function(a){var b=g[a];if(b)return b;b=a.charCodeAt();return"\\u00"+Math.floor(b/16).toString(16)+(b%16).toString(16)}));return'"'+a+'"'}function b(a){return 10>a?"0"+a:a}var g={"\b":"\\b","\t":"\\t","\n":"\\n","\f":"\\f","\r":"\\r",'"':'\\"',"\\":"\\\\"};return function(e){switch(typeof e){case "undefined":return"undefined";case "number":return isFinite(e)?String(e):"null";case "string":return a(e);case "boolean":return String(e);
default:if(e===q)return"null";if(e instanceof Array){var g=["["],n=e.length,m,f,d;for(f=0;f<n;f++)switch(d=e[f],typeof d){case "undefined":case "function":case "unknown":break;default:m&&g.push(","),g.push(mt.l.stringify(d)),m=1}g.push("]");return g.join("")}if(e instanceof Date)return'"'+e.getFullYear()+"-"+b(e.getMonth()+1)+"-"+b(e.getDate())+"T"+b(e.getHours())+":"+b(e.getMinutes())+":"+b(e.getSeconds())+'"';m=["{"];f=mt.l.stringify;for(n in e)if(Object.prototype.hasOwnProperty.call(e,n))switch(d=
e[n],typeof d){case "undefined":case "unknown":case "function":break;default:g&&m.push(","),g=1,m.push(f(n)+":"+f(d))}m.push("}");return m.join("")}}}();mt.lang={};mt.lang.e=function(a,b){return"[object "+b+"]"==={}.toString.call(a)};mt.lang.Da=function(a){return mt.lang.e(a,"Number")&&isFinite(a)};mt.lang.Fa=function(a){return mt.lang.e(a,"String")};mt.localStorage={};
mt.localStorage.w=function(){if(!mt.localStorage.f)try{mt.localStorage.f=document.createElement("input"),mt.localStorage.f.type="hidden",mt.localStorage.f.style.display="none",mt.localStorage.f.addBehavior("#default#userData"),document.getElementsByTagName("head")[0].appendChild(mt.localStorage.f)}catch(a){return r}return p};
mt.localStorage.set=function(a,b,g){var e=new Date;e.setTime(e.getTime()+g||31536E6);try{window.localStorage?(b=e.getTime()+"|"+b,window.localStorage.setItem(a,b)):mt.localStorage.w()&&(mt.localStorage.f.expires=e.toUTCString(),mt.localStorage.f.load(document.location.hostname),mt.localStorage.f.setAttribute(a,b),mt.localStorage.f.save(document.location.hostname))}catch(k){}};
mt.localStorage.get=function(a){if(window.localStorage){if(a=window.localStorage.getItem(a)){var b=a.indexOf("|"),g=a.substring(0,b)-0;if(g&&g>(new Date).getTime())return a.substring(b+1)}}else if(mt.localStorage.w())try{return mt.localStorage.f.load(document.location.hostname),mt.localStorage.f.getAttribute(a)}catch(e){}return q};
mt.localStorage.remove=function(a){if(window.localStorage)window.localStorage.removeItem(a);else if(mt.localStorage.w())try{mt.localStorage.f.load(document.location.hostname),mt.localStorage.f.removeAttribute(a),mt.localStorage.f.save(document.location.hostname)}catch(b){}};mt.sessionStorage={};mt.sessionStorage.set=function(a,b){if(window.sessionStorage)try{window.sessionStorage.setItem(a,b)}catch(g){}};
mt.sessionStorage.get=function(a){return window.sessionStorage?window.sessionStorage.getItem(a):q};mt.sessionStorage.remove=function(a){window.sessionStorage&&window.sessionStorage.removeItem(a)};mt.I={};mt.I.log=function(a,b){var g=new Image,e="mini_tangram_log_"+Math.floor(2147483648*Math.random()).toString(36);window[e]=g;g.onload=g.onerror=g.onabort=function(){g.onload=g.onerror=g.onabort=q;g=window[e]=q;b&&b(a)};g.src=a};mt.J={};
mt.J.da=function(){var a="";if(navigator.plugins&&navigator.mimeTypes.length){var b=navigator.plugins["Shockwave Flash"];b&&b.description&&(a=b.description.replace(/^.*\s+(\S+)\s+\S+$/,"$1"))}else if(window.ActiveXObject)try{if(b=new ActiveXObject("ShockwaveFlash.ShockwaveFlash"))(a=b.GetVariable("$version"))&&(a=a.replace(/^.*\s+(\d+),(\d+).*$/,"$1.$2"))}catch(g){}return a};
mt.J.wa=function(a,b,g,e,k){return'<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="'+a+'" width="'+g+'" height="'+e+'"><param name="movie" value="'+b+'" /><param name="flashvars" value="'+(k||"")+'" /><param name="allowscriptaccess" value="always" /><embed type="application/x-shockwave-flash" name="'+a+'" width="'+g+'" height="'+e+'" src="'+b+'" flashvars="'+(k||"")+'" allowscriptaccess="always" /></object>'};mt.url={};
mt.url.g=function(a,b){var g=a.match(RegExp("(^|&|\\?|#)("+b+")=([^&#]*)(&|$|#)",""));return g?g[3]:q};mt.url.Aa=function(a){return(a=a.match(/^(https?:)\/\//))?a[1]:q};mt.url.aa=function(a){return(a=a.match(/^(https?:\/\/)?([^\/\?#]*)/))?a[2].replace(/.*@/,""):q};mt.url.M=function(a){return(a=mt.url.aa(a))?a.replace(/:\d+$/,""):a};mt.url.za=function(a){return(a=a.match(/^(https?:\/\/)?[^\/]*(.*)/))?a[2].replace(/[\?#].*/,"").replace(/^$/,"/"):q};
h.K={Ba:"http://tongji.baidu.com/hm-web/welcome/ico",R:"hm.baidu.com/hm.gif",U:"baidu.com",ga:"hmmd",ha:"hmpl",fa:"hmkw",ea:"hmci",ia:"hmsr",m:0,j:Math.round(+new Date/1E3),protocol:"https:"==document.location.protocol?"https:":"http:",Ea:0,ta:6E5,ua:10,va:1024,sa:1,s:2147483647,S:"cc cf ci ck cl cm cp cw ds ep et fl ja ln lo lt nv rnd si st su v cv lv api tt u".split(" ")};
(function(){var a={k:{},d:function(a,g){this.k[a]=this.k[a]||[];this.k[a].push(g)},p:function(a,g){this.k[a]=this.k[a]||[];for(var e=this.k[a].length,k=0;k<e;k++)this.k[a][k](g)}};return h.A=a})();
(function(){function a(a,e){var k=document.createElement("script");k.charset="utf-8";b.e(e,"Function")&&(k.readyState?k.onreadystatechange=function(){if("loaded"===k.readyState||"complete"===k.readyState)k.onreadystatechange=q,e()}:k.onload=function(){e()});k.src=a;var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(k,n)}var b=mt.lang;return h.load=a})();
(function(){function a(){return function(){h.b.a.nv=0;h.b.a.st=4;h.b.a.et=3;h.b.a.ep=h.z.ba()+","+h.z.$();h.b.h()}}function b(){clearTimeout(x);var a;w&&(a="visible"==document[w]);y&&(a=!document[y]);f="undefined"==typeof a?p:a;if((!m||!d)&&f&&l)u=p,s=+new Date;else if(m&&d&&(!f||!l))u=r,t+=+new Date-s;m=f;d=l;x=setTimeout(b,100)}function g(d){var a=document,l="";if(d in a)l=d;else for(var s=["webkit","ms","moz","o"],f=0;f<s.length;f++){var b=s[f]+d.charAt(0).toUpperCase()+d.slice(1);if(b in a){l=
b;break}}return l}function e(d){if(!("focus"==d.type||"blur"==d.type)||!(d.target&&d.target!=window))l="focus"==d.type||"focusin"==d.type?p:r,b()}var k=mt.event,n=h.A,m=p,f=p,d=p,l=p,v=+new Date,s=v,t=0,u=p,w=g("visibilityState"),y=g("hidden"),x;b();(function(){var d=w.replace(/[vV]isibilityState/,"visibilitychange");k.d(document,d,b);k.d(window,"pageshow",b);k.d(window,"pagehide",b);"object"==typeof document.onfocusin?(k.d(document,"focusin",e),k.d(document,"focusout",e)):(k.d(window,"focus",e),
k.d(window,"blur",e))})();h.z={ba:function(){return+new Date-v},$:function(){return u?+new Date-s+t:t}};n.d("pv-b",function(){k.d(window,"unload",a())});return h.z})();
(function(){function a(d){for(var l in d)if({}.hasOwnProperty.call(d,l)){var f=d[l];e.e(f,"Object")||e.e(f,"Array")?a(f):d[l]=String(f)}}function b(d){return d.replace?d.replace(/'/g,"'0").replace(/\*/g,"'1").replace(/!/g,"'2"):d}var g=mt.I,e=mt.lang,k=mt.l,n=h.K,m=h.A,f={N:q,n:[],t:0,O:r,init:function(){f.c=0;f.N={push:function(){f.G.apply(f,arguments)}};m.d("pv-b",function(){f.X();f.Y()});m.d("pv-d",f.Z);m.d("stag-b",function(){h.b.a.api=f.c||f.t?f.c+"_"+f.t:""});m.d("stag-d",function(){h.b.a.api=
0;f.c=0;f.t=0})},X:function(){var d=window._hmt;if(d&&d.length)for(var a=0;a<d.length;a++){var b=d[a];switch(b[0]){case "_setAccount":1<b.length&&/^[0-9a-z]{32}$/.test(b[1])&&(f.c|=1,window._bdhm_account=b[1]);break;case "_setAutoPageview":if(1<b.length&&(b=b[1],r===b||p===b))f.c|=2,window._bdhm_autoPageview=b}}},Y:function(){if("undefined"===typeof window._bdhm_account||window._bdhm_account===c.id){window._bdhm_account=c.id;var d=window._hmt;if(d&&d.length)for(var a=0,b=d.length;a<b;a++)e.e(d[a],
"Array")&&"_trackEvent"!==d[a][0]&&"_trackRTEvent"!==d[a][0]?f.G(d[a]):f.n.push(d[a]);window._hmt=f.N}},Z:function(){if(0<f.n.length)for(var d=0,a=f.n.length;d<a;d++)f.G(f.n[d]);f.n=q},G:function(a){if(e.e(a,"Array")){var b=a[0];if(f.hasOwnProperty(b)&&e.e(f[b],"Function"))f[b](a)}},_trackPageview:function(a){if(1<a.length&&a[1].charAt&&"/"==a[1].charAt(0)){f.c|=4;h.b.a.et=0;h.b.a.ep="";h.b.D?(h.b.a.nv=0,h.b.a.st=4):h.b.D=p;var b=h.b.a.u,e=h.b.a.su;h.b.a.u=n.protocol+"//"+document.location.host+a[1];
f.O||(h.b.a.su=document.location.href);h.b.h();h.b.a.u=b;h.b.a.su=e}},_trackEvent:function(a){2<a.length&&(f.c|=8,h.b.a.nv=0,h.b.a.st=4,h.b.a.et=4,h.b.a.ep=b(a[1])+"*"+b(a[2])+(a[3]?"*"+b(a[3]):"")+(a[4]?"*"+b(a[4]):""),h.b.h())},_setCustomVar:function(a){if(!(4>a.length)){var l=a[1],e=a[4]||3;if(0<l&&6>l&&0<e&&4>e){f.t++;for(var s=(h.b.a.cv||"*").split("!"),t=s.length;t<l-1;t++)s.push("*");s[l-1]=e+"*"+b(a[2])+"*"+b(a[3]);h.b.a.cv=s.join("!");a=h.b.a.cv.replace(/[^1](\*[^!]*){2}/g,"*").replace(/((^|!)\*)+$/g,
"");""!==a?h.b.setData("Hm_cv_"+c.id,encodeURIComponent(a),c.age):h.b.la("Hm_cv_"+c.id)}}},_setReferrerOverride:function(a){1<a.length&&(h.b.a.su=a[1].charAt&&"/"==a[1].charAt(0)?n.protocol+"//"+window.location.host+a[1]:a[1],f.O=p)},_trackOrder:function(d){d=d[1];e.e(d,"Object")&&(a(d),f.c|=16,h.b.a.nv=0,h.b.a.st=4,h.b.a.et=94,h.b.a.ep=k.stringify(d),h.b.h())},_trackMobConv:function(a){if(a={webim:1,tel:2,map:3,sms:4,callback:5,share:6}[a[1]])f.c|=32,h.b.a.et=93,h.b.a.ep=a,h.b.h()},_trackRTPageview:function(d){d=
d[1];e.e(d,"Object")&&(a(d),d=k.stringify(d),512>=encodeURIComponent(d).length&&(f.c|=64,h.b.a.rt=d))},_trackRTEvent:function(d){d=d[1];if(e.e(d,"Object")){a(d);d=encodeURIComponent(k.stringify(d));var b=function(a){var d=h.b.a.rt;f.c|=128;h.b.a.et=90;h.b.a.rt=a;h.b.h();h.b.a.rt=d},g=d.length;if(900>=g)b.call(this,d);else for(var g=Math.ceil(g/900),s="block|"+Math.round(Math.random()*n.s).toString(16)+"|"+g+"|",t=[],u=0;u<g;u++)t.push(u),t.push(d.substring(900*u,900*u+900)),b.call(this,s+t.join("|")),
t=[]}},_setUserId:function(a){a=a[1];if(e.e(a,"String")||e.e(a,"Number")){var b=h.b.C(),k="hm-"+h.b.a.v;f.Q=f.Q||Math.round(Math.random()*n.s);g.log("//datax.baidu.com/x.gif?si="+c.id+"&dm="+encodeURIComponent(b)+"&ac="+encodeURIComponent(a)+"&v="+k+"&li="+f.Q+"&rnd="+Math.round(Math.random()*n.s))}}};f.init();h.V=f;return h.V})();
(function(){function a(){"undefined"==typeof window["_bdhm_loaded_"+c.id]&&(window["_bdhm_loaded_"+c.id]=p,this.a={},this.D=r,this.init())}var b=mt.url,g=mt.I,e=mt.J,k=mt.lang,n=mt.cookie,m=mt.i,f=mt.localStorage,d=mt.sessionStorage,l=h.K,v=h.A;a.prototype={F:function(a,d){a="."+a.replace(/:\d+/,"");d="."+d.replace(/:\d+/,"");var b=a.indexOf(d);return-1<b&&b+d.length==a.length},P:function(a,d){a=a.replace(/^https?:\/\//,"");return 0===a.indexOf(d)},q:function(a){for(var d=0;d<c.dm.length;d++)if(-1<
c.dm[d].indexOf("/")){if(this.P(a,c.dm[d]))return p}else{var f=b.M(a);if(f&&this.F(f,c.dm[d]))return p}return r},C:function(){for(var a=document.location.hostname,d=0,b=c.dm.length;d<b;d++)if(this.F(a,c.dm[d]))return c.dm[d].replace(/(:\d+)?[\/\?#].*/,"");return a},L:function(){for(var a=0,d=c.dm.length;a<d;a++){var b=c.dm[a];if(-1<b.indexOf("/")&&this.P(document.location.href,b))return b.replace(/^[^\/]+(\/.*)/,"$1")+"/"}return"/"},ca:function(){if(!document.referrer)return l.j-l.m>c.vdur?1:4;var a=
r;this.q(document.referrer)&&this.q(document.location.href)?a=p:(a=b.M(document.referrer),a=this.F(a||"",document.location.hostname));return a?l.j-l.m>c.vdur?1:4:3},getData:function(a){try{return n.get(a)||d.get(a)||f.get(a)}catch(b){}},setData:function(a,b,l){try{n.set(a,b,{domain:this.C(),path:this.L(),B:l}),l?f.set(a,b,l):d.set(a,b)}catch(e){}},la:function(a){try{n.set(a,"",{domain:this.C(),path:this.L(),B:-1}),d.remove(a),f.remove(a)}catch(b){}},qa:function(){var a,d,b,f,e;l.m=this.getData("Hm_lpvt_"+
c.id)||0;13==l.m.length&&(l.m=Math.round(l.m/1E3));d=this.ca();a=4!=d?1:0;if(b=this.getData("Hm_lvt_"+c.id)){f=b.split(",");for(e=f.length-1;0<=e;e--)13==f[e].length&&(f[e]=""+Math.round(f[e]/1E3));for(;2592E3<l.j-f[0];)f.shift();e=4>f.length?2:3;for(1===a&&f.push(l.j);4<f.length;)f.shift();b=f.join(",");f=f[f.length-1]}else b=l.j,f="",e=1;this.setData("Hm_lvt_"+c.id,b,c.age);this.setData("Hm_lpvt_"+c.id,l.j);b=l.j==this.getData("Hm_lpvt_"+c.id)?"1":"0";if(0===c.nv&&this.q(document.location.href)&&
(""===document.referrer||this.q(document.referrer)))a=0,d=4;this.a.nv=a;this.a.st=d;this.a.cc=b;this.a.lt=f;this.a.lv=e},pa:function(){for(var a=[],d=0,b=l.S.length;d<b;d++){var f=l.S[d],e=this.a[f];"undefined"!=typeof e&&""!==e&&a.push(f+"="+encodeURIComponent(e))}d=this.a.et;this.a.rt&&(0===d?a.push("rt="+encodeURIComponent(this.a.rt)):90===d&&a.push("rt="+this.a.rt));return a.join("&")},ra:function(){this.qa();this.a.si=c.id;this.a.su=document.referrer;this.a.ds=m.ma;this.a.cl=m.colorDepth+"-bit";
this.a.ln=m.language;this.a.ja=m.javaEnabled?1:0;this.a.ck=m.cookieEnabled?1:0;this.a.lo="number"==typeof _bdhm_top?1:0;this.a.fl=e.da();this.a.v="1.0.83";this.a.cv=decodeURIComponent(this.getData("Hm_cv_"+c.id)||"");1==this.a.nv&&(this.a.tt=document.title||"");var a=document.location.href;this.a.cm=b.g(a,l.ga)||"";this.a.cp=b.g(a,l.ha)||"";this.a.cw=b.g(a,l.fa)||"";this.a.ci=b.g(a,l.ea)||"";this.a.cf=b.g(a,l.ia)||""},init:function(){try{this.ra(),0===this.a.nv?this.oa():this.H(".*"),h.b=this,this.W(),
v.p("pv-b"),this.na()}catch(a){var d=[];d.push("si="+c.id);d.push("n="+encodeURIComponent(a.name));d.push("m="+encodeURIComponent(a.message));d.push("r="+encodeURIComponent(document.referrer));g.log(l.protocol+"//"+l.R+"?"+d.join("&"))}},na:function(){function a(){v.p("pv-d")}"undefined"===typeof window._bdhm_autoPageview||window._bdhm_autoPageview===p?(this.D=p,this.a.et=0,this.a.ep="",this.h(a)):a()},h:function(a){var d=this;d.a.rnd=Math.round(Math.random()*l.s);v.p("stag-b");var b=l.protocol+"//"+
l.R+"?"+d.pa();v.p("stag-d");d.T(b);g.log(b,function(b){d.H(b);k.e(a,"Function")&&a.call(d)})},W:function(){var a=document.location.hash.substring(1),d=RegExp(c.id),f=-1<document.referrer.indexOf(l.U)?p:r,e=b.g(a,"jn"),g=/^heatlink$|^select$/.test(e);a&&(d.test(a)&&f&&g)&&(a=document.createElement("script"),a.setAttribute("type","text/javascript"),a.setAttribute("charset","utf-8"),a.setAttribute("src",l.protocol+"//"+c.js+e+".js?"+this.a.rnd),e=document.getElementsByTagName("script")[0],e.parentNode.insertBefore(a,
e))},T:function(a){var b=d.get("Hm_unsent_"+c.id)||"",f=this.a.u?"":"&u="+encodeURIComponent(document.location.href),b=encodeURIComponent(a.replace(/^https?:\/\//,"")+f)+(b?","+b:"");d.set("Hm_unsent_"+c.id,b)},H:function(a){var b=d.get("Hm_unsent_"+c.id)||"";b&&((b=b.replace(RegExp(encodeURIComponent(a.replace(/^https?:\/\//,"")).replace(/([\*\(\)])/g,"\\$1")+"(%26u%3D[^,]*)?,?","g"),"").replace(/,$/,""))?d.set("Hm_unsent_"+c.id,b):d.remove("Hm_unsent_"+c.id))},oa:function(){var a=this,b=d.get("Hm_unsent_"+
c.id);if(b)for(var b=b.split(","),f=function(d){g.log(l.protocol+"//"+decodeURIComponent(d).replace(/^https?:\/\//,""),function(d){a.H(d)})},e=0,k=b.length;e<k;e++)f(b[e])}};return new a})();
(function(){var a=mt.o,b=mt.event,g=mt.url,e=mt.l;try{if(window.performance&&performance.timing){var k=+new Date,n=function(a){var d=performance.timing,b=d[a+"Start"]?d[a+"Start"]:0;a=d[a+"End"]?d[a+"End"]:0;return{start:b,end:a,value:0<a-b?a-b:0}},m=q;a.ka(function(){m=+new Date});var f=function(){var a,d,b;b=n("navigation");d=n("request");b={netAll:d.start-b.start,netDns:n("domainLookup").value,netTcp:n("connect").value,srv:n("response").start-d.start,dom:performance.timing.domInteractive-performance.timing.fetchStart,
loadEvent:n("loadEvent").end-b.start};a=document.referrer;var f=q;d=q;if("www.baidu.com"===(a.match(/^(http[s]?:\/\/)?([^\/]+)(.*)/)||[])[2])f=g.g(a,"qid"),d=g.g(a,"click_t");a=f;b.qid=a!=q?a:"";d!=q?(b.bdDom=m?m-d:0,b.bdRun=k-d):(b.bdDom=0,b.bdRun=0);h.b.a.et=87;h.b.a.ep=e.stringify(b);h.b.h()};b.d(window,"load",function(){setTimeout(f,500)})}}catch(d){}})();
(function(){if("378f3aa9b8779062c8de4dc247dd8874"===c.id){var a=function(a){if(a.item){for(var d=a.length,b=Array(d);d--;)b[d]=a[d];return b}return[].slice.call(a)},b={click:function(){for(var b=[],d=a(document.getElementsByTagName("a")),d=[].concat.apply(d,a(document.getElementsByTagName("area"))),e=/openZoosUrl\(/,g=0,k=d.length;g<k;g++)e.test(d[g].getAttribute("onclick"))&&b.push(d[g]);return b}},g=function(a,b){for(var e in a)if(a.hasOwnProperty(e)&&b.call(a,e,a[e])===r)return r},e=function(a,
b){return Object.prototype.toString.call(a)==="[object "+b+"]"};window._hmt=window._hmt||[];var k,n="/zoosnet"+(/\/$/.test("/zoosnet")?"":"/"),m=function(a,b){if(k===b){window._hmt.push(["_trackPageview",n+a]);for(var g=+new Date;500>=+new Date-g;);return r}if(e(b,"Array")||e(b,"NodeList"))for(var g=0,m=b.length;g<m;g++)if(k===b[g]){window._hmt.push(["_trackPageview",n+a+"/"+(g+1)]);for(g=+new Date;500>=+new Date-g;);return r}};(function(a,b,e){a.addEventListener?a.addEventListener(b,e,p):a.attachEvent&&
a.attachEvent("on"+b,e)})(document,"click",function(a){a=a||window.event;k=a.target||a.srcElement;var d={};for(g(b,function(a,b){d[a]=e(b,"Function")?b():document.getElementById(b)});k&&k!==document&&g(d,m)!==r;)k=k.parentNode})}})();})();
