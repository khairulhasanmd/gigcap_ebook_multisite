<div class="menu-area">
    <div class="container-fluid">
        <div class="row">
            <div class="t-bar d-flex justify-content-between p-4">
                <div class="logo-area d-flex">
                    <div class="sidebar-toggle-icon"> 
                        <div class="line top-line"></div>
                        <div class="line middle-line"></div>
                        <div class="line bottom-line"></div>
                    </div>
                    <div class="menu-logo">
                        <a href="@guest {{ route('welcome') }} @else
                            {{ route('products') }}
                            @endguest"><img src="{{ asset('theme/welcome/images/logo.png') }}" alt="Pixer"></a>
                    </div>
                </div>
                <div class="right-area">
                </div>

            </div>
            <div class="main-menu">
                <div class="menu-item h-100 w-100">
                    <div class="our-menu h-100 w-100">
                        <nav>
                            <ul class="toggle-item list-unstyled pt-1">
                                    <li><a class="ipp {{Route::current()->getName() == 'products' ? 'active' : ''}}" href="@guest {{ route('welcome') }} @else
                                        {{ route('products') }}
                                        @endguest"> <i class="fas fa-home"></i> <span>Home</span></a></li>
                                    <li><a class="ipp {{Route::current()->getName() == 'profile' ? 'active' : ''}}" href="{{ route('profile') }}">
                                    <i class="fas fa-compass"></i></i> <span>Profile</span></a> </li>
                                    <li><a class="ipp {{Route::current()->getName() == 'cancelMembership' ? 'active' : ''}}" href="{{ route('cancelMembership') }}"> <i class="fas fa-compass"></i></i> <span>Cancel Membership</span></a> </li>
                                    <li><a class="ipp" href="{{ route('contact.us') }}"> <i class="fas fa-paper-plane"></i> <span>Contact</span></a> </li>
                                    <li><a class="ipp" href="{{ route('logout') }}"> <i class="fas fa-compass"></i></i> <span>Signout</span></a> </li>
                                    <!-- <li><a class="ipp" href="{{ route('about') }}"> <i class="fas fa-compass"></i></i> <span>About</span></a> </li>
                                     -->
                               
                            </ul>
                        </nav>
                        <nav class="s-menu">
                            <ul class="toggle-item">
                                <li><a class="ipp" href="{{ route('profile') }}"> <i class="fas fa-cog"></i> <span>Setting</span></a></li>
                                <!-- <li><a class="ipp" href="#"> <i class="fas fa-question-circle"></i> <span>Help</span></a> </li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="footer ps-4">
                    <nav>
                        <ul>
                            <!-- <li><a href="{{ route('terms') }}">Terms</a></li> -->
                            <!-- <li><a href="#">Privacy</a></li>
                            <li><a href="#">Help</a></li> -->
                        </ul>
                    </nav>
                    <div class="copyright">
                        <p>&copy; {{ env('APP_NAME') }} {{ date('Y') }}. {{ config('api.COMPANY_NAME') }}, {{ config('api.COMPANY_COUNTRY') }}.</p>
                        <!-- <p>&copy; Copyright 2022 by Pixer.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>