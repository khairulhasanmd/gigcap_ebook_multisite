@inject('crm', 'App\Service\CmpApi')

<section>
	<div class="pricing pt-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="default-h text-center mb-5">
						<h3>Pricing</h3>
					</div>
				</div>
				<div class="col-12">
					<div class="pricing-table ps-lg-4">
						<div class="card">
							<div class="price-card text-center">
								<div class="price-area">
									<h5>{{ $crm->getPrice()->data->pricing_plan->currency }}</h5>
									<h2>{{ $crm->getPrice()->data->pricing_plan->subscription_price }}</h2>
									<h3>month</h3>
									<p>{{ config('api.TRIAL_DAYS') }}-days trial period / {{ $crm->getPrice()->data->pricing_plan->price }} {{ $crm->getPrice()->data->pricing_plan->currency }}</p>
								</div>
								<div class="price-f mb-4">
									<p><i class="fas fa-check"></i> All kind of books</p>
									<p><i class="fas fa-check"></i> Available stock</p>
									<p><i class="fas fa-check"></i> New Books Collections </p>
								</div>
								<div class="default-btn">
									<a class="arro" href="https://begin.ebookclub.io/en/c/ebook-club-signup"> Join Now <span>&#x21c0;</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
