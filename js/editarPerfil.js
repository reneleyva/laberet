jQuery(document).ready(function($) {
	$(".editar").on('click', function(event) {
		event.preventDefault();
		$(this).closest('table').hide();
		$('#forma').show();
		$('#forma').find('#nombre').focus();
	});

	$("#guardar").click(function(event) {
		event.preventDefault();
		$(".err-msg").hide();
		var pass1 = $('#pass1').val();
		var pass2 = $('#pass2').val();

		console.log(pass1);
		console.log(pass1);

		if (pass1.length < 5) {
			$("#corta").show();
		} else if (pass1 !== pass2) {
			$("#coiciden").show();
		} else {
			$("form").submit();
		}
	});
});