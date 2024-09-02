@extends('welcome.main')

@section('styles-files')
 	<link href="{{ asset ('theme/css/subscription/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('theme/css/customer-product/style.css') }}" rel="stylesheet"> 
@endsection

@section('content')

<section>
    <div class="member pb-5" style="background-color:white;">
        <div class="container-mask">
            <div class="row">
                <div class="col-12">
                    <!-- <div class="top-img">
                        <img src="{{ asset('theme/images/h-top.png') }}" alt="top-img">
                    </div> -->
                    <div class="customer py-4">
                        <div class="member-name mb-4">
                            <h2>@lang('Hi'), {{ $user->data->first_name }}</h2>
                        </div>
                        <div class="profile-btn pointer mb-4">
                            <a id="profile-button" > My Profile</a>
                            <a id="order-button" > My Order</a>
                        </div>
                    </div>
                    <div class="subscription-from mx-auto" id="profile-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="edit-form our-form pb-3 mb-4 mb-lg-0">
                                    <form action="{{ route( 'update-profile' )}}" method="post" id="edit-form">
                                    {{ csrf_field() }}
                                        <div class="first-name common text">
                                            <label for="fn">First Name</label>
                                            <input type="text" placeholder="@lang('First Name')" id="name" name="first_name" value="{{ $user->data->first_name }}" required>
                                        </div>
                                        <div class="last-name common text">
                                            <label for="ln">Last Name</label>
                                            <input type="text" placeholder="@lang('Last Name')" id="lastName" name="last_name" value="{{ $user->data->last_name }}" required>
                                        </div>
                                        <div class="address common text">
                                            <label for="add">Address</label>
                                            <input type="text" placeholder="@lang('Address')" id="address" name="address" value="{{ $user->data->address }}" required>
                                        </div>
                                        <div class="city common text">
                                            <label for="ci">City</label>
                                            <input type="text" placeholder="@lang('City')" id="city" name="city" value="{{ $user->data->city }}" required>
                                        </div>
                                        <div class="postcode common text">
                                            <label for="pin">Postcode</label>
                                            <input type="text" placeholder="@lang('Postcode')" id="postcode" name="postcode" value="{{ $user->data->postcode }}" required>
                                        </div>
                                        <div class="phone common text">
                                            <label for="fon">Phone Number</label>
                                            <input type="text" placeholder="@lang('Phone number')" id="phoneNumber" name="phone" value="{{ $user->data->phone }}" required>
                                        </div>
                                        <div class="s-submit">
                                            <a href="{{ route('changePassword') }}">Change Password</a>
                                            <button type="submit" style="padding:7px;">Edit Profile</button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="cancel-form our-form py-5">
                                    <div class="s-number mb-2">
                                        <p>Subscription number:</p>
                                        <p>SUB1F5T5V16016VWZOL8VHYKUTO1JG3SZ</p>
                                    </div>

                                    <div class="name common text">
                                        <label for="nn">Name</label>
                                        <input type="text" placeholder="@lang('Name')" value="{{$subscription->data->name}}" id="nn">
                                    </div>
                                    <div class="type common text">
                                        <label for="tp">Type</label>
                                        <input type="text" placeholder="@lang('Subscriber')"
                                            value="{{$subscription->data->type}}" id="tp">
                                    </div>
                                    <div class="status common text">
                                        <label for="sts">Status</label>
                                        <input type="text" placeholder="@lang('Active')"
                                            value="{{$subscription->data->status}}" id="sts">
                                    </div>
                                    <div class="price common text">
                                        <label for="pr">Price</label>
                                        <input type="text" placeholder="@lang('Price')"
                                            value="{{$subscription->data->price}}" id="pr">
                                    </div>
                                    <div class="interval common text">
                                        <label for="int">Interval</label>
                                        <input type="text" placeholder="@lang('Monthly')"
                                            value="{{$subscription->data->interval}}" id="int" class="cnsb-spc">
                                    </div>
                                    <div class="s-submit">
                                        <a href="{{ route('cancelMembership') }}">Cancel subscription</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="member-table overflow-auto" id="order-tab" style="display:none;">
                        <table class="table w-100 text-center bg-light p-5">
                            <tbody>
                                <tr>
                                    <td class="llh text"><b> Order Id</b></td>
                                    <td><b> Product</b></td>
                                    <td><b> Type</b></td>
                                    <td><b> Total</b></td>
                                    <td><b> Status</b></td>
                                    <td><b> Created at</b></td>
                                    <td> </td>
                                </tr>

                                @foreach($orders->data as $order)
                                <tr class="border-bm">
                                    <td> {{$order->id}}</td>
                                    <td> {{ config('api.CONCEPT_NAME') }}</td>
                                    <td> {{$order->type}}</td>
                                    <td> {{$order->total}} {{$order->currency}}</td>
                                    <td> {{$order->status}}</td>
                                    <td> {{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i:s')}}</td>
                                    <td> <a href="{{\Illuminate\Support\Facades\URL::to('/get-order/'.$order->id)}}"> Get Invoice</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#profile-button').click(function(){
            $('#profile-tab').show();
            $('#order-tab').hide();
        });

        $('#order-button').click(function(){
            $('#profile-tab').hide();
            $('#order-tab').show();
        });
    });
</script>






