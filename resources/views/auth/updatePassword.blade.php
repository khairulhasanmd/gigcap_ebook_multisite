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
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@elseif ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Update
                    Password
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted"> <a  href="{{route('dashboard')}}" class="text-muted text-hover-primary">Dashboard</a> </li>
                    <li class="breadcrumb-item"> <span class="bullet bg-gray-400 w-5px h-2px"></span> </li>
                    <li class="breadcrumb-item text-muted">Update Password</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid py-5">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-5 mb-xl-10">
                    <div class="card d-flex align-items-center">
                        <form class="form col-lg-6 col-10" novalidate="novalidate" method="POST"
                            action="{{ route('admin.new.password', ['id' => Auth::user()->id]) }}">
                            @csrf
                            {{ method_field('PATCH') }}
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3 mt-3">Change Password</h1>
                                <!--end::Title-->

                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group=-->

                            <!-- Current Password -->
                            <div class="fv-row mb-8">
                                <label for="currentPassword" class="form-label">Current Password</label>
                                <input type="password" placeholder="Current Password" id="currentPassword"
                                    name="currentPassword"
                                    class="form-control bg-transparent col-lg-7  @error('currentPassword') is-invalid @enderror"
                                    value="" autofocus />
                                <div class="col-lg-1 fv-row" style="position: absolute; top: 110px; right: 190px;">
                                    <i class="fa fa-eye" id="pass-status" onClick="viewPassword('currentPassword', 'pass-status' )"></i>
                                </div>

                                @error('currentPassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- New Password -->
                            <div class="fv-row mb-8">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" placeholder="New Password" id="password" name="password"
                                    class="form-control bg-transparent col-lg-7  @error('password') is-invalid @enderror"
                                    autocomplete="password" autofocus />
                                <div class="col-lg-1 fv-row" style="position: absolute; top: 210px; right: 190px;">
                                    <i class="fa fa-eye" id="new-pass-status" onClick="viewPassword('password', 'new-pass-status')"></i>
                                </div>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Confirm New Password -->
                            <div class="fv-row mb-8">
                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" placeholder="Enter New Password Again"
                                    name="password_confirmation"
                                    class="form-control bg-transparent @error('password_confirmation') is-invalid @enderror"
                                    required />
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <!--begin::Submit button-->
                            <div class="d-grid mb-10 mt-4">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Update</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function viewPassword(inputId, statusId) {
            var passwordInput = document.getElementById(inputId);
            var passStatus = document.getElementById(statusId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passStatus.className = 'fa fa-eye-slash';
            } else {
                passwordInput.type = 'password';
                passStatus.className = 'fa fa-eye';
            }
        }
    </script>

    @endsection

    @section('scripts')

    @endsection
