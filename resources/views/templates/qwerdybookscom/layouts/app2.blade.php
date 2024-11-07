<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Axtra HTML5 Template">

  <link rel="icon" type="image/x-icon" href="{{asset('qwerdybookscom/') }}//assets/imgs/logo/favicon.png">

  <title>Qwerdybooks</title>

  <!-- Fav Icon -->
  <link rel="icon" type="image/x-icon" href="{{asset('qwerdybookscom/') }}//assets/imgs/icon/3.png">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- All CSS files -->
  <link rel="stylesheet" href="{{asset('qwerdybookscom/') }}/assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="{{asset('qwerdybookscom/') }}/assets/css/all.min.css">
  <link rel="stylesheet" href="{{asset('qwerdybookscom/') }}/assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="{{asset('qwerdybookscom/') }}/assets/css/progressbar.css">
  <link rel="stylesheet" href="{{asset('qwerdybookscom/') }}/assets/css/meanmenu.min.css">
  <link rel="stylesheet" href="{{asset('qwerdybookscom/') }}/assets/css/master.css">
  <style>
    .swal-footer {
      text-align: center !important;
    }
  </style>

</head>
<body>
@include('templates.qwerdybookscom.partials.navigation')
    @yield('content')

@include('templates.qwerdybookscom.partials.footer')


  <!--<< All JS Plugins >>-->
 
<!-- Bootstrap Bundle with Popper -->
@yield('script-files')

<script src="{{asset('qwerdybookscom/') }}/assets/js/jquery-3.6.0.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/swiper-bundle.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/counter.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/gsap.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/ScrollTrigger.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/ScrollToPlugin.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/ScrollSmoother.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/SplitText.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/chroma.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/mixitup.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/vanilla-tilt.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/jquery.meanmenu.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    @if ($errors->any())
            swal({
                icon: "error",
                title:"Ooops",
                text: "@php echo implode("<br>", $errors->all()) @endphp",
            });
        @endif

        @if(session('success'))
            swal({
                
                title:"All good",
                text: "@php echo session('success') @endphp",
                icon: "success"
            });
        @endif

        @if(session('info'))
            swal({
                title:"Notice",
                text: "@php echo session('info') @endphp",
                icon: "info"
            });
        @endif
        @if(session('error'))
            swal({
                title:"error",
                text: "@php echo session('error') @endphp",
                icon: "error",
            });
        @endif
</script>
        
</body>
<script src="{{asset('qwerdybookscom/') }}/assets/js/main.js"></script>
<script src="{{ asset('js/getdata.js') }}"></script>

