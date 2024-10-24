 @extends('welcome.main')

 @section('styles-files')
 	<!-- <link href="{{ asset ('theme/common/default.css') }}" rel="stylesheet"> -->
 	<link rel="stylesheet" href="{{ asset ('theme/welcome/css/main.css') }}">
 @endsection


@section('content')

<!-- <section>
	<div class="hero pb-5">
		<div class="container-mask">
			<div class="row">
				<div class="col-12">
					<div class="top-img">
						<img src="{{ asset('theme/welcome/images/h-top.png') }}" alt="top-img">
					</div>
				</div>
				<div class="col-12">
					<div class="row">
						<div class="col-md-5">
							<div class="l-img float-none float-mb-start mt-mb-5 mb-4">
								<img src="{{ asset('theme/welcome/images/introimage.png') }}" alt="wrapper">
							</div>
						</div>
						<div class="col-md-7">
							<div class="r-img overflow-hidden ps-md-5 mb-4">
								<img src="{{ asset('theme/welcome/images/inner-img.png') }}" alt="inner">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="features">
		<div class="container-mask">
			<div class="row">
				<div class="col-12">
					<div class="line-y">
						<img src="{{ asset('theme/welcome/images/y-line.png') }}" alt="Yellow-black-line">
					</div>
				</div>
			</div>
			<div class="col-12 py-5">
				<div class="row">
					<div class="col-lg-4">
						<div class="our-f">
							<img src="{{ asset('theme/welcome/images/dots.png') }}" alt="dots">
							<h2>Why Learn Coding</h2>
							<p>Coding is one of the most reliable careers, and many people are turning to programming as a lucrative profession. Technology is always changing and there will always be a demand for coders to fix software or design new applications. Code Buddies is here to provide you with high quality training, preparing you for this profession. We cover indemand coding knowledge, allowing you to build a strong portfolio as you finish the education process and become accredited as a professional.</p>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="row">
							<div class="col-md-6 mb-4 mb-md-0">
								<div class="unr mb-md-5 mb-2">
									<div class="our-f">
										<img src="{{ asset('theme/welcome/images/dots.png') }}" alt="dots" style="width:50px;">
										<h4>Responsive Web Design</h4>
										<p>HTML, HTML 5, Basic CSS, Flexbox and Grid. Learn how to tackle any challenge that comes with responsive web design.</p>
									</div>
								</div>
								<div class="unr mb-md-5 mb-2">
									<div class="our-f">
										<img src="{{ asset('theme/welcome/images/dots.png') }}" alt="dots" style="width:50px;">
										<h4>Front End Libraries</h4>
										<p>Get more than just familiar with jQuery, React, Bootstrap, and many other.</p>
									</div>
								</div>
								<div class="unr mb-md-5 mb-2">
									<div class="our-f">
										<img src="{{ asset('theme/welcome/images/dots.png') }}" alt="dots" style="width:50px;">
										<h4>APIs and Microservices</h4>
										<p>Gain Node and Express skills. Completing these courses will enable you to work with Node Package Manager, MongoDB and Mongoose</p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="unr mb-md-5 mb-2">
									<div class="our-f">
										<img src="{{ asset('theme/welcome/images/dots.png') }}" alt="dots" style="width:50px;">
										<h4>JavaScript Algorithms and Data Structures</h4>
										<p>Basic JavaScript and algorithm scripting, going from beginner to intermediate skills.</p>
									</div>
								</div>
								<div class="unr mb-md-5 mb-2">
									<div class="our-f">
										<img src="{{ asset('theme/welcome/images/dots.png') }}" alt="dots" style="width:50px;">
										<h4>Data Visualisation</h4>
										<p>Handle data visualization projects, including data visualization with 3D, JSON APIs and Ajax.</p>
									</div>
								</div>
								<div class="unr mb-md-5 mb-2">
									<div class="our-f">
										<img src="{{ asset('theme/welcome/images/dots.png') }}" alt="dots" style="width:50px;">
										<h4>Information Security and Quality Assurance</h4>
										<p>Learn about advanced Node and Express curriculum and much needed HelmetJS and Chai lessons.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="other-features">
		<div class="container-mask">
			<div class="row">
				<div class="col-12">
					<div class="line-b">
						<img src="{{ asset('theme/welcome/images/line-black.png') }}" alt="black-Yellow-line">
					</div>
				</div>
			</div>
			<div class="col-12 py-5">
				<div class="row">
					<div class="col-md-7">
						<div class="our-content mb-md-0 mb-4">
							<p>Learning a new skill can be difficult, no matter the subject. Coding is a new skill for a lot of people in the workforce and in schools. There are a number of benefits with learning to code, but it can be challenging when trying to learn something by yourself. When you have someone to help you, it’s easier to get feedback from an expert on when you’ve done something wrong or how you could improve your approach.</p>
							<p>This is where Code Buddies comes in, not only you will find our courses providing you the right training required to be in the market, our customer support team are here ready to assist you whenever you have any questions.</p>
						</div>
					</div>
					<div class="col-md-5 ps-lg-5 ps-md-4">
						<div class="our-f our-ff py-5">
							<img src="{{ asset('theme/welcome/images/dots.png') }}" alt="dots">
							<h2>Why CodeBuddies</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="features our-features">
		<div class="container-mask">
			<div class="row">
				<div class="col-12">
					<div class="line-y">
						<img src="{{ asset('theme/welcome/images/y-line.png') }}" alt="Yellow-black-line">
					</div>
				</div>
			</div>
			<div class="col-12 py-5">
				<div class="row">
					<div class="col-lg-4 mt-5 mt-lg-0">
						<div class="sm-dots ms-4">
							<h3>CONTACT INFORMATIONS</h3>
							<img src="{{ asset('theme/welcome/images/dots-1.png') }}" alt="dots">
						</div>
						<div class="fft text-center">
							<h3 class="text-capitalise">Phone</h3>
							<h4><span><img src="{{ asset('theme/welcome/images/phone.png') }}" class="img-fix" alt="phone"><a href="tel:{{ config('api.SUPPORT_PHONE') }}" class="a-color" > {{ config('api.SUPPORT_PHONE') }}</a></span></h4>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="fftt text-center mb-5 mb-lg-0">
							<h2 class="text-capitalise">Email</h2>
							<h4><p class="mll"><img src="{{ asset('theme/welcome/images/email.png') }}" class="img-fix" alt="email"><a href="mailto:{{ config('api.SUPPORT_EMAIL') }}" class="a-color"> {{ config('api.SUPPORT_EMAIL') }}</a></p></h4>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="refund text-center pt-5">
							<div class="refund-1 mb-3">
								<img src="{{ asset('theme/welcome/images/refund.png') }}" alt="refund-1">
							</div>
							<div class="refund-2">
								<img src="{{ asset('theme/welcome/images/rff.png') }}" alt="refund-2">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="pricing pt-5">
		<div class="container-mask">
			<div class="row">
				<div class="col-12">
					<div class="pricing-table">
						<div class="tph text-center mb-5">
							<h3>Pricing</h3>
						</div>
						<div class="card mx-auto border-0">
							<div class="price-card text-center">
								<p>{{ config('api.TRIAL_DAYS') }}-day trial period / {{ config('api.TRIAL_PRICE') }} {{ config('api.SUBSCRIPTION_CURRENCY') }}</p>
								<div class="price-area text-light">
									<h2>{{ floor(config('api.SUBSCRIPTION_PRICE')) }}</h2>
									<h3>{{ config('api.SUBSCRIPTION_CURRENCY') }}/month</h3>
								</div>
								<div class="price-f">
									<p><span></span>Gain a wide range of practical skills.</p>
									<p><span></span> Choose from versatile coding courses, or take all of them.</p>
									<p><span></span> Get prepared for your coding interview.</p>
									<p><span></span> Guaranteed safe online payments.</p>
								</div>
								<div class="buy-btn py-4">
									<a href="{{ config('api.CAMPAIGN_DOMAIN') }}/en/c/code-buddies-signup"> Buy</a>
								</div>
							</div>
							<div class="color-box">
								<img src="{{ asset('theme/welcome/images/cyan-dots.png') }}" alt="blue-dots">
							</div>
							<div class="circle-box">
								<div class="box">
									<div class="circle"></div>
									<div class="circle"></div>
									<div class="circle"></div>
									<div class="circle"></div>
									<div class="circle"></div>
									<div class="circle"></div>
									<div class="circle"></div>
									<div class="circle"></div>
									<div class="circle"></div>
									<div class="circle"></div>
									<div class="circle"></div>
									<div class="circle"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->

<section>
	<div class="hero">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="hero-left text-center text-lg-start">
						<div class="main-hd text-uppercase mb-4">
							<h2>What book are You looking for?</h2>
						</div>
						<div class="hero-description text-capitalize mb-5 text-lg-start text-center">
							<p> Not sure what to read next? Explore our catalog of public domain books with our editors?</p>
						</div>
						<div class="hero-btn default-btn">
							<a class="arro" href="#"> Explore Now <span>&#x21c0;</span></a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="hero-img text-center">
						<img src="{{ asset('theme/welcome/images/hero-img.png') }}" alt="hero-img">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="color-bg">
		<div class="container-mask">
			<div class="fst-color">
				<div class="fst-1 float-start common"></div>
				<div class="fst-2 overflow-hidden common"></div>
			</div>
			<div class="snd-color">
				<div class="snd-1 float-start common"></div>
				<div class="snd-2 overflow-hidden common"></div>
			</div>
			<div class="trd-color">
				<div class="trd-1 float-start common"></div>
				<div class="trd-2 overflow-hidden common"></div>
			</div>
			<div class="frt-color">
				<div class="frt-1 float-start common"></div>
				<div class="frt-2 overflow-hidden common"></div>
			</div>
			<div class="fif-color">
				<div class="fif common"></div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="book-slider">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="book-slider-heading text-center">
						<h2>Top Trending Books</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="our-carousel">
						<div class="owl-carousel owl-theme">
							<div class="item">
								<div class="testimonial-item">
									<div class="item-info pb-3 text-center">
										<p>Dieter Rams: <br> The complete Works</p>
									</div>
									<div class="img-thumb text-center">
										<img src="{{ asset('theme/welcome/images/tb-1.jpg') }}" alt="tb" />
									</div>
									<!-- <div class="item-info">
										<div class="book-info d-flex justify-content-between">
											<div class="b-length d-flex flex-column justify-content-center align-items-center">
												<p>Print Length</p>
												<i class="fas fa-book-open"></i>
												<p>448 Pages</p>
											</div>
											<div class="b-lang d-flex flex-column justify-content-center align-items-center">
												<p>Language</p>
												<i class="fas fa-globe-americas"></i>
												<p>English</p>
											</div>
											<div class="pris">
												<p>$58</p>
												<a href="#">&#x21c0;</a>
											</div>
										</div>
									</div> -->
								</div>
							</div>
							<div class="item">
								<div class="testimonial-item">
									<div class="item-info pb-3 text-center">
										<p>Anatomy <br> Karina Vigil</p>
									</div>
									<div class="img-thumb text-center">
										<img src="{{ asset('theme/welcome/images/tb-2.jpg') }}" alt="tb" />
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial-item">
									<div class="item-info pb-3 text-center">
										<p> The Invisible Man <br> By H.G. Wells</p>
									</div>
									<div class="img-thumb text-center">
										<img src="{{ asset('theme/welcome/images/tb-3.jpg') }}" alt="tb" />
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial-item">
									<div class="item-info pb-3 text-center">
										<p> The monocle Guide To <br> Better Living</p>
									</div>
									<div class="img-thumb text-center">
										<img src="{{ asset('theme/welcome/images/tb-4.jpg') }}" alt="tb" />
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial-item">
									<div class="item-info pb-3 text-center">
										<p>The Greatness <br> Guide</p>
									</div>
									<div class="img-thumb text-center">
										<img src="{{ asset('theme/welcome/images/tb-5.jpg') }}" alt="tb" />
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial-item">
									<div class="item-info pb-3 text-center">
										<p>You Have The Power To <br> Change Your Life</p>
									</div>
									<div class="img-thumb text-center">
										<img src="{{ asset('theme/welcome/images/tb-6.jpg') }}" alt="tb" />
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial-item">
									<div class="item-info pb-3 text-center">
										<p>Spread Your Wings <br> And Fly</p>
									</div>
									<div class="img-thumb text-center">
										<img src="{{ asset('theme/welcome/images/tb-7.jpg') }}" alt="tb" />
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimonial-item">
									<div class="item-info pb-3 text-center">
										<p>Today I am <br> Ofline</p>
									</div>
									<div class="img-thumb text-center">
										<img src="{{ asset('theme/welcome/images/tb-8.jpg') }}" alt="tb" />
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="slider-btn default-btn text-center">
						<a class="arro" href="#"> See All <span>&#x21c0;</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="meet-up">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="meet-left">
						<div class="meet-heading mb-4">
							<h2>Book Club Meetup.</h2>
						</div>
						<div class="meet-description mb-4">
							<p>Meet kindred book lovers in a local meetup book club! Fiction or non-Fiction, Paperback or Hardcover, you?Ll Read A New Book Every Month.</p>
						</div>
						<div class="counter-item mb-md-5 mb-4">
							<div class="row">
								<div class="col-4 mb-4 mb-md-0" >
									<div class="my-counte">
										<span class="countere">1</span> <span class="pers">M+</span>
										<h3>Books <br> Collections</h3>
									</div>
								</div> 
								<div class="col-4 mb-4 mb-md-0">
									<div class="my-counte">
										<span class="countere">40</span> <span class="pers">K+</span>
										<h3>Club <br> Members</h3>
									</div>
								</div>
								<div class="col-4 mb-4 mb-md-0">
									<div class="my-counte">
										<span class="countere">5297</span>
										<h3>Groups <br> Cerated</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="meet-btn default-btn">
							<a class="arro" href="#"> Join Now <span>&#x21c0;</span></a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="meet-right">
						<div class="meet-img text-lg-end text-center">
							<img src="{{ asset('theme/welcome/images/counter-img.png') }}" alt="counter-img">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="book-store">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="book-store-heading text-center">
						<h2>Browse Genres</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="box-menu py-3">
						<ul>
							<li data-filter=".adventure">Adventure</li>
							<li data-filter=".biography">Biography</li>
							<li data-filter=".classic">Classic</li>
							<li class="mixitup-control-active" data-filter=".random-selection">Random Selection</li>
							<li data-filter=".hc">Harvard Classics</li>
							<li data-filter=".design">Designing Books</li>
							<li data-filter=".philosophy">Philosophy</li>
							<li data-filter=".scf">Science Fiction</li>
							<li data-filter=".ssc">Short Story Collection</li>
							<li data-filter=".thriller">Thriller</li>
							<li data-filter=".travel">Travel</li>
							<li data-filter=".western">Western</li>
							<li data-filter=".history">History</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="book-collection">
						<div class="row box-list">
							<div class="col-sm-6 mix box-item random-selection design">
								<div class="mx-box">
									<div class="box-img text-center mb-4">
										<img src="{{ asset('theme/welcome/images/book-1.jpg') }}" alt="book-1">
									</div>
									<div class="box-info text-capitalize">
										<h3>A way of living</h3>
										<p>By Phaidon</p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 mix box-item random-selection design">
								<div class="mx-box">
									<div class="box-img text-center mb-4">
										<img src="{{ asset('theme/welcome/images/book-2.jpg') }}" alt="book-1">
									</div>
									<div class="box-info text-capitalize">
										<h3>Identities for festivals</h3>
										<p>By Miranda kate</p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 mix box-item random-selection thriller">
								<div class="mx-box">
									<div class="box-img text-center mb-4">
										<img src="{{ asset('theme/welcome/images/book-3.jpg') }}" alt="book-1">
									</div>
									<div class="box-info text-capitalize">
										<h3>The invisible Man</h3>
										<p>By H.G. Wells</p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 mix box-item random-selection design">
								<div class="mx-box">
									<div class="box-img text-center mb-4">
										<img src="{{ asset('theme/welcome/images/book-4.jpg') }}" alt="book-1">
									</div>
									<div class="box-info text-capitalize">
										<h3>Japanese Design</h3>
										<p>By Thamas & Hudson</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="color-cx">
			<div class="color-1 color-common"></div>
			<div class="color-2 color-common"></div>
			<div class="color-3 color-common"></div>
			<div class="color-4 color-common"></div>
			<div class="color-5 color-common"></div>
		</div>
	</div>
</section>

<section>
	<div class="refund-section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="refund-area default-bg">
						<div class="default-h text-center mb-5 mb-lg-0">
							<h3> Contact Information</h3>
						</div>
						<div class="row">
							<div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
								<div class="phone mb-4 mb-lg-0 text-center text-lg-start">
									<h4><i class="fas fa-phone-alt"></i> Phone</h4>
									<p><a href="tel:{{ config('api.SUPPORT_PHONE') }}">{{ config('api.SUPPORT_PHONE') }}</a></p>
								</div>
							</div>
							<div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
								<div class="email mb-4 mb-lg-0 text-center text-lg-start">
									<h4><i class="fas fa-envelope"></i> Email</h4>
									<p><a href="mailto:{{ config('api.SUPPORT_EMAIL') }}">{{ config('api.SUPPORT_EMAIL') }}</a></p>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="refund text-center">
									<img src="{{ asset('theme/welcome/images/refunded.png') }}" alt="refund">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@include('pages.pricing')

@endsection

