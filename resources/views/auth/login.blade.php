@extends('layouts.login')

@section('content')
<!--begin::Theme mode setup on page load-->
<!--end::Theme mode setup on page load-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Page bg image-->
    <style>
    body {
        background-image: url('assets/images/bg.jpg');
    }
    </style>
    <!--end::Page bg image-->
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-column-fluid flex-lg-row">
        <!--begin::Aside-->
        <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
            <!--begin::Aside-->
            <div class="d-flex flex-center flex-lg-start flex-column">
                <!--begin::Logo-->

                <img alt="Logo" src="assets/images/app_logo.png" class="h-125px" />

                <!--end::Logo-->

            </div>
            <!--begin::Aside-->
        </div>
        <!--begin::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-center w-lg-50 p-10">
            <!--begin::Card-->
            <div class="card rounded-3 w-md-550px">
                <!--begin::Card body-->
                <div class="card-body p-10 p-lg-20">
                    <!--begin::Form-->
                    <form method="post" action="{{ route('login') }}" class="form w-100" id="kt_sign_in_form">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-15">
                            <!--begin::Title-->

                            <h2 class="text-gray-800 fw-bolder mt-2 pt-3 br-b-1">Sign In</h2>

                            <!--end::Title-->
                            <!--begin::Subtitle-->


                            @if ($errors->has('email'))

                            <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed p-6">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">Unable to Sign In</h4>
                                        <div class="fs-6 text-gray-700">{{ $errors->first('email') }}
                                        </div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>

                            @endif

                            <!--end::Subtitle=-->
                        </div>
                        <!--begin::Heading-->

                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" placeholder="Email" name="email" autocomplete="off"
                                class="form-control bg-transparent" />

                            <!--end::Email-->
                        </div>
                        <!--end::Input group=-->
                        <div class="fv-row mb-3">
                            <!--begin::Password-->
                            <input type="password" placeholder="Password" name="password" autocomplete="off"
                                class="form-control bg-transparent" />
                            <!--end::Password-->
                        </div>
                        <!--end::Input group=-->


                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mt-5">
                            <div></div>
                            <!--begin::Link-->
                            <a href="{{ route('password.request') }}" class="link-primary"><u>Forgot Password ?</u></a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Submit button-->
                        <div class="d-grid mt-10 mb-5">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Sign In</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                        </div>
                        <!--end::Submit button-->

                        <!-- <div class="text-gray-500 text-center fw-semibold fs-6 mt-10">Not a User yet?
                            <a href="{{route('register')}}" class="link-primary">Sign Up</a>
                        </div> -->

                    </form>
                    <!--end::Form-->
                    <div class="d-flex fw-semibold text-gray-400 fs-base">
                        <span class="px-5" target="_blank">&copy;{{ \Carbon\Carbon::now()->year }}. Amrita
                            Vishwa Vidyapeetham. All Rights Reserved.</span>

                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->



@endsection