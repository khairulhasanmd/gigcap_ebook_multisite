(function($){
    $(document).ready(function(){
        $('.sidebar-toggle-icon').click(function(){
            $('.main-menu').toggleClass('rightt');
            $('.top-line').toggleClass('top-bars');
            $('.middle-line').toggleClass('middle-bars');
            $('.bottom-line').toggleClass('bottom-bars');
            
        });

        // sticky menu
        $(window).scroll(function(){
			var wh = $(this).scrollTop();
			
			if(wh){
				$('.menu-area').addClass('menu-sticky');
			}else{
				$('.menu-area').removeClass('menu-sticky');
			}
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
        // Active menu
        // $('.toggle-item').on('click', 'li .ipp', function(){
        //     $('.toggle-item li .active').removeClass('active');
        //     $(this).addClass('active');
        // });

        // Slider-carousel 
        $('.owl-carousel').owlCarousel({
            loop:true,
            nav:true,
            navText: ['<span>&#8636;</span>', '<span>&#x21c0;</span>'],
            autoplay: true,
            autoplayTimeout: 5000,
            responsive:{
                0:{
                    items:1
                },
                575:{
                    items:2
                },
                767:{
                    items:2
                },
                991:{
                    items:3
                },
                1400:{
                    items:4
                }
            }
        });

        // Counter up 
        $('.countere').counterUp({
            delay: 10,
            time: 1000
        });

        // Contact form submit-btn
        $('.submit-btn input').mouseenter(function(){
                $('.submit-btn label').css('background-color', '#F5BE27');
        });
        $('.submit-btn input').mouseleave(function(){
            $('.submit-btn label').css('background-color', '#000');
        });

        $('.submit-btn label').mouseenter(function(){
                $(this).css('background-color', '#F5BE27');
        });
        $('.submit-btn label').mouseleave(function(){
            $(this).css('background-color', '#000');
        });

        // Mix-it-up 
        var mixer = mixitup('.box-list');
        
    });
})(jQuery)