<form action="{{ route('app.catalog.index') }}" class="my-5">
    <div class="d-flex position-relative">
        <svg width="24" height="24" class="fill-current">
            <use xlink:href="#search"></use>
        </svg>
        <input type="search" name="search" class="form-control form-control--search"
               value="{{ old('search') ?? $search }}"
               placeholder="{{ trans('pages.catalog.search.placeholder') }}" required>
        <button class="btn btn-primary">@lang('pages.catalog.search.button')</button>
    </div>
</form>