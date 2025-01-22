@extends('layouts.auth')

@section('content')
<form class="form w-100" novalidate="novalidate"  method="POST" action="{{ route('login') }}">
    @csrf
    <!--begin::Heading-->
    <div class="text-center mb-11">
        <!--begin::Title-->
        <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
        <!--end::Title-->
        <!--begin::Subtitle-->
        <div class="text-gray-500 fw-semibold fs-6">Report</div>
        <!--end::Subtitle=-->
    </div>
    <!--begin::Heading-->
    <!--begin::Separator-->
    <div class="separator separator-content my-14">
        <span class="w-125px text-gray-500 fw-semibold fs-7">With your email</span>
    </div>
    <!--end::Separator-->
    <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <input type="email" placeholder="Email" name="email" class="form-control bg-transparent @error('email') is-invalid @enderror"  autocomplete="email" autofocus/>
        <!--end::Email-->
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--end::Input group=-->
    <div class="fv-row mb-3">
        <!--begin::Password-->
        <input type="password" placeholder="Password" name="password" class="form-control bg-transparent @error('password') is-invalid @enderror"  required autocomplete="current-password"/>
        <!--end::Password-->
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--end::Input group=-->
    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <div><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label></div>
        <!--begin::Link-->
        
        {{-- <a href="../../demo1/dist/authentication/layouts/corporate/reset-password.html" class="link-primary">Forgot Password ?</a> --}}
        <!--end::Link-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Submit button-->
    <div class="d-grid mb-10">
        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            <!--begin::Indicator label-->
            <span class="indicator-label">Sign In</span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
        </button>
    </div>
    <!--end::Submit button-->
    <!--begin::Sign up-->
    {{-- <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet? --}}
    {{-- <a href="../../demo1/dist/authentication/layouts/corporate/sign-up.html" class="link-primary">Sign up</a></div> --}}
    <!--end::Sign up-->
</form>
@endsection

