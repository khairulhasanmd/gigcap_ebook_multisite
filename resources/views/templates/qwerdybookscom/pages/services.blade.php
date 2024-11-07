@extends('templates.qwerdybookscom.layouts.app')


@section('content')
<style>
    .terms-section{
      background-color: transparent !important;
      color: #fff !important;
    }
    h2,a,h1,p{
      color: #fff !important;
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
<div id="smooth-wrapper">
    <div id="smooth-content">
      <main>

        <!-- Hero area end -->



       

        <section class="hero__area ">
          <div class="container">
            <div class="row">
              <div class="col-xxl-12">
                <div class="hero__content animation__hero_one">
                  @if ($pageName == 'terms_of_service')    
                  <h1 class="pt-5 mt-5">@lang('Terms & Conditions')</h1>
                    @elseif ($pageName == 'privacy_policy') 
                    <h1 class="pt-5 mt-5">@lang('Privacy Policy')</h1>
                    @else
                      {{-- <h1>Subscription Policy</h1> --}}
                    @endif                      

                </div>
                  <div class="hero__content animation__hero_one">
                    {!! $service !!}
                  </div>
              </div>
            </div>
          </div>

        </section>  
      


@endsection




