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

<div class="container-fixed">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('requests.update', $requestModel->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-5">
                            <label class="form-label">Geslacht</label>
                            <div>
                                <div class="form-check form-check-inline form-check-sm">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Dhr." {{ old('gender', $requestModel->gender) == 'Dhr.' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender_male">Dhr.</label>
                                </div>
                                <div class="form-check form-check-inline form-check-sm">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Mevr." {{ old('gender', $requestModel->gender) == 'Mevr.' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender_female">Mevr.</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="name" class="form-label">Naam</label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ old('name', $requestModel->name) }}">
                        </div>

                        <div class="mb-5">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email" value="{{ old('email', $requestModel->email) }}">
                        </div>

                        <div class="mb-5">
                            <label for="city" class="form-label">Plaats</label>
                            <input type="text" class="form-control form-control-sm" id="city" name="city" value="{{ old('city', $requestModel->city) }}">
                        </div>
                        @foreach($customQuestionsSettings as $questionGroup)
                            @foreach($questionGroup as $type => $questions)
                                @foreach($questions as $label => $options)
                                    @php
                                        $savedQuestion = json_decode($requestModel->custom_questions, true)[$label] ?? null;
                                        $savedAnswer = $savedQuestion['answer'] ?? '';
                                    @endphp
                                    <div class="mb-5">
                                        <label class="form-label">{{ $label }}</label>
                                        @if($type == 'radio')
                                            @foreach($options as $display => $value)
                                                <div class="form-check form-check-sm mb-2">
                                                    <input class="form-check-input" type="radio" 
                                                        name="custom_questions[{{ $label }}][{{ $type }}]" 
                                                        id="custom_question_{{ $label }}_{{ $value }}" 
                                                        value="{{ $value }}" 
                                                        {{ $savedAnswer == $value ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="custom_question_{{ $label }}_{{ $value }}" style="color: #252f4a;">
                                                        {{ $display }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @elseif($type == 'select')
                                            <select class="form-select form-select-sm" 
                                                name="custom_questions[{{ $label }}][{{ $type }}]" 
                                                id="custom_question_{{ $label }}">
                                                <option value="">Maak een keuze</option>
                                                @foreach($options as $display => $value)
                                                    <option value="{{ $value }}" {{ $savedAnswer == $value ? 'selected' : '' }}>
                                                        {{ $display }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @elseif($type == 'textarea')
                                            <textarea class="form-control form-control-sm" 
                                                name="custom_questions[{{ $label }}][{{ $type }}]" 
                                                id="custom_question_{{ $label }}" 
                                                rows="3">{{ $savedAnswer }}</textarea>
                                        @endif
                                    </div>
                                @endforeach
                            @endforeach
                        @endforeach

                        <div class="mt-7">
                            <button type="submit" class="btn btn-primary btn-sm">Opslaan</button>
                            <a href="{{ route('requests.index') }}" class="btn btn-secondary btn-sm ms-2">Terug naar overzicht</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Gekoppelde mediators</h5>
                </div>
                <div class="card-body">
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection