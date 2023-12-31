<footer id="app-footer">
    <div class="container">
        <div class="d-md-flex align-items-center footer-info">
            <div class="footer-logo pr-5">
                <a href="{{ url('/') }}" class="nav-link nav-link--logo">
                    <figure style="background-image: url(../images/logo-1.png)"></figure>
                </a>
            </div>
            <!--        </div>
                    <div class="d-md-flex align-items-center footer-info">-->
            <div class="flex-grow-1">
                <nav class="row font-weight-bold mb-5">
                    @foreach(app('nav')->frontendFooter() as $item)
                        <div class="col">
                            <a href="{{ $item->route }}">
                                {!! $item->name !!}
                            </a>
                        </div>
                    @endforeach
                </nav>

                <form action="{{ route('app.subscribe') }}" method="post" class="subscription-form">
                    @csrf

                    <p class="mb-0"><strong>@lang('common.footer.subscription.title')</strong></p>

                    <label for="subscription">@lang('common.footer.subscription.label')</label>
                    <div class="form-group mb-0 d-flex">
                        <input type="email" name="email" class="form-control">
                        <button class="btn btn-primary">@lang('common.footer.subscription.button')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="copyrights py-3">
        <div class="container text-center">
            &copy; {{ date('Y') }} @lang('common.footer.copyright')
        </div>
    </div>
</footer>