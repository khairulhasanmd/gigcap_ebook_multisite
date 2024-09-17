@extends('welcome.main')

@section('styles-files')
    <link rel="stylesheet" href="{{ asset('theme2/css/about.css') }}">
@endsection

@section('content')
<section>
	<div class="about overflow-hidden">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="about-content pt-lg-5 mb-5 mb-lg-0">
						<div class="about-hdd primary-color text-center text-lg-start text-capitalize mb-4 animate__animated animate__fadeIn wow">
							<h2>Forgot Password</h2>
						</div>
						<div class="about-des secondary-color text-center text-lg-start">
							<form method="post" action="{{ route('password.email') }}">
                                @csrf
                                <div class="name nsf">
                                    <div class="f-name common mb-4">
                                        <label for="email"> Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="@lang('Enter Your Email')" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="submit-btn text-end">
                                    <button type="submit">@lang('Reset Password')</button>
                                </div>
                            </form>
						</div>
					</div>
				</div>

				<div class="col-lg-6 p-4">
					<div class="about-img">
						<div class="about-main-img text-lg-end text-center">
							<img src="{{ asset('theme2/images/about-img.png') }}" alt="about-img" class="animate__animated animate__fadeInRight wow">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="bdr">
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</section>


@endsection
