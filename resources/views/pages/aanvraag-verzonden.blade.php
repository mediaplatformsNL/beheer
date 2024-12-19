@extends('page')

@section('title', 'Aanvraag verzonden - Mediators Vergelijken')
@section('description', '')
@section('robots', 'noindex, follow')
@section('page_id', 'page-362695')

@prepend('scope', 'regular')

@push('vendor-stylesheets')
@endpush

@push('stylesheets')
@endpush

@push('vendor-scripts')
@endpush

@push('inline-scripts')
@endpush

@push('breadcrumbs')
@endpush

@section('content')
    <section class="block-27-1 dark alt">
        <div class="media-4 dark" data-size="1920x0">
            <img src="{{ asset('img/header-1920.webp') }}" srcset="{{ asset('img/header-480.webp') }} 480w, {{ asset('img/header-960.webp') }} 960w, {{ asset('img/header-1920.webp') }} 1920w" sizes="(max-width: 480px) 480px, (max-width: 960px) 960px, 1920px" alt="Mediator die advies geeft">
        </div>
        <div class="container alt-container">
            <div class="row">
                <div class="col">
                    <a href="{{ route('home') }}" class="link-logo">
                        <img src="{{ asset('img/logo-mediators-vergelijken-sm.png') }}" class="logo" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="block-8-1 light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="box">
                        <h1 class="heading-2 has-sub dark"><span style="font-size: 32px;">Aanvraag verzonden</span></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-3 col-md-7 col-lg-8" style="margin: 0 auto;">
                    <div class="text-2 dark">
                        <p>Goed nieuws: wij hebben je aanvraag in goede orde ontvangen en we gaan deze nu in behandeling nemen.</p>
                        <p>Mochten wij twijfelen aan de authenticiteit van de aanvraag, dan is het mogelijk dat wij eerst contact met je opnemen om de aanvraag te verifi&euml;ren.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection