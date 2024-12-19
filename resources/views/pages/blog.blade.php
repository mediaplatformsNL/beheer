@extends('page')

@section('title', 'Blog - Mediators Vergelijken')
@section('description', '')
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
            <div class="row">
                <div class="col">
                    <div class="box">
                        <h1 class="heading-2 has-sub dark"><span style="font-size: 32px;">Blog</span></h1>
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
@endsection