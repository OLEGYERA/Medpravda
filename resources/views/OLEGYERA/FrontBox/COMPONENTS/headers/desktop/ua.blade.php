<div class="fixed-wrap reactive">
    @php $segments = Request::segments(); unset($segments[0])@endphp
    <header id="floatHeader">
        <div class="header-wrap">
            <a href="{{route('ua.home')}}" class="logo-box">
                <img class="logo" src="{{asset('/img/FrontBox/Logo/ua.svg')}}" alt="">
                <img class="mini-logo" src="{{asset('/img/FrontBox/Logo/mini.svg')}}" alt="">
            </a>
            <nav class="header-navigation">
                <div class="search-navigation">
                    <mp-search :lang="'ua'"></mp-search>
                </div>
                <div class="menu">
                    <div class="toggle-box">
                        <span class="glyph burger mb"></span>
                    </div>
                    <div class="menu-box">
                        <div class="switch-local">
                            <a class="switched">UA</a>
                            <a href="{{env('APP_URL') . (empty($segments) ? '' : ('/' . implode('/',$segments))) }}">RU</a>
                        </div>
                        <ul class="link-navigation">
                            <li><a href="{{route('ua.control', ['val' => 'control-snu-i-ruhu'])}}">Контроль сну та руху</a></li>
                            <li><a href="{{route('ua.media-zone.article', ['alias' => 'rotovirusnaya-infekciya'])}}" class="link-menu-item"><span class="title">Ротавірус</span></a></li>
                            <li><a href="https://medpravda.ua/landing/potencia/page-ua" class="link-menu-item"><span class="title">Бальзами Короткова</span></a></li>
                            <li><a href="{{route('ua.catalog.drug.alphabet')}}" class="link-menu-item"><span class="title">Довідник препаратів</span></a></li>
                            <li><a href="{{route('ua.catalog.bad.alphabet')}}" class="link-menu-item"><span class="title">Довідник дієтичних добавок</span></a></li>
                            <li><a href="{{route('ua.catalog.ware.alphabet')}}" class="link-menu-item"><span class="title">Довідник мед. виробів</span></a></li>
                            <li><a href="{{route('ua.catalog.cosmetic.alphabet')}}" class="link-menu-item"><span class="title">Довідник косметичних засобів</span></a></li>
                            <li><a href="{{route('ua.catalog.term.alphabet')}}" class="link-menu-item"><span class="title">Довідник термінології</span></a></li>

                        </ul>
                    </div>
                </div>



            </nav>
            <div class="switch-local">
                <a class="switched">UA</a>
                <a href="{{env('APP_URL') . (empty($segments) ? '' : ('/' . implode('/',$segments))) }}">RU</a>
            </div>
        </div>
    </header>
</div>

<style>
    .lang-row a{
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: underline;
        color: #2D9CDB;
    }
    .lang-row a:first-child{
        margin-right: 5px;
    }

    .lang-row .choosed{
        background: #2D9CDB;
        border-radius: 2px;
        font-size: 14px;
        color: #fff;
        text-decoration: none;
    }
    .lang-row a.choosed:hover{
        color: #fff!important;
    }
    .lang-row a:hover{
        text-decoration: none;
    }
</style>

@if($breadcrumbs !== null)
    <div class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
        <div class="breadcrumb"
             itemprop="itemListElement" itemscope
             itemtype="https://schema.org/ListItem">
            <a itemprop="item"
               href="{{ route('ru.home') }}">
                <span class="label1" itemprop="name">Главная</span>/
                <meta itemprop="position" content="1"/>
            </a>
        </div>
        {{--            @dd($breadcrumbs)--}}
        @foreach($breadcrumbs as $key => $breadcrumb)
            <div class="breadcrumb"
                 itemprop="itemListElement" itemscope
                 itemtype="https://schema.org/ListItem">
                <a itemprop="item"
                   @if($breadcrumb['alias']) href="{{ $breadcrumb['alias'] }}" itemid="{{ $breadcrumb['alias'] }}" @endif>
                    <span class="label1" itemprop="name">{{$breadcrumb['title']}}</span>/
                    <meta itemprop="position" content="{{$key + 2}}"/>
                </a>
            </div>
        @endforeach
    </div>
@endif



