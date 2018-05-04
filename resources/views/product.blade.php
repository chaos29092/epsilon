@extends('master')
@section('seo_title')
    @if(!$product->seo_title)
        {{$product->name}}
    @else
        {{$product->seo_title}}
    @endif
@endsection
@section('description')
    @if(!$product->meta_description)
        {{$product->excerpt}}
    @else
        {{$product->meta_description}}
    @endif
@endsection
@section('meta_keywords',$product->meta_keywords)

@section('dataLayer_push')
    <script>
        dataLayer.push({
            'ecommerce': {
                'impressions': [
                        @foreach($related_products as $related_product)
                    {
                        'name': '{{$related_product->name}}',
                        'id': '{{$related_product->product_code}}',
                        'price': '{{$related_product->price}}',
                        'category': '{{$related_product->product_category_id}}',
                        'list': 'Related Products',
                        'position': {{$loop->iteration}}
                    },
                    @endforeach
                ],
                'detail': {
                    'products': [{
                        'name': '{{$product->name}}',       // Name or ID is required.
                        'id': '{{$product->product_code}}',
                        'price': '{{$product->price}}',
                        'category': '{{$product->product_category_id}}'
                    }]
                }
            }});
    </script>
@endsection

@section('content')
    <div class="heading-strip bg-2">
        <h3>{{title_case($product->name)}}</h3>
        <p>{{$product->excerpt}}</p>
        <i class="ion-cube"></i>
        <div class="overlay dark-overlay"></div>
    </div>
    <div class="decoration decoration-margins"></div>

    <div class="content-fullscren">
        <div class="full-bottom">
            <div class="swiper-wrapper">
                <a href="#" class="swiper-slide store-slider-item">
                    <img class="responsive-image no-bottom" src="{{Voyager::image($product->image)}}" alt="{{$product->image}}">
                </a>
            </div>
        </div>
    </div>

    <div class="content full-bottom">
        <div>
            <a href="https://api.whatsapp.com/send?phone=8618538153651&text=Hello, I want to know the price of {{$product->name}}" onclick="(function (){
                    dataLayer.push({
                    'event': 'productPurchase',
                        'ecommerce': {
                            'purchase': {
                                'actionField': {
                                    'id': uuidv4(),
                                    'affiliation': 'Product Whatsapp 1'
                    },
                    'products': [{
                        'name': '{{$product->name}}',
                        'id': '{{$product->product_code}}',
                        'price': '{{$product->price}}',
                        'category': '{{$product->product_category_id}}',
                        'quantity': 1
                    }]
                    }}
                    });
                    })()" class="button button-icon button-green button-round button-full button-xs no-bottom"><i class="ion-social-whatsapp"></i>Get Price Through WhatsApp Now!</a>
        </div>
        <div class="clear"></div>

        <div class="decoration half-bottom full-top"></div>

        <div class="store-product-description">
            {!! $product->body !!}
        </div>
        <div class="decoration"></div>
        <div>
            <a href="https://api.whatsapp.com/send?phone=8618538153651&text=Hello, I want to know the price of {{$product->name}}" onclick="(function (){
                    dataLayer.push({
                    'event': 'productPurchase',
                    'ecommerce': {
                    'purchase': {
                    'actionField': {
                    'id': uuidv4(),
                    'affiliation': 'Product Whatsapp 2'
                    },
                    'products': [{
                    'name': '{{$product->name}}',
                    'id': '{{$product->product_code}}',
                    'price': '{{$product->price}}',
                    'category': '{{$product->product_category_id}}',
                    'quantity': 1
                    }]
                    }}
                    });
                    })()" class="button button-icon button-green button-round button-full button-xs no-bottom"><i class="ion-social-whatsapp"></i>Get Price Through WhatsApp</a>
        </div>
        <div class="clear"></div>
        <div class="decoration"></div>

        <div class="store-product-separator">
            <h5>Aditional Information</h5>
        </div>

        <div class="store-product-notes full-bottom">
            {!! $product->parameter !!}
            <div class="clear"></div>
        </div>

        <div class="decoration"></div>

        <div class="store-product-separator">
            <h5>Similar Product</h5>
            {{--<a href="#">See All</a>--}}
        </div>

        <div class="category-slider">
            <div class="swiper-wrapper full-bottom">
                @foreach($related_products as $related_product)
                <a class="swiper-slide" href="/product/{{$related_product->slug}}" onclick="(function (){
                        dataLayer.push({
                        'event': 'productClick',
                        'ecommerce': {
                        'click': {
                        'actionField': {'list': 'Related Products'},
                        'products': [{
                        'name': '{{$related_product->name}}',
                        'id': '{{$related_product->product_code}}',
                        'price': '{{$related_product->price}}',
                        'category': '{{$related_product->product_category_id}}',
                        'position': {{$loop->iteration}}
                        }]}},
                        'eventCallback': function() {
                        document.location = '/product/{{$related_product->slug}}'
                        }
                        });
                        })()">
                    <img class="responsive-image" src="{{image_small(Voyager::image($related_product->image))}}" alt="{{$related_product->name}}">
                    <em>{{title_case($related_product->name)}}</em>
                </a>
                @endforeach
            </div>
        </div>
        <div class="decoration no-bottom"></div>
        <a href="/faq" class="default-link line-link">FAQ <i class="ion-ios-arrow-right"></i></a>
        <a href="/contact_us" class="default-link line-link">Contact Us <i class="ion-ios-arrow-right"></i></a>
        <a href="https://api.whatsapp.com/send?phone=8618538153651&text=Hello, I want to know the price of {{$product->name}}" onclick="(function (){
                dataLayer.push({
                'event': 'productPurchase',
                'ecommerce': {
                'purchase': {
                'actionField': {
                'id': uuidv4(),
                'affiliation': 'Product Whatsapp 3'
                },
                'products': [{
                'name': '{{$product->name}}',
                'id': '{{$product->product_code}}',
                'price': '{{$product->price}}',
                'category': '{{$product->product_category_id}}',
                'quantity': 1
                }]
                }}
                });
                })()" class="default-link line-link">Get Price Through WhatsApp Now!<i class="ion-ios-arrow-right"></i></a>
    </div>
@endsection