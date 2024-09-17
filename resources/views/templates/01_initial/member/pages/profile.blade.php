@extends('member.layouts.main')

@section('styles-files')
 	
@endsection

@section('content')


<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Hi, {{ $user->data->first_name }}</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">My Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">My Order</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent-2">

                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="iq-card">
                                            
                                            <div class="iq-card-body">
                                                <form action="{{ route( 'update-profile' )}}" method="post" >
                                                {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="first_name">First Name:</label>
                                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->data->first_name }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name:</label>
                                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->data->last_name }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address:</label>
                                                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->data->address }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="city">City:</label>
                                                        <input type="text" class="form-control" id="city" name="city" value="{{ $user->data->city }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="postcode">Postcode:</label>
                                                        <input type="text" class="form-control" id="postcode" name="postcode" value="{{ $user->data->postcode }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Postcode:</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->data->phone }}" required>
                                                    </div>
                                                
                                                    <button type="submit" class="btn btn-primary">Edit profile</button>
                                                    <a href="{{ route('changePassword') }}" class="btn iq-bg-danger"> Change password </a>
                                                </form>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="iq-card">
                                            <div class="iq-card-body">
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <p>Subscription number: {{ auth()->user()->subscription_id }}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Name:</label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="@lang('Name')" value="{{$subscription->data->name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="type">Type:</label>
                                                    <input type="text" class="form-control" id="type" name="type" placeholder="@lang('Type')" value="{{$subscription->data->type}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status:</label>
                                                    <input type="text" class="form-control" id="status" name="status" placeholder="@lang('Active')" value="{{$subscription->data->status}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Price:</label>
                                                    <input type="text" class="form-control" id="price" name="price" placeholder="@lang('Price')" value="{{$subscription->data->price}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="int">Interval:</label>
                                                    <input type="text" class="form-control" id="int" name="int" placeholder="@lang('Interval')" value="{{$subscription->data->interval}}">
                                                </div>
                                                <div class="form-group">
                                                    <a href="{{ route('cancelMembership') }}" class="btn btn-primary">Cancel subscription</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="iq-card">
                                            <div class="iq-card-header d-flex justify-content-between">
                                                <div class="iq-header-title">
                                                    <h4 class="card-title">My Order</h4>
                                                </div>
                                            </div>
                                            <div class="iq-card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="llh"> Order Id</th>
                                                                <th scope="col"> Product</th>
                                                                <th scope="col"> Type</th>
                                                                <th scope="col"> Total</th>
                                                                <th scope="col"> Status</th>
                                                                <th scope="col"> Created at</th>
                                                                <th scope="col"> </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($orders->data as $order)
                                                            <tr class="border-bm">
                                                                <td> {{$order->id}}</td>
                                                                <td> {{ config('api.CONCEPT_NAME') }}</td>
                                                                <td> {{$order->type}}</td>
                                                                <td> {{$order->total}} {{$order->currency}}</td>
                                                                <td> {{$order->status}}</td>
                                                                <td> {{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i:s')}}</td>
                                                                <td> <a class="btn btn-primary" href="{{\Illuminate\Support\Facades\URL::to('/get-order/'.$order->id)}}"> Get Invoice</a></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
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






