<header class="header-wrap header-1">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-2 col-6 col-lg-3">
                <div class="logo">
                    <a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest"><img src="{{ asset('booksee365com/theme/img/logo.png') }}" alt="Promix"></a>
                </div>
            </div>
            <div class="col-xl-8 p-lg-0 col-lg-7 d-none d-lg-block">
                <div class="main-menu text-right">
                    <ul>
                        @guest
                        <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('login') }}">Log In</a></li>
                        @else
                        <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">Home</a></li>
                        <li><a href="{{ route('profile') }}">Profile</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-7 d-none d-lg-block text-right">
                @guest
                    @if(Request::route()->getname() == 'welcome' || Request::route()->getname() == 'about')
                        <a href="#pricing-section" class="theme-btn promo-btn">Sign Up</a>
                    @else
                        <a href="{{ route('welcome') }}#pricing-section" class="theme-btn promo-btn">Sign Up</a>
                    @endif
                @else
                    <a href="{{ route('signout') }}" class="theme-btn promo-btn">Sign Out</a>
                @endguest
            </div>
            <div class="col-6 d-lg-none d-block pl-0">
                <div class="mobile-nav-wrap">
                    <div id="hamburger">
                        <i class="fal fa-bars"></i>
                    </div>
                    <!-- mobile menu - responsive menu  -->
                    <div class="mobile-nav">
                        <button type="button" class="close-nav">
                            <i class="fal fa-times-circle"></i>
                        </button>
                        <nav class="sidebar-nav">
                            <ul class="metismenu" id="mobile-menu">
                                @guest
                                    <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">Home</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    <li><a href="{{ route('login') }}">Log In</a></li>
                                    @if(Request::route()->getname() == 'welcome' || Request::route()->getname() == 'about')
                                        <li><a href="#pricing-section">Sign Up</a></li>
                                    @else
                                        <li><a href="{{ route('welcome') }}#pricing-section">Sign Up</a></li>
                                    @endif
                                @else
                                    <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">Home</a></li>
                                    <li><a href="{{ route('profile') }}">Profile</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    <li><a href="{{ route('logout') }}">Sign Out</a></li>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        </div>
    </div>
</header>
