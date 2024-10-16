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
            <h1>@lang('trans_mentoringlibrarycom.Forgot your password ?')</h1>
            <div class="page-header">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <li>
                        <a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">
                            @lang('trans_mentoringlibrarycom.Home')
                        </a>
                    </li>
                    <li>
                        <i class="bi bi-chevron-right"></i>
                    </li>
                    <li>
                        @lang('trans_mentoringlibrarycom.Forgot password')
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
            <div class="col-lg-8 order-2 px-5 my-auto">
                <div class="login-page__left">
                    {{-- <h1>Welcome back!</h1> --}}
                    {{-- <h3 class="login-page__title">Cancel Subscription</h3> --}}
                    <div class="login-page__form-box">
                        <form method="post" action="{{ route('password.email') }}" class="row conact-form">
                            @csrf                          
                            <div class="mb-3">
                              <label for="email" class="form-label">@lang('trans_mentoringlibrarycom.Email')*</label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="@lang('trans_mentoringlibrarycom.Email')*" autocomplete="email" autofocus required>
                              @if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
                            </div>
            
                          
                            <div class="justify-content-between mt-5">
                              <input class="theme-btn px-4 me-2" type="submit" value="@lang('trans_mentoringlibrarycom.Send Reset Password Link')" >

                            </div>
                          </form>
                          
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</section>


@endsection
