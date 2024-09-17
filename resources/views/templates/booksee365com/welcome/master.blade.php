<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('templates.booksee365com.layouts.meta')
        @include('templates.booksee365com.layouts.favicon')
        @include('templates.booksee365com.welcome.styles')
        @include('templates.booksee365com.layouts.head-scripts')
    </head>

    <body>
        @yield('main')

        @include('templates.booksee365com.welcome.scripts')

        <script type="text/javascript">
            @if ($errors->any())
                Swal.fire({title:"Ooops", html: "@php echo implode("<br>", $errors->all()) @endphp" , type: "error"});
            @endif
            @if(session('success'))
                Swal.fire({title:"@lang('All good')", html: "@php echo session('success') @endphp" , type: "success"});
            @endif
        </script>
        <script type="text/javascript">
            // $('.js-toggle').click(function() {
            //     $('.navbar-collapse').toggleClass('is-hidden is-visible');
            //     $('.navbar-toggle ').toggleClass('is-closed is-shown');
            //     $('body').toggleClass('disable-scroll')
            // });

            // $(".js-loginModal").animatedModal({
			// 	modalTarget: 'loginModal',
            //     animatedIn:'zoomIn',
            //     animatedOut:'bounceOut',
            //     color:'#fff',
            // });
            // $(".js-changePasswordModal").animatedModal({
			// 	modalTarget: 'changePassword',
            //     animatedIn:'zoomIn',
            //     animatedOut:'bounceOut',
            //     color:'#fff',
            // });

            // $('.slider-for').slick({
            //     slidesToShow: 1,
            //     slidesToScroll: 1,
            //     arrows: false,
            //     fade: true,
            //     asNavFor: '.slider-nav'
            // });
            // $('.slider-nav').slick({
            //     slidesToShow: 4,
            //     slidesToScroll: 1,
            //     asNavFor: '.slider-for',
            //     dots: false,
            //     centerMode: false,
            //     focusOnSelect: true,
            //     responsive: [
            //     {
            //         breakpoint: 768,
            //         settings: {
            //             slidesToShow: 1,
            //             slidesToScroll: 1,
            //             infinite: true,
            //             dots: true,
            //             centerMode: true,

            //         }
            //     },
            // ]
            // });
        </script>
<script src="{{ asset('theme/js/getdata.js') }}"></script>
    </body>
</html>
