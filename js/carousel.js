jQuery(document).ready(function($) {
	$('.carousel').slick({
		infinite: false,
		slidesToShow: 3, 
		slidesToScroll: 3,
		prevArrow: $('#prev'),
		nextArrow: $('#next')
	});

	$('#busqueda').focus(function() {
		$(this).remove();
		$('#keyword').show();
		$('#keyword').focus();
	});

		$(function(){
	      $("#busqueda").typed({
	         strings: ["Buscar aquí...", ""],//["Jorge Luis Borges", "La Guerra y la paz", "Matemáticas", ""],
	    	contentType: 'html' // or 'text'
	      });
	  });
	

});