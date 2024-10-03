@extends('layouts.main')

@section('styles-files')
 	<link href="{{ asset ('theme_backup/css/contact/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('theme_backup/common/default.css') }}" rel="stylesheet">
 @endsection

@section('content')

<div class="contact">
    <div class="container" style="background-color:white;">
        <div class="row">
            <div class="col-12">
                <div class="contact-heading text-center" style="margin-top:100px">
                    <h3>Need help? Contact us</h3>
                    <p>Looking for help? Drop your contact details here</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-bg">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="contact-info mb-4 mb-lg-0">
                                <div class="c-info mb-5">
                                    <h4>Contact Information</h4>
                                    <p>Fill out the form and our team will get back to you within 24 hours.</p>
                                </div>
                                <div class="location common mb-5 d-flex justify-content-start">
                                    <div class="c-img pe-2">
                                        <!-- <img src="{{ asset('theme/images/contact/location.png') }}" alt="location"> -->
                                        <i class='fas fa-building fa-3x' style='color: #000; font-weight:100;'></i>
                                    </div>
                                    <div class="c-des ps-2">
                                        <h5>Office Location</h5>
                                        <p>{{ config('api.COMPANY_ADDRESS') }}
                                                    {{ config('api.COMPANY_CITY') }}, {{ config('api.COMPANY_POSTCODE')}} <span>{{ config('api.COMPANY_COUNTRY') }}</p>
                                    </div>
                                </div>
                                <div class="phone common mb-5 d-flex justify-content-start">
                                    <div class="c-img pe-2">
                                        <!-- <img src="{{ asset('theme/images/contact/phone.png') }}" alt="phone"> -->
                                        <i class='fas fa-mobile fa-3x' style='color: #000;'></i>
                                    </div>
                                    <div class="c-des ps-2">
                                        <h5>Call us anytime</h5>
                                        <p><a href="tel:{{ config('api.SUPPORT_PHONE') }}" style="color: rgba(0,0,0, 0.8);"> {{ config('api.SUPPORT_PHONE') }}</a></p>
                                    </div>
                                </div>
                                <div class="website common mb-5 d-flex justify-content-start">
                                    <div class="c-img pe-2">
                                        <!-- <img src="{{ asset('theme/images/contact/website.png') }}" alt="website"> -->
                                        <i class='fas fa-envelope fa-3x' style='color: #000; font-weight:100;'></i>
                                    </div>
                                    <div class="c-des ps-2">
                                        <h5>Visit website</h5>
                                        <p><a href="mailto:{{ config('api.SUPPORT_EMAIL') }}" style="color: rgba(0,0,0, 0.8);"> {{ config('api.SUPPORT_EMAIL') }}</a></p>
                                    </div>
                                </div>
                                <div class="website common mb-5 d-flex justify-content-start">
                                    <div class="c-img pe-2">
                                        <!-- <img src="{{ asset('theme/images/contact/website.png') }}" alt="website"> -->
                                        <i class='fas fa-clock fa-3x' style='color: #000;font-weight:100;'></i>
                                    </div>
                                    <div class="c-des ps-2">
                                        <h5>Office Hours</h5>
                                        <p>{{ config('api.SUPPORT_HOURS') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="contact-form">
                                <form action="{{ route('contact-us') }}" method="post">
                                    <div class="fst overflow-hidden">
                                        @csrf
                                        <div class="name mb-4 pe-sm-2">
                                            <label for="name">First Name</label>
                                            <input type="text" id="name"  name="firstname" aria-required="true" aria-invalid="false" required>
                                        </div>
                                        <div class="name mb-4 pe-sm-2">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" id="lastname"  name="lastname" aria-required="true" aria-invalid="false" required>
                                        </div>
                                        <div class="mail mb-4 ps-sm-2">
                                            <label for="mail">Email</label>
                                            <input type="email" id="mail" name="email" id="email" aria-required="true" aria-invalid="false" required>
                                        </div>
                                    </div>
                                    <div class="subject mb-4">
                                        <label for="subject">Subject</label>
                                        <input type="text" id="subject"  name="subject" aria-invalid="false" required>
                                    </div>
                                    <div class="message mb-4">
                                        <label for="message">Message</label>
                                        <textarea id="message" cols="30" rows="7" name="message" aria-invalid="false"></textarea>
                                    </div>
                                    @captcha()
                                    <div class="send mb-4">
                                        <button type="submit">Contact Us</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
