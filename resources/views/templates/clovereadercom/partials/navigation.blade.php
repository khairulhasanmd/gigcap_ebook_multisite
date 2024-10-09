<style>
   
</style>

<!-- Back To Top start -->
<button id="back-top" class="back-to-top show" style="margin-bottom: 50px;">
      <i class="bi bi-chevron-up"></i>
</button>

 <!-- Sticky Header -->
  <header class="header navbar_fixed menu-sticky" id="header">
      <nav class="navbar navbar-expand-lg menu_one">
          <div class="container-fluid">
              <a class="navbar-brand sticky_logo d-flex" href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">
                  <img src="{{asset('clovereadercom/') }}/img/logo.png" alt="logo">
                  <h1 class="p-3 text-white"><strong style="color: #34c083;">Clove</strong>Reader</h1>

              </a>
              <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
                  <ul class="navbar-nav menu ms-lg-auto">
                  
                      @guest
                        <li class="nav-item {{ Route::is('welcome') ? 'active' : ''}}"><a class="nav-link" href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest"> @lang('trans_clovereadercom.Home')</a></li>
                        <li class="nav-item  {{ Route::is('about') ? 'active' : ''}}"><a href="{{ route('about') }}" class="nav-link">@lang('trans_clovereadercom.About Us')</a></li>
                        <li class="nav-item  {{ Route::is('contact') ? 'active' : ''}} "><a href="{{ route('contact') }}" class="nav-link">@lang('trans_clovereadercom.Contact Us')</a></li>
                        <li class="nav-item d-flex  {{ Route::is('login') ? 'active' : ''}}"><a href="{{ route('login') }}" class="nav-link"><i class="bi bi-person"></i> @lang('trans_clovereadercom.Sign In')</a></li>
                        <li class="nav-item "><a href=" @if(Route::is('about'))  {{ route('about') }}#pricing @else  {{ route('welcome') }}#pricing @endif" class="nav_btn btn_hover">@lang('trans_clovereadercom.Sign Up')</a></li>
                      @else
                        <li class="nav-item  {{ Route::is('products') ? 'active' : ''}}"><a class="nav-link" href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest"> @lang('trans_clovereadercom.Home')</a></li>
                        <li class="nav-item  {{ Route::is('profile') ? 'active' : ''}} "><a class="nav-link" href="{{ route('profile') }}"> @lang('trans_clovereadercom.Profile')</a></li>
                        <li class="nav-item  {{ Route::is('about') ? 'active' : ''}} "><a href="{{ route('about') }}" class="nav-link">@lang('trans_clovereadercom.About Us')</a></li>
                        <li class="nav-item  {{ Route::is('contact') ? 'active' : ''}} "><a href="{{ route('contact') }}" class="nav-link">@lang('trans_clovereadercom.Contact Us')</a></li>
                        <li class="nav-item  "><a href="{{ route('signout') }}" class="nav_btn btn_hover">@lang('trans_clovereadercom.Sign Out')</a></li>
                      @endguest
                      <li class="nav-item single-lang py-1">
                        <div  id="toggle"  style="width: 130px; margin:auto; "> 
                            <ul id="toggle" style=" list-style: none;">
                                <li class="toggle header-btn text-uppercase" id="toggle" style="color: #fff; margin-left:-7px">
                                    <img class="flag" src="{{asset("flags/languages/language_".LaravelLocalization::getCurrentLocale().".svg")}}" alt="flags">
                                    {{ LaravelLocalization::getCurrentLocale() }}
                                    <i class="fa-solid fa-angle-down" style="color: #fff;"></i>
                                    <ul class="dropdown-content " style="margin-top:10px; padding: 10px; width:200px; overflow-y:scroll;overflow-x:hidden;max-height:400px;  box-shadow: 3px 5px 4px 5px #888888; ">
                                        @foreach (config('laravellocalization.supportedLocales') as $lng => $lngval)
                                        <?php $localeCode = $lng   ?>
                                            <li style="padding:0px 10px 0px 10px; border-radius: 25px;">
                                                <a class="nav-link nav-under d-flex justify-content-center" href="{{ LaravelLocalization::getLocalizedURL($lng, url(str_replace('/'.app()->getLocale(),'', Request::url()))) }}" style="border-radius: 25px;">
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

              </div>
              <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span><span></span><span></span><span></span><span></span><span></span>
              </button>
          </div>
      </nav>
  </header>


  <script>
    document.body.addEventListener("click", function (event) {
        if(event.target.id == "toggle") {
            $('.dropdown-content').toggle('slow');
        }else{
            $('.dropdown-content').hide('slow');
        }
    });
</script>
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
    background-color: #fff;
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
}
.single-lang ul li ul li:hover a{
    background-color: rgba(0, 0, 0, .15);
}
.dropdown-content{
    margin-left: -90px !important;
}
@media (max-width: 991px) {
    #toggle {
        width: 100% !important;
        padding-left: 5px !important;
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
    }
</style>