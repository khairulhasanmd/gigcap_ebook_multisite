@extends('templates.01_initial.welcome.main')

@section('styles-files')
	<link rel="stylesheet" href="{{ asset('01_initial/theme2/css/about.css') }}">
@endsection

@section('content')
<section>
	<div class="about overflow-hidden">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="about-content pt-lg-5 mb-5 mb-lg-0">
						<div class="about-hdd primary-color text-center text-lg-start text-capitalize mb-4 animate__animated animate__fadeIn wow">
							<h2>About Us</h2>
						</div>
						<div class="about-des secondary-color text-center text-lg-start">
							<p class="mb-4 animate__animated animate__fadeInLeft wow">At BookInSync, we are working to bring the very essence of good reads to every home and smart devices around the world. Besides the vast catalog that we host, we aim to make our service available to all readers with a single simple, affordable pricing. BookInSync is dedicated to work closely with our partners to bring more quality titles to all our members.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-img">
						<div class="about-main-img text-lg-end text-center">
							<img src="{{ asset('01_initial/theme2/images/about-img.png') }}" alt="about-img" class="animate__animated animate__fadeInRight wow">
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

@include('templates.01_initial.partials.pricing')

@endsection