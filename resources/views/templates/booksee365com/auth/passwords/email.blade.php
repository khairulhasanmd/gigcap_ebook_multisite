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
                        <p>@lang('trans_booksee365.Welcome to our company')</p>
                    </div>
                    <div class="page-title">
                        <h1>@lang('trans_booksee365.Forgot Password')</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">@lang('trans_booksee365.Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('trans_booksee365.Forgot Password')</li>
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
                    <h1>@lang('trans_booksee365.Enter your email')</h1>
                </div>
            </div>

            <div class="col-12 col-lg-12">
                <div class="contact-form">
                    <form method="post" action="{{ route('password.email') }}" class="row conact-form">
                        @csrf
                        <div class="col-12">
                            <div class="single-personal-info">
                                <label for="email">@lang('trans_booksee365.Email')</label>
								<input class="{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="@lang('trans_booksee365.Email')" type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
                            </div>
                        </div>
                        <div class="col-md-12 col-12 text-center">
                            <input class="submit-btn" type="submit" value="@lang('trans_booksee365.Reset Password')">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
