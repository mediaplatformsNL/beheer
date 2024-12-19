<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title') - Huis Verkopen</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css" />
    
    @stack('stylesheets')
</head>
<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }

    </script>
    <!--end::Theme mode setup on page load-->

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-animation="false" data-kt-sticky-offset="{default: '0px', lg: '0px'}">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch flex-stack mt-lg-8" id="kt_app_header_container">
                    <!--begin::Sidebar toggle-->
                    <div class="d-flex align-items-center d-block d-lg-none ms-n3" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px me-1" id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-outline ki-abstract-14 fs-2"></i>
                        </div>
                        <!--begin::Logo image-->
                        <a href="{{ route('dashboard') }}" class="px-7">
                            <img alt="Logo" src="{{ asset('admin/media/logos/logo-mediators-vergelijken-admin.png') }}" class="h-25px theme-light-show" />
                            <img alt="Logo" src="{{ asset('admin/media/logos/logo-mediators-vergelijken-admin-dark-theme.png') }}" class="h-25px theme-dark-show" />
                        </a>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Sidebar toggle-->
                    <!--begin::Navbar-->
                    <div class="app-navbar flex-lg-grow-1" id="kt_app_header_navbar">
                        <div class="app-navbar-item d-flex align-items-stretch flex-lg-grow-1 me-1 me-lg-0">
                        </div>
                        <!--begin::My apps links-->
                        <div class="app-navbar-item ms-1 ms-md-3">
                            <!--begin::Menu- wrapper-->
                            <a href="{{ route('settings.index') }}" class="btn btn-icon btn-custom btn-color-gray-500 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                <i class="ki-outline ki-setting-3 fs-2"></i>
                            </a>
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::My apps links-->
                    </div>
                    <!--end::Navbar-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar flex-column mt-lg-4 ps-2 pe-2 ps-lg-7 pe-lg-4" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <div class="app-sidebar-logo flex-shrink-0 d-none d-lg-flex flex-center align-items-center" id="kt_app_sidebar_logo">
                        <!--begin::Logo-->
                        <a href="{{ route('dashboard') }}" class="px-7">
                            <img alt="Logo" src="{{ asset('admin/media/logos/logo-mediators-vergelijken-admin.png') }}" class="d-none d-sm-inline app-sidebar-logo-default theme-light-show img-fluid" />
                            <img alt="Logo" src="{{ asset('admin/media/logos/logo-mediators-vergelijken-admin-dark-theme.png') }}" class="theme-dark-show" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Aside toggle-->
                        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                            <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                                <i class="ki-outline ki-abstract-14 fs-1"></i>
                            </div>
                        </div>
                        <!--end::Aside toggle-->
                    </div>
                    @include('admin.elements.sidebar')
                </div>
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                @yield('content')
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    <div id="kt_app_footer" class="app-footer">
                        <!--begin::Footer container-->
                        <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                            <!--begin::Copyright-->
                            <div class="text-gray-900 order-2 order-md-1">
                            </div>
                            <!--end::Copyright-->
                            <!--begin::Menu-->
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                <li class="menu-item">
                                    <span class="text-muted fw-semibold me-1">{{ date('Y') }}&copy;</span>
                                    <a href="https://www.huisverkopen.nl" target="_blank" class="text-gray-800 text-hover-primary d-inline-block">Huis Verkopen B.V.</a>
                                </li>
                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Footer container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
    <!--end::Scrolltop-->

    @stack('modal')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin/js/scripts.bundle.js') }}"></script>
    @stack('scripts')
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menuToggle');
            const menuDropdown = document.getElementById('menuDropdown');

            menuToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                menuDropdown.classList.toggle('show');
            });

            // Sluit menu bij klik buiten het menu
            document.addEventListener('click', function(e) {
                if (!menuDropdown.contains(e.target) && !menuToggle.contains(e.target)) {
                    menuDropdown.classList.remove('show');
                }
            });
        });

    </script> --}}
</body>
</html>