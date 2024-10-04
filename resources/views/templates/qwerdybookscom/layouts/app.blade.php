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
  <!-- <link rel="stylesheet" href="style.css"> -->
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
{{-- <script src="{{asset('qwerdybookscom/') }}/assets/js/ScrollSmoother.min.js"></script> --}}
<script src="{{asset('qwerdybookscom/') }}/assets/js/SplitText.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/chroma.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/mixitup.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/vanilla-tilt.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/jquery.meanmenu.min.js"></script>
<script src="{{asset('qwerdybookscom/') }}/assets/js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>


        <script type="text/javascript">
            @if ($errors->any())
                Swal.fire({title:"Ooops", html: "@php echo implode("<br>", $errors->all()) @endphp" , type: "error"});
            @endif
            @if(session('success'))
                Swal.fire({title:"@lang('All good')", html: "@php echo session('success') @endphp" , type: "success"});
            @endif
        </script>

<script>
  // Define the function for handling the click event
  function handleSignUpClick(event) {
    event.preventDefault();  // Prevent the default behavior (navigation)

    // Log or perform any other action you want on click
    console.log('Sign Up link clicked');

    // Optionally, you can redirect manually after a delay or perform additional actions
    window.location.href = document.getElementById('scroll-to-pricing').href;
  }

  // Handle smooth scrolling once the page is loaded
  window.onload = function() {
    if (window.location.hash === "#pricing-section") {
      gsap.to(window, {duration: 1, scrollTo: "#pricing-section"});
    }
  };
</script>
        
</body>
