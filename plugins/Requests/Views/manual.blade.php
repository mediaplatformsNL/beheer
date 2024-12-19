@extends('admin.main')

@section('content')
<div class="container-fixed">
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7">
        <div class="flex flex-col justify-center gap-2">
            <h1 class="text-xl font-medium leading-none text-gray-900 mb-4">
                Over deze plugin
            </h1>
            <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                <p>Alles wat je moet weten over deze plugin.</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h3 class="mb-6">API</h3>
        <p>Deze plugin heeft een API. De API-sleutel is: <code>{{ config('requests.api_key') }}</code></p>
    </div>
</div>
@endsection
