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
    <div class="heading-strip bg-2">
        <h3>{{$page->title}}</h3>
        <p>{{$page->excerpt}}</p>
        <i class="ion-help-buoy"></i>
        <div class="overlay dark-overlay"></div>
    </div>

    <div class="decoration decoration-margins no-bottom"></div>

    <div class="content">
        <div class="one-half-responsive">
            {!! setting('faq.content') !!}
        </div>
        <div class="clear"></div>
    </div>
@endsection