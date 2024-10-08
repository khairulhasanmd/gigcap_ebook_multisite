@extends('templates.clovereadercom.layouts.app')



@section('content')


        <!-- Start breadcrumb area -->
        <div class="breadcrumb-wrapper">

          <div class="container">
              <div class="page-heading">
                  <h1>Forgot your password ?
                  </h1>
                  <div class="page-header">
                      <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; padding-left: 0px;">
                          <li>
                              <a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">
                                  Home
                              </a>
                          </li>
                          <li>
                              <i class="bi bi-chevron-right"></i>
                          </li>
                          <li>
                            Reset Password
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
                          <h3 class="login-page__title">Reset Your Password</h3>
                          <div class="login-page__form-box">
                              <form action="{{ route('password.email') }}" method="post" class="login-page__form mt-5">
                                @csrf

                                  <div class="mb-3">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email*" autocomplete="email" autofocus required>
                                  </div>

                              

                                  <div class="justify-content-between mt-5">
                                    <input type="submit" class="nav_btn btn_hover px-1 py-2 me-2" value="Send Reset Password Link">
                                    <a href="{{ route('login') }}" class=" px-4">Login ?</a>
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
          <h1 class="sub-title-anim-top animation__word_come text-white">Reset your <br>password</h1>
        </div>
      </div>
      <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
        <div class="contact__form">
          <form method="post" action="{{ route('password.email') }}">
            @csrf
            <div class="row g-3">
              <div class="col-12">
                  <input type="email" placeholder="Email" name="email" class=" "  autocomplete="email" autofocus required >
              </div>
            </div>
            <div class="row g-3">
              <div class="col-6">
                <div class="btn_wrapper">
                  <button type="submit" class="wc-btn-pink btn-hover btn-item"><span></span> Submit <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>
              <div class="col-6">
                  <div class="btn_wrapper">
                      <a class="forget-pass" href="{{ route('login') }}">Login</a>
                    
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
