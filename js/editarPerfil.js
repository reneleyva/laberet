jQuery(document).ready(function($) {
	$(".editar").on('click', function(event) {
		event.preventDefault();
		$(this).closest('table').hide();
		$('#forma').show();
		$('#forma').find('#nombre').focus();
	});

	$('#cancelar').click(function(event) {
		event.preventDefault();
		$('#preview-info-table').show();
		$('#forma').hide();
	});

	$('#eliminar').click(function() {
		swal({
		  title: '¿Estás seguro?',
		  text: "Se borrarán tus datos de forma permanente",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Sí, Eliminar!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
		  		url: 'eliminarPerfil.php',
		  		type: 'POST',
		  	})
		  	.done(function() {
		  		window.location.replace('../salir');
		  	})
		  	.fail(function() {
		  		alert("Hubo un error en la solicitud, por favor intente más tarde");
		  	})		  	
		  }
		});
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