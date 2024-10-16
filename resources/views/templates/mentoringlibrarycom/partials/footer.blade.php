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
								<h3>@lang('trans_mentoringlibrarycom.Useful Links')</h3>
							</div>
							<ul class="list-area ps-0">
								<li>
									<a href="{{ route('about') }}">
										<i class="bi bi-chevron-right"></i>
										@lang('trans_mentoringlibrarycom.About Us')
									</a>
								</li>
								
								<li>
									<a href="{{ route('contact') }}">
										<i class="bi bi-chevron-right"></i>
										@lang('trans_mentoringlibrarycom.Contact Us')
									</a>
								</li>
								<li>
									<a href="{{ LaravelLocalization::localizeUrl('/service/privacy_policy') }}">
										<i class="bi bi-chevron-right"></i>
										@lang('trans_mentoringlibrarycom.Privacy Policy')
									</a>
								</li>
								<li>
									<a href="{{ LaravelLocalization::localizeUrl('/service/terms_of_service') }}">
										<i class="bi bi-chevron-right"></i>
										@lang('trans_mentoringlibrarycom.Terms & Conditions')
									</a>
								</li>
								<li>
									<a href="{{ LaravelLocalization::localizeUrl('/service/subscription_policy') }}">
										<i class="bi bi-chevron-right"></i>
										@lang('trans_mentoringlibrarycom.Subscription Packages')
									</a>
								</li>
								<li>
									<a href="{{ route('unsubscribe') }}">
										<i class="bi bi-chevron-right"></i>
										@lang('trans_mentoringlibrarycom.Cancel Subscription')
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
									@lang('trans_mentoringlibrarycom.Explore our catalog for leadership, marketing, and financial management insights.')

								</p>
								
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 pe-lg-5 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
						<div class="single-footer-widget">
							<div class="widget-head text-end">
								<h3>@lang('trans_mentoringlibrarycom.Contacts')</h3>
							</div>
							<ul class="list-area text-end text-white">
								<li>
									<i class="bi bi-geo-alt me-1"></i> @lang('trans_mentoringlibrarycom.Location'): {{ config('mentoringlibrarycom.COMPANY_ADDRESS') }}
								</li>
								<li>
									<i class="bi bi-clock me-1"></i> @lang('trans_mentoringlibrarycom.Opening Hours'): {{ config('mentoringlibrarycom.SUPPORT_HOURS') }}
								</li>
								<li>
									<i class="bi bi-envelope me-1"></i>@lang('trans_mentoringlibrarycom.Mail Us'): <a href="mailto:{{ config('mentoringlibrarycom.SUPPORT_EMAIL') }}"> {{ config('mentoringlibrarycom.SUPPORT_EMAIL') }}</a>
								</li>
								<li>
									<i class="bi bi-telephone me-1"></i> @lang('trans_mentoringlibrarycom.Call Us'): <a href="tel:{{ config('mentoringlibrarycom.SUPPORT_PHONE') }}">{{ config('mentoringlibrarycom.SUPPORT_PHONE') }}</a> 
								</li>                              
							</ul>
						</div>
					</div>
					<div class="col-lg-12 pt-md-5 pt-lg-0">
						<div class="social-icon d-flex align-items-center justify-content-center">
							<img src="{{ asset ('mentoringlibrarycom/') }}/img/visa.png" alt="">
							<img src="{{ asset ('mentoringlibrarycom/') }}/img/master.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="footer-wrapper align-items-center">
					<p class="wow fadeInLeft p-3 m-0 text-center" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
						@lang('trans_mentoringlibrarycom.Copyright') &copy; {{ CONFIG('mentoringlibrarycom.CONCEPT_NAME') }} {{ date('Y') }}. {{ config('mentoringlibrarycom.COMPANY_NAME') }} - {{ config('mentoringlibrarycom.COMPANY_BUSINESS_NUMBER') }} - {{ config('mentoringlibrarycom.COMPANY_ADDRESS') }}, {{ config('mentoringlibrarycom.COMPANY_CITY') }} {{ config('mentoringlibrarycom.COMPANY_POSTCODE')}},  {{ config('mentoringlibrarycom.COMPANY_COUNTRY') }} | @lang('trans_mentoringlibrarycom.All rights reserved.')
					</p>
				</div>
			</div>
		</div>
		
	</footer>
	
</section>
