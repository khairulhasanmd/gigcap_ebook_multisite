@extends('templates.clovereadercom.layouts.app')


@section('content')

   <!-- Start breadcrumb area -->
   <div class="breadcrumb-wrapper">

    <div class="container">
        <div class="page-heading">
            <h1>About Us</h1>
            <div class="page-header">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; padding-left: 0px;">
                    <li>
                        <a href="index.html">
                            @lang('trans_clovereadercom.Home')
                        </a>
                    </li>
                    <li>
                        <i class="bi bi-chevron-right"></i>
                    </li>
                    <li>
                        @lang('trans_clovereadercom.About Us')
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End breadcrumb area -->


<section class="about-section section-padding" id="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="about_right ext-center">
                    <div class="row mx-auto">
                        <div class="col-lg-12 col-12 text-start mb-5">
                            <h1 class="section-title text-start">@lang('trans_clovereadercom.Who We Are')</h1>
                            <h3 class="section-title text-start "><span>@lang('trans_clovereadercom.Experience the Future of Reading at CloeReader.')</span></h3>
                        </div>
                        <div class="col-lg-6 py-5">
                            <a href="@guest {{route('welcome')}}#pricing  @else {{route('products')}} @endguest" class="nav_btn btn_hover py-3">@lang('trans_clovereadercom.Start Subsription') <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                        <div class="col-lg-6 ">
                            <p class="text-justify">@lang('trans_clovereadercom.We are dedicated to providing a carefully curated selection of valuable resources tailored for today’s entrepreneurs. Our handpicked titles are accessible and relevant, supporting your growth and success in the business landscape.')</p>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <p class="text-justify">@lang('trans_clovereadercom.Our exclusive online catalog offers a wealth of knowledge designed to enhance your skills and expertise. Explore insightful materials on leadership, marketing, and financial management to navigate the complexities of today’s entrepreneurial world effectively.')</p>
                            <p class="text-justify">@lang('trans_clovereadercom.By equipping you with the right resources, we empower you to realize your full potential as a business leader. Discover inspiration and innovation to stay ahead in your field!')</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xl-4 col-sm-12 col-12 mx-auto text-center mb-5 py-lg-5 pt-sm-0 py-md-5 d-flex">
                            <h5 class="text-center justify-content-center d-block mx-auto"><i class="bi bi-palette-fill"></i> Color Book</h5>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xl-4 col-sm-12 col-12 mx-auto text-center mb-5 py-lg-5 py-sm-0 py-md-5 d-flex">
                            <h5 class="text-center justify-content-center d-block mx-auto"><i class="bi bi-images"></i> @lang('trans_clovereadercom.High Graphic')</h5>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xl-4 col-sm-12 col-12 mx-auto text-center mb-5 py-lg-5 pt-sm-0 py-md-5 d-flex">
                            <h5 class="text-center justify-content-center d-block mx-auto"><i class="bi bi-tablet"></i> @lang('trans_clovereadercom.Mobile View')</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 mx-auto">
                <div class="about_wrap text-center">
                    <img src="{{asset('clovereadercom/') }}/img/about.jpg" class="img-fluid about_img" alt="">
                </div>

            </div>


        </div>
    </div>
</section>

<section class="about-us pb-5">
    <div class="container-fluid pb-5">
       <div class="row">
            <div id="mission" class="col-lg-4">
                <div class="about_content">
                    <h4 class="mt-3">@lang('trans_clovereadercom.Our Mission')</h4>
                <p class="text-justify">@lang("trans_clovereadercom.our mission is to inspire and empower entrepreneurs through ongoing learning. We provide accessible resources that foster personal and professional growth, helping individuals navigate the challenges of today’s business landscape.")</p>
                </div>
            </div>

            <div id="vision" class="col-lg-4">
                <div class="about_content">
                <h4 class="mt-3">@lang('trans_clovereadercom.Our Vision')</h4>
                <p class="text-justify">@lang('trans_clovereadercom.We envision a dynamic community of innovative business leaders who flourish through collaboration and shared insights. By bringing together like-minded individuals, we strive to create an environment where everyone can achieve success together.')</p>
                </div>

            </div>
            <div id="history" class="col-lg-4">
                <div class="about_content">
                <h4 class="mt-3">@lang('trans_clovereadercom.Our History')</h4>
                <p class="text-justify">@lang('trans_clovereadercom.Driven by a passion for supporting entrepreneurs, we have carefully curated a diverse collection of valuable resources. Our journey started with a commitment to enhance the entrepreneurial experience, and we continually adapt to meet your evolving needs.')</p>
                </div>
            </div>
       </div>
    </div>
</section>

@include('templates.clovereadercom.partials.pricing')

@endsection




