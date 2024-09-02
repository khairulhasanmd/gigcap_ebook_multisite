@extends('welcome.main')

@section('styles-files')
    <link rel="stylesheet" href="{{ asset ('theme/welcome/css/main.css') }}">
@endsection

@section('content')

<!-- <section>
    <div class="hero pb-5">
        <div class="container-mask">
            <div class="row">
                <div class="col-12">
                    <div class="top-img">
                        <img src="{{ asset('theme/images/h-top.png') }}" alt="top-img">
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="l-content px-xl-5 ps-md-5 text-center text-md-start mb-5 mb-md-0">
                                <div class="hero-content mb-3 mb-lg-4">
                                    <h2>Change Password</h2>
                                    <form method="POST" action="{{ route('saveChangePassword') }} aria-label="{{ __('Change  Password') }}">
                                    @csrf
                                        <div class="mb-3">
                                        <label for="password">Enter Your New Password</label>
                                        <input id="password" type="password" class=" form-control{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required placeholder="New Password">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="password-confirm">Repeat Your New Password</label>
                                            <input id="password-confirm" title="" type="password" class="form-username form-control" name="password_confirmation" required placeholder="Repeat New Password">
                                        </div>
                                        <div class="submit-btn">
                                            <button type="submit">Change Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="r-img ps-md-5 mb-4">
                                <img src="{{ asset('theme/images/inner-img.png') }}" alt="inner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section>
	<div class="hero">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="hero-left text-center text-lg-start">
						<div class="main-hd text-uppercase mb-4">
							<h2>Change Password</h2>
						</div>
						<div class="hero-description text-capitalize mb-5 text-lg-start text-center">
				            <form method="POST" action="{{ route('saveChangePassword') }} aria-label="{{ __('Change  Password') }}">
                                @csrf
                                <div class="mb-3">
                                <label for="password">Enter Your New Password</label>
                                <input id="password" type="password" class=" form-control{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required placeholder="New Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="mb-3">
                                    <label for="password-confirm">Repeat Your New Password</label>
                                    <input id="password-confirm" title="" type="password" class="form-username form-control" name="password_confirmation" required placeholder="Repeat New Password">
                                </div>
                                <div class="buy-btn default-btn">
                                    <button type="submit" class="arro">Change Password<span>&#x21c0;</span></button>
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