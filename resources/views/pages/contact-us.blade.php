@extends('layouts.main')

@section('styles-files')
 	<link href="{{ asset ('theme/css/contact/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('theme/common/default.css') }}" rel="stylesheet">
     
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
                                    <h2>Contact us</h2>
                                    <p>Feel free to contact us through the web form, email address or
                                        telephone number at your convenience. We are here for you.</p>

                                </div>
                                <div class="our-address ps-lg-4">
                                    <h5>Our address</h5>
                                    <p>{{ config('api.COMPANY_ADDRESS') }}
                                    {{ config('api.COMPANY_CITY') }}, {{ config('api.COMPANY_POSTCODE')}} <span>{{ config('api.COMPANY_COUNTRY') }}</span></p>
                                    <span><i class="fas fa-mobile-alt"></i><a href="tel:{{ config('api.SUPPORT_PHONE') }}" class="a-color"> {{ config('api.SUPPORT_PHONE') }}</a></span>
                                    <p class="mll"><i class="fas fa-envelope"></i><a href="mailto:{{ config('api.SUPPORT_EMAIL') }}" class="a-color"> {{ config('api.SUPPORT_EMAIL') }}</a></p>
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
    <div class="contact">
        <div class="container-mask">
            <div class="row">
                <div class="col-12">
                    <div class="line-y">
                        <img src="{{ asset('theme/images/y-line.png') }}" alt="Yellow-black-line">
                    </div>
                </div>
                <div class="col-12 py-5">
                    <div class="contact-form mb-4 text-center">
                        <h2> Send us a message</h2>
                    </div>
                    <form action="{{ route('contact-us') }}" method="post" class="my-form text-center mx-auto" >
                        <div class="name nsf">
                            <div class="f-name common">
                                <input type="text" placeholder="First Name*" name="firstName" id="firstName" size="40" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="l-name common">
                                <input type="text" placeholder="Last Name*" name="lastname" id="email" size="40" aria-required="true" aria-invalid="false" required>
                            </div>
                        </div>
                        <div class="mail nsf">
                            <div class="email common">
                                <input type="text" placeholder="Email*" name="email" id="email" size="40" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="subject common">
                                <input type="text" placeholder="Subject" name="subject" id="subject" size="40" aria-invalid="false">
                            </div>
                        </div>
                        <div class="message mb-2">
                            <textarea rows="7" placeholder="Message*" name="body" id="body" style="width:100%;" aria-invalid="false"></textarea>
                        </div>
                        <div class="submit-btn">
                            <button type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> -->

<div class="contact">
    <div class="row">
        <div class="col-12">
            <div class="contact-heading text-center">
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
                                    <img src="{{ asset('theme/images/contact/location.png') }}" alt="location">
                                </div>
                                <div class="c-des ps-2">
                                    <h5>Office Location</h5>
                                    <p>{{ config('api.COMPANY_ADDRESS') }}
                                    {{ config('api.COMPANY_CITY') }}, {{ config('api.COMPANY_POSTCODE')}} <span>{{ config('api.COMPANY_COUNTRY') }}</span></p>
                                    <!-- <p>Urban-Loritz-Platz, 1070 Wien, Austria</p> -->
                                </div>
                            </div>
                            <div class="phone common mb-5 d-flex justify-content-start">
                                <div class="c-img pe-2">
                                    <img src="{{ asset('theme/images/contact/phone.png') }}" alt="phone">
                                </div>
                                <div class="c-des ps-2">
                                    <h5>Call us anytime</h5>
                                    <p><a href="tel:{{ config('api.SUPPORT_PHONE') }}" style="color: white;"> {{ config('api.SUPPORT_PHONE') }}</a></p>
                                    <!-- <p>+1 1234567890, +1 9876543210</p> -->
                                </div>
                            </div>
                            <div class="website common mb-5 d-flex justify-content-start">
                                <div class="c-img pe-2">
                                    <img src="{{ asset('theme/images/contact/website.png') }}" alt="website">
                                </div>
                                <div class="c-des ps-2">
                                    <h5>Visit website</h5>
                                    <p><a href="mailto:{{ config('api.SUPPORT_EMAIL') }}" style="color: white;"> {{ config('api.SUPPORT_EMAIL') }}</a></p>
                                    <!-- <p>https://pixer.io</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="contact-form">
                            <form action="{{ route('contact-us') }}" method="post" class="my-form text-center mx-auto">
                                <div class="fst overflow-hidden">
                                    <div class="name mb-4 pe-sm-2">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="firstName" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="mail mb-4 ps-sm-2">
                                        <label for="mail">Email</label>
                                        <input type="email" id="mail" name="email" id="email" aria-required="true" aria-invalid="false" required>
                                    </div>
                                </div>
                                <div class="subject mb-4">
                                    <label for="subject">Subject</label>
                                    <input type="text" name="subject" id="subject" aria-invalid="false">
                                </div>
                                <div class="message mb-4">
                                    <label for="message">Message</label>
                                    <textarea rows="7" cols="30" name="body" id="message" aria-invalid="false"></textarea>
                                </div>
                                <div class="send mb-4">
                                    <!-- <input type="submit" value="Contact Us"> -->
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

@endsection

