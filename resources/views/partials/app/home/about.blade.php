<a href="{{ url('/about') }}" class="appointment d-flex flex-column align-items-center justify-content-center mt-4"
   style="background-image: url(../images/flow.jpg)">
    <h2 class="appointment__title">{{$about->title}}</h2>
</a>
<div class="container">
    <div class="mt-4 mb-4">
    {!! remove_tags($about->translate('body'), 500 ) !!}
    </div>

    <div class="text-center mt-5">
        <a href="{{ url('/about') }}" class="btn btn-primary h4 px-4 py-3 mb-0">
            @lang('pages.about.button')
        </a>
    </div>
</div>