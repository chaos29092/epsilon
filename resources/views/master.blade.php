<!DOCTYPE HTML>
<head>
    <script>
        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
            }
            return "";
        }
        function setCookie(c_name,value,expiredays)
        {
            var exdate=new Date()
            exdate.setDate(exdate.getDate()+expiredays)
            document.cookie=c_name+ "=" +escape(value)+
                ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())+";path=/"
        }
        function uuidv4() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }
        clientId = getCookie('clientId');
        if (!clientId){
            clientId = uuidv4();
        }
        setCookie('clientId',clientId,730);
        dataLayer = [{
            'clientId': clientId
        }];
    </script>
    @if(isset($related_products))
        <script>
            product_name = '{{$product->name}}';
            product_id = '{{$product->product_code}}';
            product_price = '{{$product->price}}';
            product_category = '{{$product->product_category_id}}';
        </script>
    @elseif(isset($products))
        <script>
            product_name = 'Category '+'{{$product_category->name}}';
            product_id = '{{$product_category->slug}}';
            product_price = '{{$products->avg('price')}}';
            product_category = '{{$product_category->name}}';
        </script>
    @elseif(isset($featured_products))
        <script>
            product_name = 'All';
            product_id = 'All';
            product_price = '{{$avg_price}}';
            product_category = 'All';
        </script>
    @else
        <script>
            product_name = 'All';
            product_id = 'All';
            product_price = '{{$avg_price}}';
            product_category = 'All';
        </script>
    @endif
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-P7L2WXC');</script>
    <!-- End Google Tag Manager -->

    @yield('dataLayer_push')

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <title>@yield('seo_title') - {{setting('index.company_name')}}</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keywords')">

    <link rel="stylesheet" type="text/css" href="/styles/style.css">
    <link rel="stylesheet" type="text/css" href="/styles/skin.css">
    <link rel="stylesheet" type="text/css" href="/styles/framework.css">
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


</head>

<body>
<div id="page-transitions">

    <div class="page-preloader page-preloader-dark">
        <div class="spinner"></div>
    </div>

    <div class="header header-light">
        <a href="/" class="header-logo">Belis<span class="color-red-dark">Laser</span></a>
        <a href="#" class="header-icon header-icon-1 close-sidebar-mask"></a>
        <a href="#" class="header-icon header-icon-1 open-sidebar">
            <em class="line-1"></em>
            <em class="line-2"></em>
            <em class="line-3"></em>
        </a>
        <a href="https://api.whatsapp.com/send?phone={{setting('contact.phone')}}&text={{__('main.need_price')}}: @if(isset($related_products)){{$product->name}} @elseif(isset($products)){{$product_category->name}} @else All Products @endif" onclick="(function (){
                            dataLayer.push({
                                'event': 'productPurchase',
                                'ecommerce': {
                                'purchase': {
                                'actionField': {
                                'id': uuidv4(),
                                'affiliation': 'Header Whatsapp Click'
                            },
                            'products': [{
                                'name': product_name,
                                'id': product_id,
                                'price': product_price,
                                'category': product_category,
                                'quantity': 1
                                }]
                            }}
                            });
                            })()" class="header-icon header-icon-4"><i class="ion-social-whatsapp-outline"></i></a>
    </div>

    <!-- Main Small Icon Sidebar -->
    <div class="sidebar-menu sidebar-light">
        <div class="sidebar-menu-scroll">
            <a  href="/"><i class="ion-ios-home-outline"></i><em>{{title_case(__('main.home'))}}</em></a>
            <a data-submenus="sub1" href="#"><i class="ion-ios-cart-outline"></i><em>{{title_case(__('main.products'))}}</em></a>
            <a href="/about_us"><i class="ion-happy-outline"></i><em>{{title_case(__('main.about_us'))}}</em></a>
            <a href="/news"><i class="ion-ios-book-outline"></i><em>{{title_case(__('main.news'))}}</em></a>
            <a href="/gallery"><i class="ion-ios-photos-outline"></i><em>{{title_case(__('main.gallery'))}}</em></a>
            <!-- <a href="/faq"><i class="ion-android-bulb"></i><em>FAQ</em></a> -->
            <a href="/contact_us"><i class="ion-ios-email-outline"></i><em>{{title_case(__('main.contact'))}}</em></a>
            <a data-submenus="sub10" href="#"><i class="ion-ios-at-outline"></i><em>{{title_case(__('main.connect'))}}</em></a>
        </div>
    </div>

    <!-- Connect Submenus -->
    <div class="submenu submenu-light" id="sub1">
        <div class="submenu-scroll">
            <a class="close-sidebar" href="#"><i class="ion-ios-close-empty"></i><em>{{title_case(__('main.close'))}}</em></a>
            @foreach($product_categories as $product_category)
            <a href="/product_category/{{$product_category->slug}}"><i class="ion-ios-cart-outline"></i><em>{{title_case($product_category->name)}}</em></a>
            @endforeach

            <a class="close-sidebar" href="#"><i class="ion-ios-close-empty"></i><em>{{title_case(__('main.close'))}}</em></a>
        </div>
    </div>
    <!-- Connect Submenus -->
    <div class="submenu submenu-light" id="sub10">
        <div class="submenu-scroll">
            <a class="close-sidebar" href="#"><i class="ion-ios-close-empty"></i><em>{{title_case(__('main.close'))}}</em></a>
            <a href="/contact_us"><i class="ion-ios-compose-outline"></i><em>{{title_case(__('main.contact_form'))}}</em></a>
            <a href="mailto:{{setting('contact.email')}}" onclick="(function (){
                            dataLayer.push({
                                'event': 'productPurchase',
                                'ecommerce': {
                                'purchase': {
                                'actionField': {
                                'id': uuidv4(),
                                'affiliation': 'Menu Email'
                            },
                            'products': [{
                                'name': product_name,
                                'id': product_id,
                                'price': product_price,
                                'category': product_category,
                                'quantity': 1
                                }]
                            }}
                            });
                            })()"><i class="ion-ios-email-outline"></i><em>{{title_case(__('main.mail_us'))}}</em></a>
            <a href="https://api.whatsapp.com/send?phone={{setting('contact.phone')}}&text={{__('main.need_price')}}: @if(isset($related_products)){{$product->name}} @elseif(isset($products)){{$product_category->name}} @else All Products @endif" onclick="(function (){
                            dataLayer.push({
                                'event': 'productPurchase',
                                'ecommerce': {
                                'purchase': {
                                'actionField': {
                                'id': uuidv4(),
                                'affiliation': 'Menu Whatsapp'
                            },
                            'products': [{
                                'name': product_name,
                                'id': product_id,
                                'price': product_price,
                                'category': product_category,
                                'quantity': 1
                                }]
                            }}
                            });
                            })()"><i class="ion-social-whatsapp-outline"></i><em>Whatsapp</em></a>
            <a class="close-sidebar" href="#"><i class="ion-ios-close-empty"></i><em>{{title_case(__('main.close'))}}</em></a>
        </div>
    </div>


    <div id="page-content" class="header-clear">
        <div id="page-content-scroll"><!--Enables this element to be scrolled -->


            @yield('content')

                <div class="decoration"></div>
                <div class="content footer-links">
                    <h4>{{title_case(__('main.useful_links'))}}</h4>
                    <a href="/"><i class="ion-home"></i> {{title_case(__('main.home'))}}</a>
                    <a href="/gallery"><i class="ion-images"></i> {{title_case(__('main.gallery'))}}</a>
                    <a href="/news"><i class="ion-ios-book"></i> {{title_case(__('main.news'))}}</a>
                    <a href="/about_us"><i class="ion-ios-book-outline"></i> {{title_case(__('main.about_us'))}}</a>
                    <!-- <a href="/faq"><i class="ion-help-circled"></i> FAQ</a> -->
                    <a href="/contact_us"><i class="ion-android-mail"></i> {{title_case(__('main.contact_us'))}}</a>
                    <a href="/product_categories"><i class="ion-ios-cart"></i> {{title_case(__('main.products'))}}</a>
                    <div class="clear"></div>
                </div>

            <div class="decoration decoration-margins"></div>

            <div class="footer footer-dark">
                <a href="/" class="footer-logo scale-hover"></a>
                <p>
                    {{setting('index.foot_content')}}
                </p>
                <div class="footer-socials center-text">
                    <a href="https://m.me/{{setting('contact.facebook_id')}}" class="icon icon-round icon-ghost facebook-bg"><i class="ion-social-facebook"></i></a>
                    <a href="https://api.whatsapp.com/send?phone={{setting('contact.phone')}}&text={{__('main.need_price')}}: @if(isset($related_products)){{$product->name}} @elseif(isset($products)){{$product_category->name}} @else All Products @endif" onclick="(function (){
                            dataLayer.push({
                                'event': 'productPurchase',
                                'ecommerce': {
                                'purchase': {
                                'actionField': {
                                'id': uuidv4(),
                                'affiliation': 'Foot Phone Click'
                            },
                            'products': [{
                                'name': product_name,
                                'id': product_id,
                                'price': product_price,
                                'category': product_category,
                                'quantity': 1
                                }]
                            }}
                            });
                            })()" class="icon icon-ghost icon-round phone-color phone-bg"><i class="ion-ios-telephone"></i></a>
                    <a href="mailto:{{setting('contact.email')}}" onclick="(function (){
                            dataLayer.push({
                                'event': 'productPurchase',
                                'ecommerce': {
                                'purchase': {
                                'actionField': {
                                'id': uuidv4(),
                                'affiliation': 'Foot Email Click'
                            },
                            'products': [{
                                'name': product_name,
                                'id': product_id,
                                'price': product_price,
                                'category': product_category,
                                'quantity': 1
                                }]
                            }}
                            });
                            })()" class="icon icon-ghost icon-round mail-color mail-bg"><i class="ion-android-mail"></i></a>
                    <a href="https://api.whatsapp.com/send?phone={{setting('contact.phone')}}&text={{__('main.need_price')}}: @if(isset($related_products)){{$product->name}} @elseif(isset($products)){{$product_category->name}} @else All Products @endif" onclick="(function (){
                            dataLayer.push({
                                'event': 'productPurchase',
                                'ecommerce': {
                                'purchase': {
                                'actionField': {
                                'id': uuidv4(),
                                'affiliation': 'Foot Whatsapp'
                            },
                            'products': [{
                                'name': product_name,
                                'id': product_id,
                                'price': product_price,
                                'category': product_category,
                                'quantity': 1
                                }]
                            }}
                            });
                            })()" class="icon icon-ghost icon-round whatsapp-color whatsapp-bg"><i class="ion-social-whatsapp"></i></a>
                </div>
                <div class="decoration"></div>
                <p class="copyright-text">{{setting('index.copyright')}}</p>
            </div>
        </div>
    </div>



    <a href="#" class="back-to-top-badge"><i class="ion-android-arrow-dropup"></i>{{title_case(__('main.back_to_top'))}}</a>

</div>

<script type="text/javascript" src="/scripts/jquery.js"></script>
<script type="text/javascript" src="/scripts/plugins.js"></script>
<script type="text/javascript" src="/scripts/custom.js"></script>
</body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7L2WXC"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
