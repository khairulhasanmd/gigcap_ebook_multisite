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


 <!-- Pricing Section -->
 <section id="pricing" class="pricing section py-5">
  <!-- Section Title -->
  <div class="section-title text-center">
      <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; padding-left: 0px;">@lang('trans_clovereadercom.PRICING PLAN')</h2>
      <p class="wow fadeInUp mb-5 " data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">@lang('trans_clovereadercom.Practice self-care, embrace mindfulness,') </br>@lang('trans_clovereadercom.think positively, take necessary breaks, and recharge for a balanced life')</p>
  </div>

  <div class="container">

    <div class="row gy-4">




      @foreach($prices as $products)

          <div class="col-lg-4 col-md-6 mx-auto" data-aos="zoom-in" data-aos-delay="200">
            <div class="pricing-tem">
              <h3 >{{ strtoupper($products->external_product_id) }}</h3>
              <div class="price"><sup>{{ $products->pricing_plan->currency }}</sup>{{ $products->pricing_plan->subscription_price }}<span> / {{ $products->pricing_plan->subscription_interval_days }} days</span></div>
              <div class="icon">
                  <p>{{ $products->pricing_plan->subscription_trial_days }}-day trial period / 
                    {{ $products->pricing_plan->price }} {{ $products->pricing_plan->currency }}</p>
              </div>
              <ul>
                @foreach ($products->all_benefits as $benefit)
                  <li>{{$benefit}}</li>
                @endforeach
              </ul>
              <a href="{{ $products->purchase_url }}" class="btn-buy py-3">@lang('trans_clovereadercom.Buy Now')</a>
            </div>
          </div><!-- End Pricing Item -->

      @endforeach


    </div><!-- End pricing row -->

  </div>

</section><!-- /Pricing Section -->


