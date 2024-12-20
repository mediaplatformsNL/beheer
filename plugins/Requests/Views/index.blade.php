@extends('admin.main')

@section('content')
<div class="container-fixed">
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7">
        <div class="flex flex-col justify-center gap-2">
            <h1 class="text-xl font-medium leading-none text-gray-900 mb-4">
                Aanvragen
            </h1>
            <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                <p>Totaaloverzicht van alle aanvragen.</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body {{ $requests->count() > 0 ? 'p-0' : '' }}">
        @if ($requests->count() > 0)
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Datum</th>
                        <th>Naam</th>
                        <th>Plaats</th>
                        <th>Email</th>
                        <th>Telefoon</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr>
                            <td>{{ $request->request_number }}</td>
                            <td>{{ $request->created_at->format('d-m-Y') }}</td>
                            <td>{{ $request->name ?? $request->first_name . ' ' . $request->last_name }}</td>
                            <td>{{ $request->city }}</td>
                            <td>{{ $request->email }}</td>
                            <td>{{ !empty($request->phone) ? $request->phone : '--' }}</td>
                            <td>{!! $request->status !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-sm text-gray-500 mb-0">Er zijn nog geen aanvragen gedaan.</p>
        @endif
    </div>
</div>
@endsection