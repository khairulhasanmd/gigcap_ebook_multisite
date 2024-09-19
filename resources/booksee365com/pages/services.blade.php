{{-- @extends('welcome.main') --}}
@extends('templates.booksee365com.welcome.main')

<style>
	h1 {
		font-size:40px!important;
	}
</style>
@section('styles-files')
 	
 @endsection
 
@section('content')

<section class="page-banner-wrap bg-cover">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-8">
				<div class="page-heading">
					<div class="page-title">
						@if ($pageName == 'terms_of_service')    
							<h1>Terms & Conditions</h1>
						@elseif ($pageName == 'privacy_policy') 
						<h1>Privacy Policy</h1>
						@else
						<h1>Subscription Policy</h1>
						@endif                      
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">
							@if ($pageName == 'terms_of_service')    
							Terms & Conditions
						@elseif ($pageName == 'privacy_policy') 
							privacy Policy
						@else
							Subscription Policy
						@endif                    
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>

<section class="about-us-section section-padding">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 about_left_content pr-lg-0 pl-lg-5">
                {!! $service !!}
			</div>
		</div>
	</div>
</section>

@endsection
