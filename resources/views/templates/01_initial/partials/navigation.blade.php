<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header-top">
                    <div class="row">
                        <div class="col-lg-2 col-6">
                            <div class="logo">
                                <a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest"><img src="{{ asset('01_initial/theme2/images/logo.png') }}" alt="BookSync"></a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-6">
                            <div class="sidebar-toggle-icon d-block d-lg-none"> 
                                <div class="line top-line"></div>
                                <div class="line middle-line"></div>
                                <div class="line bottom-line"></div>
                            </div>
                            <div class="my-navbar our-navbar">
                                <div class="nav-left text-lg-end text-center">
                                    <ul>
                                    @guest
                                        <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">Home</a></li>
                                        <li><a href="{{ route('about') }}">About Us</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                        <li><a href="{{ route('signin') }}">Log In</a></li>
                                        <li><a href="{{ config('api.CAMPAIGN_DOMAIN') }}/en/c/book-in-sync-signup-copy">Create Account</a></li>
                                    @else
                                        <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">Home</a></li>
                                        <li><a href="{{ route('about') }}">About Us </a></li>
                                        <li><a href="{{ route('contact') }}">Contact </a></li>
                                        <li><a href="{{ route('profile') }}">Profile </a></li>
                                        <li><a href="{{ route('cancelMembership') }}">Cancel Membership </a></li>
                                        <li><a href="{{ route('logout') }}">Signout </a></li>
                                    @endguest
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>