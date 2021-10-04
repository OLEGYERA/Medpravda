<div class="fixed-wrap reactive">
    <header id="floatHeader">
        <div class="header-wrap">
            <search :type="'page'" :priority="'drugs'" :screen="'mobile'" :lang="'ua'"></search>
            <a href="{{ route('m.ua.home') }}" class="mp-logo">
                <object type="image/svg+xml" data="/img/FrontBox/Logo/ua.svg"></object>
            </a>
            <div class="mp-burger-menu">
                <div class="visual-menu-part">
                    <span class="glyph burger"></span>
                </div>
                <nav class="mp-burger-menu-links">
                    <h3 class="menu-title">Меню</h3>
                    <div class="lang-row">
                        @php $segments = Request::segments(); unset($segments[0])@endphp
                        <a class="choosed">Укр</a>
                        <a href="{{env('APP_M_URL') . (empty($segments) ? '' : ('/' . implode('/',$segments))) }}">Рус</a>
                    </div>
                    <a href="{{route('m.ua.media-zone.article', ['alias' => 'rotovirusnaya-infekciya'])}}" class="link-menu-item"><span class="title">Ротавірус</span></a>
                    <a href="https://medpravda.ua/landing/potencia/page" class="link-menu-item"><span class="title">Бальзами Короткова</span></a>
                    <a href="{{route('m.ua.catalog.drug.alphabet')}}" class="link-menu-item"><span class="title">Справочник препаратов</span></a>
                    <a href="{{route('m.ua.catalog.bad.alphabet')}}" class="link-menu-item"><span class="title">Справочник диетических добавок</span></a>
                    <a href="{{route('m.ua.catalog.ware.alphabet')}}" class="link-menu-item"><span class="title">Справочник мед. изделий</span></a>
                    <a href="{{route('m.ua.catalog.cosmetic.alphabet')}}" class="link-menu-item"><span class="title">Справочник косметических средств</span></a>
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
           href="{{ route('m.ua.home') }}">
            <span class="label" itemprop="name">Головна</span>/
            <meta itemprop="position" content="1"/>
        </a>
    </div>

    @foreach($breadcrumbs as $key => $breadcrumb)
        <div class="breadcrumb"
             itemprop="itemListElement" itemscope
             itemtype="https://schema.org/ListItem">
            <a itemprop="item" @if($breadcrumb['alias']) href="{{ $breadcrumb['alias'] }}" itemid="{{ $breadcrumb['alias'] }}" @endif>
                <span class="label1" itemprop="name">{{$breadcrumb['title']}}</span>/
                <meta itemprop="position" content="{{$key + 2}}"/>
            </a>
        </div>
    @endforeach
</div>




