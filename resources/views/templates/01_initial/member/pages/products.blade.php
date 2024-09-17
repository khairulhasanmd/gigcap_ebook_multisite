@extends('member.layouts.main')

@section('styles-files')@endsection

@section('content')

        <!-- @if($subscription->data->status != "active")
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="box-menu py-3">
                                <ul class="slick-carousal">
                                    <li class="mixitup-control-active"><a href="{{ route('products')}}" style="color:black">All</a></li>
                                    @foreach($productTags as $productTag)
                                        <li><a href="{{ route('products', ['tag' => $productTag->tag->name])}}" style="color:black">{{$productTag->tag->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row box-list">
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
                    
                  
                </div>
            </div>
        @endif -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height rounded">
                        <div class="newrealease-contens">
                           <ul id="newrealease-slider" class="list-inline p-0 m-0 d-flex align-items-center">
                              <li class="item">
                                 <a href="{{ route('book.detail') }}">
                                    <img src="{{ asset('membership/images/new_realeases/01.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                 </a>
                              </li>
                              <li class="item">
                                 <a href="{{ route('book.detail') }}">
                                    <img src="{{ asset('membership/images/new_realeases/02.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                 </a>
                              </li>
                              <li class="item">
                                 <a href="{{ route('book.detail') }}">
                                    <img src="{{ asset('membership/images/new_realeases/03.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                 </a>
                              </li>
                              <li class="item">
                                 <a href="{{ route('book.detail') }}">
                                    <img src="{{ asset('membership/images/new_realeases/04.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                 </a>
                              </li>
                              <li class="item">
                                 <a href="{{ route('book.detail') }}">
                                    <img src="{{ asset('membership/images/new_realeases/05.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                 </a>
                              </li>
                              <li class="item">
                                 <a href="{{ route('book.detail') }}">
                                    <img src="{{ asset('membership/images/new_realeases/06.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                 </a>
                              </li>
                              <li class="item">
                                 <a href="{{ route('book.detail') }}">
                                    <img src="{{ asset('membership/images/new_realeases/07.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                 </a>
                              </li>
                              <li class="item">
                                 <a href="{{ route('book.detail') }}">
                                    <img src="{{ asset('membership/images/new_realeases/08.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                 </a>
                              </li>
                              <li class="item">
                                 <a href="{{ route('book.detail') }}">
                                    <img src="{{ asset('membership/images/new_realeases/09.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                 </a>                              
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                           <div class="iq-header-title">
                              <h4 class="card-title mb-0">Browse Books</h4>
                           </div>

                        </div> 
                        <div class="iq-card-body">  
                           <div class="row">
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('membership/images/browse-books/01.jpg') }}" alt=""></a>
                                             <div class="view-book">
                                                <a href="{{ route('book.detail') }}" class="btn btn-sm btn-white">View Book</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1">Reading on the World</h6>
                                                <p class="font-size-13 line-height mb-1">Jhone Steben</p>
                                                <div class="d-block line-height">
                                                   <span class="font-size-11 text-warning">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </span>                                             
                                                </div>
                                             </div>                                   
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('membership/images/browse-books/02.jpg') }}" alt=""></a>
                                             <div class="view-book">
                                                <a href="{{ route('book.detail') }}" class="btn btn-sm btn-white">View Book</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1">The Catcher in the Rye</h6>
                                                <p class="font-size-13 line-height mb-1">Fritz Wold</p>
                                                <div class="d-block line-height">
                                                   <span class="font-size-11 text-warning">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </span>                                             
                                                </div>
                                             </div>                     
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('membership/images/browse-books/03.jpg') }}" alt=""></a>
                                             <div class="view-book">
                                                <a href="{{ route('book.detail') }}" class="btn btn-sm btn-white">View Book</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1">Little Black Book</h6>
                                                <p class="font-size-13 line-height mb-1">John Klok</p>
                                                <div class="d-block line-height">
                                                   <span class="font-size-11 text-warning">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </span>                                             
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('membership/images/browse-books/04.jpg') }}" alt=""></a>
                                             <div class="view-book">
                                                <a href="{{ route('book.detail') }}" class="btn btn-sm btn-white">View Book</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1">Take On The Risk</h6>
                                                <p class="font-size-13 line-height mb-1">George Strong</p>
                                                <div class="d-block line-height">
                                                   <span class="font-size-11 text-warning">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </span>                                             
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('membership/images/browse-books/05.jpg') }}" alt=""></a>
                                             <div class="view-book">
                                                <a href="{{ route('book.detail') }}" class="btn btn-sm btn-white">View Book</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1">Absteact On Background</h6>
                                                <p class="font-size-13 line-height mb-1">Ichae Semos</p>
                                                <div class="d-block line-height">
                                                   <span class="font-size-11 text-warning">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </span>                                             
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('membership/images/browse-books/06.jpg') }}" alt=""></a>
                                             <div class="view-book">
                                                <a href="{{ route('book.detail') }}" class="btn btn-sm btn-white">View Book</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1">Find The Wave Book</h6>
                                                <p class="font-size-13 line-height mb-1">Fidel Martin</p>
                                                <div class="d-block line-height">
                                                   <span class="font-size-11 text-warning">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </span>                                             
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('membership/images/browse-books/07.jpg') }}" alt=""></a>
                                             <div class="view-book">
                                                <a href="{{ route('book.detail') }}" class="btn btn-sm btn-white">View Book</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1">See the More Story</h6>
                                                <p class="font-size-13 line-height mb-1">Jules Boutin</p>
                                                <div class="d-block line-height">
                                                   <span class="font-size-11 text-warning">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </span>                                             
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('membership/images/browse-books/08.jpg') }}" alt=""></a>
                                             <div class="view-book">
                                                <a href="{{ route('book.detail') }}" class="btn btn-sm btn-white">View Book</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1">The Wikde Book</h6>
                                                <p class="font-size-13 line-height mb-1">Kusti Franti</p>
                                                <div class="d-block line-height">
                                                   <span class="font-size-11 text-warning">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </span>                                             
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent mb-lg-0">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('membership/images/browse-books/09.jpg') }}" alt=""></a>
                                             <div class="view-book">
                                                <a href="{{ route('book.detail') }}" class="btn btn-sm btn-white">View Book</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1">Conversion Erik Routley</h6>
                                                <p class="font-size-13 line-height mb-1">Argele Intili</p>
                                                <div class="d-block line-height">
                                                   <span class="font-size-11 text-warning">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </span>                                             
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent mb-md-0 mb-lg-0">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('membership/images/browse-books/10.jpg') }}" alt=""></a>
                                             <div class="view-book">
                                                <a href="{{ route('book.detail') }}" class="btn btn-sm btn-white">View Book</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1">The Leo Dominica</h6>
                                                <p class="font-size-13 line-height mb-1">Henry Jurk</p>
                                                <div class="d-block line-height">
                                                   <span class="font-size-11 text-warning">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </span>                                             
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent mb-sm-0 mb-md-0 mb-lg-0">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('membership/images/browse-books/11.jpg') }}" alt=""></a>
                                             <div class="view-book">
                                                <a href="{{ route('book.detail') }}" class="btn btn-sm btn-white">View Book</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1">By The Editbeth Jat</h6>
                                                <p class="font-size-13 line-height mb-1">David King</p>
                                                <div class="d-block line-height">
                                                   <span class="font-size-11 text-warning">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </span>                                             
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent mb-0 mb-sm-0 mb-md-0 mb-lg-0">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ asset('membership/images/browse-books/12.jpg') }}" alt=""></a>
                                             <div class="view-book">
                                                <a href="{{ route('book.detail') }}" class="btn btn-sm btn-white">View Book</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1">The Crucial Decade</h6>
                                                <p class="font-size-13 line-height mb-1">Attilio Marzi</p>
                                                <div class="d-block line-height">
                                                   <span class="font-size-11 text-warning">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </span>                                             
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
@endsection

@section('script-files')

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>
    var ENDPOINT = "{{ url('/') }}";
    var TAG = "{{ app('request')->input('tag') }}";
    var page = 1;
    infinteLoadMore(page);


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

