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
          <h1 class="sub-title-anim-top animation__word_come text-white">Reset your <br>password</h1>
        </div>
      </div>
      <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
        <div class="contact__form">
          <form method="post" action="{{ route('password.email') }}">
            @csrf
            <div class="row g-3">
              <div class="col-12">
                  <input type="email" placeholder="Email" name="email" class=" "  autocomplete="email" autofocus required >
              </div>
            </div>
            <div class="row g-3">
              <div class="col-6">
                <div class="btn_wrapper">
                  <button type="submit" class="wc-btn-pink btn-hover btn-item"><span></span> Submit <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>
              <div class="col-6">
                  <div class="btn_wrapper">
                      <a class="forget-pass" href="{{ route('login') }}">Login</a>
                    
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
