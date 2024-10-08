@extends('templates.clovereadercom.layouts.app')



@section('content')


        <!-- Start breadcrumb area -->
        <div class="breadcrumb-wrapper">

          <div class="container">
              <div class="page-heading">
                  <h1>Log In</h1>
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
                              Log In
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
                          <h1>Welcome back!</h1>
                          <h3 class="login-page__title">Step into Your Account</h3>
                          <div class="login-page__form-box">
                              <form action="{{ route('signin.post') }}" method="post" class="login-page__form mt-5">
                                @csrf

                                  <div class="mb-3">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email*" autocomplete="email" autofocus required>
                                  </div>

                                  <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="current-password" required>
                                  </div>

                                  <div class="mb-3 form-check">
                                    <div class="row">
                                      <div class="col-6">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
                                        <label class="form-check-label" for="remember">Remember me</label>
                                      </div>
                                      <div class="col-6 text-end">
                                        <a href="{{route('welcome')}}#pricing" class="text-decoration-none">Don't have an account?</a>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="justify-content-between mt-5">
                                    <input type="submit" class="nav_btn btn_hover px-4 py-2 me-2" value="Sign In">
                                    <a href="{{ route('password.request') }}" class=" px-4">I forgot my password</a>
                                  </div>
                                </form>

                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 my-auto order-1 my-auto">
                      <div class="login-page__right my-auto mx-auto " data-tilt>
                          <img src="{{asset('clovereadercom/') }}/img/signUpbg.jpg" class="img-fluid login_img rounded shadow-lg" alt="Image not found">
                      </div>
                  </div>
              </div>
          </div>
      </section>

@endsection

