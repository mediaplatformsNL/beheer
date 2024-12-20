@extends('admin.main')

@section('content')
<div class="container-fixed">
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7">
        <div class="flex flex-col justify-center gap-2">
            <h1 class="text-xl font-medium leading-none text-gray-900 mb-4">
                Aanvraag Bewerken
            </h1>
            <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                <p>Bewerk de details van de aanvraag.</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('requests.update', $requestModel->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Naam</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $requestModel->name) }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $requestModel->email) }}">
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">Plaats</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $requestModel->city) }}">
            </div>

            <!-- Voeg hier meer velden toe indien nodig -->

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</div>
@endsection
