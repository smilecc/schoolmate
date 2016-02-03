var search = '';

$(function(){
    $('#sb-class').addClass('active');
    Reload();
    $('#btn-add-submit').click(function(){
      var attendandate = $('#slt-attendandate').children('option:selected').val();

      if(attendandate == -1){
        alert('请选择一个入学年份');
        return;
      }

      $('#fm-addclass').ajaxSubmit({
            success: function(data){
              var obj = JSON.parse(data);
              if(obj['status']){
                msg(obj['info']);
                Load(1);
              }else{
                alert(obj['info']);
              }
            }
          });
    });

    $('#cls-reload').click(function(){
    	Reload();
    });

    $('#btn-search').click(function(){
    	search = $('#ipt-search').val();
    	page = 1;
    	Reload();
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

		$('#class-list').load(strload,function(){
			$('#class-list-cover').height($('#class-table').height());
			$('#class-list-cover').width($('#class-table').width());
			$('#class-list-cover>div').css('margin-top','-'+($('#class-list-cover>div').height()/2) + 'px');
			$('#class-list-cover>div').css('margin-left','-'+($('#class-list-cover>div').width()/2) + 'px');
    		$('#cls-reload').children().removeClass('icon-spin');
    		$('#class-list-cover').fadeOut(200);
		});
	},1000);
}

function Load(setpage){
	$('.pagination>li').removeClass('active');
	page = setpage;
	Reload();
}

function msg(text){
	// 关闭全部模态框
	$('.modal').modal('hide');
	setTimeout(function(){
		$('#msg-text').text(text);
		$('#msgModal').modal('show');
	},500);
}

function setRecords(num){
	$('#records').text(num);
}