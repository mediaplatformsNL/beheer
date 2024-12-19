@extends('page')

@section('title', 'Deelnemen als bedrijf - Mediators Vergelijken')
@section('description', '')
@section('robots', 'noindex, follow')
@section('page_id', '')

@prepend('scope', 'regular')

@push('stylesheets')
    <link href="{{ asset('css/form_deelname.css') }}" rel="stylesheet" />
@endpush

@push('inline-scripts')
    <script type="text/javascript" src="{{ asset('js/form_deelname.js') }}"></script>

    <script>
        jQuery(window).on('load', function () {
            new Parallax({selector: '#page-356681 [data-parallax], [data-page_id="page-356681"] [data-parallax]', image_selector: '> .media-4, > .carousel .media-4, > .map-2'});
            new Carousel({selector: '#page-356681 .block-45-1 .carousel, [data-page_id="page-356681"] .block-45-1 .carousel', play: true});
            new Effect({selector: '#page-356681 [data-effect], [data-page_id="page-356681"] [data-effect]'});
        });
    </script>
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
                    <a href="/" class="link-logo">
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
    <section>
        <div class="container">
            <div class="row">
                <div class="col col-1 col-md-6">
                    <div class="text-2 dark">
                        <h1 class="title">Gratis aanvragen in uw regio</h1>

                        <p>Geïnteresseerd in deelname aan MediatorsVergelijken.nl? Vul uw bedrijfsgegevens en wensen in. Wij brengen u in contact met uw doelgroep: mensen die verwikkeld zijn geraakt in een conflict en om die reden een geschikte mediator zoeken.</p>

                        <h2>Kies uw werkgebied</h2>

                        <p>U bepaalt zelf het gebied waarin u aanvragen wilt ontvangen, bijvoorbeeld alleen aanvragen uit specifieke gemeenten, gebieden of provincies.</p>

                        <h2>Gratis aanvragen - enkel betalen bij resultaat</h2>

                        <p>Iedere ontvangen aanvraag is gratis. Daarnaast zijn er geen abonnementskosten of opstartkosten. Wij verlangen enkel een vaste commissie per opdracht die u binnenhaalt via ons platform. Die vaste commissie bedraagt 250,- euro excl. btw per definitieve opdracht. Zodoende betaalt u enkel voor resultaat.</p>
                        <p>Mocht het zo zijn dat het een opdracht met toevoeging betreft, dan vragen wij vanzelfsprekend een lager tarief, namelijk 125,- euro excl. btw.</p>

                        <h2>Deelnemen aan MediatorsVergelijken.nl</h2>

                        <p>Wilt u deelnemen aan MediatorsVergelijken.nl? Vul uw bedrijfsgegevens en werkgebied in. Zodra u zich hebt aangemeld, komt u direct in aanmerking voor gratis aanvragen&nbsp;in uw regio.</p>
                    </div>
                </div>
                <div class="col col-1 col-md-6">
                    <div id="form"
                         data-array="deelname"
                         data-branche_id="20"
                         data-domain="MediatorsVergelijken.nl"
                         data-form_id="applicationform"
                         data-zapier_url="https://hooks.zapier.com/hooks/catch/2389105/oijuew7/"
                         data-multistep="magic_modal"
                         data-modal_backdrop="form_backdrop"
                         data-modal="form_modal"
                         data-click_radio=""
                         data-effect="fade_effect"
                         data-min_height="900"
                         data-submit_text="Verzenden"
                         data-opened_by_links=""
                         data-redirect="/bevestig-je-aanmelding"
                         data-progressbar=""
                         data-tekst_stap1=""
                         class="form_element">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection