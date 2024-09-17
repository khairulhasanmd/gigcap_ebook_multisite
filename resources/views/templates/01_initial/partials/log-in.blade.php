<!-- <div class="modal" id="logInModal" tabindex="-1" role="dialog" aria-labelledby="logInLabel" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-colse" data-dismiss="modal" aria-label="Close"></div>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation">
                        <a href="#login" aria-controls="login" role="tab" data-toggle="tab" class="active">@lang('Login')</a>
                    </li>
                    <li role="presentation">
                        <a href="#forgotPassword" aria-controls="forgotPassword" role="tab" data-toggle="tab">@lang('Forgot Password?')</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="login">
                        <h1 class="section-title" id="logInLabel">@lang('Log In To Your') <span>@lang('Account')</span></h1>
                        <form class="text-center" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-sm-12 text-left">
                                    <label for="login_email">@lang('Email')</label>
                                    <input type="email" class="form-control" id="login_email" name="email" placeholder="@lang('Enter Your Email')" required>
                                </div>
                                <div class="form-group col-sm-12 text-left">
                                    <label for="password">@lang('Password')</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="@lang('Enter Your Password')" required>
                                </div>
                                <div class="form-group col-sm-12">
                                    <a 
                                       href="https://begin.coding-hub.io/en/c/coding-hub-signup" class="link link--rightAlign">@lang('Don\'t have account?')</a>
                                </div>
                            </div>
                            <button type="submit" class="button button--primary button--md button--wide-1 button--rounded-3 hover-toOutline"><span>@lang('Login')</span></button>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="forgotPassword">
                        <h1 class="section-title" id="logInLabel">@lang('Reset Your') <span>@lang('Password')</span></h1>
                        <form class="text-center" method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                            @csrf
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 text-left">
                                        <label for="forgot_password_email">@lang('Email')</label>
                                        <input id="forgot_password_email" type="email" class="form-control" name="email" value="" required placeholder="@lang('Enter Your Email')">
                                    </div>
                                </div>
                                <a  href="https://begin.coding-hub.io/en/c/coding-hub-signup" class="link link--rightAlign">@lang('Don\'t have account?')</a>
                            </div>
                            <button type="submit" class="button button--primary button--md button--wide-1 button--rounded-3 hover-toOutline"><span>@lang('Reset Password')</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- <link href="{{ asset ('theme/common/default.css') }}" rel="stylesheet"> -->

<div class="popups backdrop-blur">
    <div class="model">
        <div class="modal-container p-sm-5">
            <!-- <div class="close-icon text-end">
                <i id="close" class="fas fa-times"></i>
            </div> -->
            <div class="modal-heading text-center mb-4">
                <h3>Welcome back, Get Login</h3>
                <p>Join your account. Don’t have account? <a href="#">Create Account</a></p>
            </div>
            <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="email mb-4">
                        <label for="email">Email</label>
                        <input class="{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" id="email"  name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="password mb-3">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="forgot-pass mb-3 d-flex justify-content-between">
                        <div class="check">
                            <label class="containere" for="remember">Remember me
                                <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
                            <!-- <input type="checkbox" id="check">
                            <label for="check">Remember me</label> -->
                        </div>
                        <div class="forgot">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">Forget Password?</a>
                            @endif
                        </div>
                    </div>
                    <div class="submit text-center">
                        <input type="submit" value="Get Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
