<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('templates.mentoringlibrarycom.layouts.meta')
        @include('templates.mentoringlibrarycom.layouts.favicon')
        @include('templates.mentoringlibrarycom.welcome.styles')
        @include('templates.mentoringlibrarycom.layouts.head-scripts')
        <style>
            .swal2-select{
                display: none;
            }
        </style>

    </head>

    <body>
        @yield('main')

        @include('templates.mentoringlibrarycom.welcome.scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>


        <script type="text/javascript">
            @if ($errors->any())
                Swal.fire({title:"Ooops", html: "@php echo implode("<br>", $errors->all()) @endphp" , type: "error"});
            @endif
            @if(session('success'))
                Swal.fire({title:"@lang('All good')", html: "@php echo session('success') @endphp" , type: "success"});
            @endif
        </script>
	<script src="{{ asset('js/getdata.js') }}"></script>
    </body>
</html>
