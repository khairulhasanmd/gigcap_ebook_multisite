@extends('member.layouts.main')

@section('styles-files')@endsection

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card book-detail">
                    <div class="iq-card-header-toolbar" style="background-color: #f7f9fe;">                              
                        <a href="{{ route('products') }}" class="view-more">Browse Books</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="iq-card book-detail">
                    <div class="iq-card-body p-0">
                        <iframe src="{{ asset('membership/images/book/book.pdf') }}"  style="width: 100%; height: 90vh;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection