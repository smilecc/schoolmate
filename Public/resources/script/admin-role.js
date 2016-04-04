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
						var jobj = JSON.parse(data);
						if(jobj['status']) {
							window.location.reload();
						} else {
							alert('系统错误，请稍后再试');
						}
				});
			}
		});
	});

	$('#slt-classattendan').change(function(){
		var select_attendan = $(this).children('option:selected').val();
		if(select_attendan == -1) {
			$('#slt-classlist').hide();
			$('#slt-userlist').hide();
		} else {
			CAJAX('/index.php/Admin/Api/get_class',{
				attendandate_id: select_attendan
			},function(data){
				var class_obj = JSON.parse(data);
			});
		}
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