<div id="changePassword" class="customModal">
    <div class="close-changePassword"> 
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
            <h1 class="section-title" id="logInLabel">@lang('Change Your') <span>@lang('Password')</span></h1>
            <form method="POST" action="{{ route('saveChangePassword') }}" aria-label="{{ __('Change  Password') }}">
                <div class="form-group text-left">
                    <label for="password">Enter Your New Password</label>
                    <input id="password" type="password" class=" form-control{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required placeholder="New Password">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group text-left">
                    <label for="password-confirm">Repeat Your New Password</label>
                    <input id="password-confirm" title="" type="password" class="form-username form-control" name="password_confirmation" required placeholder="Repeat New Password">
                </div>
                {{ csrf_field() }}
                <div class="form-group text-center">
                    <button type="submit" class="button button--md button--wide-2 button--primary button--rounded-3 hover-toOutline"><span>@lang('Change Password')</span></button>
                </div>
            </form>
        </div>
    </div>
</div>