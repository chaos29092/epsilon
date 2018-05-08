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
        <div class="page-404">
            <h1>404</h1>
            <h2>{{title_case(__('main.page_not_found'))}}</h2>
            <p>
                {{title_case(__('main.page_404_content'))}}!
            </p>
            <a href="/" class="scale-hover color-gray-dark border-gray-dark"><i class="ion-android-home"></i></a>
        </div>
    </div>
    <div class="coverpage-clear"></div>
@endsection