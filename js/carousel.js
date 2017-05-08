jQuery(document).ready(function($) {
	$('.carousel').slick({
		infinite: true,
		slidesToShow: 3, 
		slidesToScroll: 3,
		prevArrow: $('#prev'),
		nextArrow: $('#next'),
		responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 1000,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
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