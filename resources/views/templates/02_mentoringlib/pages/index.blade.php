@extends($template.'structure.main')

@push('extra-css')

@endpush

@section('content')

    <!-- Hero Section start  -->
    <div class="hero-section hero-1 fix">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-8 col-lg-6">
                    <div class="hero-items">
                        <div class="book-shape">
                            <img src="{{ asset($asset) }}/img/book.png" alt="shape-img">
                        </div>
                        <div class="frame-shape1 float-bob-x">
                            <img src="{{ asset($asset) }}/img/frame.png" alt="shape-img">
                        </div>
                        <div class="frame-shape2 float-bob-y">
                            <img src="{{ asset($asset) }}/img/frame-2.png" alt="shape-img">
                        </div>
                        <div class="frame-shape3">
                            <img src="{{ asset($asset) }}/img/xstar.png" alt="img">
                        </div>
                        <div class="frame-shape4 float-bob-x">
                            <img src="{{ asset($asset) }}/img/frame-shape.png" alt="img">
                        </div>
                        <div class="bg-shape1">
                            <img src="{{ asset($asset) }}/img/bg-shape.png" alt="img">
                        </div>
                        <div class="bg-shape2">
                            <img src="{{ asset($asset) }}/img/bg-shape2.png" alt="shape-img">
                        </div>
                        <div class="hero-content">
                            <h6 class="wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Welcome to Demo E-Book</h6>
                            <h1 class="wow fadeInUp" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">Unlock Your Business Potential
                            </h1>
                            <h2>Insights and strategies for the modern entrepreneur</h2>
                            <div class="form-clt wow fadeInUp" data-wow-delay=".9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInUp;">
                                <button type="submit" class="theme-btn mt-5">
                                    Get Now <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-xl-4 col-lg-6">
                    <div class="girl-image">
                        <img class=" float-bob-x img-fluid b-0" src="{{ asset($asset) }}/img/hero_girl.png"  alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        <p><a href="{{ asset($asset) }}/mailto:support@example.com">support@example.com</a></p>
                    </div>
                </div>
                <div class="feature-box-items wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <div class="icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <div class="content">
                        <h3>Call Us</h3>
                        <p><a href="{{ asset($asset) }}/tel:+012 345 6789">+012 345 6789</a></p>
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
                    <img src="{{ asset($asset) }}/img/happy-male-entrepreneur.jpg" class="img-fluid" alt="">
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
        <div class="asset1"><img src="{{ asset($asset) }}/img/Asset 2.png" alt="" srcset=""></div>
        <div class="asset2 float-bob-y"><img src="{{ asset($asset) }}/img/Asset 4.png" alt="" srcset=""></div>
        <div class="asset3"><img src="{{ asset($asset) }}/img/Asset 5.png" alt="" srcset=""></div>
        <div class="asset4 float-bob-x"><img src="{{ asset($asset) }}/img/Asset 6.png" alt="" srcset=""></div>
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-lg-6">
                    <div class="book_wrap1">
                         <h1>Blueprint for Business Growth, A Comprehensive Guide</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis quos itaque optio molestiae rem accusamus repellat beatae nulla, fugiat, unde iste blanditiis sint ullam, nostrum cum et excepturi. Et, animi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, mollitia! Natus quasi repellendus similique fugiat cumque deserunt pariatur, eos deleniti molestiae debitis consequuntur inventore tempore error. Laborum sed eos maxime!</p>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="book_wrap2">
                         <h1>Entrepreneurial Growth Hacks, Mastering the Art of Expansion</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis quos itaque optio molestiae rem accusamus repellat beatae nulla, fugiat, unde iste blanditiis sint ullam, nostrum cum et excepturi. Et, animi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, mollitia! Natus quasi repellendus similique fugiat cumque deserunt pariatur, eos deleniti molestiae debitis consequuntur inventore tempore error. Laborum sed eos maxime!</p>

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



    @include($template.'partials.pricing')




    <!-- News Section start  -->
    <section class="news-section fix section-padding section-bg">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Our Latest Books</h2>
                <p class="wow fadeInUp" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">Interdum et malesuada fames ac ante ipsum primis in
                    faucibus. <br> Donec at nulla nulla. Duis posuere ex lacus</p>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="news-card-items">
                        <div class="news-image">
                            <img src="{{ asset($asset) }}/img/09.jpg" alt="img">
                            <img src="{{ asset($asset) }}/img/09.jpg" alt="img">

                        </div>
                        <div class="news-content">

                            <h3><a href="{{ asset($asset) }}/news-details.html">Demo Book Name</a></h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis iusto reprehenderit, nam consequuntur animi rerum voluptatibus quod non. Suscipit distinctio autem unde rem obcaecati illo voluptatem nemo dolorem nostrum et.</p>
                            <a href="{{ asset($asset) }}/index.html#pricing" class="theme-btn-2">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <div class="news-card-items">
                        <div class="news-image">
                            <img src="{{ asset($asset) }}/img/10.jpg" alt="img">
                            <img src="{{ asset($asset) }}/img/10.jpg" alt="img">

                        </div>
                        <div class="news-content">

                            <h3><a href="{{ asset($asset) }}/news-details.html">Demo Book Name</a></h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis iusto reprehenderit, nam consequuntur animi rerum voluptatibus quod non. Suscipit distinctio autem unde rem obcaecati illo voluptatem nemo dolorem nostrum et.</p>
                             <a href="{{ asset($asset) }}/news-details.html" class="theme-btn-2">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <div class="news-card-items">
                        <div class="news-image">
                            <img src="{{ asset($asset) }}/img/11.jpg" alt="img">
                            <img src="{{ asset($asset) }}/img/11.jpg" alt="img">

                        </div>
                        <div class="news-content">
                            <h3><a href="{{ asset($asset) }}/news-details.html">Demo Book Name</a></h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis iusto reprehenderit, nam consequuntur animi rerum voluptatibus quod non. Suscipit distinctio autem unde rem obcaecati illo voluptatem nemo dolorem nostrum et.</p>
                             <a href="{{ asset($asset) }}/news-details.html" class="theme-btn-2">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
                    <div class="news-card-items">
                        <div class="news-image">
                            <img src="{{ asset($asset) }}/img/12.jpg" alt="img">
                            <img src="{{ asset($asset) }}/img/12.jpg" alt="img">

                        </div>
                        <div class="news-content">
                            <h3><a href="{{ asset($asset) }}/news-details.html">Demo Book Name</a></h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis iusto reprehenderit, nam consequuntur animi rerum voluptatibus quod non. Suscipit distinctio autem unde rem obcaecati illo voluptatem nemo dolorem nostrum et.</p>
                            <a href="{{ asset($asset) }}/news-details.html" class="theme-btn-2">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection


@push('extra-js')

@endpush
