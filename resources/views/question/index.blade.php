@extends('layouts.admin')

@section('content')
<style>
    #subjecttable table td {
    border: 1px solid !important;
}
</style>
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Question
                    List</h1>
                <!--end::Title-->

                @if( !empty(Auth::user()->isPapersetter()) )
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-6 my-0 ">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted pt-3">
                        <a class="text-primary"> You are managing <span class="text-primary fw-bold">
                                {{ $questions->count() }}
                            </span>
                            questions.</a>
                    </li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
                @endif
            </div>
            <!--end::Page title-->
            <!--begin::Button-->
            <div class="card-toolbar">
                <a href="{{ route('question.create') }}" class="btn btn-sm btn-primary">
                    Add Question
                </a>
            </div>
            <!--end::Button-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <!-- <div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold fs-3 mb-1">Subject List</span>
											</h3>
										</div> -->
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                            id="subjecttable">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bold fs-6">
                                    <th class="w-50px">#</th>
                                    <th class="min-w-200px">Question & Answer</th>
                                    <!-- <th class="min-w-150px">Answer</th> -->
                                    <th class="min-w-150px">Subject & Topic</th>
                                    <!-- <th class="min-w-150px"></th>
                                    <th class="min-w-100px">Level</th>
                                     @if( !empty(Auth::user()->isAdmin()) )
                                    <th class="min-w-100px">Added By</th>
                                    @endif -->
                                    <th class="min-w-150px text-center">Actions</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>

                                @forelse($questions as $key => $question)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-400 d-block fs-6">
                                                {{ $key+1 }}
                                            </div>
                                        </div>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="fw-400 d-block fs-6 text-gray-800 fw-bold ">
                                                    {!!ucfirst($question->qs_question)!!}
                                                </div>
                                                <div class="fw-400 d-block fs-6 text-primary">
                                                    {!! ucfirst($question->correctAnswer->qo_options) !!}
                                                </div>

                                                <div class="fw-400 d-block text-muted mt-1 fw-bold fs-7">
                                                    @if( !empty(Auth::user()->isAdmin()) )
                                                    <i class="fa-solid fa-user fs-8 p-0 me-1"></i>
                                                    {{ ucfirst($question->creator->name) }} &nbsp;&nbsp;
                                                    @endif
                                                    <i class="fa-solid fa-calendar-days fs-8 p-0 me-1 ms-0"></i>

                                                    {{ \Carbon\Carbon::parse($question->created_at)->format('d-M-Y') }}
                                                </div>

                                            </div>
                                        </div>
                                    </td>

                                    <!-- <td>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-400 d-block fs-6">
                                                {!! ucfirst($question->correctAnswer->qo_options) !!}
                                            </div>
                                        </div>
                                    </td> -->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="fw-400 d-block fs-6 text-gray-800 fw-bold ">
                                                    {{ ucfirst($question->subject->sub_name) }}
                                                </div>
                                                <div class="fw-400 d-block fs-6 text-muted ">
                                                    {{ ucfirst($question->topic->topic_name) }}
                                                </div>
                                                <div class="fw-400 d-block fs-6">

                                                    <span
                                                        class="badge badge-light-{{$question->difficultylevel->difficulty_level_color}} fs-7 ps-0">
                                                        {{ ucfirst($question->difficultylevel->difficulty_level) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-400 d-block fs-6">
                                                {{ ucfirst($question->topic->topic_name) }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-400 d-block fs-6">
                                                {{ ucfirst($question->difficultylevel->difficulty_level) }}
                                            </div>
                                        </div>
                                    </td>
                                     @if( !empty(Auth::user()->isAdmin()) )
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-400 d-block fs-6">
                                                {{ ucfirst($question->creator->name) }}
                                            </div>
                                        </div>
                                    </td>
                                    @endif -->
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="fa-solid fa-angle-down"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{route('question.edit',$question->qs_id)}}"
                                                    class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="javascript:void(0)"
                                                    onclick="removeQuestion('{{$question->qs_id}}')"
                                                    class="menu-link px-3"
                                                    data-kt-customer-table-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No data found</td>
                                </tr>
                                @endforelse


                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageScripts')

<script>
$(document).ready(function() {
    $('#subjecttable').DataTable({
        "iDisplayLength": 10,
        "searching": true,
        "recordsTotal": 3615,
        "pagingType": "full_numbers"
    });
});
</script>
<script>
function removeQuestion(questionId) {
    swal({
            title: "Are you sure?",
            text: "You want to remove this Question",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "/question/" + questionId,
                    type: 'DELETE', // Use DELETE HTTP method
                    data: {
                        _token: '{{ csrf_token() }}' // Include the CSRF token for security
                    },
                    success: function(response) {
                        if (response.success) {
                            swal(response.success, {
                                icon: "success",
                                buttons: false,
                            });
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        } else {
                            swal(response.error || 'Something went wrong.', {
                                icon: "warning",
                                buttons: false,
                            });
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    },
                    error: function(xhr) {
                        swal('Error: Something went wrong.', {
                            icon: "error",
                        }).then(() => {
                            location.reload();
                        });
                    }
                });
            }
        });
}
</script>

@endsection