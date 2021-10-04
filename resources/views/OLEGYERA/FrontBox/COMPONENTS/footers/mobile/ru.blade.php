<footer>
    <div class="footer-alert">
        <object type="image/svg+xml" data="/img/FrontBox/minzdrav/blue_ua.svg"></object>
    </div>
    <nav class="footer-navigation">
        <div class="mp-row-group">
            <ul class="mp-col">
                <li><a href="{{ route('m.ru.catalog.drug.alphabet', ['alpha' => 'А']) }}">ПРЕПАРАТЫ</a></li>
                <li><a href="{{ route('m.ru.catalog.bad.alphabet', ['alpha' => 'А']) }}">ДИЕТИЧЕСКИЕ ДОБАВКИ</a></li>
                <li><a href="{{ route('m.ru.catalog.cosmetic.alphabet', ['alpha' => 'А']) }}">КОСМЕТИЧЕСКИЕ СРЕДСТВА</a></li>
                <li><a href="{{ route('m.ru.catalog.ware.alphabet', ['alpha' => 'А']) }}">ИЗДЕЛИЯ МЕДИЦИНСКОГО НАЗНАЧЕНИЯ</a></li>
                <li><a href="{{ route('m.ru.media-zone.article', ['alias' => 'rotovirusnaya-infekciya'])}}">РОТАВИРУС</a></li>

            </ul>
            <ul class="mp-col">
                <li><a href="{{ route('m.ru.catalog.inname.alphabet', ['alpha' => 'А']) }}">МЕЖДУНАРОДНЫЕ НАЗВАНИЯ</a></li>
                <li><a href="{{ route('m.ru.catalog.pharma.alphabet', ['alpha' => 'А']) }}">ФАРМАКОТЕРАПЕВТИЧЕСКИЕ ГРУППЫ ПРЕПАРАТОВ</a></li>
                <li><a href="{{ route('m.ru.catalog.pharma_bad.list') }}">ГРУППЫ ДИЕТИЧЕСКИХ ДОБАВОК</a></li>
                <li><a href="{{ route('m.ru.catalog.fabricator.alphabet', ['alpha' => 'А']) }}">ПРОИЗВОДИТЕЛИ</a></li>
                <li><a href="{{ route('m.ru.catalog.drug.atx') }}">ATX-КЛАССИФИКАЦИИ ПРЕПАРАТОВ</a></li>
                <li><a href="{{ route('m.ru.catalog.bad.atx') }}">ATX-КЛАССИФИКАЦИИ ДИЕТИЧЕСКИХ ДОБАВОК</a></li>
                <li><a href="{{ route('m.ru.catalog.ware.atx') }}">ATX-КЛАССИФИКАЦИИ ИЗДЕЛИЙ МЕДИЦИНСКОГО НАЗНАЧЕНИЯ</a></li>
                <li><a href="{{ route('m.ru.catalog.cosmetic.atx') }}">ATX-КЛАССИФИКАЦИИ КОСМЕТИЧЕСКИХ СРЕДСТВ</a></li>
            </ul>
        </div>
        <div class="mp-row-group">
            <ul class="mp-col">
                <ul class="mp-sub-col">
                    <li><a class="disabled">АНАЛИЗЫ</a></li>
                    <li><a class="disabled">ЗАПИСЬ К ВРАЧУ</a></li>
                </ul>
                <ul class="mp-sub-col">
                    <li><a class="disabled">СВЕЖИЕ СТАТЬИ</a></li>
                    <li><a class="disabled">ЛОНГРИДЫ</a></li>
                    <li><a class="disabled">ПОПУЛЯРНЫЕ ТЕМЫ</a></li>
                    <li><a class="disabled">ИНТЕРВЬЮ</a></li>
                </ul>
            </ul>
            <ul class="mp-col">
                <li><a href="{{route('m.ru.about')}}">О НАС</a></li>
                <li><a href="{{route('m.ru.cooperation')}}">СОТРУДНИЧЕСТВО</a></li>
                <li><a href="{{route('m.ru.advertising')}}">РЕКЛАМА НА САЙТЕ</a></li>
                <li><a href="{{route('m.ru.editors')}}">РЕДАКТОРСКАЯ ГРУППА</a></li>
                <li><a href="{{route('sitemap')}}">ТОП ПРЕПАРАТЫ</a></li>
                <!-- <li><a target="_blank" href="https://ysearch.com.ua">ПОИСК</a></li> -->
            </ul>
        </div>
    </nav>
    <div class="footer-terminal-info">
        <div class="footer-lang-term-privacy">
            <div class="lang-switcher">
                @php $segments = Request::segments();@endphp
                <a href="{{env('APP_M_URL') . (empty($segments) ? '/ua/' : ('/ua/' . implode('/',$segments))) }}"><span class="under-title">Укр</span></a>
                <a class="choosed">Рус</a>
            </div>
            <ul class="list-term-privacy">
                <li><a href="{{route('m.ru.terms')}}" target="_blank"><span class="under-title">Условия использования сайта</span></a></li>
                <li><a href="{{route('m.ru.confidentiality')}}" target="_blank"><span class="under-title">Конфиденциальности и Cookie-файлы</span></a></li>
            </ul>
        </div>
        <div class="social_network">
            <a target="_blank" href="https://www.facebook.com/groups/Medpravda/">
                <object type="image/svg+xml" data="/img/FrontBox/social_networks/fb.svg"></object>
            </a>
            <a target="_blank" href="https://www.pinterest.com/MedPravda/">
                <object type="image/svg+xml" data="/img/FrontBox/social_networks/pinterest.svg"></object>
            </a>
            <a target="_blank" href="https://t.me/medpravda">
                <object type="image/svg+xml" data="/img/FrontBox/social_networks/telegram.svg"></object>
            </a>
        </div>
        <div class="mp-logo-box">
            <a href="{{ route('m.ru.home') }}" class="mp-logo">
                <object type="image/svg+xml" data="{{asset('/img/FrontBox/Logo/ru.svg')}}"></object>
            </a>
        </div>
        <div class="footer-detail">
            <div class="about-mp">
                <p>Mедправда - это стандартизированное Интернет-издание, предназначенное для врачей и других профессиональных медицинских работников.</p>
                <p>Все материалы, размещенные на данном веб-сайте, предназначены исключительно для медицинских работников и производителей. Находясь на данном сайте, Вы подтверждаете, что имеете медицинское образование.</p>
                <p>Сайт не должен использоваться как источник информации по самолечению.</p>
                <p>ООО «ДИДЖИО» все права защищены, в случае цитирования ссылка на источник обязательна.</p>
                <p>Данный сайт является электронной версией журнала "MEDPRAVDA", действующего на основании свидетельства о государственной регистрации печатного средства массовой информации серия <a href="https://dzmi.minjust.gov.ua/home/index" target="_blank">КВ № 24100-13940Р</a> от 05.07.2019 года</p>
            </div>
        </div>
    </div>
    <div class="copyright-mp">
        Copyright @ 2017 - 2020
    </div>
</footer>
