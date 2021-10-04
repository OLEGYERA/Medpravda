<!DOCTYPE html>
<html lang="{{$lang}}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="{{$description ?? env('APP_NAME')}}">
    <title>{{ $title ?? env('APP_NAME') }}</title>
    <link href="{{ asset('/img/favicon.png') }}" rel="shortcut icon">
    <meta name="viewport" content="initial-scale=1.0, width=device-width user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="{{ $title ?? env('APP_NAME') }}"/>
    <meta property="og:description" content="{{ $description ?? env('APP_NAME') }}"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:image" content="{{asset('/img/FrontBox/Logo/mini.svg')}}"/>

    @php $segments = Request::segments(); @endphp
    <link rel="canonical" href="{{env('APP_URL') . (empty($segments) ? '' : ('/'. implode('/',$segments)))}}">
    <script src="{{ asset('/js/libs/jquery.js') }}"></script>

    @php if('ua' == $lang) unset($segments[0]); @endphp
    <link rel="alternate" href="{{ env('APP_URL') . (empty($segments) ? '/ua' : ('/ua/'. implode('/',$segments))) }}" hreflang="uk"/>
    <link rel="alternate" href="{{ env('APP_URL') . (empty($segments) ? '' : ('/'. implode('/',$segments))) }}" hreflang="ru" />

    <meta name="google-site-verification" content="EUFTfjNwVTpyYB06O_UlHxcpoyGg-e52inspmNdyjEY" />

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131004163-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-131004163-1');
    </script>

    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-KQFT956');</script>

{{--    <script src="{{asset('assets/js/adriver.core.2.js')}}"></script>--}}

    <link rel="stylesheet" href="{{ asset('css/FrontBox/update-style.css') }}">


    <script>
        function loadCSS(hf) {
            var ms=document.createElement("link");ms.rel="stylesheet";
            ms.href=hf;document.getElementsByTagName("head")[0].appendChild(ms);
        }
        loadCSS("{{ asset('fonts/Roboto/roboto.css') }}");
        loadCSS("{{ asset('fonts/MedIcons/mp-icons.css') }}")

    </script>
</head>
<body>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQFT956" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script type="application/ld+json">
        {
        "@context": "http://schema.org",
        "@type": "Organization",
            "name": "Медправда",
        "url": {!! 'ua' == $lang ? '"' . env('APP_URL') . '/ua"' : '"' . env('APP_URL') . '"' !!},
                "logo": {!! 'ua' == $lang ? '"' . env('APP_URL') . '/img/FrontBox/Logo/ua.svg"' : '"' . env('APP_URL') . '/img/FrontBox/Logo/ru.svg"' !!},
    "sameAs" : [
        "https://www.facebook.com/medpravda.ua",
        "https://t.me/medpravda",
        "https://itunes.apple.com/ua/podcast/medpravda/id1444152598?l=ru&mt=2&fbclid=IwAR3xEMeopvso6xn6rfEOL5FjO7zAg_kCH_ha7RGRZA1AFAfEUxiNAQReQQU"
    ]
}
</script>

@yield('jss')
@yield('branding')
<div class="main-wrapper {{'ru.home' == Route::currentRouteName() || 'ua.home' == Route::currentRouteName() ? 'wrapped' : ''}} {{$fullWidth ? 'full' : ''}}">
    @yield('header')
    @yield('page')
    @yield('aside')
    @yield('footer')
</div>

{{--Cookie alert--}}
{{--@if('ua' == $lang) @else @endif--}}

<script>
    var scr = {"scripts":[
        {"src" : "{{ asset('Web/js/main.js') }}", "sync" : false},
    ]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
</script>
<script src="{{ asset('Web/js/launch.js') }}"></script>
</body>
</html>
