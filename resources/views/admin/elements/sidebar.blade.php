<!--begin::sidebar menu-->
<div class="app-sidebar-menu flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention fw-bold px-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->routeIs('admin.dashboard') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-outline ki-element-11 text-lg"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            @foreach (config('plugins.enabled') as $plugin => $enabled)
                @if ($enabled)
                    @php
                        $pluginConfigPath = base_path("plugins/{$plugin}/config.php");
                        $pluginConfig = File::exists($pluginConfigPath) ? include($pluginConfigPath) : null;
                    @endphp

                    @if ($pluginConfig && isset($pluginConfig['menu']['index']))
                        @php
                            $menuItem = $pluginConfig['menu']['index'];
                            $hasSubitems = isset($menuItem['subitems']) && is_array($menuItem['subitems']);

                            $isActive = request()->routeIs($menuItem['route']) || ($hasSubitems && collect($menuItem['subitems'])->pluck('route')->contains(function ($route) {
                                return request()->routeIs($route);
                            }));
                        @endphp

                        <div data-kt-menu-trigger="click" class="menu-item {{ $hasSubitems ? 'menu-accordion' : '' }} {{ $isActive ? 'here show' : '' }}">
                            <!--begin:Menu link-->
                            <a href="{{ route($menuItem['route']) }}" class="menu-link">
                                <span class="menu-icon">
                                    <i class="{{ $menuItem['icon'] }} text-lg"></i>
                                </span>
                                <span class="menu-title">{{ $menuItem['name'] }}</span>
                            </a>
                            <!--end:Menu link-->

                            <!--begin:Menu sub (voor subitems)-->
                            @if ($hasSubitems)
                                <div class="menu-sub menu-sub-accordion">
                                    @foreach ($menuItem['subitems'] as $subitem)
                                    <div class="menu-item {{ request()->routeIs($subitem['route']) ? 'here show' : '' }}">
                                        <a href="{{ route($subitem['route']) }}" class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">{{ $subitem['name'] }}</span>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                            <!--end:Menu sub-->
                        </div>
                    @endif
                @endif
            @endforeach

        </div>
    </div>
</div>
<!--end::sidebar menu-->
<!--begin::Footer-->
<div class="app-sidebar-footer d-flex align-items-center px-4 pb-10" id="kt_app_sidebar_footer">
    <!--begin::User-->
    <div class="w-100">
        <!--begin::User info-->
        <div class="d-flex align-items-center" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true" data-kt-menu-placement="top-start">
            <div class="d-flex flex-center cursor-pointer symbol symbol-circle symbol-40px">
                <img src="{{ asset('admin/media/avatars/blank.png') }}" alt="image" />
            </div>
            <!--begin::Name-->
            <div class="d-flex flex-column align-items-start justify-content-center ms-3">
                <span class="text-gray-500 fs-8 fw-semibold">
                    <div class="">
                        Hoi
                    </div>
                </span>
                <a href="#" class="text-gray-800 fs-7 fw-bold text-hover-primary">{{ auth()->user()->name }}</a>
            </div>
            <!--end::Name-->
        </div>
        <!--end::User info-->
        <!--begin::User account menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                        <img alt="Logo" src="{{ asset('admin/media/avatars/blank.png') }}" />
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Username-->
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">
                            {{ auth()->user()->name }}
                            <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                        </div>
                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                    </div>
                    <!--end::Username-->
                </div>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            {{-- <div class="menu-item px-5 my-1">
                <a href="account/settings.html" class="menu-link px-5">Account Settings</a>
            </div> --}}
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="menu-link px-5 w-100">Uitloggen</button>
                </form>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::User account menu-->
    </div>
    <!--end::User-->
</div>
<!--end::Footer-->