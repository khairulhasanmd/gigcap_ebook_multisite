@extends('layouts.main')

@section('styles-files')
    <link href="{{ asset ('theme/common/default.css') }}" rel="stylesheet">
    <style>
        .main-menu {
            display: none;
        }
    </style>
@endsection

@section('content')


@endsection

@section('script-files')
    <script>
        $(document).ready(function() {
                
                var isTrue = true;

                if(isTrue){
                $('body').css('overflow', 'hidden');
                $('.popups').css('display', 'block');
                }else{
                $('body').css('overflow', 'auto');
                }
           
        });
    </script>

@endsection
