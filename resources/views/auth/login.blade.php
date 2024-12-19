@extends('auth.main-auth')

@section('content')
<!--begin::Form-->
<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}" method="POST">
    @csrf
    <!--begin::Heading-->
    <div class="text-center mb-11">
        <!--begin::Title-->
        <h1 class="text-gray-900 fw-bolder mb-3">Inloggen</h1>
        <!--end::Title-->
        <!--begin::Subtitle-->
        <div class="text-gray-500 fw-semibold fs-6">MediatorsVergelijken.nl</div>
        <!--end::Subtitle=-->
    </div>
    <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror" />
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <!--end::Email-->
    </div>
    <!--end::Input group=-->
    <div class="fv-row mb-3">
        <!--begin::Password-->
        <input type="password" placeholder="Wachtwoord" name="password" autocomplete="off" class="form-control bg-transparent @error('password') is-invalid @enderror" />
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <!--end::Password-->
    </div>
    <!--end::Input group=-->
    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <div></div>
        <!--begin::Link-->
        <a href="{{ route('password.request') }}" class="link-primary">Wachtwoord vergeten?</a>
        <!--end::Link-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Submit button-->
    <div class="d-grid mb-10">
        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            <!--begin::Indicator label-->
            <span class="indicator-label">Inloggen</span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress">Even geduld...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
        </button>
    </div>
    <!--end::Submit button-->
</form>
<!--end::Form-->
@endsection
