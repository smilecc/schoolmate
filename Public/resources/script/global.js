function msg(text){
	// 关闭全部模态框
	$('.modal').modal('hide');
	setTimeout(function(){
		$('#msg-text').text(text);
		$('#msgModal').modal('show');
	},500);
}

function parseJn(text){
	var obj = JSON.parse(text);
	msg(obj['info']);
	return obj['status'];
}