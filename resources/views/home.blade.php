@extends('layouts.admin')

@section('content')
<!--begin::Content-->
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Admin Dashboard</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">QBank |
                                Dashboard</a>
                        </li>
                        <!--end::Item-->

                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_create_campaign">Generate Questions Paper</a>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid p-0">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10">
                    <!--begin::Col-->
                    <div class="col-xl-4 mb-xl-10">
                        <!--begin::Lists Widget 19-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::Heading-->
                            <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px"
                                style="background-image:url('assets/media/svg/shapes/top-green.png" data-theme="light">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column text-white pt-15">
                                    <span class="fw-bold fs-1 mb-3">Curriculum Summary</span>
                                    <div class="fs-4 text-white">
                                        <span class="opacity-75">You have</span>
                                        <span class="position-relative d-inline-block">
                                            <a href="../../demo1/dist/pages/user-profile/projects.html"
                                                class="link-white opacity-75-hover fw-bold d-block mb-1">2224 </a>
                                            <!--begin::Separator-->
                                            <span
                                                class="position-absolute opacity-50 bottom-0 start-0 border-2 border-body border-bottom w-100"></span>
                                            <!--end::Separator-->
                                        </span>
                                        <span class="opacity-75">unutilized
                                            questions</span>
                                    </div>
                                </h3>
                                <!--end::Title-->

                            </div>
                            <!--end::Heading-->
                            <!--begin::Body-->
                            <div class="card-body mt-n20">
                                <!--begin::Stats-->
                                <div class="mt-n20 position-relative">
                                    <!--begin::Row-->
                                    <div class="row g-3 g-lg-6">
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <!--begin::Items-->
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-30px me-5 mb-8">
                                                    <span class="symbol-label">
                                                        <i class="fs-2 fa-solid fa-layer-group text-primary"></i>

                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Stats-->
                                                <div class="m-0">
                                                    <!--begin::Number-->
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">37</span>
                                                    <!--end::Number-->
                                                    <!--begin::Desc-->
                                                    <span class="text-gray-500 fw-semibold fs-6">
                                                        Subjects</span>
                                                    <!--end::Desc-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <!--begin::Items-->
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-30px me-5 mb-8">
                                                    <span class="symbol-label">
                                                        <i
                                                            class="fs-2 fa-solid fa-code-branch fa-rotate-90 text-primary"></i>
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Stats-->
                                                <div class="m-0">
                                                    <!--begin::Number-->
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">85</span>
                                                    <!--end::Number-->
                                                    <!--begin::Desc-->
                                                    <span class="text-gray-500 fw-semibold fs-6">Topics</span>
                                                    <!--end::Desc-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <!--begin::Items-->
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-30px me-5 mb-8">
                                                    <span class="symbol-label">
                                                        <i class="fs-2 fa-solid fa-clipboard-question text-primary"></i>
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Stats-->
                                                <div class="m-0">
                                                    <!--begin::Number-->
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">15,247</span>
                                                    <!--end::Number-->
                                                    <!--begin::Desc-->
                                                    <span class="text-gray-500 fw-semibold fs-6">Questions</span>
                                                    <!--end::Desc-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <!--begin::Items-->
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-30px me-5 mb-8">
                                                    <span class="symbol-label">
                                                        <i class="fs-2 fa-solid fa-gear text-primary"></i>
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Stats-->
                                                <div class="m-0">
                                                    <!--begin::Number-->
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">82</span>
                                                    <!--end::Number-->
                                                    <!--begin::Desc-->
                                                    <span class="text-gray-500 fw-semibold fs-6">Configurations</span>
                                                    <!--end::Desc-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Lists Widget 19-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-xl-4 mb-xl-10">
                        <!--begin::List widget 20-->
                        <div class="card h-xl-100">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">Topics</span>
                                    <span class="text-muted mt-1 fw-semibold fs-7">85 topics available</span>
                                </h3>
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-light">Add Topic</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-6">
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-danger text-inverse-danger">M</div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../../demo1/dist/pages/user-profile/overview.html"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">UI/UX Design</a>
                                            <span class="text-muted fw-semibold d-block fs-7">40+ Questions</span>
                                        </div>
                                        <!--end:Author-->
                                        <!--begin::Actions-->
                                        <a href="#"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="fa-solid fa-arrow-right p-0"></i>
                                        </a>
                                        <!--begin::Actions-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-success text-inverse-success">Q
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../../demo1/dist/pages/user-profile/overview.html"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">QA Analysis</a>
                                            <span class="text-muted fw-semibold d-block fs-7">18 Questions</span>
                                        </div>
                                        <!--end:Author-->
                                        <!--begin::Actions-->
                                        <a href="#"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="fa-solid fa-arrow-right p-0"></i>
                                        </a>
                                        <!--begin::Actions-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-info text-inverse-info">W</div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../../demo1/dist/pages/user-profile/overview.html"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">Web
                                                Development</a>
                                            <span class="text-muted fw-semibold d-block fs-7">120+ Questions</span>
                                        </div>
                                        <!--end:Author-->
                                        <!--begin::Actions-->
                                        <a href="#"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="fa-solid fa-arrow-right p-0"></i>
                                        </a>
                                        <!--begin::Actions-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-primary text-inverse-primary">M
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../../demo1/dist/pages/user-profile/overview.html"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">Marketing</a>
                                            <span class="text-muted fw-semibold d-block fs-7">50+ Questions.</span>
                                        </div>
                                        <!--end:Author-->
                                        <!--begin::Actions-->
                                        <a href="#"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="fa-solid fa-arrow-right p-0"></i>
                                        </a>
                                        <!--begin::Actions-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-warning text-inverse-warning">P
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../../demo1/dist/pages/user-profile/overview.html"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">Philosophy</a>
                                            <span class="text-muted fw-semibold d-block fs-7">24+ Questions</span>
                                        </div>
                                        <!--end:Author-->
                                        <!--begin::Actions-->
                                        <a href="#"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="fa-solid fa-arrow-right p-0"></i>
                                        </a>
                                        <!--begin::Actions-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-dark text-inverse-dark">M</div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../../demo1/dist/pages/user-profile/overview.html"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">Mathematics</a>
                                            <span class="text-muted fw-semibold d-block fs-7">24+ Questions</span>
                                        </div>
                                        <!--end:Author-->
                                        <!--begin::Actions-->
                                        <a href="#"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="fa-solid fa-arrow-right p-0"></i>
                                        </a>
                                        <!--begin::Actions-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::List widget 20-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-4 mb-xl-10">
                        <!--begin::List widget 20-->
                        <div class="card h-xl-100">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">Configurations</span>
                                    <span class="text-muted mt-1 fw-semibold fs-7">82 configurations available</span>
                                </h3>
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-light">Add Configuration</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-6">
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px symbol-circle me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-danger text-inverse-danger">M</div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../../demo1/dist/pages/user-profile/overview.html"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">UI/UX Design</a>
                                            <span class="text-muted fw-semibold d-block fs-7">40 Questions</span>
                                        </div>
                                        <!--end:Author-->
                                        <!--begin::Actions-->
                                        <a href="#"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="fa-solid fa-arrow-right p-0"></i>
                                        </a>
                                        <!--begin::Actions-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px symbol-circle me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-success text-inverse-success">Q
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../../demo1/dist/pages/user-profile/overview.html"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">QA Analysis</a>
                                            <span class="text-muted fw-semibold d-block fs-7">18 Questions</span>
                                        </div>
                                        <!--end:Author-->
                                        <!--begin::Actions-->
                                        <a href="#"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="fa-solid fa-arrow-right p-0"></i>
                                        </a>
                                        <!--begin::Actions-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px symbol-circle me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-info text-inverse-info">W</div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../../demo1/dist/pages/user-profile/overview.html"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">Web
                                                Development</a>
                                            <span class="text-muted fw-semibold d-block fs-7">120 Questions</span>
                                        </div>
                                        <!--end:Author-->
                                        <!--begin::Actions-->
                                        <a href="#"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="fa-solid fa-arrow-right p-0"></i>
                                        </a>
                                        <!--begin::Actions-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px symbol-circle me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-primary text-inverse-primary">M
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../../demo1/dist/pages/user-profile/overview.html"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">Marketing</a>
                                            <span class="text-muted fw-semibold d-block fs-7">50 Questions.</span>
                                        </div>
                                        <!--end:Author-->
                                        <!--begin::Actions-->
                                        <a href="#"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="fa-solid fa-arrow-right p-0"></i>
                                        </a>
                                        <!--begin::Actions-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px symbol-circle me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-warning text-inverse-warning">P
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../../demo1/dist/pages/user-profile/overview.html"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">Philosophy</a>
                                            <span class="text-muted fw-semibold d-block fs-7">24 Questions</span>
                                        </div>
                                        <!--end:Author-->
                                        <!--begin::Actions-->
                                        <a href="#"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="fa-solid fa-arrow-right p-0"></i>
                                        </a>
                                        <!--begin::Actions-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px symbol-circle me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-dark text-inverse-dark">M</div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../../demo1/dist/pages/user-profile/overview.html"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">Mathematics</a>
                                            <span class="text-muted fw-semibold d-block fs-7">24 Questions</span>
                                        </div>
                                        <!--end:Author-->
                                        <!--begin::Actions-->
                                        <a href="#"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="fa-solid fa-arrow-right p-0"></i>
                                        </a>
                                        <!--begin::Actions-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::List widget 20-->
                    </div>
                    <!--end::Col-->

                </div>
            </div>
        </div>
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">{{ \Carbon\Carbon::now()->year }}&copy; Amrita
                        Vishwa Vidyapeetham. All Rights Reserved.</span>

                </div>
                <!--end::Copyright-->

            </div>
            <!--end::Footer container-->
        </div>
    </div>
</div>
</div>
@endsection