jQuery(document).ready(function($) {
	$('.carousel').slick({
		infinite: false,
		slidesToShow: 3, 
		slidesToScroll: 3,
		prevArrow: $('#prev'),
		nextArrow: $('#next')
	});


	$(function(){
      $("#busqueda").typed({
         strings: ["Jorge Luis Borges", "La Guerra y la paz", "Matemáticas", ""],
    	contentType: 'html' // or 'text'
      });
  });
	
	$('#busqueda').focus();
});