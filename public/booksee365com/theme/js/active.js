(function($) {
    "use strict";

    $(document).on('ready', function() {

        $(window).on('load', function() {
            // Animate loader off screen
            $(".preloader").delay(500).fadeOut();
        });

        if ($('.carousel-active').length > 0) {
            $('.carousel-active').owlCarousel({
                items: 1,
                dots: false,
                loop: true,
                autoplayTimeout: 8000,
                autoplay: true,
                nav: true,
                navText: ['<i class="fal fa-long-arrow-left"></i>', '<i class="fal fa-long-arrow-right"></i>'],
                navContainer: '.hero-carousel-wrap .hero-carousel-nav',
            });
        }

        if ($('.brand-logo-carousel').length > 0) {
            $('.brand-logo-carousel').owlCarousel({
                items: 4,
                dots: false,
                loop: true,
                autoplayTimeout: 10000,
                autoplay: true,
                nav: false,
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: 1,
                    },

                    480: {
                        items: 2,
                    },

                    // breakpoint from 768 up
                    767: {
                        items: 2,
                    },

                    991: {
                        items: 3
                    },

                    1199: {
                        items: 4
                    },
                }
            });
        }

        if ($('.testimonial-active').length > 0) {
            $('.testimonial-active').owlCarousel({
                items: 1,
                dots: true,
                startPosition: 1,
                autoplayTimeout: 11000,
                autoplay: true,
                nav: false,
            });
        }

        if ($('.barfiller').length > 0) {
            $('.barfiller#p1').barfiller({
                barColor: '#111',
            });
        }
        if ($('.barfiller').length > 0) {
            $('.barfiller#p2').barfiller({
                barColor: '#111',
            });
        }
        if ($('.barfiller').length > 0) {
            $('.barfiller#p3').barfiller({
                barColor: '#111',
            });
        }
        if ($('.barfiller').length > 0) {
            $('.barfiller#p4').barfiller({
                barColor: '#111',
            });
        }

        $('.package-control li').on('click', function() {
            $(".package-control li").removeClass('active');
            $(this).addClass('active');
        });

        /* =============================================
            # Magnific popup init
         ===============================================*/
        $(".popup-link").magnificPopup({
            type: 'image',
            fixedContentPos: false
        });

        $(".popup-gallery").magnificPopup({
            type: 'image',
            fixedContentPos: false,
            gallery: {
                enabled: true
            },
            // other options
        });

        $(".popup-video, .popup-vimeo, .popup-gmaps").magnificPopup({
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        /*==========================
           Scroll To Up Init
        ============================*/
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '1110', // Distance from top before showing element (px)
            topSpeed: 2000, // Speed back to top (ms)
            animation: 'slide', // Fade, slide, none
            animationInSpeed: 300, // Animation in speed (ms)
            animationOutSpeed: 300, // Animation out speed (ms)
            scrollText: '<i class="fal fa-angle-up"></i>', // Text for element
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });

        //# Smooth Scroll
        $('#responsive-menu a').on('click', function(event) {
            var $anchor = $(this);
            var headerH = '85';
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
            }, 1000, 'easeInOutExpo');
            event.preventDefault();
        });

        // Sticky Menu
        $(window).scroll(function() {
            var Width = $(document).width();

            if ($("body").scrollTop() > 100 || $("html").scrollTop() > 100) {
                if (Width > 767) {
                    $("header").addClass("sticky");
                }
            } else {
                $("header").removeClass("sticky");
            }
        });

        $('.container').imagesLoaded(function() {
            $('.portfolio-cat-filter').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });

            var $grid = $('.grid').isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
            });
        });

        var catButton = '.portfolio-cat-filter button';

        $(catButton).on('click', function() {
            $(catButton).removeClass('active');
            $(this).addClass('active');
        });

        $('#hamburger, .side-menu .menu-toggle').on('click', function() {
            $('.mobile-nav').addClass('show');
            $('.overlay').addClass('active');
        });

        $('.close-nav').on('click', function() {
            $('.mobile-nav').removeClass('show');
            $('.overlay').removeClass('active');
        });

        $(".overlay").on("click", function() {
            $(".mobile-nav").removeClass("show");
            $('.overlay').removeClass('active');
        });

        $("#mobile-menu").metisMenu();

        new WOW().init();

        $('.count-digit span').counterUp({
            delay: 15,
            time: 1000,
        });

    }); // end document ready function
})(jQuery); // End jQuery