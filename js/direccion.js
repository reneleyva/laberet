jQuery(document).ready(function($) {
	let choosen = $('#delegacion').data('choosen'); 
	$('#delegacion option').each(function(index, el) {
		if (el.value === choosen) {
			console.log(el);
			$(el).attr('selected', true);
		}
	});
});