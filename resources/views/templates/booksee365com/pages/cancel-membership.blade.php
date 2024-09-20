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
  padding-left: 24px;
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
.member-name h2 {
  font-size: 40px;
  color: black;
  margin-top: 100px;
}
</style>

<section>
    <div class="member pb-5 mt-5">
        <div class="container background">
            <div class="row">
                <div class="col-12">
                    <div class="customer py-4">
                        <div class="member-name mb-4">
                            <h2>Cancel Membership</h2>
                        </div>
                        <div>
                            <p>We are sad you decided to leave our platform. If you are certain you want to proceed, then click the “Cancel membership" button. <br> Farewell and good luck! We hope you return soon!</p>
                        </div>
                    </div>
                    <div class="subscription-from mx-auto">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="edit-form membership pb-3 mb-4 mb-lg-0">
                                    <form>
                                        <div class="first-name common">
                                            <label for="fn">Name</label>
                                            <input type="text" placeholder="John" id="fn" placeholder="@lang('Name')"
                                            value="{{$subscription->data->name}}" disabled>
                                        </div>
                                        <div class="last-name common">
                                            <label for="type">Type</label>
                                            <input type="text" id="type" placeholder="@lang('Subscriber')"
                                            value="{{$subscription->data->type}}" disabled>
                                        </div>
                                        <div class="address common">
                                            <label for="status">Status</label>
                                            <input type="text" placeholder="Bakerstreet 283254" id="status" placeholder="@lang('Active')"
                                            value="{{$subscription->data->status}}" disabled>
                                        </div>
                                        <div class="city common">
                                            <label for="price">Price</label>
                                            <input type="text" id="price" placeholder="@lang('Price')"
                                            value="{{$subscription->data->price}}" disabled>
                                        </div>
                                        <div class="postcode common">
                                            <label for="interval">Interval</label>
                                            <input type="text" id="interval" placeholder="@lang('Monthly')"
                                            value="{{$subscription->data->interval}}" disabled>
                                        </div>
                                        <div class="s-submit">
                                            <a href="{{ route('cancelSubscription') }}">Cancel Membership</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cancel-form membership py-5">
                                    <img src="https://files.fieryx.com/gamebuilder/cancel-subscription.png" alt="inner">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
