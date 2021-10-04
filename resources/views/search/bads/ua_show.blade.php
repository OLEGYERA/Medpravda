<section class="content m-top">
    <div class="wrap">
        {{--BreadCrumbs--}}
        <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
             itemtype="http://schema.org/BreadcrumbList">
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <a href="{{ route('main', ['loc'=>'ua']) }}/" itemprop="item">Головна</a>
                <meta itemprop="position" content="1"/>
            </div>
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <span>Дієтичні добавки</span>
                <meta itemprop="position" content="3"/>
            </div>
        </div>
        {{--BreadCrumbs--}}
        {{--<h1 class="product-title">Сортування за:</h1>--}}
        <h1>Сортування за: Дієтичними добавками</h1>

        @include('search.ua_nav')
    </div>
    <div class="section-title-meta-icon serch-height">
        <h3>Дієтичні добавки:</h3>
        <div class="section-meta-icon">
            <div class="section-icon">
                <img src="{{ asset('assets') }}/images/title-icons/found.png" alt="иконка Также ищут"
                        {!! image_width_height_return_tags(asset('assets').'/images/title-icons/found.png') !!}
                >
            </div>
        </div>
    </div>
    <div class="wrap">
        <div class="product-analog">
            @if(!empty($classifications))
                <div class="">
                    @include('search.bads.list', ['loc'=>true])
                </div>
            @endif
        </div>
    </div>
</section>