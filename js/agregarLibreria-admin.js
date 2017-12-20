jQuery(document).ready(function($) {
	$('#agregarLibreria').submit(function(event) {
		event.preventDefault();
		let sizePerfil = $("#fotoPerfil")[0].files[0].size/1024/1024; 
		let sizePortada = $("#fotoPortada")[0].files[0].size/1024/1024; 

		if (sizePerfil > 3 || sizePortada > 3) {
			swal({
				title: 'Archivo supera los 3MB', 
				html: 'Use un servicio para comprimir la imagen como: <a target="_blank" href="http://compressjpeg.com/">http://compressjpeg.com/</a> para reducir el tamaño de la imagen.', 
				type: 'error'});
			return;
		} else {
			this.submit();
		} 
	});
});