@extends('admin.base')

@section('styles-files')
    <link href="{{ asset ('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection


@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tags</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="courseTable" width="100%" cellspacing="0">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @elseif ($message = Session::get('error'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->name}}</td>
                        <td><a href="{{ route ('tags.edit', $tag->id) }}" class="btn btn-warning btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <span class="btn btn-danger btn-circle btn-sm" onclick="event.preventDefault(); if(confirm('Do you really want to delete?')){ document.getElementById('form-delete-{{$tag->id}}') .submit() }">
                                <i class="fas fa-trash" ></i>
                            </span>
                            <form style="display:none" id="{{'form-delete-'.$tag->id}}" action="{{ route('tags.destroy', [ $tag->id ]) }}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection

@section('script-file')

<!-- Page level plugins -->
<script src="{{  asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{  asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{  asset('admin/js/demo/datatables-demo.js') }}"></script>


@endsection
