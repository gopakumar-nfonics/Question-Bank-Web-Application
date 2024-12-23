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
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">


                        <div class="row mb-3">

                            <!--begin::Title-->

                            <h2 class="text-grey-200 fw-bolder mt-2 pt-3 br-b-1 text-center mb-10">Reset Password </h2>
                            <!--end::Title-->
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="w-275px form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $email ?? old('email') }} " required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="w-275px form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control w-275px"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100 my-10">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
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