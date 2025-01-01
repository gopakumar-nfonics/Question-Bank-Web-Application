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
                        Generate Question Paper
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
                                <form id="kt_question_form" method="POST" action="{{ route('question.config') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="questions" id="questionsInput">

                                    <div class="row mb-5 flex-grow ">

                                        <div class="col-lg-4 fv-row">
                                            <div class="col-lg-12 fv-row">
                                                <label class="col-lg-12 col-form-label required fw-semibold fs-6">Paper
                                                    Code
                                                </label>
                                                <input type="text" id="total_num_questions" name="total_num_questions"
                                                    class="form-control form-control-lg @error('total_num_questions') is-invalid @enderror"
                                                    placeholder="Paper Code" />
                                                @error('total_num_questions')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
    <div class="fv-row mt-5">
        <div class="fs-6 fw-bold text-gray-700 col-lg-12">
            <label class="required form-label">Subject</label>
            <select name="q_subject[]" id="q_subject" multiple
                class="form-control mb-2 @error('q_subject') is-invalid @enderror">
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


                                        <span class="fs-7 text-muted mt-1">Input question paper code and select the
                                            subjects.</span>
                                    </div>


                                    <!-- Submit Button -->
                                    <div class="row pe-0 pb-5">
                                        <div
                                            class="col-lg-12 text-end d-flex justify-content-end border-top mt-10 pt-5">
                                            <button type="submit" class="btn btn-primary">Generate
                                                Question Paper</button>
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
</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#q_subject').select2({
            placeholder: "Select Subject",
            allowClear: true,
            closeOnSelect: false, // Ensures the dropdown doesn't close after a selection
        });
    });
</script>

@endsection