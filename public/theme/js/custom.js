(function($){
    $(document).ready(function(){
        $('.sidebar-toggle-icon').click(function(){
            $('.main-menu').toggleClass('leftt');
            $('.middle-line').toggleClass('middle-bars');          
            $('.toggle-item li a span').toggle();      
            $('.footer').toggle();
            $('.s-menu').toggleClass('tg-menu');
            $('.work-box').toggleClass('ps-90');
            $('.contact').toggleClass('ps-90');
        });
         
        // popup click 
        $('#user').click(function(){
            
            var isTrue = true;

            if(isTrue){
              $('body').css('overflow', 'hidden');
              $('.popups').css('display', 'block');
            }else{
              $('body').css('overflow', 'auto');
            }

        });
        $('#close').click(function(){
            
            var isTrue = true;

            if(isTrue){
              $('body').css('overflow', 'auto');
              $('.popups').css('display', 'none');
            }else{
              $('body').css('overflow', 'hidden');
            }
        });

        
        
        // night mode and dark mode
        $('#switch').click(function(){
          $('body').toggleClass('light-mode');
          if($('body').hasClass('light-mode')){
            $('#switch').removeClass('fa-sun');
            $('#switch').addClass('fa-moon');
            $(".menu-logo img").attr("src", "theme/images/logo/logo-black.png");
          }else{
            $('#switch').addClass('fa-sun');
            $('#switch').removeClass('fa-moon');
            $(".menu-logo img").attr("src", "theme/images/logo/logo-white.png");
          }
        });
        
        $('body').toggleClass('light-mode');
        $('#switch').removeClass('fa-sun');
        $('#switch').addClass('fa-moon');
        $(".menu-logo img").attr("src", "theme/images/logo/logo-black.png");
        

        // sticky menu
        $(window).scroll(function(){
			var wh = $(this).scrollTop();
			
			if(wh){
				$('.menu-area').addClass('menu-sticky');
			}else{
				$('.menu-area').removeClass('menu-sticky');
			}
		});

        // Active menu
        $('.toggle-item').on('click', 'li .ipp', function(){
            $('.toggle-item li .active').removeClass('active');
            $(this).addClass('active');
        });

        //watch-list-icon
        // $('.carousel-btn .b-ico-1').click(function(){
        //     $(this).toggleClass('favorite');
        // });
        // $('.carousel-btn .b-ico-2').click(function(){
        //     $(this).toggleClass('favorite');
        // });
        // $('.carousel-btn .b-ico-3').click(function(){
        //     $(this).toggleClass('favorite');
        // });
        // $('.carousel-btn .b-ico-4').click(function(){
        //     $(this).toggleClass('favorite');
        // });
        // $('.carousel-btn .b-ico-5').click(function(){
        //     $(this).toggleClass('favorite');
        // });

        // Slick Slider-carousel 
        $('.slick-carousal').slick({
            infinite: true,
            slidesToShow: 7,
            slidesToScroll: 6,
            responsive: [
                {
                  breakpoint: 1400,
                  settings: {
                    slidesToShow: 6,
                    slidesToScroll: 5,
                    infinite: true
                  }
                },
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 5,
                    slidesToScroll: 4,
                    infinite: true
                  }
                },
                {
                    breakpoint: 1050,
                    settings: {
                      slidesToShow: 4,
                      slidesToScroll: 3,
                      infinite: true
                    }
                },
                {
                    breakpoint: 900,
                    settings: {
                      slidesToShow: 3,
                      slidesToScroll: 2,
                      infinite: true
                    }
                },
                {
                    breakpoint: 760,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1,
                      infinite: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      infinite: true
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                      slidesToShow: 3,
                      slidesToScroll: 2,
                      infinite: true
                    }
                },
                {
                    breakpoint: 510,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1,
                      infinite: true
                    }
                },
                {
                    breakpoint: 364,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      infinite: true
                    }
                }
            ]
        });

        // Mix-it-up 
        var mixer = mixitup('.box-list');

    });
})(jQuery)