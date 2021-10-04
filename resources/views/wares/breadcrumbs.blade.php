{{--BreadCrumbs--}}
<div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs"
     itemscope itemtype="http://schema.org/BreadcrumbList">
    <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
        <a href="{{ route('main') }}" itemprop="item">
            <span itemprop="name" class="label1">Главная</span>
            <meta itemprop="position" content="1"/>
        </a>
    </div>
    <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
        <a href="{{ route('sort') }}" itemprop="item">
            <span itemprop="name" class="label1">Поиск препаратов</span>
            <meta itemprop="position" content="2"/>
        </a>
    </div>
    <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
        <a href="{{ route('get_wares') }}" itemprop="item">
            <span itemprop="name" class="label1">Мед изделия</span>
            <meta itemprop="position" content="3"/>
        </a>
    </div>
    <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
        <span itemprop="name" class="label1">{{ $model->bread_title ?? 'Официальная инструкция' }}</span>
        <meta itemprop="position" content="4"/>
    </div>
</div>
{{--BreadCrumbs--}}