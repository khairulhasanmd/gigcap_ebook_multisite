@extends('admin.layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    .images_selector {
        /* border: 1px dashed silver; */
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    }

    input[type=radio]:checked+label {
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        border: 1px solid silver;
    }
</style>
@include('partials.flash')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Update Profile
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted"> <a href="../../demo1/dist/index.html"
                            class="text-muted text-hover-primary">Admin</a> </li>
                    <li class="breadcrumb-item"> <span class="bullet bg-gray-400 w-5px h-2px"></span> </li>
                    <li class="breadcrumb-item text-muted">Update Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-5 mb-xl-10">
                    <div class="card d-flex align-items-center">
                        <form class="form col-lg-6 col-10" novalidate="novalidate" method="POST"
                            action="{{ route('admin.profile.update', ['id' => Auth::user()->id]) }}">
                            @csrf
                            {{ method_field('PATCH') }}
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3 mt-3">Hello {{Auth::user()->name}}! </h1>
                                <!--end::Title-->

                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group=-->

                              <!-- Name -->
                              <div class="fv-row mb-8">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" placeholder="name" id="name" name="name"
                                    class="form-control bg-transparent col-lg-7  @error('name') is-invalid @enderror"
                                    autocomplete="name" value="{{Auth::user()->name}}" autofocus />

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="fv-row mb-8">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" placeholder="Email" id="email"
                                    name="email"
                                    class="form-control bg-transparent col-lg-7  @error('email') is-invalid @enderror"
                                    value="{{Auth::user()->email}}" autofocus />


                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Update</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                                <a type="submit" href="{{route('admin.update.password')}}" class="btn btn-secondary mt-4">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Update Password</span>
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')

    @endsection
