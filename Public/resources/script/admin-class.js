var search = '';
var year = -1;

function SetBtnStatus(id, status){
	status.bool = !status.bool;
	$('#' + id).attr('disabled', status.bool);

	if(status.bool) {
		$('#' + id).text('正在提交');
	} else {
		$('#' + id).text(status.backstr);
	}
}

$(function(){
	$('#sb-class').addClass('active');
	Reload();

    // 添加班级按钮 事件响应
    $('#btn-add-submit').click(function(){
    	var attendandate = $('#slt-attendandate').children('option:selected').val();

    	if(attendandate == -1){
    		alert('请选择一个入学年份');
    		return;
    	}

    	SetBtnStatus('btn-add-submit', {
    		bool: false
    	});
    	$('#fm-addclass').ajaxSubmit({
    		success: function(data){
    			var obj = JSON.parse(data);
				SetBtnStatus('btn-add-submit', {
					bool: true,
					backstr: '提交'
				});
    			if(obj['status']){
    				msg(obj['info']);
    				Load(1);
    			}else{
    				alert(obj['info']);
    			}
    		}
    	});
    });

    // 刷新按钮
    $('#cls-reload').click(function(){
    	Reload();
    });

    $('#slt-year').change(function(){
    	year = $(this).children('option:selected').val();
    	Reload();
    });

    // 搜索按钮
    $('#btn-search').click(function(){
    	search = $('#ipt-search').val();
    	page = 1;
    	Reload();
    });

    // 修改按钮
    $('#btn-change-submit').click(function(){
    	SetBtnStatus('btn-change-submit', {
    		bool: false
    	});
    	$('#fm-cgclass').ajaxSubmit({
    		success: function(data){
				SetBtnStatus('btn-change-submit', {
					bool: true,
					backstr: '提交'
				});
    			if(parseJn(data)){
    				Reload();
    			}
    		}
    	});
    });
});

function Reload(){
	// 设置表单幕布
	$('#class-list-cover').height($('#class-table').height());
	$('#class-list-cover').width($('#class-table').width());
	$('#class-list-cover').fadeIn(200);
	$('#class-list-cover>div').css('margin-top','-'+($('#class-list-cover>div').height()/2) + 'px');
	$('#class-list-cover>div').css('margin-left','-'+($('#class-list-cover>div').width()/2) + 'px');
	$('#cls-reload').children().addClass('icon-spin');

	setTimeout(function(){
		var strload = '/index.php/Admin/Class/lists.html?page=' + page;
		if(search != ''){
			strload = '/index.php/Admin/Class/lists.html?page=' + page + '&search=' + search;
		}
		strload = strload + '&year=' + year;

		$('#class-list').load(strload,function(){
			$('#class-list-cover').height($('#class-table').height());
			$('#class-list-cover').width($('#class-table').width());
			$('#class-list-cover>div').css('margin-top','-'+($('#class-list-cover>div').height()/2) + 'px');
			$('#class-list-cover>div').css('margin-left','-'+($('#class-list-cover>div').width()/2) + 'px');
			$('#cls-reload').children().removeClass('icon-spin');
			$('#class-list-cover').fadeOut(200);
		});
	},0);
}

function Load(setpage){
	$('.pagination>li').removeClass('active');
	page = setpage;
	Reload();
}

function setRecords(num){
	$('#records').text(num);
}

function showDeleteModal(id){
	$('#deleteModal').modal('show');

	$('#btn-delete').one('click',function(){
		SetBtnStatus('btn-delete', {
			bool: false
		});
		$.ajax({
			url:'/index.php/Admin/Api/ClassDelete',
			type:'POST',
			data:{
				'id':id
			},
			success:function(data){
				SetBtnStatus('btn-delete', {
					bool: true,
					backstr: '确认'
				});
				if(parseJn(data)){
					Reload();
				}
			}
		});
	});
}

function showChangeModal(id,sender){
	$('#changeModal').modal('show');

	$('#ipt-cg-id').val(id);
	$('#ipt-cg-classname').val($(sender).attr('classname'));
	$('#ipt-cg-headmaster').val($(sender).attr('headmaster'));
	$('#slt-cg-attendandate').children('option[value='+ $(sender).attr('attendan') +']').attr('selected','selected');
}