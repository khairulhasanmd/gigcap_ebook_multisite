    <!-- Cursor follower -->
    <div class="cursor-follower" style="top: 540px; left: 1212px;"></div>

   

    <!-- Back To Top start -->
    <button id="back-top" class="back-to-top show">
        <i class="bi bi-chevron-up"></i>
    </button>


<header class="header navbar_fixed menu-sticky" id="header">
    <nav class="navbar navbar-expand-lg menu_one">
        <div class="container-fluid">
            <a class="navbar-brand sticky_logo" href="index.html">
                <img src="{{ asset ('mentoringlibrarycom/') }}/img/logo.png" alt="logo">
                
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
                            <li><a href="{{ route('welcome') }}#pricing" class="nav_btn btn_hover">Sign Up</a></li>
                        @else
                        <li><a href="{{ route('signout') }}#pricing" class="nav_btn btn_hover">Sign Up</a></li>

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

