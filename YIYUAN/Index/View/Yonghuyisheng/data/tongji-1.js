var baihe=baihe||{};!function(){baihe['bhtongji']={search:window.location.search,tjUrl:['http://t1.baihe.com','http://t2.baihe.com','http://t3.baihe.com','http://t4.baihe.com','http://t5.baihe.com','http://t6.baihe.com','http://t7.baihe.com','http://t8.baihe.com','http://t9.baihe.com','http://t10.baihe.com'],getRandomVal:function(){return Math.floor(Math.random()*10)},getFullTime:function(){var time=new Date();return''+time.getFullYear()+(time.getMonth()+1>9?'':'0')+(time.getMonth()+1)+(time.getDate()>9?'':'0')+time.getDate()+(time.getHours()>9?'':'0')+time.getHours()+(time.getMinutes()>9?'':'0')+time.getMinutes()+(time.getSeconds()>9?'':'0')+time.getSeconds()},tj_getExpDate:function(days,hours,minutes){var expDate=new Date();if(typeof days=='number'&&typeof hours=='number'&&typeof hours=='number'){expDate.setDate(expDate.getDate()+parseInt(days));expDate.setHours(expDate.getHours()+parseInt(hours));expDate.setMinutes(expDate.getMinutes()+parseInt(minutes));return expDate.toGMTString()}},tj_setCookie:function(name,value,expires,path,domain,secure){document.cookie=name+'='+escape(value)+((expires)?'; expires='+expires:'')+((path)?'; path='+path:'')+((domain)?'; domain='+domain:'')+((secure)?'; secure':'')},tj_getCookie:function(name){var arg=name+'=';var alen=arg.length;var clen=document.cookie.length;var i=0;while(i<clen){var j=i+alen;if(document.cookie.substring(i,j)==arg){var endstr=document.cookie.indexOf(';',j);if(endstr==-1){endstr=document.cookie.length}return unescape(document.cookie.substring(j,endstr))}i=document.cookie.indexOf(' ',i)+1;if(i==0)break}return''},tongji:function(options){var img=new Image();var src='';src=this.tjUrl[this.getRandomVal()]+'?';if(this.tj_getCookie('channel')){src+='channel='+this.tj_getCookie('channel')+'&'}if(this.tj_getCookie('code')){src+='code='+this.tj_getCookie('code')+'&'}if(this.tj_getCookie('accessID')){src+='accessID='+this.tj_getCookie('accessID')}else{this.setDynamicVal(['accessID']);src+='accessID='+this.tj_getCookie('accessID')}if(this.tj_getCookie('userID')||this.tj_getCookie('spmUserID')||this.tj_getCookie('GCUserID')){src+='&userID='+(this.tj_getCookie('userID')||this.tj_getCookie('spmUserID')||this.tj_getCookie('GCUserID'))}for(var opt in options){src+='&'+opt+'='+options[opt]}img.src=src+'&rand='+(new Date()).getTime()},setDynamicVal:function(args){for(var arg in args){if(document.cookie.search(args[arg])<0){this.tj_setCookie(args[arg],this.getFullTime()+Math.floor(Math.random()*1000000),this.tj_getExpDate(3650,0,0),'/','baihe.com')}}},spmGGCodeTongJi:function(args){if(args['spm']){var img2=new Image();img2.src='http://spm.baihe.com/?spm='+args['spm']}if(args['ggCode']){var img1=new Image();img1.src='http://bhtg.baihe.com/stat.html?ggCode='+args['ggCode']}}};if(!baihe.bhtongji.tj_getCookie('accessID')){baihe.bhtongji.setDynamicVal(['accessID'])}if(window.location.search.match(/[\?&]channel=([^&]*)(&|$)/i)&&window.location.search.match(/[\?&]code=([^&]*)(&|$)/i)){baihe.bhtongji.setCookieVal=function(args){for(var arg in args){eval('var reg=/[\\?&]'+args[arg]+'=([^&]*)(&|$)/i;');var argVal=this.search.match(reg)[1];this.tj_setCookie(args[arg],argVal,this.tj_getExpDate(30,0,0),'/','baihe.com')}};baihe.bhtongji.setCookieVal(['channel','code'])}}();