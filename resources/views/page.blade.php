@extends('master')
@section('seo_title')
    @if(!$page->seo_title)
        {{$page->title}}
    @else
        {{$page->seo_title}}
    @endif
@endsection
@section('description')
    @if(!$page->meta_description)
        {{$page->excerpt}}
    @else
        {{$page->meta_description}}
    @endif
@endsection
@section('meta_keywords',$page->meta_keywords)

@section('content')

    <div class="decoration decoration-margins"></div>

    <div class="content">
        <h3 class="half-bottom">
            {{$page->title}}
        </h3>

        <div class="decoration"></div>
        {!! $page->body !!}
    </div>
@endsection