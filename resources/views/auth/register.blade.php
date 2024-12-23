@extends('layouts.login')

@section('content')
<!--begin::Theme mode setup on page load-->
<!--end::Theme mode setup on page load-->

<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
	<!--begin::Authentication - Sign-in -->
	<div class="d-flex flex-column flex-lg-row flex-column-fluid">

		<!--begin::Aside-->
		<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-1" style="background-image: url(assets/media/misc/auth-bg.png)">
			<!--begin::Content-->
			<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
				<!--begin::Logo-->
				<a href="" class="mb-0 mb-lg-12">
					<img alt="Logo" src="assets/media/logos/logo.svg" class="h-50px h-lg-50px" />
				</a>
				<!--end::Logo-->
				<!--begin::Image-->
				<img class="d-none d-lg-block mx-auto w-100px w-md-50 w-lg-300px" src="assets/media/misc/lg_bg.png" alt="" />
				<!--end::Image-->
				<!--begin::Title-->
				<h1 class="d-none d-lg-block text-white fs-1 fw-bolder text-center mt-6">Placement Management System</h1>
				<!--end::Title-->
				<!--begin::Text-->
				<div class="d-none d-lg-block text-white fs-base text-center">To expedite the hiring process,
                    <a href="#" class="opacity-75-hover text-warning fw-bold me-1">this system links</a>administrators, companies and students.
                    <br />It manages
                    <a href="#" class="opacity-75-hover text-warning fw-bold me-1">applications, interviews, jobs , and profiles</a> in a single platform.
                </div>
				<!--end::Text-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Aside-->
		<!--begin::Body-->
		<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-2">
			<!--begin::Form-->
			<div class="d-flex flex-center flex-column flex-lg-row-fluid">
				<!--begin::Wrapper-->
				<div class="w-lg-500px p-10">

					<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" id="kt_sign_up_form" method="POST" action="{{ route('register') }}">
						@csrf
						<!--begin::Heading-->
						<div class="text-center mb-11">
							<!--begin::Title-->
							<h2 class="text-dark fw-bolder mb-3">Sign Up</h2>
							<!--end::Title-->
							<!--begin::Subtitle-->
							<div class="text-gray-500 fw-semibold fs-6">New User Registration.</div>
							<!--end::Subtitle=-->
						</div>
						<!--begin::Heading-->


						<!--begin::Input group=-->
						<div class="fv-row mb-8 fv-plugins-icon-container">
							<!--begin::Name-->
							<select class="form-control @error('role') is-invalid @enderror"
								id="role" name="role">
								<option value="">Select Role</option>
								<option value="Recruiter" {{ old('role') == 'Recruiter' ? 'selected' : '' }}>Recruiter</option>
								<option value="Student" {{ old('role') == 'Student' ? 'selected' : '' }}>Student</option>
							</select>
							@error('role')<div class="invalid-feedback">{{ $message }}</div> @enderror
							<!--end::Email-->
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>

						<div class="fv-row mb-8 fv-plugins-icon-container" id="cmp_name" style="display:none">
							<!--begin::Name-->
							<input type="text" placeholder="Company Name" name="cname" autocomplete="off" class="form-control bg-transparent @error('cname') is-invalid @enderror" value="{{ old('cname') }}">
							@error('cname')<div class="invalid-feedback">{{ $message }}</div> @enderror
							<!--end::Email-->
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
						<div id="std_section">
							<div class="fv-row mb-8 fv-plugins-icon-container">
								<!--begin::Name-->
								<input type="text" placeholder="First Name" name="fname" autocomplete="off" class="form-control bg-transparent @error('fname') is-invalid @enderror" value="{{ old('fname') }}">
								@error('fname')<div class="invalid-feedback">{{ $message }}</div> @enderror
								<!--end::Email-->
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>

							<div class="fv-row mb-8 fv-plugins-icon-container">
								<!--begin::Name-->
								<input type="text" placeholder="Last Name" name="lname" autocomplete="off" class="form-control bg-transparent @error('lname') is-invalid @enderror" value="{{ old('lname') }}">
								@error('lname')<div class="invalid-feedback">{{ $message }}</div> @enderror
								<!--end::Email-->
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>

						<div class="fv-row mb-8 fv-plugins-icon-container"><!--begin::Email-->
							<input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror" value="{{ old('email') }}">
							@error('email')<div class="invalid-feedback">{{ $message }}</div> @enderror
							<!--end::Email-->
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
						<!--begin::Input group-->

						<div class="fv-row mb-8 fv-plugins-icon-container" data-kt-password-meter="true">
							<!--begin::Wrapper-->
							<div class="mb-1">
								<!--begin::Input wrapper-->
								<div class="position-relative mb-3">
									<input class="form-control bg-transparent @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" value="{{ old('password') }}">
									@error('password')<div class="invalid-feedback">{{ $message }}</div> @enderror
									<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
										<i class="bi bi-eye-slash fs-2"></i>
										<i class="bi bi-eye fs-2 d-none"></i>
									</span>
								</div>
								<!--end::Input wrapper-->
								<!--begin::Meter-->
								<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
								</div>
								<!--end::Meter-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Hint-->
							<div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
							<!--end::Hint-->
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
						<!--end::Input group=-->
						<!--end::Input group=-->

						<!--begin::Accept-->
						<div class="fv-row mb-8 fv-plugins-icon-container">
							<label class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="toc" value="1" id="accept_terms">
								<span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">I Accept the
									<a href="#" class="ms-1 link-primary">Terms & Conditions</a></span>
							</label>
							<div class="fv-plugins-message-container invalid-feedback"></div>
						</div>
						<!--end::Accept-->
						<!--begin::Submit button-->
						<div class="d-grid mb-10">
							<button type="submit" id="kt_sign_up_submit" class="btn btn-primary" disabled>
								<!--begin::Indicator label-->
								<span class="indicator-label">Sign up</span>
								<!--end::Indicator label-->
								<!--begin::Indicator progress-->
								<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								<!--end::Indicator progress-->
							</button>
						</div>
						<!--end::Submit button-->
						<!--begin::Sign up-->
						<div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
							<a href="{{route('login')}}" class="link-primary fw-semibold">Sign in</a>
						</div>
						<!--end::Sign up-->
					</form>


				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Form-->
			<!--begin::Footer-->
			<div class="d-flex flex-center flex-wrap px-5">
				<!--begin::Links-->
				<div class="d-flex fw-semibold text-gray-400 fs-base">
					<span class="px-5" target="_blank">© 2024. Amrita Vishwa Vidyapeetham. All Rights Reserved.</span>

				</div>
				<!--end::Links-->
			</div>
			<!--end::Footer-->
		</div>
		<!--end::Body-->

	</div>
	<!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->


@endsection
@section('pageScripts')
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const checkbox = document.getElementById('accept_terms');
		const submitButton = document.getElementById('kt_sign_up_submit');
		const form = document.getElementById('kt_sign_up_form');

		function toggleSubmitButton() {
			// Enable the submit button if the checkbox is checked, otherwise disable it
			submitButton.disabled = !checkbox.checked;
		}

		checkbox.addEventListener('change', toggleSubmitButton);

		// Check the checkbox status on page load
		toggleSubmitButton();

		form.addEventListener('submit', function(event) {
			// Prevent form submission if the checkbox is not checked
			if (!checkbox.checked) {
				event.preventDefault();
				alert('You must accept the terms and conditions before submitting the form.');
			}
		});

		// Handle Enter key press to ensure form submission is blocked
		form.addEventListener('keydown', function(event) {
			if (event.key === 'Enter' && submitButton.disabled) {
				event.preventDefault();
				alert('You must accept the terms and conditions before submitting the form.');
			}
		});
	});


	document.addEventListener('DOMContentLoaded', function () {
    const roleSelect = document.getElementById('role');
    const cmpName = document.getElementById('cmp_name');
    const stdSection = document.getElementById('std_section');

    // Function to toggle visibility based on the selected value
    function toggleSections() {
        if (roleSelect.value === 'Recruiter') {
            cmpName.style.display = 'block';
            stdSection.style.display = 'none';
        } else if (roleSelect.value === 'Student') {
            cmpName.style.display = 'none';
            stdSection.style.display = 'block';
        } else {
            cmpName.style.display = 'none';
            stdSection.style.display = 'none';
        }
    }

    // Initial check when the page loads
    toggleSections();

    // Add event listener for changes to the select input
    roleSelect.addEventListener('change', toggleSections);
});

</script>

@endsection