//Para vista previa de fotos
function readURL(input, previewFoto) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            previewFoto.css({
            	'background': 'url(' + e.target.result + ') no-repeat no-repeat center center',
            	'background-size': '100% 100%'
            });
        }

        reader.readAsDataURL(input.files[0]);
    }
}

jQuery(document).ready(function($) {

	//Cuando quieren cambiar foto de perfil. 
	$('#cambiar-perfil').click(function() {
		$("#input-foto-perfil").click();
	});

	$('#cancelar-perfil').click(function(event) {
		$("#input-foto-perfil").val("");
		let circle = $('#box').find('.circle');
		let original = circle.data('image');
		circle.css({
        	'background': 'url(' + original + ') no-repeat no-repeat center center',
        	'background-size': '100% 100%'
        });

        // Esconder todo otra vez 
        $('#cambiar-perfil').show();
		$("#guardar-perfil").hide();
		$('#cancelar-perfil').hide();
	});

	$('#cancelar-portada').click(function(event) {
		$("#input-foto-portada").val("");
		let original = $('.fotos').data('image');
		$('.fotos').css({
        	'background': 'url(' + original + ') no-repeat no-repeat center center',
        	'background-size': '100% 100%'
        });	

        $('#cambiar-portada').show();
		$("#guardar-portada").hide();
		$('#cancelar-portada').hide();
	});

	//Si se sube una foto de perfil
	$("#input-foto-perfil").change(function() {
		$('#cambiar-perfil').hide();
		$("#guardar-perfil").show();
		$('#cancelar-perfil').show();
		//Vista previa
		readURL(this, $('#box').find('.circle'));
	});

	//Si presiona guardar perfil
	$('#guardar-perfil').click(function() {
		$('#box').find('form').submit(); //Se envia formulario escondido dentro de #box
	});

	//Cuando quieren cambiar foto de portada. 
	$('#cambiar-portada').click(function() {
		$("#input-foto-portada").click();
	});

	$('#cancelar').click(function(event) {
		event.preventDefault();
		$('#table-info').show();
		$('#forma').hide();
	});

	//Si se sube una foto de portada
	$("#input-foto-portada").change(function() {
		$('#cambiar-portada').hide();
		$("#guardar-portada").show();
		$('#cancelar-portada').show();
		//Vista previa
		readURL(this, $('.fotos'));
	});

	//Si presiona guardar portada
	$('#guardar-portada').click(function() {
		$('.fotos').find('form').submit(); //Se envia formulario escondido dentro de .fotos
	});
	
	$(".editar").on('click', function(event) {
		event.preventDefault();
		$(this).closest('table').hide();
		$('#forma').show();
		$('#forma').find('#nombre').focus();
	});

	//Cuando se hace submit en el formulario de la informacion de la libreria.
	$("#form-info").submit(function(event) {
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