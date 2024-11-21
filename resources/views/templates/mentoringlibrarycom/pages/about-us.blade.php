@extends('templates.mentoringlibrarycom.welcome.main')

@section('styles-files')
	
@endsection

@section('content')
        <!-- Start breadcrumb area -->
        <div class="breadcrumb-wrapper">
            <div class="book1">
                <img src="{{ asset ('mentoringlibrarycom/') }}/img/book3.png" alt="book">
            </div>
            <div class="book2">
                <img src="{{ asset ('mentoringlibrarycom/') }}/img/book4.png" alt="book">
            </div>
            <div class="container">
                <div class="page-heading">
                    <h1>@lang('About Us')</h1>
                    <div class="page-header">
                        <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <li>
                                <a href=@guest {{ route('welcome')}} @else {{route('products')}} @endguest">
                                    @lang('Home')
                                </a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                            </li>
                            <li>
                                @lang('About Us')
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcrumb area -->


        <section class="about-section section-padding" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center mb-5">
                        <h1 class="section-title text-center">@lang('Get to Know Us')</h1>
                        <h3 class="section-title text-center "><span>@lang('Connecting Through Books')</span></h3>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="about_wrap">
                            <img src="{{ asset ('mentoringlibrarycom/') }}/img/about2.jpg" class="img-fluid about_img" alt="">
                            <div class="book-section-info">
                            
                                <h1>@lang('Enabling Entrepreneurs and Businesses to Reach Their Goals')</h1>
                                <p>@lang('Our primary goal is to inspire entrepreneurs to embrace continuous learning and enhance their intellectual growth. In today’s fast-paced environment, finding time for personal reflection and strategic thinking can be challenging. However, without dedicated moments to nurture our minds and explore our inner thoughts, we risk falling short in all aspects of our business.')</p>

                                <p>@lang('We take pride in curating a collection of highly regarded, accessible resources designed for modern entrepreneurs. Our exclusive online catalog serves as a hub for business enthusiasts, fostering a community of like-minded individuals. Each member contributes to our collective success, and your support is invaluable and greatly appreciated.')</p>
                                   
                                </div>
                        </div>
                           
                    </div>

                    <div class="col-lg-6 col-12 my-auto">
                        <div class="about_wrap">
                            <div class="book-section-info">
                            
                            <h1>@lang('What We Offer')</h1>
                            <p>@lang("We are committed to providing a carefully curated selection of valuable resources specifically designed for today’s entrepreneurs. Our team has handpicked a diverse range of highly regarded titles that are both accessible and relevant to the fast-paced business landscape. Each resource is chosen to help you grow, innovate, and stay ahead in your entrepreneurial journey.")</p>
    
                            <p>@lang('Our exclusive online catalog offers a wealth of knowledge aimed at enhancing your skills and expertise. Whether youre seeking insights on leadership, marketing, or financial management, our collection is tailored to meet your needs, empowering you to reach your full potential as a business leader.')</p>
                            </div>
                            <img src="{{ asset ('mentoringlibrarycom/') }}/img/about1.jpg" class="img-fluid about_img" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-us pb-5">
            <div class="container pb-5">
               <div class="row">
                <div class="col-lg-4">
                    <img src="{{ asset ('mentoringlibrarycom/') }}/img/about3.jpg" class="img-fluid about_img" alt="">
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12 col-12 text-center mb-5">
                            <h1 class="section-title text-center">@lang('Learn More About Us')</h1>
                            <h3 class="section-title text-center "><span>@lang('Our Mission, Vision and History')</span></h3>
                        </div>
                        <div class="row">
                           
                                <div id="mission" class="col-lg-4">
                                    <div class="about_content">
                                        <h4 class="mt-3">@lang('Our Mission')</h4>
                                    <p>@lang('At Mentoringlibrary, our mission is to inspire and empower entrepreneurs through continuous learning. We provide accessible resources that foster both personal and professional growth, helping individuals navigate the challenges of the modern business landscape.')</p>
                                    </div>
                                </div>
                               
                                <div id="vision" class="col-lg-4">
                                    <div class="about_content">
                                    <h4 class="mt-3">@lang('Our Vision')</h4>
                                    <p>@lang('We envision a vibrant community of innovative business leaders who thrive through shared knowledge and collaboration. By connecting like-minded individuals, we aim to cultivate an environment where everyone can succeed together.')</p>
                                    </div>
                                   
                                </div>
                                <div id="history" class="col-lg-4">
                                    <div class="about_content">
                                    <h4 class="mt-3">@lang('Our History')</h4>
                                    <p>@lang('Founded with a passion for supporting entrepreneurs, we have diligently curated a diverse collection of valuable resources. Our journey began with a commitment to elevate the entrepreneurial experience, and we continue to evolve to meet your needs.')</p>
                                    </div>
                                </div>
                            
                    </div>
                    </div>
                </div>
               </div>
            </div>
        </section>
        
      

@include('templates.mentoringlibrarycom.partials.pricing')

@endsection




