   <!-- Sticky Header -->
   <header class="header navbar_fixed menu-sticky" id="header">
    <nav class="navbar navbar-expand-lg menu_one">
        <div class="container-fluid">
            <a class="navbar-brand sticky_logo" href="{{ url('/') }}">
                <img src="{{ asset($asset) }}/img/logo.png" alt="logo">

            </a>
            <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
                <ul class="navbar-nav menu ms-lg-auto me-lg-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}"> Home</a>
                    </li>
                    <li class="nav-item "><a href="{{ url('/about-us') }}" class="nav-link">About Us</a></li>
                    <li class="nav-item "><a href="{{ url('/contact') }}" class="nav-link">Contact Us</a></li>
                </ul>
                <ul class="list-unstyled alter_nav alter_nav_color_btn  d-flex d-lg-block">
                    <div class="modified-buttons">

                        <li class="nav-item "><a href="{{ url('/login') }}" class="nav-link login-btn"><i class="bi bi-person"></i> Log In</a></li>
                        <li><a href="{{ url('/') }}#pricing" class="nav_btn btn_hover">Sign Up</a></li>

                    </div>
                </ul>
            </div>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span></span><span></span><span></span><span></span><span></span><span></span>
            </button>
        </div>
    </nav>
</header>
