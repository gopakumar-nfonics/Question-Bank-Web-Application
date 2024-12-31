@extends('layouts.admin')

@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main" data-select2-id="select2-data-kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-122-9irx">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Configure Question Paper
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
                                <form id="kt_question_form" method="POST" action="{{ route('question.config') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="questions" id="questionsInput">

                                    <div class="row mb-6">
                                        <div class="col-lg-7">
                                            <div class="fv-row mt-5">
                                                <div class="fs-6 fw-bold text-gray-700 col-lg-12">
                                                    <label class="required form-label">Subject</label>
                                                    <select name="q_subject" id="q_subject" class="form-control mb-2 @error('q_subject') is-invalid @enderror">
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

                                        <div class="col-lg-3 fv-row">
                                            <div class="col-lg-12 fv-row">
                                                <label class="col-lg-12 col-form-label required fw-semibold fs-6">No.Of Questions</label>
                                                <input type="number" name="sub_name" class="form-control form-control-lg @error('sub_name') is-invalid @enderror" placeholder="No.Of Questions" />
                                                @error('sub_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-5 flex-grow justify-content-between">
                                        <div class="col-lg-5">
                                            <div class="fv-row mt-5">
                                                <div class="fs-6 fw-bold text-gray-700 col-lg-12">
                                                    <label class="required form-label">Topic</label>
                                                    <select name="q_topic" id="q_topic" class="form-control mb-2 @error('q_topic') is-invalid @enderror">
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
                                                    <label class="required form-label">Difficulty Level</label>
                                                    <select name="difficulty_level" id="difficulty_level" class="form-control mb-2 @error('difficulty_level') is-invalid @enderror">
                                                        <option value="">Select Level</option>
                                                        @foreach($difficultyLevels as $level)
                                                            <option value="{{ $level->id }}">{{ $level->difficulty_level }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('difficulty_level')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 fv-row">
                                            <div class="col-lg-12 fv-row">
                                                <label class="col-lg-12 col-form-label required fw-semibold fs-6">No.Of Questions</label>
                                                <input type="number" name="no_of_questions" id="no_of_questions" class="form-control form-control-lg" placeholder="No. Of Questions" />
                                                @error('sub_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-2 fv-row add-button-div">
                                            <button class="btn btn-sm btn-success w-150px mt-0 mb-1" data-kt-element="add-item" id="addRowBtn">Add</button>
                                        </div>
                                    </div>

                                    <!-- Table Section -->
                                    <table class="table table-bordered" id="questionsTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Topic</th>
                                                <th>Difficulty Level</th>
                                                <th>No. Of Questions</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Rows will be dynamically added here -->
                                        </tbody>
                                    </table>

                                    <!-- Submit Button -->
                                    <div class="row pe-0 pb-5">
                                        <div class="col-lg-12 text-end d-flex justify-content-end border-top mt-10 pt-5">
                                            <button type="submit" class="btn btn-primary">Save Configuration</button>
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

document.getElementById('addRowBtn').addEventListener('click', function(e) {
    e.preventDefault();

    // Get input values
    const subjectId = document.getElementById('q_subject').value;
    const topicSelect = document.getElementById('q_topic');
    const topicId = topicSelect.value; // The selected topic ID
    const topicName = topicSelect.selectedOptions[0].text; // The displayed topic name
    const difficultySelect = document.getElementById('difficulty_level');
    const difficultyLevelId = difficultySelect.value; // The selected difficulty level ID
    const difficultyLevelName = difficultySelect.selectedOptions[0].text; // The displayed difficulty level name
    const noOfQuestions = parseInt(document.getElementById('no_of_questions').value);

    if (!subjectId || !topicId || !difficultyLevelId || isNaN(noOfQuestions)) {
        alert('Please fill all fields.');
        return;
    }

    // Find table and tbody
    const table = document.getElementById('questionsTable');
    const tbody = table.querySelector('tbody');
    let rowExists = false;

    // Check if a row with the same topic and difficulty level exists
    tbody.querySelectorAll('tr').forEach((row) => {
        const rowTopicName = row.querySelector('td:nth-child(2)').innerText;
        const rowDifficultyLevelName = row.querySelector('td:nth-child(3)').innerText;

        if (rowTopicName === topicName && rowDifficultyLevelName === difficultyLevelName) {
            // Update the existing row
            const currentQuestions = parseInt(row.querySelector('td:nth-child(4)').innerText);
            const updatedQuestions = currentQuestions + noOfQuestions;
            row.querySelector('td:nth-child(4)').innerText = updatedQuestions;

            rowExists = true;
        }
    });

    // If no matching row exists, add a new row
    if (!rowExists) {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${tbody.querySelectorAll('tr').length + 1}</td>
            <td>${topicName}</td>
            <td>${difficultyLevelName}</td>
            <td>${noOfQuestions}</td>
            <td><button class="btn btn-danger btn-sm remove-btn">Remove</button></td>
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
        });
    }

    // Clear input fields
    document.getElementById('difficulty_level').value = '';
    document.getElementById('no_of_questions').value = '';

    updateTableIndex(tbody);
});

// Update table row indices
function updateTableIndex(tbody) {
    tbody.querySelectorAll('tr').forEach((row, index) => {
        row.querySelector('td:first-child').innerText = index + 1;
    });
}

document.getElementById('kt_question_form').addEventListener('submit', function(e) {
    // Collect all rows data
    const rowsData = [];
    const rows = document.querySelectorAll('#questionsTable tbody tr');
    
    rows.forEach(row => {
        const subjectId = row.getAttribute('data-subject-id');
        const topicId = row.getAttribute('data-topic-id');
        const difficultyLevelId = row.getAttribute('data-difficulty-level-id');
        const topicName = row.querySelector('td:nth-child(2)').innerText;
        const difficultyLevelName = row.querySelector('td:nth-child(3)').innerText;
        const noOfQuestions = row.querySelector('td:nth-child(4)').innerText;

        rowsData.push({
            subject_id: subjectId,
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
});


</script>
@endsection
