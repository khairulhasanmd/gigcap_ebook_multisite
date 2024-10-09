@extends('templates.qwerdybookscom.layouts.app')


@section('content')
<div id="smooth-wrapper">
    <div id="smooth-content">
      <main>

        <!-- Hero area start -->
        <section class="hero__about">
          <div class="container g-0 line">
            <span class="line-3"></span>
            <div class="row">
              <div class="col-xxl-12">
                <div class="hero__about-content">
                  <h1 class="hero-title animation__word_come">Explore various genres tailored to suit every reader's unique taste.</h1>
                  <div class="hero__about-info">
                    <div class="hero__about-btn">
                      <div class="btn_wrapper">
                        <a href="#" class="wc-btn-primary btn-hover btn-item"><span></span> About <br>
                          More
                          <i class="fa-solid fa-arrow-right"></i></a>
                      </div>
                    </div>
                    <div class="hero__about-text title-anim">
                      <p>Discover a diverse selection of genres designed to cater to every reader's unique taste, ensuring there's something for everyone to enjoy.</p>
                    </div>
                    <div class="hero__about-award">
                      <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/about/book.png" alt="Best Studio Award">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Hero area end -->


        <!-- Story area start -->
        <section class="story__area">
          <div class="container g-0 line pt-140">
            <span class="line-3"></span>
            <div class="sec-title-wrapper">
              <div class="from-text">from <span>2020</span></div>

              <div class="row">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                  <h2 class="sec-sub-title title-anim">About Ebook Store</h2>
                  <h3 class="sec-title title-anim">Our story</h3>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
                  <div class="story__text">
                    <p>Founded with a passion for supporting entrepreneurs, we have carefully curated a diverse collection of valuable resources. Our journey began with a commitment to enhance the entrepreneurial experience, ensuring access to tools and knowledge that empower business growth.
                    </p>
                    <p>As we continue to evolve, our focus remains on understanding and meeting your needs. Together, we aim to foster innovation and success for every entrepreneur.</p>
                  </div>
                </div>

              </div>
            </div>
            <div class="row">
              <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                <div class="story__img-wrapper">
                  <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/story/1.jpg" alt="Story Thumbnail" class="w-100">
                </div>
              </div>
              <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                <div class="story__img-wrapper img-anim">
                  <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/story/2.jpg" alt="Story Thumbnail" data-speed="auto">
                </div>
              </div>
              <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                <div class="story__img-wrapper">
                  <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/story/3.jpg" alt="Story Thumbnail">
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Story area end -->

       

      </main>
  
      

@include('templates.qwerdybookscom.partials.pricing')

@endsection




