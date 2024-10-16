@extends('templates.booksee365com.welcome.main')

@section('styles-files')
    
@endsection

@section('content')

<section class="page-banner-wrap bg-cover">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-heading">
                    <div class="sub-title">
                        <p>@lang('trans_booksee365.Welcome to our company')</p>
                    </div>
                    <div class="page-title">
                        <h1>@lang('trans_booksee365.Get In Touch')</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">@lang('trans_booksee365.Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('trans_booksee365.Contact Us')</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="contact-page-wrap section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-contact-card card1">
                    <div class="top-part">
                        <div class="icon">
                            <i class="fal fa-envelope"></i>
                        </div>
                        <div class="title mt-3">
                            <h4>@lang('trans_booksee365.Email Address')</h4>
                        </div>
                    </div>
                    <div class="bottom-part">
                        <div class="info">
                            <p><a href="mailto:{{ config('booksee365com.SUPPORT_EMAIL') }}">{{ config('booksee365com.SUPPORT_EMAIL') }}</a></p>
                        </div>
                        <div class="icon">
                            <i class="fal fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-contact-card card2">
                    <div class="top-part">
                        <div class="icon">
                            <i class="fal fa-phone"></i>
                        </div>
                        <div class="title mt-3">
                            <h4>@lang('trans_booksee365.Phone Number')</h4>
                        </div>
                    </div>
                    <div class="bottom-part">
                        <div class="info">
                            <p><a href="mailto:{{ config('booksee365com.SUPPORT_PHONE') }}">{{ config('booksee365com.SUPPORT_PHONE') }}</a></p>
                        </div>
                        <div class="icon">
                            <i class="fal fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-contact-card card3">
                    <div class="top-part">
                        <div class="icon">
                            <i class="fal fa-map-marker-alt"></i>
                        </div>
                        <div class="title mt-3">
                            <h4>@lang('trans_booksee365.Office Address')</h4>
                        </div>
                    </div>
                    <div class="bottom-part">
                        <div class="info">
                            <p>{{ config('booksee365com.COMPANY_NAME') }}, {{ config('booksee365com.COMPANY_ADDRESS') }}, <br> {{ config('booksee365com.COMPANY_CITY') }}, {{ config('booksee365com.COMPANY_POSTCODE')}} {{ config('booksee365com.COMPANY_COUNTRY') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fal fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-contact-card card1">
                    <div class="top-part">
                        <div class="icon">
                            <i class="fal fa-clock"></i>
                        </div>
                        <div class="title mt-3">
                            <h4>@lang('trans_booksee365.Working Hours')</h4>
                        </div>
                    </div>
                    <div class="bottom-part">
                        <div class="info">
                            <p>{{ config('booksee365com.SUPPORT_HOURS') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fal fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-contact-card card2">
                    <div class="top-part">
                        <div class="icon">
                            <i class="fal fa-hashtag"></i>
                        </div>
                        <div class="title mt-3">
                            <h4>@lang('trans_booksee365.Business Number')</h4>
                        </div>
                    </div>
                    <div class="bottom-part">
                        <div class="info">
                            <p>{{ config('booksee365com.COMPANY_BUSINESS_NUMBER') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fal fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-contact-card card3">
                    <div class="top-part">
                        <div class="icon">
                            <i class="fal fa-money-check-alt"></i>
                        </div>
                        <div class="title mt-3">
                            <h4>@lang('trans_booksee365.VAT Number')</h4>
                        </div>
                    </div>
                    <div class="bottom-part">
                        <div class="info">
                            <p>{{ config('booksee365com.COMPANY_VAT_NUMBER') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fal fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row section-padding pb-0">
            <div class="col-12 text-center mb-20">
                <div class="section-title no-bg">
                    <h1>@lang('trans_booksee365.Contact Us')</h1>
                </div>
            </div>

            <div class="col-12 col-lg-12">
                <div class="contact-form">
                    <form action="{{ route('contact-us') }}" method="post" class="row conact-form">
                        @csrf
                        <div class="col-md-6 col-12">
                            <div class="single-personal-info">
                                <label for="firstname">@lang('trans_booksee365.First Name')</label>
                                <input type="text" id="firstname"  name="firstname" aria-required="true" aria-invalid="false" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="single-personal-info">
                                <label for="lastname">@lang('trans_booksee365.Last Name')</label>
                                <input type="text" id="lastname" name="lastname" aria-required="true" aria-invalid="false" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="single-personal-info">
                                <label for="email">@lang('trans_booksee365.Email Address')</label>
                                <input type="email" id="email" name="email" aria-required="true" aria-invalid="false" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="single-personal-info">
                                <label for="subject">@lang('trans_booksee365.Subject')</label>
                                <input type="text" id="subject"  name="subject" aria-invalid="false" required>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="single-personal-info">
                                <label for="subject">@lang('trans_booksee365.Enter Message')</label>
                                <textarea id="message" name="message" aria-invalid="false"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-12 text-center">
                            <input class="submit-btn" type="submit" value="@lang('trans_booksee365.Send Message')">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

