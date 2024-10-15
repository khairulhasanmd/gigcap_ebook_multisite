<style>
  /* @media only screen and (max-width: 767px) {
  .bottom-price {
    display: none !important;
  }
}
  @media only screen and (min-width: 768px) {
  .bottom-price {
    display: none !important;
  }
} */
</style>          
          
          
          <!-- Price area start -->
           <section class="price__area pt-130 pb-140 pricing-section" id="pricing-section">
            <div class="container">
              <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                  <div class="sec-title-wrapper">
                    <h2 class="sec-sub-title title-anim">@lang('trans_qwerdybookscom.Pricing Table')</h2>
                    <h3 class="sec-title title-anim">@lang('trans_qwerdybookscom.Nurture your mind with kindness')</h3>
                    <p>@lang('trans_qwerdybookscom.Be kind to your mind by prioritizing self-care, practicing mindfulness, and embracing positive thoughts. Take breaks, manage stress effectively, and allow yourself the time to rest and recharge for better mental health.')</p>
                  </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">


                @foreach($prices as $products)

                    <div class="price__table">
                      <div class="price__item ">
                        <div class="price__icon"><span><i class="fa-solid fa-check"></i></span></div>
                        <div class="price__info">
                          <h2 class="price__type">{{ strtoupper($products->external_product_id) }}</h2>
                          <h3 class="price__title">{{ $products->pricing_plan->subscription_interval_days }}@lang('trans_qwerdybookscom.days days for') <div class="main-price"> {{ $products->pricing_plan->currency }}  {{ $products->pricing_plan->subscription_price }} </div></h3>
                          <p>
                            @if (app()->getLocale() === 'fr')
                              période d'essai de {{ $products->pricing_plan->subscription_trial_days }} jours {{ $products->pricing_plan->price }} {{ $products->pricing_plan->currency }}
                            @else
                              {{ $products->pricing_plan->subscription_trial_days }}-@lang('trans_qwerdybookscom.day trial period') / 
                              {{ $products->pricing_plan->price }} {{ $products->pricing_plan->currency }}</p>
                            @endif
                        </div>
                        <div class="price__amount">
                          @if( $products->pricing_plan->subscription_interval_days > 14)
                            <h4 class="best-value">@lang('trans_qwerdybookscom.Best Value')</h4>
                          @endif                          
                          <p class="bottom-price pt-5 d-none">{{ $products->pricing_plan->currency }}  {{ $products->pricing_plan->subscription_price }}</p>
                        </div>
                        
                      </div>
    
                      <div class="price__item animation_from_top">
                        <div class="price__info">
                          <h5 class="pb-2">@lang('trans_qwerdybookscom.This package features:')</h5>

                          <ul>
                            @foreach ($products->all_benefits as $benefit)
                              <li class="pb-2" ><span><i class="fa-solid fa-check" style="background: rgb(201, 243, 29);padding: 2px 5px 2px 5px; border-radius: 5px;color: black;"></i> {{$benefit}}</li>
                      
                            @endforeach
                          </ul>
                        </div>
                        
                      </div>
                    </div>
                    <div class="price__btn btn_wrapper">
                      <a href="{{ $products->purchase_url }}" class="wc-btn-black btn-hover btn-item"><span></span> @lang('trans_qwerdybookscom.Buy') <br> @lang('trans_qwerdybookscom.Now') <i
                          class="fa-solid fa-arrow-right"></i></a>
                    </div>

                  @endforeach


                </div>
              </div>
            </div>
          </section>        
        
        