@extends('admin.main')

@section('content')
<div class="container-fixed">
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7">
        <div class="flex flex-col justify-center gap-2">
            <h1 class="text-xl font-medium leading-none text-gray-900 mb-4">
                Dashboard
            </h1>
            <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                <p>Hallo {{ Auth::user()->name }}, welkom op je dashboard.</p>
                <p>Op het dashboard kunnen in de toekomst handige widgets worden geplaatst, zoals statistieken van de aanvragen.</p>
            </div>
        </div>
    </div>
</div>
@endsection 