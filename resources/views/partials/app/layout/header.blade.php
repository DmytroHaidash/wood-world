<header id="app-header">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-auto">
                <a href="{{ url('/') }}"
                   class="header-logo">
                    {{--<figure style="background-image: url(../images/logo-white.png)"></figure>--}}
                    <svg width="100" height="100">
                        <use xlink:href="#logo"></use>
                    </svg>
                </a>
            </div>

            <div class="col">
                <form action="{{ route('app.search') }}" class="search d-flex align-items-center">
                    <button class="btn btn-search material-icons mr-4">search</button>
                    <input type="text" name="q" autocomplete="none" class="form-control form-control--global-search"
                           placeholder="{{ trans('pages.catalog.search.placeholder') }}" required>
                </form>
            </div>

            <div class="col-auto">
                <div class="locale-selector  align-items-center">
                    {{--@foreach(config('app.locales') as $locale)
                        @if (app()->getLocale() === $locale)
                            <span class="locale-selector__item is-active">{{ $locale }}</span>
                        @else
                            <a href="{{ route('app.locale', [$locale]) }}"
                               class="locale-selector__item">{{ $locale }}</a>
                        @endif
                    @endforeach--}}
                    <a href="#search" class="material-icons nav-link nav-search-icon" data-search>search</a>
                </div>
            </div>

            <div class="col-auto">
                <div class="burger-menu d-flex flex-column justify-content-center align-items-center position-relative">
                    <div class="line line--top"></div>
                    <div class="line line--middle"></div>
                    <div class="line line--bottom"></div>
                    <div class="line line-close line--left"></div>
                    <div class="line line-close line--right"></div>
                </div>
            </div>
        </div>
        <div class="menu">
            <ul class="menu-nav-list list-unstyled">
                @foreach(app('nav')->frontend() as $item)
                    <li class="menu-nav-list-item">
                        <a href="{{ $item->route }}" class="menu-nav-list-item__link">
                            {!! $item->name !!}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</header>
