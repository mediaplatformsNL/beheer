@extends('auth.main-auth')

@section('content')
<!--begin::Form-->
<form class="form w-100" novalidate="novalidate" action="{{ route('password.update') }}">
    @csrf
    <!--begin::Heading-->
    <div class="text-center mb-10">
        <!--begin::Title-->
        <h1 class="text-gray-900 fw-bolder mb-3">Wachtwoord vergeten?</h1>
        <!--end::Title-->
        <!--begin::Link-->
        <div class="text-gray-500 fw-semibold fs-6">Vul je e-mailadres in en dan ontvang je een reset link.</div>
        <!--end::Link-->
    </div>
    <!--begin::Heading-->
    <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Email-->
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <!--begin::Actions-->
    <div class="d-flex flex-wrap justify-content-center pb-lg-0">
        <button type="submit" id="kt_password_reset_submit" class="btn btn-primary me-4">
            <!--begin::Indicator label-->
            <span class="indicator-label">Verzenden</span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress">
                Even geduld...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
            <!--end::Indicator progress-->
        </button>
        <a href="{{ route('login') }}" class="btn btn-light">Annuleren</a>
    </div>
    <!--end::Actions-->
</form>
<!--end::Form-->
@endsection
