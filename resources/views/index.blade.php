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
    <div class="store-slider-2 container-fullscreen no-bottom">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="{{setting('slide.a_1')}}"><img src="{{Voyager::image(setting('slide.image_1'))}}" alt="{{setting('slide.title_1')}}" class="responsive-image"></a>
                <div class="store-slider-item-description content">
                    <h3>{{title_case(setting('slide.title_1'))}}</h3>
                    <p>
                        {{setting('slide.content_1')}}
                    </p>
                    <div class="demo-socials">
                        <a href="https://api.whatsapp.com/send?phone={{setting('contact.phone')}}&text=I want to know the price of {{setting('slide.title_1')}}" class="button button-icon  sms-bg"><i class="ion-social-whatsapp"></i>Get Price By Whatsapp</a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <a href="{{setting('slide.a_2')}}"><img src="{{Voyager::image(setting('slide.image_2'))}}" alt="{{setting('slide.title_2')}}" class="responsive-image"></a>
                <div class="store-slider-item-description content">
                    <h3>{{title_case(setting('slide.title_2'))}}</h3>
                    <p>
                        {{setting('slide.content_2')}}
                    </p>
                    <div class="demo-socials">
                        <a href="https://api.whatsapp.com/send?phone={{setting('contact.phone')}}&text=I want to know the price of {{setting('slide.title_2')}}" class="button button-icon  sms-bg"><i class="ion-social-whatsapp"></i>Get Price By Whatsapp</a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="decoration"></div>

    <div class="content">
        <div class="container heading-style">
            <h4 class="heading-title">Products Categories</h4>
            <i class="ion-ios-cart heading-icon"></i>
            <div class="line bg-black"></div>

        </div>

        <div class="store-items">
            @foreach($product_categories as $product_category)
            <div class="store-item">
                <a href="/product_category/{{$product_category->slug}}"><img src="{{Voyager::image($product_category->image)}}" alt="{{$product_category->name}}"></a>
                <strong>{{title_case($product_category->name)}}</strong>
            </div>
            @endforeach
            <div class="clear"></div>
        </div>

        <div class="decoration"></div>

        <div class="one-half-responsive">
            <div class="content">
                <h1 class="thin center-text">About Us</h1>
                <p class="center-boxed-text center-text">
                    {{setting('index.about_us')}}
                </p>
                <img data-original="{{Voyager::image(setting('index.about_us_image'))}}" alt="about us" class="preload-image responsive-image" src="{{Voyager::image(setting('index.about_us_image'))}}" >
            </div>
        </div>

        <div class="decoration"></div>

        <div class="container heading-style">
            <h4 class="heading-title">Hot Products</h4>
            <i class="ion-ios-cart heading-icon"></i>
            <div class="line bg-black"></div>
        </div>

        <div class="store-item-list">
            @foreach($featured_products as $featured_product)
            <a href="/product/{{$featured_product->slug}}">
                <img src="{{image_small(Voyager::image($featured_product->image))}}" alt="{{$featured_product->name}}">
                <strong>{{title_case($featured_product->name)}}</strong>
                <em>
                    {{$featured_product->excerpt}}
                </em>
            </a>
            @endforeach
        </div>
    </div>
@endsection