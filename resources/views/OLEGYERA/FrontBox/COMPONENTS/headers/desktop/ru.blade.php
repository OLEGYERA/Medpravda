<div class="wrap fixed-wrap">
    @php $segments = Request::segments();@endphp
    <header id="floatHeader">
        <div class="wrap header-wrap">
            <div class="burger-box">
                <span class="glyph burger mb"></span>
            </div>
            <a href="{{route('ru.home')}}" class="logo-box">
                <img src="{{asset('/img/FrontBox/logo/standart.svg')}}" alt="">
            </a>
            <div class="switch-local">
                <a class="switch-item" href="{{env('APP_URL') . (empty($segments) ? '/ua/' : ('/ua/' . implode('/',$segments))) }}">UA</a>
                <span class="switch-item switched">RU</span>
            </div>
        </div>
    </header>
    <div class="header-menu-box">
        <div class="wrap menu-wrap">
            <nav class="menu-box-row">
                <div class="mp-menu-title">
                    Инструкции
                </div>
                <ul class="mp-menu-item">
                    <li>
                        <a href="#">Препараты</a>
                    </li>
                    <li>
                        <a href="#">Диетические добавки</a>
                    </li>
                    <li>
                        <a href="#">Косметические средства</a>
                    </li>
                    <li>
                        <a href="#">Изделия медицинского назначения</a>
                    </li>
                </ul>
            </nav>
            <nav class="menu-box-row">
                <div class="mp-menu-title">
                    Алфавитный указатель
                </div>
                <ul class="mp-menu-item">
                    <li>
                        <a href="#">Производители</a>
                    </li>
                    <li>
                        <a href="#">Международные названия</a>
                    </li>
                    <li>
                        <a href="#">Группы диетических добавок</a>
                    </li>
                    <li>
                        <a href="#">Фармакотерапевтические группы препаратов</a>
                    </li>
                </ul>
            </nav>
            <nav class="menu-box-row">
                <div class="mp-menu-title">
                    Классификации
                </div>
                <ul class="mp-menu-item">
                    <li>
                        <a href="#">ATX-классификации препаратов</a>
                    </li>
                    <li>
                        <a href="#">Классификации диетических добавок</a>
                    </li>
                    <li>
                        <a href="#">Классификации изделий медицинского назначения</a>
                    </li>
                    <li>
                        <a href="#">Классификации косметических средств</a>
                    </li>
                </ul>
            </nav>
            <nav class="menu-box-row">
                <div class="mp-menu-title">
                    Категории медиа
                </div>
                <ul class="mp-menu-item">
                    <li>
                        <a href="#">Топ темы</a>
                    </li>
                    <li>
                        <a href="#">Новости</a>
                    </li>
                    <li>
                        <a href="#">Статьи</a>
                    </li>
                    <li>
                        <a href="#">Справочник</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>

</div>





{{--<div class="fixed-wrap reactive">--}}
{{--    @php $segments = Request::segments();@endphp--}}
{{--    <header id="floatHeader">--}}
{{--        <div class="header-wrap">--}}
{{--            <a href="{{route('ru.home')}}" class="logo-box">--}}
{{--                <img class="logo" src="{{asset('/img/FrontBox/Logo/ru.svg')}}" alt="">--}}
{{--                <img class="mini-logo" src="{{asset('/img/FrontBox/Logo/mini.svg')}}" alt="">--}}
{{--            </a>--}}
{{--            <nav class="header-navigation">--}}
{{--                <div class="search-navigation">--}}
{{--                    <mp-search :lang="'ru'"></mp-search>--}}
{{--                </div>--}}
{{--                <div class="menu">--}}
{{--                    <div class="toggle-box">--}}
{{--                        <span class="glyph burger mb"></span>--}}
{{--                    </div>--}}
{{--                    <div class="menu-box">--}}
{{--                        <div class="switch-local">--}}
{{--                            <a href="{{env('APP_URL') . (empty($segments) ? '/ua/' : ('/ua/' . implode('/',$segments))) }}">UA</a>--}}
{{--                            <a class="switched">RU</a>--}}
{{--                        </div>--}}
{{--                        <ul class="link-navigation">--}}
{{--                            <li><a href="{{route('ru.control', ['val' => 'control-snu-i-ruhu'])}}">Контроль сна и движения</a></li>--}}
{{--                            <li><a href="{{route('ru.media-zone.article', ['alias' => 'rotovirusnaya-infekciya'])}}" class="link-menu-item"><span class="title">Ротавирус</span></a></li>--}}
{{--                            <li><a href="https://medpravda.ua/landing/potencia/page" class="link-menu-item"><span class="title">Бальзамы Короткова</span></a></li>--}}
{{--                            <li><a href="{{route('ru.catalog.drug.alphabet')}}" class="link-menu-item"><span class="title">Справочник препаратов</span></a></li>--}}
{{--                            <li><a href="{{route('ru.catalog.bad.alphabet')}}" class="link-menu-item"><span class="title">Справочник диетических добавок</span></a></li>--}}
{{--                            <li><a href="{{route('ru.catalog.ware.alphabet')}}" class="link-menu-item"><span class="title">Справочник мед. изделий</span></a></li>--}}
{{--                            <li><a href="{{route('ru.catalog.cosmetic.alphabet')}}" class="link-menu-item"><span class="title">Справочник косметических средств</span></a></li>--}}
{{--                            <li><a href="{{route('ru.catalog.term.alphabet')}}" class="link-menu-item"><span class="title">Справочник терминологии</span></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}



{{--            </nav>--}}
{{--            <div class="switch-local">--}}
{{--                <a href="{{env('APP_URL') . (empty($segments) ? '/ua/' : ('/ua/' . implode('/',$segments))) }}">UA</a>--}}
{{--                <a class="switched">RU</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </header>--}}
{{--</div>--}}


{{--@if($breadcrumbs !== null)--}}
{{--    <div class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">--}}
{{--        <div class="breadcrumb"--}}
{{--             itemprop="itemListElement" itemscope--}}
{{--             itemtype="https://schema.org/ListItem">--}}
{{--            <a itemprop="item"--}}
{{--               href="{{ route('ru.home') }}">--}}
{{--                <span class="label1" itemprop="name">Главная</span>/--}}
{{--                <meta itemprop="position" content="1"/>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        --}}{{--            @dd($breadcrumbs)--}}
{{--        @foreach($breadcrumbs as $key => $breadcrumb)--}}
{{--            <div class="breadcrumb"--}}
{{--                 itemprop="itemListElement" itemscope--}}
{{--                 itemtype="https://schema.org/ListItem">--}}
{{--                <a itemprop="item"--}}
{{--                   @if($breadcrumb['alias']) href="{{ $breadcrumb['alias'] }}" itemid="{{ $breadcrumb['alias'] }}" @endif>--}}
{{--                    <span class="label1" itemprop="name">{{$breadcrumb['title']}}</span>/--}}
{{--                    <meta itemprop="position" content="{{$key + 2}}"/>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--@endif--}}
