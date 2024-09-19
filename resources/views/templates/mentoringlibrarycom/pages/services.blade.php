{{-- @extends('welcome.main') --}}
@extends('templates.mentoringlibrarycom.welcome.main')


@section('styles-files')
 	
 @endsection
 
@section('content')

<div class="breadcrumb-wrapper">
	<div class="book1">
		<img src="{{ asset ('mentoringlibrarycom/') }}/img/book3.png" alt="book">
	</div>
	<div class="book2">
		<img src="{{ asset ('mentoringlibrarycom/') }}/img/book4.png" alt="book">
	</div>
	<div class="container">
		<div class="page-heading">
			<h1>
				@if ($pageName == 'terms_of_service')    
					Terms & Conditions
				@elseif ($pageName == 'privacy_policy') 
					privacy Policy
				@else
					Subscription Policy
				@endif               
			</h1>
			<div class="page-header">
				<ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
					<li>
						<a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">
							Home
						</a>
					</li>
					<li>
						<i class="bi bi-chevron-right"></i>
					</li>
					<li>
						@if ($pageName == 'terms_of_service')    
								Terms & Conditions
							@elseif ($pageName == 'privacy_policy') 
								privacy Policy
							@else
								Subscription Policy
							@endif               
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End breadcrumb area -->

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
