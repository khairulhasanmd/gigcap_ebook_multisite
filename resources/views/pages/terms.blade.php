@extends('welcome.main')

@section('styles-files')
 	<!-- <link href="{{ asset ('theme/css/contact/style.css') }}" rel="stylesheet">
     <link href="{{ asset ('theme/common/default.css') }}" rel="stylesheet"> -->
 @endsection
 
@section('content')

<section style="background-color: white;">
    <div class="hero pb-5">
        <div class="container-mask">
            <h1 style="text-align:center;">Terms & Conditions</h1>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    
                {!! $terms !!}

                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>
</section>

@endsection
