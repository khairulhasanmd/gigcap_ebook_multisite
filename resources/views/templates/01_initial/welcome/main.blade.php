@extends('templates.01_initial.welcome.master')

@section('main')
    <header>
        @include('templates.01_initial.partials.navigation')
    </header>
    <!-- @yield('subheader') -->
    <main>
        @yield('content')
    </main>

    <footer>
        @include('templates.01_initial.partials.footer') 
    </footer>

@endsection
