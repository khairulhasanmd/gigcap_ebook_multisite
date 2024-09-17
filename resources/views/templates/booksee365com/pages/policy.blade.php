@extends('welcome.main')
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
						<h1>Subscription Packages</h1>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Subscription Packages</li>
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
                {!! $policy !!}
			</div>
		</div>
	</div>
</section>

@endsection
