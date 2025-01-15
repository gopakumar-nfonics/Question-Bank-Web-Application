@extends('layouts.admin')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Question
                    Report
                </h1>

            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-5 mb-xl-8">
                <div class="card-body py-3">
                    <div class="table-responsive">

                        <!-- Filters -->
                        <div class="row mb-4 mt-10">
                            <div class="col-md-5">
                                <select id="subjectFilter" class="form-select">
                                    <option value="">All Subjects</option>
                                    @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->sub_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-5">
                                <select id="topicFilter" class="form-select">
                                    <option value="">All Topics</option>

                                </select>
                            </div>

                            <div class="col-md-2">
                                <select id="difficultyFilter" class="form-select">
                                    <option value="">All Level</option>
                                    @foreach($difficultyLevels as $level)
                                    <option value="{{ $level->id }}">{{ $level->difficulty_level }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>

                        <!-- Filters -->
                        <div class="row mb-4 pt-5">
                            <div class="col-md-5">
                                <select id="qp_managers" class="form-select">
                                    <option value="">All QP Managers</option>
                                    @foreach($qpmanagers as $qpm)
                                    <option value="{{ $qpm->id }}">{{ $qpm->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <select id="used_status" class="form-select">
                                    <option value="">All</option>
                                    <option value="used">Used</option>
                                    <option value="notused">Not Used</option>

                                </select>
                            </div>


                            <!--<div class="col-md-3">
                                <button id="exportBtn" class="btn btn-success">
                                    <i class="fa fa-file-excel"></i> Export as Excel
                                </button>
                            </div>-->
                        </div>


                        <!-- Table -->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                            id="subjecttable">
                            <thead>
                                <tr class="fw-bold fs-6">
                                    <th class="w-50px">#</th>
                                    <th class="min-w-200px">Question & Answer</th>
                                    <th class="min-w-150px">Subject & Topic</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageScripts')

<script>
document.getElementById('subjectFilter').addEventListener('change', function() {
    const subjectId = this.value;
    const topicDropdown = document.getElementById('topicFilter');
    topicDropdown.innerHTML = '<option value="">All Topics</option>'; // Reset topics

    if (subjectId) {
        fetch(`/topics/${subjectId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(topic => {
                    const option = document.createElement('option');
                    option.value = topic.topic_id;
                    option.textContent = topic.topic_name;
                    topicDropdown.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching topics:', error);
            });
    }
});
</script>

<script>
$(document).ready(function() {
    $('#subjecttable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('report.fetchdata') }}",
            type: 'POST',
            data: function(d) {
                d._token = '{{ csrf_token() }}';
                d.subject = $('#subjectFilter').val();
                d.topic = $('#topicFilter').val();
                d.difficulty = $('#difficultyFilter').val();
                d.qp_managers = $('#qp_managers').val();
                d.used_status = $('#used_status').val();
            }
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'formatted_question',
                name: 'formatted_question'
            },
            {
                data: 'subject_topic',
                name: 'subject_topic'
            }
        ],
        searching: true, // ✅ Enable searching
        paging: true,
        ordering: true,
        iDisplayLength: 10,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        }
    });

    // Refresh the table when filters change
    $('#subjectFilter, #topicFilter, #difficultyFilter, #qp_managers, #used_status').change(function() {
        $('#subjecttable').DataTable().draw();
    });
});
</script>
@endsection