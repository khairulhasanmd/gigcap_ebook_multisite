<footer class="footer-wrap footer-1">
	<div class="footer-widgets">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="single-footer-wid site_info_widget">
						<div class="site-logo">
							<a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest"><img src="{{ asset('booksee365com/theme//img/w_logo.png') }}" alt="w_logo"></a>
							<p>That's the magic of books—they let you journey to far-off places without ever leaving your seat.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-12 offset-lg-1">
					<div class="single-footer-wid">
						<div class="wid-title">
							<h4>Useful Links</h4>
						</div>
						<div class="special-menu">
							<ul>
	

								<li><a href="{{ route('about') }}">About Us</a></li>
								<li><a href="{{ route('contact') }}">Contact Us</a></li>
								<li><a href="{{ route('service', 'privacy_policy') }}">Privacy Policy</a></li>
								<li><a href="{{ route('service', 'terms_of_service') }}">Terms & Conditions</a></li>
								<li><a href="{{ route('service', 'subscription_policy') }}">Subscription Packages</a></li>
                                                                <li><a href="{{ route('unsubscribe') }}">Cancel Subscription</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-12">
					<div class="single-footer-wid">
						<div class="wid-title">
							<h4>Contact Information</h4>
						</div>
						<div class="special-menu">
							<ul>
								<li><a href="mailto:{{ config('booksee365com.SUPPORT_EMAIL') }}" style="text-transform:none!important;">Email: {{ config('booksee365com.SUPPORT_EMAIL') }}</a></li>
								<li><a href="tel:{{ config('booksee365com.SUPPORT_PHONE') }}">Call: {{ config('booksee365com.SUPPORT_PHONE') }}</a></li>
								<li><p class="mb-3">Working Hours: Monday - Friday 08-24, Weekends 10-18</p></li>
								<li><p>Address: {{ config('booksee365com.COMPANY_ADDRESS') }}
									{{ config('booksee365com.COMPANY_CITY') }}, {{ config('booksee365com.COMPANY_POSTCODE')}}, {{ config('booksee365com.COMPANY_COUNTRY') }}</p></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-8 offset-xl-4">
					<div class="c-card pt-5">
						<div class="row">
							<div class="col-6">
								<div class="master-card text-right">
									<img src="{{ asset('booksee365com/theme//img/master.png') }}" alt="master-card">
								</div>
							</div>
							<div class="col-6">
								<div class="visa-card text-left">
									<img src="{{ asset('booksee365com/theme//img/visa.png') }}" alt="visa-card">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-12 text-center">
					<div class="copyright-info text-white">
						<p >Copyright &copy; {{ config('booksee365com.CONCEPT_NAME') }} {{ date('Y') }}. {{ config('booksee365com.COMPANY_NAME') }} - {{ config('booksee365com.COMPANY_BUSINESS_NUMBER') }} - {{ config('booksee365com.COMPANY_ADDRESS') }}, {{ config('booksee365com.COMPANY_CITY') }} {{ config('booksee365com.COMPANY_POSTCODE')}},  {{ config('booksee365com.COMPANY_COUNTRY') }} | @lang('All rights reserved.')</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
