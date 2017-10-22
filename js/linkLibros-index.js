jQuery(document).ready(function($) {

	$('.libro').click(function(e) {
		e.preventDefault();
		var id = $(this).find('.id').val();
		location.href = "vis/infoLibro/?id=" + id; 

	});
});
