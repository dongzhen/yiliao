//查看对应省份的省代理
function chakanSheng(obj,sid){
	$.ajax({
		url:CONTROLLER + '&a=chakanSheng&sid='+sid,
		dataType:'json',
		success:function(JSON){
			if (JSON.status) {
				return true;
			}else{
				alert('查找失败');
			}
		}
	})
}