<div class="wrap fixed-wrap">
    @php $segments = Request::segments(); unset($segments[0])@endphp
    <header id="floatHeader">
        <div class="wrap header-wrap">
            <div class="burger-box">
                <span class="glyph burger" id="toggle-header-menu"></span>
            </div>
            <a href="{{route('ua.home')}}" class="logo-box">
                <img src="{{asset('/img/FrontBox/logo/standart.svg')}}" alt="">
            </a>
            <div class="switch-local">
                <a class="switch-item switched">UA</a>
                <a class="switch-item" href="{{env('APP_URL') . (empty($segments) ? '' : ('/' . implode('/',$segments))) }}">RU</a>
            </div>
        </div>
    </header>
    <div class="header-menu-box" id="header-menu">
        <div class="wrap menu-wrap">
            <nav class="menu-box-row">
                <div class="mp-menu-title">
                    Інструкції
                </div>
                <ul class="mp-menu-item">
                    <li>
                        <a href="{{route('ua.catalog.drug.alphabet')}}">Препарати</a>
                    </li>
                    <li>
                        <a href="{{route('ua.catalog.bad.alphabet')}}">Дієтичні добавки</a>
                    </li>
                    <li>
                        <a href="{{route('ua.catalog.cosmetic.alphabet')}}">Косметичні засоби</a>
                    </li>
                    <li>
                        <a href="{{route('ua.catalog.ware.alphabet')}}">Вироби медичного призначення</a>
                    </li>
                </ul>
            </nav>
            <nav class="menu-box-row">
                <div class="mp-menu-title">
                    Алфавітний покажчик
                </div>
                <ul class="mp-menu-item">
                    <li>
                        <a href="{{route('ua.catalog.fabricator.alphabet')}}">Виробники</a>
                    </li>
                    <li>
                        <a href="{{route('ua.catalog.inname.alphabet')}}">Міжнародні назви</a>
                    </li>
                    <li>
                        <a href="{{route('ua.catalog.pharma_bad.list')}}">Групи дієтичних добавок</a>
                    </li>
                    <li>
                        <a href="{{route('ua.catalog.pharma.alphabet')}}">Фармакотерапевтичні групи препаратів</a>
                    </li>
                </ul>
            </nav>
            <nav class="menu-box-row">
                <div class="mp-menu-title">
                    Класифікації
                </div>
                <ul class="mp-menu-item">
                    <li>
                        <a href="{{route('ua.catalog.drug.atx')}}">ATX-класифікації препаратів</a>
                    </li>
                    <li>
                        <a href="{{route('ua.catalog.bad.atx')}}">Класифікації дієтичних добавок</a>
                    </li>
                    <li>
                        <a href="{{route('ua.catalog.ware.atx')}}">Класифікації виробів медичного призначення</a>
                    </li>
                    <li>
                        <a href="{{route('ua.catalog.cosmetic.atx')}}">Класифікації косметичних засобів</a>
                    </li>
                </ul>
            </nav>
            <nav class="menu-box-row">
                <div class="mp-menu-title">
                    Категорії медіа
                </div>
                <ul class="mp-menu-item">
                    <li>
                        <a href="#">Топ теми</a>
                    </li>
                    <li>
                        <a href="#">Новини</a>
                    </li>
                    <li>
                        <a href="#">Статті</a>
                    </li>
                    <li>
                        <a href="#">Довідник</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>





