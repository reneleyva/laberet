jQuery(document).ready(function($) {

	$('#carousel-libros').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    prevArrow: $('#prev-libros'),
    nextArrow: $('#next-libros'),
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 950,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
});

  $('#carousel-librerias').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow: $('#prev-librerias'),
    nextArrow: $('#next-librerias'),
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 950,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
});

	$('#cart').hover(function() {
		$(this).find('img').attr('src', 'img/cart.png');
	}, function() {
		$(this).find('img').attr('src', 'img/grey-cart.png');
	});

	$('#prev').hover(function() {
		$(this).attr('src', 'img/back-black.png');
	}, function() {
		$(this).attr('src', 'img/back-grey.png');
	});

	$('#next').hover(function() {
		$(this).attr('src', 'img/next-black.png');
	}, function() {
		$(this).attr('src', 'img/next-grey.png');
	});
});