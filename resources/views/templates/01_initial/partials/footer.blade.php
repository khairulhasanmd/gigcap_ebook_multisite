<div class="footer overflow-hidden">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="footer-logo animate__animated animate__fadeInUp wow">
					<a href="@guest {{ route('welcome') }} @else
                            {{ route('products') }}
                            @endguest"><img src="{{ asset('theme2/images/logo.png') }}" alt="BookSync"></a>
				</div>
				<div class="footer-info mb-4 mb-lg-0">
					<h4 class="primary-color">Start reading with BookInSync!</h4>
					<p class="secondary-color">A wealth of knowledge awaits.</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="footer-link mb-3 mb-lg-0">
					<h4 class="primary-color animate__animated animate__fadeIn wow">Usefull Links</h4>
					<div class="footer-menu">
						<ul>
							<li><a href="{{ route('about') }}" class="animate__animated animate__fadeInRight wow"> About Us</a></li>
							<li><a href="{{ route('contact') }}" class="animate__animated animate__fadeInRight animate__delay-300ms wow"> Contact Us</a></li>
							<li><a href="{{ route('terms.locale') }}" class="animate__animated animate__fadeInRight animate__delay-600ms wow"> Terms of service</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="footer-contact primary-color mb-3 mb-lg-0">
					<h4>Contact Information</h4>
					<div class="footer-address">
						<ul class="list-unstyled">
							<li><a href="mailto:{{ config('api.SUPPORT_EMAIL') }}" class="animate__animated animate__fadeInRight wow"><i class="fas fa-envelope"></i>  Mail: {{ config('api.SUPPORT_EMAIL') }}</a></li>
							<li><a href="tel:{{ config('api.SUPPORT_PHONE') }}" class="animate__animated animate__fadeInRight animate__delay-400ms wow"><i class="fas fa-phone"></i> Call: {{ config('api.SUPPORT_PHONE') }}</a></li>
							<li class="adds animate__animated animate__fadeInRight animate__delay-800ms wow"><i class="fas fa-map-marker-alt"></i> Address: {{ config('api.COMPANY_ADDRESS') }} {{ config('api.COMPANY_CITY') }}, {{ config('api.COMPANY_POSTCODE')}}, {{ config('api.COMPANY_COUNTRY') }}</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="c-card pt-lg-5 pt-4">
					<div class="row">
						<div class="col-6">
							<div class="master-card text-end animate__animated animate__bounceInLeft wow">
								<img src="{{ asset('theme2/images/master.png') }}" alt="master-card">
							</div>
						</div>
						<div class="col-6">
							<div class="visa-card text-start animate__animated animate__bounceInRight wow">
								<img src="{{ asset('theme2/images/visa.png') }}" alt="visa-card">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer-end overflow-hidden">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="footer-end-content text-lg-start text-center mt-lg-1 py-4 animate__animated animate__fadeIn wow">
					<p>Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}. {{ config('api.COMPANY_NAME') }} -  CR: {{ config('api.COMPANY_BUSINESS_NUMBER') }} - {{ config('api.COMPANY_ADDRESS') }}, {{ config('api.COMPANY_CITY') }} {{ config('api.COMPANY_POSTCODE')}},  {{ config('api.COMPANY_COUNTRY') }} | @lang('All rights reserved.')</p>
				</div>
			</div>
		</div>
	</div>
</div>