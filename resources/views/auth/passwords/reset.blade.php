@extends('auth.main-auth')

@section('content')
<!--begin::Form-->
<form class="form w-100" method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <!--begin::Heading-->
    <div class="text-center mb-11">
        <!--begin::Title-->
        <h1 class="text-gray-900 fw-bolder mb-3">Wachtwoord opnieuw instellen</h1>
        <!--end::Title-->
    </div>
    <!--end::Heading-->

    <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <input type="email" placeholder="E-mailadres" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" class="form-control bg-transparent @error('email') is-invalid @enderror" />
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <!--end::Email-->
    </div>

    <!--begin::Input group-->
    <div class="fv-row mb-8">
        <!--begin::Password-->
        <input type="password" placeholder="Nieuw wachtwoord" name="password" required autocomplete="new-password" class="form-control bg-transparent @error('password') is-invalid @enderror" />
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <!--end::Password-->
    </div>

    <!--begin::Input group-->
    <div class="fv-row mb-8">
        <!--begin::Confirm Password-->
        <input type="password" placeholder="Bevestig wachtwoord" name="password_confirmation" required autocomplete="new-password" class="form-control bg-transparent" />
        <!--end::Confirm Password-->
    </div>

    <!--begin::Submit button-->
    <div class="d-grid mb-10">
        <button type="submit" class="btn btn-primary">
            <!--begin::Indicator label-->
            <span class="indicator-label">Wachtwoord opnieuw instellen</span>
            <!--end::Indicator label-->
        </button>
    </div>
    <!--end::Submit button-->
</form>
<!--end::Form-->
@endsection
