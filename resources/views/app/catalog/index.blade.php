@extends('layouts.app', ['page_title' => $page->translate('title')])

@section('breadcrumbs')
    <li>
        <span>
            {{ $page->translate('title') }}
        </span>
    </li>
@endsection

@section('content')

    <section id="content">
        <div class="container">
            {{-- <div class="row">
                 <div class="col-md-4 col-lg-3">
                     @include('partials.app.catalog.filters')
                 </div>

                 <div class="col-md-8 col-lg-9">--}}
            <div class="container mx-0">
                <div class="flex align-items-center mb-5">
                    <h1 class="mb-0 h3 text-center">{{ $page->translate('title') }}</h1>
                    <div class="ml-5 flex-grow-1">
                        <hr>
                        @if ($page->hasTranslation('description'))
                            <p>{{ $page->translate('description') }}</p>
                        @endif
                    </div>
                </div>

                {{--@include('partials.app.catalog.search')--}}
                @include('partials.app.catalog.filters')
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-md-6 col-lg-4">
                            @include('partials.app.catalog.preview')
                        </div>
                    @empty
                        @lang('pages.catalog.not_found')
                    @endforelse
                </div>

                <div class="d-flex mt-4">
                    {{ $products->appends(request()->except('page'))->links() }}
                    <div class="ml-auto">
                        <a href="{{ route('app.catalog.index') }}" class="btn btn-primary ml-3">
                            {{--<i class="material-icons mr-3">all_inclusive</i>--}}
                            @if(request()->filled('category'))
                                @lang('pages.catalog.filter.clear')
                            @else
                                @lang('pages.catalog.all')
                            @endif
                        </a>
                    </div>
                </div>
            </div>
            {{--</div>
        </div>--}}
        </div>
    </section>

@endsection
