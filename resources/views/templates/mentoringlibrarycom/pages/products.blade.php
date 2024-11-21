@extends('templates.mentoringlibrarycom.welcome.main')


@section('styles-files')
 	{{-- <link href="{{ asset ('booksee365com/theme_backup/courses/css/main.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset ('booksee365com/theme_backup/common/default.css') }}" rel="stylesheet"> --}}
 @endsection
 <style>
    .download-button{
        /* display: block !important; */
    }
    .mix-img img {
        width: 100%;
        height: 250px;
        object-fit: contain;
        }
        h4{
            font-size: 18px !important;
        }
        #load-more{
            background: #012e4a;
            padding: 6px 16px;
            color: #fff;

        }
        #load-more:hover{
            color: #fff;
            background: #036280;


        }

 .fa-download::before {
  padding-right: 10px;
}
 </style>

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
                    <h1>@lang('Library')</h1>
                    <div class="page-header">
                        <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <li>
                                <a href="@guest {{ route('welcome')}} @else {{route('products')}} @endguest">
                                    @lang('Home')
                                </a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                            </li>
                            <li>
                                @lang('Library')
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcrumb area -->



        <section class="library-page py-5 my-5">
            <div class="container">
                <div class="row">
                    <div class="tab-product-navigation">

                        <div class="nav nav-tabs justify-content-center"  role="tablist">
                            <a class="nav-item nav-link"  href="{{ route('products')}}">@lang('All')</a>

                            @foreach($productTags as $productTag)
                            <a class="nav-item nav-link"  href="{{ route('products', ['tag' => $productTag->tag->name])}}">{{__('' . $productTag->tag->name)}}</a>

                            @endforeach
                          
                        </div>
                        <div>
                    
                        </div>

                    </div>
                </div>
            </div>
        </section>





@section('content')
    <!-- <section class="hero hero__ifreme"></section> -->

        @if($subscription->data->status != "active")
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="hero-content">
                            <h3 class="hero-subtitle mb-5">@lang('Dear') {{ $user->data->first_name}} {{ $user->data->last_name}}</h3>
                            <h1 class="hero-title">@lang('Your subscription has expired.')</h1>
                        </div>
                    </div>
                    <div class="offset-md-7"></div>
                </div>
            </div>
        @else 
            <div class="work-box">
                <div class="container">
               
                    <div class="row box-list">
                        <!-- Products -->
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="more-btn text-center mt-4 mb-5">
                                <button id="load-more" data-paginate="2">@lang('Load More')</button>
                                <button id="load-more-loading" type="button" disabled style="display:none">
                                    <span  class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    @lang('Loading...')
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="auto-load text-center">
                        <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div> -->
                </div>
            </div>
        @endif
@endsection

@section('script-files')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var ENDPOINT = "{{ url('/') }}";
    var TAG = "{{ app('request')->input('tag') }}";
    var page = 1;
    infinteLoadMore(page);

    // $(window).scroll(function () {
    //     if ($(window).scrollTop() + $(window).height() + 10 >= $(document).height()) {
    //         page++;
    //         infinteLoadMore(page);
    //     }
    // });
    $('#load-more').click(function() {
        var page = $(this).data('paginate');
        infinteLoadMore(page);
        $(this).data('paginate', page+1);
    });
    
    function infinteLoadMore(page) {
        $('#load-more').hide();
        $('#load-more-loading').show();
        $.ajax({
                url: ENDPOINT + "/products?page=" + page + "&tag=" + TAG,
                datatype: "html",
                type: "get",
                // beforeSend: function () {
                //     $('.auto-load').show();
                // }
            })
            .done(function (response) {
                if (response.length == 0) {
                    $('.more-btn').html("We don't have more data to display :(");
                    return;
                }
                // $('.auto-load').hide();
                $(".box-list").append(response);
                $('#load-more').show();
                $('#load-more-loading').hide();
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
</script>



@endsection

