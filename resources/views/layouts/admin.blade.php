<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>{{config('app.name')}}</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="{{ url('/') }}/assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ url('/') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('/') }}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('/') }}/assets/plugins/custom/bootstrap-datepicker/bootstrap-datepicker.min599c.css?v4.0.2"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/custom/timepicker/jquery-timepicker.min599c.css?v4.0.2">

    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ url('/') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/alertify/alertify.min.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/alertify/default.min.css" />
    <link id="theme-style" rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">

    <!--end::Global Stylesheets Bundle-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->

    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
                    id="kt_app_header_container">
                    <!--begin::sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                            id="kt_app_sidebar_mobile_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::sidebar mobile toggle-->
                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="" class="d-lg-none">
                            <img alt="Logo" src="/assets/images/am_avatar.jpg" class="h-30px" />
                        </a>
                    </div>
                    <!--end::Mobile logo-->
                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1"
                        id="kt_app_header_wrapper">
                        <!--begin::Menu wrapper-->

                        <!--end::Menu wrapper-->
                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">


                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <!--begin:Menu item-->
                                <!--end:Menu item-->
                                <div class="cursor-pointer symbol symbol-35px symbol-md-40px avatar-div"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <a href="">
                                        <img alt="Logo" src="/assets/images/am_avatar.jpg" class="h-35px" />
                                    </a>
                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <a href="">
                                                    <img alt="Logo" src="/assets/images/am_avatar.jpg" class="h-30px" />
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">
                                                    {{ Auth::user()->first_name }}
                                                    @if(Auth::user()->last_name){{ Auth::user()->last_name }}@endif
                                                    <span class="badge badge-light-success fw-bold fs-8 px-0 py-1 ms-0"
                                                        style="text-transform: capitalize">{{Auth::user()->role}}</span>
                                                </div>
                                                <a href=""
                                                    class="fw-semibold text-muted text-hover-primary fs-7">{{Auth::user()->email}}</a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">

                                        <a href="" class="menu-link px-5">My Profile</a>

                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                            class="menu-link px-5">Sign Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">@csrf</form>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->
                            <!--begin::Header menu toggle-->
                            <div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
                                <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                                    id="kt_app_header_menu_toggle">
                                    <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Header menu toggle-->
                        </div>
                        <!--end::Navbar-->
                    </div>
                    <!--end::Header wrapper-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <!--begin::Logo image-->
                        <a href="{{route('dashboard')}}">
                            <img alt="Logo" src="{{ url('/') }}/assets/images/qbank_logo.png"
                                class="h-30px app-sidebar-logo-default" />
                            <img alt="Logo" src="{{ url('/') }}/assets/media/logos/logo-small.png"
                                class="h-30px app-sidebar-logo-minimize" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Sidebar toggle-->
                        <div id="kt_app_sidebar_toggle"
                            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
                            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                            data-kt-toggle-name="app-sidebar-minimize">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                            <span class="svg-icon svg-icon-2 rotate-180">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                        fill="currentColor" />
                                    <path
                                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Sidebar toggle-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::sidebar menu-->
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <!--begin::Menu wrapper-->
                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                            data-kt-scroll-save-state="true">
                            <!--begin::Menu-->
                            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                                data-kt-menu="true" data-kt-menu-expand="false">
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                                    <!--begin:Menu link-->
                                    <a href="">
                                        <span
                                            class="menu-link @if(in_array(Route::currentRouteName(),array('dashboard'))) active  @endif">
                                            <span class="menu-icon">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="2" y="2" width="9" height="9" rx="2"
                                                            fill="currentColor" />
                                                        <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                                            fill="currentColor" />
                                                        <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                                            fill="currentColor" />
                                                        <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-title">Dashboard</span>
                                        </span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>

                                <!--end:Menu item-->

                                <!--begin:Menu item-->

                                <!--begin:Menu item-->
                                @if( !empty(Auth::user()->isAdmin()) )
                                <div class="menu-item pt-5">
                                    <!--begin:Menu content-->
                                    <div class="menu-content">
                                        <span class="menu-heading fw-bold text-uppercase fs-7">Subjects</span>
                                    </div>
                                    <!--end:Menu content-->
                                </div>

                                <div data-kt-menu-trigger="click"
                                    class="menu-item menu-accordion @if(in_array(Route::currentRouteName(),array('subject.index','subject.create','subject.edit'))) show @endif">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="fa-solid fa-layer-group  p-0"></i>
                                        </span>
                                        <span class="menu-title">Subjects</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link @if(in_array(Route::currentRouteName(),array('subject.index'))) active  @endif"
                                                href="{{route('subject.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Subject List</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link @if(in_array(Route::currentRouteName(),array('subject.create'))) active  @endif"
                                                href="{{route('subject.create')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Add Subject</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->

                                    </div>
                                </div>
                                <div class="menu-item pt-5">
                                    <!--begin:Menu content-->
                                    <div class="menu-content">
                                        <span class="menu-heading fw-bold text-uppercase fs-7">Topics</span>
                                    </div>
                                    <!--end:Menu content-->
                                </div>

                                <div data-kt-menu-trigger="click"
                                    class="menu-item menu-accordion @if(in_array(Route::currentRouteName(),array('topic.index','topic.create','topic.edit'))) show @endif">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="fa-solid fa-code-branch fa-rotate-90  p-0"></i>

                                        </span>
                                        <span class="menu-title">Topics</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link @if(in_array(Route::currentRouteName(),array('topic.index'))) active  @endif"
                                                href="{{route('topic.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Topic List</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link @if(in_array(Route::currentRouteName(),array('topic.create'))) active  @endif"
                                                href="{{route('topic.create')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Add Topic</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->

                                    </div>
                                </div>

                                @endif

                                <div class="menu-item pt-5">
                                    <!--begin:Menu content-->
                                    <div class="menu-content">
                                        <span class="menu-heading fw-bold text-uppercase fs-7">Question Paper</span>
                                    </div>
                                    <!--end:Menu content-->
                                </div>

                                <div data-kt-menu-trigger="click"
                                    class="menu-item menu-accordion @if(in_array(Route::currentRouteName(),array('question.configiration','question.configure','questionconfig'))) show @endif">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">

                                            <i class="fa-solid fa-gear p-0"></i>
                                        </span>
                                        <span class="menu-title">Configuration</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link @if(in_array(Route::currentRouteName(),array('question.configiration'))) active  @endif"
                                                href="{{route('question.configiration')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Configuration List</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link @if(in_array(Route::currentRouteName(),array('question.configure'))) active  @endif"
                                                href="{{route('question.configure')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Add Configuration</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->

                                    </div>
                                </div>

                                <div data-kt-menu-trigger="click"
                                    class="menu-item menu-accordion @if(in_array(Route::currentRouteName(),array('question.index','question.create','question.edit'))) show @endif">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">

                                            <i class="fa-solid fa-clipboard-question p-0"></i>
                                        </span>
                                        <span class="menu-title">Questions</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link @if(in_array(Route::currentRouteName(),array('question.index'))) active  @endif"
                                                href="{{route('question.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Question List</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link @if(in_array(Route::currentRouteName(),array('question.create'))) active  @endif"
                                                href="{{route('question.create')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Add Question</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->

                                    </div>
                                </div>

                                <div data-kt-menu-trigger="click"
                                    class="menu-item menu-accordion @if(in_array(Route::currentRouteName(),array('question.questionpaper','question.qspgeneration'))) show @endif">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">


                                            <i class="fa-solid fa-file-lines p-0"></i>
                                        </span>
                                        <span class="menu-title">Question Paper</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link @if(in_array(Route::currentRouteName(),array('question.questionpaper'))) active  @endif"
                                                href="{{route('question.questionpaper')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Paper List</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link @if(in_array(Route::currentRouteName(),array('question.qspgeneration'))) active  @endif"
                                                href="{{route('question.qspgeneration')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Generate</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->

                                    </div>
                                </div>
                               

                                <!--end:Menu item-->
                                 
                                @if( !empty(Auth::user()->isAdmin()) )

                                <div class="menu-item pt-5">
                                    <!--begin:Menu content-->
                                    <div class="menu-content">
                                        <span class="menu-heading fw-bold text-uppercase fs-7">User</span>
                                    </div>
                                    <!--end:Menu content-->
                                </div>
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(in_array(Route::currentRouteName(),array('user.index','user.create','user.edit'))) show @endif">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="fa-solid fa-users  p-0"></i>
                                        </span>
                                        <span class="menu-title">User</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-accordion">
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link @if(in_array(Route::currentRouteName(),array('user.index'))) active  @endif" href="{{route('user.index')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">User List</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link @if(in_array(Route::currentRouteName(),array('user.create'))) active  @endif" href="{{route('user.create')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Create User</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->

                                    </div>
                                    <!--end:Menu sub-->
                                </div>

                                <!--end:Menu item-->

                                @endif

                                

                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::sidebar menu-->
                    <!--begin::Footer-->
                    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">

                        <span class="footer-label">2024© Amrita Vishwa Vidyapeetham</span>
                        <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->

                        <!--end::Svg Icon-->
                        </a>
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Sidebar-->

                @yield('content')

                <!--begin::Javascript-->
                <script>
                var hostUrl = "assets/";
                </script>
                <!--begin::Global Javascript Bundle(mandatory for all pages)-->
                <script src="{{ url('/') }}/assets/plugins/global/plugins.bundle.js"></script>
                <script src="{{ url('/') }}/assets/js/scripts.bundle.js"></script>
                <!--end::Global Javascript Bundle-->
                <!--begin::Vendors Javascript(used for this page only)-->
                <script src="{{ url('/') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
                <script src="{{ url('/') }}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
                <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
                <!--end::Vendors Javascript-->
                <!--begin::Custom Javascript(used for this page only)-->
                <script src="{{ url('/') }}/assets/js/widgets.bundle.js"></script>
                <script src="{{ url('/') }}/assets/js/custom/widgets.js"></script>
                <script src="{{ url('/') }}/assets/js/custom/apps/chat/chat.js"></script>
                <script src="{{ url('/') }}/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
                <script src="{{ url('/') }}/assets/js/custom/utilities/modals/create-app.js"></script>
                <script src="{{ url('/') }}/assets/js/custom/utilities/modals/new-target.js"></script>
                <script src="{{ url('/') }}/assets/js/custom/utilities/modals/users-search.js"></script>
                <script src="{{ url('/') }}/assets/js/alertify/alertify.min.js"></script>
                <script src="{{ url('/') }}/assets/plugins/custom/timepicker/jquery.timepicker.min599c.js?v4.0.2">
                </script>
                <script
                    src="{{ url('/') }}/assets/plugins/custom/bootstrap-datepicker/bootstrap-datepicker.min599c.js?v4.0.2">
                </script>
                <script src="{{ url('/') }}/assets/js/custom/custom.js"></script>
                <!--end::Custom Javascript-->
                <!--end::Javascript-->
                <script>
                $(document).ready(function() {
                    @if(Session::has('success'))
                    alertify.success(`{{Session::get('success')}}`);
                    @endif

                    @if(Session::has('error'))
                    alertify.error(`{{Session::get('error')}}`);
                    @endif


                });
                </script>

                @yield('pageScripts')
</body>
<!--end::Body-->

</html>