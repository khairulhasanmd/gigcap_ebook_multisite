@guest
@else
    <script>
        window.location.href = "{{ route('products') }}";
    </script>
@endguest
 @extends('templates.clovereadercom.layouts.app')
@section('content')

  <style>

.blur-txt {

  filter: blur(8px);
  -webkit-filter: blur(8px);
}


.blur-img {
    filter: blur(15px);
    -webkit-filter: blur(15px);
}
.bg-banner_5 {
  background-size: 220px;
}

</style>

<div id="smooth-wrapper">
    <div id="smooth-content">
      <main>

        <!-- Hero area start -->
        {{-- <section class="hero__area ">
          <div class="container">
            <div class="row">
              <div class="col-xxl-12">
                <div class="hero__content animation__hero_one">
                  <a href="@guest #pricing-section @else {{ route('products') }} @endguest">Learning, Study, Knowledge, Reading Books <span><i
                        class="fa-solid fa-arrow-right"></i></span></a>
                  <div class="hero__title-wrapper">
                    <h1 class="hero__title">Reading Best Book</h1>
                    <p class="hero__sub-title">Unlock daily access to <span>our extensive library</span>, where you can explore a diverse selection of new books. Immerse yourself in countless stories and expand your knowledge with every turn of the page!</p>
                  </div>
                  <img src="{{ asset ('clovereadercom/') }}/assets/imgs/icon/arrow-down-big.png" alt="Arrow Down Icon">
                 
                </div>
              </div>
            </div>
          </div>

          <img src="{{ asset ('clovereadercom/') }}/assets/imgs/hero/1/1-bg.png" alt="image" class="hero1_bg">
        </section> --}}
        <!-- Hero area end -->







            <!-- Hero Section start  -->
    <div class="hero-section hero-1 fix pt-5">
      <div class="container-fluid pt-5">
          <div class="row pt-5">
              <div class="col-12 col-xl-8 col-lg-8 mx-auto">
                  <div class="row">
                      <div class="col-12 col-xl-12 col-lg-12 mx-auto mb-4">
                          <section class="layout-1">
                              <div class="bg-banner_1">
                                  <div class="banner-wrapper banners">

                                      <div class="banner-wrapper-infor">
                                          <div class="info">
                                              <div class="content">
                                                  <h3 class="title-banner">" @lang('trans_clovereadercom.What I Love the Most About reading Is the sensation Of discovery,') "</h3>
                                                  <div class="bwp-image-subtitle"> J.K. Rowling</div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </section>
                      </div>
                      <div class="col-12 col-md-6 col-xl-6 col-lg-6 mx-auto mb-4">
                         <section class="layout-2">
                          <div class="bg-banner_2">
                              <div class="banner-wrapper banners">

                                  <div class="banner-wrapper-infor">
                                      <div class="info">
                                          <div class="content">
                                              <h3 class="title-banner">@lang('trans_clovereadercom.get Up to')<br> <span>@lang('trans_clovereadercom.60%')</span> <br>@lang('trans_clovereadercom.auhthors')</h3> 
                                              @guest
                                                <a class="button" href="#pricing">
                                                @lang('trans_clovereadercom.Buy Now')</a>
                                              @else
                                                <a class="button" href="{{route('products')}}">
                                                @lang('trans_clovereadercom.Read More')</a> 
                                              @endguest
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                         </section>
                      </div>
                      <div class="col-12 col-md-6 col-xl-6 col-lg-6 mx-auto mb-4">
                          <section class="layout-3">
                              <div class="bg-banner_3">
                                  <div class="banner-wrapper banners">

                                      <div class="banner-wrapper-infor">
                                          <div class="info">
                                              <div class="content">
                                                  <h3 class="title-banner">@lang('trans_clovereadercom.shop')<br> <span>@lang('trans_clovereadercom.book')</span> <br>@lang('trans_clovereadercom.children\'s')</h3>  @guest
                                                <a class="button" href="#pricing">
                                                @lang('trans_clovereadercom.Buy Now')</a>
                                              @else
                                                <a class="button" href="{{route('products')}}">
                                                @lang('trans_clovereadercom.Read More')</a> 
                                              @endguest
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </section>
                      </div>
                  </div>

              </div>
              <div class="col-12 col-xl-4 col-lg-4 mx-auto">
                  <div class="row mx-auto">
                      <div class="col-12 mx-auto mb-4">
                          <section class="layout-4">
                              <div class="bg-banner_4">
                                  <div class="banner-wrapper banners">

                                      <div class="banner-wrapper-infor">
                                          <div class="info">
                                              <div class="content">
                                                  <h3 class="title-banner">@lang('trans_clovereadercom.shop') <br><span>@lang('trans_clovereadercom.Mind')<br>@lang('trans_clovereadercom.science')</span> <br>@lang('trans_clovereadercom.Literature')</h3>  @guest
                                                <a class="button" href="#pricing">
                                                @lang('trans_clovereadercom.Buy Now')</a>
                                              @else
                                                <a class="button" href="{{route('products')}}">
                                                @lang('trans_clovereadercom.Read More')</a> 
                                              @endguest
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </section>
                      </div>
                      <div class="col-12 mx-auto mb-4">
                          <section class="layout-5">
                              <div class="bg-banner_5">
                                  <div class="banner-wrapper banners">

                                      <div class="banner-wrapper-infor">
                                          <div class="info">
                                              <div class="content">
                                                  <h3 class="title-banner">@lang('trans_clovereadercom.shop') <br><span>@lang('trans_clovereadercom.Wellness')</span> <br>@lang('trans_clovereadercom.Book')</h3>  @guest
                                                <a class="button" href="#pricing">
                                                @lang('trans_clovereadercom.Buy Now')</a>
                                              @else
                                                <a class="button" href="{{route('products')}}">
                                                @lang('trans_clovereadercom.Read More')</a> 
                                              @endguest
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </section>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Feature Section start  -->
  <section class="feature-section fix section-padding">
      <div class="container">
          <div class="feature-wrapper">
              <div class="feature-box-items wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                  <div class="icon">
                      <i class="bi bi-envelope"></i>
                  </div>
                  <div class="content">
                      <h3>@lang('trans_clovereadercom.Mail Us')</h3>
                      <p><a href="mailto:{{ config('clovereadercom.SUPPORT_EMAIL') }}">{{ config('clovereadercom.SUPPORT_EMAIL') }}</a></p>
                  </div>
              </div>
              <div class="feature-box-items wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                  <div class="icon">
                      <i class="bi bi-telephone"></i>
                  </div>
                  <div class="content">
                      <h3>@lang('trans_clovereadercom.Call Us')</h3>
                      <p><a href="tel:{{ config('clovereadercom.SUPPORT_PHONE') }}">{{ config('clovereadercom.SUPPORT_PHONE') }}</a></p>
                  </div>
              </div>
              <div class="feature-box-items wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                  <div class="icon">
                      <i class="bi bi-credit-card"></i>
                  </div>
                  <div class="content">
                      <h3>@lang('trans_clovereadercom.Refund Policy')</h3>
                      <p>@lang('trans_clovereadercom.100% Refund in first 14 days after purchase')</p>
                  </div>
              </div>
          </div>
      </div>
  </section>



  <!-- Shop Section start  -->
  <section class="shop-section section-padding fix pt-0">
      <div class="container-fluid mx-auto">
          <div class="row mx-auto">
              <div class="shop_section_wrap">
                  <div class="section-title text-center">
                    <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; padding-left: 0px;">@lang('trans_clovereadercom.TOP RATED BOOKS')</h2>
                    <p class="wow fadeInUp mb-5" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">@lang('trans_clovereadercom.Discover  top-rated books, featuring gripping plots, unforgettable characters,') </br>@lang('trans_clovereadercom.and transformative stories that resonate with readers everywhere!')</p>
                  </div>
                  <div class="row mx-auto">
                      <div  class="col-lg-4 mb-5 mx-auto" style="width: 486.667px; margin-right: 30px; margin-bottom: 30px;">
                          <div class="cms-carousel-item mb-5 clearfix" style="background-color: #ededa6;color:black;">

                              <a class="title-product" style="color:black !important;" href="">@lang('trans_clovereadercom.For The Love Of Pets')</a>

                              <div class="wrap-info">
                                  <div class="excerpt-product" style="color:black !important;">@lang('trans_clovereadercom.Explores the deep bond between humans and animals, offering tips on pet care, training, and health')</div>
                                  
                                  @guest
                                    <a class="view-shop" style="color: black" href="#pricing">@lang('trans_clovereadercom.Buy Now') </a>
                                  @else
                                    <a class="view-shop" style="color: black" href="{{route('products')}}">@lang('trans_clovereadercom.Read More') </a>
                                  @endguest
                              </div>

                              <div class="post-thumbnail" >
                                <img fetchpriority="high"  src="{{asset('clovereadercom/') }}/img/book1.png" classs="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" style="margin-bottom: 10px;">

                            </div>
                          </div>
                      </div>
                      <div  class="col-lg-4 mb-5 mx-auto" style="width: 486.667px; margin-right: 30px; margin: bottom 30px;">
                          <div class="cms-carousel-item mb-5 clearfix" style="background-color: #191f12;color:white;">

                              <a class="title-product" style="color:white !important;" href="#">@lang('trans_clovereadercom.Ketogenic A Lifestyle Not')</a>

                              <div class="wrap-info">



                                  <div class="excerpt-product" style="color:white !important;">@lang('trans_clovereadercom.A Lifestyle, Not a Diet" emphasizes sustainable, long-term low-carb living.') </div>
                                  @guest
                                    <a class="view-shop" style="color: black" href="#pricing">@lang('trans_clovereadercom.Buy Now') </a>
                                  @else
                                    <a class="view-shop" style="color: black" href="{{route('products')}}">@lang('trans_clovereadercom.Read More') </a>
                                  @endguest                              </div>

                              <div class="post-thumbnail" >
                                <img fetchpriority="high"  src="{{asset('clovereadercom/') }}/img/book2.png" classs="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" style="margin-bottom: 1px;">
                              </div>
                          </div>
                      </div>
                      <div  class="col-lg-4 mb-5 mx-auto" style="width: 486.667px; margin-right: 30px; margin: bottom 30px;">
                        <div class="cms-carousel-item mb-5 clearfix" style="background-color: #392884;color:white;">


                              <a class="title-product" style="" href="">@lang('trans_clovereadercom.Science Of Long Distance')</a>

                              <div class="wrap-info">
                                  <div class="excerpt-product" style="">

                                    @lang('trans_clovereadercom.Explores endurance, stamina, and training optimization techniques.') </div>
                                    @guest
                                        <a class="view-shop" style="color: black" href="#pricing">@lang('trans_clovereadercom.Buy Now') </a>
                                    @else
                                        <a class="view-shop" style="color: black" href="{{route('products')}}">@lang('trans_clovereadercom.Read More') </a>
                                    @endguest                              
                                 </div>

                              <div class="post-thumbnail" >
                                <img fetchpriority="high"  src="{{asset('clovereadercom/') }}/img/book3.png" classs="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" style="margin-bottom: 20px;">
                            </div>
                          </div>
                      </div>
                      <div class="col-lg-4 mb-5 mx-auto" style="width: 486.667px; margin-right: 30px; margin: bottom 30px;">
                          <div class="cms-carousel-item mb-5 clearfix" style="background-color: #5a5b99;color:white;">

                              <a class="title-product" style="color:white !important;" href="">@lang('trans_clovereadercom.Expert Travel Insider')</a>

                              <div class="wrap-info">
                                  <div class="excerpt-product" style="color:white !important;">
                                    @lang('trans_clovereadercom.Reveals insider tips on hidden gems, smart travel budgeting, packing strategies, and maximizing your global adventures.') </div>
                                    @guest
                                        <a class="view-shop" style="color: black" href="#pricing">@lang('trans_clovereadercom.Buy Now') </a>
                                    @else
                                        <a class="view-shop" style="color: black" href="{{route('products')}}">@lang('trans_clovereadercom.Read More') </a>
                                    @endguest                              
                              </div>

                              <div class="post-thumbnail">
                                <img fetchpriority="high"  src="{{asset('clovereadercom/') }}/img/book4.png" classs="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" style="margin-bottom: 20px;">
                            </div>
                          </div>
                      </div>
                      <div class="col-lg-4 mb-5 mx-auto" style="width: 486.667px; margin-right: 30px; margin: bottom 30px;">
                          <div class="cms-carousel-item mb-5 clearfix" style="background-color: #24655e;color:white;">

                              <a class="title-product" style="color:white !important;" href="">@lang('trans_clovereadercom.RV Champion') </a>

                              <div class="wrap-info">
                                  <div class="excerpt-product" style="color:white !important;">@lang('trans_clovereadercom.provides expert advice on RV maintenance, route planning, campground tips, and how to make the most of road trips') </div>
                                  @guest
                                    <a class="view-shop" style="color: black" href="#pricing">@lang('trans_clovereadercom.Buy Now') </a>
                                  @else
                                    <a class="view-shop" style="color: black" href="{{route('products')}}">@lang('trans_clovereadercom.Read More') </a>
                                  @endguest                              
                                </div>

                              <div class="post-thumbnail" >
                                <img fetchpriority="high"  src="{{asset('clovereadercom/') }}/img/book5.png" classs="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" style="margin-bottom: 0px;">
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4 mb-5 mx-auto" style="width: 486.667px; margin-right: 30px; margin: bottom 30px;">
                          <div class="cms-carousel-item mb-5 clearfix" style="background-color: #121e28;color:white;">

                              <a class="title-product" style="color:white !important;" href="">@lang('trans_clovereadercom.Profiting From Product Creation') </a>

                              <div class="wrap-info">
                                  <div class="excerpt-product" style="color:white !important;">
                                    @lang('trans_clovereadercom.Teaches strategies for developing marketable products, maximizing profits, streamlining production, and effectively reaching your target audience.') </div>
                                    @guest
                                        <a class="view-shop" style="color: black" href="#pricing">@lang('trans_clovereadercom.Buy Now') </a>
                                    @else
                                        <a class="view-shop" style="color: black" href="{{route('products')}}">@lang('trans_clovereadercom.Read More') </a>
                                    @endguest                              </div>

                              <div class="post-thumbnail">
                                <img fetchpriority="high"  src="{{asset('clovereadercom/') }}/img/book6.png" classs="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" style="margin-bottom: 15px;">
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>


  <section class="elementor-section pb-5">
      <div class="container-fluid pb-5">
          <div class="row">
              <div class="col-lg-6">
                  <div class="bwp-widget-banner layout-6">
                      <div class="bg-banner_6">
                          <div class="banner-wrapper banners">

                              <div class="banner-wrapper-infor">
                                  <div class="info">
                                      <div class="content" style="color: transparent;border: transparent;">
                                          <h3 class="title-banner text-transparent">@lang('trans_clovereadercom.offer 50%')</h3>
                                          <div class="bwp-image-subtitle text-transparent"> @lang('trans_clovereadercom.Online') <br>store books</div>
                                          <div class="bwp-image-description text-transparent"> @lang('trans_clovereadercom.Buy now to get deals')</div> <a style="color: transparent;border: transparent;" class="button text-transparent" href="#">@lang('trans_clovereadercom.Buy Now')</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="bwp-widget-banner layout-7">
                      <div class="bg-banner_7">
                          <div class="banner-wrapper banners">

                              <div class="banner-wrapper-infor">
                                  <div class="info">
                                      <div class="content">
                                          <h3 class="title-banner">@lang('trans_clovereadercom.offer 50%')</h3>
                                          <div class="bwp-image-subtitle"> @lang('trans_clovereadercom.Online') <br>@lang('trans_clovereadercom.store books')</div>
                                          <div class="bwp-image-description"> @lang('trans_clovereadercom.Buy now to get deals')</div>
                                          @guest
                                           <a class="button" href="#pricing">@lang('trans_clovereadercom.Buy Now')</a>
                                          @else
                                           <a class="button" href="{{route('products')}}">@lang('trans_clovereadercom.Read More')</a>
                                          @endguest

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Book Catagories Section start  -->
  {{-- <section class="shop-section section-padding fix pt-0">
      <div class="container-fluid mx-auto">
          <div class="row mx-auto">
              <div class="shop_section_wrap">
                  <div class="section-title text-center">
                      <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; padding-left: 0px;">TOP RATED BOOKS</h2>
                      <p class="wow fadeInUp mb-5" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">Discover  top-rated books, featuring gripping plots, unforgettable characters, </br>and transformative stories that resonate with readers everywhere!</p>
                  </div>
                  <div class="row mx-auto">
                      <div  class="col-lg-4 mb-5 mx-auto" style="width: 486.667px; margin-right: 30px; margin-bottom: 30px;">
                          <div class="cms-carousel-item mb-5 clearfix" style="background-color: #ededa6;color:black;">

                              <a class="title-product" style="color:black !important;" href="">The Happy Lemon</a>

                              <div class="wrap-info">
                                  <div class="excerpt-product" style="color:black !important;">
                                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </div>
                                  <a class="view-shop" style="color: black" href="">Download <i class="zmdi zmdi-long-arrow-right"></i></a>
                              </div>

                              <div class="post-thumbnail" style="box-shadow:0 5px 8px#ededa6"><img fetchpriority="high" decoding="async" width="330" height="500" src="https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/the_happy_lemon.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/the_happy_lemon.jpg 330w, https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/the_happy_lemon-300x455.jpg 300w" sizes="(max-width: 330px) 100vw, 330px"></div>
                          </div>
                      </div>
                      <div  class="col-lg-4 mb-5 mx-auto" style="width: 486.667px; margin-right: 30px; margin: bottom 30px;">
                          <div class="cms-carousel-item mb-5 clearfix" style="background-color: #191f12;color:white;">

                              <a class="title-product" style="color:white !important;" href="#">Spells</a>

                              <div class="wrap-info">



                                  <div class="excerpt-product" style="color:white !important;">

                                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </div>
                                  <a class="view-shop" style="color: #191f12" href="#">Download <i class="zmdi zmdi-long-arrow-right"></i></a>
                              </div>

                              <div class="post-thumbnail" style="box-shadow:0 5px 8px#191f12"><img decoding="async" width="300" height="455" src="https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/book-2.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""></div>
                          </div>
                      </div>
                      <div  class="col-lg-4 mb-5 mx-auto" style="width: 486.667px; margin-right: 30px; margin: bottom 30px;">
                          <div class="cms-carousel-item mb-5 clearfix" style="background-image: url(&quot;https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/bg-product-1.jpg&quot;);background-size: cover;background-repeat: no-repeat;">

                              <a class="title-product" style="" href="">The World of Abstract Art</a>

                              <div class="wrap-info">
                                  <div class="excerpt-product" style="">

                                      Kroin eu sapien eget ligula consequat vestibulum sit amet in mauris. Integer commodo </div>
                                  <a class="view-shop" style="color: #4f4387" href="">Download <i class="zmdi zmdi-long-arrow-right"></i></a>
                              </div>

                              <div class="post-thumbnail" style="box-shadow:0 5px 8px#4f4387"><img decoding="async" width="299" height="455" src="https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/the_world.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""></div>
                          </div>
                      </div>
                      <div class="col-lg-4 mb-5 mx-auto" style="width: 486.667px; margin-right: 30px; margin: bottom 30px;">
                          <div class="cms-carousel-item mb-5 clearfix" style="background-color: #5a5b99;color:white;">

                              <a class="title-product" style="color:white !important;" href="">Nightshade</a>

                              <div class="wrap-info">
                                  <div class="excerpt-product" style="color:white !important;">
                                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </div>
                                  <a class="view-shop" style="color: #5a5b99" href="">Download <i class="zmdi zmdi-long-arrow-right"></i></a>
                              </div>

                              <div class="post-thumbnail" style="box-shadow:0 5px 8px#5a5b99; float: right;"><img loading="lazy" decoding="async" width="330" height="500" src="https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/nightshade.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/nightshade.jpg 330w, https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/nightshade-300x455.jpg 300w" sizes="(max-width: 330px) 100vw, 330px"></div>
                          </div>
                      </div>
                      <div class="col-lg-4 mb-5 mx-auto" style="width: 486.667px; margin-right: 30px; margin: bottom 30px;">
                          <div class="cms-carousel-item mb-5 clearfix" style="background-color: #24655e;color:white;">

                              <a class="title-product" style="color:white !important;" href="">History of Modern Architecture</a>

                              <div class="wrap-info">
                                  <div class="excerpt-product" style="color:white !important;">

                                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </div>
                                  <a class="view-shop" style="color: #24655e" href="">Download <i class="zmdi zmdi-long-arrow-right"></i></a>
                              </div>

                              <div class="post-thumbnail" style="box-shadow:0 5px 8px#24655e"><img loading="lazy" decoding="async" width="330" height="500" src="https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/history_of_modern_architecture.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/history_of_modern_architecture.jpg 330w, https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/history_of_modern_architecture-300x455.jpg 300w" sizes="(max-width: 330px) 100vw, 330px"></div>
                          </div>
                      </div>
                      <div class="col-lg-4 mb-5 mx-auto" style="width: 486.667px; margin-right: 30px; margin: bottom 30px;">
                          <div class="cms-carousel-item mb-5 clearfix" style="background-color: #121e28;color:white;">

                              <a class="title-product" style="color:white !important;" href="">The Happy Lemon</a>

                              <div class="wrap-info">
                                  <div class="excerpt-product" style="color:white !important;">
                                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </div>
                                  <a class="view-shop" style="color: #121e28" href="">Download <i class="zmdi zmdi-long-arrow-right"></i></a>
                              </div>

                              <div class="post-thumbnail" style="box-shadow:0 5px 8px#121e28"><img fetchpriority="high" decoding="async" width="330" height="500" src="https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/the_happy_lemon.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/the_happy_lemon.jpg 330w, https://demo.cmssuperheroes.com/themeforest/bookjunky/wp-content/uploads/the_happy_lemon-300x455.jpg 300w" sizes="(max-width: 330px) 100vw, 330px"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section> --}}



@include('templates.clovereadercom.partials.pricing')

@endsection

