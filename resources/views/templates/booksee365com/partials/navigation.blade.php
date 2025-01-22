<style>
    .mobile-nav{
        background-color: #65db2b !important;
    }

    .single-lang{    
        display: inline-block;
        font-size: 18px;
        text-transform: capitalize;
        /* color: #b1b1b1; */
        line-height: 1;
        padding: 30px 35px;
        /* overflow: hidden; */
    }
    .mobile-nav .sidebar-nav .metismenu ul a::before{
        display: none !important;
    }
    header.header-1 .main-menu ul > li > a :hover{
        color: #000 !important;
    }

</style>
<header class="header-wrap header-1">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-2 col-6 col-lg-3">
                <div class="logo">
                    <a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest"><img src="{{ asset('booksee365com/theme/img/logo.png') }}" alt="Promix"></a>
                </div>
            </div>
            <div class="col-xl-8 p-lg-0 col-lg-7 d-none d-lg-block">
                <div class="main-menu text-right">
                    <ul>
                        @guest
                        <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">@lang('trans_booksee365.Home')</a></li>
                        <li><a href="{{ route('about') }}">@lang('trans_booksee365.About Us')</a></li>
                        <li><a href="{{ route('contact') }}">@lang('trans_booksee365.Contact Us')</a></li>
                        <li><a href="{{ route('login') }}">@lang('trans_booksee365.Log In')</a></li>
                        @else
                        <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">@lang('trans_booksee365.Home')</a></li>
                        <li><a href="{{ route('profile') }}">@lang('trans_booksee365.Profile')</a></li>
                        <li><a href="{{ route('about') }}">@lang('trans_booksee365.About Us')</a></li>
                        <li><a href="{{ route('contact') }}">@lang('trans_booksee365.Contact Us')</a></li>
                        @endguest
                        <li>
                           <div class="single-lang">
                            <div  id="toggle" > 
                                <ul id="toggle" style=" list-style: none;">
                                    <li class="toggle header-btn text-uppercase" id="toggle" style="color: #000; margin-left:-7px">
                                        <img id="toggle"  class="flag" src="{{asset("flags/languages/language_".LaravelLocalization::getCurrentLocale().".svg")}}" alt="flags">
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
                           </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-7 d-none d-lg-block text-right">
                @guest
                    @if(Request::route()->getname() == 'welcome' || Request::route()->getname() == 'about')
                        <a href="#pricing-section" class="theme-btn promo-btn">@lang('trans_booksee365.Sign Up')</a>
                    @else
                        <a href="{{ route('welcome') }}#pricing-section" class="theme-btn promo-btn">@lang('trans_booksee365.Sign Up')</a>
                    @endif
                @else
                    <a href="{{ route('logout') }}" class="theme-btn promo-btn">@lang('trans_booksee365.Sign Out')</a>
                @endguest
            </div>
            <div class="col-6 d-lg-none d-block pl-0">
                <div class="mobile-nav-wrap">
                    <div id="hamburger">
                        <i class="fal fa-bars"></i>
                    </div>
                    <!-- mobile menu - responsive menu  -->
                    <div class="mobile-nav">
                        <button type="button" class="close-nav">
                            <i class="fal fa-times-circle"></i>
                        </button>
                        <nav class="sidebar-nav">
                            <ul class="metismenu" id="mobile-menu">
                                @guest
                                    <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">@lang('trans_booksee365.Home')</a></li>
                                    <li><a href="{{ route('about') }}">@lang('trans_booksee365.About Us')</a></li>
                                    <li><a href="{{ route('contact') }}">@lang('trans_booksee365.Contact Us')</a></li>
                                    <li><a href="{{ route('login') }}">@lang('trans_booksee365.Log In')</a></li>
                                    @if(Request::route()->getname() == 'welcome' || Request::route()->getname() == 'about')
                                        <li class="close-nav" style="left: 0px !important"><a href="#pricing-section" >@lang('trans_booksee365.Sign Up')</a></li>
                                    @else
                                        <li class="close-nav"><a href="{{ route('welcome') }}#pricing-section">@lang('trans_booksee365.Sign Up')</a></li>
                                    @endif
                                @else
                                    <li><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">@lang('trans_booksee365.Home')</a></li>
                                    <li><a href="{{ route('profile') }}">@lang('trans_booksee365.Profile')</a></li>
                                    <li><a href="{{ route('about') }}">@lang('trans_booksee365.About Us')</a></li>
                                    <li><a href="{{ route('contact') }}">@lang('trans_booksee365.Contact Us')</a></li>
                                    <li><a href="{{ route('logout') }}">@lang('trans_booksee365.Sign Out')</a></li>
                                @endguest
                                <li class="single-lang py-1">
                                    <div  id="toggle"  style="width: 130px;"> 
                                        <ul id="toggle" style=" list-style: none !important;">
                                            <li class="toggle header-btn text-uppercase" id="toggle" style="color: #fff; margin-left:-7px">
                                                <img class="flag" src="{{asset("flags/languages/language_".LaravelLocalization::getCurrentLocale().".svg")}}" alt="flags">
                                                {{ LaravelLocalization::getCurrentLocale() }}
                                                <i class="fa fa-angle-down"></i>
                                                <ul class="dropdown-content " style="margin-top:10px; padding: 10px; width:180px; overflow-y:scroll;overflow-x:hidden;max-height:400px; border:1px solid rgb(49, 48, 48) ;list-style: none !important;">
                                                    @foreach (config('laravellocalization.supportedLocales') as $lng => $lngval)
                                                    <?php $localeCode = $lng   ?>
                                                        <li style="padding:0px 10px 0px 10px; border-radius: 25px; margin-left:-15px;">
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
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        </div>
    </div>
</header>


<style>
    .single-lang ul li {
        font-size: 16px;
        cursor: pointer;
        position: relative;
        font-weight: 500;
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
        display: none;
        background-color: #53a3c0;
        /* border: 2px solid #000; */
        border-top: 2px solid transparent;
        border-radius: 10px;
    }
    .single-lang ul li ul li a{
        display: flex;
        color: #000;
        font-weight: 500;
        font-size: 16px;
        transition: all 0.2s ease-in-out;
        width: 100%;
    }
    .single-lang ul li ul li:hover a{
        /* color: rgba(0, 0, 0, .15) !important; */
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
            $('.dropdown-content').toggle('fast');
        }else{
            $('.dropdown-content').hide('slow');
        }
    });
  </script>