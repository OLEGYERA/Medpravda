<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow"/>
    <title>{{ $landing->title??'' }}</title>

    <!--favicon-->
    <link rel="apple-touch-icon" sizes="60x60" href="/landing/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/landing/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/landing/favicon/favicon-16x16.png">
    <link rel="manifest" href="/landing/favicon/site.webmanifest">
    <link rel="mask-icon" href="/landing/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/landing/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="/landing/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!--end favicon-->
    {!!  $head_js ?? '' !!}

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext,latin-ext"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('landing') }}/css/reset.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/css/responsive.css">
</head>
<body>

<style>
    /*Радиус для блоков*/
    .section .desc-img,
    .slide-block,
    .contacts,
    .banner-wrapper,
    .btn {
        border-radius: 15px;
    }

    /*Стили всех кнопок*/
    .btn {
        border-radius: {{ $landing->button['style'] }}px;
        background: #{{ $landing->button['color'] }};
    }

    /*Точки-навигация   --- для всех*/
    #pagination-screen li a span {
        border-radius: {{ $landing->boolpoint['style'] }}px;
        background: #{{ $landing->boolpoint['color'] }};
        @if(!empty($landing->boolpoint['path']))
                     background: url({{$landing->getImg('boolpoint')}}) no-repeat center center;
        @endif
                     background-size: contain;

    }

    /*Slider dots*/

    .custom-dots li {
        background: url(img/1-3.png) no-repeat center center #598fbd;
        background-size: contain;
        border-radius: 5%;
    }
    /*end Slider dots*/

    /*Точки-навигация   --- для всех на конкретном слайде*/
    @forelse($blocks as $block)
        #pagination-screen.section-{{ $loop->iteration }} li a span {
        border-radius: {{ $block->boolpoint['style'] }}px;
        background: #{{ $block->boolpoint['color'] }};
        @if(!empty($block->boolpoint['path']))
            background: url({{ $block->getImg('boolpoint') }}) no-repeat center center;
        @endif
        background-size: contain;
    }

    @empty
    @endforelse

</style>

@if($landing->modal)
    @include('landings.modal')
@endif
<!--HEADER-->
<header>
    <div class="wrapper">
        <div class="nav">
            <div class="burgerBtn"><span></span></div>
            <div class="">Меню</div>
        </div>
        <div class="logo">
            <a href="https://medpravda.com.ua/">
                <img src="{{ asset('landing') }}/img/logo-medpravda.png" alt="">
            </a>
        </div>
        <div class="logo logo-m-dn">
            @if(!empty($landing->logo['path']))
                <a href="{{ $landing->logo['link']?? '!#'}}">
                    <img src="{{ $landing->getLogo() }}" alt="">
                </a>
            @endif
        </div>
        @if(1 == $landing->active_ua)
            <div class="lang">
                <img src="{{ asset('landing') }}/img/ukr.png" alt=""><i class="material-icons">keyboard_arrow_down</i>
            </div>
        @endif
    </div>
</header>
<div class="header-dropdown">
    <div class="wrapper">
        <div class="menu">
            @forelse($blocks as $block)
                <a href="#section-{{ $loop->iteration }}">{{ $block->title }}</a>
            @empty
            @endforelse
        </div>
        @if(1 == $landing->active_ua)
            <div class="lang-switch">
                {{--<a href="!#">Рус</a>--}}
                <a href="!#">Укр</a>
            </div>
        @endif
    </div>
</div>
<!--end HEADER-->

<div class="container {{$landing->full_screen ? '' : 'simple-scroll'}}">
    <!-------------    Blocks Sections   ------------->
    @forelse($blocks as $block)
{{--        @php(dd($blocks))--}}
        <div id="section-{{ $loop->iteration }}" class="section section-{{ $loop->iteration }}"
             style="z-index: {{ $block->banner ? '1':'2' }}">

            <div class="gradient-section"
                 style="background: linear-gradient(to bottom, #{{ $block->background['color'] }} 0%, #{{ $block->background['secondarycolor'] }} 100%);"></div>
            <div class="bg-section gradient">

                    @if(!empty($block->background['path']))
                        <img src="{{ $block->getImg('background') }}" alt="">
                    @endif
            </div>
            @if(7 == $block->source)
                <div class="map">
                    <div id="map" data-number-lat="{{ $block->custom['latitude']??'' }}" data-number-lng="{{ $block->custom['longitude']??'' }}"></div>
                </div>
            @endif
            <div class="wrapper">
                <div class="{{ $block->banner ? 'mini-wrapper':'content-wrap' }}">
                    @include('landings.sections.section'.$block->source)
                </div>
            </div>



        </div>
@empty
@endforelse
<!-------------    Blocks Sections   ------------->

    <ul id="pagination-screen" class="section-1">
        @forelse($blocks as $block)
            <li>
                <a href="#section-{{ $loop->iteration }}" class="@if(1 == $loop->iteration ) current-screen @endif">
                    <span></span>
                </a>
            </li>
        @empty
        @endforelse

    </ul>
</div>


<div class="promo-banner"> <!--BANNER PROMO-->
    <div class="wrapper">
        <div class="banner-wrapper">
            <div class="gradient-section"
                 style="background: linear-gradient(to bottom, #{{ $banner->background['color'] }} 0%, #{{ $banner->background['secondarycolor'] }} 100%);"
            ></div>
            <div class="bg-section">
                @if(!empty($banner->background['image']))
                    <img src="{{ $banner->getBgImage() }}" alt="">
                @endif
            </div>
            <div class="banner-content">
                <h2 style="color:#{{ $banner->title['color']??'' }};font-size:{{ $banner->title['size']??'' }}%;font-family: {{ config('settings.fonts.'.$banner->title['style']??1) }}">
                    {{ $banner->title['title']??'' }}
                </h2>
                <p style="color:#{{ $banner->description['color']??'' }};font-size:{{ $banner->description['size']??'' }}%;font-family: {{ config('settings.fonts.'.$banner->description['style']??1) }}">
                    {{ $banner->description['text']??'' }}
                </p>
                <div class="desc-img">
                    @if(!empty($banner->image))
                        <img src="{{ $banner->getImage() }}" alt="{{ $banner->imgalt??'' }}" title="{{ $banner->imgtitle??'' }}">
                    @endif
                </div>

                <a href="{{ $banner->button['url']??'' }}"
                   class="btn"
                   style="color:#{{ $banner->button['color']??'' }};background:#{{ $banner->button['background']??'' }};border-radius:{{ $banner->button['style']??'' }}px">
                    {{ $banner->button['text']??'' }}
                </a>
            </div>
        </div>
    </div>
</div>

@if($landing->healing["approved"])
    <div class="minzdrav__section" style='{{$landing->healing["color_text"] ? 'color:#'.$landing->healing["color_text"]."!important;" : ''}}'><!--MINZDRAV-->
        <div class="wrapper">
            <div class="minzdrav__text" style="{{$landing->healing["color"] ? 'background-color:#'.$landing->healing["color"]."!important;" : ''}}">
                <span>{{$landing->healing['small_text']}}</span>
                <picture>
                    <source media="(max-width: 576px)" srcset="{{asset('landing')}}/img/minzdrav__mob.svg">
                    <img src="{{asset('landing')}}/img/minzdrav.svg" alt="" style="margin-top: 30px;">
                </picture>
            </div>
        </div>
    </div>
@endif
<div class="top-wrap">  <!--BTN TO TOP-->
    <a href="#section-1" class="to-top">
        <img src="{{ asset('landing') }}/img/arrow.svg" alt="">
    </a>
</div>


<script src="{{ asset('landing') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('landing') }}/js/slick.min.js"></script>
{!! $jss !!}
<script src="{{ asset('landing') }}/js/construct.js"></script>
</body>
</html>