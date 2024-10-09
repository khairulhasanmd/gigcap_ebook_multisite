@extends('templates.clovereadercom.layouts.app')



@section('content')


        <!-- Start breadcrumb area -->
        <div class="breadcrumb-wrapper">

          <div class="container">
              <div class="page-heading">
                  <h1>@lang('trans_clovereadercom.Find Your Membership') 
                  </h1>
                  <div class="page-header">
                      <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; padding-left: 0px;">
                          <li>
                              <a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">
                                  @lang('trans_clovereadercom.Home')
                              </a>
                          </li>
                          <li>
                              <i class="bi bi-chevron-right"></i>
                          </li>
                          <li>
                            @lang('trans_clovereadercom.Find Membership')
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <!-- End breadcrumb area -->




      <section class="login-page ">
          <div class="container py-5">
              <div class="row justify-content-center">
                  <div class="col-lg-6 order-2 px-5 my-auto">
                      <div class="login-page__left">
                          {{-- <h1>Welcome back!</h1> --}}
                          {{-- <h3 class="login-page__title">Step into Your Account</h3> --}}
                          <div class="login-page__form-box">
                            <form method="post" action="{{ route('unsubscribeMembership') }}">
                              @csrf

                                  <div class="mb-3">
                                    <label for="passsord" class="form-label">@lang('trans_clovereadercom.Email')</label>
                                    <input type="email" class="form-control" id="passsord" name="email" placeholder="@lang('trans_clovereadercom.Email') *"  autofocus required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="repasssord" class="form-label">@lang('trans_clovereadercom.Last 4 digits of your card')*</label>
                                    <input type="password" class="form-control" id="repasssord" name="last4" placeholder="@lang('trans_clovereadercom.Last 4 digits of your card')*" maxlength="4"  autofocus required>
                                  </div>

                              

                                  <div class="justify-content-between mt-5">
                                    <input type="submit" class="nav_btn btn_hover px-1 py-2 me-2" value="@lang('trans_clovereadercom.Search')">
                                    {{-- <a href="{{ route('profile') }}" class=" px-4">@lang('trans_clovereadercom.Back To Profile')</a> --}}
                                  </div>
                                </form>

                          </div>
                      </div>
                  </div>
                  {{-- <div class="col-lg-6 my-auto order-1 my-auto">
                      <div class="login-page__right my-auto mx-auto " data-tilt>
                          <img src="{{asset('clovereadercom/') }}/img/signUpbg.jpg" class="img-fluid login_img rounded shadow-lg" alt="Image not found">
                      </div>
                  </div> --}}
              </div>
          </div>
      </section>


@endsection















@section('content')
<div id="smooth-wrapper">
  <div id="smooth-content">
<section class="contact__area-6 margin-top-100">
  <div class="container g-0 line pt-150 pb-110">
    <span class="line-3"></span>
      {{-- <h1 class="title-head-1">Password Reset</h1> --}}
    <div class="row contact__btm">
      <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
        <div class="contact__info">
          <h1 class="sub-title-anim-top animation__word_come text-white">Find Your <br>Membership</h1>
        </div>
      </div>
      <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
        <div class="contact__form">
          <form method="post" action="{{ route('unsubscribeMembership') }}">
            @csrf
            <div class="row g-3">
              <div class="col-12">
                
                  <input type="email" placeholder="Email" name="email" class=" "   autocomplete="off"  required >
                  @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
              </div>
            </div>
            <div class="row g-3">
              <div class="col-12">
                  <input type="password" placeholder=" Last 4 digits of your card" name="last4" maxlength="4" class=" "  autocomplete="off"  required >
              </div>
            </div>
            <div class="row g-3">
              <div class="col-6">
                <div class="btn_wrapper">
                  <button type="submit" class="wc-btn-pink btn-hover btn-item"><span></span> Search <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>
             
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    </main>


</section>

@endsection


