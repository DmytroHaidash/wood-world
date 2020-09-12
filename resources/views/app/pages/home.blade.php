@extends('layouts.app', ['page_title' => trans('pages.home.title'), 'header_class' => 'is-light'])

@section('content')

    {{--@includeWhen(isset($slides) && $slides->count(), 'partials.app.home.slider')--}}
    @includeWhen($categories->count(), 'partials.app.home.categories')
    @include('partials.app.home.about')
    @if ($popular->count())
        <a href="{{ route('app.catalog.index') }}" class="appointment d-flex flex-column align-items-center justify-content-center mt-4"
           style="background-image: url(../images/about-2.jpg)">
            <h2 class="appointment__title">@lang('pages.product.popular')</h2>
        </a>
        <div class="container mt-4">
            <div class="row justify-content-center">
                @foreach($popular as $item)
                    <div class="col-md-6 col-lg-3">
                        <article class="mb-4">
                            <a href="{{ route('app.catalog.show', $item) }}" class="product-preview">
                                <figure class="product-preview__image-home lozad"
                                        data-background-image="{{ $item->preview }}"></figure>
                                <div class="product-preview__info p-3">
                                    <div class="mb-auto">
                                        <h5 class="mb-1">{{ $item->translate('title') }}</h5>
                                    </div>

                                    <h6 class="mb-0 text-primary">
                                        {{ $item->price }}
                                        <small class="text-uppercase currency">
                                            @lang('common.currency')
                                        </small>
                                    </h6>
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