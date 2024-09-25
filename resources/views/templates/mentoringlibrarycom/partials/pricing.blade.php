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
                <h3 style="color: #0dcaf0;">Starter Plan</h3>
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

  </section>
