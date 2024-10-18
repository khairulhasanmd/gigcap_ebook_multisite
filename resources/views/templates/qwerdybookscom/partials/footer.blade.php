
      <!-- Footer area start -->
      <footer class="footer__area-6">
        <div class="container g-0 line_4">
          <div class="line-col-4">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
          </div>

          <div class="row pt-150">
            <div class="col-lg-4">
              <div class="footer__tol">
                <div class="footer__item-6">
                  {{-- <img class="footer__logo logo-light" src="{{ asset ('qwerdybookscom/') }}/assets/imgs/logo/site-logo-white-2.png" alt="Footer Logo"> --}}
                  <a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest" class="logo-light"><img class="footer__logo logo-light" src="{{ asset ('qwerdybookscom/') }}/assets/imgs/logo/site-logo-white-2.png" alt="Footer Logo"></a>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <h2 class="footer__item-title">@lang('trans_qwerdybookscom.Useful Links')</h2>
              <ul class="footer__info-6">
                <li>
                  <a href="{{ LaravelLocalization::localizeUrl('/about-us') }}">
                    <i class="bi bi-chevron-right"></i>
                    @lang('trans_qwerdybookscom.About Us')
                  </a>
                </li>
                <li>
                <li>
                  <a href="{{ LaravelLocalization::localizeUrl('/contact') }}">
                    <i class="bi bi-chevron-right"></i>
                    @lang('trans_qwerdybookscom.Contact Us')
                  </a>
                </li>
                <li>
                <li>
                  <a href="{{ LaravelLocalization::localizeUrl('service/privacy_policy') }}">
                    <i class="bi bi-chevron-right"></i>
                    @lang('trans_qwerdybookscom.Privacy Policy')
                  </a>
                </li>
                <li>
                  <a href="{{ LaravelLocalization::localizeUrl('service/terms_of_service') }}">
                    <i class="bi bi-chevron-right"></i>
                    @lang('trans_qwerdybookscom.Terms & Conditions')
                  </a>
                </li>
                <li>
                  <a href="{{ LaravelLocalization::localizeUrl('service/subscription_policy') }}">
                    <i class="bi bi-chevron-right"></i>
                   @lang('trans_qwerdybookscom.Subscription Packages')
                  </a>
                </li>
                <li>
                  <a href="{{ route('unsubscribe') }}">
                    <i class="bi bi-chevron-right"></i>
                    @lang('trans_qwerdybookscom.Cancel Subscription')
                  </a>
                </li>
              </ul>
              </div>
            <div class="col-lg-4">
                <div class="footer__item-6">
                  <ul class="footer__info-6">
                    <h2 class="footer__item-title">@lang('trans_qwerdybookscom.Contact Us')</h2>
                    <li><a href="tel:{{ config('qwerdybookscom.SUPPORT_PHONE') }}" class="phone">{{ config('qwerdybookscom.SUPPORT_PHONE') }} </a></li>
                    <li><a href="mailto:{{ config('qwerdybookscom.SUPPORT_EMAIL') }}">{{ config('qwerdybookscom.SUPPORT_EMAIL') }}</a></li>
                    
                    <h2 class="footer__item-title">@lang('trans_qwerdybookscom.Working Hours')</h2>
                    <li>{{ config('qwerdybookscom.SUPPORT_HOURS') }}</li>
                    
                    <h2 class="footer__item-title">@lang('trans_qwerdybookscom.Address')</h2>
                    <li>{{ config('qwerdybookscom.COMPANY_ADDRESS') }}, <br> {{ config('qwerdybookscom.COMPANY_POSTCODE')}},{{ config('qwerdybookscom.COMPANY_CITY') }}, {{ config('qwerdybookscom.COMPANY_COUNTRY') }} </li>

                  </ul>
                </div>
              
            </div>
          </div>
          <div class="row py-5">
            <div class="col-6">
                <div class="card-img text-end">
                    <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/master.png" alt="card">
                </div>
            </div>
            <div class="col-6">
                <div class="card-img text-start">
                    <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/visa.png" alt="card">
                </div>
            </div>
        </div>


            <div class="col-12">
              <div class="footer__btm-6">
                <div class="footer__copyright-6 text-md text-center">
                  <p>@lang('trans_qwerdybookscom.Copyright') &copy; {{ CONFIG('qwerdybookscom.CONCEPT_NAME') }} {{ date('Y') }}. {{ config('qwerdybookscom.COMPANY_NAME') }} - {{ config('qwerdybookscom.COMPANY_BUSINESS_NUMBER') }} - {{ config('qwerdybookscom.COMPANY_ADDRESS') }}, {{ config('qwerdybookscom.COMPANY_CITY') }} {{ config('qwerdybookscom.COMPANY_POSTCODE')}},  {{ config('qwerdybookscom.COMPANY_COUNTRY') }} | @lang('trans_qwerdybookscom.All rights reserved.')

                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- Footer area end -->
	  
	