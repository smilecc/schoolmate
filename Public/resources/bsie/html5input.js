$(function(){
	var arr = $('[placeholder]');
	for (var i = arr.length - 1; i >= 0; i--) {
		var content = $(arr[i]).parent().html();
		var placeholder = $(arr[i]).attr('placeholder');
		$(arr[i]).parent().html('<span class="pull-left">' + placeholder + '</span>' + content);
		if ($(arr[i]).attr('pw') == 'true') {
			continue;
		};

		$(arr[i]).val(placeholder);
		$(arr[i]).focus(function(){
			if ($(this).val() == $(this).attr('placeholder')) {
				$(this).val('');

			};
		});

		$(arr[i]).blur(function(){
			if($(this).val() == '') {
				$(this).val($(this).attr('placeholder'));
			}
		});

	};
});