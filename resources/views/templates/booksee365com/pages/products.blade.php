@extends('templates.booksee365com.welcome.main')


@section('styles-files')
 	<link href="{{ asset ('booksee365com/theme_backup/courses/css/main.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset ('booksee365com/theme_backup/common/default.css') }}" rel="stylesheet"> --}}
 @endsection
<style>
    h4{
        color: #b1b1b1 !important;
    }
    .work-box {
  padding-left: 0px !important;
  margin-left: auto;
  margin-right: auto;
  text-align: center;
}
</style>

@section('content')
@section('content')

<section class="about-us-section section-padding">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-12 about_left_content pr-lg-0 pl-lg-5">
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
                <div class="work-box">
                  
                            <div class="col-12">
                                <div class="box-menu ">
                                    <ul class="slick-carousal">
                                        <li class="mixitup-control-active"><a href="{{ route('products')}}" style="color:#b1b1b1">All</a></li>
                                        @foreach($productTags as $productTag)
                                            <li><a href="{{ route('products', ['tag' => $productTag->tag->name])}}" style="color:#b1b1b1">{{$productTag->tag->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row box-list">
                            <!-- Products -->
                        </div>
    
                        <div class="row">
                            <div class="col-12">
                                <div class="more-btn text-center mt-4 mb-5">
                                    <button id="load-more" data-paginate="2">Load More</button>
                                    <button id="load-more-loading" type="button" disabled style="display:none">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Loading...
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
			</div>
		</div>
	</div>
</section>




    <!-- <section class="hero hero__ifreme"></section> -->

  
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

