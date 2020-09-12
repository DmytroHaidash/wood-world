<div class="catalog-filters">
    <h6 class="ml-2 text-white d-flex align-items-center">
        @lang('pages.catalog.filter.title')
    </h6>

    <div class="mb-4 ml-2">
        @if ($categories->count())
            @foreach($categories as $category)
                <a href="?category={{ $category->slug }}"
                   class="mb-2 d-inline-flex align-items-center btn {{request('category')== $category->slug ? 'btn-primary-active': 'btn-primary'}}">

                    {{ $category->title }}
                </a>

            @endforeach
            @if(request()->filled('category'))
                <a href="{{ url()->current() }}" class="mb-2 d-inline-flex align-items-center btn btn-primary">
                    @lang('pages.catalog.filter.clear')
                </a>
            @endif
        @endif
    </div>
</div>