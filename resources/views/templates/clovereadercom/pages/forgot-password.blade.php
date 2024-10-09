@extends('welcome.main')

@section('styles-files')
    <link rel="stylesheet" href="{{ asset ('theme/welcome/css/main.css') }}">
@endsection

@section('content')

<section>
	<div class="hero">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="hero-left text-center text-lg-start">
						<div class="main-hd text-uppercase mb-4">
							<h2>@lang('trans_clovereadercom.Forgot Password')</h2>
						</div>
						<div class="hero-description text-capitalize mb-5 text-lg-start text-center">
                            <form method="post" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group form-group--full">
                                        <label for="email">@lang('trans_clovereadercom.Email')</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="@lang('trans_clovereadercom.Enter Your Email')" value="{{ old('email') }}">
                                        <div class="form-control-element">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="buy-btn default-btn">
                                    <button type="submit" class="button button--secondary button--centered">@lang('trans_clovereadercom.Reset Password')</button>
                                </div>
                            </form>
						</div>
						
					</div>
				</div>
				<div class="col-lg-6">
					<!-- <div class="hero-img text-center">
                        <img src="{{ asset('theme/welcome/images/hero-img.png') }}" alt="hero-img">
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
