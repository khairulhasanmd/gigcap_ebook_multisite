@extends($template.'structure.main')

@push('extra-css')

@endpush

@section('content')


        <!-- Start breadcrumb area -->
        <div class="breadcrumb-wrapper">
            <div class="book1">
                <img src="{{ asset($asset) }}/img/book3.png" alt="book">
            </div>
            <div class="book2">
                <img src="{{ asset($asset) }}/img/book4.png" alt="book">
            </div>
            <div class="container">
                <div class="page-heading">
                    <h1>About Us</h1>
                    <div class="page-header">
                        <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <li>
                                <a href="index.html">
                                    Home
                                </a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                            </li>
                            <li>
                                About Us
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
                        <h1 class="section-title text-center">Get to Know Us</h1>
                        <h3 class="section-title text-center "><span>Connecting Through Books</span></h3>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="about_wrap">
                            <img src="{{ asset($asset) }}/img/about2.jpg" class="img-fluid about_img" alt="">
                            <div class="book-section-info">

                                <h1>Empowering Entrepreneurs and Businesses to Achieve Success</h1>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nisi enim vitae facilis dicta, corporis asperiores cum deserunt animi porro, minima, optio voluptate expedita delectus eligendi nihil ipsa repellat earum?</p>

                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente accusantium eius omnis veritatis, quasi nulla modi inventore ratione asperiores unde provident delectus, vel reiciendis tempora? Nostrum qui molestiae consectetur saepe.</p>
                                </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-12 my-auto">
                        <div class="about_wrap">
                            <div class="book-section-info">

                            <h1>Empowering Entrepreneurs and Businesses to Achieve Success</h1>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque nisi enim vitae facilis dicta, corporis asperiores cum deserunt animi porro, minima, optio voluptate expedita delectus eligendi nihil ipsa repellat earum?</p>

                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente accusantium eius omnis veritatis, quasi nulla modi inventore ratione asperiores unde provident delectus, vel reiciendis tempora? Nostrum qui molestiae consectetur saepe.</p>
                            </div>
                            <img src="{{ asset($asset) }}/img/about1.jpg" class="img-fluid about_img" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-us pb-5">
            <div class="container pb-5">
               <div class="row">
                <div class="col-lg-4">
                    <img src="{{ asset($asset) }}/img/about3.jpg" class="img-fluid about_img" alt="">
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12 col-12 text-center mb-5">
                            <h1 class="section-title text-center">Learn More About Us</h1>
                            <h3 class="section-title text-center "><span>Our Mission, Vision and History</span></h3>
                        </div>
                        <div class="row">

                                <div id="mission" class="col-lg-4">
                                    <div class="about_content">
                                        <h4 class="mt-3">Our Mission</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non ipsum cumque tempora magnam impedit consequuntur nobis veritatis, sequi adipisci inventore. Illo eaque tenetur ipsa corrupti ipsam aut totam sunt. Quidem.</p>
                                    </div>
                                </div>

                                <div id="vision" class="col-lg-4">
                                    <div class="about_content">
                                    <h4 class="mt-3">Our Vision</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos exercitationem, hic eligendi quam fugit maiores asperiores magni, unde nihil officiis eveniet nulla est? Sequi voluptatibus minima voluptatem aperiam. Similique, aliquid.</p>
                                    </div>

                                </div>
                                <div id="history" class="col-lg-4">
                                    <div class="about_content">
                                    <h4 class="mt-3">Our History</h4>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda omnis similique placeat labore tenetur, quidem mollitia quisquam natus reiciendis possimus, impedit perferendis adipisci vero sunt ex accusamus in laboriosam! Nobis!</p>
                                    </div>
                                </div>

                    </div>
                    </div>
                </div>
               </div>
            </div>
        </section>




@endsection


@push('extra-js')

@endpush
