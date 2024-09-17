@extends('errors.illustrated-layout')

@section('code')
    404
@endsection
@section('message')
    @lang('Sorry, the page you are looking for could not be found.')
@endsection

@section('image')
    <div style="background-image: url({{ asset('/svg/404.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection
