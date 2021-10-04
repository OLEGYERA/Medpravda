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
                    <span itemprop="name" class="label1">Сотрудничество</span>
                @else
                    <span itemprop="name" class="label1">Сотрудничество</span>
                @endif
                <meta itemprop="position" content="2"/>
                <meta itemprop="item" content="{{ url()->current() . '/' }}">
            </div>
        </div>
        {{--BreadCrumbs--}}
        <div class="admin-content">
            @if(!empty($cooperations) && is_object($cooperations))
                @foreach($cooperations as $cooperation)
                        @if(empty($loc))
                            <p>
                            <div class="section-title-meta-icon">
                                <h3>{{ $cooperation->title }}</h3>
                            </div>
                            </p>
                            @if(!empty($cooperation->path))
                                <p>
                                <div class="full-width-image">
                                    <img src="{{ asset('asset') }}/images/rk/ru/{{ $cooperation->path }}"
                                         alt="{{ $cooperation->img_alt ?? '' }}" title="{{ $cooperation->img_title ?? '' }}"
                                            {!! image_width_height_return_tags(asset('asset').'/images/rk/ru/'. $cooperation->path) !!}
                                    >
                                </div>
                                </p>
                            @endif
                            {!! $cooperation->text !!}
                        @else
                            <p>
                            <div class="section-title-meta-icon">
                                <h3>{{ $cooperation->utitle }}</h3>
                            </div>
                            </p>
                            @if(!empty($cooperation->upath))
                                <p>
                                <div class="full-width-image">
                                    <img src="{{ asset('asset') }}/images/rk/ua/{{ $cooperation->upath }}"
                                         alt="{{ $cooperation->uimg_alt ?? '' }}" title="{{ $cooperation->uimg_title ?? '' }}"
                                            {!! image_width_height_return_tags(asset('asset').'/images/rk/ua/'.$cooperation->upath) !!}
                                    >
                                </div>
                                </p>
                            @endif
                            {!! $cooperation->utext !!}
                        @endif
                @endforeach
            @endif
        </div>

    </div>

</section>

