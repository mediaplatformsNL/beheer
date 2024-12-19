<!DOCTYPE html>
<html lang="nl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mediators Vergelijken - @yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <meta name="google-site-verification" content="9dff2_PAv32aMkBHxyW-fDiHld7OoXqBS3YoloV9OCk" />
    <meta name="robots" CONTENT="@yield('robots')" />
    <base href="www.mediatorsvergelijken.nl">

    <!-- Favicon & Apple Touch Icon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png" />
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS -->
    <style>
        {!! file_get_contents('https://fonts.googleapis.com/css?family=Amaranth:400,400i') !!}
        {!! file_get_contents(public_path('css/website.css')) !!}
        {!! file_get_contents(public_path('css/page-356681.css')) !!}
        {!! file_get_contents(public_path('css/form_style.css')) !!}
        {!! file_get_contents(public_path('css/custom.css')) !!}
    </style>
    @stack('stylesheets')

    @if (env('APP_ENV') == 'production')
        <!-- Global site tag (gtag.js) - Google Ads: 455702789 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-455702789"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'AW-455702789');
        </script>
    @endif
</head>
<body>
    <div id="viewport">
        <div class="page" id="@yield('page_id')">
            @yield('content')
            @include('elements.footer')
        </div>
    </div>
    <div id="form"
         data-array="fieldsets_mediators"
         data-branche_id="20"
         data-domain="MediatorsVergelijken.nl"
         data-form_id="applicationform"
         data-zapier_url="https://hooks.zapier.com/hooks/catch/2389105/oc1hchz/"
         data-multistep="modal"
         data-modal_backdrop="form_backdrop"
         data-modal="form_modal"
         data-click_radio
         data-effect="fade_effect"
         data-min_height="433"
         data-submit_text="Verzenden"
         data-opened_by_links
         data-redirect="https://mediatorsvergelijken.nl/bevestig-je-aanvraag"
         data-progressbar
         data-ip="{{ !empty($_SERVER['HTTP_CF_CONNECTING_IP']) ? $_SERVER['HTTP_CF_CONNECTING_IP'] : $_SERVER['REMOTE_ADDR'] }}"
    >
    </div>

    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    @stack('inline-scripts')
</body>
</html>