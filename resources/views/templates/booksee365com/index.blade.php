 @extends('templates.booksee365com.welcome.main')
 {{-- @extends('templates.01_initial.welcome.main') --}}



 @section('styles-files')
 	
 @endsection


@section('content')

<section class="hero-banner hero-style-1">
	<div class="single-banner-wrapper">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6">
					<div class="slide-contents">
						<h1 class="fs-lg">An Enjoyable Way To Learn New Things Is To Visit Our Book Library Every Day</h1>
						<p>Download our extensive library every day and discover new books.</p>
						<a href="#pricing-section" class="theme-btn">Sign Up <i class="fal fa-long-arrow-right"></i></a>
					</div>
				</div>
				<div class="col-xl-6 pr-xl-0">
					<div class="hero-carousel-wrap">
						<div class="carousel-active owl-carousel">
							<div class="single-carousel-item bg-cover" style="background-image: url('booksee365com/theme/img/home1/hero1.jpg')"></div>
							<div class="single-carousel-item bg-cover" style="background-image: url('booksee365com/theme/img/home1/hero2.jpg')"></div>
							<div class="single-carousel-item bg-cover" style="background-image: url('booksee365com/theme/img/home1/hero3.jpg')"></div>
						</div>
						<div class="hero-carousel-nav"></div>
						<div class="dots"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="about-us-section bg-color section-padding">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="about-image mb-5 mb-lg-0">
					<img src="{{ asset('booksee365com/theme/img/about-home.jpg') }}" alt="" class="img-fluid" style="width:100%;">
				</div>
			</div>
			<div class="col-lg-6 about_left_content pr-lg-0 pl-lg-5">
				<div class="section-title no-bg">
					<h1>Many Positive Benefits You Will Experience From Reading Regularly</h1>
				</div>
				<p>Reading is not only a relaxing pastime and a source of new knowledge and knowledge. It affects our mind in a number of contrasting ways. Did you know that regular reading increases communicative abilities and strengthens memory? Books allow us to enter various universes by poring over the pages in them, and their interpretations can influence our creative thinking and memory.</p>
				<a href="#pricing-section" class="theme-btn mt-35">Join Now <i class="fal fa-long-arrow-right"></i></a>
			</div>
		</div>
	</div>
</section>

<section class="blog-section section-padding">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="section-title no-bg">
					<h1>What We Have To Provide You</h1>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-blog-card">
					<div class="featured-img bg-cover">
						<a href="#">
							<img src="{{ asset('booksee365com/theme/img/blog/active-ife.jpg') }}" alt="" style="width:100%;"> 
						</a>
					</div>
					<div class="post-content">
						<div class="post-meta">
							<a href="#" class="post-author"> Active Life</a>
						</div>
						<h3><a href="#">We designed our website with busy individuals like you in mind, so we provide the option to read any of our titles wherever you happen to get spare time.</a></h3>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-blog-card">
					<div class="featured-img bg-cover">
						<a href="#">
							<img src="{{ asset('booksee365com/theme/img/blog/active-care.jpg') }}" alt="" style="width:100%;">
						</a>
					</div>
					<div class="post-content">
						<div class="post-meta">
							<a href="#" class="post-author"> Active Care</a>
						</div>
						<h3><a href="#">Our extensive library of self-help books will offer useful insights for taking care of yourself. Further, you will save the environment as our library is entirely digital.</a></h3>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-blog-card">
					<div class="featured-img bg-cover">
						<a href="#">
							<img src="{{ asset('booksee365com/theme/img/blog/active-relaxation.jpg') }}" alt="" style="width:100%;">
						</a>
					</div>
					<div class="post-content">
						<div class="post-meta">
							<a href="#" class="post-author">Active Relaxation</a>
						</div>
						<h3><a href="#">By reading in our library, you will have the ability to relax while simultaneously furthering yourself and working on personal development and your motivation.</a></h3>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>

<section>
	<div class="refund-section bg-color">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="top-heading mb-5">
						<div class="default-heading text-center mb-4">
							<h3> Contact Information</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="phone mb-4 mb-lg-0 text-center text-lg-left">
						<h4><i class="fas fa-phone"></i> Phone</h4>
						<p><a href="tel:{{ config('api.SUPPORT_PHONE') }}">{{ config('api.SUPPORT_PHONE') }}</a></p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="email mb-4 mb-lg-0 text-center text-lg-left">
						<h4><i class="fas fa-envelope"></i> Email</h4>
						<p><a href="mailto:{{ config('api.SUPPORT_EMAIL') }}">{{ config('api.SUPPORT_EMAIL') }}</a></p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="refund text-center text-lg-left">
						<h4><i class="fas fa-credit-card"></i> Refund Policy</h4>
						<p>Refund available based on refund policy</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@include('templates.booksee365com.partials.pricing')

@endsection

