@extends('layouts.login')

@section('content')
<!--begin::Theme mode setup on page load-->
<!--end::Theme mode setup on page load-->

<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">

        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-1"
            style="background-image: url(assets/media/misc/auth-bg.png)">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                <!--begin::Logo-->
                <a href="" class="mb-0 mb-lg-12">
                    <img alt="Logo" src="assets/media/logos/logo.svg" class="h-50px h-lg-50px" />
                </a>
                <!--end::Logo-->
                <!--begin::Image-->
                <img class="d-none d-lg-block mx-auto w-200px w-md-50 w-lg-400px"
                    src="assets/media/misc/auth-screens.png" alt="" />
                <!--end::Image-->
                <!--begin::Title-->
                <h1 class="d-none d-lg-block text-white fs-1 fw-bolder text-center mt-6">Budgeting & Expense Tracking
                    Solution</h1>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="d-none d-lg-block text-white fs-base text-center">Effortlessly track expenses,
                    <a href="#" class="opacity-75-hover text-warning fw-bold me-1">set budgets,</a>and stay in control
                    of your
                    <br />financial health with our
                    <a href="#" class="opacity-75-hover text-warning fw-bold me-1">intuitive budgeting & expense
                        tracking solution.</a>
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
                    <!--begin::Form-->
                    <form method="post" action="{{ route('password.email') }}" class="form w-100" id="kt_sign_in_form">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-15">
                            <!--begin::Title-->

                            <h2 class="text-grey-200 fw-bolder mt-2 pt-3 br-b-1 ">Forgot Password</h2>
                            <!--end::Title-->
                            <!--begin::Subtitle-->


                            @if (session('status'))
                            <div class="alert alert-success mt-5" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <!--end::Subtitle=-->
                        </div>
                        <!--begin::Heading-->
                        <div class="text-dark text-center mb-8">Please enter your email address and we'll send you a
                            link to reset your password</div>
                        <div class="fv-row mb-5 mt-5">
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input id="email" type="email" placeholder="Email Address"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->

                            <!--end::Input group=-->

                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Submit button-->
                        <div class="d-grid mt-10 mb-5">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                <!--begin::Indicator label-->
                                <span class="indicator-label"> {{ __('Submit') }}</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                        </div>
                        <!--end::Submit button-->



                    </form>
                    <!--end::Form-->
                    <p class="text-center fs-5"><a href="{{route('login')}}"><u>Sign In</u></a></p>
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-wrap px-5">
                <!--begin::Links-->
                <div class="d-flex fw-semibold text-primary fs-base">
                    <a href="../../demo1/dist/pages/team.html" class="px-5" target="_blank">© 2024. Amrita Vishwa
                        Vidyapeetham. All Rights Reserved.</a>

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