@extends('templates.booksee365com.welcome.main')

@section('styles-files')

    <link href="{{ asset ('booksee365com/theme_backup/css/subscription/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('booksee365com/theme_backup/css/customer-product/style.css') }}" rel="stylesheet"> 
    {{-- <link href="{{ asset ('booksee365com/theme_backup/common/default.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')
<style>
    .member {
  background-color: #fff;
  padding-left: 270px;
  padding-right: 24px;
  padding-top: 20px;
  padding-bottom: 80px;
}
.common label{
color: #8f8989;
}
.common input{
    color: #8f8989;
    border: 1px solid rgba(77, 50, 50, 0.4);
}
.s-number p{
    color: #8f8989;
}
.member-table td{
    color: #8f8989;
}
</style>


<section>
    <div class="member pb-5">
        <div class="container-fluid background">
            <div class="row">
                <div class="col-12">
                    <div class="customer py-4">
                        <div class="member-name mb-4">
                            <h2>Change Password</h2>
                        </div>
                        
                    </div>

                    <div class="subscription-from mx-auto" id="profile-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="edit-form our-form pb-3 mb-4 mb-lg-0">
                                    <form method="POST" action="{{ route('saveChangePassword') }}" aria-label="{{ __('Change  Password') }}">
                                        @csrf
                                        <div class="mb-3 common">
                                            <label for="password">Enter Your New Password</label>
                                            <input id="password" type="password" class=" form-control{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required placeholder="New Password">

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="mb-3 common">
                                            <label for="password-confirm">Repeat Your New Password</label>
                                            <input id="password-confirm" title="" type="password" class="form-username form-control" name="password_confirmation" required placeholder="Repeat New Password">
                                        </div>
                                        <div class="s-submit">
                                            <button type="submit">Change Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                             
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
