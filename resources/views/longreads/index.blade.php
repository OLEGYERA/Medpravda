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
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KQFT956');</script>
    <!-- End Google Tag Manager -->
    <meta name="google-site-verification" content="oB0u4bZfkzQJeGREoUEmp-NqOjwBAdFAjQmzdd1U4gA" />
    {{-- alternate urls --}}
    <link rel="canonical" href="{{Request::url().'/'}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="initial-scale=1.0, width=device-width user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="{{ asset('/') }}favicon.png" rel="shortcut icon">
    <link href="{{ asset('assets/css/longread.css') }}" rel="stylesheet">
</head>
<body>
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "Organization",
@if('ua' == Request::segment(1))
        "name": "Медправда",
        "url": "https://medpravda.com.ua/ua/",
        "logo": "https://medpravda.com.ua/assets/images/main/logo_ua.png",
        "sameAs" : [
        "https://www.facebook.com/medpravda.ua",
        "https://t.me/medpravda",
        "https://itunes.apple.com/ua/podcast/medpravda/id1444152598?l=ru&mt=2&fbclid=IwAR3xEMeopvso6xn6rfEOL5FjO7zAg_kCH_ha7RGRZA1AFAfEUxiNAQReQQU"
        ]
@else
        "name": "Медправда",
"url": "https://medpravda.com.ua/",
"logo": "https://medpravda.com.ua/assets/images/main/logo_ru.png",
"sameAs" : [
"https://www.facebook.com/medpravda.ua",
"https://t.me/medpravda",
"https://itunes.apple.com/ua/podcast/medpravda/id1444152598?l=ru&mt=2&fbclid=IwAR3xEMeopvso6xn6rfEOL5FjO7zAg_kCH_ha7RGRZA1AFAfEUxiNAQReQQU"
]
@endif

    }
</script>

<script src="{{asset('assets/js/adriver.core.2.js')}}"></script>
{{dd(123)}}
@include('layouts.banners.branding')
@yield('content')

{{--<div class="loading">Загрузка</div>--}}
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQFT956"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
</body>
</html>