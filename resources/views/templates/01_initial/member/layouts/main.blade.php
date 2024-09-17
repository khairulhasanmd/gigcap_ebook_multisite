@extends('member.layouts.master')

@section('main')

    <!-- loader Start -->
    <div id="loading">
         <div id="loading-center">
         </div>
      </div>
    <div class="wrapper">
        @include('member.common.sidebar')

        @include('member.common.header')

        @yield('content')
    </div>

    @include('member.common.footer')
@endsection
