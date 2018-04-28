@extends('master')
@section('seo_title')
    @if(!$new->seo_title)
        {{$new->name}}
    @else
        {{$new->seo_title}}
    @endif
@endsection
@section('description')
    @if(!$new->meta_description)
        {{$new->excerpt}}
    @else
        {{$new->meta_description}}
    @endif
@endsection
@section('meta_keywords',$new->meta_keywords)

@section('content')
    <div class="heading-strip bg-5">
        <h3> {{title_case($new->name)}}</h3>
        <p> {{$new->excerpt}}</p>
        <i class="ion-ios-paper-outline"></i>
        <div class="overlay dark-overlay"></div>
    </div>
    <div class="decoration decoration-margins"></div>

    <div class="single-item half-bottom">
        <div class="swiper-wrapper">
            <div>
                <img class="responsive-image" src="{{Voyager::image($new->image)}}" alt="{{title_case($new->name)}}">
            </div>
        </div>
    </div>

    <div class="news-article-share full-bottom">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"><i class="facebook-color ion-social-facebook-outline"></i></a>
        <a href="tel:{{setting('contact.phone')}}"><i class="twitter-color ion-ios-telephone-outline"></i></a>
        <a href="sms:{{setting('contact.phone')}}"><i class="google-color ion-ios-chatbubble-outline"></i></a>
        <a href="https://api.whatsapp.com/send?phone={{setting('contact.phone')}}"><i class="whatsapp-color ion-social-whatsapp-outline"></i></a>
        <a href="mailto:{{setting('contact.email')}}"><i class="mail-color ion-ios-email-outline"></i></a>
        <div class="clear"></div>
    </div>

    <div class="decoration decoration-margins"></div>

    <div class="content">
        <h3 class="half-bottom">
            {{title_case($new->name)}}
        </h3>

        <div class="decoration"></div>
        {!! $new->body !!}
    </div>
@endsection