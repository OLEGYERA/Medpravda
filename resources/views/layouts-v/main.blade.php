<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <!-- Google Optimizer -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-131004163-1', 'auto');
        ga('require', 'GTM-W4KG79Z');
        ga('send', 'pageview');
    </script>
    <!-- Google Optimizer end script -->

    <!--Предотвращение нестабильного отображения веб-страницы-->
    <!--<style>.async-hide { opacity: 0 !important} </style>
    <script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
            h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
            (a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
        })(window,document.documentElement,'async-hide','dataLayer',4000,
            {'GTM-W4KG79Z':true});</script>-->

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KQFT956');</script>
    <!-- End Google Tag Manager -->

    {{--ARIVER--}}
    <script src="{{ asset('assets') }}/js/adriver.core.2.js"></script>
    {{--ARIVER--}}

    <meta name="google-site-verification" content="oB0u4bZfkzQJeGREoUEmp-NqOjwBAdFAjQmzdd1U4gA" />
    {{-- alternate urls --}}
    <link rel="canonical" href="{{Request::url().'/'}}">

    @if('ua' == Request::segment(1))
        {{--<link rel="alternate" href="{{ env('APP_URL') }}/ua/" hreflang="x-default"/>--}}
        @php
            $segments = Request::segments();
            unset($segments[0]);
        @endphp

        <link rel="alternate" href="{{ str_replace('/ua/','/',Request::url()).'/' }}" hreflang="x-default" />
        <link rel="alternate" href="{{ env('APP_URL').'/'.(empty($segments) ? '':(implode('/',$segments)).'/') }}" hreflang="ru"/>
        <link rel="alternate" href="{{ Request::url().'/' }}" hreflang="uk"/>
    @else
        <link rel="alternate" href="{{ Request::url() }}/" hreflang="x-default"/>
        <link rel="alternate" href="{{ env('APP_URL').'/ua'. (empty(Request::segments())? '': '/'. implode('/', Request::segments())) }}/" hreflang="uk-UA"/>
        <link rel="alternate" href="{{ Request::url() }}/" hreflang="ru" />
    @endif

    {{--twitter tags--}}
    @if(!empty($twitter_tags))
        @foreach($twitter_tags as $name => $content)
            <meta name="{{$name}}" content="{{$content}}">
        @endforeach
    @endif
    {{--end twitter tags--}}

    @if(!empty($seo->seo_description))
        <meta name="description" content="{{ $seo->seo_description }}">
        @else
        <meta name="description" content="{{$description_default_seo ?? env('APP_NAME')}}">
    @endif
    @if(!empty($seo->og_title))
        <meta property="og:title" content="{{ $seo->og_title }}"/>
    @endif
    @if(!empty($seo->og_description))
        <meta property="og:description" content="{{ $seo->og_description }}"/>
    @endif
    @if(\Request::route()->getName()=='medicine' || \Request::route()->getName()=='medicine_ua')
       <link rel="amphtml" href="{{ url()->current() }}/amp">
    @endif
    <meta property="og:url" content="{{ url()->current() }}"/>
    @if(!empty($seo->og_image))
        <meta property="og:image" content="{{ $seo->og_image }}"/>
    @endif
    {{--check title expression--}}
    @if(!empty($seo->seo_title))
        <title>{{ $seo->seo_title}}</title>
    @else
        <title>{{ $title ?? env('APP_NAME') }}</title>
        {{--<title>{{ preg_replace('/^([ ]+)|([ ]){2,}/m', '$2', str_limit($title ?? env('APP_NAME'),65)) ?? env('APP_NAME') }}</title>--}}
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="initial-scale=1.0, width=device-width user-scalable=no">

    <link href="{{ asset('/') }}favicon.png" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}-v/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}-v/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}-v/css/reklama-body.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}-v/css/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}-v/css/fresh.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}-v/css/style.css">
</head>
<body @if(!empty($background)) style="background: {{ '#'.$background }}" @endif>


<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "Organization",
@if('ua' == Request::segment(1))
"name": "Медправда",
"url": "https://medpravda.ua/ua/",
"logo": "https://medpravda.ua/assets/images/main/logo_ua.png",
"sameAs" : [
"https://www.facebook.com/medpravda.ua",
"https://t.me/medpravda",
"https://itunes.apple.com/ua/podcast/medpravda/id1444152598?l=ru&mt=2&fbclid=IwAR3xEMeopvso6xn6rfEOL5FjO7zAg_kCH_ha7RGRZA1AFAfEUxiNAQReQQU"
]
    @else
        "name": "Медправда",
"url": "https://medpravda.ua/",
"logo": "https://medpravda.ua/assets/images/main/logo_ru.png",
"sameAs" : [
"https://www.facebook.com/medpravda.ua",
"https://t.me/medpravda",
"https://itunes.apple.com/ua/podcast/medpravda/id1444152598?l=ru&mt=2&fbclid=IwAR3xEMeopvso6xn6rfEOL5FjO7zAg_kCH_ha7RGRZA1AFAfEUxiNAQReQQU"
]
@endif

    }
</script>


@yield('branding')
{{--<div class="loading">Загрузка</div>--}}
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQFT956"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="@if('price' == Route::currentRouteName()) main-wrapper module-price-wrap @else main-wrapper  @endif
        @if('main' == Route::currentRouteName()) main-page @endif
@if(('articles' == Route::currentRouteName()) || ('ua_articles' == Route::currentRouteName())) single-article @endif
@if(('articles_cat' == Route::currentRouteName()) || ('ua_articles_cat' == Route::currentRouteName())) articles @endif
        ">
    @yield('header')

    @yield('content')

    @yield('aside')
    @yield('module_price_section')
    @yield('slider')
    @if(!empty($seo) && !empty($seo->seo_text))
        <div class="SEO-text">
            {!! $seo->seo_text !!}
        </div>
    @endif
    @yield('footer')

</div><!-- end WRAP -->


<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="{{ asset('assets') }}-v/js/slick.min.js"></script>
{{--<script src="{{ asset('assets') }}-v/js/slider.js"></script>--}}
<script src="{{ asset('assets') }}-v/js/accordion.js"></script>
<script src="{{ asset('assets') }}-v/js/menu.js"></script>
<script src="{{ asset('assets') }}-v/js/totop.js"></script>

@yield('jss')
</body>
</html>