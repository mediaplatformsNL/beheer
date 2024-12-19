@extends('page')

@section('title', 'Mediators Vergelijken - Vind een Geschikte Mediator')
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
                                <strong>Vergelijk mediators. Gratis eerste gesprek.</strong>
                            </span>
                        </div>
                        <div class="text-1 light">
                            <p>Hulp nodig met het oplossen van een conflict? Een mediator is de vriendelijke en voordelige keuze. Wie kies je en waarom? Wij helpen je een geschikte mediator te vinden.</p>
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
                            <h3 class="heading-3 dark">Tarieven vergelijken</h3>
                            <div class="text-3 dark">
                                <p>Ervaren mediators informeren jou over hun tarieven. Zo kan jij makkelijk meerdere mediators vergelijken. De offertes zijn gratis.</p>
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
                                <p>Een ervaren mediator inventariseert de situatie en vertelt je wat de kosten en aanpak zouden zijn. Dit is volledig gratis en vrijblijvend.</p>
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
                            <h3 class="heading-3 dark">De juiste klik vinden</h3>
                            <div class="text-3 dark">
                                <p>Meerdere mediators introduceren zichzelf. Kom erachter met wie jij de beste klik hebt, zodat je de juiste persoon kiest.</p>
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
                        <h2 class="heading-2 has-sub dark">Op zoek naar een mediator?</h2>
                        <h3 class="heading-3 dark">Let op waar je rekening mee moet houden</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-2 col-md-5 col-lg-4">
                    <div class="box-2">
                        <div class="text-2 dark">
                            <h3 class="heading-3 dark">Meerwaarde van een mediator</h3>
                            <p>Een mediator is de vriendelijke oplossing om een conflictsituatie voor alle betrokkenen naar wens op te lossen.</p>
                            <p>De kosten van een mediator zijn aanzienlijk lager dan die van een advocaat, waardoor de keuze voor een mediator bovendien de voordelige keuze is om tot een eindoplossing te komen.</p>
                        </div>
                    </div>
                </div>
                <div class="col col-3 col-md-7 col-lg-8">
                    <div class="box-3">
                        <div class="text-2 dark">
                            <p>Een mediator helpt een conflictsituatie op te lossen, bijvoorbeeld een scheiding, een familieconflict of een conflict tussen werkgever en werknemer. De mediator neemt daarbij een onpartijdige rol in, met als doel een eindoplossing te vinden waar alle partijen zich in kunnen vinden. De eindoplossing kan (afhankelijk van de situatie) bijvoorbeeld een vaststellingsovereenkomst of een schriftelijke eindovereenkomst zijn. Vanuit de neutrale rol zorgt de mediator dat alle betrokken partijen tevreden zijn met het eindresultaat.</p>

                            <h3 class="heading-3 dark">Mediator als vriendelijke, voordelige oplossing</h3>

                            <p>Het meest voorkomende conflict waar een mediator voor wordt ingeschakeld is een scheiding. De keuze voor een mediator is niet alleen veel vriendelijker dan de gang naar de rechter, het is ook een aanzienlijk voordeligere keuze. De mediator handelt in het belang van beide partners, waardoor alles in goed overleg geregeld wordt. Dit in tegenstelling tot de gang naar de rechter, waarbij advocaten enkel het belang van hun cliënt dienen.</p>

                            <p>De nadruk ligt bij een mediator op het vinden van een passende oplossing voor beide partijen. In het geval van een scheiding is het doel om een prettige oplossing te vinden op basis van goed overleg, zodat een gerechtelijke oplossing niet nodig zal zijn. Vaak betekent dat dat de mediator ondersteunt bij de verdeling van bezittingen, het opstellen van een alimentatieplan en (indien van toepassing) het opstellen van een ouderschapsplan. Vanuit zijn/haar ervaring met eerdere scheidingstrajecten, kan de mediator bovendien aandachtspunten op tafel brengen die anders buiten beschouwing zouden blijven (bijvoorbeeld bij een scheiding met advocaten). De mediator neemt zodoende de rol van neutrale gids aan bij het regelen van de scheiding.</p>

                            <h3 class="heading-3 dark">Mediation mogelijk bij diverse type conflicten</h3>

                            <p>Een mediator kan ingeschakeld worden bij diverse soorten conflicten, zowel persoonlijk als zakelijk. Voorbeelden van persoonlijke conflicten zijn onenigheden tussen familieleden, vrienden, buren en partners. Voorbeelden van zakelijke conflicten zijn onenigheden tussen werkgevers / werkgevers, opdrachtgevers / opdrachtnemers, zakenpartners en leveranciers / afnemers. De mediator behartigt de belangen van beide partijen om in goed overleg tot een geschikte oplossing te komen.</p>

                            <h3 class="heading-3 dark">Bereidheid van betrokken partijen is van belang</h3>

                            <p>Mediation werkt alleen als alle betrokken partijen bereid zijn om mee te werken aan het traject. De mediator kan niet tot een oplossing komen als niet alle partijen 'aan tafel komen'. In sommige gevallen kan de mediator een rol spelen bij het ertoe bewegen van partijen tot het deelnemen aan het mediation-traject. Echter, het succes van het traject hangt af van een hoge mate van vrijwilligheid van de betrokkenen om tot een oplossing te willen komen.</p>

                            <h3 class="heading-3 dark">Hoe gaat mediation in zijn werk?</h3>

                            <p>De mediator inventariseert in eerste instantie de situatie. Welke partijen zijn bij het conflict betrokken, welke problemen staan centraal, hoe staat de situatie er nu voor en wat is de gewenste uitkomst? Via MediatorsVergelijken.nl is dit eerste gesprek altijd gratis en vrijblijvend. Op basis van het gratis eerste gesprek kan de mediator een goede inschatting maken van het aantal sessies dat nodig zal zijn om tot de gewenste uitkomst te komen. Zodoende is ook meteen duidelijk welke kosten ongeveer gepaard zullen gaan met het traject.</p>

                            <p>Als jij en de andere betrokkenen na het eerste gesprek daadwerkelijk van start willen gaan met het mediation-traject, wordt een tweede gesprek ingepland. Stapsgewijs zal de mediator beide partijen tot elkaar proberen te laten komen, zodat het einddoel bereikt kan worden: een eindoplossing waarin alle partijen zich kunnen vinden, inclusief (indien van toepassing) een schriftelijke vastlegging van alles wat de partijen tijdens het mediation-traject met elkaar overeen gekomen zijn.</p>
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
                                        <div class="heading-1 light">Vind direct een geschikte mediator</div>
                                        <div class="button-wrapper">
                                            <a class="button-3 light" onclick="openByClick(event);">Gratis gesprek aanvragen</a>
                                            <div class="button-1 light" onclick="openByClick(event);">Vergelijk mediators</div>
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
                        <p>Mediators verschillen in aanpak, communicatie en tarief. Dit is hoe wij zorgen dat jij de juiste mediator kiest:</p>
                    </div>
                    <div class="box-1">
                        <article class="box-2">
                            <div class="icon-1 dark" data-no_fill_color="no_fill_color">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#207227" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/></svg>
                            </div>
                            <div class="box-3">
                                <div class="heading-4 dark">Alleen ervaren mediators</div>
                                <div class="text-4 dark">
                                    <p>Een ervaren mediator weet de situatie goed te inventariseren en tot heldere en duidelijke oplossingen te komen voor alle partijen.</p>
                                </div>
                            </div>
                        </article>
                        <article class="box-2">
                            <div class="icon-1 dark" data-no_fill_color="no_fill_color">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#207227" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/></svg>
                            </div>
                            <div class="box-3">
                                <div class="heading-4 dark">Persoonlijke klik</div>
                                <div class="text-4 dark">
                                    <p>De persoonlijke klik is bij het kiezen van een mediator erg belangrijk. Doordat het eerste gesprek via ons altijd vrijblijvend is, krijg je een goed beeld.</p>
                                </div>
                            </div>
                        </article>
                        <article class="box-2">
                            <div class="icon-1 dark" data-no_fill_color="no_fill_color">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#207227" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/></svg>
                            </div>
                            <div class="box-3">
                                <div class="heading-4 dark">Soortgelijke situaties</div>
                                <div class="text-4 dark">
                                    <p>Wij koppelen jou alleen aan mediators die vergelijkbare situaties van anderen naar tevredenheid hebben afgehandeld. Daardoor maximaliseren we de kans op een goede uitkomst.</p>
                                </div>
                            </div>
                        </article>
                        <article class="box-2">
                            <div class="icon-1 dark" data-no_fill_color="no_fill_color">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#207227" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/></svg>
                            </div>
                            <div class="box-3">
                                <div class="heading-4 dark">Besparen op kosten</div>
                                <div class="text-4 dark">
                                    <p>Een mediator is bijna altijd de vriendelijke en voordelige keuze. Bij ons zijn enkel mediators aangesloten met een scherpe prijs/kwaliteit-verhouding.</p>
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
                                <div class="heading-4 dark">Jantine zegt</div>
                                <div class="text-4 dark">
                                    <p>"Ik ben blij dat onze redelijk uitzichtloze situatie toch weer op gang kwam dankzij de mediator die we hebben ingeschakeld."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col col-md-4">
                    <div class="card-3 light">
                        <div class="box-1">
                            <div class="box-2">
                                <div class="heading-4 dark">Marisol zegt</div>
                                <div class="text-4 dark">
                                    <p>"Ik was bang dat de scheiding regelen een kostbaar verhaal ging worden. Voor mijn gevoel heeft de keuze voor een mediator veel bespaard."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col col-md-4">
                    <div class="card-3 light">
                        <div class="box-1">
                            <div class="box-2">
                                <div class="heading-4 dark">Aart-Jan zegt</div>
                                <div class="text-4 dark">
                                    <p>"Ik had zelf niet verwacht dat de mediationsessies ook via Zoom konden. Heel modern en 2.0 in deze tijden van corona."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <section class="block-8-1 light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="box">
                        <h1 class="heading-2 has-sub dark"><span style="font-size: 32px;">Laatste artikelen</span></h1>
                    </div>
                </div>
            </div>
            <div id="blog_items" class="row">
                @foreach ($articles as $article)
                <div class="col col-12 col-md-4 col-blog">
                    <div class="blog_item">
                        <div class="image mb-4">
                            <a href="{{ route('article', $article->slug) }}">
                                <img src="{{ asset('img/blog/' . $article->slug . '-thumb.jpg') }}" class="img-fluid"  alt="{{ $article->title }}"/>
                            </a>
                        </div>
                        <h2 class="heading-3 dark">
                                {{ $article->title }}
                        </h2>
                        <div class="date">
                                {{ date('d-m-Y', strtotime($article->created_at)) }}
                        </div>
                        <div class="summary">
                                {{ $article->excerpt }}
                        </div>
                        <div class="read_more mt-3">
                            <a href="{{ route('article', $article->slug) }}">Lees meer</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="block-8-2950293" class="light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="box">
                        <h2 class="heading-2 has-sub dark">Hulp nodig bij een conflict?</h2>
                        <h3 class="heading-3 dark">Begin met het vergelijken van mediators</h3>
                        <div class="button-wrapper">
                            <div class="button-3 dark" onclick="openByClick(event);">Beginnen</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection