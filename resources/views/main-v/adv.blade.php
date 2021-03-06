<section class="full-content page-articles m-top">
    <div class="wrap">
        {{--BreadCrumbs--}}
        <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
             itemtype="http://schema.org/BreadcrumbList">
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                @if(!empty($loc))
                    <a href="{{ route('main', ['loc'=>'ua']) }}/" itemprop="item">
                        <span class="label1" itemprop="name">Головна</span>
                    </a>
                @else
                    <a href="{{ route('main') }}/" itemprop="item">
                        <span class="label1" itemprop="name">Главная</span>
                    </a>
                    <meta itemprop="name" content="Главная">
                @endif
                <meta itemprop="position" content="1"/>
            </div>
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                @if(empty($loc))
                    <span itemprop="name" class="label1">Размещение рекламы</span>
                @else
                    <span itemprop="name" class="label1">Розміщення реклами</span>
                @endif
                <meta itemprop="position" content="2"/>
                <meta itemprop="item" content="{{ url()->current() . '/' }}">
            </div>
        </div>
        {{--BreadCrumbs--}}
        <div class="admin-content">
            @if(!empty($advs) && is_object($advs))
                @foreach($advs as $adv)
                    @if($loop->first)
                        @if(empty($loc))
                            <p><h1>{{ $adv->title }}</h1></p>
                            {!! $adv->text !!}
                        @else
                            <p><h1>{{ $adv->utitle }}</h1></p>
                            {!! $adv->utext !!}
                        @endif
                    @else
                        @if(empty($loc))
                            <p>
                            <div class="section-title-meta-icon">
                                <h3>{{ $adv->title }}</h3>
                            </div>
                            </p>
                            @if(!empty($adv->path))
                                <p>
                                <div class="full-width-image">
                                    <img src="{{ asset('asset') }}/images/rk/ru/{{ $adv->path }}"
                                         alt="{{ $adv->img_alt ?? '' }}" title="{{ $adv->img_title ?? '' }}"
                                    {!! image_width_height_return_tags(asset('asset').'/images/rk/ru/'. $adv->path) !!}
                                    >
                                </div>
                                </p>
                            @endif
                            {!! $adv->text !!}
                        @else
                            <p>
                            <div class="section-title-meta-icon">
                                <h3>{{ $adv->utitle }}</h3>
                            </div>
                            </p>
                            @if(!empty($adv->upath))
                                <p>
                                <div class="full-width-image">
                                    <img src="{{ asset('asset') }}/images/rk/ua/{{ $adv->upath }}"
                                         alt="{{ $adv->uimg_alt ?? '' }}" title="{{ $adv->uimg_title ?? '' }}"
                                    {!! image_width_height_return_tags(asset('asset').'/images/rk/ua/'.$adv->upath) !!}
                                    >
                                </div>
                                </p>
                            @endif
                            {!! $adv->utext !!}
                        @endif
                    @endif
                @endforeach
            @endif
        </div>

    </div>

</section>

