

@extends('templates.mentoringlibrarycom.welcome.master')

@section('main')
    <header>
        @include('templates.mentoringlibrarycom.partials.navigation')
    </header>
    <!-- @yield('subheader') -->
    <main>
        @yield('content')
    </main>

    <footer>
        @include('templates.mentoringlibrarycom.partials.footer') 
    </footer>

@endsection
