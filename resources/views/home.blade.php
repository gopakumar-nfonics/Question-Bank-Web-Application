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
                    <a href="{{ route('question.qspgeneration') }}" class="btn btn-sm fw-bold btn-primary">Generate Questions Paper</a>
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
                                        <span class="position-relative d-inline-block">
                                            <a href="{{ route('question.questionpaper') }}"
                                                class="link-white opacity-75-hover fw-bold d-block mb-1">{{number_format($qpaperCount)}} </a>
                                            <!--begin::Separator-->
                                            <span
                                                class="position-absolute opacity-50 bottom-0 start-0 border-2 border-body border-bottom w-100"></span>
                                            <!--end::Separator-->
                                        </span>
                                        <span class="opacity-75">Question Papers Generated
                                        </span>
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
                                            <a href="{{ route('subject.index') }}">
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
                                                            class="text-gray-700 fw-bolder d-block fs-2x lh-1 ls-n1 mb-1">{{number_format($subjectCount)}}</span>
                                                        <!--end::Number-->
                                                        <!--begin::Desc-->
                                                        <span class="text-gray-500 fw-semibold fs-6">
                                                            Subjects</span>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                            </a>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <a href="{{ route('topic.index') }}">
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
                                                            class="text-gray-700 fw-bolder d-block fs-2x lh-1 ls-n1 mb-1">{{number_format($topicCount)}}</span>
                                                        <!--end::Number-->
                                                        <!--begin::Desc-->
                                                        <span class="text-gray-500 fw-semibold fs-6">Topics</span>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Items-->
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <a href="{{ route('question.index') }}">
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
                                                            class="text-gray-700 fw-bolder d-block fs-2x lh-1 ls-n1 mb-1">{{number_format($questionCount)}}</span>
                                                        <!--end::Number-->
                                                        <!--begin::Desc-->
                                                        <span class="text-gray-500 fw-semibold fs-6">Questions</span>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Items-->
                                            </a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <a href="{{ route('question.configiration') }}">
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
                                                            class="text-gray-700 fw-bolder d-block fs-2x lh-1 ls-n1 mb-1">{{number_format($templateCount)}}</span>
                                                        <!--end::Number-->
                                                        <!--begin::Desc-->
                                                        <span class="text-gray-500 fw-semibold fs-6">Templates</span>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Items-->
                                            </a>
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
                                    <span class="text-muted mt-1 fw-semibold fs-7">{{number_format($topicCount)}} topics available</span>
                                </h3>
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="{{ route('topic.create') }}" class="btn btn-sm btn-light">Add</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-6 dash-cnt-list">
                                <!--begin::Item-->
                                @php
                                $colors = ['bg-danger', 'bg-success', 'bg-info', 'bg-primary', 'bg-warning', 'bg-dark'];
                                @endphp
                                @foreach ($topics as $index => $topic)
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold {{ $colors[$index % count($colors)] }} text-inverse-{{ str_replace('bg-', '', $colors[$index % count($colors)]) }}">{{ strtoupper(substr($topic->topic_name, 0, 1)) }}</div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="{{ route('topic.index') }}"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">{{ $topic->topic_name }}</a>
                                            <span class="text-muted fw-semibold d-block fs-7">{{ $topic->questions_count }} Questions</span>
                                        </div>
                                        <!--end:Author-->
                                        
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                @endforeach

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
                                    <span class="card-label fw-bold text-dark">Templates</span>
                                    <span class="text-muted mt-1 fw-semibold fs-7">{{number_format($templateCount)}} Templates available</span>
                                </h3>
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="{{ route('question.configure') }}" class="btn btn-sm btn-light">Add</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-6 dash-cnt-list">
                                <!--begin::Item-->

                                @foreach ($templates as $index => $template)
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px symbol-circle me-4">
                                        <div class="symbol-label fs-2 fw-semibold {{ $colors[$index % count($colors)] }} text-inverse-{{ str_replace('bg-', '', $colors[$index % count($colors)]) }}">{{ strtoupper(substr($template->qt_title, 0, 1)) }}</div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="{{ route('question.configiration') }}"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">{{ $template->qt_title }}</a>
                                            <span class="text-muted fw-semibold d-block fs-7">{{ $template->qt_no_of_questions }} Questions</span>
                                        </div>
                                        <!--end:Author-->
                                       
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                @endforeach

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