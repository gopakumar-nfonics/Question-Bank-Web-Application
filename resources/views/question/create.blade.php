@extends('layouts.admin')

@section('content')


<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

  <style>
	#editor {
            width: 100%;
            min-height: 100px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 16px;
            white-space: pre-wrap;
            overflow-wrap: break-word;
            direction: ltr; /* Enforce left-to-right text direction */
            unicode-bidi: normal; /* Ensure natural bidirectional text flow */
            text-align: left; /* Align text to the left */
            caret-color: black; /* Ensure caret visibility */
        }
        .equation-output {
            display: inline-block;
            margin: 0;
            padding: 0;
        }
  </style>

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
					<!-- <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Create Company</h1> -->
					<!--end::Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">

					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page title-->

			</div>
			<!--end::Toolbar container-->
		</div>
		<!--end::Toolbar-->
		<!--begin::Content-->
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<!--begin::Content container-->
			<div id="kt_app_content_container" class="app-container container-xxl">
				<!--begin::Basic info-->
				<div class="card mb-5 mb-xl-10">
					<!--begin::Card header-->
					<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
						<!--begin::Card title-->
						<div class="card-title m-0">
							<h3 class="fw-bold m-0">Create Question</h3>
						</div>
						<!--end::Card title-->
					</div>
					<!--begin::Card header-->
					<!--begin::Content-->
					<div id="kt_account_settings_profile_details" class="collapse show">
						<!--begin::Form-->
						<form id="kt_account_profile_details_form" class="form" method="POST" action="{{route('subject.store')}}" enctype="multipart/form-data">
							@csrf
							<!--begin::Card body-->
							<div class="card-body border-top p-9">

								<!--begin::Input group-->
								<div class="row mb-6">
									<!--begin::Label-->
									<label class="col-lg-4 col-form-label required fw-semibold fs-6">Question</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-8 fv-row">
										<!--begin::Col-->
										<div class="col-lg-12 fv-row">
										<div contenteditable="true" id="editor" placeholder="Type your equation here (e.g., \\(x^2 + y^2 = z^2\\))" oninput="updateEquation()">
    Type your equation here (e.g., \(x^2 + y^2 = z^2\))
</div>
											@error('question')<div class="invalid-feedback">{{ $message }}</div> @enderror
										</div>
										<!--end::Col-->
									</div>
									<!--end::Col-->
								</div>


							</div>
							<!--end::Card body-->
							<!--begin::Actions-->
							<div class="card-footer d-flex justify-content-end py-6 px-9">
								<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Basic info-->
			</div>
			<!--end::Content container-->
		</div>
		<!--end::Content-->
	</div>
	<!--end::Content wrapper-->

	<script>
    function updateEquation() {
        const editor = document.getElementById("editor");
        const rawText = editor.innerText; // Get raw text from the editor

        // Prevent reversed rendering
        const processedText = rawText
            .replace(/\\/g, '\\\\') // Escape backslashes for LaTeX
            .replace(/</g, '&lt;') // Prevent HTML injection
            .replace(/>/g, '&gt;'); // Prevent HTML injection

        editor.innerHTML = processedText; // Update the content with the raw text
        MathJax.typesetPromise([editor]); // Render equations with MathJax

        // Move caret to the end
        const range = document.createRange();
        const sel = window.getSelection();
        range.selectNodeContents(editor);
        range.collapse(false);
        sel.removeAllRanges();
        sel.addRange(range);
    }
</script>
	@endsection