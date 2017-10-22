jQuery(document).ready(function($) {
	$('.libreria').click(function() {
		var id = $(this).data('id');
		location.href = "../infoLibreria/?id="+id;
	});
});