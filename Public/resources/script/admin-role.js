$(function(){
	$('.web-edit').click(function(){
		var userid = $(this).parent().attr('userid');
		
		$('#editWebModal').modal('show');
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