 @extends('templates.mentoringlibrarycom.welcome.main')
 {{-- @extends('templates.01_initial.welcome.main') --}}



 @section('styles-files')
 	
 @endsection


@section('content')

<section>
    <!-- Hero Section start  -->
    <div class="hero-section hero-1 fix py-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-8 col-lg-6">
                    <div class="hero-items">
                        <div class="book-shape">
                            <img src="{{ asset ('mentoringlibrarycom/') }}/img/book.png" alt="shape-img">
                        </div>
                        <div class="frame-shape1 float-bob-x">
                            <img src="{{ asset ('mentoringlibrarycom/') }}/img/frame.png" alt="shape-img">
                        </div>
                        <div class="frame-shape2 float-bob-y">
                            <img src="{{ asset ('mentoringlibrarycom/') }}/img/frame-2.png" alt="shape-img">
                        </div>
                        <div class="frame-shape3">
                            <img src="{{ asset ('mentoringlibrarycom/') }}/img/xstar.png" alt="img">
                        </div>
                        <div class="frame-shape4 float-bob-x">
                            <img src="{{ asset ('mentoringlibrarycom/') }}/img/frame-shape.png" alt="img">
                        </div>
                        <div class="bg-shape1">
                            <img src="{{ asset ('mentoringlibrarycom/') }}/img/bg-shape.png" alt="img">
                        </div>
                        <div class="bg-shape2">
                            <img src="{{ asset ('mentoringlibrarycom/') }}/img/bg-shape2.png" alt="shape-img">
                        </div>
                        <div class="hero-content">
                            <h6 class="wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Welcome to Mentoringlibrary</h6>
                            <h1 class="wow fadeInUp" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">Awaken Your Business Potential
                            </h1>
                            <h2>Key insights and strategies for today’s successful modern entrepreneur.</h2>
                            <div class="form-clt wow fadeInUp" data-wow-delay=".9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInUp;">
                                <button type="submit" class="theme-btn mt-5">
                                    <a style="color: #fff" href="@guest {{ route('welcome')}} @else {{route('products')}} @endguest">Get Now </a><i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-xl-4 col-lg-6">
                    <div class="girl-image">
                        <img class=" float-bob-x img-fluid b-0" src="{{ asset ('mentoringlibrarycom/') }}/img/hero_girl.png"  alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Feature Section start  -->
    <section class="feature-section fix section-padding">
        <div class="container">
            <div class="feature-wrapper">
                <div class="feature-box-items wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <div class="icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div class="content">
                        <h3>Mail Us</h3>
                        <p><a href="mailto:support@example.com">support@example.com</a></p>
                    </div>
                </div>
                <div class="feature-box-items wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <div class="icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <div class="content">
                        <h3>Call Us</h3>
                        <p><a href="tel:+012 345 6789">+012 345 6789</a></p>
                    </div>
                </div>
                <div class="feature-box-items wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="icon">
                        <i class="bi bi-credit-card"></i>
                    </div>
                    <div class="content">
                        <h3>Refund Policy</h3>
                        <p>100% Refund in first 14 days after purchase</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Section start  -->
    <section class="shop-section section-padding fix pt-0">
        <div class="container">
           <div class="row">
               <div class="col-lg-6">
                <div class="wrap">
                    <img src="{{ asset ('mentoringlibrarycom/') }}/img/happy-male-entrepreneur.jpg" class="img-fluid" alt="">
                </div>
               </div>
               <div class="col-lg-6">
                <div class="wrap p-5">
                    <h1>Start Building Your Business Empire with Our Proven Strategies and Support.</h1>
                    <p class="pt-3">Discover the keys to success with us. Explore a treasure trove of knowledge on our platform, empower yourself, and embark on a path of learning and growth. Your journey to success begins here. Embrace new opportunities, build your skills, and transform your ambitions into achievements. Let us guide you every step of the way.</p>
                </div>
               </div>
           </div>
            
           
        </div>
    </section>

    <!-- Book Catagories Section start  -->
    <section class="book-catagories-section fix section-padding">
        <div class="asset1"><img src="{{ asset ('mentoringlibrarycom/') }}/img/Asset 2.png" alt="" srcset=""></div>
        <div class="asset2 float-bob-y"><img src="{{ asset ('mentoringlibrarycom/') }}/img/Asset 4.png" alt="" srcset=""></div>
        <div class="asset3"><img src="{{ asset ('mentoringlibrarycom/') }}/img/Asset 5.png" alt="" srcset=""></div>
        <div class="asset4 float-bob-x"><img src="{{ asset ('mentoringlibrarycom/') }}/img/Asset 6.png" alt="" srcset=""></div>
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-lg-6">
                    <div class="book_wrap1">
                         <h1>Blueprint for Business Growth, A Comprehensive Guide</h1>
                         <p>Blueprint for Business Growth: This comprehensive guide presents a detailed framework for entrepreneurs and business leaders seeking to drive sustainable growth. It covers essential strategies, practical insights, and innovative methods to overcome challenges, seize opportunities, and enhance operational efficiency, all while fostering a culture of adaptability and resilience to thrive in a competitive landscape and ensure long-term success.</p>
       
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="book_wrap2">
                         <h1>Entrepreneurial Growth Hacks, Mastering the Art of Expansion</h1>
                         <p>Entrepreneurial Growth Hacks: Mastering the Art of Expansion is your go-to guide for accelerating business growth. This resource offers innovative strategies for optimizing resources, leveraging technology, and improving customer engagement. Learn to identify market opportunities, make data-driven decisions, and effectively navigate challenges to ensure your business thrives and achieves sustainable success in a competitive landscape.</p>
       
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <!-- Cta Banner Section start  -->
    <section class="cta-banner-section fix section-padding py-5">
        <div class="container">
            
        </div>
    </section>

   

 <!-- Pricing Section -->


 <!-- /Pricing Section -->



 @php
//  dd($products->contents());
@endphp

    <!-- News Section start  -->
    <section class="news-section fix section-padding section-bg">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Our Latest Books</h2>
                <p class="wow fadeInUp" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">Discover our newest arrivals!<br> Explore a curated selection of the latest books to enhance your reading experience and knowledge.</p>
            </div>
            <div class="row">

                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="news-card-items">
                            <div class="news-image">
                                <img src="{{ asset ('') }}images/1687404605.jpg" alt="img">
                                <img src="{{ asset ('') }}images/1687404605.jpg" alt="img">
                            
                            </div>
                            <div class="news-content">
                            
                                <h3><a href="@guest {{route('welcome')}}#pricing @else {{route('products')}} @endguest">Developing Emotional Inte</a></h3>
                                <p>Enhance emotional intelligence by increasing self-awareness, managing emotions, fostering empathy, and building deeper, more meaningful relationships.</p>
                                <a href="@guest {{ route('welcome')}}#pricing @else {{route('products')}} @endguest" class="theme-btn-2">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>


                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <div class="news-card-items">
                        <div class="news-image">
                            <img src="{{ asset ('') }}images/1687405019.jpg" alt="img">
                            <img src="{{ asset ('') }}images/1687405019.jpg" alt="img">
                            
                        </div>
                        <div class="news-content">
                           
                            <h3><a href="@guest {{route('welcome')}}#pricing @else {{route('products')}} @endguest">Refine Oneself</a></h3>
                            <p>Refine yourself by cultivating self-awareness, enhancing strengths, and embracing growth to become the best version of who you are.</p>
                             <a href="@guest {{route('welcome')}}#pricing @else {{route('products')}} @endguest" class="theme-btn-2">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <div class="news-card-items">
                        <div class="news-image">
                            <img src="{{ asset ('') }}images/16874041566493be7c87aba.jpg" alt="img">
                            <img src="{{ asset ('') }}images/16874041566493be7c87aba.jpg" alt="img">
                           
                        </div>
                        <div class="news-content">
                            <h3><a href="@guest {{route('welcome')}}#pricing @else {{route('products')}} @endguest">Appease Your Anger</a></h3>
                            <p>Calm your anger by practicing patience, understanding its roots, and channeling emotions into constructive and peaceful actions.</p>
                             <a href="@guest {{route('welcome')}}#pricing @else {{route('products')}} @endguest" class="theme-btn-2">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
                    <div class="news-card-items">
                        <div class="news-image">
                            <img src="{{ asset ('') }}images/1687404100.jpg" alt="img">
                            <img src="{{ asset ('') }}images/1687404100.jpg" alt="img">
                            
                        </div>
                        <div class="news-content">
                            <h3><a href="@guest {{route('welcome')}}#pricing @else {{route('products')}} @endguest">Advance Mental Wellness</a></h3>
                            <p>Elevate your mental wellness through mindfulness, self-care, and positive habits that nurture emotional balance and inner peace.</p>
                            <a href="@guest {{route('welcome')}}#pricing @else {{route('products')}} @endguest" class="theme-btn-2">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('templates.mentoringlibrarycom.partials.pricing')

@endsection

