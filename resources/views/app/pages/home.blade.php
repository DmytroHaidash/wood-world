@extends('layouts.app', ['page_title' => trans('pages.home.title'), 'header_class' => 'is-light'])

@section('content')

    {{--@includeWhen(isset($slides) && $slides->count(), 'partials.app.home.slider')--}}
    @includeWhen($categories->count(), 'partials.app.home.categories')
    @include('partials.app.home.about')
    @if ($popular->count())
        <a href="{{ route('app.catalog.index') }}"
           class="appointment d-flex flex-column align-items-center justify-content-center mt-4"
           style="background-image: url(../images/flow.jpg)">
            <h2 class="appointment__title">@lang('pages.product.popular')</h2>
        </a>
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                @foreach($popular as $item)
                    <div class="col-md-6 col-lg-3">
                        <article class="mb-4">
                            <a href="{{ route('app.catalog.show', $item) }}" class="product-preview">
                                <figure class="product-preview__image-home lozad"
                                        data-background-image="{{ $item->image }}" style="    background-position: 50% 50%;
    background-size: contain;"></figure>
                                <div class="product-preview__info p-3">
                                    <div class="mb-auto">
                                        <h5 class="mb-1">{{ $item->translate('title') }}</h5>
                                    </div>
                                    @if(app()->getLocale() == 'en')
                                        <h6 class="mb-0">
                                            {{ $item->price_usd }}
                                            <small class="text-uppercase currency">
                                                USD
                                            </small>
                                        </h6>
                                    @else
                                        <h6 class="mb-0">
                                            {{ $item->price }}
                                            <small class="text-uppercase currency">
                                                @lang('common.currency')
                                            </small>
                                        </h6>
                                    @endif
                                </div>
                            </a>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @includeWhen($articles->count(), 'partials.app.home.articles')
@endsection

@section('meta')
    <meta property="og:type" content="product.group">
    @includeIf('partials.app.layout.meta', ['meta' => $meta->meta()->first()])
    @foreach($categories as $category)
        @includeIf('partials.app.layout.meta', ['meta' => $category->meta()->first()])
        @if ($category->hasMedia('category'))
            <meta property="og:image" content="{{ $category->preview }}">
        @endif
    @endforeach
    @foreach($articles as $article)
        @includeIf('partials.app.layout.meta', ['meta' => $article->meta()->first()])
        @if ($article->hasMedia('articles'))
            <meta property="og:image" content="{{ $article->preview }}">
        @endif
    @endforeach
@endsection
