  <!-- Footer Section start  -->
  <section class="footer-section footer-bg">
	<footer >
		<div class="footer-widgets-wrapper">
			<div class="plane-shape float-bob-y">
				<img src="{{ asset ('mentoringlibrarycom/') }}/img/plane-shape.png" alt="img">
			</div>
			<div class="container">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-12 ps-lg-5 wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
						<div class="single-footer-widget">
							<div class="widget-head">
								<h3>Useful Links</h3>
							</div>
							<ul class="list-area ps-0">
								<li>
									<a href="{{ route('about') }}">
										<i class="bi bi-chevron-right"></i>
										About Us
									</a>
								</li>
								
								<li>
									<a href="{{ route('contact') }}">
										<i class="bi bi-chevron-right"></i>
										Contact Us
									</a>
								</li>
								<li>
									<a href="{{ route('service', 'privacy_policy') }}">
										<i class="bi bi-chevron-right"></i>
										Privacy Policy
									</a>
								</li>
								<li>
									<a href="{{ route('service', 'terms_of_service') }}">
										<i class="bi bi-chevron-right"></i>
										Terms & Conditions
									</a>
								</li>
								<li>
									<a href="{{ route('service', 'subscription_policy') }}">
										<i class="bi bi-chevron-right"></i>
										Subscription Packages
									</a>
								</li>
								<li>
									<a href="{{ route('unsubscribe') }}">
										<i class="bi bi-chevron-right"></i>
										Cancel Subscription
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
						<div class="single-footer-widget">
							<div class="widget-head text-center">
								<a href="{{ route('welcome') }}">
									<img src="{{ asset ('mentoringlibrarycom/') }}/img/logo.png" class="justify-content-center footer_logo" alt="logo-img">
								</a>
							</div>
							<div class="footer-content text-center">
								<p>
									Phasellus ultricies aliquam volutpat ullamcorper laoreet neque, a lacinia curabitur
									lacinia mollis
								</p>
								
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 pe-lg-5 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
						<div class="single-footer-widget">
							<div class="widget-head text-end">
								<h3>Contacts</h3>
							</div>
							<ul class="list-area text-end text-white">
								<li>
									<i class="bi bi-geo-alt me-1"></i> Location: Sotiri Tsangari, 2 MELANDRINA 2, BLOCK D, Flat/Office 101 Agioi omologites, Nicosia 1095, Cyprus.
								</li>
								<li>
									<i class="bi bi-clock me-1"></i> Opening Hours: Monday - Friday 00:00-24:00 (CET), Weekends 9:00 - 17:00 (CET)
								</li>
								<li>
									<i class="bi bi-envelope me-1"></i> Mail Us: <a href="mailto:info@mentoringlibrary.com"> info@mentoringlibrary.com</a>
								</li>
								<li>
									<i class="bi bi-telephone me-1"></i> Call Us: <a href="tel:+012 345 6789">+012 345 6789</a> 
								</li>                              
							</ul>
						</div>
					</div>
					<div class="col-lg-12 pt-md-5 pt-lg-0">
						<div class="social-icon d-flex align-items-center justify-content-center">
							<img src="img/visa.png" alt="">
							<img src="img/master.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="footer-wrapper align-items-center">
					<p class="wow fadeInLeft p-3 m-0 text-center" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
						Copyright &copy; {{ CONFIG('booksee365com.CONCEPT_NAME') }} {{ date('Y') }}. {{ config('booksee365com.COMPANY_NAME') }} - {{ config('booksee365com.COMPANY_BUSINESS_NUMBER') }} - {{ config('booksee365com.COMPANY_ADDRESS') }}, {{ config('booksee365com.COMPANY_CITY') }} {{ config('booksee365com.COMPANY_POSTCODE')}},  {{ config('booksee365com.COMPANY_COUNTRY') }} | @lang('All rights reserved.')
					</p>
				</div>
			</div>
		</div>
		
	</footer>
	
</section>
