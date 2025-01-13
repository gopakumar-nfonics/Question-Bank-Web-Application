@extends('layouts.admin')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>


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
										<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Add Topic</h1>
										<!--end::Title-->
									</div>
									<div class="card-toolbar">
										<a href="{{ route('topic.index') }}" class="btn btn-sm btn-primary">
											Back to List
										</a>
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
										<!-- <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Add Topic</h3>
											</div>
											
										</div> -->
										<!--begin::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_profile_details" class="collapse show">
											<!--begin::Form-->
											<form id="kt_account_profile_details_form" class="form" method="POST" action="{{route('topic.store')}}" enctype="multipart/form-data">
                                            @csrf
												<!--begin::Card body-->
												<div class="card-body border-top p-12">

													<!--end::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Subject</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
                                                            <select class="form-control form-control-lg form-control-solid @error('topic_subject') is-invalid @enderror" id="topic_subject" name="topic_subject">
															<option value="">--Select Subject--</option>
															@foreach($subjects as $sub)
                                                                    <option value="{{ $sub->id }}" @if(old('topic_subject') == $sub->id) selected @endif>{{ $sub->sub_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('topic_subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                        </div>
														<!--end::Col-->
													</div>
													
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Topics</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">	
																<!--begin::Col-->
																<div class="col-lg-12 fv-row">
																	<input id="tags" name="topic_name" class="form-control @error('topic_name') is-invalid @enderror" placeholder="Add Topic" value="{{ old('topic_name') }}">
																    @error('topic_name')<div class="invalid-feedback">{{ $message }}</div> @enderror
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
  // Get the input element
  const input = document.querySelector('#tags');
  
  // Initialize Tagify
  new Tagify(input);
</script>

@endsection
