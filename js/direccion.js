jQuery(document).ready(function($) {
	let choosen = $('#delegacion').data('choosen'); 
	$('#delegacion option').each(function(index, el) {
		if (el.value === choosen) {
			$(el).attr('selected', true);
		}
	});
});