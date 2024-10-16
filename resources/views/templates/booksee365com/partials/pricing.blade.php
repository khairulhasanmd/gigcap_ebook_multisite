<section id="pricing-section">
    <div class="pricing overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="default-heading text-center mb-5">
                        <h3> @lang('trans_booksee365.Pricing')</h3>
                    </div>
                </div>
                <div class="col-12 d-lg-flex">
                    @foreach($prices as $products)
                        <div class="pricing-table">
                            <div class="cards mb-3">
                                <div class="price-card">
                                    <div class="std-tag mb-4">
                                        <h4 style="text-decoration:underline;">{{ strtoupper($products->external_product_id) }}</h4>
                                    </div>
                                    <div class="price-area">
                                        <h2><span>{{ $products->pricing_plan->currency }}</span>
                                            {{ $products->pricing_plan->subscription_price }}
                                        </h2>
                                        <h3> / {{ $products->pricing_plan->subscription_interval_days }} @lang('trans_booksee365.days')</h3>
                                        <p class="price-txt mb-4 mt-3"> {{ $products->pricing_plan->subscription_trial_days }}-@lang('trans_booksee365.day trial period') / 
                                            {{ $products->pricing_plan->price }} {{ $products->pricing_plan->currency }}
                                        </p>
                                    </div>
                                    <div class="price-f mb-5">
					                @foreach ($products->all_benefits as $benefit)
        	                        	<p class="mb-3"><i class="fas fa-check-circle"></i> {{ $benefit }}</p>
	                            	@endforeach
                                    </div>
                                    <div class="price-btn">
                                    {{-- @if ($products->pricing_plan->subscription_interval_days == 14) --}}
                                                    {{-- <a href="{{ $products->purchase_url }}" style="pointer-events: none; cursor: default;" class="text-center">Unavailable</a> --}}
                                    {{-- @else --}}
                                        <a href="{{ $products->purchase_url }}" class="text-center">@lang('trans_booksee365.Get Started')</a>
                                    {{-- @endif  --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
