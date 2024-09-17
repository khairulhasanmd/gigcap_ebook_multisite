<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('member.layouts.meta')
        @include('member.layouts.favicon')
        @include('member.layouts.styles')
        @include('member.layouts.head-scripts')
    </head>

    <body>
        @yield('main')

        @include('member.layouts.scripts')

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
        <!-- begin olark code -->
            <script type="text/javascript" async> ;(function(o,l,a,r,k,y){if(o.olark)return; r="script";y=l.createElement(r);r=l.getElementsByTagName(r)[0]; y.async=1;y.src="//"+a;r.parentNode.insertBefore(y,r); y=o.olark=function(){k.s.push(arguments);k.t.push(+new Date)}; y.extend=function(i,j){y("extend",i,j)}; y.identify=function(i){y("identify",k.i=i)}; y.configure=function(i,j){y("configure",i,j);k.c[i]=j}; k=y._={s:[],t:[+new Date],c:{},l:a}; })(window,document,"static.olark.com/jsclient/loader.js");
            /* custom configuration goes here (www.olark.com/documentation) */
            olark.identify('8345-220-10-3000');</script>
        <!-- end olark code -->
    </body>
</html>
