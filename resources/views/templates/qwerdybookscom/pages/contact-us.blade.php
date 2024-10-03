@extends('templates.qwerdybookscom.layouts.app')

@section('content')


<div id="smooth-wrapper">
  <div id="smooth-content">
    <main>

      <!-- Contact area start -->
      <section class="contact__area-6">
        <div class="container g-0 line pt-120 pb-110">
          <span class="line-3"></span>
          <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
              <div class="sec-title-wrapper">
                <h2 class="sec-title-2 animation__char_come">Let’s get in touch</h2>
              </div>
            </div>
            {{-- <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
              <div class="contact__text">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea consequuntur numquam assumenda harum.</p>
              </div>
            </div> --}}
          </div>
          <div class="row contact__btm">
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
              <div class="contact__info">
                <h3 class="sub-title-anim-top animation__word_come">Don't be afraid man ! <br>say hello</h3>
                <ul>
                  <li><a href="tel:{{ config('qwerdybookscom.SUPPORT_PHONE') }}">{{ config('qwerdybookscom.SUPPORT_PHONE') }}</a></li>
                  <li><a href="mailto:{{ config('qwerdybookscom.SUPPORT_EMAIL') }}">{{ config('qwerdybookscom.SUPPORT_EMAIL') }}</a></li>
                  <li><span>{{ config('qwerdybookscom.COMPANY_NAME') }}, {{ config('qwerdybookscom.COMPANY_ADDRESS') }}, <br> {{ config('qwerdybookscom.COMPANY_CITY') }}, {{ config('qwerdybookscom.COMPANY_POSTCODE')}} {{ config('qwerdybookscom.COMPANY_COUNTRY') }}</span></li>
                  <li><span>Business Number : {{ config('qwerdybookscom.COMPANY_BUSINESS_NUMBER') }}</span></a></li>
                  <li><span>VAT Number : {{ config('qwerdybookscom.COMPANY_VAT_NUMBER') }}</span></a></li>


                </ul>
              </div>
            </div>
            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
              <div class="contact__form">
                <form  method="post" action="{{ route('contact-us') }}" role="form">
                  @csrf
                   <div class="row g-3">
                    <div class="col-xxl-6 col-xl-6 col-12">
                      <input type="text" name="firstname" placeholder="First name *">
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-12">
                      <input type="text" name="lastname" placeholder="last name *">
                    </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-xxl-6 col-xl-6 col-12">
                      <input type="email" name="email" placeholder="Email *">
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-12">
                      <input type="text" name="subject" placeholder="Subject *">
                    </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-12">
                      <textarea name="message" placeholder="Messages *"></textarea>
                    </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-12">
                      <div class="btn_wrapper">
                        <button class="wc-btn-primary btn-hover btn-item"><span></span> Send <br>Messages <i
                            class="fa-solid fa-arrow-right"></i></button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Contact area end -->

    </main>


</section>

@endsection

