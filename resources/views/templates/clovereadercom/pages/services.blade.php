@extends('templates.clovereadercom.layouts.app')




<style>
  .terms-section{
    background-color: transparent !important;
  }

  h1{
    font-size: 30px !important;
  }
  #main {
      display: contents;
  }
  .belong-overview {
      font-family: "Kanit", sans-serif !important;
  }

  .hero__content {
    padding-top: 50px !important;
    padding-bottom: 80px;
    position: relative;
    z-index: 1;
  }

  .hero__content a {
    display: inline-block;
    max-width: none;
    font-weight: 400;
    font-size: 20px;
    line-height: 1.5;
    color: var(--white);
    padding-bottom: 0px;
    border-bottom: none;
    position: relative;
    overflow: visible;
  }
 
</style>


@section('content')


<section class="contact-us__area section pt-100 section-space-bottom overflow-hidden mt-5">
  <div class="container py-5">
    <div class="container-fluid pb-5 text-start">
      @if ($pageName == 'terms_of_service')    
        <h1 class="section-title text-start">@lang('trans_clovereadercom.Terms & Conditions')</h1>

      @elseif ($pageName == 'privacy_policy') 
        <h1 class="section-title text-start">@lang('trans_clovereadercom.Privacy Policy')</h1>

      @else
        {{-- <h1>Subscription Policy</h1> --}}
      @endif 
      <div class="main-content">
        {!! $service !!}
      </div>                     
    </div>
</section>


@endsection















