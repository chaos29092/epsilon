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
    <div class="content-center">
        <div class="page-soon">
            <h1>{{title_case($page->title)}}</h1>
            <h2>{{title_case($page->excerpt)}}</h2>
            <p>
                {{$page->body}}
            </p>
            <div class="countdown-class"></div>
            <div class="clear"></div>
            <a href="/" class="scale-hover color-gray-dark border-gray-dark"><i class="ion-android-home"></i></a>
        </div>
    </div>
    <div class="coverpage-clear"></div>
@endsection