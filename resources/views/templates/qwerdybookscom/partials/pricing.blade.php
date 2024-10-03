           <!-- Price area start -->
           <section class="price__area pt-130 pb-140">
            <div class="container">
              <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                  <div class="sec-title-wrapper">
                    <h2 class="sec-sub-title title-anim">Pricing Table</h2>
                    <h3 class="sec-title title-anim">Nurture your mind with kindness</h3>
                    <p>Be kind to your mind by prioritizing self-care, practicing mindfulness, and embracing positive thoughts. Take breaks, manage stress effectively, and allow yourself the time to rest and recharge for better mental health.</p>
                  </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">


                @foreach($prices as $products)

                    <div class="price__table">
                      <div class="price__item animation_from_bottom">
                        <div class="price__icon"><span><i class="fa-solid fa-check"></i></span></div>
                        <div class="price__info">
                          <h2 class="price__type">{{ strtoupper($products->external_product_id) }}</h2>
                          <h3 class="price__title">{{ $products->pricing_plan->subscription_interval_days }} days days for</h3>
                          <p>{{ $products->pricing_plan->subscription_trial_days }}-day trial period / 
                            {{ $products->pricing_plan->price }} {{ $products->pricing_plan->currency }}</p>
                        </div>
                        <div class="price__amount">
                          @if( $products->pricing_plan->subscription_interval_days > 14)
                            <h4 class="best-value">Best Value</h4>
                          @endif                          
                          <p>{{ $products->pricing_plan->currency }}  {{ $products->pricing_plan->subscription_price }}</p>
                        </div>
                      </div>
    
                      <div class="price__item animation_from_top">
                        <div class="price__info">
                          <h5 class="pb-2">This package features:</h5>

                          <ul>
                            @foreach ($products->all_benefits as $benefit)
                              <li class="pb-2" ><span><i class="fa-solid fa-check" style="background: rgb(201, 243, 29);padding: 2px 5px 2px 5px; border-radius: 5px;color: black;"></i> {{$benefit}}</li>
                      
                            @endforeach
                          </ul>
                        </div>
                        
                      </div>
                    </div>
                    <div class="price__btn btn_wrapper">
                      <a href="{{ $products->purchase_url }}" class="wc-btn-black btn-hover btn-item"><span></span> Buy <br> Now <i
                          class="fa-solid fa-arrow-right"></i></a>
                    </div>

                  @endforeach


                </div>
              </div>
            </div>
          </section>        
        
        