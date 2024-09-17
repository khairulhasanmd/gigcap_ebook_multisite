@extends('templates.01_initial.welcome.main')

@section('styles-files')
@endsection

@section('content')
<section>
	<div class="hero overflow-hidden">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="hero-content mb-5 mb-lg-0 text-lg-start text-center">
						<div class="hero-hdd primary-color mb-4 animate__animated animate__fadeInLeft wow">
							<h2>Enjoy the best titles with a great price</h2>
						</div>
						<div class="hero-des secondary-color mb-4 mb-sm-5 animate__animated animate__fadeInLeft animate__delay-300ms wow">
							<p>Browse, choose and read anytime, anywhere across all devices with BookInSync.</p>
						</div>
						<div class="hero-btn all-btn animate__animated animate__bounceInLeft animate__delay-600ms wow">
							<a href="{{ config('api.CAMPAIGN_DOMAIN') }}/en/c/book-in-sync-signup-copy">Explore Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="hero-img text-center text-lg-end animate__animated animate__fadeInRight wow">
						<img src="{{ asset('01_initial/theme2/images/hero-img.png') }}" alt="hero-img">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="bdr bdr-1">
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</section>

<section>
	<div class="your-team overflow-hidden">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="team-img text-center mb-5 mb-lg-0">
						<img src="{{ asset('01_initial/theme2/images/sc-book-img.png') }}" alt="team-img">
						<div class="book-img">
							<img src="{{ asset('01_initial/theme2/images/book-1.png') }}" alt="book" class="book-1 animate__animated animate__bounceInLeft animate__delay-300ms wow">
							<img src="{{ asset('01_initial/theme2/images/book-2.png') }}" alt="book" class="book-2 animate__animated animate__bounceInLeft wow">
							<img src="{{ asset('01_initial/theme2/images/book-3.png') }}" alt="book" class="book-3 animate__animated animate__bounceInLeft animate__delay-600ms wow">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="team-content pt-4">
						<div class="team-info mb-4 primary-color animate__animated animate__fadeIn wow">
							<h3>Access on the go.</h3>
						</div>
						<div class="team-des secondary-color mb-4 animate__animated animate__fadeInRight animate__delay-300ms wow">
							<p>Whatever your schedule is like, you can access your favorite content wherever you are.</p>
						</div>
						<div class="team-list">
							<ul>
								<li class="animate__animated animate__fadeInRight animate__delay-600ms wow">
									<img src="{{ asset('01_initial/theme2/images/cross.png') }}" alt="cross">
									<span>Easy access from different devices.</span>
								</li>
								<li class="animate__animated animate__fadeInRight animate__delay-900ms wow">
									<img src="{{ asset('01_initial/theme2/images/cross.png') }}" alt="cross">
									<span>Over 2 million titles to chose from.</span>
								</li>
								<li class="animate__animated animate__fadeInRight animate__delay-1200ms wow">
									<img src="{{ asset('01_initial/theme2/images/cross.png') }}" alt="cross">
									<span>Great customer support.</span>
								</li>
							</ul>
						</div>
						<div class="team-des secondary-color mb-4 animate__animated animate__fadeInRight animate__delay-1500ms wow">
							<p>We look forward in having you with us.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="bdr">
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</section>

<section>
	<div class="book-item overflow-hidden">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="books-info mb-sm-5 mb-4 text-center">
						<div class="books-hdd primary-color mb-4 animate__animated animate__zoomIn wow">
							<h2>The Best Books Are Waiting For You</h2>
						</div>
						<div class="books-des secondary-color mb-5 animate__animated animate__fadeInUp animate__delay-300ms wow">
							<p>Develop the habit of constant self-improvement through reading, all for one great price.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="carousel-box animate__animated animate__zoomIn animate__delay-900ms wow">
						<div class="owl-carousel owl-theme" id="course-slider-1">
							<div class="item my-3 mx-2">
								<div class="testimonial-item d-flex flex-column justify-content-center align-items-center"> 
									<div class="img-thumb mb-3">
										<img src="{{ asset('01_initial/theme2/images/tm-1.jpg') }}" alt="tm" />
									</div>
									<div class="book-info">
										<div class="book-content primary-color">
											<p>Ciarán joined your group</p>
										</div>
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item">
									<div class="book-info mb-3">
										<div class="book-author d-flex justify-content-start">
											<img src="{{ asset('01_initial/theme2/images/tm-4.jpg') }}" alt="tm">
											<div class="book-name">
												<p>Martha finish reading</p>
												<h5>Silk to silicon</h5>
											</div>
										</div>
									</div>
									<div class="books-img text-center">
										<img src="{{ asset('01_initial/theme2/images/bk-1.jpg') }}" alt="bk" />
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item">
									<div class="book-info mb-3">
										<div class="book-author">
											<div class="book-name text-center">
												<span>Next up...</span>
												<h5>The Third Wave</h5>
											</div>
										</div>
									</div>
									<div class="books-img text-center">
										<img src="{{ asset('01_initial/theme2/images/bk-2.jpg') }}" alt="bk" />
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item">
									<div class="book-info mb-3">
										<div class="book-author d-flex justify-content-start">
											<img src="{{ asset('01_initial/theme2/images/tm-6.jpg') }}" alt="tm">
											<div class="book-name">
												<p>Jonathan finished reading</p>
												<h5>Working In Public</h5>
											</div>
										</div>
									</div>
									<div class="books-img text-center">
										<img src="{{ asset('01_initial/theme2/images/bk-3.jpg') }}" alt="bk" />
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item">
									<div class="book-info mb-3">
										<div class="book-author d-flex justify-content-start">
											<img src="{{ asset('01_initial/theme2/images/tm-7.jpg') }}" alt="tm">
											<div class="book-name">
												<p>Connor finished reading</p>
												<h5>Industries of the future</h5>
											</div>
										</div>
									</div>
									<div class="books-img text-center">
										<img src="{{ asset('01_initial/theme2/images/bk-4.jpg') }}" alt="bk" />
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item d-flex flex-column justify-content-center align-items-center"> 
									<div class="img-thumb mb-3">
										<img src="{{ asset('01_initial/theme2/images/tm-10.jpg') }}" alt="tm" />
									</div>
									<div class="book-info">
										<div class="book-content primary-color">
											<p>Smith joined your group</p>
										</div>
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item">
									<div class="book-info mb-3">
										<div class="book-author d-flex justify-content-start">
											<img src="{{ asset('01_initial/theme2/images/tm-9.jpg') }}" alt="tm">
											<div class="book-name">
												<p>Michel finished reading</p>
												<h5>Free kindle books</h5>
											</div>
										</div>
									</div>
									<div class="books-img text-center">
										<img src="{{ asset('01_initial/theme2/images/bk-8.jpg') }}" alt="bk" />
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item">
									<div class="book-info mb-3">
										<div class="book-author d-flex justify-content-start">
											<img src="{{ asset('01_initial/theme2/images/tm-14.jpg') }}" alt="tm">
											<div class="book-name">
												<p>Kina finished reading</p>
												<h5>How to read a book</h5>
											</div>
										</div>
									</div>
									<div class="books-img text-center">
										<img src="{{ asset('01_initial/theme2/images/bk-11.jpg') }}" alt="bk" />
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item">
									<div class="book-info mb-3">
										<div class="book-author d-flex justify-content-start">
											<img src="{{ asset('01_initial/theme2/images/tm-2.jpg') }}" alt="tm">
											<div class="book-name">
												<p>Jack finished reading</p>
												<h5>Little book of boards</h5>
											</div>
										</div>
									</div>
									<div class="books-img text-center">
										<img src="{{ asset('01_initial/theme2/images/bk-10.jpg') }}" alt="bk" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="carousel-box animate__animated animate__zoomIn animate__delay-1200ms wow">
						<div class="owl-carousel owl-theme" id="course-slider-2">
							<div class="item my-3 mx-2">
								<div class="testimonial-item d-flex flex-column justify-content-center align-items-center"> 
									<div class="img-thumb mb-3">
										<img src="{{ asset('01_initial/theme2/images/tm-8.jpg') }}" alt="tm" />
									</div>
									<div class="book-info">
										<div class="book-content primary-color">
											<p>John joined your group</p>
										</div>
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item">
									<div class="book-info mb-3">
										<div class="book-author d-flex justify-content-end">
											<div class="book-name text-start">
												<p>Martha finish reading</p>
												<h5>The dream machine</h5>
											</div>
											<img src="{{ asset('01_initial/theme2/images/tm-3.jpg') }}" alt="tm">
										</div>
									</div>
									<div class="books-img text-center">
										<img src="{{ asset('01_initial/theme2/images/bk-5.jpg') }}" alt="bk" />
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item">
									<div class="book-info mb-3">
										<div class="book-author">
											<div class="book-name text-center">
												<span>Next up...</span>
												<h5>Read People</h5>
											</div>
										</div>
									</div>
									<div class="books-img text-center">
										<img src="{{ asset('01_initial/theme2/images/bk-13.jpg') }}" alt="bk" />
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item d-flex flex-column justify-content-center align-items-center"> 
									<div class="img-thumb mb-3">
										<img src="{{ asset('01_initial/theme2/images/tm-5.jpg') }}" alt="tm" />
									</div>
									<div class="book-info">
										<div class="book-content primary-color">
											<p>Andrew joined your group</p>
										</div>
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item">
									<div class="book-info mb-3">
										<div class="book-author d-flex justify-content-end">
											<div class="book-name text-start">
												<p>Jonathan finished reading</p>
												<h5>Working In Public</h5>
											</div>
											<img src="{{ asset('01_initial/theme2/images/tm-12.jpg') }}" alt="tm">
										</div>
									</div>
									<div class="books-img text-center">
										<img src="{{ asset('01_initial/theme2/images/bk-12.jpg') }}" alt="bk" />
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item">
									<div class="book-info mb-3">
										<div class="book-author d-flex justify-content-end">
											<div class="book-name text-start">
												<p>Connor finished reading</p>
												<h5>Industries of the future</h5>
											</div>
											<img src="{{ asset('01_initial/theme2/images/tm-13.jpg') }}" alt="tm">
										</div>
									</div>
									<div class="books-img text-center">
										<img src="{{ asset('01_initial/theme2/images/bk-6.jpg') }}" alt="bk" />
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item d-flex flex-column justify-content-center align-items-center"> 
									<div class="img-thumb mb-3">
										<img src="{{ asset('01_initial/theme2/images/tm-16.jpg') }}" alt="tm" />
									</div>
									<div class="book-info">
										<div class="book-content primary-color">
											<p>Ana joined your group</p>
										</div>
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item">
									<div class="book-info mb-3">
										<div class="book-author d-flex justify-content-end">
											<div class="book-name text-start">
												<p>Michel finished reading</p>
												<h5>Free kindle books</h5>
											</div>
											<img src="{{ asset('01_initial/theme2/images/tm-15.jpg') }}" alt="tm">
										</div>
									</div>
									<div class="books-img text-center">
										<img src="{{ asset('01_initial/theme2/images/bk-9.jpg') }}" alt="bk" />
									</div>
								</div>
							</div>
							<div class="item my-3 mx-2">
								<div class="testimonial-item">
									<div class="book-info mb-3">
										<div class="book-author d-flex justify-content-end">
											<div class="book-name text-start">
												<p>Kina finished reading</p>
												<h5>How to read a book</h5>
											</div>
											<img src="{{ asset('01_initial/theme2/images/tm-17.jpg') }}" alt="tm">
										</div>
									</div>
									<div class="books-img text-center">
										<img src="{{ asset('01_initial/theme2/images/bk-7.jpg') }}" alt="bk" />
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
	<div class="bdr bdr-1">
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</section>

<section>
	<div class="refund-section overflow-hidden">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="top-heading mb-5">
						<div class="default-heading text-center primary-color mb-4 animate__animated animate__fadeInUp wow">
							<h3> Contact Information</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
					<div class="phone mb-4 mb-lg-0 text-center text-lg-start">
						<h4 class="primary-color animate__animated animate__fadeInLeftBig wow"><i class="fas fa-phone"></i> Phone</h4>
						<p class="animate__animated animate__fadeInLeftBig animate__delay-300ms wow"><a href="tel:{{ config('api.SUPPORT_PHONE') }}">{{ config('api.SUPPORT_PHONE') }}</a></p>
					</div>
				</div>
				<div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
					<div class="email mb-4 mb-lg-0 text-center text-lg-start">
						<h4 class="primary-color animate__animated animate__zoomIn wow"><i class="fas fa-envelope"></i> Email</h4>
						<p class="animate__animated animate__zoomIn animate__delay-300ms wow"><a href="mailto:{{ config('api.SUPPORT_EMAIL') }}">{{ config('api.SUPPORT_EMAIL') }}</a></p>
					</div>
				</div>
				<div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
					<div class="refund text-center text-lg-start">
						<h4 class="primary-color animate__animated animate__fadeInRightBig wow"><i class="fa-solid fa-credit-card"></i> Refund Policy</h4>
						<p class="animate__animated animate__fadeInRightBig animate__delay-300ms wow">100% Refund in first 14 days after purchase</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="bdr">
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</section>

@include('templates.01_initial.partials.pricing')

@endsection