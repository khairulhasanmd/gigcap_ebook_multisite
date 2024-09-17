<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <title>{{ $concept->concept_name }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ======== Page title ============ -->
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="{{ asset($asset) }}/img/favicon.png">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{ asset($asset) }}/css/bootstrap.min.css">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{ asset($asset) }}/css/all.min.css">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{ asset($asset) }}/css/animate.css">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="{{ asset($asset) }}/css/magnific-popup.css">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{ asset($asset) }}/css/meanmenu.css">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="{{ asset($asset) }}/css/swiper-bundle.min.css">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="{{ asset($asset) }}/css/nice-select.css">
    <!--<< Icomoon.css >>-->
    <link rel="stylesheet" href="{{ asset($asset) }}/css/icomoon.css">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset($asset) }}/css/main.css">
    <link rel="stylesheet" href="{{ asset($asset) }}/css/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('extra-css')
</head>

<body>
    <!-- Cursor follower -->
    <div class="cursor-follower" style="top: 540px; left: 1212px;"></div>

    <!-- Back To Top start -->
    <button id="back-top" class="back-to-top show">
        <i class="bi bi-chevron-up"></i>
    </button>

    @include($template.'partials.navigation')
    @yield('content')
    @include($template.'partials.footer')

    <!--<< All JS Plugins >>-->
    <script src="{{ asset($asset) }}/js/jquery-3.7.1.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="{{ asset($asset) }}/js/viewport.jquery.js"></script>
    <!--<< Bootstrap Js >>-->
    <script src="{{ asset($asset) }}/js/bootstrap.bundle.min.js"></script>
    <!--<< Nice Select Js >>-->
    <script src="{{ asset($asset) }}/js/jquery.nice-select.min.js"></script>
    <!--<< Waypoints Js >>-->
    <script src="{{ asset($asset) }}/js/jquery.waypoints.js"></script>
    <!--<< Counterup Js >>-->
    <script src="{{ asset($asset) }}/js/jquery.counterup.min.js"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="{{ asset($asset) }}/js/swiper-bundle.min.js"></script>
    <!--<< MeanMenu Js >>-->
    <script src="{{ asset($asset) }}/js/jquery.meanmenu.min.js"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="{{ asset($asset) }}/js/jquery.magnific-popup.min.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="{{ asset($asset) }}/js/wow.min.js"></script>
    <!-- Gsap -->
    <script src="{{ asset($asset) }}/js/gsap.min.js"></script>
    <!--<< Main.js >>-->
    <script src="{{ asset($asset) }}/js/main.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF6C1I6kKmdZrQ+kOK2eYV2Qm+6D/Zgjv4SMDcC2Axe" crossorigin="anonymous"></script>

    <script type="text/javascript">
        @if ($errors->any())
            Swal.fire({title:"Ooops", html: "@php echo implode("<br>", $errors->all()) @endphp" , type: "error"});
        @endif
        @if(session('success'))
            Swal.fire({title:"@lang('All good')", html: "@php echo session('success') @endphp" , type: "success"});
        @endif
    </script>

    <!-- begin olark code -->
    <script type="text/javascript" async> ;(function(o,l,a,r,k,y){if(o.olark)return; r="script";y=l.createElement(r);r=l.getElementsByTagName(r)[0]; y.async=1;y.src="//"+a;r.parentNode.insertBefore(y,r); y=o.olark=function(){k.s.push(arguments);k.t.push(+new Date)}; y.extend=function(i,j){y("extend",i,j)}; y.identify=function(i){y("identify",k.i=i)}; y.configure=function(i,j){y("configure",i,j);k.c[i]=j}; k=y._={s:[],t:[+new Date],c:{},l:a}; })(window,document,"static.olark.com/jsclient/loader.js");
        /* custom configuration goes here (www.olark.com/documentation) */
        olark.identify('8345-220-10-3000');</script>
    <!-- end olark code -->
    @stack('extra-js')
</body>
</html>
