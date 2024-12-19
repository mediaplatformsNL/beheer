@extends('page')

@section('title', 'Contact - Mediators Vergelijken')
@section('description', '')
@section('robots', 'noindex, follow')
@section('page_id', 'page-356681')

@prepend('scope', 'regular')

@push('stylesheets')
@endpush

@push('inline-scripts')
    <script type="text/javascript" src="{{ asset('js/form_mediators.js') }}"></script>
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
                    <ul class="blockwise">
                        <li><a href="{{ route('home') }}">Mediators vergelijken</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="block-8-1 light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="box">
                        <h1 class="heading-2 has-sub dark"><span style="font-size: 32px;">Contact</span></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-3 col-md-7 col-lg-8" style="margin: 0 auto;">
                    <div class="text-2 dark">
                        <h1 class="title">Contact opnemen</h1>

                        <p>Heeft u vragen? Dan kunt u contact opnemen met ons kantoor in Ede. Wij zijn tijdens reguliere werktijden bereikbaar per telefoon. Maak gerust gebruik van ons contactformulier. Wij nemen dan zo spoedig mogelijk contact met u op.</p>

                        <h2>Contactgegevens</h2>

                        <p>
                            MediatorsVergelijken.nl<br>
                            Galvanistraat 1<br>
                            6716 AE Ede Gld<br>
                            <br>
                            T: 085 - 070 6676<br>
                            E: info@mediatorsvergelijken.nl
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection