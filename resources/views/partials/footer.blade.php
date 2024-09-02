

<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="footer-logo">
					<a href="@guest {{ route('welcome') }} @else
                            {{ route('products') }}
                            @endguest"><img src="{{ asset('theme/welcome/images/logo.png') }}" alt="Book club"></a>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="footer-link mb-3 mb-lg-0">
					<h4>Useful Links</h4>
					<div class="footer-menu">
						<ul class="list-unstyled">
							<li><a href="{{ route('about') }}"> About Us</a></li>
							<li><a href="{{ route('contact') }}"> Contact Us</a></li>
							<li><a href="{{ route('terms') }}"> Terms & Conditions</a></li>
							<!-- <li><a href="#"> Privacy Policy</a></li> -->
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="footer-contact mb-3 mb-lg-0">
					<h4>Contact Information</h4>
					<div class="footer-address">
						<ul class="list-unstyled">
							<li><a href="mailto:{{ config('api.SUPPORT_EMAIL') }}"><i class="fas fa-envelope"></i>  Mail:{{ config('api.SUPPORT_EMAIL') }}</a></li>
							<li><a href="tel:{{ config('api.SUPPORT_PHONE') }}"><i class="fas fa-phone-alt"></i> Call: {{ config('api.SUPPORT_PHONE') }}</a></li>
							<li class="adds"><i class="fas fa-map-marker-alt"></i> Address: {{ config('api.COMPANY_ADDRESS') }}
									{{ config('api.COMPANY_CITY') }}, {{ config('api.COMPANY_POSTCODE')}}, {{ config('api.COMPANY_COUNTRY') }}</li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- <div class="col-lg-3">
				<div class="news-letter mb-3 mb-lg-0">
					<h4>Follow Us</h4>
					<div class="footer-content">
						<div class="footer-social mb-4 mb-lg-0">
							<ul>
								<li><a href="#"> <i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"> <i class="fab fa-instagram"></i></a></li>
								<li><a href="#"> <i class="fab fa-twitter"></i></a></li>
								<li><a href="#"> <i class="fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="cta-form mt-3">
						<form>
							<input class="exp" type="text" placeholder="Enter Email">
							<input class="s-btn" type="submit" value="&#x21c0;">
						</form>
					</div>
				</div>
			</div> -->
			<div class="col-12">
				<div class="c-card pt-4">
					<div class="row">
						<div class="col-6">
							<div class="master-card text-end">
								<img src="{{ asset('theme/welcome/images/master.png') }}" alt="master-card">
							</div>
						</div>
						<div class="col-6">
							<div class="visa-card text-start">
								<img src="{{ asset('theme/welcome/images/visa.png') }}" alt="visa-card">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer-end">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="footer-end-content text-center py-4">
					<p>Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}. {{ config('api.COMPANY_NAME') }} -  CR: {{ config('api.COMPANY_BUSINESS_NUMBER') }} - {{ config('api.COMPANY_ADDRESS') }}, {{ config('api.COMPANY_CITY') }} {{ config('api.COMPANY_POSTCODE')}},  {{ config('api.COMPANY_COUNTRY') }} | @lang('All rights reserved.')</p>
				</div>
			</div>
		</div>
	</div>
</div>
