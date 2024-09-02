@extends('welcome.main')

@section('styles-files')
    <link rel="stylesheet" href="{{ asset ('theme/welcome/css/main.css') }}">
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

<section>
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
</section>
@endsection
