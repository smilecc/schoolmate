function msg(text){
	// 关闭全部模态框
	$('.modal').modal('hide');
	setTimeout(function(){
		$('#msg-text').html(text);
		$('#msgModal').modal('show');
	},500);
}

function parseJn(text){
	var obj = JSON.parse(text);
	msg(obj['info']);
	return obj['status'];
}

var CAJAX = function(a_url, a_data, a_successFunction){
	$.ajax({
		url:a_url,
		type:'POST',
		data:a_data,
		success:a_successFunction
	});
};