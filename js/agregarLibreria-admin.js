jQuery(document).ready(function($) {
	$('#agregarLibreria').submit(function(event) {
		event.preventDefault();
		let portada = $('input[name="fotoPortada"]').val();
		let perfil = $('input[name="fotoPerfil"]').val();

    	if (!portada || !perfil) {
    		alert("La foto aún no termina de subirse, espere unos segundos más");
    		return;
    	} else {
    		this.submit();
    	}
	});
});