@extends('templates.booksee365com.layouts.master')

@section('main')
    <header>
        @include('templates.booksee365com.partials.header')
    </header>
    <!-- @yield('subheader') -->
    <main>
        @guest
            @include('templates.booksee365com.partials.log-in')
        @endguest
        @yield('content')
    </main>

@endsection
