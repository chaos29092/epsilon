@extends('master')
@section('seo_title')
    @if(!$product_category->seo_title)
        {{$product_category->name}}
    @else
        {{$product_category->seo_title}}
    @endif
@endsection
@section('description')
    @if(!$product_category->meta_description)
        {{$product_category->excerpt}}
    @else
        {{$product_category->meta_description}}
    @endif
@endsection
@section('meta_keywords',$product_category->meta_keywords)

@section('content')
    <div class="content">
        <div class="decoration"></div>

        <div class="container heading-style">
            <h4 class="heading-title">{{title_case($product_category->name)}}</h4>
            <i class="ion-ios-cart heading-icon"></i>
            <div class="line bg-black"></div>
            <p class="heading-subtitle">
                {{$product_category->meta_description}}
            </p>
        </div>

        <div class="store-item-list">
            @foreach($products as $product)
            <a href="/product/{{$product->slug}}">
                <img src="{{image_small(Voyager::image($product->image))}}" alt="{{$product->name}}">
                <strong>{{title_case($product->name)}}</strong>
                <em>
                    {{$product->excerpt}}
                </em>
            </a>
            @endforeach
        </div>

    </div>
@endsection