{{--BreadCrumbs--}}
<div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs"
     itemscope itemtype="http://schema.org/BreadcrumbList">
    <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
        <a href="{{ route('main', ['loc'=>'ua']) }}" itemprop="item">
            <span itemprop="name" class="label1">Головна</span>
            <meta itemprop="position" content="1"/>
        </a>
    </div>
    <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
        <a href="{{ route('search_alpha_u') }}" itemprop="item">
            <span itemprop="name" class="label1">Пошук препаратів</span>
            <meta itemprop="position" content="2"/>
        </a>
    </div>
    <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
        <a href="{{ route('get_cosmetics_ua') }}" itemprop="item">
            <span itemprop="name" class="label1">Косметичні засоби</span>
            <meta itemprop="position" content="3"/>
        </a>
    </div>
    <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
        <span itemprop="name" class="label1">{{ $model->bread_title ?? 'Офіційна інструкція' }}</span>
        <meta itemprop="position" content="4"/>
    </div>
</div>
{{--BreadCrumbs--}}