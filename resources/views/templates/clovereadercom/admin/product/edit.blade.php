@extends('admin.base')
@section('styles-files')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('container')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Product</h1>

        @if ($message = Session::get('success'))
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

    <form action="{{ route ('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="title">Product Name<span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="title" name="product_name" value="{{ $product->product_name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Product Description</label>
            <input type="text" class="form-control" id="description" name="product_description" value="{{ $product->product_description }}" >
        </div>

        @if ($product->image)
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
            </div>

            <div class="col-md-6">
                    <img  width="100" src="{{ asset('images').'/'.$product->image}}" alt="..." class="img-thumbnail">
            </div>
        </div>
        @else
        <div class="form-group">
            <label for="image">Image</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        @endif
        <div class="form-group">
            <label for="tags">Tags<span style="color: red;">*</span></label>
            <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" @if(in_array($tag->id, $pTags)) selected @endif>{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pdf_url">Pdf<span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="pdf_url" name="pdf_url" value="{{ $product->pdf_url }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
@section('script-file')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
