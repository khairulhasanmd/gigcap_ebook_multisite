@extends('welcome.main')

@section('styles-files')
    <link rel="stylesheet" href="{{ asset ('theme2/css/contact.css') }}">
@endsection

@section('content')
<section>
    <div class="contact-us overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-content mb-5 mb-lg-0 pt-lg-5">
                        <div class="contact-hdd primary-color text-capitalize mb-3 animate__animated animate__fadeIn wow">
                            <h2>Contact Information</h2>
                        </div>
                        <div class="contact-des secondary-color mb-4 animate__animated animate__fadeIn animate__delay-300ms wow">
                            <p>Looking For Help? Drop Your Contact Details Here</p>
                        </div>
                        <div class="phone-no mb-4">
                            <p class="animate__animated animate__fadeInLeft wow"><i class="fas fa-phone"></i> Phone: <a href="tel:{{ config('api.SUPPORT_PHONE') }}">{{ config('api.SUPPORT_PHONE') }}</a></p>
                        </div>
                        <div class="email-id mb-4">
                            <p class="animate__animated animate__fadeInLeft animate__delay-300ms wow"><i class="fas fa-envelope"></i> Email: <a href="mailto:{{ config('api.SUPPORT_EMAIL') }}">{{ config('api.SUPPORT_EMAIL') }}</a></p>
                        </div>
                        <div class="address primary-color">
                            <p class="animate__animated animate__fadeInLeft animate__delay-600ms wow"><i class="fa-solid fa-location-dot"></i> Location: <span>{{ config('api.COMPANY_ADDRESS') }} {{ config('api.COMPANY_CITY') }}, {{ config('api.COMPANY_POSTCODE')}} {{ config('api.COMPANY_COUNTRY') }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-img">
                        <div class="contact-main-img text-center">
                            <img src="{{ asset('theme2/images/contact-img.png') }}" alt="contact-img" class="animate__animated animate__fadeInRight wow">
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
    <div class="contact overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-info mb-5 text-center">
                            <h3 class="primary-color animate__animated animate__fadeInUp wow">Contact us</h3>
                            <p class="secondary-color animate__animated animate__fadeInUp animate__delay-300ms wow">Fill out the form and our team will get back to you within 24 hours.</p>
                        </div>
                        <div class="form">
                            <div class="single-form">
                                <form action="{{ route('contact-us') }}" method="post">
                                    @csrf
                                    <div class="name common mb-3">
                                        <label for="name" class="animate__animated animate__fadeInRight wow">Full Name *</label>
                                        <input type="text" id="name" name="firstName" required>
                                    </div>
                                    <div class="mail common mb-3">
                                        <label for="mail" class="animate__animated animate__fadeInRight animate__delay-300ms wow">Email *</label>
                                        <input type="email" id="email" name="email" required>
                                    </div>
                                    <div class="subject common mb-3">
                                        <label for="subject" class="animate__animated animate__fadeInRight animate__delay-600ms wow">Subject *</label>
                                        <input type="text" id="subject" name="subject" required>
                                    </div>
                                    <div class="msg common mb-5">
                                        <label for="msg" class="animate__animated animate__fadeInRight animate__delay-900ms wow">Message *</label>
                                        <textarea id="message" cols="30" rows="5" required></textarea>
                                    </div>
                                    <div class="submit text-center">
                                        <button type="submit" class="animate__animated animate__bounceInLeft wow">Contact Us</button>
                                    </div>
                                </form>
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
@endsection

