(function($) {

	$('.oxsn_tabs_content').hide();
	$('.oxsn_tabs_content.active').show();

	var clickHandler = ('ontouchstart' in document.documentElement ? 'touchstart' : 'click');

	$('.oxsn_tabs_tab').bind(clickHandler, function() {

		$('.oxsn_tabs_tab').removeClass('active');
		$(this).addClass('active');

		var $paired_id = $(this).attr('data-paired');
		$('.oxsn_tabs_content').removeClass('active').hide();

		$('.oxsn_tabs_content[data-paired="' + $paired_id + '"]').each(function() {

			$(this).addClass('active').fadeIn();

		});

	});

})(jQuery);