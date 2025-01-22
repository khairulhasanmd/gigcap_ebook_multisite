<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="../">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $concept->service_name }}</title>
    <meta name="robots" content="noindex, nofollow">
    {{-- <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}"> --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/home/images/fav.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/home/images/fav.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/home/images/fav.png')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css">
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.js"></script>

    <style>
        .pace {
            -webkit-pointer-events: none;
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none
        }

        .pace-inactive {
            display: none
        }

        .pace .pace-progress {
            background: #29d;
            position: fixed;
            z-index: 2000;
            top: 0;
            right: 100%;
            width: 100%;
            height: 2px
        }
    </style>
    @stack('styles')
</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" data-kt-app-sidebar-minimize="off" class="app-default">
    <script>
        var themeMode, defaultThemeMode = "dark";
        document.documentElement && ("system" === (themeMode = document.documentElement.hasAttribute("data-bs-theme-mode") ? document.documentElement.getAttribute("data-bs-theme-mode") : null !== localStorage.getItem("data-bs-theme") ? localStorage.getItem("data-bs-theme") : defaultThemeMode) && (themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"), document.documentElement.setAttribute("data-bs-theme", themeMode))
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            @include('admin.partials.header')
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                @include('admin.partials.sidebar')
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    @yield('content')
                    @include('admin.partials.footer')
                </div>
            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true"><i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i></div>
    @yield('modals')<script>
        var hostUrl = "assets/"
    </script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script> --}}
    @stack('scripts')
</body>

</html>
