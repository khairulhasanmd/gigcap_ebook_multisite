@extends('templates.mentoringlibrarycom.welcome.main')


@section('content')
   <!-- Start breadcrumb area -->
   <div class="breadcrumb-wrapper">
            
    <div class="container">
        <div class="page-heading">
            <h1>Profile</h1>
            <div class="page-header">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <li>
                        <a href="@guest {{ route('welcome')}} @else {{route('products')}} @endguest">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="bi bi-chevron-right"></i>
                    </li>
                    <li>
                        Profile
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End breadcrumb area -->




<section class="section p-5 mt-5">
    <div class="container mb-5">
        <div class="profile">
            <div class="row">
                <!-- Tab Navigation -->
                <div class="col-lg-12 mb-3">
                    <ul class=" tabs border-bottom-0 mb-3 " id="v-tabs" role="tablist">
                        <li class="tab-item active me-3" role="presentation">
                            <a class="tab-link active" id="myprofile-tab" data-bs-toggle="tab" href="#myprofile" role="tab" aria-controls="myprofile" aria-selected="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill me-2" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                                  </svg> My Profile
                            </a>
                        </li>
                        <li class="tab-item" role="presentation">
                            <a class="tab-link" id="myorder-tab" data-bs-toggle="tab" href="#myorder" role="tab" aria-controls="myorder" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop me-2" viewBox="0 0 16 16">
                                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
                                  </svg> My Orders
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Tab Content -->
                <div class="col-lg-12">
                    <div class="tab-content p-5" id="v-tabs-content">
                        <!-- My Profile Tab Content -->
                        <div class="tab-pane fade show active" id="myprofile" role="tabpanel" aria-labelledby="myprofile-tab">
                            <div class="profile-section">
                                <small class="sub-number"><b>Subscription number:</b> SUBLNUYUA6MZUHJARBRQHN5QWMWE</small>
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <form action="https://learncode.com/update-profile" method="post" id="edit-form">
                                            <input type="hidden" name="_token" value="pEmeSj9nesW8OxmtmsXPjq9grsqp7etBk1edBPRl">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">First name</label>
                                                <input type="text" class="form-control" id="name" name="first_name" placeholder="First Name" value="John" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="lastName" class="form-label">Last name</label>
                                                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" value="Doe" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="Bakerstreet 455064" required>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-8">
                                                    <label for="city" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="city" name="city" placeholder="City" value="London" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="postcode" class="form-label">Postcode</label>
                                                    <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" value="34567" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phoneNumber" class="form-label">Phone number</label>
                                                <input type="text" class="form-control" id="phoneNumber" name="phone" placeholder="Phone number" value="294715398" required>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <a href="{{ route('changePassword') }}" class="theme-btn mt-4">Change Password</a>
                                                <button class="theme-btn mx-3 mt-4" type="submit">Edit Profile</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form>
                                            <div class="mb-3">
                                                <label for="membershipName" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="membershipName" value="Gold Membership" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="membershipType" class="form-label">Type</label>
                                                <input type="text" class="form-control" id="membershipType" value="trial" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <input type="text" class="form-control" id="status" value="active" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="text" class="form-control" id="price" value="62.00 GBP" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="interval" class="form-label">Interval</label>
                                                <input type="text" class="form-control" id="interval" value="30 days" disabled>
                                            </div>
                                            <a href="/cancel-subscription" class="theme-btn bg-danger text-white mt-4 text-end">Cancel Subscription</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- My Orders Tab Content -->
                        <div class="tab-pane fade" id="myorder" role="tabpanel" aria-labelledby="myorder-tab">
                            <div class="table-responsive">
                               <div class="table_wrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Product</th>
                                            <th>Type</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                         @foreach($orders->data as $order)
                                            <tr class="border-bm">
                                                <td> {{$order->id}}</td>
                                                <td> {{ config('api.CONCEPT_NAME') }}</td>
                                                <td> {{$order->type}}</td>
                                                <td> {{$order->total}} {{$order->currency}}</td>
                                                <td> {{$order->status}}</td>
                                                <td> {{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i:s')}}</td>
                                                <td> <a href="{{\Illuminate\Support\Facades\URL::to('/get-order/'.$order->id)}}" class="custom-btn smoothscroll"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt me-2" viewBox="0 0 16 16">
                                                    <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27m.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0z"/>
                                                    <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5"/>
                                                  </svg> Get Invoice</a></td>
                                            </tr>
                                        @endforeach
                                           
                                        </tr>
                                    
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
</section>




</section>

@endsection





