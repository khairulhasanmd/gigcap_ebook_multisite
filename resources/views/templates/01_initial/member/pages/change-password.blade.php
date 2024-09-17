@extends('member.layouts.main')

@section('styles-files')
@endsection

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-12 col-lg-6">

                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form method="POST" action="{{ route('saveChangePassword') }} aria-label="{{ __('Change  Password') }}">
                            @csrf
                            <div class="form-group">
                                <label for="password">Enter Your New Password:</label>
                                <input type="password" id="password" class=" form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required placeholder="New Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Repeat Your New Password:</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required placeholder="Repeat New Password">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            
            </div>
           
        </div>
        
    </div>
</div>

@endsection
