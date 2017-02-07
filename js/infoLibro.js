jQuery(document).ready(function($) {
	

	$('.back').click(function() {
		var back = $(this).find('img').attr('src');
		var cover = $('.cover').find('img').attr('src');

		//SWAP
		$('.cover').fadeOut(200, function () {
			$('.cover').find('img').attr('src', back);
            $('.back').find('img').attr('src', cover);
		})
		.fadeIn(200);
			
     
		//alert(back);
	});

	$('.cover').click(function() {
		var title = $('.info').find('.title').text();
		$('.modal').find('#titulo').text(title);
		$('.modal').modal('show');
	});

	$('#carousel-relacionados').slick({
    infinite: true,
    centerMode: true,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 5,
    dots: false,
    prevArrow: $('#prev-relacionados'),
    nextArrow: $('#next-relacionados'),
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
});