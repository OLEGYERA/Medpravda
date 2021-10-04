<div class="fixed-wrap reactive">
    <header id="floatHeader">
        <div class="header-wrap">
            <search :type="'page'" :priority="'drugs'" :screen="'mobile'" :lang="'ru'"></search>
            <a href="{{ route('m.ru.home') }}" class="mp-logo">
                <object type="image/svg+xml" data="{{asset('/img/FrontBox/Logo/ru.svg')}}"></object>
            </a>
            <div class="mp-burger-menu">
                <div class="visual-menu-part">
                    <span class="glyph burger"></span>
                </div>
                <nav class="mp-burger-menu-links">
                    <h3 class="menu-title">Меню</h3>
                    <div class="lang-row">
                        @php $segments = Request::segments();@endphp
                        <a href="{{env('APP_M_URL') . (empty($segments) ? '/ua/' : ('/ua/' . implode('/',$segments))) }}">Укр</a>
                        <a class="choosed">Рус</a>
                    </div>
                    <a href="{{route('m.ru.media-zone.article', ['alias' => 'rotovirusnaya-infekciya'])}}" class="link-menu-item"><span class="title">Ротавирус</span></a>
                    <a href="https://medpravda.ua/landing/potencia/page" class="link-menu-item"><span class="title">Бальзамы Короткова</span></a>
                    <a href="{{route('m.ru.catalog.drug.alphabet')}}" class="link-menu-item"><span class="title">Справочник препаратов</span></a>
                    <a href="{{route('m.ru.catalog.bad.alphabet')}}" class="link-menu-item"><span class="title">Справочник диетических добавок</span></a>
                    <a href="{{route('m.ru.catalog.ware.alphabet')}}" class="link-menu-item"><span class="title">Справочник мед. изделий</span></a>
                    <a href="{{route('m.ru.catalog.cosmetic.alphabet')}}" class="link-menu-item"><span class="title">Справочник косметических средств</span></a>
                </nav>
            </div>
        </div>
    </header>
</div>
<div class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
    <div class="breadcrumb"
         itemprop="itemListElement" itemscope
         itemtype="https://schema.org/ListItem">
        <a itemprop="item"
           href="{{ route('m.ru.home') }}">
            <span class="label" itemprop="name">Главная</span>/
            <meta itemprop="position" content="1"/>
        </a>
    </div>
    @foreach($breadcrumbs as $key => $breadcrumb)
        <div class="breadcrumb"
             itemprop="itemListElement" itemscope
             itemtype="https://schema.org/ListItem">
            <a itemprop="item"
               @if($breadcrumb['alias']) href="{{ $breadcrumb['alias'] }}" itemid="{{ $breadcrumb['alias'] }}"@endif>
                <span class="label1" itemprop="name">{{$breadcrumb['title']}}</span>/
                <meta itemprop="position" content="{{$key + 2}}"/>
            </a>
        </div>
    @endforeach
</div>






