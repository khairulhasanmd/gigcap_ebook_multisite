@extends('admin.layouts.app')

@push('styles')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush
@section('content')

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Categories</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted"> <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Admin</a> </li>
                    <li class="breadcrumb-item"> <span class="bullet bg-gray-400 w-5px h-2px"></span> </li>
                    <li class="breadcrumb-item text-muted">Categories</li>
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
                            <div class="card-title"> Categories</div>
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base"> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_edit_modal">Add Category</button> </div>
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
                                        <th class="min-w-125px">Name</th>
                                        <th class="min-w-125px">Slug</th>
                                        <th class="min-w-125px">Type</th>
                                        <th class="text-end min-w-70px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->slug }}</td>
                                        <td>{{ $row->type }}</td>
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
                        </div>
                    </div>
                    <div class="modal fade " id="add_edit_modal" tabindex="-1" aria-hidden="true" aria-labelledby="ModalTitle">
                        <form class="form" action="{{url('/').'/'.Request::path()}}" enctype="multipart/form-data" id="add_edit_modal_form" data-kt-redirect="{{url('/').'/'.Request::path()}}" method="POST">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <?php (isset($detail)) ? '<input type="hidden" name="id" id="id" value="'.$detail->id.'' : '">'; ?>
                                    @csrf
                                    <div class="modal-header" id="add_edit_modal_header">
                                        <h2 class="fw-bold" id="ModalTitle">{{ (isset($detail)) ? 'Edit' : 'Add' }} a Category</h2>

                                        <div id="add_edit_modal_close" onclick="window.location.href='{{ url('/admin/categories') }}'" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal"> <i class="ki-duotone ki-cross fs-1"> <span class="path1"></span> <span class="path2"></span> </i> </div>
                                    </div>
                                    <div class="modal-body py-10 px-lg-17">
                                        <div class="scroll-y me-n7 pe-7" id="add_edit_modal_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#add_edit_modal_header" data-kt-scroll-wrappers="#add_edit_modal_scroll" data-kt-scroll-offset="300px">
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-semibold mb-2">Name(singular form)</label>
                                                <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Ebook or Blog or Video..." onkeyup="document.getElementById('slug').value=slugify(this.value);" name="name" value="{{ (isset($detail)) ? $detail->name : '' }}" />
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class=" fs-6 fw-semibold mb-2">Category icon (fontawesome)</label>
                                                <input type="text" class="form-control form-control-solid @error('description') is-invalid @enderror" placeholder="Optional" name="menu_icon" value="{{ (isset($detail)) ? $detail->description : '' }}" />
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        
                                            <div class="fv-row mb-7">
                                                <label class="fs-6 fw-semibold mb-2">Slug</label>
                                                <input type="text" class="form-control form-control-solid @error('slug') is-invalid @enderror" placeholder="some_awesome_url" name="slug" id="slug" value="{{ (isset($detail)) ? $detail->slug : '' }}" />
                                                @error('slug')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-semibold mb-2">Type</label>
                                                <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                                                    <option value="file" {!! (isset($detail)) ? (('file'==$detail->type) ? "selected='selected'" : '') : '' !!} title="File">File</option>
                                                    <option value="video" {!! (isset($detail)) ? (('video'==$detail->type) ? "selected='selected'" : '') : '' !!} title="Video">Video</option>
                                                    <option value="blog" {!! (isset($detail)) ? (('blog'==$detail->type) ? "selected='selected'" : '') : '' !!} title="Blog">Blog</option>
                                                </select>
                                                @error('type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-semibold mb-2">Image</label>
                                                <input type="file" class="form-control form-control-solid @error('image') is-invalid @enderror" name="file" />
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fs-6 fw-semibold mb-2">Description</label>
                                                <input type="text" class="form-control form-control-solid @error('description') is-invalid @enderror" placeholder="Category small description." name="description" value="{{ (isset($detail)) ? $detail->description : '' }}" />
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer flex-center">
                                        <button type="button" class="btn btn-light me-3" onclick="window.location.href='{{ url('/admin/categories') }}'" >Discard</button>
                                        <button type="submit" class="btn btn-primary"> <span class="indicator-label">Submit</span>  </button>
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
