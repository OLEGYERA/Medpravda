<section class="content m-top">
    <div class="wrap">
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
                <span itemprop="name" class="label1">Экстренные случаи</span>
                <meta itemprop="position" content="3"/>
                <meta itemprop="item" content="{{url()->current() . '/'}}">
            </div>
        </div>
        {{--BreadCrumbs--}}
        <h1>Болезни и симптомы</h1>
        <div class="product-nav">
            <a href="" class="nav-button-grey">Болезни</a>
            <a href="" class="nav-button-grey">Симптомы</a>
            <a href="" class="nav-button-grey active">Экстренные случаи</a>
        </div>
    </div>
</section>