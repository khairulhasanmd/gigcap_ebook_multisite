<footer class="footer-wrap footer-1">
	<div class="footer-widgets">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="single-footer-wid site_info_widget">
						<div class="site-logo">
							<a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest"><img src="{{ asset('booksee365com/theme//img/w_logo.png') }}" alt="w_logo"></a>
							<p>@lang('trans_booksee365.that\'s the magic of books—they let you journey to far-off places without ever leaving your seat.')</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-12 offset-lg-1">
					<div class="single-footer-wid">
						<div class="wid-title">
							<h4>@lang('trans_booksee365.Useful Links')</h4>
						</div>
						<div class="special-menu">
							<ul>
	

								<li><a href="{{ route('about') }}">@lang('trans_booksee365.About Us')</a></li>
								<li><a href="{{ route('contact') }}">@lang('trans_booksee365.Contact Us')</a></li>
								<li><a href="{{ LaravelLocalization::localizeUrl('/service/privacy_policy') }}">@lang('trans_booksee365.Privacy Policy')</a></li>
								<li><a href="{{ LaravelLocalization::localizeUrl('/service/terms_of_service') }}">@lang('trans_booksee365.Terms & Conditions')</a></li>
								<li><a href="{{ LaravelLocalization::localizeUrl('/service/subscription_policy') }}">@lang('trans_booksee365.Subscription Packages')</a></li>
                                                                <li><a href="{{ route('unsubscribe') }}">@lang('trans_booksee365.Cancel Subscription')</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-12">
					<div class="single-footer-wid">
						<div class="wid-title">
							<h4>@lang('trans_booksee365.Contact Information')</h4>
						</div>
						<div class="special-menu">
							<ul>
								<li><a href="mailto:{{ config('booksee365com.SUPPORT_EMAIL') }}" style="text-transform:none!important;">@lang('trans_booksee365.Email'): {{ config('booksee365com.SUPPORT_EMAIL') }}</a></li>
								<li><a href="tel:{{ config('booksee365com.SUPPORT_PHONE') }}">@lang('trans_booksee365.Call'): {{ config('booksee365com.SUPPORT_PHONE') }}</a></li>
								<li><p class="mb-3">@lang('trans_booksee365.Working Hours'): {{ config('booksee365com.SUPPORT_HOURS') }}</p></li>
								<li><p>@lang('trans_booksee365.Address'): {{ config('booksee365com.COMPANY_ADDRESS') }}
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
						<p >@lang('trans_booksee365.Copyright') &copy; {{ config('booksee365com.CONCEPT_NAME') }} {{ date('Y') }}. {{ config('booksee365com.COMPANY_NAME') }} - {{ config('booksee365com.COMPANY_BUSINESS_NUMBER') }} - {{ config('booksee365com.COMPANY_ADDRESS') }}, {{ config('booksee365com.COMPANY_CITY') }} {{ config('booksee365com.COMPANY_POSTCODE')}},  {{ config('booksee365com.COMPANY_COUNTRY') }} | @lang('trans_booksee365.All rights reserved.')</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
