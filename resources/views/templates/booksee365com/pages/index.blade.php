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
						<h1 class="fs-lg">@lang('trans_booksee365.A great way to discover new knowledge is by visiting our book library daily')</h1>
						<p>@lang('trans_booksee365.Access our vast library daily and explore a world of new books.')</p>
						<a href="#pricing-section" class="theme-btn">@lang('trans_booksee365.Sign Up') <i class="fal fa-long-arrow-right"></i></a>
					</div>
				</div>
				<div class="col-xl-6 pr-xl-0">
					<div class="hero-carousel-wrap">
						<div class="carousel-active owl-carousel">
							<div class="single-carousel-item bg-cover" style="background-image: url('booksee365com/theme/img/hero1.jpg')"></div>
							<div class="single-carousel-item bg-cover" style="background-image: url('booksee365com/theme/img/hero2.jpg')"></div>
							<div class="single-carousel-item bg-cover" style="background-image: url('booksee365com/theme/img/hero3.jpg')"></div>
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
					<h1>@lang('trans_booksee365.Regular reading brings numerous positive benefits you\'ll enjoy.')</h1>
				</div>
				<p>@lang('trans_booksee365.Reading offers more than just relaxation and knowledge. It profoundly affects our cognitive functions in various ways. For example, consistent reading can boost your communication skills and improve memory retention. As you delve into different narratives and perspectives, you stimulate your creativity and enhance your ability to recall information. Immersing yourself in diverse literary worlds not only entertains but also challenges and refines your mental faculties.')</p>
				<a href="#pricing-section" class="theme-btn mt-35">@lang('trans_booksee365.Join Now') <i class="fal fa-long-arrow-right"></i></a>
			</div>
		</div>
	</div>
</section>

<section class="blog-section section-padding">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="section-title no-bg">
					<h1>@lang('trans_booksee365.What We Have To Provide You')</h1>
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
								<a href="#" class="post-author"> @lang('trans_booksee365.Active Life')</a>
							</div>
							<h3><a href="#">@lang("trans_booksee365.We’ve designed our website with your busy lifestyle in mind, allowing you to read any of our titles whenever you find a moment of free time.")</a></h3>
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
							<a href="#" class="post-author"> @lang('trans_booksee365.Active Care')</a>
						</div>
						<h3><a href="#">@lang('trans_booksee365.Our extensive collection of self-help books provides valuable insights for self-care. Plus, by using our entirely digital library, you’re also contributing to environmental conservation.')</a></h3>
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
							<a href="#" class="post-author">@lang('trans_booksee365.Active Relaxation')</a>
						</div>
						<h3><a href="#">@lang('trans_booksee365.Reading in our library allows you to unwind while also advancing your personal development and boosting your motivation.')</a></h3>
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
							<h3> @lang('trans_booksee365.Contact Information')</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="phone mb-4 mb-lg-0 text-center text-lg-left">
						<h4><i class="fas fa-phone"></i> @lang('trans_booksee365.Phone')</h4>
						<p><a href="tel:{{ config('booksee365com.SUPPORT_PHONE') }}">{{ config('booksee365com.SUPPORT_PHONE') }}</a></p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="email mb-4 mb-lg-0 text-center text-lg-left">
						<h4><i class="fas fa-envelope"></i> @lang('trans_booksee365.Email')</h4>
						<p><a href="mailto:{{ config('booksee365com.SUPPORT_EMAIL') }}">{{ config('booksee365com.SUPPORT_EMAIL') }}</a></p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="refund text-center text-lg-left">
						<h4><i class="fas fa-credit-card"></i> @lang('trans_booksee365.Refund Policy')</h4>
						<p>@lang('trans_booksee365.Refund available based on refund policy')</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@include('templates.booksee365com.partials.pricing')

@endsection

