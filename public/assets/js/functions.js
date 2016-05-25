/**
 * Close messages
 * Message from PHP class helper
 */
$(function() {
	$('.alert-close').click(function() {
		$(this).parent().fadeOut(function() {
			$(this).remove();
		});
	});
});