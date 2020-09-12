@extends('layouts.app', ['page_title' => $page->title])

@section('breadcrumbs')
    <li>
        <span>{{ $page->title }}</span>
    </li>
@endsection

@section('content')
    @if($page->hasMedia('pages'))
        <figure class="article-image lozad" data-background-image="{{ $page->getFirstMediaUrl('pages') }}">
        </figure>
    @endif
    <section id="content">
        <div class="container">
            {!! $page->body !!}
        </div>
    </section>

@endsection
