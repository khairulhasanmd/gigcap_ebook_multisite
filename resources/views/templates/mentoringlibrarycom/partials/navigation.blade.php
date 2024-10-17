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
                    <li class="nav-item active"> <a class="nav-link" href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest"> @lang('trans_mentoringlibrarycom.Home')</a></li>
                    @guest
                    @else
                    <li class="nav-item active"> <a class="nav-link" href=" {{ route('profile') }}"> @lang('trans_mentoringlibrarycom.Profile')</a></li>

                    @endguest
                    <li class="nav-item "><a href=" {{ route('about') }}" class="nav-link">@lang('trans_mentoringlibrarycom.About Us')</a></li>
                    <li class="nav-item "><a href=" {{ route('contact') }}" class="nav-link">@lang('trans_mentoringlibrarycom.Contact Us')</a></li>
                </ul>
                <ul class="list-unstyled alter_nav alter_nav_color_btn  d-flex d-lg-block">
                    <div class="modified-buttons">
                        @guest
                            <li class="nav-item "><a href="{{ route('login') }}" class="nav-link login-btn"><i class="bi bi-person"></i> @lang('trans_mentoringlibrarycom.Log In')</a></li>
                            <li><a href=" @if(Route::is('about'))  {{ route('about') }}#pricing @else  {{ route('welcome') }}#pricing @endif" class="nav_btn btn_hover">@lang('trans_mentoringlibrarycom.Sign Up')</a></li>
                        @else
                        <li><a href="{{ route('signout') }}#pricing" class="nav_btn btn_hover"@lang>@lang('trans_mentoringlibrarycom.Sign Out')</a></li>

                        @endguest
                        <li class="single-lang py-1">
                            <div  id="toggle"  style="width: 130px;"> 
                                <ul id="toggle" style=" list-style: none;">
                                    <li class="toggle header-btn text-uppercase" id="toggle" style="color: #000; margin-left:-7px">
                                        <img class="flag" src="{{asset("flags/languages/language_".LaravelLocalization::getCurrentLocale().".svg")}}" alt="flags">
                                        {{ LaravelLocalization::getCurrentLocale() }}
                                        <i class="fa fa-angle-down"></i>

                                        <ul class="dropdown-content " style="margin-top:10px; width:180px; overflow-y:scroll;overflow-x:hidden;max-height:400px; border:1px solid rgb(49, 48, 48);">
                                            @foreach (config('laravellocalization.supportedLocales') as $lng => $lngval)
                                            <?php $localeCode = $lng   ?>
                                                <li style="border-radius: 25px;">
                                                    <a class="nav-link nav-under d-flex justify-content-center; " href="{{ LaravelLocalization::getLocalizedURL($lng, url(str_replace('/'.app()->getLocale(),'', Request::url()))) }}" style="color:#fff;">
                                                        <img class="flag" style="max-width:30px;" src="{{asset("flags/languages/language_".$lng.".svg")}}" alt="flags">
                                                            @if (config('laravellocalization.supportedLocales')[$lng]['name'] == 'Chinese (Simplified)')
                                                            @lang('trans_clovereadercom.Chinese')
                                                            @elseif((config('laravellocalization.supportedLocales')[$lng]['name'] == 'Norwegian Bokmål'))
                                                            @lang('trans_clovereadercom.Norwegian')
                                                            @else
                                                            {{ __('trans_clovereadercom.'.config('laravellocalization.supportedLocales')[$lng]['name']) }}
                                                            @endif
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>   
                    </div>
                </ul>
            </div>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span></span><span></span><span></span><span></span><span></span><span></span>
            </button>
        </div>
    </nav>
</header>


<style>
    .single-lang ul li {
        font-size: 16px;
        cursor: pointer;
        position: relative;
        font-weight: 500;
        padding: 0 6px;
    }
    .single-lang ul li img {
        height: 24px;
        width: 24px;
        border-radius: 50%;
        margin-right: 8px;
    }
    .single-lang ul li i {
        font-size: 14px;
        margin-left: 4px;
    }
    .single-lang ul li ul {
        position: absolute;
        top: 125%;
        left: 0;
        z-index: 999;
        padding: 6px 0;
        display: none;
        background-color: #53a3c0;
        /* border: 2px solid #000; */
        border-top: 2px solid transparent;
        border-radius: 10px;
    }
    .single-lang ul li ul li a{
        display: flex;
        color: #000;
        padding: 5px 0 5px 6px;
        font-weight: 500;
        font-size: 16px;
        transition: all 0.2s ease-in-out;
        width: 100%;
    }
    .single-lang ul li ul li:hover a{
        color: rgba(0, 0, 0, .15) !important;
    }
    .dropdown-content{
        margin-left: -40px;
    }
    @media (max-width: 991px) {
        #toggle {
            width: 100% !important;
            /* padding-left: 5px !important; */
        }
        .dropdown-content{
        margin-left: 10px;
    }
        }
    @media (max-width: 1090px) {
        .sticky_logo {
            width: 200px !important;
            /* padding-left: 5px !important; */
        }
        }
    @media (max-width: 1182px) {
        .nav-link {
            font-size: 14px !important;
        }
        .nav-item {
            margin-left: 15px !important;
        }
        .nav_btn.btn_hover{
            font-size: 16px !important;
        }
        
        /* @media (max-width: 1071px) {
        .navbar-expand-lg .navbar-toggler {
            display: block;
        }
    }
        @media (min-width: 1071px) {
        .collapse  {
            display: none !important;
        } */
}
    </style>
  
  <script>
    document.body.addEventListener("click", function (event) {
        if(event.target.id == "toggle") {
            $('.dropdown-content').toggle('slow');
        }else{
            $('.dropdown-content').hide('slow');
        }
    });
  </script>