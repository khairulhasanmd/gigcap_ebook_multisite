@extends('templates.booksee365com.welcome.main')

@section('styles-files')
	
@endsection

@section('content')

<section class="page-banner-wrap bg-cover">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-8">
				<div class="page-heading">
					<div class="sub-title">
						<p>Welcome to our company</p>
					</div>
					<div class="page-title">
						<h1>About Us</h1>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">About us</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>

<section class="about-us-section section-padding">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="about-image mb-5 mb-lg-0">
					<img src="{{ asset('booksee365com/theme/img/home1/about_left.jpg') }}" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-6 about_left_content pr-lg-0 pl-lg-5">
				<div class="section-title no-bg">
					<h1>A Few Words About Us</h1>
				</div>
				<p>Our first ambition is to get people excited about learning and improving their intellect. We drive in a frenetic state, and our lack of time makes us not able to find personal space or indulge in quiet contemplation. However, if we don't have dedicated time to pamper ourselves and think deeply about our inner being, we will not be adequate in every area of life.</p>
				<p>We believe that we succeeded in gathering the most liked, easily digestible titles, establishing an exclusive online catalog that will keep on hosting many book lovers. Each individual member makes our group a better one, and supporting us is timely and appreciated.</p>
				<a href="{{ config('api.CAMPAIGN_DOMAIN') }}" class="theme-btn mt-35"> JOIN NOW<i class="fal fa-long-arrow-right"></i></a>
			</div>
		</div>
	</div>
</section>

@include('templates.booksee365com.partials.pricing')

@endsection




