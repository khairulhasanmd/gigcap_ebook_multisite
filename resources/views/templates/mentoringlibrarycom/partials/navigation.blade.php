<style>
.header.navbar_fixed .navbar {
  background: #fff;
  box-shadow: 0px 4px 6px 0px rgba(12, 0, 46, 0.17);
}    
</style>    
    
    <!-- Cursor follower -->
    <div class="cursor-follower" style="top: 540px; left: 1212px;"></div>

   

    <!-- Back To Top start -->
    <button id="back-top" class="back-to-top show" style="margin-bottom: 50px;">
        <i class="bi bi-chevron-up"></i>
    </button>


<header class="header  menu-sticky" id="header" style="  position: fixed;top: 0; left: 0;  width: 100%; height: 130px !important; z-index: 999; 
 
">
    <nav class="navbar navbar-expand-lg menu_one">
        <div class="container-fluid">
            <a class="navbar-brand sticky_logo" href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">
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
                            <li><a href=" @if(Route::is('about'))  {{ route('about') }}#pricing @else  {{ route('welcome') }}#pricing @endif" class="nav_btn btn_hover">Sign Up</a></li>
                        @else
                        <li><a href="{{ route('signout') }}#pricing" class="nav_btn btn_hover">Sign Out</a></li>

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

