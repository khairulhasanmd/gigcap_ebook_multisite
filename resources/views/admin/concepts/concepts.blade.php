@extends('admin.layouts.app')

@push('styles')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush
@section('content')

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Concepts</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted"> <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Admin</a> </li>
                    <li class="breadcrumb-item"> <span class="bullet bg-gray-400 w-5px h-2px"></span> </li>
                    <li class="breadcrumb-item text-muted">Concepts</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-5 mb-xl-10">
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title"> Concepts</div>
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base"> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_edit_modal">Add Concept</button> </div>
                                <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                                    <div class="fw-bold me-5"> <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div><button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            @include('admin.partials.flash')
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <p><strong>Opps Something went wrong</strong></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">Concept Name</th>
                                        <th class="min-w-125px">Domain</th>
                                        <th class="min-w-125px">Company</th>
                                        <th class="min-w-125px">CRM</th>
                                        <th class="min-w-125px">API Key</th>
                                        <th class="text-end min-w-70px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $row->concept_name }}</td>
                                        <td>{{ $row->domain_name }}</td>
                                        <td>{{ $row->company_name }}</td>
                                        {{-- <td>{{ $row->crm->name }}</td> --}}
                                        <td>{{ $row->crm_api_key }}</td>
                                        <td class="text-end d-flex">
                                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                <div class="menu-item px-3"> <a href="{{url('/').'/'.Request::path().'/edit/'.$row->id}}" class="menu-link px-3">Edit</a> </div>
                                                <div class="menu-item px-3"> <a href="{{url('/').'/'.Request::path().'/delete/'.$row->id}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a> </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary m-1" href="{{ route('concept.company.info', $row->id) }}">Get Company Info</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
                                <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                    <div class="dataTables_paginate paging_simple_numbers" id="kt_file_manager_list_paginate">
                                        {!! $data->links('admin.pagination.custom') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade modal-xl " id="add_edit_modal" tabindex="-1" aria-hidden="true" aria-labelledby="ModalTitle">
                        <form class="form" action="{{url('/').'/'.Request::path()}}" enctype="multipart/form-data" id="add_edit_modal_form" data-kt-redirect="{{url('/').'/'.Request::path()}}" method="POST">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <?php (isset($detail)) ? '<input type="hidden" name="id" id="id" value="'.$detail->id.'' : '">'; ?>
                                    @csrf
                                    <div class="modal-header" id="add_edit_modal_header">
                                        <h2 class="fw-bold" id="ModalTitle">{{ (isset($detail)) ? 'Edit' : 'Add' }} a Concept</h2>

                                        <div id="add_edit_modal_close" onclick="window.location.href='{{ url('/admin/concepts') }}'" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal"> <i class="ki-duotone ki-cross fs-1"> <span class="path1"></span> <span class="path2"></span> </i> </div>
                                    </div>
                                    <div class="modal-body py-12 px-lg-17">
                                        <div class="scroll-y me-n7 pe-7" id="add_edit_modal_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#add_edit_modal_header" data-kt-scroll-wrappers="#add_edit_modal_scroll" data-kt-scroll-offset="100px">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="fv-row mb-7">
                                                        <label class="required fs-6 fw-semibold mb-2">Domain Name </label>
                                                        <input type="text" class="form-control form-control-solid @error('domain_name') is-invalid @enderror" placeholder="demo.com" name="domain_name" value="{{ (isset($detail)) ? $detail->domain_name : '' }}" />
                                                        @error('domain_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <label class="required fs-6 fw-semibold mb-2">CRM</label>
                                                        <input type="number" name="crm_id" value="0">
                                                        @error('crm_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <label class="fs-6 fw-semibold mb-2">CRM API Key </label>
                                                        <input type="text" class="form-control form-control-solid @error('crm_api_key') is-invalid @enderror" placeholder="AABBCC112233" name="crm_api_key" id="crm_api_key" value="{{ (isset($detail)) ? $detail->crm_api_key : '' }}" />
                                                        @error('crm_api_key')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <label class="fs-6 fw-semibold mb-2">Recaptcha Site Key</label>
                                                        <input type="text" class="form-control form-control-solid @error('recaptcha_sitekey') is-invalid @enderror" placeholder="AABBCC112233" name="recaptcha_sitekey" id="recaptcha_sitekey" value="{{ (isset($detail)) ? $detail->recaptcha_sitekey : '' }}" />
                                                        @error('recaptcha_sitekey')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <label class="fs-6 fw-semibold mb-2">Recaptcha Secret Key</label>
                                                        <input type="text" class="form-control form-control-solid @error('recaptcha_secretkey') is-invalid @enderror" placeholder="AABBCC112233" name="recaptcha_secretkey" id="recaptcha_secretkey" value="{{ (isset($detail)) ? $detail->recaptcha_secretkey : '' }}" />
                                                        @error('recaptcha_secretkey')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <label class=" fs-6 fw-semibold mb-2">Extra Codes </label>
                                                        <textarea type="textarea" class="form-control form-control-solid" id="extra_codes" name="extra_codes" placeholder="any html code here, js with sctipt tags" spellcheck="false" class="custom-scrollbar ">{{ (isset($detail)) ? $detail->extra_codes : '' }}</textarea>
                                                        @error('domain_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="fs-6 fw-semibold mb-2">Choose a template</label>
                                                    <div class="form-group row align-items-center">
                                                        <div class="row">
                                                            @foreach ($directories as $key => $value)
                                                                <div class="col-sm-6">
                                                                    <div class="app-radio-group p-1">
                                                                        <input type="radio" id="{{ $value }}" name="template" value="{{ $value }}" style="widows: 30px;height:30px;" {{ (isset($detail) && ($value == $detail->template)) ? 'checked' : '' }}>
                                                                        <label for="{{ $value }}"> <img src="{{asset($value.'/preview.png')}}" style="max-width: 200px;">
                                                                        </label><span class="outside"><span class="inside"></span></span>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer flex-center">
                                        <button type="button" class="btn btn-light me-3" onclick="window.location.href='{{ url('/admin/concepts') }}'">Discard</button>
                                        <button type="submit" class="btn btn-primary"> <span class="indicator-label">Submit</span> </button>
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
@endsection

@push('scripts')

@if (isset($detail))
<script type="text/javascript">
    $(document).ready(function() {
        $('#add_edit_modal').modal('show');
    });
</script>
@else

@endif

@endpush
