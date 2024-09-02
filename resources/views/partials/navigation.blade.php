
<div class="menu-area">
    <div class="container">
        <div class="row">
            <div class="logo text-uppercase pt-lg-2">
                <a href="@guest {{ route('welcome') }} @else
                            {{ route('products') }}
                            @endguest"> <img src="{{ asset('theme/welcome/images/logo.png') }}" alt="Book Club"></a>
            </div>
            <div class="t-bar">
                <div class="sidebar-toggle-icon"> 
                    <div class="line top-line"></div>
                    <div class="line middle-line"></div>
                    <div class="line bottom-line"></div>
                </div>
                <div class="main-menu text-center text-lg-end">
                    <div class="menu-item float-start text-center">
                        <nav>
                            <ul class="toggle-item list-unstyled">
                                @guest
                                    <li><a class="ipp " href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">Home</a></li>
                                    <li><a class="ipp" href="{{ route('about') }}">About Us</a> </li>
                                    <li><a class="ipp" href="{{ route('contact') }}">Contact</a></li>
                                    <li><a class="ipp" href="{{ route('login') }}">Login </a></li>
                                @else
                                    <li><a class="ipp " href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">Home</a></li>
                                    <li><a class="ipp" href="{{ route('profile') }}">Profile</a> </li>
                                    <li><a class="ipp" href="{{ route('cancelMembership') }}">Cancel Membership</a> </li>
                                    <li><a class="ipp" href="{{ route('about') }}">About Us</a> </li>
                                    <li><a class="ipp" href="{{ route('contact') }}">Contact</a></li>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                    <div class="button-end overflow-hidden">
                        @guest
                            <a href="#" class="r-btn">Sign Up</i></a>
                        @else
                            <a href="{{ route('logout') }}" class="r-btn">Signout</i></a>
                        @endguest
                        <!-- <a href="#" class="r-btn"><i class="fas fa-shopping-cart"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>