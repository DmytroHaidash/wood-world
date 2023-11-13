<div id="categories">
    <div class="container-fluid">
        {{--       <h2 class="h1 text-center mb-5">
                   @lang('pages.home.categories.title')
               </h2>
       --}}
        <div class="row no-gutters categories">
            @foreach($categories as $category)
                @if($loop->first || $loop->iteration == 2)
                    <div class="col-lg-6">
                        <a href="{{ route('app.catalog.index', ['category' => $category->slug]) }}"
                           class="category category--large">
                            <figure class="category__image mb-3 lozad"
                                    data-background-image="{{ $category->full }}"></figure>

                            <h5 class="mb-0 text-center">{{ $category->translate('title') }}</h5>
                        </a>
                    </div>
                @else
                    <div class="col-lg-4">
                        <a href="{{ route('app.catalog.index', ['category' => $category->slug]) }}"
                           class="category category--medium">
                            <figure class="category__image mb-3 lozad"
                                    data-background-image="{{ $category->full }}"></figure>

                            <h5 class="mb-0 text-center font-weight-bold">{{ $category->translate('title') }}</h5>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('app.catalog.index') }}" class="btn btn-primary h4 px-4 py-3 mb-0">
                <i class="material-icons mr-2">all_inclusive</i>
                @lang('pages.home.categories.button')
            </a>
        </div>
    </div>
</div>