function aplySlick(elem) {
    elem.slick({
      infinite: true,
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 4,
      dots: false,
      prevArrow: $('#prev-relacionados'),
      nextArrow: $('#next-relacionados'),
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
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
};

function carouselRelacionados() {
  var carousel = $('#carousel-relacionados');
  var numLibros = carousel.data('num-libros');
  var width = $( document ).width();
  console.log(numLibros);
  console.log(width);
  if(carousel.hasClass('slick-slider')) {
    carousel.slick('unslick');
  }

  if (numLibros > 5) {
    aplySlick(carousel);
  } else if (width < 1200 && numLibros > 3) {
    // console.log("Adding");
    aplySlick(carousel);
  } else if (width < 1000 && numLibros > 2) {
    // console.log("Adding. width: " + width + " " + "numLibros: " + numLibros);
    aplySlick(carousel);
  } else if (width < 768 && numLibros > 1) {
    // console.log("Adding. width: " + width + " " + "numLibros: " + numLibros);
    aplySlick(carousel);
  } else if (numLibros == 1) {
      carousel.css('width', '100%');
      $('#prev-relacionados').hide();
      $('#next-relacionados').hide();
  } else {
    //No slick for you 
    $('#prev-relacionados').hide();
    $('#next-relacionados').hide();
  }

};

//Para truncate 
function shorten(text, maxLength) {
    var ret = text;
    if (ret.length > maxLength) {
        ret = ret.substr(0,maxLength-3) + "…";
    }
    return ret;
}

jQuery(document).ready(function($) {
	//Tomar el num de lirbos en carousel, el tamaño de pantalla, y las flechas. 
  //Según el numero de libros y el tamaño decidir si aplicar slick. 
  carouselRelacionados();
  $(window).on('resize', function(){
    carouselRelacionados();
  });
 
  $("#add-cart").click(function() {
    var id = $(this).closest('.bookInfo').data('id');
    location.href = "addToCart.php?id="+id;
  });

	$('.back').click(function() {
		var back = $(this).find('img').attr('src');
		var cover = $('.cover').find('img').attr('src');

		//SWAP
		$('.cover').fadeOut(200, function () {
			$('.cover').find('img').attr('src', back);
            $('.back').find('img').attr('src', cover);
		})
		.fadeIn(200);

	});


	$('.cover').click(function() {
		var title = $('.info').find('.title').text();
		$('.modal').find('#titulo').text(title);
		$('.modal').modal('show');
	});

  //Truncate! para libros relacionados con titulos muy largos
  //For each .relacionaodo cambia el book title.
  $(".relacionado").each(function(el) {
        var title =  $(this).find('.book-title').text();
        $(this).find('.book-title').text(shorten(title, 25));

  });

});




	