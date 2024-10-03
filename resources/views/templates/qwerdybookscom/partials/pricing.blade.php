        <!-- Price area start -->
        <section class="price__area pt-130 pb-140 pricing-section" id="pricing-section">
          <div class="container">
            <div class="row">
              <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="sec-title-wrapper">
                  <h2 class="sec-sub-title title-anim">Pricing Table</h2>
                  <h3 class="sec-title title-anim">Nurture your mind with kindness</h3>
                  <p>Be kind to your mind by prioritizing self-care, practicing mindfulness, and embracing positive thoughts. Take breaks, manage stress effectively, and allow yourself the time to rest and recharge for better mental health.</p>
                </div>
              </div>

              <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 col-12">

                @foreach($prices as $products)
                  <div class="price__table">
                    <div class="price__item animation_from_bottom ">
                    <div class="row">
                      <div class="col-6">
                        {{-- <div class="price__icon"><span><i class="fa-solid fa-check"></i></span></div> --}}
                        <div class="price__info">
                          <h2 class="price__type" style="border:1px solid rgb(201, 243, 29) !important">{{ strtoupper($products->external_product_id) }}</h2>
                          <h3 class="price__title">
                            {{ $products->pricing_plan->currency }}  {{ $products->pricing_plan->subscription_price }} for {{ $products->pricing_plan->subscription_interval_days }} days
                            </h3>
                          <p>{{ $products->pricing_plan->subscription_trial_days }}-day trial period / 
                            {{ $products->pricing_plan->price }} {{ $products->pricing_plan->currency }}</p>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="price__amount text-white ">
                          @if( $products->pricing_plan->subscription_interval_days > 14)
                          <h4 class="best-value">Best Value</h4>

                          @endif
                          <h5 class="pb-2">This package features:</h5>

                          <ul>
                            @foreach ($products->all_benefits as $benefit)
                              <li class="pb-2" ><span><i class="fa-solid fa-check" style="background: rgb(201, 243, 29);padding: 2px 5px 2px 5px; border-radius: 5px;color: black;"></i> {{$benefit}}</li>
                      
                            @endforeach
                          </ul>
                        </div>
                      </div>
                      </div>


                    </div>
                  </div>
                  <div class="price__btn btn_wrapper">
                    <a href="{{ $products->purchase_url }}" class="wc-btn-black btn-hover btn-item"><span></span> Buy <br> Now <i
                        class="price__icon fa-solid fa-arrow-right"></i></a>
                  </div>
                @endforeach



              </div>
            </div>
          </div>
        </section>
        <!-- Price area end -->






{{-- 
<section id="pricing" class="pricing section py-5">

    <!-- Section Title -->
    <div class="container section-title py-5" data-aos="fade-up">
      <h2>Pricing Plan</h2>
      <p>Check Our Affordable Pricing<br></p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4">

        @foreach($prices as $products)

            <div class="col-lg-4 col-md-6 mx-auto" data-aos="zoom-in" data-aos-delay="200">
            <div class="pricing-tem">
                <h3 style="color: #0dcaf0;">{{ strtoupper($products->external_product_id) }}</h3>
                <div class="price"><sup>{{ $products->pricing_plan->currency }}</sup> {{ $products->pricing_plan->subscription_price }}<span> / {{ $products->pricing_plan->subscription_interval_days }} days</span></div>
                <div class="icon">
                    <p>{{ $products->pricing_plan->subscription_trial_days }}-day trial period /  {{ $products->pricing_plan->price }}  {{ $products->pricing_plan->currency }}</p>
                </div>
             
                <ul>
                    @foreach ($products->all_benefits as $benefit)
                    <li>{{ $benefit }}</li>

                    @endforeach
               
                </ul>
                <a href="{{ $products->purchase_url }}" class="btn-buy">Buy Now</a>
            </div>
            </div><!-- End Pricing Item -->
        @endforeach

      </div><!-- End pricing row -->

    </div>

  </section> --}}
