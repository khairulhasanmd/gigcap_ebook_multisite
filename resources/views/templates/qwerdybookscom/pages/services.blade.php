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
</style>
<style>
    #main {
        display: contents;
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
					{!! $service !!}
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Hero area end -->



       

      </main>
  
      


@endsection




