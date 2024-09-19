@extends('templates.booksee365com.welcome.main')

@section('styles-files')
    
@endsection

@section('content')

<section class="page-banner-wrap bg-cover">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-heading">
                    <div class="sub-title">
                        <p>Welcome to our company</p>
                    </div>
                    <div class="page-title">
                        <h1>Cancel Subscription</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cancel Subscription</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="contact-page-wrap section-padding">
    <div class="container">
        <div class="row pb-0">
            <div class="col-12 text-center mb-20">
                <div class="section-title no-bg">
                    <h1>Are you truly interested in canceling the subscription?</h1>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="contact-form">
                    <form method="POST" action="{{ route('unsubscribeMembership') }}" class="row conact-form">
                        @csrf
                        <div class="col-12">
                            <div class="single-personal-info">
                                <label for="email">Email</label>
								<input type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" id="login_email" name="email" placeholder="@lang('Enter Your Email')" required>
								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-personal-info">
                                <label for="last4">Last 4 digits of your card</label>
								<input type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" id="last4" name="last4" maxlength="4" placeholder="@lang('Last 4 digits of your card')" required>
								@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
                            </div>
                        </div>
                        <div class="col-md-12 col-12 mb-4">
                            <input class="submit-btn" type="submit" value="Unsubscribe" style="width:100%;">
                        </div>                  
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="contact-form">
                    <img src="{{ asset('theme/img/home1/about_left.jpg') }}" alt="" class="img-fluid mb-md-5">
                </div>
            </div>
        </div>
    </div>
</section>


@endsection