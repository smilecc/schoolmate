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
		$('#role-div-user').hide();
		$('#role-add-submit-btn').attr('disabled', 'disabled');

		if(select_attendan == -1) {
			$('#role-div-class').hide();
		} else {
			CAJAX('/index.php/Admin/Api/get_class',{
				attendandate_id: select_attendan
			},function(data){
				console.log(data);
				var class_arr = JSON.parse(data);

				if(class_arr.length == 0) {
					$('.role-add').hide();
					$('#info-nullclass').fadeIn(400);
					setTimeout("$('#info-nullclass').fadeOut(300)",2000);
				} else {
					// 加载到数据 清除原有数据
					$('#slt-classlist').html('');
					$('#slt-classlist').append('<option value="-1">请选择...</option>');

					$('#info-nullclass').hide();
					
					for (var i = 0; i < class_arr.length; i++) {
						$('#slt-classlist').append('<option value="' + class_arr[i]['id'] + '">' + class_arr[i]['classname'] + '</option>');
					};
					$('#role-div-class').show();
				}
			});
		}
	});

	$('#slt-classlist').change(function(){
		$('#role-add-submit-btn').attr('disabled', 'disabled');
		var select_class = $(this).children('option:selected').val();
		if (select_class == -1) {
			$('#role-div-user').hide();
		} else {

			CAJAX(
				'/index.php/Admin/Api/get_student',
			{
				class_id: select_class
			},
				function(data){
					var user_arr = JSON.parse(data);

					if(user_arr.length == 0) {
						$('#role-div-user').hide();
						$('#info-nulluser').fadeIn(400);
						setTimeout("$('#info-nulluser').fadeOut(300)",2000);
					} else {
						$('#slt-userlist').html('');
						$('#slt-userlist').append('<option value="-1">请选择...</option>');

						$('#info-nulluser').hide();
						for (var i = 0; i < user_arr.length; i++) {
							$('#slt-userlist').append('<option value="' + user_arr[i]['user_id'] + '">' + user_arr[i]['realname'] + '</option>');
						};
						$('#role-div-user').show();
					}
			});
		}
	});

	$('#slt-userlist').change(function(){
		if($(this).val() != -1) {
			$('#role-add-submit-btn').attr('disabled', false);
		} else {
			$('#role-add-submit-btn').attr('disabled', true);
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