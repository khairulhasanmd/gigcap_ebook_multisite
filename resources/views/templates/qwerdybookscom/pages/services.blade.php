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
   
</style>
<div id="smooth-wrapper">
    <div id="smooth-content">
      <main>

        <!-- Hero area start -->
        <section class="hero__about">
          <div class="container g-0 line">
            <span class="line-3"></span>
            <div class="row">
              <div class="col-xxl-12">
                <div class="hero__about-content">
                  
                  @if ($pageName == 'terms_of_service')    
                    <h1>Terms & Conditions</h1>
                  @elseif ($pageName == 'privacy_policy') 
                    <h1>Privacy Policy</h1>
                  @else
                    {{-- <h1>Subscription Policy</h1> --}}
                  @endif                      

                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="hero__about">
          <div class="container g-0 line">
            <span class="line-3"></span>
            <div class="row">
              <div class="col-xxl-12">
                <div class="hero__about-content" style="padding-top: 50px">

					        {!! $service !!}
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Hero area end -->



       

      </main>
  
      


@endsection




