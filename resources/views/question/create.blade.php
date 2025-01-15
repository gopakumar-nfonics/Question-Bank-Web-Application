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
                        Add Question
                    </h1>
                </div>
                <div class="card-toolbar me-10">
                    <a href="{{ route('question.index') }}" class="btn btn-sm btn-primary">
                        Back to List
                    </a>
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
                                                        <textarea id="" name="question"
                                                        class=" editor form-control mb-2 @error('question') is-invalid @enderror questions">
                                                            {{ old('question') }}
                                                        </textarea>
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
                                                    <div class="@error('option1') is-invalid @enderror questions">
                                                        <textarea id="option1" name="option1"
                                                        class="editor form-control mb-2">
                                                            {{ old('option1') }}
                                                        </textarea>
                                                    </div>
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
                                                    <div class="@error('option2') is-invalid @enderror questions">
                                                        <textarea id="option2" name="option2"
                                                        class="editor form-control mb-2">
                                                            {{ old('option2') }}
                                                        </textarea>
                                                    </div>
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
                                                    <div class="@error('option3') is-invalid @enderror questions">
                                                        <textarea id="option3" name="option3"
                                                        class="editor form-control mb-2">
                                                            {{ old('option3') }}
                                                        </textarea>
                                                    </div>
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
                                                    <div class="@error('option4') is-invalid @enderror questions">
                                                        <textarea id="option4" name="option4"
                                                        class="editor form-control mb-2 ">
                                                            {{ old('option4') }}
                                                        </textarea>
                                                    </div>
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
<script src="{{ url('/') }}/assets/js/ck-editor/ckeditor.js"></script>
<script src="{{ url('/') }}/assets/js/ck-editor/tex-mml-chtml.js"></script>
<script>
    document.querySelectorAll('.editor').forEach(textarea => {
        ClassicEditor
            .create(textarea, {
                toolbar: ['bold', 'italic', 'link', 'undo', 'redo'],
            })
            .then(editor => {
                console.log('Editor initialized for:', textarea.name, editor);
            })
            .catch(error => {
                console.error('Error initializing editor for:', textarea.name, error);
            });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        MathJax.typesetPromise();
    });
</script>
<script>

    document.addEventListener("DOMContentLoaded", function () {
        // Select all form controls that have error messages
        const formControls = document.querySelectorAll('.form-control');

        // Loop through each form control and add event listeners
        formControls.forEach(control => {
            // Check if the control is a textarea or an input
            const isTextarea = control.tagName.toLowerCase() === 'textarea';

            control.addEventListener('input', function () {
                const errorMessage = this.closest('.fv-row').querySelector('.invalid-feedback');
                // Check the value of the textarea or input
                const value = isTextarea ? this.value.trim() : this.value.trim();

                if (value !== '') {
                    // If the input or textarea is not empty, hide the error message
                    if (errorMessage) {
                        errorMessage.style.display = 'none';
                    }
                    this.classList.remove('is-invalid'); // Remove invalid class
                } else {
                    // Show error if the input or textarea is still empty
                    if (errorMessage) {
                        errorMessage.style.display = 'block';
                    }
                    this.classList.add('is-invalid'); // Add invalid class
                }
            });
        });
    });

</script>
<script>

    // document.addEventListener("DOMContentLoaded", function () {
    //     // Function to set the answer-border class for the default checked radio button
    //     function setDefaultChecked() {
    //         const checkedRadio = document.querySelector('input[name="is_answer"]:checked');
    //         if (checkedRadio) {
    //             const optionId = `option${checkedRadio.value}`;
    //             const textarea = document.getElementById(optionId);
    //             if (textarea) {
    //                 const parentDiv = textarea.parentElement; // Get the parent <div>
    //                 if (parentDiv) {
    //                     parentDiv.classList.add('answer-border');
    //                 }
    //             }
    //         }
    //     }

    //     // Get all radio buttons with name "is_answer"
    //     const radioButtons = document.querySelectorAll('input[name="is_answer"]');

    //     // Add event listener to each radio button
    //     radioButtons.forEach(radio => {
    //         radio.addEventListener('change', function () {
    //             // Remove the 'answer-border' class from all parent divs
    //             document.querySelectorAll('.answer-border').forEach(div => {
    //                 div.classList.remove('answer-border');
    //             });

    //             // Add 'answer-border' to the corresponding parent div of the textarea
    //             const optionId = `option${this.value}`;
    //             const textarea = document.getElementById(optionId);
    //             if (textarea) {
    //                 const parentDiv = textarea.parentElement; // Get the parent <div>
    //                 if (parentDiv) {
    //                     parentDiv.classList.add('answer-border');
    //                 }
    //             }
    //         });
    //     });

    //     // Set the class for the default checked option on page load
    //     setDefaultChecked();
    // });

    document.addEventListener("DOMContentLoaded", function () {
        // Function to set the default checked radio button styles
        function setDefaultChecked() {
            const checkedRadio = document.querySelector('input[name="is_answer"]:checked');
            if (checkedRadio) {
                const optionId = `option${checkedRadio.value}`;
                const textarea = document.getElementById(optionId);
                const isAnswerLabel = checkedRadio.closest("label"); // Label for "Is Answer?"
                const optionLabel = checkedRadio
                    .closest(".fv-row") // Parent container of the radio button and labels
                    .querySelector(".form-label"); // Label for "Option 1"

                if (textarea) {
                    const parentDiv = textarea.parentElement; // Get the parent <div>
                    if (parentDiv) {
                        parentDiv.classList.add("answer-border");
                    }
                }

                if (isAnswerLabel) {
                    isAnswerLabel.classList.add("color-green");
                }

                if (optionLabel) {
                    optionLabel.classList.add("color-green"); // Add class to "Option 1" label
                }
            }
        }

        // Get all radio buttons with name "is_answer"
        const radioButtons = document.querySelectorAll('input[name="is_answer"]');

        // Add event listener to each radio button
        radioButtons.forEach((radio) => {
            radio.addEventListener("change", function () {
                // Remove the 'answer-border' and 'color-green' classes
                document.querySelectorAll(".answer-border").forEach((div) => {
                    div.classList.remove("answer-border");
                });
                document.querySelectorAll(".color-green").forEach((element) => {
                    element.classList.remove("color-green");
                });

                // Add classes to the selected elements
                const optionId = `option${this.value}`;
                const textarea = document.getElementById(optionId);
                const isAnswerLabel = this.closest("label"); // Label for "Is Answer?"
                const optionLabel = this
                    .closest(".fv-row") // Parent container of the radio button and labels
                    .querySelector(".form-label"); // Label for "Option 1"

                if (textarea) {
                    const parentDiv = textarea.parentElement;
                    if (parentDiv) {
                        parentDiv.classList.add("answer-border");
                    }
                }

                if (isAnswerLabel) {
                    isAnswerLabel.classList.add("color-green");
                }

                if (optionLabel) {
                    optionLabel.classList.add("color-green"); // Add class to "Option 1" label
                }
            });
        });

        // Set styles for the default checked option on page load
        setDefaultChecked();
    });

</script>

@endsection