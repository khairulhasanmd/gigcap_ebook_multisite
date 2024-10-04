<style>
  .offcanvas__menu-wrapper.mean-container .mean-nav ul li a{
    font-size: 16px !important;
  }
  .offcanvas__mid{
    margin-top: 120px;
    margin-left: 30px;
  }
  .offcanvas__menu >ul >li>a{
    font-size: 18px;
    color: #fff !important;
    text-transform: capitalize !important;
    padding-top: 10px;

  }
</style>

<body class="dark">

    <!-- Cursor Animation -->
    <div class="cursor1"></div>
    <div class="cursor2"></div>
  
  
    <!-- Scroll Smoother -->
    <div class="has-smooth" id="has_smooth"></div>
  
  
    <!-- Go Top Button -->
    <button id="scroll_top" class="scroll-top"><i class="fa-solid fa-arrow-up"></i></button>
  
  
    <!-- Header area start -->
    <header class="header__area-3">
      <div class="header__inner-3">
        <div class="header__logo-2">
          <a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest" class="logo-dark"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/logo/logo-black.png" alt="Site Logo"></a>
          <a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest" class="logo-light"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/logo/site-logo-white-2.png" alt="Site Logo"></a>
        </div>
        <div class="header__nav-2">
          <ul class="main-menu-3 menu-anim">
            @guest
                <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">home</a></li>
                <li><a href="{{ route('about') }}">about</a></li>
                <li><a href="{{ route('contact') }}">contact</a></li>
                <li><a href="{{ route('login') }}">Log In</a></li>
                <li><a  href="@if(Route::is('about'))  {{ route('about') }}#pricing-section @else  {{ route('welcome') }}#pricing-section @endif" onclick="handleSignUpClick()">Sign Up</a></li>
            @else
                <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">home</a></li>
                <li><a href="@guest {{ route('welcome') }} @else {{ route('profile') }} @endguest">Profile</a></li>
                <li><a href="{{ route('about') }}">about</a></li>
                <li><a href="{{ route('contact') }}">contact</a></li>
                <li><a href="{{ route('logout') }}">Log Out</a></li>
            @endguest
          </ul>
        </div>
        <div class="header__nav-icon-3">
          {{-- <div class="langDropdown">
            <div class="language">
                <div class="single-lang">
                    <ul class="ms-auto">
                        <li class="toggle">
                            <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/flags/en.png" alt="en"> EN
                            <i class="fa-solid fa-angle-down"></i>
                            <ul>
                                <li><a href="#"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/flags/en.png" alt="en">
                                        EN</a>
                                </li>
                                <li><a href="#"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/flags/de.png" alt="de">
                                        DE</a>
                                </li>
                                <li><a href="#"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/flags/fr.png" alt="fr">
                                        FR</a>
                                </li>
                                <li><a href="#"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/flags/fi.png" alt="fi">
                                        FI</a>
                                </li>
                                <li><a href="#"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/flags/it.png" alt="it">
                                        IT</a>
                                </li>
                                <li><a href="#"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/flags/jp.png" alt="jp">
                                        JP</a>
                                </li>
                                <li><a href="#"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/flags/my.png" alt="my">
                                        MY</a>
                                </li>
                                <li><a href="#"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/flags/nl.png" alt="nl">
                                        NL</a>
                                </li>
                                <li><a href="#"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/flags/no.png" alt="no">
                                        NO</a>
                                </li>
                                <li><a href="#"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/flags/pl.png" alt="pl">
                                        PL</a>
                                </li>
                                <li><a href="#"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/flags/se.png" alt="se">
                                        SE</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}
          <button id="open_offcanvas" class="d-lg-none"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/icon/menu-black.png" alt="Menubar Icon"></button>
        </div>
      </div>
    </header>
    <!-- Header area end -->
  
  
    <!-- Offcanvas area start -->
    <div class="offcanvas__area">
      <div class="offcanvas__body">
        <div class="offcanvas__left">
          <div class="offcanvas__logo">
            <a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/logo/site-logo-white-2.png" alt="Offcanvas Logo" style="width: 80px"></a>
          </div>
        </div>
        <div class="offcanvas__mid" >
          <div class="offcanvas__menu-wrapper">
            <nav class="offcanvas__menu">
              <ul class="menu-anim">
                 @guest
                <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">home</a></li>
                <li><a href="{{ route('about') }}">about</a></li>
                <li><a href="{{ route('contact') }}">contact</a></li>
                <li><a href="{{ route('login') }}">Log In</a></li>
                <li><a  href="@if(Route::is('about'))  {{ route('about') }}#pricing-section @else  {{ url('/') }}/#pricing-section @endif"  id="close_offcanvass">Sign Up</a></li>
            @else
                <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">home</a></li>
                <li><a href="@guest {{ route('welcome') }} @else {{ route('profile') }} @endguest">Profile</a></li>
                <li><a href="{{ route('about') }}">about</a></li>
                <li><a href="{{ route('contact') }}">contact</a></li>
                <li><a href="{{ route('logout') }}">Log Out</a></li>
            @endguest
              </ul>
            </nav>
          </div>
        </div>
        <div class="offcanvas__close">
          <button type="button" id="close_offcanvas"><i class="fa-solid fa-xmark"></i></button>
        </div>
      </div>
    </div>
    <!-- Offcanvas area end -->
  








{{-- 
<style>
.header.navbar_fixed .navbar {
  background: #fff;
  box-shadow: 0px 4px 6px 0px rgba(12, 0, 46, 0.17);
}    
</style>    
    
    <!-- Cursor follower --> --}}
    {{-- <div class="cursor-follower" style="top: 540px; left: 1212px;"></div> --}}

   

    <!-- Back To Top start -->
    {{-- <button id="back-top" class="back-to-top show" style="margin-bottom: 50px;">
        <i class="bi bi-chevron-up"></i>
    </button> --}}

{{-- 
<header class="header  menu-sticky" id="header" style="  position: fixed;top: 0; left: 0;  width: 100%; height: 130px !important; z-index: 999; 
 
">
    <nav class="navbar navbar-expand-lg menu_one">
        <div class="container-fluid">
            <a class="navbar-brand sticky_logo" href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">
                <img src="{{ asset ('qwerdybookscom/') }}/img/logo.png" alt="logo">
                
            </a>
            <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
                <ul class="navbar-nav menu ms-lg-auto me-lg-auto">
                    <li class="nav-item active"> <a class="nav-link" href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest"> Home</a></li>
                    @guest
                    @else
                    <li class="nav-item active"> <a class="nav-link" href=" {{ route('profile') }}"> Profile</a></li>

                    @endguest
                    <li class="nav-item "><a href=" {{ route('about') }}" class="nav-link">About Us</a></li>
                    <li class="nav-item "><a href=" {{ route('contact') }}" class="nav-link">Contact Us</a></li>
                </ul>
                <ul class="list-unstyled alter_nav alter_nav_color_btn  d-flex d-lg-block">
                    <div class="modified-buttons">
                        @guest
                            <li class="nav-item "><a href="{{ route('login') }}" class="nav-link login-btn"><i class="bi bi-person"></i> Log In</a></li>
                            <li><a href=" @if(Route::is('about'))  {{ route('about') }}#pricing-section @else  {{ route('welcome') }}#pricing-section @endif" class="nav_btn btn_hover">Sign Up</a></li>
                        @else
                        <li><a href="{{ route('signout') }}#pricing-section" class="nav_btn btn_hover">Sign Out</a></li>

                        @endguest
                        
                        
                    </div>
                </ul>
            </div>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span></span><span></span><span></span><span></span><span></span><span></span>
            </button>
        </div>
    </nav>
</header>
 --}}
 <script>
  document.getElementById("signUpLink").addEventListener("click", function() {
      // Hide the offcanvas area
      document.getElementById("offcanvas__area").style.display = "none";
  });
  </script>