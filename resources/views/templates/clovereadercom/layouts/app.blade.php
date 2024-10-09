<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Axtra HTML5 Template">

  <link rel="icon" type="image/x-icon" href="{{asset('clovereadercom/') }}/img/fav.png">


  <title>{{ config('clovereadercom.CONCEPT_NAME') }}</title>

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="img/fav.png">
  <!--<< Bootstrap min.css >>-->
  <link rel="stylesheet" href="{{asset('clovereadercom/') }}/css/bootstrap.min.css">
  <!--<< All Min Css >>-->
  <link rel="stylesheet" href="{{asset('clovereadercom/') }}/css/all.min.css">
  <!--<< Animate.css >>-->
  <link rel="stylesheet" href="{{asset('clovereadercom/') }}/css/animate.css">
  <link rel="stylesheet" href="{{asset('clovereadercom/') }}/css/owl.carousel.min.css">
  <!--<< Magnific Popup.css >>-->
  <link rel="stylesheet" href="{{asset('clovereadercom/') }}/css/magnific-popup.css">
  <!--<< MeanMenu.css >>-->
  <link rel="stylesheet" href="{{asset('clovereadercom/') }}/css/meanmenu.css">
  <!--<< Swiper Bundle.css >>-->
  <link rel="stylesheet" href="{{asset('clovereadercom/') }}/css/swiper-bundle.min.css">
  <!--<< Nice Select.css >>-->
  <link rel="stylesheet" href="{{asset('clovereadercom/') }}/css/nice-select.css">
  <!--<< Icomoon.css >>-->
  <link rel="stylesheet" href="{{asset('clovereadercom/') }}/css/icomoon.css">
  <link rel="stylesheet" href="{{asset('clovereadercom/') }}/css/navigation.css">
  <!--<< Main.css >>-->
  <link rel="stylesheet" href="{{asset('clovereadercom/') }}/css/main.css">
  <link rel="stylesheet" href="{{asset('clovereadercom/') }}/css/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    .swal-footer{
      text-align: center !important;
    }
  </style>

</head>
<body>
@include('templates.clovereadercom.partials.navigation')
    @yield('content')

@include('templates.clovereadercom.partials.footer')


  <!--<< All JS Plugins >>-->
 
<!-- Bootstrap Bundle with Popper -->
@yield('script-files')


    <!--<< All JS Plugins >>-->
    <script src="{{asset('clovereadercom/') }}/js/jquery-3.7.1.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="{{asset('clovereadercom/') }}/js/viewport.jquery.js"></script>
    <!--<< Bootstrap Js >>-->
    <script src="{{asset('clovereadercom/') }}/js/bootstrap.bundle.min.js"></script>
    <!--<< Nice Select Js >>-->
    <script src="{{asset('clovereadercom/') }}/js/jquery.nice-select.min.js"></script>
    <!--<< Waypoints Js >>-->
    <script src="{{asset('clovereadercom/') }}/js/jquery.waypoints.js"></script>
    <!--<< Counterup Js >>-->
    <script src="{{asset('clovereadercom/') }}/js/jquery.counterup.min.js"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="{{asset('clovereadercom/') }}/js/swiper-bundle.min.js"></script>
    <!--<< MeanMenu Js >>-->
    <script src="{{asset('clovereadercom/') }}/js/jquery.meanmenu.min.js"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="{{asset('clovereadercom/') }}/js/jquery.magnific-popup.min.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="{{asset('clovereadercom/') }}/js/wow.min.js"></script>
    <script src="{{asset('clovereadercom/') }}/js/owl.carousel.min.js"></script>
    <!-- Gsap -->
    <script src="{{asset('clovereadercom/') }}/js/gsap.min.js"></script>
    <!--<< Main.js >>-->
    <script src="{{asset('clovereadercom/') }}/js/main.js"></script>
  <!-- Bootstrap Bundle with Popper -->





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF6C1I6kKmdZrQ+kOK2eYV2Qm+6D/Zgjv4SMDcC2Axe" crossorigin="anonymous"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    @if ($errors->any())
            swal({
                icon: "error",
                title:"Ooops",
                text: "@php echo implode("<br>", $errors->all()) @endphp",
            }).then(function() {window.location.reload(window.location.href);});
        @endif

        @if(session('success'))
            swal({
                
                title:"All good",
                text: "@php echo session('success') @endphp",
                icon: "success"
            }).then(function() {window.location.reload(window.location.href);});
        @endif

        @if(session('info'))
            swal({
                title:"Notice",
                text: "@php echo session('info') @endphp",
                icon: "info"
            }).then(function() {window.location.reload(window.location.href);});
        @endif
        @if(session('error'))
            swal({
                title:"error",
                text: "@php echo session('error') @endphp",
                icon: "error",
            }).then(function() {window.location.reload(window.location.href);});
        @endif
</script>


<script src="{{ asset('js/getdata.js') }}"></script>

        
</body>
