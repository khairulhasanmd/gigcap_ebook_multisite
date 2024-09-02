@extends('welcome.main')

@section('styles-files')
	<link rel="stylesheet" href="{{ asset ('theme/welcome/css/main.css') }}">
@endsection

@section('content')

<!-- <section>
    <div class="hero pb-5">
        <div class="container-mask">
            <div class="row">
                <div class="col-12">
                    <div class="top-img">
                        <img src="{{ asset('theme/images/h-top.png') }}" alt="top-img">
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="l-content px-xl-5 ps-md-5 text-center text-md-start mb-5 mb-md-0">
                                <div class="hero-content mb-3 mb-lg-4">
                                    <h2 >About us</h2>
                                    <p>Code Buddies is your companion in getting started in the coding adventure. We understand that coding with zero experience can be a daunting experience, relax, we understand your concern and we are here to guide you through different aspect of coding lessons that will prepare you for the real world.
									</p>
									<p>Besides providing a comphrehensive curriculum, we strive to provide our customers with outstanding support. We strive for 100% satisfaction to all of our customers. To ensure this, we offer full customer service, full money back guarantee during your trial period.</p>
									<p>You will be delighted to know that we will also prepare you for your job interviews when you think you are ready. We want to prepare you for your job interview without any unncessary stress. You will have immediate access to numerous questions from various areas that recruiters typically ask.</p>
									<p>We care about your experience, your progress and your future, we are certain you will be delighted with what we have installed for you. Code Buddies is the right companion you need to kickstart your venture.
									</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="r-img ps-md-5 mb-4">
                                <img src="{{ asset('theme/images/inner-img.png') }}" alt="inner">
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
				<div class="line-y">
                        <img src="{{ asset('theme/images/y-line.png') }}" alt="Yellow-black-line">
                    </div>
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
								<img src="{{ asset('theme/images/cyan-dots.png') }}" alt="blue-dots">
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
							<h2>About Us</h2>
						</div>
						<div class="hero-description text-capitalize mb-5 text-lg-start text-center">
							<p> Not sure what to read next? Explore our catalog of public domain books with our editors?</p>
						</div>
						<!-- <div class="hero-btn default-btn">
							<a class="arro" href="#"> Explore Now <span>&#x21c0;</span></a>
						</div> -->
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

@include('pages.pricing')

@endsection




