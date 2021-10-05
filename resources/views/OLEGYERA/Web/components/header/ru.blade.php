<div class="wrap fixed-wrap">
    @php $segments = Request::segments();@endphp
    <header id="floatHeader">
        <div class="wrap header-wrap">
            <div class="burger-box">
                <span class="glyph burger" id="toggle-header-menu"></span>
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
    <div class="header-menu-box" id="header-menu">
        <div class="wrap menu-wrap">
            <nav class="menu-box-row">
                <div class="mp-menu-title">
                    Категории медиа
                </div>
                <ul class="mp-menu-item">
                    <li>
                        <a href="{{route('ru.tags.news')}}">Новости</a>
                    </li>
                    <li>
                        <a href="{{route('ru.tags.articles')}}">Статьи</a>
                    </li>
                    <li>
                        <a href="{{route('ru.tags.interviews')}}">Интервью</a>
                    </li>
                </ul>
            </nav>
            <nav class="menu-box-row">
                <div class="mp-menu-title">
                    Инструкции
                </div>
                <ul class="mp-menu-item">
                    <li>
                        <a href="{{route('ru.catalog.drug.alphabet')}}">Препараты</a>
                    </li>
                    <li>
                        <a href="{{route('ru.catalog.bad.alphabet')}}">Диетические добавки</a>
                    </li>
                    <li>
                        <a href="{{route('ru.catalog.cosmetic.alphabet')}}">Косметические средства</a>
                    </li>
                    <li>
                        <a href="{{route('ru.catalog.ware.alphabet')}}">Изделия медицинского назначения</a>
                    </li>
                </ul>
            </nav>
            <nav class="menu-box-row">
                <div class="mp-menu-title">
                    Алфавитный указатель
                </div>
                <ul class="mp-menu-item">
                    <li>
                        <a href="{{route('ru.catalog.fabricator.alphabet')}}">Производители</a>
                    </li>
                    <li>
                        <a href="{{route('ru.catalog.inname.alphabet')}}">Международные названия</a>
                    </li>
                    <li>
                        <a href="{{route('ru.catalog.pharma_bad.list')}}">Группы диетических добавок</a>
                    </li>
                    <li>
                        <a href="{{route('ru.catalog.pharma.alphabet')}}">Фармакотерапевтические группы препаратов</a>
                    </li>
                </ul>
            </nav>
            <nav class="menu-box-row">
                <div class="mp-menu-title">
                    Классификации
                </div>
                <ul class="mp-menu-item">
                    <li>
                        <a href="{{route('ru.catalog.drug.atx')}}">ATX-классификации препаратов</a>
                    </li>
                    <li>
                        <a href="{{route('ru.catalog.bad.atx')}}">Классификации диетических добавок</a>
                    </li>
                    <li>
                        <a href="{{route('ru.catalog.ware.atx')}}">Классификации изделий медицинского назначения</a>
                    </li>
                    <li>
                        <a href="{{route('ru.catalog.cosmetic.atx')}}">Классификации косметических средств</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
