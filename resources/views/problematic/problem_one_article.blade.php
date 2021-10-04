<div class="wrap m-top blue-circle">
    {{--BreadCrumbs--}}
    <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
         itemtype="http://schema.org/BreadcrumbList">
        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
            <a href="{{ route('main') }}/" itemprop="item">
                <span itemprop="name" class="label1">Главная</span>
            </a>
            <meta itemprop="position" content="1"/>
        </div>
        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
            <a itemprop="item" class="none-link">
                <span itemprop="name" class="label1">Болезни и симптомы</span>
            </a>
            <meta itemprop="position" content="2"/>
        </div>
        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
            <a href="" itemprop="item">
                <span itemprop="name" class="label1">Симптомы</span>
            </a>
            <meta itemprop="position" content="3"/>
        </div>
        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
            <span itemprop="name" class="label1">Головная боль</span>
            <meta itemprop="position" content="4"/>
            <meta itemprop="item" content="{{url()->current() . '/'}}">
        </div>
    </div>
    {{--BreadCrumbs--}}
    <h1>Головная боль</h1>
</div>