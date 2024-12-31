@extends('layouts.admin')

@section('content')
<style>
input[type="radio"]:checked {
    background-color: green;
    border-color: green;
}

/* Optionally, change the label color when the radio button is checked */
input[type="radio"]:checked+.form-check-label {
    color: green;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.15.0/katex.min.css">
<div class="app-main flex-column flex-row-fluid" id="kt_app_main" data-select2-id="select2-data-kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-122-9irx">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Create Question
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
                                <form id="kt_question_form" method="POST" action="{{ route('question.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-0">

                                        <!-- Difficulty Level -->
                                        <div class="row pe-0 pb-5">
                                            <div class="col-lg-4">
                                                <div class="fv-row mt-5">
                                                    <div class="fs-6 fw-bold text-gray-700 col-lg-12">
                                                        <label class="required form-label">Subject</label>
                                                        <select name="q_subject" id="q_subject"
                                                            class="form-control mb-2 @error('q_subject') is-invalid @enderror">
                                                            <option>Select Subject</option>
                                                            @foreach($subjects as $sub)
                                                            <option value="{{ $sub->id }}">{{ $sub->sub_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('q_subject')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
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
                                                            <option >Select Topic</option>
                                                        </select>
                                                        @error('q_topic')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="fv-row mt-5">
                                                    <div class="fs-6 fw-bold text-gray-700 col-lg-12">
                                                        <label class="required form-label">Difficulty Level</label>
                                                        <select name="difficulty_level"
                                                            class="form-control mb-2 @error('difficulty_level') is-invalid @enderror">
                                                            <option>Select Difficulty Level</option>
                                                            @foreach($difficultyLevels as $level)
                                                            <option value="{{ $level->id }}">
                                                                {{ $level->difficulty_level }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('difficulty_level')<div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Question -->
                                        <div class="row pe-0 pb-5">
                                            <div class="col-lg-12">
                                                <div class="fv-row mt-5">
                                                    <div class="fs-6 fw-bold text-gray-700 col-lg-12">
                                                        <label class="required form-label">Question</label>
                                                        <textarea id="summernote" name="question"
                                                            class="form-control mb-2 @error('question') is-invalid @enderror questions"></textarea>
                                                        @error('question')<div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row pe-0 pb-5">
                                            <div class="col-lg-12">
                                                <div class="fv-row mt-5">
                                                    <div
                                                        class="fs-6 fw-bold text-gray-700 col-lg-12 d-flex justify-content-between">
                                                        <label class="required form-label">Option 1</label>
                                                        <label for="is_answer1" class="form-check-label">

                                                            <input type="radio" id="is_answer1" checked name="is_answer"
                                                                value="1" class="form-check-input"> &nbsp; Is Answer ?

                                                        </label>
                                                    </div>
                                                    <textarea id="option1" name="option1"
                                                        class="form-control mb-2 @error('option1') is-invalid @enderror questions"></textarea>
                                                    @error('option1')<div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Option 2 -->
                                        <div class="row pe-0 pb-5">
                                            <div class="col-lg-12">
                                                <div class="fv-row mt-5">
                                                    <div
                                                        class="fs-6 fw-bold text-gray-700 col-lg-12 d-flex justify-content-between">
                                                        <label class="required form-label">Option 2</label>
                                                        <label for="is_answer2" class="form-check-label">

                                                            <input type="radio" id="is_answer2" name="is_answer"
                                                                value="2" class="form-check-input"> &nbsp; Is Answer ?

                                                        </label>
                                                    </div>
                                                    <textarea id="option2" name="option2"
                                                        class="form-control mb-2 @error('option2') is-invalid @enderror questions"></textarea>
                                                    @error('option2')<div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Option 3 -->
                                        <div class="row pe-0 pb-5">
                                            <div class="col-lg-12">
                                                <div class="fv-row mt-5">
                                                    <div
                                                        class="fs-6 fw-bold text-gray-700 col-lg-12 d-flex justify-content-between">
                                                        <label class="required form-label">Option 3</label>
                                                        <label for="is_answer3" class="form-check-label">

                                                            <input type="radio" id="is_answer3" name="is_answer"
                                                                value="3" class="form-check-input"> &nbsp; Is Answer ?

                                                        </label>
                                                    </div>
                                                    <textarea id="option3" name="option3"
                                                        class="form-control mb-2 @error('option3') is-invalid @enderror questions"></textarea>
                                                    @error('option3')<div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Option 4 -->
                                        <div class="row pe-0 pb-5">
                                            <div class="col-lg-12">
                                                <div class="fv-row mt-5">
                                                    <div
                                                        class="fs-6 fw-bold text-gray-700 col-lg-12 d-flex justify-content-between">
                                                        <label class="required form-label">Option 4</label>
                                                        <label for="is_answer4" class="form-check-label">

                                                            <input type="radio" id="is_answer4" name="is_answer"
                                                                value="4" class="form-check-input"> &nbsp; Is Answer ?

                                                        </label>
                                                    </div>
                                                    <textarea id="option4" name="option4"
                                                        class="form-control mb-2 @error('option4') is-invalid @enderror questions"></textarea>
                                                    @error('option4')<div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>



                                        <!-- Submit Button -->
                                        <div class="row pe-0 pb-5">
                                            <div class="col-lg-12 text-end">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.15.0/katex.min.js"></script>
<script>
document.querySelectorAll('.questions').forEach((element) => {
    element.addEventListener('input', function() {
    var latex = this.value;
    var output = document.getElementById('mathOutput');
    output.innerHTML = ''; // Clear previous output
    if (latex.trim() !== '') {
        katex.render(latex, output, {
            throwOnError: false
        });
    }
});
});
</script>

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

@endsection