(function( $ ) {
	
	var disable_post_adjustment_container = function($container) {
		$container.addClass('disabled');
	};

	var enable_post_adjustment_container = function($container) {
		$container.removeClass('disabled');
	};

	$(document).on('change', 'input.wp-notes-widget-post-adjustment-radio', function () {
	  var $post_container = $(this).closest('.wp-notes-widget-admin-third').find('.wp-notes-widget-adjustment-list-container');
	  if ($(this).val() == 'none' && $(this).is(':checked')) {
	  	disable_post_adjustment_container($post_container); 
	  } else {
	  	enable_post_adjustment_container($post_container); 
	  }
	});

	$(document).on('click', '.wp-notes-widget-adjustment-list-container.disabled input[type=checkbox]', function (e) {
		e.preventDefault();
		e.stopPropagation();
		return;
	});
	console.log('test test');
})( jQuery );
