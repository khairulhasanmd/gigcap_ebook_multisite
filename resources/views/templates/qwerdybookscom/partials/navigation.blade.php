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
            <li class="nav-item single-lang py-1">
              <div  id="toggle"  style="width: 130px; margin:auto; "> 
                  <ul id="toggle" style=" list-style: none;">
                      <li class="toggle header-btn text-uppercase" id="toggle" style="color: #fff; margin-left:-7px">
                          <img class="flag" src="{{asset("flags/languages/language_".LaravelLocalization::getCurrentLocale().".svg")}}" alt="flags">
                          {{ LaravelLocalization::getCurrentLocale() }}
                          <i class="fa-solid fa-angle-down" style="color: #fff;"></i>
                          <ul class="dropdown-content " style="margin-top:10px; padding: 10px; width:180px; overflow-y:scroll;overflow-x:hidden;max-height:400px; border:1px solid rgb(49, 48, 48) ">
                              @foreach (config('laravellocalization.supportedLocales') as $lng => $lngval)
                              <?php $localeCode = $lng   ?>
                                  <li style="padding:0px 10px 0px 10px; border-radius: 25px;">
                                      <a class="nav-link nav-under d-flex justify-content-center" href="{{ LaravelLocalization::getLocalizedURL($lng, url(str_replace('/'.app()->getLocale(),'', Request::url()))) }}" style="border-radius: 25px;">
                                          <img class="flag" style="max-width:30px;" src="{{asset("flags/languages/language_".$lng.".svg")}}" alt="flags">
                                              @if (config('laravellocalization.supportedLocales')[$lng]['name'] == 'Chinese (Simplified)')
                                              @lang('trans_clovereadercom.Chinese')
                                              @elseif((config('laravellocalization.supportedLocales')[$lng]['name'] == 'Norwegian Bokmål'))
                                              @lang('trans_clovereadercom.Norwegian')
                                              @else
                                              {{ __('trans_clovereadercom.'.config('laravellocalization.supportedLocales')[$lng]['name']) }}
                                              @endif
                                      </a>
                                  </li>
                              @endforeach
                          </ul>
                      </li>
                  </ul>
              </div>
          </li>
          </ul>
        </div>
        <div class="header__nav-icon-3">
          <button id="open_offcanvas" class="d-lg-none"><img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/icon/menu-black.png" alt="Menubar Icon"></button>
        </div>
      </div>
    </header>
    <!-- Header area end -->
  
  
    <!-- Offcanvas area start -->
    <div class="offcanvas__area offcanvas__areas">
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
                <li><a  href="@if(Route::is('about'))  {{ route('about') }}#pricing-section @else {{ route('welcome') }}#pricing-section @endif"  id="close_offcanvas">Sign Up</a></li>
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
          <button type="button" id="close_offcanvass"><a href="{{url('/')}}"> <i class="fa-solid fa-xmark text-white"></i></a></button>
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

<style>
  .single-lang ul li {
      font-size: 16px;
      cursor: pointer;
      position: relative;
      font-weight: 500;
      padding: 0 6px;
  }
  .single-lang ul li img {
      height: 24px;
      width: 24px;
      border-radius: 50%;
      margin-right: 8px;
  }
  .single-lang ul li i {
      font-size: 14px;
      margin-left: 4px;
  }
  .single-lang ul li ul {
      position: absolute;
      top: 125%;
      left: 0;
      z-index: 999;
      padding: 6px 0;
      display: none;
      background-color: #000;
      /* border: 2px solid #000; */
      border-top: 2px solid transparent;
      border-radius: 10px;
  }
  .single-lang ul li ul li a{
      display: flex;
      color: #000;
      padding: 5px 0 5px 6px;
      font-weight: 500;
      font-size: 16px;
      transition: all 0.2s ease-in-out;
  }
  .single-lang ul li ul li:hover a{
      background-color: rgba(0, 0, 0, .15);
  }
  .dropdown-content{
      margin-left: 10px !important;
  }
  @media (max-width: 991px) {
      #toggle {
          width: 100% !important;
          padding-left: 5px !important;
      }
      }
  @media (max-width: 1182px) {
      .nav-link {
          font-size: 14px !important;
      }
      .nav-item {
          margin-left: 15px !important;
      }
      .nav_btn.btn_hover{
          font-size: 16px !important;
      }
      }
  </style>

<script>
  document.body.addEventListener("click", function (event) {
      if(event.target.id == "toggle") {
          $('.dropdown-content').toggle('slow');
      }else{
          $('.dropdown-content').hide('slow');
      }
  });
</script>