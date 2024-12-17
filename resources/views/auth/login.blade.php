@extends('auth.app')

@section('title', "Sign in")

@section('content')
    <form class="form w-100" method="POST" action="{{ route('login') }}">
        @csrf
        <!--begin::Body-->
        <div class="card-body">

            <!--begin::Heading-->
            <div class="text-start mb-10">
                <img alt="Logo" src="{{asset("images/logo-dark.png")}}" class="h-75px" />
            </div>
            <div class="text-start mb-10">
                <!--begin::Title-->
                <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">Giriş</h1>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">Söwdäň bolsun dostum.</div>
                <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8">

                <div class="input-group input-group-solid">
                    <input class="form-control form-control-solid mb-3 mb-lg-0" type="text" name="username" id="username" placeholder="Ulanyjy belgi" required value="{{old("username")}}" autocomplete="username"/>
                </div>
                @error('username')
                    <span class="form-text text-danger">
                        {{$message}}
                    </span>
                @enderror
            </div>
            <!--end::Input group=-->
            <div class="fv-row mb-7">
                <!--begin::Password-->
                <input type="password" placeholder="Parol" name="password" required autocomplete="current-password" class="form-control form-control-solid" />
                <!--end::Password-->
            </div>
            <!--end::Input group=-->
            <!--end::Input group=-->
            <div class="fv-row mb-7">
                <div class="form-check form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember"/>
                    <label class="form-check-label" for="remember_me">
                        Ýatda saklaý ýokardakylary, gaýrat et
                    </label>
                </div>
            </div>
            <!--end::Input group=-->
            <!--begin::Actions-->
            <div class="d-flex flex-stack">
                <!--begin::Submit-->
                <button id="kt_sign_in_submit" class="btn btn-success me-2 flex-shrink-0">
                    <!--begin::Indicator label-->
                    <span class="indicator-label" data-kt-translate="sign-in-submit">Gitdik onda</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">
                        <span data-kt-translate="general-progress">Garaşaý</span>
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                    <!--end::Indicator progress-->
                </button>
                <!--end::Submit-->
            </div>
            <!--end::Actions-->
        </div>
        <!--begin::Body-->
    </form>
@endsection
