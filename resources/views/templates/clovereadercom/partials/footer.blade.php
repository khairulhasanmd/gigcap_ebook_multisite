    <!-- Footer Section start  -->
    <section class="footer-section footer-bg">
      <footer >
          <div class="footer-widgets-wrapper">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-12 ps-lg-5 wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                          <div class="single-footer-widget">
                              <div class="widget-head">
                                  <h3>@lang('trans_clovereadercom.Useful Links')</h3>
                              </div>
                              <ul class="list-area ps-0">
                                  <li>
                                      <a href="{{ route('about') }}">
                                          <i class="bi bi-chevron-right"></i>
                                          @lang('trans_clovereadercom.About Us')
                                      </a>
                                  </li>

                                  <li>
                                      <a href="{{ route('contact') }}">
                                          <i class="bi bi-chevron-right"></i>
                                          @lang('trans_clovereadercom.Contact Us')
                                      </a>
                                  </li>
                                  <li>
                                      <a href="{{ LaravelLocalization::localizeUrl('service/privacy_policy') }}">
                                          <i class="bi bi-chevron-right"></i>
                                          @lang('trans_clovereadercom.Privacy Policy')
                                      </a>
                                  </li>
                                  <li>
                                      <a href="{{ LaravelLocalization::localizeUrl('service/terms_of_service') }}">
                                          <i class="bi bi-chevron-right"></i>
                                          @lang('trans_clovereadercom.Terms & Conditions')
                                      </a>
                                  </li>
                                  <li>
                                      <a href="{{ LaravelLocalization::localizeUrl('service/subscription_policy') }}">
                                          <i class="bi bi-chevron-right"></i>
                                          @lang('trans_clovereadercom.Subscription Packages')
                                      </a>
                                  </li>
                                  <li>
                                    <a href="{{ LaravelLocalization::localizeUrl('/complaints_and_disputes') }}">
                                      <i class="bi bi-chevron-right"></i>
                                     @lang('trans_clovereadercom.Complaints and Disputes')
                                    </a>
                                  </li>
                                  <li>
                                      <a href="{{ route('unsubscribe') }}">
                                          <i class="bi bi-chevron-right"></i>
                                          @lang('trans_clovereadercom.Cancel Subscription')
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-12 wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                          <div class="single-footer-widget">
                              <div class="widget-head text-center">
                                  <a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">
                                      <img src="{{asset('clovereadercom/') }}/img/logo.png" class="justify-content-center footer_logo" alt="logo-img">
                                  </a>
                              </div>
                              <div class="footer-content text-center">
                                  <p>
                                    @lang('trans_clovereadercom.Reading a book takes you on adventures, no movement needed.')
                                  </p>

                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-12 pe-lg-5 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                          <div class="single-footer-widget">
                              <div class="widget-head text-end">
                                  <h3>@lang('trans_clovereadercom.Contacts')</h3>
                              </div>
                              <ul class="list-area text-end text-white">
                                  <li>
                                      <i class="bi bi-geo-alt me-1"></i> @lang('trans_clovereadercom.Location:') {{ config($concept->template.'.COMPANY_ADDRESS') }}, <br>  {{ config($concept->template.'.COMPANY_POSTCODE')}},{{ config($concept->template.'.COMPANY_CITY') }}, {{ config($concept->template.'.COMPANY_COUNTRY') }}
                                  </li>
                                  <li>
                                      <i class="bi bi-clock me-1"></i> @lang('trans_clovereadercom.Opening Hours:') {{ config($concept->template.'.SUPPORT_HOURS') }}
                                  </li>
                                  <li>
                                      <i class="bi bi-envelope me-1"></i> @lang('trans_clovereadercom.Mail Us:') <a href="mailto::{{ config($concept->template.'.SUPPORT_EMAIL') }}"> {{ config($concept->template.'.SUPPORT_EMAIL') }}</a>
                                  </li>
                                  <li>
                                      <i class="bi bi-telephone me-1"></i> @lang('trans_clovereadercom.Call Us:') <a href="tel::{{ config($concept->template.'.SUPPORT_PHONE') }}">{{ config($concept->template.'.SUPPORT_PHONE') }}</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-lg-12 pt-md-5 pt-lg-0">
                          <div class="social-icon d-flex align-items-center justify-content-center">
                              <img src="{{asset('clovereadercom/') }}/img/visa.png" alt="">
                              <img src="{{asset('clovereadercom/') }}/img/master.png" alt="">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="footer-bottom">
              <div class="container">
                  <div class="footer-wrapper align-items-center">
                      <p class="wow fadeInLeft p-3 m-0 text-center" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                        @lang('trans_clovereadercom.Copyright') &copy; {{ CONFIG($concept->template.'.CONCEPT_NAME') }} {{ date('Y') }}. {{ config($concept->template.'.COMPANY_NAME') }} - {{ config($concept->template.'.COMPANY_BUSINESS_NUMBER') }} - {{ config($concept->template.'.COMPANY_ADDRESS') }}, {{ config($concept->template.'.COMPANY_CITY') }} {{ config($concept->template.'.COMPANY_POSTCODE')}},  {{ config($concept->template.'.COMPANY_COUNTRY') }} | @lang('trans_clovereadercom.All rights reserved.')                      </p>
                  </div>
              </div>
          </div>

      </footer>
     