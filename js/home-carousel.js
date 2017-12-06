jQuery(document).ready(function($) {

	$('#carousel-libros').slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 4,
    slidesToScroll: 3,
    dots: false,
    prevArrow: $('#prev-libros'),
    nextArrow: $('#next-libros'),
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

var initLibreriasCarousel = function() {
  $('#carousel-librerias').slick({
      dots: false,
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
          breakpoint: 1000,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]

  });
}; 

let numLibrerias = $('#carousel-librerias').data('num-librerias');
let windowWidth = $(window).width();

if (numLibrerias > 3) {
    initLibreriasCarousel();
} else if (windowWidth < 970) {
  initLibreriasCarousel();
} else {
  $('#carousel-librerias').addClass('no-carousel');
  $('#prev-librerias').hide();
  $('#next-librerias').hide(); 
}


let initComprasCarousel = function() {
  $('#carousel-compras').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    prevArrow: $('#prev-compras'),
    nextArrow: $('#next-compras'),
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
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
      }
    ]
});
};

let numCompras = $('#carousel-compras').data('num-compras'); 
initComprasCarousel();




$('#carousel-intereses').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 5,
    dots: false,
    prevArrow: $('#prev-intereses'),
    nextArrow: $('#next-intereses'),
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