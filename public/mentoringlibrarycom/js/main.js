

(function ($) {
    "use strict";

    $(document).ready(function () {

        // 01.Mobile Menu  
        $('#mobile-menu').meanmenu({
            meanMenuContainer: '.mobile-menu',
            meanScreenWidth: "1199",
            meanExpand: ['<i class="far fa-plus"></i>'],
        });

        // 02.Sidebar Toggle 
        $(".offcanvas__close,.offcanvas__overlay").on("click", function () {
            $(".offcanvas__info").removeClass("info-open");
            $(".offcanvas__overlay").removeClass("overlay-open");
        });
        $(".sidebar__toggle").on("click", function () {
            $(".offcanvas__info").addClass("info-open");
            $(".offcanvas__overlay").addClass("overlay-open");
        });

        // 03.Body Overlay 
        $(".body-overlay").on("click", function () {
            $(".offcanvas__area").removeClass("offcanvas-opened");
            $(".df-search-area").removeClass("opened");;
            $(".body-overlay").removeClass("opened");
        });


        $(window).on('scroll', function () {
            const mainHeaderHeight = $('.header-main').outerHeight();

            if ($(window).scrollTop() > mainHeaderHeight) {
                $('.sticky-header').css('transform', 'translateY(0)');
            } else {
                $('.sticky-header').css('transform', 'translateY(-180%)');
            }
        });

        // 04.Video Popup 
        $(".img-popup").magnificPopup({
            type: "image",
            gallery: {
                enabled: true,
            },
        });

        $('.video-popup').magnificPopup({
            type: 'iframe',
            callbacks: {
            }
        });

        // 05. Counterup 
        $(".count").counterUp({
            delay: 15,
            time: 4000,
        });

        // 06.Wow Animation 
        new WOW().init();

        // 07.Nice Select 
        $('select').niceSelect();

        //  08.Book Slider 
        if ($('.hero-book-slider').length > 0) {
            const heroBookSlider = new Swiper(".hero-book-slider", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,

                navigation: {
                    nextEl: ".array-prev",
                    prevEl: ".array-next",
                },
            });
        }

        if ($('.book-slider').length > 0) {
            const bookSlider = new Swiper(".book-slider", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    1499: {
                        slidesPerView: 5,
                    },
                    1399: {
                        slidesPerView: 4,
                    },
                    1199: {
                        slidesPerView: 3,
                    },
                    991: {
                        slidesPerView: 3,
                    },
                    767: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

        if ($('.featured-books-slider').length > 0) {
            const featuredBookSlider = new Swiper(".featured-books-slider", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                centeredSlides: true,
                breakpoints: {
                    1499: {
                        slidesPerView: 2,
                    },
                    1399: {
                        slidesPerView: 2,
                    },
                    1199: {
                        slidesPerView: 1,
                    },
                    991: {
                        slidesPerView: 1,
                    },
                    767: {
                        slidesPerView: 1,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        }

        if ($('.book-catagories-slider').length > 0) {
            const bookCatagoriesSlider = new Swiper(".book-catagories-slider", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                navigation: {
                    nextEl: ".array-prev",
                    prevEl: ".array-next",
                },
                breakpoints: {
                    1399: {
                        slidesPerView: 5,
                    },
                    1199: {
                        slidesPerView: 4,
                    },
                    991: {
                        slidesPerView: 3,
                    },
                    767: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

        //  09.Testimonial Slider  
        if ($('.testimonial-slider').length > 0) {
            const testimonialSlider = new Swiper(".testimonial-slider", {
                centeredSlides: true,
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    1399: {
                        slidesPerView: 3,
                    },
                    1199: {
                        slidesPerView: 2,
                        centeredSlides: false,
                    },
                    991: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

        //  10.Team Slider  
        if ($('.team-slider').length > 0) {
            const teamSlider = new Swiper(".team-slider", {
                spaceBetween: 30,
                speed: 2500,
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".array-prev",
                    prevEl: ".array-next",
                },
                breakpoints: {
                    1399: {
                        slidesPerView: 6,
                    },
                    1199: {
                        slidesPerView: 4,
                    },
                    991: {
                        slidesPerView: 3,
                    },
                    767: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

        // 11.Range sliger
        function getVals() {
            let parent = this.parentNode;
            let slides = parent.getElementsByTagName("input");
            let slide1 = parseFloat(slides[0].value);
            let slide2 = parseFloat(slides[1].value);
            if (slide1 > slide2) {
                let tmp = slide2;
                slide2 = slide1;
                slide1 = tmp;
            }

            let displayElement = parent.getElementsByClassName("rangeValues")[0];
            displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
        }

        window.onload = function () {
            let sliderSections = document.getElementsByClassName("range-slider");
            for (let x = 0; x < sliderSections.length; x++) {
                let sliders = sliderSections[x].getElementsByTagName("input");
                for (let y = 0; y < sliders.length; y++) {
                    if (sliders[y].type === "range") {
                        sliders[y].oninput = getVals;
                        sliders[y].oninput();
                    }
                }
            }
        }

        progressBar: () => {
            const pline = document.querySelectorAll(".progressbar.line");
            const pcircle = document.querySelectorAll(".progressbar.semi-circle");
            pline.forEach(e => {
                const line = new ProgressBar.Line(e, {
                    strokeWidth: 6,
                    trailWidth: 6,
                    duration: 3000,
                    easing: 'easeInOut',
                    text: {
                        style: {
                            color: 'inherit',
                            position: 'absolute',
                            right: '0',
                            top: '-30px',
                            padding: 0,
                            margin: 0,
                            transform: null
                        },
                        autoStyleContainer: false
                    },
                    step: (state, line) => {
                        line.setText(Math.round(line.value() * 100) + ' %');
                    }
                });
                let value = e.getAttribute('data-value') / 100;
                new Waypoint({
                    element: e,
                    handler: function () {
                        line.animate(value);
                    },
                    offset: 'bottom-in-view',
                })
            });
            pcircle.forEach(e => {
                const circle = new ProgressBar.SemiCircle(e, {
                    strokeWidth: 6,
                    trailWidth: 6,
                    duration: 2000,
                    easing: 'easeInOut',
                    step: (state, circle) => {
                        circle.setText(Math.round(circle.value() * 100));
                    }
                });
                let value = e.getAttribute('data-value') / 100;
                new Waypoint({
                    element: e,
                    handler: function () {
                        circle.animate(value);
                    },
                    offset: 'bottom-in-view',
                })
            });
        }

        const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input input"),
            range = document.querySelector(".slider .progress");
        let priceGap = 1000;

        priceInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minPrice = parseInt(priceInput[0].value),
                    maxPrice = parseInt(priceInput[1].value);

                if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
                    if (e.target.className === "input-min") {
                        rangeInput[0].value = minPrice;
                        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
                    } else {
                        rangeInput[1].value = maxPrice;
                        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                    }
                }
            });
        });

        rangeInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);

                if (maxVal - minVal < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap;
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });

        //12. Quantity 
        const inputs = document.querySelectorAll('#qty, #qty2, #qty3');
        const btnminus = document.querySelectorAll('.qtyminus');
        const btnplus = document.querySelectorAll('.qtyplus');

        if (inputs.length > 0 && btnminus.length > 0 && btnplus.length > 0) {

            inputs.forEach(function (input, index) {
                const min = Number(input.getAttribute('min'));
                const max = Number(input.getAttribute('max'));
                const step = Number(input.getAttribute('step'));

                function qtyminus(e) {
                    const current = Number(input.value);
                    const newval = (current - step);
                    if (newval < min) {
                        newval = min;
                    } else if (newval > max) {
                        newval = max;
                    }
                    input.value = Number(newval);
                    e.preventDefault();
                }

                function qtyplus(e) {
                    const current = Number(input.value);
                    const newval = (current + step);
                    if (newval > max) newval = max;
                    input.value = Number(newval);
                    e.preventDefault();
                }

                btnminus[index].addEventListener('click', qtyminus);
                btnplus[index].addEventListener('click', qtyplus);
            });
        }

        // 13.Back to top btn    
        $(window).scroll(function () {
            if ($(this).scrollTop() > 20) {
                $("#back-top").addClass("show");
            } else {
                $("#back-top").removeClass("show");
            }
        });
        $("#back-top").click(function () {
            $("html, body").animate({ scrollTop: 0 }, 800);
            return false;
        });

        // 14.Category-click
        $(".bd-category__click").click(function () {
            $(this).siblings(".category__items, .category__items-2, .category__items-3, .category__items-4").slideToggle();
            $(this).toggleClass("items-open");
        });

        //  15.Gsap Animation 
        if ($('.cursor-follower').length > 0) {
            var follower = $(".cursor-follower");

            var posX = 0,
                posY = 0;

            var mouseX = 0,
                mouseY = 0;

            TweenMax.to({}, 0.016, {
                repeat: -1,
                onRepeat: function () {
                    posX += (mouseX - posX) / 9;
                    posY += (mouseY - posY) / 9;

                    TweenMax.set(follower, {
                        css: {
                            left: posX - 12,
                            top: posY - 12
                        }
                    });
                }
            });

            $(document).on("mousemove", function (e) {
                mouseX = e.clientX;
                mouseY = e.clientY;
            });
        }

    }); // End Document Ready Function



    function loader() {
        $(window).on('load', function () {
            // Animate loader off screen
            $(".preloader").addClass('loaded');
            $(".preloader").delay(600).fadeOut();
        });
    }

    loader();


    	//* Navbar Fixed
	function navbarFixed() {
		if ($('#header').length) {
			$(window).scroll(function () {
				var scroll = $(window).scrollTop();
				if (scroll) {
					$('#header').addClass('navbar_fixed');
				} else {
					$('#header').removeClass('navbar_fixed');
				}
			});
		}
	}
	navbarFixed();

    	//* Navbar Fixed
	function navbarFixedTwo() {
		if ($('.sticky_nav').length) {
			$(window).scroll(function () {
				var scroll = $(window).scrollTop();
				if (scroll) {
					$('.sticky_nav').addClass('navbar_fixed');
				} else {
					$('.sticky_nav').removeClass('navbar_fixed');
				}
			});
		}
	}
	navbarFixedTwo();

    $(document).ready(function () {
        $('.navbar-toggler').click(function () {
            $('#navbarSupportedContent').toggleClass('show');
            // Toggle aria-expanded attribute
            var isExpanded = $(this).attr('aria-expanded') === 'true';
            $(this).attr('aria-expanded', !isExpanded);
        });
    });

})(jQuery); // End jQuery


document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.querySelector('.navbar-toggler');
    const menu = document.querySelector('#navbarSupportedContent');

    toggleButton.addEventListener('click', function () {
        // Toggle class for showing and hiding the menu
        menu.classList.toggle('show');

        // Optionally toggle aria-expanded attribute
        const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true';
        toggleButton.setAttribute('aria-expanded', !isExpanded);
    });
});







