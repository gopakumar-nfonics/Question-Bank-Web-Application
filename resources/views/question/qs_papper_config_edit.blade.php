@extends('layouts.admin')

@section('content')
<style>
    /* Hide the table initially */
    #questionsTable {
        display: none;
    }
</style>

<div class="app-main flex-column flex-row-fluid" id="kt_app_main" data-select2-id="select2-data-kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-122-9irx">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Edit Question Paper Template
                    </h1>
                </div>
            </div>
        </div>
        <!--end::Toolbar-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                        <div class="card">
                            <div class="card-body p-12">
                                <div class="overlay" id="loaderOverlay">
                                    <div class="loader"></div>
                                </div>
                                <!--begin::Form-->
                                <form id="kt_question_form" method="POST" action="{{route('questionconfig.update',$config->id)}}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="questions" id="questionsInput">
                                    <input type="hidden" name="tid" id="tid" value="{{$config->id}}">

                                    <div class="row mb-5 flex-grow ">
                                        <div class="col-lg-7">
                                            <div class="fv-row mt-5">
                                                <div class="fs-6 fw-bold text-gray-700 col-lg-12">
                                                    <label class="required form-label"> Question Paper Template
                                                        Title</label>
                                                    <input type="text" id="paper_title" name="paper_title"
                                                        class="form-control  @error('paper_title') is-invalid @enderror"
                                                        placeholder="Question Paper Template Title" value="{{ old('paper_title', $config->qt_title ?? '') }}" />

                                                    <div class="invalid-feedback" id="papper_ttl_error"></div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 fv-row">
                                            <div class="col-lg-12 fv-row">
                                                <label class="col-lg-12 col-form-label required fw-semibold fs-6">Total
                                                    Count</label>
                                                <input type="number" id="total_num_questions" name="total_num_questions"
                                                    class="form-control  @error('total_num_questions') is-invalid @enderror"
                                                    placeholder="Total Count" value="{{ old('total_num_questions', $config->qt_no_of_questions ?? '') }}" />

                                                <div class="invalid-feedback" id="question_ttl_error"></div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 fv-row">
                                            <div class="d-flex align-items-center flex-column mt-3 w-100 pt-10">
                                                <div
                                                    class="d-flex justify-content-between fw-bold fs-6  w-100 mt-auto mb-2">
                                                    <span> <span id="progress-numerator">{{$config->qt_no_of_questions}}</span>/<span
                                                            id="progress-denominator">{{$config->qt_no_of_questions}}</span></span>
                                                    <span><span id="progress-percentage">100%</span></span>
                                                </div>
                                                <div class="h-8px mx-3 w-100 bg-light-danger rounded">
                                                    <div class="bg-success rounded h-8px" id="progress-bar"
                                                        role="progressbar" style="width: 100%;" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="fs-7 text-muted mt-1">Enter the title and specify the total number
                                            of questions for it.</span>
                                    </div>

                                    <div class="row mb-5 flex-grow ">


                                        <div class="col-lg-3">
                                            <div class="fv-row mt-5">
                                                <div class="fs-6 fw-bold text-gray-700 col-lg-12">
                                                    <label class="required form-label">Subject</label>
                                                    <select name="q_subject" id="q_subject"
                                                        class="form-control mb-2 @error('q_subject') is-invalid @enderror">
                                                        <option value="">Select Subject</option>
                                                        @foreach($subjects as $sub)
                                                        <option value="{{ $sub->id }}">{{ $sub->sub_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('q_subject')
                                                    <div class="questions">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fv-row mt-5">
                                                <div class="fs-6 fw-bold text-gray-700 col-lg-12">
                                                    <label class="required form-label">Topic</label>
                                                    <select name="q_topic" id="q_topic"
                                                        class="form-control mb-2 @error('q_topic') is-invalid @enderror">
                                                        <option value="">Select Topic</option>
                                                    </select>
                                                    @error('q_topic')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="fv-row mt-5">
                                                <div class="fs-6 fw-bold text-gray-700 col-lg-12">
                                                    <label class="required form-label">Level</label>
                                                    <select name="difficulty_level" id="difficulty_level"
                                                        class="form-control mb-2 @error('difficulty_level') is-invalid @enderror">
                                                        <option value="">Select</option>
                                                        @foreach($difficultyLevels as $level)
                                                        <option value="{{ $level->id }}">{{ $level->difficulty_level }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('difficulty_level')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 fv-row">
                                            <div class="col-lg-12 fv-row">
                                                <label
                                                    class="col-lg-12 col-form-label required fw-semibold fs-6">Count</label>
                                                <input type="number" name="no_of_questions" id="no_of_questions"
                                                    class="form-control" placeholder="Count" />
                                                @error('sub_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-1 fv-row add-button-div">
                                            <button class="btn btn-sm btn-success w-75px mt-0"
                                                data-kt-element="add-item" id="addRowBtn" disabled>Add</button>
                                        </div>
                                        <span class="fs-7 text-muted mt-1">Select the subject, topic, and difficulty
                                            level, specify the number of questions, and click the 'Add' button to
                                            include them in the Template table.</span>

                                    </div>
                                    <div class="row mb-5 mt-10 flex-grow ">
                                        <div class="col-lg-12">
                                            <!-- Table Section -->
                                            <table class="table table-bordered" id="questionsTable" style="display:block;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="w-350px">Subject</th>
                                                        <th class="w-350px">Topic</th>
                                                        <th>Level</th>
                                                        <th>Count</th>
                                                        <th></th>
                                                    </tr>
                                                     </thead>
                                                <tbody>
                                                    <!-- Rows will be dynamically added here -->
                                                    @foreach ($templatedetails as $key => $detail)
                                                    <tr  data-subject-id="{{$detail->qd_subject_id}}" data-topic-id="{{$detail->qd_topic_id}}" data-difficulty-level-id="{{$detail->qd_difficulty_level}}">
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{$detail->subject->sub_name}}</td>
                                                    <td>{{$detail->topic->topic_name}}</td>
                                                    <td>{{$detail->difficultyLevel->difficulty_level}}</td>
                                                    <td>{{$detail->qd_no_of_questions}}</td>
                                                    <td><button class="remove-btn btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">Remove</button></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="row pe-0 pb-5">
                                        <div
                                            class="col-lg-12 text-end d-flex justify-content-end border-top mt-10 pt-5">
                                            <button type="submit" class="btn btn-primary">Save
                                                Template</button>
                                        </div>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageScripts')

<script>
    document.getElementById('q_subject').addEventListener('change', function() {
        const subjectId = this.value;
        const topicDropdown = document.getElementById('q_topic');
        topicDropdown.innerHTML = '<option value="">Select Topic</option>'; // Reset topics

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

    document.addEventListener('DOMContentLoaded', () => {

        const fields = ['q_subject', 'q_topic', 'difficulty_level', 'no_of_questions'];
        const addRowBtn = document.getElementById('addRowBtn');
        const submitBtn = document.querySelector('button[type="submit"]');
        const progressBar = document.getElementById('progress-bar');

        // Enable the Add Row button if all fields are filled
        fields.forEach(field => {
            document.getElementById(field).addEventListener('input', validateFields);
            document.getElementById(field).addEventListener('change', validateFields);
        });

        function validateFields() {
            const subject = document.getElementById('q_subject').value;
            const topic = document.getElementById('q_topic').value;
            const level = document.getElementById('difficulty_level').value;
            const count = document.getElementById('no_of_questions').value;

            if (subject && topic && level && count) {
                addRowBtn.disabled = false;
            } else {
                addRowBtn.disabled = true;
            }
        }


        // Update progress bar
        function updateProgressBar() {
            const totalQuestions = parseInt(document.getElementById('total_num_questions').value) || 0;
            let addedQuestions = 0;

            document.querySelectorAll('#questionsTable tbody tr').forEach(row => {
                const questions = parseInt(row.querySelector('td:nth-child(5)').innerText) || 0;
                addedQuestions += questions;
            });

            const percentage = totalQuestions > 0 ? (addedQuestions / totalQuestions) * 100 : 0;

            document.getElementById('progress-numerator').innerText = addedQuestions;
            document.getElementById('progress-denominator').innerText = totalQuestions;
            document.getElementById('progress-percentage').innerText = `${Math.round(percentage)}%`;

            const progressBar = document.getElementById('progress-bar');
            const progressContainer = progressBar.parentElement;

            // Remove existing classes
            progressBar.classList.remove('bg-danger', 'bg-warning', 'bg-info');
            progressContainer.classList.remove('bg-light-danger', 'bg-light-warning', 'bg-light-info');

            // Add classes based on percentage
            if (percentage < 25) {
                progressBar.classList.add('bg-danger');
                progressContainer.classList.add('bg-light-danger');
            } else if (percentage < 50) {
                progressBar.classList.add('bg-warning');
                progressContainer.classList.add('bg-light-warning');
            } else if (percentage < 75) {
                progressBar.classList.add('bg-info');
                progressContainer.classList.add('bg-light-info');
            } else {
                progressBar.classList.add('bg-success'); // Optional for >= 75%
                progressContainer.classList.add('bg-light-success'); // Optional for >= 75%
            }

            progressBar.style.width = `${percentage}%`;

            submitBtn.disabled = Math.round(percentage) !== 100;
        }


        document.getElementById('addRowBtn').addEventListener('click', function(e) {
            e.preventDefault();

            // Get input values
            const subjectSelect = document.getElementById('q_subject');
            const subjectId = subjectSelect.value;
            const subjectName = subjectSelect.selectedOptions[0].text; // The displayed subject name
            const topicSelect = document.getElementById('q_topic');
            const topicId = topicSelect.value;
            const topicName = topicSelect.selectedOptions[0].text;
            const difficultySelect = document.getElementById('difficulty_level');
            const difficultyLevelId = difficultySelect.value;
            const difficultyLevelName = difficultySelect.selectedOptions[0].text;
            const noOfQuestions = parseInt(document.getElementById('no_of_questions').value);

            if (!subjectId || !topicId || !difficultyLevelId || isNaN(noOfQuestions)) {
                alert('Please complete all fields before proceeding.');
                return;
            }

            // Find table and tbody
            const table = document.getElementById('questionsTable');
            const tbody = table.querySelector('tbody');
            let rowExists = false;

            // Check if a row with the same subject, topic, and difficulty level exists
            tbody.querySelectorAll('tr').forEach((row) => {
                const rowSubjectName = row.querySelector('td:nth-child(2)').innerText;
                const rowTopicName = row.querySelector('td:nth-child(3)').innerText;
                const rowDifficultyLevelName = row.querySelector('td:nth-child(4)').innerText;

                if (rowSubjectName === subjectName && rowTopicName === topicName &&
                    rowDifficultyLevelName ===
                    difficultyLevelName) {
                    // Update the existing row
                    const currentQuestions = parseInt(row.querySelector('td:nth-child(5)')
                        .innerText);
                    const updatedQuestions = currentQuestions + noOfQuestions;
                    row.querySelector('td:nth-child(5)').innerText = updatedQuestions;

                    rowExists = true;
                }
            });

            // If no matching row exists, add a new row
            if (!rowExists) {
                const row = document.createElement('tr');
                row.innerHTML = `
            <td>${tbody.querySelectorAll('tr').length + 1}</td>
            <td>${subjectName}</td>
            <td>${topicName}</td>
            <td>${difficultyLevelName}</td>
            <td>${noOfQuestions}</td>
            <td><button class="remove-btn btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">Remove</button></td>
        `;

                // Store the subject ID, topic ID, and difficulty level ID as custom attributes
                row.setAttribute('data-subject-id', subjectId);
                row.setAttribute('data-topic-id', topicId);
                row.setAttribute('data-difficulty-level-id', difficultyLevelId);

                tbody.appendChild(row);

                // Add remove functionality to the new row
                row.querySelector('.remove-btn').addEventListener('click', function() {
                    row.remove();
                    updateTableIndex(tbody);
                    // Hide the table if no rows remain
                    if (tbody.querySelectorAll('tr').length === 0) {
                        table.style.display = 'none';
                    }

                    updateProgressBar();
                });
            }

            // Show the table if it's hidden
            table.style.display = 'table';

            // Clear input fields
            document.getElementById('difficulty_level').value = '';
            document.getElementById('no_of_questions').value = '';
            addRowBtn.disabled = true;

            updateTableIndex(tbody);

            updateProgressBar();
        });


        // Update the denominator as the user types in total_num_questions
        document.getElementById('total_num_questions').addEventListener('input', function() {
            const totalQuestions = parseInt(this.value) || 0;
            document.getElementById('progress-denominator').innerText = totalQuestions;
            updateProgressBar(); // Update the progress bar whenever the total changes
        });



        const tableBody = document.querySelector('#questionsTable tbody');

    // Handle click on remove button
    tableBody.addEventListener('click', function(event) {
        // Check if the clicked element is a remove button
        if (event.target && event.target.classList.contains('remove-btn')) {
            // Get the row to remove
            const row = event.target.closest('tr');
            
            // Remove the row
            row.remove();
            
            // Optionally, update row indices after removal
            updateTableIndex(tableBody);
            updateProgressBar();
        }
    });

    });

    // Update table row indices
    function updateTableIndex(tbody) {
        tbody.querySelectorAll('tr').forEach((row, index) => {
            row.querySelector('td:first-child').innerText = index + 1;
        });
    }


    document.getElementById('kt_question_form').addEventListener('submit', async function(e) {
        // Collect all rows data
        e.preventDefault();
        const rowsData = [];
        const rows = document.querySelectorAll('#questionsTable tbody tr');

        const paperTitle = document.getElementById('paper_title').value.trim();
        const totalQuestions = document.getElementById('total_num_questions').value.trim();

        // Validate if paper_title is filled
        if (!paperTitle) {
            //alert('Paper title is required.');
            $('#papper_ttl_error').show();
            $('#papper_ttl_error').text('Paper title is required.');
            return;
        }

        // Validate if total number of questions is filled
        if (!totalQuestions) {
            //alert('Total number of questions is required.');
            $('#question_ttl_error').show();
            $('#question_ttl_error').text('Total number of questions is required.')
            return;
        }

        // Check if paper_title is unique via an AJAX request
        const isUnique = await checkPaperTitleUnique(paperTitle);
        if (!isUnique) {
            //alert('Paper title must be unique.');
            $('#papper_ttl_error').show();
            $('#papper_ttl_error').text('Paper title must be unique.')
            return;
        }

        rows.forEach(row => {

            const paper_title = document.getElementById('paper_title').value;
            const subjectId = row.getAttribute('data-subject-id');
            const total_num_quetion = document.getElementById('total_num_questions').value;
            const topicId = row.getAttribute('data-topic-id');
            const difficultyLevelId = row.getAttribute('data-difficulty-level-id');
            const topicName = row.querySelector('td:nth-child(3)').innerText;
            const difficultyLevelName = row.querySelector('td:nth-child(4)').innerText;
            const noOfQuestions = row.querySelector('td:nth-child(5)').innerText;

            rowsData.push({
                paper_title: paper_title,
                subject_id: subjectId,
                total_num_quetion: total_num_quetion,
                topic_id: topicId, // Save the topic ID
                difficulty_level_id: difficultyLevelId, // Save the difficulty level ID
                no_of_questions: noOfQuestions,
                topic_name: topicName, // Optional, if you need the name
                difficulty_level_name: difficultyLevelName, // Optional, if you need the name
            });
        });

        // Check if rows are added
        if (rowsData.length === 0) {
            alert('Please add at least one row to save.');
            e.preventDefault(); // Prevent form submission
            return;
        }

        // Set the rows data to the hidden input
        document.getElementById('questionsInput').value = JSON.stringify(rowsData);
        e.target.submit();
    });




    async function checkPaperTitleUnique(paperTitle) {

        const tid = document.getElementById('tid').value.trim();

        try {
            const response = await fetch('/check-paper-title-unique', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    paper_title: paperTitle,
                    tid: tid,
                }),
            });

            const result = await response.json();
            return result.isUnique;
        } catch (error) {
            console.error('Error checking paper title uniqueness:', error);
            return false; // Default to false to prevent submission in case of error
        }
    }


    $(document).ready(function() {
        // Clear question total error
        $('#total_num_questions').on('input', function() {
            $('#question_ttl_error').hide();
            $('#question_ttl_error').text('');
        });

        // Clear paper title error
        $('#paper_title').on('input', function() {
            $('#papper_ttl_error').hide();
            $('#papper_ttl_error').text('');
        });
    });


   
</script>

@endsection