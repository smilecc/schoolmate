$(function(){
	$('.web-delete').click(function(){
		var roleid = $(this).attr('role');
		var userid = $(this).parent().attr('userid');
		$('#ipt-delete-userid').val(userid);
		$('#ipt-delete-roleid').val(roleid);
		$('#deleteModal').modal('show');
	});

	$('.web-edit').click(function(){
		var userid = $(this).parent().attr('userid');
		$('#usernameEditModal').text($('#web-username-' + userid).text());
		$('#realnameEditModal').text($('#web-realname-' + userid).text());

		$('#editWebModal').modal('show');

		$('#btn-edit-submit').click(function(){
			var roleid = $('#slt-webrole').children('option:selected').val();
			if(roleid == -1){
				alert('请选择一个选项');
			} else {
				CAJAX('/index.php/Admin/Api/op_user_role',{
						user_id: userid,
						role_id: roleid,
						type: 'edit',
						mode: 'ajax'
					},function(data){
						alert(data);
				});
			}
		});
	});
});

// CAJAX(
// 	'/index.php/Admin/Api/op_user_role',
// 	{
// 		user_id: userid,

// 	},
// 	function(data){
// 		alert(data);
// 	}
// );