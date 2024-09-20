@extends('templates.booksee365com.welcome.main')


@section('styles-files')

    <link href="{{ asset ('booksee365com/theme_backup/css/subscription/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('booksee365com/theme_backup/css/customer-product/style.css') }}" rel="stylesheet"> 
    {{-- <link href="{{ asset ('booksee365com/theme_backup/common/default.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')
<style>
    .member {
  background-color: #fff;
  padding-left: 0px;
  padding-right: 24px;
  padding-top: 20px;
  padding-bottom: 80px;
}
.common label{
color: #8f8989;
}
.common input{
    color: #8f8989;
    border: 1px solid rgba(77, 50, 50, 0.4);
}
.s-number p{
    color: #8f8989;
}
.member-table td{
    color: #8f8989;
}
</style>

<section>
    <div class="member pb-5 pt-5">
        <div class="container background">
            <div class="row">
                <div class="col-12">
                    <div class="customer py-4">
                        <div class="member-name mb-4">
                            <h2>Hi, {{ $user->data->first_name }}</h2>
                        </div>
                        <div class="profile-btn mb-4">
                            <a id="profile-button"> My Profile</a>
                            <a id="order-button"> My Order</a>
                        </div>
                    </div>

                    <div class="subscription-from mx-auto" id="profile-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="edit-form our-form pb-3 mb-4 mb-lg-0">
                                    <form action="{{ route( 'update-profile' )}}" method="post" id="edit-form">
                                    {{ csrf_field() }}
                                        <div class="first-name common">
                                            <label for="fn">First Name</label>
                                            <input type="text" placeholder="@lang('First Name')" id="fn" name="first_name" value="{{ $user->data->first_name }}" required>
                                        </div>
                                        <div class="last-name common">
                                            <label for="ln">Last Name</label>
                                            <input type="text" placeholder="@lang('Last Name')" id="ln" name="last_name" value="{{ $user->data->last_name }}" required>
                                        </div>
                                        <div class="address common">
                                            <label for="add">Address</label>
                                            <input type="text" placeholder="@lang('Address')" id="add"  name="address" value="{{ $user->data->address }}" required>
                                        </div>
                                        <div class="city common">
                                            <label for="ci">City</label>
                                            <input type="text" placeholder="@lang('City')" id="ci"  name="city" value="{{ $user->data->city }}" required>
                                        </div>
                                        <div class="postcode common">
                                            <label for="pin">Postcode</label>
                                            <input type="text" placeholder="@lang('Postcode')" id="pin" name="postcode" value="{{ $user->data->postcode }}" required>
                                        </div>
                                        <div class="phone common">
                                            <label for="fon">Phone Number</label>
                                            <input type="text" placeholder="@lang('Phone number')" id="fon" name="phone" value="{{ $user->data->phone }}" required>
                                        </div>
                                        <div class="s-submit">
                                            <a href="{{ route('changePassword') }}"> Change password </a>
                                            <button type="submit">Edit profile</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cancel-form our-form py-5">
                                    <div class="s-number mb-2">
                                        <p>Subscription number:</p>
                                        <p>{{$subscription->data->id}}</p>
                                    </div>
                                    <div class="name common">
                                        <label for="nn">Name</label>
                                        <input type="text" placeholder="@lang('Name')" value="{{$subscription->data->name}}" id="nn" disabled>
                                    </div>
                                    <div class="type common">
                                        <label for="tp">Type</label>
                                        <input type="text" placeholder="@lang('Subscriber')" value="{{$subscription->data->type}}" id="tp" disabled>
                                    </div>
                                    <div class="status common">
                                        <label for="sts">Status</label>
                                        <input type="text" placeholder="@lang('Active')" value="{{$subscription->data->status}}" id="sts" disabled>
                                    </div>
                                    <div class="price common">
                                        <label for="pr">Price</label>
                                        <input type="text" placeholder="@lang('Price')" value="{{$subscription->data->price}}" id="pr"> disabled
                                    </div>
                                    <div class="interval common">
                                        <label for="int">Interval</label>
                                        <input type="text" placeholder="@lang('Monthly')" value="{{$subscription->data->interval}}" id="int" class="cnsb-spc" disabled>
                                    </div>
                                    <div class="c-submit">
                                        <a href="{{ route('cancelMembership') }}">Cancel subscription</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="member-table overflow-auto" id="order-tab" style="display:none;">
                        <table class="table text-center p-5">
                            <tbody>
                                <tr>
                                    <td class="llh"> Order Id</td>
                                    <td> Product</td>
                                    <td> Type</td>
                                    <td> Total</td>
                                    <td> Status</td>
                                    <td> Created at</td>
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






