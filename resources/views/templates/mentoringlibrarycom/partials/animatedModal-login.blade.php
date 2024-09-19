<div id="loginModal" class="customModal">
    <div class="close-loginModal"> 
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="52px" height="52px" viewBox="0 0 52 52" enable-background="new 0 0 52 52" xml:space="preserve">
            <g>
                <circle fill="none" stroke="#000" stroke-width="1" stroke-miterlimit="10" cx="26" cy="26" r="25"/>
                <g>
                    <line fill="none" stroke="#000" stroke-width="1" stroke-miterlimit="10" x1="33.571" y1="34.278" x2="18.722" y2="19.429"/>
                    <line fill="none" stroke="#000" stroke-width="1" stroke-miterlimit="10" x1="33.571" y1="18.722" x2="18.722" y2="33.571"/>
                </g>
            </g>
        </svg>
    </div>
        
    <div class="modal-content">
        <div class="container">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane show fade active" id="login">
                    <h1 class="section-title section-title--secondary" id="logInLabel">@lang('Log In To Your') <span>@lang('Account')</span></h1>
                    <form method="POST" action="{{ route('login') }}" class="text-center">
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
                        </div>
                        <button type="submit" class="button button--md button--wide-2 button--primary button--rounded-3 hover-toOutline"><span>@lang('Login')</span></button>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="forgotPassword">
                    <h1 class="section-title section-title--secondary" id="logInLabel">@lang('Reset Your') <span>@lang('Password')</span></h1>
                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}" class="text-center">
                        @csrf
                        <div class="form-group text-left">
                            <div class="form-row">
                                <div class="form-group col-sm-12 text-left">
                                    <label for="forgot_password_email">@lang('Email')</label>
                                    <input id="forgot_password_email" type="email" class="form-control" name="email" value="" required placeholder="Enter Your Email">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="button button--md button--wide-1 button--primary button--rounded-3 hover-toOutline"><span>@lang('Send Reset Password Link')</span></button>
                    </form>
                </div>
                <div class="row">
                    <div class="col-sm-7 mb-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="mr-3">
                                <a href="#login" aria-controls="login" role="tab" data-toggle="tab" class="active">@lang('Login')</a>
                            </li>
                            <li role="presentation">
                                <a href="#forgotPassword" aria-controls="forgotPassword" role="tab" data-toggle="tab">@lang('Forgot Password?')</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-5 text-right">
                        <a href="https://begin.coding-hub.io/en/c/coding-hub-signup" class="link">@lang('Don\'t have account?')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>