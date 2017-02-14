jQuery(document).ready(function($) {
	var selection = $('select').data('selected');
	$('option').filter(function(index) {
		return $(this).text() == selection;
	}).attr('selected', 'selected');
});