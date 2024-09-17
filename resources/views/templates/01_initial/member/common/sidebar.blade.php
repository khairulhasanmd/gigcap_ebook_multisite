<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest" class="header-logo">
            <img src="{{ asset('membership/images/logo.png') }}" class="img-fluid rounded-normal" alt="">
            <div class="logo-title">
                <span class="text-primary text-uppercase">{{ config('app.name', '') }}</span>
            </div>
        </a>
        <div class="iq-menu-bt-sidebar">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                <div class="main-circle"><i class="las la-bars"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="{{Route::current()->getName() == 'products' ? 'active' : ''}}">
                    <a href="@guest {{ route('welcome') }} @else{{ route('products') }}@endguest"><i class="fa fa-address-book"></i>Home</a>
                </li>
                <li class="{{Route::current()->getName() == 'profile' ? 'active' : ''}}">
                    <a href="{{ route('profile') }}"><i class="fa fa-user"></i>Profile</a>
                </li>
                <li class="{{Route::current()->getName() == 'cancelMembership' ? 'active' : ''}}">
                    <a href="{{ route('cancelMembership') }}"><i class="fa fa-id-card"></i>Cancel Membership</a>
                </li>
                <li class="{{Route::current()->getName() == 'contact' ? 'active' : ''}}">
                    <a href="{{ route('contact') }}"><i class="fa fa-address-book"></i>Contact</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"><i class="fa fa-lock"></i></i>Signout</a>
                </li>
            </ul>
        </nav>
        <!-- <div id="sidebar-bottom" class="p-3 position-relative">
            <div class="iq-card">
                <div class="iq-card-body">
                <div class="sidebarbottom-content">
                    <div class="image"><img src="images/page-img/side-bkg.png" alt=""></div>                           
                    <button type="submit" class="btn w-100 btn-primary mt-4 view-more">Become Membership</button>
                </div>
                </div>
            </div>
        </div> -->
    </div>
</div>