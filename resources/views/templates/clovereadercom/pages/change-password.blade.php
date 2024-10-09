@extends('templates.clovereadercom.layouts.app')



@section('content')


        <!-- Start breadcrumb area -->
        <div class="breadcrumb-wrapper">

          <div class="container">
              <div class="page-heading">
                  <h1>@lang('trans_clovereadercom.Change your password') 
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
                            @lang('trans_clovereadercom.Change Password')
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
                            <form method="post" action="{{ route('saveChangePassword') }}">
                              @csrf

                                  <div class="mb-3">
                                    <label for="passsord" class="form-label">@lang('trans_clovereadercom.Change Your New Password')</label>
                                    <input type="password" class="form-control" id="passsord" name="password" placeholder="@lang('trans_clovereadercom.Enter Your New Password') *" autocomplete="email" autofocus required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="repasssord" class="form-label">@lang('trans_clovereadercom.Repeat Your New Password')*</label>
                                    <input type="password" class="form-control" id="repasssord" name="password_confirmation" placeholder="@lang('trans_clovereadercom.Repeat Your New Password')*" autocomplete="email" autofocus required>
                                  </div>

                              

                                  <div class="justify-content-between mt-5">
                                    <input type="submit" class="nav_btn btn_hover px-1 py-2 me-2" value="@lang('trans_clovereadercom.Update Password')">
                                    <a href="{{ route('profile') }}" class=" px-4">@lang('trans_clovereadercom.Back To Profile')</a>
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




