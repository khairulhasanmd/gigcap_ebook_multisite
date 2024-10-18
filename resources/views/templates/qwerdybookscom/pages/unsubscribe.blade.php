@extends('templates.qwerdybookscom.layouts.app')

@section('content')
<div id="smooth-wrapper">
  <div id="smooth-content">
<section class="contact__area-6 margin-top-100">
  <div class="container g-0 line pt-150 pb-110">
    <span class="line-3"></span>
      {{-- <h1 class="title-head-1">Password Reset</h1> --}}
    <div class="row contact__btm">
      <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
        <div class="contact__info">
          <h1 class="sub-title-anim-top animation__word_come text-white">@lang('trans_qwerdybookscom.Find Your') <br>@lang('trans_qwerdybookscom.Membership')</h1>
        </div>
      </div>
      <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
        <div class="contact__form">
          <form method="post" action="{{ route('unsubscribeMembership') }}">
            @csrf
            <div class="row g-3">
              <div class="col-12">
                
                  <input type="email" placeholder="@lang('trans_qwerdybookscom.Email')" name="email"   required >
                  @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
              </div>
            </div>
            <div class="row g-3">
              <div class="col-12">
                  <input type="text" placeholder="@lang('trans_qwerdybookscom.Last 4 digits of your card')" name="last4" maxlength="4" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
              </div>
            </div>
            <div class="row g-3">
              <div class="col-6">
                <div class="btn_wrapper">
                  <button type="submit" class="wc-btn-pink btn-hover btn-item"><span></span> @lang('trans_qwerdybookscom.Search') <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>
             
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    </main>


</section>

@endsection


