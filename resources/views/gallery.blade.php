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
    <div class="heading-strip bg-7">
        <h3>{{title_case($page->title)}}</h3>
        <p>{{$page->excerpt}}</p>
        <i class="ion-camera"></i>
        <div class="overlay dark-overlay"></div>
    </div>

    <div class="content half-bottom">
        <div class="gallery gallery-square no-bottom">
            @foreach($galleries as $gallery)
            <a class="show-gallery" href="{{Voyager::image($gallery->image)}}" title="{{$gallery->name}}">
                <img class="preload-image responsive-image" data-original="{{image_small(Voyager::image($gallery->image))}}" alt="{{$gallery->name}}" src="/images/empty.png">
            </a>
            @endforeach
            <div class="clear"></div>
        </div>
    </div>
@endsection