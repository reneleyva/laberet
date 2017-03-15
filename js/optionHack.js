jQuery(document).ready(function($) {
	var s = $('#search-form').find('#selected').val();
	$('#search-form').find('select option[value="'+s+'"]').attr('selected', 'selected');
});