<footer>
    <div class="wrap footer-wrap">
        <div class="footer-box-row medical-attention">
            <img src="{{asset('img/FrontBox/attention/footer.svg')}}" alt="">
        </div>
        <nav class="footer-box-row footer-navigation">
            <ul class="navigation-list">
                <li><a href="#">Реклама на сайте</a></li>
                <li><a href="#">Редакторская группа</a></li>
                <li><a href="#">Сотрудничество</a></li>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Условия использования сайта</a></li>
                <li><a href="#">Конфиденциальности и Cookie-файлы</a></li>
            </ul>
        </nav>
        <div class="footer-box-row footer-info">
            <div class="footer-logo">
                <a href="{{route('ru.home')}}" class="logo-box">
                    <img class="logo" src="{{asset('/img/FrontBox/logo/standart.svg')}}" alt="">
                </a>
            </div>
            <div class="footer-copies-alert">
                <p>
                    Mедправда - это стандартизированное Интернет-издание, предназначенное для врачей и других профессиональных медицинских работников.
                </p>
                <p>
                    Все материалы, размещенные на данном веб-сайте, предназначены исключительно для медицинских работников и производителей. Находясь на данном сайте, Вы подтверждаете, что имеете медицинское образование.
                </p>
                <p>
                    Сайт не должен использоваться как источник информации по самолечению.
                </p>
                <p>
                    Данный сайт является электронной версией журнала "MEDPRAVDA", действующего на основании свидетельства о государственной регистрации печатного средства массовой информации серия КВ № 24100-13940Р от 05.07.2019 года.
                </p>
            </div>
        </div>
        <div class="footer-box-row copyright-mp">
            <p>
                <b>Medpravda.ua © 2017-2021</b> ООО «ДИДЖИО» все права защищены, в случае цитирования ссылка на источник обязательна.
            </p>
        </div>
    </div>
</footer>
{{--<footer>--}}
{{--    <div class="footer-alert">--}}
{{--        <object type="image/svg+xml" data="/img/FrontBox/minzdrav/blue_ua.svg"></object>--}}
{{--    </div>--}}
{{--    <nav class="footer-navigation">--}}
{{--        <ul class="col-30">--}}
{{--            <li><a href="{{ route('ru.catalog.drug.alphabet', ['alpha' => 'А']) }}">ПРЕПАРАТЫ</a></li>--}}
{{--            <li><a href="{{ route('ru.catalog.bad.alphabet', ['alpha' => 'А']) }}">ДИЕТИЧЕСКИЕ ДОБАВКИ</a></li>--}}
{{--            <li><a href="{{ route('ru.catalog.cosmetic.alphabet', ['alpha' => 'А'])}}">КОСМЕТИЧЕСКИЕ СРЕДСТВА</a></li>--}}
{{--            <li><a href="{{ route('ru.catalog.ware.alphabet', ['alpha' => 'А']) }}">ИЗДЕЛИЯ МЕДИЦИНСКОГО НАЗНАЧЕНИЯ</a></li>--}}
{{--            <li><a href="{{ route('ru.media-zone.article', ['alias' => 'rotovirusnaya-infekciya'])}}">РОТАВИРУС</a></li>--}}

{{--        </ul>--}}
{{--        <ul class="col-30">--}}
{{--            <li><a href="{{ route('ru.catalog.inname.alphabet', ['alpha' => 'А']) }}">МЕЖДУНАРОДНЫЕ НАЗВАНИЯ</a></li>--}}
{{--            <li><a href="{{ route('ru.catalog.pharma.alphabet', ['alpha' => 'А']) }}">ФАРМАКОТЕРАПЕВТИЧЕСКИЕ ГРУППЫ ПРЕПАРАТОВ</a></li>--}}
{{--            <li><a href="{{ route('ru.catalog.pharma_bad.list') }}">ГРУППЫ ДИЕТИЧЕСКИХ ДОБАВОК</a></li>--}}
{{--            <li><a href="{{ route('ru.catalog.fabricator.alphabet', ['alpha' => 'А']) }}">ПРОИЗВОДИТЕЛИ</a></li>--}}
{{--            <li><a href="{{ route('ru.catalog.drug.atx') }}">ATX-КЛАССИФИКАЦИИ ПРЕПАРАТОВ</a></li>--}}
{{--            <li><a href="{{ route('ru.catalog.bad.atx') }}">ATX-КЛАССИФИКАЦИИ ДИЕТИЧЕСКИХ ДОБАВОК</a></li>--}}
{{--            <li><a href="{{ route('ru.catalog.ware.atx') }}">ATX-КЛАССИФИКАЦИИ ИЗДЕЛИЙ МЕДИЦИНСКОГО  НАЗНАЧЕНИЯ</a></li>--}}
{{--            <li><a href="{{ route('ru.catalog.cosmetic.atx') }}">ATX-КЛАССИФИКАЦИИ КОСМЕТИЧЕСКИХ СРЕДСТВ</a></li>--}}
{{--        </ul>--}}
{{--        <ul class="col-24">--}}
{{--            <ul class="sub-col">--}}
{{--                <li><a class="disabled">АНАЛИЗЫ</a></li>--}}
{{--                <li><a class="disabled">ЗАПИСЬ К ВРАЧУ</a></li>--}}
{{--            </ul>--}}
{{--            <ul class="sub-col">--}}
{{--                <li><a class="disabled">СВЕЖИЕ СТАТЬИ</a></li>--}}
{{--                <li><a class="disabled">ЛОНГРИДЫ</a></li>--}}
{{--                <li><a class="disabled">ПОПУЛЯРНЫЕ ТЕМЫ</a></li>--}}
{{--                <li><a class="disabled">ИНТЕРВЬЮ</a></li>--}}
{{--            </ul>--}}
{{--        </ul>--}}
{{--        <ul class="col-16">--}}
{{--            <ul class="sub-col">--}}
{{--                <li><a href="{{route('ru.about')}}">О НАС</a></li>--}}
{{--                <li><a href="{{route('ru.cooperation')}}">СОТРУДНИЧЕСТВО</a></li>--}}
{{--                <li><a href="{{route('ru.advertising')}}">РЕКЛАМА НА САЙТЕ</a></li>--}}
{{--                <li><a href="{{route('ru.editors')}}">РЕДАКТОРСКАЯ ГРУППА</a></li>--}}
{{--                <li><a href="{{route('sitemap')}}">ТОП ПРЕПАРАТЫ</a></li>--}}
{{--                --}}{{-- <li><a target="_blank" href="https://ysearch.com.ua">ПОИСК</a></li> --}}
{{--            </ul>--}}
{{--            <ul class="sub-col">--}}


{{--            </ul>--}}
{{--        </ul>--}}
{{--    </nav>--}}
{{--    <div class="footer-terminal-info">--}}
{{--        <div class="terminal-left-info">--}}
{{--            <a href="{{ route('ru.home') }}" class="mp-logo">--}}
{{--                <object type="image/svg+xml" data="/img/FrontBox/Logo/ru.svg"></object>--}}
{{--            </a>--}}
{{--            <div class="social_network">--}}
{{--                <a target="_blank" href="https://www.facebook.com/groups/Medpravda/">--}}
{{--                    <object type="image/svg+xml" data="/img/FrontBox/social_networks/fb.svg"></object>--}}
{{--                </a>--}}
{{--                <a target="_blank" href="https://www.pinterest.com/MedPravda/">--}}
{{--                    <object type="image/svg+xml" data="/img/FrontBox/social_networks/pinterest.svg"></object>--}}
{{--                </a>--}}
{{--                <a target="_blank" href="https://t.me/medpravda">--}}
{{--                    <object type="image/svg+xml" data="/img/FrontBox/social_networks/telegram.svg"></object>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="lang-row">--}}
{{--                @php $segments = Request::segments();@endphp--}}
{{--                <a href="{{env('APP_URL') . (empty($segments) ? '/ua/' : ('/ua/' . implode('/',$segments))) }}">UA</a>--}}
{{--                <a class="choosed">RU</a>--}}
{{--            </div>--}}
{{--            <ul class="footer-term-privacy">--}}
{{--                <li><a href="{{route('ru.terms')}}" target="_blank"><span class="under-title">Условия использования сайта</span></a></li>--}}
{{--                <li><a href="{{route('ru.confidentiality')}}" target="_blank"><span class="under-title">Конфиденциальности и Cookie-файлы</span></a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}

{{--        <div class="footer-detail">--}}
{{--            <div class="about-mp">--}}
{{--                <p>Mедправда - это стандартизированное Интернет-издание, предназначенное для врачей и других профессиональных медицинских работников.</p>--}}
{{--                <p>Все материалы, размещенные на данном веб-сайте, предназначены исключительно для медицинских работников и производителей. Находясь на данном сайте, Вы подтверждаете, что имеете медицинское образование.</p>--}}
{{--                <p>Сайт не должен использоваться как источник информации по самолечению.</p>--}}
{{--                <p>ООО «ДИДЖИО» все права защищены, в случае цитирования ссылка на источник обязательна.</p>--}}
{{--                <p>Данный сайт является электронной версией журнала "MEDPRAVDA", действующего на основании свидетельства о государственной регистрации печатного средства массовой информации серия <a href="https://dzmi.minjust.gov.ua/home/index" target="_blank">КВ № 24100-13940Р</a> от 05.07.2019 года</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="copyright-mp">--}}
{{--        Copyright @ 2017 - 2021--}}
{{--    </div>--}}
{{--</footer>--}}
