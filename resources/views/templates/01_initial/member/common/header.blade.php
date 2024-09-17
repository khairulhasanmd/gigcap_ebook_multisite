<!-- TOP Nav Bar -->
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-menu-bt d-flex align-items-center">
                <div class="wrapper-menu">
                <div class="main-circle"><i class="las la-bars"></i></div>
                </div>
                <div class="iq-navbar-logo d-flex justify-content-between">
                <a href="index.html" class="header-logo">
                    <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
                    <div class="logo-title">
                        <span class="text-primary text-uppercase">Booksto</span>
                    </div>
                </a>
                </div>
            </div>
            <div class="navbar-breadcrumb">
                <!-- <h5 class="mb-0">Shop</h5> -->
                <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="@guest {{ route('welcome') }} @else{{ route('products') }}@endguest">Books</a></li>
                    <!-- <li class="breadcrumb-item active" aria-current="page">Home Page</li> -->
                </ul>
                </nav>
            </div>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list">    
                <li class="line-height pt-3">
                    <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                        <!-- <img src="{{ asset('membership/images/user/1.jpg') }}" class="img-fluid rounded-circle mr-3" alt="user"> -->
                        <div class="caption">
                            <h6 class="mb-1 line-height">{{ auth()->user()->name }}</h6>
                        </div>
                    </a>
                    <div class="iq-sub-dropdown iq-user-dropdown">
                        <div class="iq-card shadow-none m-0">
                            <div class="iq-card-body p-0 ">
                            <div class="bg-primary p-3">
                                <h5 class="mb-0 text-white line-height">{{ auth()->user()->name }}</h5>
                            </div>
                            <a href="{{ route('profile') }}" class="iq-sub-card iq-bg-primary-hover">
                                <div class="media align-items-center">
                                    <div class="rounded iq-card-icon iq-bg-primary">
                                        <i class="ri-file-user-line"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0 ">My Profile</h6>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('cancelMembership') }}" class="iq-sub-card iq-bg-primary-hover">
                                <div class="media align-items-center">
                                    <div class="rounded iq-card-icon iq-bg-primary">
                                        <i class="ri-profile-line"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0 ">Cancel Membership</h6>
                                    </div>
                                </div>
                            </a>
                            <div class="d-inline-block w-100 text-center p-3">
                                <a class="bg-primary iq-sign-btn" href="{{ route('logout') }}" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>
                </li>
                </ul>
            </div>
        </nav>
    </div>
</div>