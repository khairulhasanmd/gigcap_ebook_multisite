@extends('layouts.master')

@section('main')
    <header>
        @include('partials.header')
    </header>
    <!-- @yield('subheader') -->
    <main>
        @guest
            @include('partials.log-in')
        @endguest
        @yield('content')
    </main>

@endsection
