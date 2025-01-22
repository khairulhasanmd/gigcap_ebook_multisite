@extends('admin.layouts.app')

@push('styles')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush
@section('content')

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{ Str::plural($category->name, 2) }}</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted"> <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Admin</a> </li>
                    <li class="breadcrumb-item"> <span class="bullet bg-gray-400 w-5px h-2px"></span> </li>
                    <li class="breadcrumb-item text-muted">{{ Str::plural($category->name, 2) }}</li>
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
                            <div class="card-title"> {{ Str::plural($category->name, 2) }}</div>
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base"> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_edit_modal">Add {{ Str::singular($category->name) }}</button> </div>
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
                                        <th class="min-w-125px">Title</th>
                                        <th class="min-w-125px">Thumbnail</th>
                                        <th class="min-w-125px">Description</th>
                                        <th class="text-end min-w-70px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $row->title }}</td>
                                        <td><img style="max-width: 100px; max-height:100px;" src="{{ asset($row->image) }}" alt=""></td>
                                        <td>{{ $row->description }}</td>
                                        <td class="text-end d-flex">
                                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                <div class="menu-item px-3"> <a href="{{url('/').'/'.Request::path().'/edit/'.$row->id}}" class="menu-link px-3">Edit</a> </div>
                                                <div class="menu-item px-3"> <a href="{{url('/').'/'.Request::path().'/delete/'.$row->id}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a> </div>
                                            </div>
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
                    @include('admin.contents.contents_modal_'.$category->type)
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@if (isset($detail))
    <script type="text/javascript">
        $(document).ready(function(){
            $('#add_edit_modal').modal('show');
        });
    </script>
@else

@endif

<script>
    function slugify(str) {
        return String(str)
            .normalize('NFKD') // split accented characters into their base characters and diacritical marks
            .replace(/[\u0300-\u036f]/g, '') // remove all the accents, which happen to be all in the \u03xx UNICODE block.
            .trim() // trim leading or trailing whitespace
            .toLowerCase() // convert to lowercase
            .replace(/[^a-z0-9 -]/g, '') // remove non-alphanumeric characters
            .replace(/\s+/g, '-') // replace spaces with hyphens
            .replace(/-+/g, '-'); // remove consecutive hyphens
    }
</script>
@endpush
