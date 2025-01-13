@extends('layouts.admin')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Question Paper List</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <!-- <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
											
										</ul> -->
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Button-->
            <div class="card-toolbar">

                <a href="{{ route('question.qspgeneration') }}" class="btn btn-sm btn-primary">
                    Generate
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
                                <tr class="fw-bold">
                                    <th class="w-25px no-sort">#</th>
                                    <th class="w-25px no-sort">
                                        <input type="checkbox" class="papper-check form-check-input" id="select-all">
                                    </th>
                                    <th class="min-w-200px">Code</th>
                                    <th class="min-w-300px">Title</th>
                                    <th class="min-w-150px">Generated On</th>
                                    <th class="min-w-100px text-center">Actions</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @forelse($questionpapper as $key => $papper)
                                <tr>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-400 d-block fs-6">
                                                {{ $key+1 }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="papper-check form-check-input select-paper"
                                            data-qp-code="{{ $papper['qp_code'] }}">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="fw-400 d-block fs-6">
                                                    {{ucfirst($papper['qp_code'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="fw-400 d-block fs-6">
                                                    {{ucfirst($papper['qp_title'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="fw-400 d-block fs-6">
                                                    {{ \Carbon\Carbon::parse($papper['created_at'])->format('d-M-Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>


                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="fa-solid fa-angle-down"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="javascript:void(0)" onclick="removePaper('{{$papper->qp_id}}')" class="menu-link px-3"
                                                    data-kt-customer-table-filter="delete_row">Delete</a>
                                            </div>

                                            <div class="menu-item px-3">
                                                <a href="{{ url('/download/question-paper/' . $papper['qp_code'] . '.docx') }}"
                                                    class="menu-link px-3">Download</a>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
$(document).ready(function() {
    $('#subjecttable').DataTable({
        "iDisplayLength": 10,
        "searching": true,
        "recordsTotal": 3615,
        "pagingType": "full_numbers",
        "columnDefs": [{
            "targets": "_all",
            "orderable": false
        }],

        dom: '<"d-flex justify-content-between"<"left-controls"l><"center-controls"c><"right-controls"f>>tip'

    });

    $("div.center-controls").html(`
        <button id="download-selected" class="btn btn-sm btn-primary" onclick="downloadSelected()" style="display: none;">
            Download Question Paper
        </button>
    `);
});
</script>
<script>
function removePaper(paperId) {
    swal({
            title: "Are you sure?",
            text: "You want to remove this subject",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ route('question.deleteQuestionPaper') }}",
                    type: 'POST', // Use DELETE HTTP method
                    data: {
                        _token: '{{ csrf_token() }}' ,
                        qp_id: paperId,
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
<script>
$(document).ready(function() {

    $('.select-paper').change(function() {
        toggleDownloadButton();
    });


    $('#select-all').change(function() {
        var isChecked = $(this).prop('checked');


        $('.select-paper').prop('checked', isChecked);

        toggleDownloadButton();
    });


    function toggleDownloadButton() {
        if ($('.select-paper:checked').length > 0) {
            $('#download-selected').show();
        } else {
            $('#download-selected').hide();
        }
    }


});
</script>

<script>
function downloadSelected() {
    var selectedFiles = [];
    $('.select-paper:checked').each(function() {
        selectedFiles.push($(this).data('qp-code'));
    });

    if (selectedFiles.length === 0) {
        alert('Please select at least one question paper to download.');
        return;
    }

    $.ajax({
        url: '{{ route("bulk-download") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            files: selectedFiles
        },
        success: function(response) {
            if (response.success) {
                response.files.forEach(function(file) {
                    var link = document.createElement('a');
                    link.href = file.url;
                    link.target = '_blank';
                    link.download = file.name;
                    link.click();
                });
            } else {
                alert(response.message || 'Something went wrong.');
            }
        },
        error: function() {
            alert('Error occurred while downloading files.');
        }
    });
}
</script>


@endsection