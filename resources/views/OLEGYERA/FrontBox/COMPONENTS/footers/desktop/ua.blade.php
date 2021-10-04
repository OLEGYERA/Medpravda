<footer>
    <div class="footer-alert">
        <object type="image/svg+xml" data="/img/FrontBox/minzdrav/blue_ua.svg"></object>
    </div>
    <nav class="footer-navigation">
        <ul class="col-30">
            <li><a href="{{ route('ua.catalog.drug.alphabet', ['alpha' => 'А']) }}">ПРЕПАРАТИ</a></li>
            <li><a href="{{ route('ua.catalog.bad.alphabet', ['alpha' => 'А']) }}">ДІЄТИЧНІ ДОБАВКИ</a></li>
            <li><a href="{{ route('ua.catalog.cosmetic.alphabet', ['alpha' => 'А']) }}">КОСМЕТИЧНІ ЗАСОБИ</a></li>
            <li><a href="{{ route('ua.catalog.ware.alphabet', ['alpha' => 'А']) }}">ВИРОБИ МЕДИЧНОГО ПРИЗНАЧЕННЯ</a></li>
            <li><a href="{{ route('ua.media-zone.article', ['alias' => 'rotovirusnaya-infekciya'])}}">РОТАВІРУС</a></li>

        </ul>
        <ul class="col-30">
            <li><a href="{{ route('ua.catalog.inname.alphabet', ['alpha' => 'А']) }}">МІЖНАРОДНІ НАЗВИ</a></li>
            <li><a href="{{ route('ua.catalog.pharma.alphabet', ['alpha' => 'А']) }}">ФАРМАКОТЕРАПЕВТИЧНІ ГРУПИ ПРЕПАРАТОВ</a></li>
            <li><a href="{{ route('ua.catalog.pharma_bad.list') }}">ГРУПИ ДІЄТИЧНИХ ДОБАВОК</a></li>
            <li><a href="{{ route('ua.catalog.fabricator.alphabet', ['alpha' => 'А']) }}">ВИРОБНИКИ</a></li>
            <li><a href="{{ route('ua.catalog.drug.atx') }}">ATX-КЛАСИФІКАЦІЇ ПРЕПАРАТІВ</a></li>
            <li><a href="{{ route('ua.catalog.bad.atx') }}">ATX-КЛАСИФІКАЦІЇ ДІЄТИЧНИХ ДОБАВОК</a></li>
            <li><a href="{{ route('ua.catalog.ware.atx') }}">ATX-КЛАСИФІКАЦІЇ ВИРОБІВ МЕДИЧНОГО ПРИЗНАЧЕННЯ</a></li>
            <li><a href="{{ route('ua.catalog.cosmetic.atx') }}">ATX-КЛАСИФІКАЦІЇ КОСМЕТИЧНИХ ЗАСОБІВ</a></li>
        </ul>
        <ul class="col-24">
            <ul class="sub-col">
                <li><a class="disabled">АНАЛІЗИ</a></li>
                <li><a class="disabled">ЗАПИС ДО ЛІКАРЯ</a></li>
            </ul>
            <ul class="sub-col">
                <li><a class="disabled">СВІЖІ СТАТТІ</a></li>
                <li><a class="disabled">ЛОНГРІДИ</a></li>
                <li><a class="disabled">ПОПУЛЯРНІ ТЕМИ</a></li>
                <li><a class="disabled">ІНТЕРВ'Ю</a></li>
            </ul>
        </ul>
        <ul class="col-16">
            <ul class="sub-col">
                <li><a href="{{route('ua.about')}}">ПРО НАС</a></li>
                <li><a href="{{route('ua.cooperation')}}">СПІВРОБІТНИЦТВО</a></li>
                <li><a href="{{route('ua.advertising')}}">РЕКЛАМА НА САЙТІ</a></li>
                <li><a href="{{route('ua.editors')}}">РЕДАКТОРСЬКА ГРУПА</a></li>
                <li><a href="{{route('sitemap')}}">ТОП ПРЕПАРАТИ</a></li>
                {{-- <li><a target="_blank" href="https://ysearch.com.ua">ПОШУК</a></li> --}}
            </ul>
        </ul>
    </nav>
    <div class="footer-terminal-info">
        <div class="terminal-left-info">
            <a href="{{ route('ua.home') }}" class="mp-logo">
                <object type="image/svg+xml" data="/img/FrontBox/Logo/ua.svg"></object>
            </a>
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
            <div class="lang-row">
                @php $segments = Request::segments(); unset($segments[0])@endphp
                <a class="choosed">UA</a>
                <a href="{{env('APP_URL') . (empty($segments) ? '' : ('/' . implode('/',$segments))) }}">RU</a>
            </div>
            <ul class="footer-term-privacy">
                <li><a href="{{route('ua.terms')}}" target="_blank"><span class="under-title">Умови використання сайту</span></a></li>
                <li><a href="{{route('ua.confidentiality')}}" target="_blank"><span class="under-title">Конфіденційності і Cookie-файли</span></a></li>
            </ul>
        </div>

        <div class="footer-detail">
            <div class="about-mp">
                <p>Mедправда - є стандартизованим Інтернет-виданням, призначеним для лікарів та інших професійних медичних працівників</p>
                <p>Всі матеріали, розміщені на даному веб-сайті, призначені виключно для медичних працівників та виробників. Перебуваючи на даному сайті, Ви підтверджуєте, що маєте медичну освіту.</p>
                <p>Сайт не повинен використовуватись як джерело інформації  по самолікуванню.</p>
                <p>ТОВ «ДІДЖІО» всі права захищено, у випадку цитування посилання на джерело є обовязковим.</p>
                <p>Даний сайт є електронною версією журналу "MEDPRAVDA", що діє на підставі свідоцтва про державну реєстрацію друкованого засобу масової інформації серія <a href="https://dzmi.minjust.gov.ua/home/index" target="_blank">КВ № 24100-13940Р</a> від 05.07.2019 року</p>
            </div>
        </div>
    </div>
    <div class="copyright-mp">
        Copyright @ 2017 - 2021
    </div>
</footer>
