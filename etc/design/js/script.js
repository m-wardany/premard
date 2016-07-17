
  function myFunction() {
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
	}
$(document).ready(function(){

	 // Display the progress bar calling progressbar.js
	$('.progressbar1').progressBar({
			shadow : true,
			percentage : 90,
			barColor : "#30bae7",
			animation : true,
			speed: 20,
			diameter: 45,
	});

		$('.progressbar2').progressBar({
			shadow : true,
			percentage : 90,
			barColor : "#d74680",
			animation : true,
			speed: 20,
			diameter: 45,
	});

			$('.progressbar3').progressBar({
			shadow : true,
			percentage : 90,
			barColor : "#15c7a8",
			animation : true,
			speed: 20,
			diameter: 45,
	});


	    $('.our-Clients-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        pauseOnHover: false,
        autoplaySpeed: 10000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },


            	 {
                breakpoint: 1190,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },



            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

	$('.arabic-slider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true
});


$('.we-areEpxerts_slider').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },

    {
      breakpoint: 1110,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 2
      }
    },

        {
      breakpoint: 802,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
				



$('.loader').ClassyLoader({
    speed: 20,
    diameter: 45,
    fontSize: '20px',
    width: '200px',
    height: '200px',
    fontFamily: 'Georgia',
    fontColor: '#3c4761',
    lineColor: '#30bae7',
    percentage: 90,
    remainingLineColor: 'rgba(0,0,0,0.1)'
});

$('.loader1').ClassyLoader({
    speed: 20,
    diameter: 45,
    fontSize: '20px',
    fontFamily: 'Georgia',
    fontColor: '#3c4761',
    lineColor: '#15c7a8',
    percentage: 70,
    remainingLineColor: 'rgba(0,0,0,0.1)'
});

$('.loader3').ClassyLoader({
    speed: 20,
    diameter: 45,
    fontSize: '20px',
    fontFamily: 'Georgia',
    fontColor: '#3c4761',
    lineColor: '#eb7d4b',
    percentage: 85,
    remainingLineColor: 'rgba(0,0,0,0.1)'
});



$('.loader2').ClassyLoader({
    speed: 20,
    diameter: 45,
    fontSize: '20px',
    fontFamily: 'Georgia',
    fontColor: '#3c4761',
    lineColor: '#d74680',
    percentage: 75,
    remainingLineColor: 'rgba(0,0,0,0.1)'
});



	$('.one-time').slick({
	  dots: true,
	  infinite: true,
	  speed: 300,
	  slidesToShow: 1,
	 
	
	});

});