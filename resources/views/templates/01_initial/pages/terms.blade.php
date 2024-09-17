@extends('welcome.main')

@section('styles-files')
    <link rel="stylesheet" href="{{ asset('theme2/css/about.css') }}">
@endsection
 
@section('content')

<section>
	<div class="about overflow-hidden">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="about-content pt-lg-5 mb-5 mb-lg-0">
						<div class="about-hdd primary-color text-center text-lg-start text-capitalize mb-4 animate__animated animate__fadeIn wow">
							<h2>Terms & Conditions</h2>
						</div>
						<div class="about-des secondary-color text-center text-lg-start">
                            {!! $terms !!}
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

@endsection
