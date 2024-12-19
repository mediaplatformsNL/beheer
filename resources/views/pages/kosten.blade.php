@extends('page')

@section('title', 'Kosten Mediator - Mediators Vergelijken')
@section('description', 'Op zoek naar een goede mediator? Vul je situatie en voorkeuren in en vergelijk tarieven van ervaren mediators. Gratis offertes vergelijken.')
@section('robots', 'index, follow')
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
    <section class="block-27-1 dark">
        <div class="media-4 dark" data-size="1920x0">
            <img src="{{ asset('img/header-1920.webp') }}" srcset="{{ asset('img/header-480.webp') }} 480w, {{ asset('img/header-960.webp') }} 960w, {{ asset('img/header-1920.webp') }} 1920w" sizes="(max-width: 480px) 480px, (max-width: 960px) 960px, 1920px" alt="Mediator die advies geeft">
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="box">
                        <div class="heading-1 light">
                            <span style="font-family: Amaranth; font-weight: 400;">
                                <strong>Vergelijk kosten van mediators. Maak een goede keuze.</strong>
                            </span>
                        </div>
                        <div class="text-1 light">
                            <p>Hulp nodig van een goede mediator? De kosten zijn afhankelijk van jouw situatie. Vraag vrijblijvend de kosten op bij meerdere mediators.</p>
                        </div>
                        <div class="button-wrapper">
                            <a class="button-3 light" onclick="openByClick(event);">Gratis gesprek aanvragen</a>
                            <div class="button-1 light" onclick="openByClick(event);">Vergelijk mediators</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="block-8-1 light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="box">
                        <h1 class="heading-2 has-sub dark"><span style="font-size: 32px;">Waar ben je naar op zoek?</span></h1>
                        <h2 class="heading-3 dark">Kies wat jij nu graag zou willen:</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="block-69-1 light" data-parallax="parallax">
        <div class="container">
            <div class="row">
                <div class="col col-1 col-md-4">
                    <div class="card-4 light-shade">
                        <div class="media-4 light" data-size="480x0"></div>
                        <div class="box-1">
                            <h3 class="heading-3 dark">Kosten vergelijken</h3>
                            <div class="text-3 dark">
                                <p>Diverse mediators informeren jou over de kosten. Zo kan jij makkelijk meerdere mediators vergelijken. De offertes zijn gratis.</p>
                            </div>
                            <div class="button-wrapper">
                                <div class="button-5 dark" onclick="openByClick(event);">Begin direct</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-2 col-md-4">
                    <div class="card-4 light-shade">
                        <div class="media-4 light" data-size="480x0"></div>
                        <div class="box-2">
                            <h3 class="heading-3 dark">Gratis eerste gesprek</h3>
                            <div class="text-3 dark">
                                <p>Een ervaren mediator inventariseert de situatie en vertelt je wat de kosten zouden zijn. Dit is volledig gratis en vrijblijvend.</p>
                            </div>
                            <div class="button-wrapper">
                                <a class="button-5 dark" onclick="openByClick(event);">Vraag aan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-3 col-md-4">
                    <div class="card-4 light-shade">
                        <div class="media-4 light" data-size="480x0"></div>
                        <div class="box-3">
                            <h3 class="heading-3 dark">Offertes opvragen</h3>
                            <div class="text-3 dark">
                                <p>Tarieven van mediators kunnen verschillen en zijn afhankelijk van de situatie. Vergelijk gratis offertes van mediators.</p>
                            </div>
                            <div class="button-wrapper">
                                <a class="button-5 dark" onclick="openByClick(event);">Vergelijk mediators</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="block-90-2938956" class="light">
        <div class="container">
            <div class="row">
                <div class="col col-1">
                    <div class="box-1">
                        <h2 class="heading-2 has-sub dark">Wat kost een mediator?</h2>
                        <h3 class="heading-3 dark">Lees hoe de kosten worden samengesteld</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-2 col-md-5 col-lg-4">
                    <div class="box-2">
                        <div class="text-2 dark">
                            <h3 class="heading-3 dark">Mediatorskosten in het kort</h3>
                            <p>Een mediator is vrij om te bepalen op welke manier hij/zij kosten rekent voor het traject.</p>
                            <p>Een deel van de mediators werkt op basis van een vaste prijs (fixed fee). Een ander deel van de mediators werkt op basis van kosten per sessie, waarbij het aantal sessies variabel is.</p>
                            <p>De precieze kosten zijn afhankelijk van de duur van het traject. Een korter traject (minder mediationsessies) is goedkoper dan een langer mediationtraject.</p>
                        </div>
                    </div>
                </div>
                <div class="col col-3 col-md-7 col-lg-8">
                    <div class="box-3">
                        <div class="text-2 dark">
                            <p>Een mediator is de neutrale gids bij het oplossen van een probleemsituatie. Die situatie kan een echtscheiding zijn, waarbij bijvoorbeeld een alimentatieplan en/of ouderschapsplan moeten worden opgesteld. Het kan eveneens een arbeidsconflict zijn, waarbij werkgever en werknemer in een onwerkbare situatie terechtgekomen zijn. Een ander voorbeeld is een familieconflict, waarbij meerdere familieleden een conflict hebben en er wel een behoefte is om dat op te lossen. De kosten zijn geheel afhankelijk van de situatie. Zodoende zijn de kosten van mediation vaak maatwerk.</p>

                            <h3 class="heading-3 dark">Mediation is vaak de voordelige keuze</h3>

                            <p>Een beeld wat veel mensen hebben is dat scheiden duur is. Dure advocaten die het traject van uit elkaar gaan tot een langlopend, prijzig proces maken. Dat is precies hoe het nog steeds is, waardoor (met name) een zogenaamde vechtscheiding alleen maar verliezers kent. Een mediator is de voordelige, fijne oplossing die hoge advocatenkosten kan voorkomen. De mediator zoekt naar oplossingen die voor beide partijen akkoord zijn, zodat alles in goed overleg geregeld wordt.</p>

                            <p>Ook bij andere conflicten kan een mediator een voordelige keuze blijken. Als een conflict dermate is vastgelopen dat goed overleg niet meer mogelijk is, dan kan mediation een uitkomst bieden. Een kleiner conflict gaat gepaard met lagere kosten, waardoor de kosten van mediation vaak beperkt zijn. Het is daarom altijd verstandig om in ieder geval informatie in te winnen over de kosten van een mediator. Doordat het maatwerk is, is het vrijblijvend opvragen van tarieven de kortste route.</p>

                            <h3 class="heading-3 dark">Hoe zijn de kosten opgebouwd?</h3>

                            <p>Een mediator is vrij om zijn/haar tarieven te bepalen en de manier waarop die tarieven berekent worden. Sommige mediators hanteren een vaste prijs. Dat wil zeggen: je geeft aan om wat voor soort situatie het gaat, hoe de situatie er nu voor staat en wat de gewenste uitkomst is. De mediator kan daarvoor een vaste prijs geven, bijvoorbeeld 600,- euro of 1.500,- euro. Andere mediators rekenen een bedrag per uur of per sessie. Ook zij schatten de situatie in, bijvoorbeeld op 4 sessies of 12 sessies en geven zodoende een sessiegebaseerde prijs af. Hoe dan ook worden de kosten bepaald door het conflict zelf. Partners die besluiten uit elkaar te gaan en die op goede voet met elkaar staan, hebben minder sessies nodig dan scheidende partners tussen wie de communicatie aanzienlijk moeilijker gaat.</p>

                            <h3 class="heading-3 dark">Vaste prijs (fixed fee) of per sessie?</h3>

                            <p>In de praktijk ontlopen de manieren om een prijs vast te stellen (vaste prijs of per sessie) elkaar niet veel. Het belangrijkste is de inventarisatie die de mediator van de situatie maakt. Het is verstandig om door meerdere mediators een inschatting te laten maken, zodat duidelijk is hoe de mediators de duur van het traject inschatten. Daar komen prijzen uitrollen die daadwerkelijk te vergelijken zijn. De mediators die zijn aangesloten bij MediatorsVergelijken.nl bieden allen een gratis eerste gesprek aan, zodat er vrijblijvend inzicht is in prijs én de persoonlijke klik. Op basis daarvan kan veilig besloten worden of mediation de juiste keuze is om tot een oplossing te komen.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="block-45-1 dark">
        <div class="carousel">
            <div class="viewport">
                <div class="items">
                    <article>
                        <div class="media-4 dark" data-size="1920x0">
                            <img src="{{ asset('img/kruispunt-1920.webp') }}" srcset="{{ asset('img/kruispunt-480.webp') }} 480w, {{ asset('img/kruispunt-960.webp') }} 960w, {{ asset('img/kruispunt-1920.webp') }} 1920w" sizes="(max-width: 480px) 480px, (max-width: 960px) 960px, 1920px" alt="Bankje">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="box">
                                        <div class="heading-1 light">Vergelijk kosten van mediators</div>
                                        <div class="button-wrapper">
                                            <a class="button-3 light" onclick="openByClick(event);">Gratis gesprek aanvragen</a>
                                            <div class="button-1 light" onclick="openByClick(event);">Tarieven vergelijken</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <section class="block-126-1 light">
        <div class="container">
            <div class="row">
                <div class="col col-1 col-md-5">
                    <div class="media-2 dark" data-size="480x0">
                        <img src="{{ asset('img/consulting-480.webp') }}" srcset="{{ asset('img/consulting-480.webp') }} 480w, {{ asset('img/consulting-960.webp') }} 960w" sizes="(max-width: 480px) 480px, (max-width: 767px) 767px, (max-width: 960px) 480px, 960px">
                    </div>
                </div>
                <div class="col col-2 col-md-7">
                    <div class="heading-2 dark">Waarom mediators vergelijken?</div>
                    <div class="text-3 dark">
                        <p>De kosten van mediation zijn afhankelijk van de mediator. Dit is hoe wij jou helpen om gericht te vergelijken:</p>
                    </div>
                    <div class="box-1">
                        <article class="box-2">
                            <div class="icon-1 dark" data-no_fill_color="no_fill_color">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#207227" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/></svg>
                            </div>
                            <div class="box-3">
                                <div class="heading-4 dark">Geef je situatie aan</div>
                                <div class="text-4 dark">
                                    <p>Je vult eenmalig in wat jouw situatie is: om wat voor soort kwestie gaat het en zijn alle partijen bereid om mee te werken aan mediation?</p>
                                </div>
                            </div>
                        </article>
                        <article class="box-2">
                            <div class="icon-1 dark" data-no_fill_color="no_fill_color">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#207227" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/></svg>
                            </div>
                            <div class="box-3">
                                <div class="heading-4 dark">Mediators inventariseren je situatie</div>
                                <div class="text-4 dark">
                                    <p>De mediators inventariseren jouw situatie, zodat duidelijk is hoeveel sessies nodig zullen zijn om tot een goede oplossing te komen voor alle partijen.</p>
                                </div>
                            </div>
                        </article>
                        <article class="box-2">
                            <div class="icon-1 dark" data-no_fill_color="no_fill_color">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#207227" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/></svg>
                            </div>
                            <div class="box-3">
                                <div class="heading-4 dark">Vergelijk kosten en mogelijkheden</div>
                                <div class="text-4 dark">
                                    <p>De mediators vertellen je welke kosten gepaard zouden gaan met het traject, zodat je een duidelijk beeld hebt van wat mediation in jouw geval zou kosten.</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="block-145-1 light-shade">
        <div class="container">
            <div class="row">
                <article class="col col-md-4">
                    <div class="card-3 light">
                        <div class="box-1">
                            <div class="box-2">
                                <div class="heading-4 dark">Steven zegt</div>
                                <div class="text-4 dark">
                                    <p>"Wij kregen een fixed fee aanbod en een tarief per sessie-aanbod. De tool heeft ons geholpen duidelijkheid te krijgen over kosten."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col col-md-4">
                    <div class="card-3 light">
                        <div class="box-1">
                            <div class="box-2">
                                <div class="heading-4 dark">Bauke zegt</div>
                                <div class="text-4 dark">
                                    <p>"Mijn ex en ik wilden het allemaal gewoon normaal regelen zonder advocaten. Een mediator bleek qua kosten de beste keuze."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col col-md-4">
                    <div class="card-3 light">
                        <div class="box-1">
                            <div class="box-2">
                                <div class="heading-4 dark">An zegt</div>
                                <div class="text-4 dark">
                                    <p>"De prijsverschillen waren niet enorm, maar de klik met de mediators wel. Wij kozen uiteindelijk de persoon, niet de prijs."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <section id="block-8-2950293" class="light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="box">
                        <h2 class="heading-2 has-sub dark">Kosten van mediators vergelijken?</h2>
                        <h3 class="heading-3 dark">Geef je voorkeuren aan en vraag tarieven op</h3>
                        <div class="button-wrapper">
                            <div class="button-3 dark" onclick="openByClick(event);">Beginnen</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection