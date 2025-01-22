<!--begin::Sidebar-->

<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    {{-- <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{route('dashboard')}}">
            
            @if(Auth::user()->level=='admin')
                <img alt="Logo" src="{{asset($concept->template.'/')}}/images/logo.png" class="h-45px app-sidebar-logo-default" alt="{{$concept->name}}"/>
                @else
                <img alt="Logo" src="{{asset('assets/home/images/logo.jpg')}}" class="h-45px app-sidebar-logo-default" />
                <img alt="Logo" src="{{asset('assets/home/images/logo.jpg')}}" class="h-20px app-sidebar-logo-minimize" />
            @endif
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle" class="active app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-double-left fs-2 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Sidebar toggle-->
    </div> --}}
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <div class="menu-item {{ Route::is('dashboard') ? 'here show' : ''}}">
                    <a class="menu-link" href="{{route('dashboard')}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-graph-up text-success" style="font-size: 30px;color: #747488 !important;"></i>
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Settings</span>
                    </div>
                </div>
                    {{-- <div class="menu-item {{ str_contains(Request::path(), 'admin/crms') ? 'here show' : ''}}">
                        <a class="menu-link" href="{{ url('admin/crms') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-bank fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">CRM's</span>
                        </a>
                    </div> --}}
                    <div class="menu-item {{ str_contains(Request::path(), 'admin/concepts') ? 'here show' : ''}}">
                        <a class="menu-link" href="{{ url('admin/concepts') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-abstract-39" style="font-size: 25px;color: #747488 !important;">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Concepts</span>
                        </a>
                    </div>
      
                {{-- update password start --}}
                <div class="menu-item">
                    <a class="menu-link" href="{{route('admin.update.password')}}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-key " style="font-size: 25px;color: #747488 !important;">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Update password</span>
                    </a>
                </div>

                {{-- update password end --}}
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="Log Out">
            <span class="btn-label" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</span>
                <i class="ki-duotone ki-exit-right" style="font-size: 25px;color: #747488 !important;  margin-left: 2px;">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                </i>
        </a>
    </div>
    <!--end::Footer-->
</div>
<!--end::Sidebar-->
