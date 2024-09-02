@extends('welcome.master')

@section('main')
    <header>
        @include('partials.navigation')
    </header>
    <!-- @yield('subheader') -->
    <main>
        @yield('content')
    </main>

    <footer>
        @include('partials.footer') 
    </footer>

@endsection
