@extends('page')

@section('title', 'Deelname als bedrijf - Mediators Vergelijken')
@section('description', '')
@section('robots', 'noindex, follow')
@section('page_id', 'page-356681')

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
                        <h1 class="heading-2 has-sub dark"><span style="font-size: 32px;">Aanmelding voltooid</span></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-3 col-md-7 col-lg-8" style="margin: 0 auto;">
                    <div class="text-2 dark">
                        <p>Hartelijk dank voor uw aanmelding bij MediatorsVergelijken.nl.</p>

                        <p>U komt vanaf nu in aanmerking voor gratis aanvragen die afkomstig zijn van mensen die op zoek zijn naar een goede mediator in uw werkgebied. Wij wensen u graag veel succes toe bij het omzetten van de aanvragen in definitieve mediation-opdrachten. Mocht u vragen hebben over ons platform, dan helpen wij u graag telefonisch of per e-mail verder.</p>

                        <p>Als u een mediation-opdracht binnenhaalt naar aanleiding van een gratis aanvraag, dan kunt u simpelweg reageren op de desbetreffende aanvraag en aangeven dat u de opdracht hebt binnengehaald. E-mailen naar info@mediatorsvergelijken.nl is tevens mogelijk. Wij verwerken dan het resultaat in onze administratie.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection