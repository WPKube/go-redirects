jQuery(function($) {

	$('body').on('copy', '.gr-copy', function(ev) {
		ev.preventDefault();
		ev.clipboardData.clearData();
		ev.clipboardData.setData('text/plain', $(this).data('zclip-text'));
	});

});
