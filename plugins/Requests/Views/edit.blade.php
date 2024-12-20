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

            <!-- Loop door custom_questions -->
            @if($customQuestions = json_decode($requestModel->custom_questions, true))
                @foreach($customQuestions as $question => $data)
                    @php
                        $decodedQuestion = urldecode($question);
                        $cleanQuestion = str_replace('"', '', $decodedQuestion);

                        $decodedType = urldecode($data['type']);
                        $cleanType = str_replace('"', '', $decodedType);
                    @endphp
                    <div class="mb-5">
                        <label class="form-label">{{ $cleanQuestion }}</label>
                        
                        @switch($data['type'])
                            @case('radio')
                                <div>
                                    @foreach(explode(',', $data['options'] ?? '') as $option)
                                        <div class="form-check form-check-inline form-check-sm">
                                            <input class="form-check-input" type="radio" 
                                                name="custom_questions[{{ $cleanQuestion }}][{{ $cleanType }}]" 
                                                id="{{ $cleanQuestion }}_{{ $option }}"
                                                value="{{ $option }}"
                                                {{ old('custom_questions.' . $cleanQuestion . '.' . $cleanType, $data['answer']) == $option ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{ $cleanQuestion }}_{{ $option }}">{{ $option }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @break

                            @case('select')
                                <select class="form-select form-select-sm" 
                                    name="custom_questions[{{ $cleanQuestion }}][{{ $cleanType }}]">
                                    <option value="">Maak een keuze</option>
                                    @foreach(explode(',', $data['options'] ?? '') as $option)
                                        <option value="{{ $option }}"
                                            {{ old('custom_questions.' . $cleanQuestion . '.' . $cleanType, $data['answer']) == $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                                @break

                            @case('checkbox')
                                <div>
                                    @foreach(explode(',', $data['options'] ?? '') as $option)
                                        <div class="form-check form-check-sm">
                                            <input class="form-check-input" type="checkbox" 
                                                name="custom_questions[{{ $cleanQuestion }}][{{ $cleanType }}][]" 
                                                id="{{ $cleanQuestion }}_{{ $option }}"
                                                value="{{ $option }}"
                                                {{ in_array($option, explode(',', old('custom_questions.' . $cleanQuestion . '.' . $cleanType, $data['answer']))) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{ $cleanQuestion }}_{{ $option }}">{{ $option }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @break

                            @case('textarea')
                                <textarea class="form-control form-control-sm" name="custom_questions[{{ $cleanQuestion }}][{{ $cleanType }}]">{{ old('custom_questions.' . $cleanQuestion . '.' . $cleanType, $data['answer']) }}</textarea>
                                @break

                            @default
                                <input type="text" class="form-control form-control-sm" 
                                    name="custom_questions[{{ $cleanQuestion }}][{{ $cleanType }}]" 
                                    value="{{ old('custom_questions.' . $cleanQuestion . '.' . $cleanType, $data['answer']) }}">
                        @endswitch
                    </div>
                @endforeach
            @endif

            <div class="mt-7">
                <button type="submit" class="btn btn-primary btn-sm">Opslaan</button>
                <a href="{{ route('requests.index') }}" class="btn btn-secondary btn-sm ms-2">Terug naar overzicht</a>
            </div>
        </form>
    </div>
</div>
@endsection
