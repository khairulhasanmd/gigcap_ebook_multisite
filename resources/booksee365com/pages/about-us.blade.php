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
					<h1>Here’s a brief introduction about us:</h1>
				</div>
				<p>Our primary goal is to ignite a passion for learning and intellectual growth. In our fast-paced lives, finding personal space and time for quiet reflection can be challenging. Yet, without dedicated moments for self-care and deep contemplation, we may struggle to excel in all areas of life.</p>
				<p>We take pride in curating a collection of highly regarded, easily digestible titles, creating a unique online catalog that continues to attract avid readers. Each member enriches our community, and your support is both timely and valued.</p>
				<a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest" class="theme-btn mt-35"> JOIN NOW<i class="fal fa-long-arrow-right"></i></a>
			</div>
		</div>
	</div>
</section>

@include('templates.booksee365com.partials.pricing')

@endsection




