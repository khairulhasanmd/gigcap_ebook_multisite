<section>
	<div class="pricing pt-5 overflow-hidden">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="top-heading mb-5">
						<div class="default-heading primary-color text-center mb-4 animate__animated animate__fadeInUp wow">
							<h3> Pricing</h3>
						</div>
					</div>
				</div>
				<div class="col-12">
					@php
						// dd($prices);
					@endphp
					<div class="pricing-table row justify-content-center" style="width: 100%;">
						@foreach($prices as $products)
							<div class="cards col-4" style="margin-left: 4px; margin-right: 4px;">
								<div class="price-card text-center">
									<div class="price-f secondary-color mb-4">
										@foreach ($products->all_benefits as $benefit)
											<p class="mb-3 price-area animate__animated animate__fadeInRight wow"><i class="fa-solid fa-circle-check"></i> {{ $benefit }}</p>
										@endforeach
											{{-- <p class="mb-3 price-area animate__animated animate__fadeInRight wow"><i class="fa-solid fa-circle-check"></i> All kind of books</p>
											<p class="mb-3 price-area animate__animated animate__fadeInRight animate__delay-300ms wow"><i class="fa-solid fa-circle-check"></i> Available stock</p>
											<p class="mb-3 price-area animate__animated animate__fadeInRight animate__delay-600ms wow"><i class="fa-solid fa-circle-check"></i> New Books Collections</p> --}}
									</div>
									<div class="price-area animate__animated animate__fadeInUp wow">
										<h5>{{ $products->pricing_plan->currency }}</h5>
										<h2>{{ $products->pricing_plan->subscription_price }}</h2>
										<h3> {{ $products->pricing_plan->subscription_interval_days }} /days</h3>
										<p class="price-area animate__animated animate__fadeInUp animate__delay-800ms wow mb-5 mt-3">{{ $products->pricing_plan->subscription_trial_days }}-days trial period / {{ floor($products->pricing_plan->price) }} {{ $products->pricing_plan->currency }}</p>
									</div>
									<div class="price-btn">
										@if ($products->pricing_plan->subscription_interval_days == 14)
										<a href="{{ str_replace('en',app()->getLocale(),$products->purchase_url) }}" class="animate__animated animate__bounceInLeft wow">Not Available</a>
										@else
										<a href="{{ str_replace('en',app()->getLocale(),$products->purchase_url) }}" class="animate__animated animate__bounceInLeft wow">Register Now</a>
										@endif

										{{-- <a href="{{ str_replace('en',app()->getLocale(),$products->purchase_url) }}" class="animate__animated animate__bounceInLeft wow">Register Now</a> --}}
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="bdr bdr-1">
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</section>

