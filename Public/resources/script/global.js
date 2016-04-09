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

var cn_lang = {
				order: [[ 0, 'desc' ]],
				    language: {
					"sProcessing":   "处理中...",
					"sLengthMenu":   "显示 _MENU_ 项结果",
					"sZeroRecords":  "没有匹配结果",
					"sInfo":         "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
					"sInfoEmpty":    "显示第 0 至 0 项结果，共 0 项",
					"sInfoFiltered": "(由 _MAX_ 项结果过滤)",
					"sInfoPostFix":  "",
					"sSearch":       "搜索 ",
					"sUrl":          "",
					"sEmptyTable":     "表中数据为空",
					"sLoadingRecords": "载入中...",
					"sInfoThousands":  ",",
					"oPaginate": {
						"sFirst":    "首页",
						"sPrevious": "上页",
						"sNext":     "下页",
						"sLast":     "末页"
					},
					"oAria": {
						"sSortAscending":  ": 以升序排列此列",
						"sSortDescending": ": 以降序排列此列"
					}
				}
			};