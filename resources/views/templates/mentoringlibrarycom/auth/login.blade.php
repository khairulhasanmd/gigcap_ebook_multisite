@extends('templates.mentoringlibrarycom.welcome.main')

@section('styles-files')
    
@endsection

@section('content')

  <!-- Start breadcrumb area -->
  <div class="breadcrumb-wrapper">
    <div class="book1">
        <img src="{{ asset ('mentoringlibrarycom/') }}/img/book3.png" alt="book">
    </div>
    <div class="book2">
        <img src="{{ asset ('mentoringlibrarycom/') }}/img/book4.png" alt="book">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1> @lang('Log In')</h1>
            <div class="page-header">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <li>
                        <a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">
                            @lang('Home')
                        </a>
                    </li>
                    <li>
                        <i class="bi bi-chevron-right"></i>
                    </li>
                    <li>
                        @lang('Log In')
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
                    <h1>@lang('Welcome back!')</h1>
                    <h3 class="login-page__title">@lang('Step into Your Account')</h3>
                    <div class="login-page__form-box">
                        <form action="{{ route('signin.post') }}" method="post" class="login-page__form mt-5">
                            @csrf                          
                            <div class="mb-3">
                              <label for="email" class="form-label">@lang('Email')*</label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="@lang('Email')" autocomplete="email" autofocus required>
                              @if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
                            </div>
                          
                            <div class="mb-3">
                              <label for="password" class="form-label">@lang('Password')</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="@lang('Password')" autocomplete="current-password" required>
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
                                  <label class="form-check-label" for="remember">@lang('Remember me')</label>
                                </div>
                                <div class="col-6 ">
                                  <a href="{{route('welcome')}}#pricing" class="text-decoration-none">@lang('Don\'t have an account?')</a>
                                </div>
                              </div>
                            </div>
                          
                            <div class="justify-content-between mt-2">
                              <input class="theme-btn px-1 me-2 mt-2" type="submit" value="@lang('Sign In')" >

                              <a href="{{ route('password.request') }}" class="theme-btn  mt-2">@lang('I forgot my password')</a>
                            </div>
                          </form>
                          
                    </div>
                </div>
            </div>
            <div class="col-lg-6 my-auto order-1 my-auto">
                <div class="login-page__right my-auto mx-auto " data-tilt>
                    <img src="{{ asset ('mentoringlibrarycom/') }}/img/signUpbg.jpg" class="img-fluid login_img" alt="Image not found">
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


