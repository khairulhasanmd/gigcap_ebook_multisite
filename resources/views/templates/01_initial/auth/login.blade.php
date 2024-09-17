@extends('templates.01_initial.welcome.main')

@section('styles-files')
    <link rel="stylesheet" href="{{ asset('01_initial/01_initial/theme2/css/about.css') }}">
@endsection

@section('content')
<section>
	<div class="about overflow-hidden">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 p-4">
					<div class="about-content pt-lg-5 mb-5 mb-lg-0">
						<div class="about-hdd primary-color text-center text-lg-start text-capitalize mb-4 animate__animated animate__fadeIn wow">
							<h2>Log In</h2>
						</div>
						<div class="about-des secondary-color text-center text-lg-start">
							<form method="POST" action="{{ route('login') }}" class="text-alignment">
                                @csrf
                                <div class="name nsf">
                                    <div class="f-name common mb-4">
                                        <label for="email"> Email</label>
                                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mail nsf">
                                    <div class="email common mb-4">
                                        <label for="pwd"> Password</label>
                                        <input type="password" id="pwd" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="column one mb-3">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember {{ old('remember') ? 'checked' : '' }}">
                                    <label class="form-check-label" for="remember" >
                                        {{ __('Remember Me') }}
                                    </label>
                                    <a href="{{ route('password.request') }}" style="float: right; color: black;">
                                    {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                                <div class="submit-btn text-end">
                                    <button type="submit" id="submit">Login</button>
                                </div>
                            </form>
						</div>
					</div>
				</div>
				<div class="col-lg-6 p-4">
					<div class="about-img">
						<div class="about-main-img text-lg-end text-center">
							<img src="{{ asset('01_initial/theme2/images/about-img.png') }}" alt="about-img" class="animate__animated animate__fadeInRight wow">
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