@extends('templates.qwerdybookscom.layouts.app')





@section('content')


<div id="smooth-wrapper">
    <div id="smooth-content">
      
      <main>
        <section>
            <div class="banner px-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="banner-bg-color">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="left-item">
                                            <div class="tab-box">
                                                <nav>
                                                    <div class="nav nav-tabs mb-5" id="nav-tab" role="tablist">
                                                        <button class="nav-link active" id="nav-welcome-tab"
                                                            data-bs-toggle="tab" data-bs-target="#profile" type="button"
                                                            role="tab" aria-controls="welcome"
                                                            aria-selected="true"><span>@lang('Profile')</span></button>
                                                        <button class="nav-link" id="nav-faq-tab" data-bs-toggle="tab"
                                                            data-bs-target="#my-order" type="button" role="tab"
                                                            aria-controls="nav-faq" aria-selected="false">
                                                            <span>@lang('Order')</span></button>
                                                        <button class="nav-link" id="nav-contact-tab"
                                                            data-bs-toggle="tab" data-bs-target="#cancelation"
                                                            type="button" role="tab" aria-controls="nav-contact"
                                                            aria-selected="false">
                                                            <span>@lang('Cancel')</span></button>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">

                                                    <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                                        aria-labelledby="nav-welcome-tab">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mem-hdd mb-5">
                                                                    <h1>@lang('User Profile')</h1>
                                                                </div>
                                                                <div class="prf-info mb-5">
                                                                    {{-- <img src="{{ asset ('qwerdybookscom/') }}/assets/imgs/user.png" alt="Fitsebook"> --}}
                                                                    <h4>{{ $user->data->first_name }} {{ $user->data->last_name }}</h4>
                                                                    {{-- <span><i class="fa-solid fa-pen"></i></span> --}}
                                                                    {{-- <div class="str-ico d-flex">
                                                                        <p><i class="fa-solid fa-star"></i> 4.8</p>
                                                                        <p><i class="fa-solid fa-camera"></i> 0</p>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <form action="{{ route( 'update-profile' )}}" method="post" >
                                                                    {{ csrf_field() }}                                                                       <div class="contact-info mb-5">
                                                                        <div class="contact-text mb-5 mb-lg-0 text-white">
                                                                            <h6>@lang('Basic info')</h6>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div
                                                                                    class="first-name common">
                                                                                    
                                                                                    <input type="text" name="first_name"
                                                                                        
                                                                                        id="fn" value="{{ $user->data->first_name }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div
                                                                                    class="last-name common">
                                                                                    <input type="text" name="last_name"
                                                                                        
                                                                                        id="ln" value="{{ $user->data->last_name }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="phone common">
                                                                                    <input type="text" name="phone"
                                                                                        
                                                                                        id="fon" value="{{ $user->data->phone }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="address-area mb-4">
                                                                        <div class="contact-text mb-5 mb-lg-0 text-white">
                                                                            <h6>@lang('Address')</h6>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="address common">
                                                                                    <input type="text" name="address"
                                                                                       
                                                                                        id="add" value="{{ $user->data->address }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="city common">
                                                                                    <input type="text"
                                                                                       
                                                                                        id="ci" value="{{ $user->data->city }}" name="city">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div
                                                                                    class="postcode common">
                                                                                    <input type="text" name="postcode"
                                                                                       
                                                                                        id="pin" value="{{ $user->data->postcode }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6 mb-5 mb-sm-0">
                                                                            <div class="btn_wrapper">
                                                                              <a href="{{ route('changePassword') }}" class="wc-btn-pink btn-hover btn-item"><span></span>@lang('Change') <br>@lang('Password')
                                                                                <i class="fa-solid fa-arrow-right"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="btn_wrapper">
                                                                                <button class="wc-btn-pink btn-hover btn-item"><span></span>@lang('Edit') <br>@lang('Profile') <i
                                                                                  class="fa-solid fa-arrow-right"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="my-order" role="tabpanel"
                                                        aria-labelledby="nav-faq-tab">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="mem-hdd mb-5">
                                                                    <h1>@lang('My Order')</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="member-table overflow-auto">
                                                                    <table class="table w-100 text-center">
                                                                        <tbody>
                                                                            <tr class="border-bm">
                                                                                <td class="llh">@lang('Order Id')</td>
                                                                                <td>@lang('Product')</td>
                                                                                <td>@lang('Type')</td>
                                                                                <td>@lang('Total')</td>
                                                                                <td>@lang('Status')</td>
                                                                                <td>@lang('Created at')</td>
                                                                                <td></td>
                                                                            </tr>
                                                                            @foreach($orders->data as $order)
                                                                                <tr class="border-bm">
                                                                                    <td>{{$order->id}}</td>
                                                                                    <td>{{ config('qwerdybookscom.CONCEPT_NAME') }}</td>
                                                                                    <td>{{$order->type}}</td>
                                                                                    <td>{{$order->total}} {{$order->currency}}</td>
                                                                                    <td>{{$order->status}}</td>
                                                                                    <td>{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i:s')}}</td>
                                                                                    <td><a href="{{\Illuminate\Support\Facades\URL::to('/get-order/'.$order->id)}}">@lang('Get Invoice')</a></td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="tab-pane fade" id="cancelation" role="tabpanel"
                                                        aria-labelledby="nav-contact-tab">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="mem-hdd cancl-hdd mb-5">
                                                                    <h1>@lang('Cancelation')</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-5">
                                                            <div class="col-lg-4">
                                                                <div class="s-number-hdd text-white">
                                                                    <p>@lang('Subscription number'):</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="s-number mb-3">
                                                                    <p>{{$subscription->data->id}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4"></div>
                                                            <div class="col-lg-8">
                                                                <form>
                                                                    <div class="contact-text mb-5 mb-lg-0 text-white">
                                                                        <h6>@lang('Membership info')</h6>
                                                                    </div>
                                                                    <div class="cancel-form our-form">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="name common">
                                                                                    <label for="nn">@lang('Name')</label>
                                                                                    <input type="text"
                                                                                        placeholder="Premium Membership"
                                                                                        id="nn" value="{{$subscription->data->name}}" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="type common">
                                                                                    <label for="tp">@lang('Type')</label>
                                                                                    <input type="text"
                                                                                        placeholder="trial" id="tp" value="{{$subscription->data->type}}" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="status common">
                                                                                    <label for="sts">@lang('Status')</label>
                                                                                    <input type="text"
                                                                                        placeholder="active" id="sts" value="{{$subscription->data->status}}" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="price common">
                                                                                    <label for="pr">@lang('Price')</label>
                                                                                    <input type="text"
                                                                                        placeholder="65.00" id="pr" value="{{$subscription->data->price}}" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="interval common">
                                                                                    <label for="int">@lang('Interval')</label>
                                                                                    <input type="text" placeholder="30"
                                                                                        id="int" value="{{$subscription->data->interval}}" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-6 mb-5 mb-sm-0">
                                                                                <div class="btn_wrapper">
                                                                                  <a href="{{ route('cancelSubscription') }}" class="wc-btn-pink btn-hover btn-item"><span></span> @lang('Cancel') <br>@lang('Subscription')
                                                                                    <i class="fa-solid fa-arrow-right"></i></a>
                                                                                </div>
                                                                            </div>
                                                                       
                                                                        </div>
                                                                    </div>
                                                                </form>
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
        </section>
    </main>

@endsection





