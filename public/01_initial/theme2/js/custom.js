(function($){
    $(document).ready(function(){
        $('.sidebar-toggle-icon').click(function(){
            $('.our-navbar').toggleClass('leftt');
            $('.top-line').toggleClass('top-bars');
            $('.middle-line').toggleClass('middle-bars');
            $('.bottom-line').toggleClass('bottom-bars');
            
        });

        // sticky menu
        $(window).scroll(function(){
			var wh = $(this).scrollTop();
			
			if(wh){
				$('.header-area').addClass('menu-sticky');
				$('.our-navbar').addClass('pt-80');
			}else{
				$('.header-area').removeClass('menu-sticky');
                $('.our-navbar').removeClass('pt-80');
			}
		});

        // Single-Slider-carousel 
        $('#course-slider-1').owlCarousel({
            loop:true,
            margin:15,
            nav:true,
            autoplay: true,
            autoplayTimeout: 4000,
            responsive:{
                0:{
                    items:1
                },
                480:{
                    items:2
                },
                576:{
                    items:2
                },
                768:{
                    items:3
                },
                992:{
                    items:4
                },
                1200:{
                    items:5
                },
                1400:{
                    items:6
                }
            }
        });
        $('#course-slider-2').owlCarousel({
            rtl:true,
            loop:true,
            margin:15,
            nav:true,
            autoplay: true,
            autoplayTimeout: 4000,
            responsive:{
                0:{
                    items:1
                },
                480:{
                    items:2
                },
                576:{
                    items:2
                },
                768:{
                    items:3
                },
                992:{
                    items:4
                },
                1200:{
                    items:5
                },
                1400:{
                    items:6
                }
            }
        });

        // Wow js 
        new WOW().init();
        
    });
})(jQuery)