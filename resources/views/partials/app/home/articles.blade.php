<section id="articles" class="mt-4">
    <a href="{{  route('app.articles.index') }}"
       class="appointment d-flex flex-column align-items-center justify-content-center"
       style="background-image: url(../images/about-2.jpg)">
        <h2 class="appointment__title">@lang('pages.articles.title')</h2>
    </a>
    {{-- <figure class="tabs-image d-none d-md-block lozad"
             data-background-image="{{ $articles->first()->banner }}"></figure>--}}
    <div class="container-fluid mt-4">
        <div class="row no-gutters categories">
            @foreach($articles as $article)
                <div class="col-md-6 col-lg-4 mb-5">
                    <a href="{{ route('app.articles.show', $article) }}"
                       class="category category--medium">
                        <figure class="category__image mb-3 lozad"
                                data-background-image="{{ $article->preview }}"></figure>

                        <h5 class="mb-0 text-center">{{ $article->translate('title') }}</h5>
                    </a>
                    {{--<article class=" py-4 {{ $loop->index == 0 ? 'is-active' : '' }}"
                             tabindex="{{ $loop->iteration }}" data-image="{{ $article->banner }}">
                        <h5 class="mb-2">{{ $article->translate('title') }}</h5>
                        <div class="tabs-item__description mb-1">{{ remove_tags($article->translate('body')) }}</div>
                        <a href="{{ route('app.articles.show', $article) }}" class="read-more">
                            @lang('pages.articles.readmore')
                        </a>
                    </article>--}}
                </div>
            @endforeach
        </div>
        <div class="mt-2 text-center">
            <a href="{{ route('app.articles.index') }}" class="btn btn-primary h4 px-4 py-3 mb-0">
                <i class="material-icons mr-2">assignment</i>
                @lang('pages.home.articles.button')
            </a>
        </div>
    </div>
</section>
