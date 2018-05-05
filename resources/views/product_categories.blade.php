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

@section('dataLayer_push')
    <script>
        dataLayer.push({
            'ecommerce': {
                'impressions': [
                        @foreach($featured_products as $featured_product)
                            {
                                'name': '{{$featured_product->name}}',
                                'id': '{{$featured_product->product_code}}',
                                'price': '{{$featured_product->price}}',
                                'category': '{{$featured_product->product_category_id}}',
                                'list': 'Hot Products',
                                'position': {{$loop->iteration}}
                            },
                        @endforeach
                    ]
            }
        });
    </script>
@endsection

@section('content')
    <div class="content">
        <div class="container heading-style">
            <h4 class="heading-title">{{$page->title}}</h4>
            <i class="ion-ios-cart heading-icon"></i>
            <div class="line bg-black"></div>

        </div>

        <div class="store-items">
            @foreach($product_categories as $product_category)
            <div class="store-item">
                <a href="/product_category/{{$product_category->slug}}"><img src="{{Voyager::image($product_category->image)}}" alt="{{$product_category->name}}"></a>
                <strong>{{title_case($product_category->name)}}</strong>
            </div>
                @if($loop->iteration%2 == 0)
                    <div class="clear"></div>
                @endif
            @endforeach
            <div class="clear"></div>
        </div>

        <div class="decoration"></div>

        <div class="container heading-style">
            <h4 class="heading-title">Hot Products</h4>
            <i class="ion-ios-cart heading-icon"></i>
            <div class="line bg-black"></div>
        </div>

        <div class="store-item-list">
            @foreach($featured_products as $featured_product)
            <a href="/product/{{$featured_product->slug}}" onclick="(function (){
                    dataLayer.push({
                    'event': 'productClick',
                    'ecommerce': {
                    'click': {
                    'actionField': {'list': 'Hot Products'},
                    'products': [{
                    'name': '{{$featured_product->name}}',
                    'id': '{{$featured_product->product_code}}',
                    'price': '{{$featured_product->price}}',
                    'category': '{{$featured_product->product_category_id}}',
                    'position': {{$loop->iteration}}
                    }]}},
                    'eventCallback': function() {
                    document.location = '/product/{{$featured_product->slug}}'
                    }
                    });
                    })()">
                <img src="{{image_small(Voyager::image($featured_product->image))}}" alt="{{$featured_product->name}}">
                <strong>{{title_case($featured_product->name)}}</strong>
            </a>
            @endforeach
        </div>
    </div>
@endsection