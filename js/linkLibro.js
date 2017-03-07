jQuery(document).ready(function($) {

	$('.libro').click(function(e) {
		e.preventDefault();
		var id = $(this).find('.id').val();
		location.href = "http://localhost/laberet/vis/infoLibro/?id=" + id; 

	});
});
