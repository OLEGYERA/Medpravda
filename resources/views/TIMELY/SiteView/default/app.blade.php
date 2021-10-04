<!DOCTYPE html>
<?php $lang = 'ua' == Request::segment(1) ? 'ua' : 'ru';?>

<html lang="{{$lang}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ $title ?? env('APP_NAME') }}</title>
    <link href="{{ asset('/img/favicon.png') }}" rel="shortcut icon">
    <meta name="description" content="{{$description ?? env('APP_NAME')}}">
    <meta name="viewport" content="initial-scale=1.0, width=device-width user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php $segments = Request::segments(); @endphp
    <link rel="canonical" href="{{env('APP_URL') . (empty($segments) ? '' : ('/'. implode('/',$segments)))}}">
    <script src="{{ asset('/js/libs/jquery.js') }}"></script>

    @php if('ua' == Request::segment(1)) unset($segments[0]); @endphp
    <link rel="alternate" href="{{ env('APP_URL') . (empty($segments) ? '/ua' : ('/ua/'. implode('/',$segments)))}}" hreflang="x-default"/>
    <link rel="alternate" href="{{ env('APP_URL') . (empty($segments) ? '/ua' : ('/ua/'. implode('/',$segments))) }}" hreflang="uk"/>
    <link rel="alternate" href="{{ env('APP_URL') . (empty($segments) ? '' : ('/'. implode('/',$segments))) }}" hreflang="ru" />


    <meta name="google-site-verification" content="EUFTfjNwVTpyYB06O_UlHxcpoyGg-e52inspmNdyjEY" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131004163-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-131004163-1');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KQFT956');</script>
    <!-- End Google Tag Manager -->



    <script src="{{asset('assets/js/adriver.core.2.js')}}"></script>

    @if(!empty($seo->og_title))
        <meta property="og:title" content="{{ $seo->og_title }}"/>
    @endif
    @if(!empty($seo->og_description))
        <meta property="og:description" content="{{ $seo->og_description }}"/>
    @endif

    <meta property="og:url" content="{{ url()->current() }}"/>
    @if(!empty($seo->og_image))
        <meta property="og:image" content="{{ $seo->og_image }}"/>
    @endif


    <script>
        function loadCSS(hf) {
            var ms=document.createElement("link");ms.rel="stylesheet";
            ms.href=hf;document.getElementsByTagName("head")[0].appendChild(ms);
        }
        loadCSS("{{ asset('fonts/Roboto/roboto.css') }}");
        loadCSS("{{ asset('fonts/OpenSans/opensans.css') }}");
        loadCSS("{{ asset('fonts/MpIcons/style.css') }}")
        loadCSS("{{ asset('css/prerender.css') }}")
        loadCSS("{{ asset('css/main.css') }}")
        {{--loadCSS("{{ asset('fonts/NewMedIcons/style.css') }}")--}}
        {{--loadCSS("{{ asset('assets') }}/css/longread.css");--}}
        {{--loadCSS("{{ asset('css/libs/jquery.scrollbar.css') }}");--}}
    </script>
</head>


<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQFT956" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
                "name": "Медправда",
                 "url": {!! 'ua' == Request::segment(1) ? '"' . env('APP_URL') . '/ua"' : '"' . env('APP_URL') . '"' !!},
                "logo": {!! 'ua' == Request::segment(1) ? '"' . env('APP_URL') . '/img/FrontBox/Logo/ua.svg"' : '"' . env('APP_URL') . '/img/FrontBox/Logo/ru.svg"' !!},
                "sameAs" : [
                    "https://www.facebook.com/medpravda.ua",
                    "https://t.me/medpravda",
                    "https://itunes.apple.com/ua/podcast/medpravda/id1444152598?l=ru&mt=2&fbclid=IwAR3xEMeopvso6xn6rfEOL5FjO7zAg_kCH_ha7RGRZA1AFAfEUxiNAQReQQU"
                ]
        }
    </script>
    <div id="mp-app">
        @yield('header')
        @yield('content')
        @yield('aside')
        @yield('footer')
    </div>

    <script src="{{asset('js/helpers.js')}}"></script>
    <script src="{{asset('js/services.js')}}"></script>
</body>
</html>
