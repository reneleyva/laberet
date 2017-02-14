jQuery(document).ready(function($) {
	$(".editar").on('click', function(event) {
		event.preventDefault();
		$(this).closest('table').hide();
		$('#forma').show();
		$('#forma').find('#nombre').focus();
	});

	$("form").submit(function(event) {
		$(".err-msg").hide();
		var pass1 = $('#pass1').val();
		var pass2 = $('#pass2').val();

		if (pass1.length < 5) {
			$("#corta").show();
			event.preventDefault();
		} else if (pass1 !== pass2) {
			$("#coiciden").show();
			event.preventDefault();
		}
	});
});