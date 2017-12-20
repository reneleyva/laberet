jQuery(document).ready(function($) {
	$('#agregarLibreria').submit(function(event) {
		event.preventDefault();
		let sizePerfil = $("#fotoPerfil")[0].files[0].size/1024/1024; 
		let sizePortada = $("#fotoPortada")[0].files[0].size/1024/1024; 

		if (sizePerfil > 2 || sizePortada > 2) {
			swal({
				title: 'Archivo supera los 2MB', 
				html: 'Use un servicio para comprimir la imagen como: <a target="_blank" href="http://compressjpeg.com/">http://compressjpeg.com/</a> para reducir el tamaño de la imagen.', 
				type: 'error'});
			return;
		} else {
			this.submit();
		} 
	});
});