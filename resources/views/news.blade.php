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
        <i class="ion-ios-paper-outline"></i>
        <div class="overlay dark-overlay"></div>
    </div>
    <div class="decoration decoration-margins"></div>

    <div class="content full-top">
        <div class="thumb-layout">
            @foreach($news as $new)
            <a href="/new/{{$new->slug}}">
                <img class="preload-image" data-original="{{image_small(Voyager::image($new->image))}}" alt="{{$new->name}}" src="/images/empty.png">
                <strong>{{$new->name}}</strong>
                <em>{{$new->excerpt}}</em>
            </a>
            <div class="decoration"></div>
            @endforeach
        </div>
        <a href="{{$news->nextPageUrl()}}" class="load-more-thumbs button button-full button-green">Next Page</a>
    </div>
@endsection