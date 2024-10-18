{{-- @extends('templates.qwerdybookscom.welcome.main') --}}
@extends('templates.qwerdybookscom.layouts.app2')



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
.btn_wrappers, #btn_wrapper {

  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  position: relative;

  text-align: center;
}
h4{
    color: #fff !important;
    margin-top: 5px !important;
}
.download-button{
    display: block !important;
}
.preview{
    display: none !important;
}
 </style>



<div id="smooth-wrapper">
    <div id="smooth-content">
        <main>







        <!-- Start breadcrumb area -->
    
        <!-- End breadcrumb area -->



        <section class="library-page py-5 my-5">
            <div class="container">
                <div class="row">
                    <div class="tab-product-navigation">

                        <div class="nav nav-tabs justify-content-center"  role="tablist">
                            <a class="nav-item nav-link"  href="{{ route('products')}}">@lang('trans_qwerdybookscom.All')</a>

                            @foreach($productTags as $productTag)
                            <a class="nav-item nav-link"  href="{{ route('products', ['tag' => $productTag->tag->name])}}">{{ __('trans_qwerdybookscom.'.$productTag->tag->name) }}</a>

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
                            <h3 class="hero-subtitle mb-5">@lang('trans_qwerdybookscom.Dear') {{ $user->data->first_name}} {{ $user->data->last_name}}</h3>
                            <h1 class="hero-title">@lang('trans_qwerdybookscom.Your subscription has expired.')</h1>
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
                                {{-- <div class="row g-3">
                                    <div class="col-12">
                                      <div class="btn_wrapper">
                                        <button class="wc-btn-primary btn-hover btn-item" id="load-more" data-paginate="2"> <span></span> load more <i
                                            class="fa-solid fa-arrow-right"></i></button>
                                      </div>
                                    </div>
                                  </div> --}}
                                <button class="btn_wrappers" id="load-more" data-paginate="2">Load More</button>
                                <button  id="load-more-loading" type="button" disabled style="display:none">
                                    <span  class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    @lang('trans_qwerdybookscom.Loading...')
                                </button>
                            </div>
                        </div>
                    </div>
                    
                     {{-- <div class="auto-load text-center">
                        <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>  --}}
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

