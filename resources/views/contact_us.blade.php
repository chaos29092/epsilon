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
    {{--<div class="content-fullscreen">--}}
        {{--<iframe class="responsive-image maps no-bottom" src="https://maps.google.com/?ie=UTF8&amp;ll=47.595131,-122.330414&amp;spn=0.006186,0.016512&amp;t=h&amp;z=17&amp;output=embed"></iframe>--}}
        {{--<a href="pageapp-map.html" class="button button-red button-s button-full uppercase bold">FullScreen Map</a>--}}
    {{--</div>--}}
    <div class="content">

        <div class="decoration hide-if-responsive"></div>
        <div class="one-half-responsive contact-information last-column">
            <div class="container no-bottom">
                {!! $page->body !!}

                {{--<h4>Contact Information</h4>--}}
                {{--<p class="contact-information">--}}
                    {{--<strong>Postal Information</strong><br>--}}
                    {{--PO Box 22161 Street Collins East<br>--}}
                    {{--PO Box 16122 Collins Street West<br>--}}
                    {{--Victoria 8007 Australia--}}
                {{--</p>--}}
                {{--<p class="contact-information">--}}
                    {{--<strong>Envato Headquarters</strong><br>--}}
                    {{--121 King Street, Melbourne <br>--}}
                    {{--Victoria 3000 Australia--}}
                {{--</p>--}}
                {{--<p class="contact-information">--}}
                    {{--<strong>Contact Information:</strong><br>--}}
                    {{--<a href="tel: +123 456 7890" class="contact-call"><i class="ion-ios-telephone"></i>+ 123 456 7890</a>--}}
                    {{--<a href="sms: +123 456 7890" class="contact-text"><i class="ion-ios-chatbubble"></i>+ 123 456 7890</a>--}}
                    {{--<a href="tel: +123 456 7890" class="contact-text"><i class="ion-ios-printer"></i>+ 123 456 7890</a>--}}
                    {{--<a href="mailto:name@domain.com" class="contact-mail"><i class="ion-email"></i>mail@doamin.com</a>--}}
                    {{--<a href="#" class="contact-facebook"><i class="ion-social-facebook"></i>enabled.labs</a>--}}
                    {{--<a href="#" class="contact-twitter"><i class="ion-social-twitter"></i>@iEnabled</a>--}}
                {{--</p>--}}
            </div>
        </div>

        <div>
            <a href="https://api.whatsapp.com/send?phone=8618538153651" class="button button-icon button-green button-round button-full button-xs no-bottom"><i class="ion-social-whatsapp"></i>Get Touch Through WhatsApp</a>
        </div>
        <div class="decoration"></div>
        <div>
            <a href="https://m.me/belislaser" class="button button-icon button-green button-round button-full button-xs no-bottom"><i class="ion-social-whatsapp"></i>Get Touch Through Messenger</a>
        </div>


        <div class="decoration hide-if-responsive"></div>
        <div class="one-half-responsive">
            <div class="container heading-style">
                <h4 class="heading-title">Contact Form</h4>
                <i class="ion-ios-email-outline heading-icon"></i>
                <div class="line bg-black"></div>
            </div>
            <div class="container no-bottom">
                <div class="contact-form no-bottom">
                    <div class="formSuccessMessageWrap" id="formSuccessMessageWrap">
                        <div class="notification-medium bg-green-light">
                            <h1>Message Sent!</h1>
                            <p>
                                We'll be back shortly!
                            </p>
                            <a href="#" class="hide-notification"><i class="fa fa-times"></i></a>
                        </div>
                    </div>

                    <form action="/contact_submit" method="post" class="contactForm" id="contactForm">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{csrf_field()}}
                        <input type="hidden" name="url" value="{{url()->current()}}">
                        <script>
                            document.write('<input type="hidden" name="clientId" value=\"',clientId,'">');
                        </script>
                        <fieldset>
                            <div class="formValidationError bg-red-dark" id="contactNameFieldError">
                                <p class="center-text uppercase small-text color-white">Name is required!</p>
                            </div>
                            <div class="formValidationError bg-red-dark" id="contactPhoneFieldError">
                                <p class="center-text uppercase small-text color-white">Phone must required!</p>
                            </div>
                            <div class="formValidationError bg-red-dark" id="contactMessageTextareaError">
                                <p class="center-text uppercase small-text color-white">Message field is empty!</p>
                            </div>
                            <div class="formFieldWrap">
                                <label class="field-title contactNameField" for="contactNameField">Name*:</label>
                                <input type="text" name="name" value="" class="contactField requiredField" id="contactNameField"/>
                            </div>
                            <div class="formFieldWrap">
                                <label class="field-title contactEmailField" for="contactEmailField">Email: </label>
                                <input type="text" name="email" value="" class="contactField" id="contactEmailField"/>
                            </div>
                            <div class="formFieldWrap">
                                <label class="field-title contactPhoneField" for="contactPhoneField">Phone/Whatsapp*: </label>
                                <input type="text" name="phone" value="" class="contactField requiredField requiredPhoneField" id="contactPhoneField"/>
                            </div>
                            <div class="formTextareaWrap">
                                <label class="field-title contactMessageTextarea" for="contactMessageTextarea">Message*: </label>
                                <textarea name="message" class="contactTextarea requiredField" id="contactMessageTextarea"></textarea>
                            </div>
                            <div class="formSubmitButtonErrorsWrap contactFormButton">
                                <input type="submit" class="buttonWrap button button-green contactSubmitButton" id="contactSubmitButton" value="Send Message" data-formId="contactForm"/>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection