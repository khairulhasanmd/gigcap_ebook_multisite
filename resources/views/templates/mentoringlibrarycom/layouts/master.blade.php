<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('templates.mentoringlibrarycom.layouts.meta')
        @include('templates.mentoringlibrarycom.layouts.favicon')
        @include('templates.mentoringlibrarycom.layouts.styles')
        @include('templates.mentoringlibrarycom.layouts.head-scripts')
    </head>

    <body class="body-wrapper">
        @yield('main')

        @include('templates.mentoringlibrarycom.layouts.scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
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

<script src="{{ asset('js/getdata.js') }}"></script>

    </body>
</html>
