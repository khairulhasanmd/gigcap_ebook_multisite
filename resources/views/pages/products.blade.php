@extends('layouts.main')

@section('styles-files')
 	<link href="{{ asset ('theme/courses/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset ('theme/common/default.css') }}" rel="stylesheet">
 @endsection

@section('content')
    <!-- <section class="hero hero__ifreme"></section> -->

        @if($subscription->data->status != "active")
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="hero-content">
                            <h3 class="hero-subtitle mb-5">Dear {{ $user->data->first_name}} {{ $user->data->last_name}}</h3>
                            <h1 class="hero-title">Your subscription has expired.</h1>
                        </div>
                    </div>
                    <div class="offset-md-7"></div>
                </div>
            </div>
        @else
            <!-- <div id="spinner" style=" width: 100%; height: 100%; position: absolute; left: 0; top: 0; right: 0; bottom: 0;">
                <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                    <img src="https://files.fieryx.com/code-camp/spinner.gif" />
                </div>
            </div> -->

            
            <div class="work-box">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="box-menu py-3">
                                <ul class="slick-carousal">
                                    <li class="mixitup-control-active" data-filter="*">All</li>
                                   
                                    @foreach($productTags as $productTag)
                                        <li data-filter=".{{strtolower($productTag->tag->name) }}">{{$productTag->tag->name}}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row box-list">
                        
                        @foreach ($products as $product)

                            <div class="col-lg-4 col-md-6 col-xxl-3 mix box-item {{App\Service\ProductEbook::getTags($product->productTags) }}">
                                <div class="mx-box">
                                    <div class="mix-img mb-3">
                                        @if ($product->image) 
                                            <img src="{{ asset('images/'.$product->image) }}" alt="responsive-web-design">
                                        @else    
                                            <img src="{{ asset('theme/images/product/Group-14289.jpg') }}" alt="Gp">
                                        @endif
                                        <div class="effect d-flex justify-content-center align-items-center">
                                            <div class="preview text-center pe-2">
                                                <a href="{{$product->pdf_url}}" target="_blank"><i class="fas fa-download"></i><span>Download</span></a>
                                            </div>
                                            <div class="details ps-2">
                                                <a href="#"><i class="fas fa-external-link-alt"></i><span>Details</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mix-content d-flex justify-content-between align-items-start">
                                        <div class="brand-img">
                                            <img src="{{ asset('theme/images/brand/omatron.png') }}" alt="omatron">
                                        </div>
                                        <div class="theme-info me-auto ps-2">
                                            <!-- <h4>StoryHub WordPress Blog Theme</h4> -->
                                            <h4>{{$product->product_name}}</h4>
                                            <a href="#"> Omatron</a>
                                        </div>
                                        <!-- <div class="price ps-2 text-end">
                                            <p>$55.00</p>
                                            <span><del>$59.00</del></span>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="more-btn text-center mt-4 mb-5">
                                <a href="#">Load More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
@endsection

