@extends('templates.mentoringlibrarycom.layouts.master')

@section('main')
    <header>
        @include('templates.mentoringlibrarycom.partials.header')
    </header>
    <!-- @yield('subheader') -->
    <main>
        @guest
            @include('templates.mentoringlibrarycom.partials.log-in')
        @endguest
        @yield('content')
    </main>

@endsection
