@extends('layouts.app', ['page_title' => trans('pages.thanks.title')])

@section('breadcrumbs')
    <li>
        <span>@lang('pages.thanks.title')</span>
    </li>
@endsection

@section('content')

    <section id="content">
        <div class="container text-center">
            <h1>@lang('pages.thanks.title')</h1>

            @if (session()->has('message') && session()->has('product'))
                <p>@lang(session()->get('message'), ['product' => session()->get('product')->translate('title')])</p>
            @else
                <p>@lang(session()->get('message'))</p>
            @endif
            <span>@lang('pages.thanks.description')</span>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <a href="{{route('app.home')}}" class="btn btn-outline-primary">@lang('pages.thanks.btn')</a>
        </div>
    </section>

@endsection