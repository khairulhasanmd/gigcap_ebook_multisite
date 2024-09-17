

@extends('templates.booksee365com.welcome.master')

@section('main')
    <header>
        @include('templates.booksee365com.partials.navigation')
    </header>
    <!-- @yield('subheader') -->
    <main>
        @yield('content')
    </main>

    <footer>
        @include('templates.booksee365com.partials.footer') 
    </footer>

@endsection
