@extends('page')

@section('title', 'Kosten Mediator - Mediators Vergelijken')
@section('description', 'Op zoek naar een goede mediator? Vul je situatie en voorkeuren in en vergelijk tarieven van ervaren mediators. Gratis offertes vergelijken.')
@section('robots', 'index, follow')
@section('page_id', 'page-356681')

@prepend('scope', 'regular')

@push('vendor-stylesheets')
@endpush

@push('stylesheets')
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
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="block-8-1 light">
        <div class="container">
            <div id="blog_item" class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <h1 class="">{{ $article->title }} <span class="float-end back"><a onclick="history.back()">Terug</a></span></h1>
                    <div class="date mb-4">Datum: <?= date('d-m-Y', strtotime($article->created_at)) ?></div>
                    {!! $article->content !!}
                    <a href="{{ route('blog') }}" class="button-1 light mt-4">Naar het blog overzicht</a>
                </div>
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