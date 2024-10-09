 @extends('templates.qwerdybookscom.layouts.app')
 {{-- @extends('templates.01_initial.welcome.main') --}}


{{-- 
 @section('styles-files')
 	
 @endsection --}}


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

.hero__content {
  padding-top: 158px;
}

.hero__content a {
  max-width: 316px; 
}

.hero__sub-title {
  right: -287px;
  top: 308px;
}

@media only screen and (max-width: 1199px) {
  .hero__title {
    font-size: 95px;
  }

  .hero__sub-title {
  /* right: -182px; */
    top: 150px;
  }

  .hero__title-wrapper {
    max-width: 640px;
  }

}

@media only screen and (max-width: 991px) {
  .hero__title-wrapper {
    max-width: 480px;
  }

  .hero__title {
    font-size: 74px;
  }

  .hero__sub-title {
    max-width: 310px;
  }

}

</style>

<div id="smooth-wrapper">
    <div id="smooth-content">
      <main>

        <!-- Hero area start -->
        <section class="hero__area ">
          <div class="container">
            <div class="row">
              <div class="col-xxl-12">
                <div class="hero__content animation__hero_one">
                  <a href="@guest #pricing-section @else {{ route('products') }} @endguest">Increase Your Intellectual Growth With Our Library!<span>
                    <i class="fa-solid fa-arrow-right"></i></span></a>
                  <div class="hero__title-wrapper">
                    <h1 class="hero__title">Reading best Book with Explore our top digital literature </h1>
                    <p class="hero__sub-title">Unlock daily access to <span>our extensive library</span>, where you can explore a diverse selection of new books. Immerse yourself in countless stories and expand your knowledge with every turn of the page!</p>
                  </div>
                  <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/icon/arrow-down-big.png" alt="Arrow Down Icon">
                  {{-- <div class="experience">
                    <h2 class="title">25k+</h2>
                    <p>Books <br>Store</p>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>

          <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/hero/1/1-bg.png" alt="image" class="hero1_bg">
        </section>
        <!-- Hero area end -->


        <!-- Roll area start -->
        <section class="roll__area">
          <div class="swiper roll__slider">
            <div class="swiper-wrapper roll__wrapper">
              <div class="swiper-slide roll__slide">
                <h2>Reading</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>Study</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>Knowledge</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>Books</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>Script</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>Education</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>Learning</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>Read</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>Lesson</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>Information</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>Wisdom</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>News</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>experience</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>Learn</h2>
              </div>
              <div class="swiper-slide roll__slide">
                <h2>Exercise Book</h2>
              </div>
            </div>
          </div>
        </section>
        <!-- Roll area end -->


        <!-- About area start -->
        <section class="about__area">
          <div class="container line g-0 pt-140 pb-130">
            <span class="line-3"></span>
            <div class="row">
              <div class="col-xxl-12">
                <div class="about__title-wrapper">
                  <h3 class="sec-title title-anim">Consistent reading offers a variety of benefits that you’ll truly appreciate</h3>
                </div>

                <div class="about__content-wrapper">
                  <div class="about__img">
                    <div class="img-anim">
                      <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/about/1/1.jpg" alt="About Image" data-speed="0.3">
                    </div>

                    <div class="about__img-right">
                      <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/about/1/2.jpg" alt="About Image Right" data-speed="0.5">
                      <div class="shape">
                        <div class="secondary" data-speed="0.9">
                          <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/about/1/3.png" alt="book">
                        </div>
                        <div class="primary"></div>
                      </div>
                    </div>
                  </div>

                  <div class="about__content text-anim">
                    <p>Reading provides more than just relaxation and knowledge; it significantly influences our cognitive abilities in numerous ways. For instance, regular reading can enhance your communication skills and improve memory retention. Engaging with various narratives and perspectives stimulates creativity and strengthens your recall abilities. By immersing yourself in diverse literary worlds, you not only find entertainment but also challenge and refine your mental faculties.</p>

                    <div class="cursor-btn btn_wrapper">
                      <a class="btn-item wc-btn-primary btn-hover" href="@guest #pricing-section @else {{ route('products') }} @endguest"><span></span> More About <i
                          class="fa-solid fa-arrow-right"></i></a>

                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>
        <!-- About area end -->


        <!-- Service area start -->
        <section class="service__area pt-110 pb-150">
          <div class="container">
            <div class="row">
              <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                <div class="sec-title-wrapper wrap">
                  <h2 class="sec-sub-title title-anim">Favorite Books</h2>
                  <h3 class="sec-title title-anim">Best Book <br>All Time</h3>
                </div>
              </div>
              <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                <div class="service__top-text text-anim">
                  <p>Embrace regular reading to unlock benefits like greater knowledge, better focus, lower stress, increased empathy, and expanded vocabulary and creativity.</p>
                </div>
              </div>
              {{-- <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                <div class="service__top-btn">
                  <div class="btn_wrapper">
                    <a href="@guest #pricing-section @else {{ route('products') }} @endguest" class="btn-item wc-btn-secondary btn-hover"><span></span> View <br>all
                      services <i class="fa-solid fa-arrow-right"></i></a>
                  </div>
                </div>
              </div> --}}
            </div>

            <div class="service__list-wrapper">
              <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-0 col-md-0">
                  <div class="service__img-wrapper">
                    <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/books/1.png" alt="Service Image" class="service__img @guest blur-img @endguest img-1 active">
                    <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/books/book9.png" alt="Service Image" class="service__img @guest blur-img @endguest img-2 ">
                    <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/books/2.png" alt="Service Image" class="service__img @guest blur-img @endguest img-3">
                    <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/books/3.png" alt="Service Image" class="service__img @guest blur-img @endguest img-4">

                    <span class="shape-box-1 current">2024</span>
                    <span class="shape-box-2">2022</span>
                    <span class="shape-box-3">2023</span>
                    <span class="shape-box-4">2024</span>
                  </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-12 col-md-12">
                  <div class="service__list">
                    <a href="@guest #pricing-section @else {{ route('products') }} @endguest">
                      <div class="service__item animation_home1_service" data-service="1">
                        <div class="service__number"><span>01</span></div>
                        <div class="service__title-wrapper">
                          <h4 class="service__title  @guest blur-txt @endguest">7 Best Kettlebell</br> Exercise</h4>
                        </div>
                        <div class="service__text">
                          <p>Discover the seven best kettlebell exercises to enhance strength, improve flexibility, and boost overall fitness levels effectively.</p>
                        </div>
                        <div class="service__link">
                          <p><i class="fa-solid fa-arrow-right"></i></p>
                        </div>
                      </div>
                    </a>

                    <a href="@guest #pricing-section @else {{ route('products') }} @endguest">
                      <div class="service__item  animation_home1_service" data-service="2">
                        <div class="service__number"><span>02</span></div>
                        <div class="service__title-wrapper">
                          <h4 class="service__title  @guest blur-txt @endguest">An Introduction To Drones</h4>
                        </div>
                        <div class="service__text">
                          <p>Explore the basics, types, and uses of drones in various fields, from recreation to industry.</p>
                        </div>
                        <div class="service__link">
                          <p><i class="fa-solid fa-arrow-right"></i></p>
                        </div>
                      </div>
                    </a>

                    <a href="@guest #pricing-section @else {{ route('products') }} @endguest">
                      <div class="service__item  animation_home1_service" data-service="3">
                        <div class="service__number"><span>03</span></div>
                        <div class="service__title-wrapper">
                          <h4 class="service__title  @guest blur-txt @endguest">Functional Training Manua</h4>
                        </div>
                        <div class="service__text">
                          <p>A comprehensive guide to exercises that enhance strength, balance, and mobility for everyday activities and sports performance.</p>
                        </div>
                        <div class="service__link">
                          <p><i class="fa-solid fa-arrow-right"></i></p>
                        </div>
                      </div>
                    </a>

                    <a href="@guest #pricing-section @else {{ route('products') }} @endguest">
                      <div class="service__item  animation_home1_service" data-service="4">
                        <div class="service__number"><span>04</span></div>
                        <div class="service__title-wrapper">
                          <h4 class="service__title  @guest blur-txt @endguest">Understanding Your Lifes </h4>
                        </div>
                        <div class="service__text">
                          <p>A guide to self-reflection, personal growth, and finding balance in relationships, work, and overall well-being.</p>
                        </div>
                        <div class="service__link">
                          <p><i class="fa-solid fa-arrow-right"></i></p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Service area end -->

        <!-- Portfolio area start -->
        {{-- <section class="portfolio__area pb-140">
          <div class="container">
            <div class="row top_row">

              <h2 class="portfolio__text">Books</h2>
              <div class="portfolio__list-1">
                <div class="portfolio__item">
                  <a href="@guest #pricing-section @else {{ route('products') }} @endguest"><img class="mover " src="{{ asset ('qwerdybookscom/') }}/assets/imgs/books/book1.png"
                      alt="Portfolio Image"></a>
                  <div class="portfolio__info">
                    <h3 class="portfolio__title">5 Habits To Go From Chaos</h3>
                    <p >02 May 2024</p>
                  </div>
                </div>
                <div class="portfolio__item">
                  <a href="@guest #pricing-section @else {{ route('products') }} @endguest"><img class="" src="{{ asset ('qwerdybookscom/') }}/assets/imgs/books/book2.png" alt="Portfolio Image"></a>
                  <div class="portfolio__info">
                    <h3 class="portfolio__title">5 Ways To Develop Your Le</h3>
                    <p >02 May 2024</p>
                  </div>
                </div>
                <div class="portfolio__item">
                  <a href="@guest #pricing-section @else {{ route('products') }} @endguest"><img class="" src="{{ asset ('qwerdybookscom/') }}/assets/imgs/books/book3.png" alt="Portfolio Image"></a>
                  <div class="portfolio__info">
                    <h3 class="portfolio__title">7 Powerful Ways To Gain Clarity</h3>
                    <p >02 May 2024</p>
                  </div>
                </div>
                <div class="portfolio__item">
                  <a href="@guest #pricing-section @else {{ route('products') }} @endguest"><img class="" src="{{ asset ('qwerdybookscom/') }}/assets/imgs/books/book4.png" alt="Portfolio Image"></a>
                  <div class="portfolio__info">
                    <h3 class="portfolio__title">Being Weird Is Your Superposer</h3>
                    <p >02 May 2024</p>
                  </div>
                </div>
                <div class="portfolio__item">
                  <a href="@guest #pricing-section @else {{ route('products') }} @endguest"><img class="" src="{{ asset ('qwerdybookscom/') }}/assets/imgs/books/book5.png" alt="Portfolio Image"></a>
                  <div class="portfolio__info">
                    <h3 class="portfolio__title">Less Phone , More Time</h3>
                    <p >02 May 2024</p>
                  </div>
                </div>
                <div class="portfolio__item">
                  <a href="@guest #pricing-section @else {{ route('products') }} @endguest"><img class="" src="{{ asset ('qwerdybookscom/') }}/assets/imgs/books/book6.png" alt="Portfolio Image"></a>
                  <div class="portfolio__info">
                    <h3 class="portfolio__title">Live Your Ultimate Life</h3>
                    <p >02 May 2021</p>
                  </div>
                </div>

              </div>
            </div>

            <div class="row row_bottom">
              <div class="col-xxl-12">
                <div class="portfolio__btn btn_wrapper" data-speed="1" data-lag="0.2">
                  <a class="wc-btn-secondary btn-hover btn-item" href="@guest #pricing-section @else {{ route('products') }} @endguest" nclick="handleSignUpClick()"><span></span>View <br>all
                    Books <i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </section> --}}
        <!-- Portfolio area end -->






@include('templates.qwerdybookscom.partials.pricing')

@endsection

