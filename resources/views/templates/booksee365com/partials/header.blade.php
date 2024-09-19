<style>
    @media screen and (max-width: 576px) {
        .work-box{
            padding-left: 100px !important;
            padding-right: 24px;
        }
        .menu-item {
            width: 50px !important;
            /* display: none; */
        }
        .toggle-item li i {
            
            display: none;
        }
        .toggle-item li i a{
            
            display: none;
        }
       
        .toggle-item li a span {
            font-weight: 800;
            font-size: 8px !important;
            }
        .toggle-item li {
            padding-left: 5px !important;
            margin-bottom: 6px;
            transition: all 0.3s ease-in-out;
            }
           
     }

    .leftt{
        width: 140px !important;
    }
    .work-box {
        padding-left: 140px !important;
        padding-right: 24px;
    }
    
</style>

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
                            @endguest"><img src="{{ asset('booksee365com/theme/img/logo.png') }}" alt="Pixer"></a>
                    </div>
                </div>
                <div class="right-area">
                </div>

            </div>
            <div class="main-menu leftt">
                <div class="menu-item h-100 w-100">
                    <div class="our-menu h-100 w-100">
                        <nav>
                            <ul class="toggle-item list-unstyled pt-1">
                                    <li><a class="ipp {{Route::current()->getName() == 'products' ? 'active' : ''}}" href="@guest {{ route('welcome') }} @else
                                        {{ route('products') }}
                                        @endguest"> <span>Home</span></a></li>
                                    <li><a class="ipp {{Route::current()->getName() == 'profile' ? 'active' : ''}}" href="{{ route('profile') }}"> <span>Profile</span></a> </li>
                                    <li><a class="ipp {{Route::current()->getName() == 'cancelMembership' ? 'active' : ''}}" href="{{ route('cancelMembership') }}"> <span>Cancel Membership</span></a> </li>
                                    <li><a class="ipp" href="{{ route('contact') }}">  <span>Contact</span></a> </li>
                                    <li><a class="ipp" href="{{ route('logout') }}"> </i> <span>Signout</span></a> </li>
                               
                            </ul>
                        </nav>
                        <nav class="s-menu">
                            <ul class="toggle-item">
                                <li><a class="ipp" href="{{ route('service', 'terms_of_service') }}"> <span>Terms & Conditions</span></a></li>
                                <li><a class="ipp" href="{{ route('service', 'privacy_policy') }}"><span>Privacy Policy</span></a></li>
                                <li><a class="ipp" href="{{ route('service', 'subscription_policy') }}"><span>Subscription Packages</span></a></li>
                                {{-- <li><a class="ipp" href="{{ route('profile') }}"> <i class="fas fa-cog"></i> <span>Setting</span></a></li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="footer ps-4">
                    <nav>
                        <ul>
                        </ul>
                    </nav>
                    <div class="copyright">
                        <p>&copy; {{ config('booksee365com.CONCEPT_NAME') }} {{ date('Y') }}. {{ config('booksee365com.COMPANY_NAME') }}, {{ config('booksee365com.COMPANY_COUNTRY') }}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>