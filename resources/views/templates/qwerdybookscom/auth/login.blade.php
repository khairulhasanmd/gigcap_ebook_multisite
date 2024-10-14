@extends('templates.qwerdybookscom.layouts.app')



@section('content')

<div id="smooth-wrapper">
    <div id="smooth-content">

<section class="login-page mt-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 order-2 px-5 my-auto">
                <div class="login-page__left">
                    <h1 class="text-white">@lang('trans_qwerdybookscom.Welcome back!')</h1>
                    <h3 class="login-page__title text-white">@lang('trans_qwerdybookscom.Sign Into Your Account')</h3>
                    <div class="login-page__form-box">
                        <form action="{{ route('signin.post') }}" method="post" class="login-page__form mt-5">
                            @csrf                          
                            <div class="mb-3">
                              <label for="email" class="form-label text-white">@lang('trans_qwerdybookscom.Email')*</label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="@lang('trans_qwerdybookscom.Email')*" autocomplete="email" autofocus required>
                              @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('email') }}</strong>
                                </span>
                              @endif
                            </div>
                          
                            <div class="mb-3">
                              <label for="password" class="form-label text-white">@lang('trans_qwerdybookscom.Password')</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="@lang('trans_qwerdybookscom.Password')" autocomplete="current-password" required>
                              @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                              </span>
                            @endif
                            </div>
                          
                            <div class="mb-3 form-check">
                              <div class="row">
                                <div class="col-6">
                                  <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
                                  <label class="form-check-label text-white" for="remember">@lang('trans_qwerdybookscom.Remember me')</label>
                                </div>
                                <div class="col-6 text-end">
                                  <a href="{{route('welcome')}}#pricing-section" class="text-decoration-none">@lang('trans_qwerdybookscom.Don\'t have an account?')</a>
                                </div>
                              </div>
                            </div>
                          
                            <div class="row g-3">
                              <div class="col-6">
                                <div class="btn_wrapper">
                                  <button type="submit" class="wc-btn-pink btn-hover btn-item"><span></span> @lang('trans_qwerdybookscom.Login') <i class="fa-solid fa-arrow-right"></i></button>
                                </div>
                              </div>
                              <div class="col-6">
                                  <div class="btn_wrapper">
                                      <a class="forget-pass" href="{{ route('password.request') }}">@lang('trans_qwerdybookscom.Forgot Password?')</a>
                                    
                                  </div>
                                </div>
                            </div>
                          </form>
                          
                    </div>
                </div>
            </div>
            <div class="col-lg-6 my-auto order-1 my-auto">
                <div class="login-page__right my-auto mx-auto " data-tilt>
                    <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/login.jpg" class="img-fluid login_img p-5" alt="Image not found">
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


