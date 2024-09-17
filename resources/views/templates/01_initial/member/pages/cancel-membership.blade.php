@extends('member.layouts.main')

@section('styles-files')
@endsection

@section('content')


<!-- <section>
    <div class="hero pb-5">
        <div class="container-mask">
            <div class="row">
                <div class="col-12">
                    <div class="top-img">
                        <img src="{{ asset('theme/images/h-top.png') }}" alt="top-img">
                        <h1>Cancel Membership</h1>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="l-content px-xl-5 ps-md-5 text-center text-md-start mb-5 mb-md-0">
                                <div class="hero-content mb-3 mb-lg-4">
                                    
                                    <p>We are sad you decided to leave our platform. If you are certain you want to proceed, then click the “Cancel membership" button. <br> Farewell and good luck! We hope you return soon!</p>
                                    <form>
                                        <div class="mb-3">
                                            <label for="subName">@lang('Name')</label>
                                            <input type="text" class="form-control" id="subName" placeholder="@lang('Name')"
                                            value="{{$subscription->data->name}}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="type">@lang('Type')</label>
                                            <input type="text" class="form-control" id="type" placeholder="@lang('Subscriber')"
                                            value="{{$subscription->data->type}}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status">@lang('Status')</label>
                                            <input type="text" class="form-control"  id="status" placeholder="@lang('Active')"
                                            value="{{$subscription->data->status}}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price">@lang('Price')</label>
                                            <input type="text" class="form-control" id="price" placeholder="@lang('Price')"
                                            value="{{$subscription->data->price}}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="interval">@lang('Interval')</label>
                                            <input type="text" class="form-control" id="interval" placeholder="@lang('Monthly')"
                                            value="{{$subscription->data->interval}}" disabled>
                                        </div>
                                        <div class="submit-btn">
                                            <a href="{{ route('cancelSubscription') }}">Cancel Membership</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="r-img ps-md-5 mb-4">
                                <img src="https://files.fieryx.com/gamebuilder/cancel-subscription.png" alt="inner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- <section>
	<div class="hero">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="hero-left text-center text-lg-start">
						<div class="main-hd text-uppercase mb-4">
							<h2>Cancel Membership</h2>
						</div>
						<div class="hero-description text-capitalize mb-5 text-lg-start text-center">
							<p> We are sad you decided to leave our platform. If you are certain you want to proceed, then click the “Cancel membership" button. <br> Farewell and good luck! We hope you return soon!</p>
                            <form>
                                <div class="mb-3">
                                    <label for="subName">@lang('Name')</label>
                                    <input type="text" class="form-control" id="subName" placeholder="@lang('Name')"
                                    value="{{$subscription->data->name}}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="type">@lang('Type')</label>
                                    <input type="text" class="form-control" id="type" placeholder="@lang('Subscriber')"
                                    value="{{$subscription->data->type}}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="status">@lang('Status')</label>
                                    <input type="text" class="form-control"  id="status" placeholder="@lang('Active')"
                                    value="{{$subscription->data->status}}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="price">@lang('Price')</label>
                                    <input type="text" class="form-control" id="price" placeholder="@lang('Price')"
                                    value="{{$subscription->data->price}}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="interval">@lang('Interval')</label>
                                    <input type="text" class="form-control" id="interval" placeholder="@lang('Monthly')"
                                    value="{{$subscription->data->interval}}" disabled>
                                </div>
                                <div class="buy-btn default-btn">
                                    <a href="{{ route('cancelSubscription') }}" class="arro">Cancel Membership<span>&#x21c0;</span></a>
                                </div>
                            </form>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="hero-img text-center img-align">
                        <img src="https://files.fieryx.com/gamebuilder/cancel-subscription.png" alt="inner">
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- 
<section>
    <div class="member pb-5">
        <div class="container-fluid background">
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
</section> -->

<div id="content-page" class="content-page">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Cancel Membership</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <p>We are sad you decided to leave our platform. If you are certain you want to proceed, then click the “Cancel membership" button. <br> Farewell and good luck! We hope you return soon!</p>
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="fn">Name:</label>
                                <input type="text" id="fn" class="form-control" value="{{$subscription->data->name}}" placeholder="@lang('Name')" disabled>
                            </div>
                            <div class="form-group">
                                <label for="type">Type:</label>
                                <input type="text" id="type" class="form-control" value="{{$subscription->data->type}}" placeholder="@lang('Subscriber')" disabled>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <input type="text" id="status" class="form-control" value="{{$subscription->data->status}}" placeholder="@lang('Active')" disabled>
                            </div>
                            <div class="form-group">
                                <label for="status">Price:</label>
                                <input type="text" id="price" class="form-control" value="{{$subscription->data->price}}" placeholder="@lang('Price')" disabled>
                            </div>
                            <div class="form-group">
                                <label for="interval">Interval:</label>
                                <input type="text" id="interval" class="form-control" value="{{$subscription->data->interval}}" placeholder="@lang('Monthly')" disabled>
                            </div>
                            
                            <a href="{{ route('cancelSubscription') }}" class="btn btn-primary">Cancel Membership</a>
                        </form>
                    </div>
                </div>
            
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="iq-card text-center">
                    <!-- <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                        </div>
                    </div> -->
                    <div class="iq-card-body p-4" style="padding-top: 190px !important;padding-bottom: 190px !important;">
                        <img src="https://files.fieryx.com/gamebuilder/cancel-subscription.png" alt="inner">
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
