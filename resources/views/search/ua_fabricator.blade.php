<section class="content m-top">
    <div class="wrap">
        {{--BreadCrumbs--}}
        <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
             itemtype="http://schema.org/BreadcrumbList">
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <a href="{{ route('main', ['loc'=>'ua']) }}/" itemprop="item">
                    <span class="label1" itemprop="label1">Головна</span>
                </a>
                <meta itemprop="position" content="1"/>
            </div>
            @if(!empty($fabricator))
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <a href="{{ route('search_fabricator_u') }}" itemprop="item">
                        <span class="label1" itemprop="name">Сортування за виробником</span>
                    </a>
                    <meta itemprop="position" content="2"/>
                </div>
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <span class="label1" itemprop="name">{{ $fabricator->utitle }}</span>
                    <meta itemprop="position" content="3"/>
                    <meta itemprop="item" content="{{url()->current() . '/'}}">
                </div>
            @else
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <span itemprop="name" class="label1">Сортування за виробником</span>
                    <meta itemprop="position" content="2"/>
                    <meta itemprop="item" content="{{url()->current() . '/'}}">
                </div>
            @endif
        </div>
        {{--BreadCrumbs--}}
        {{--<h1 class="product-titl">Сортування за:</h1>--}}
        @if(!empty($fabricator->title))
            <h1>Сортування за: Виробником - "{{$fabricator->title}}"</h1>
        @else
            @if(!empty($val))
                <h1>Сортування за: Виробником , на букву - {{$val}}</h1>
            @else
                <h1>Сортування за: Виробником</h1>
            @endif

        @endif

        @include('search.ua_nav')
    </div>
    <div class="section-title-meta-icon serch-height">
        <h3>Сортування за виробником:
            @if(!empty($fabricator->utitle))
                <a>{{ $fabricator->utitle }}</a>
            @endif
        </h3>
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
            <div class="search-alfavit">
                <div class="search-alfavit-column">
                    <div class="search-left-content">
                        @if(!empty($alphabet['en']))
                            <div class="first-alfavit">
                                @foreach($alphabet['en'] as $a)
                                    <a href="{{ route('search_fabricator_u', ['val'=>$a]) }}/"
                                       class="nav-button-grey">{{$a}}</a>
                                @endforeach
                            </div>
                        @endif
                        @if(!empty($alphabet['ru']))
                            <div class="second-alfavit">
                                @foreach($alphabet['ru'] as $key => $a)
                                    @continue($key === 0)
                                    @continue($key === 1)
                                    @continue($key === 2)
                                    @continue($key === 3)
                                    @continue(count($alphabet['ru'])-1 === $key)
                                    <a href="{{ route('search_fabricator_u', ['val'=>$a]) }}/"
                                       class="nav-button-grey">{{$a}}</a>
                                    @if($a === 'З')
                                        <a href="{{ route('search_fabricator_u', ['val'=>$alphabet['ru'][3]]) }}/"
                                       class="nav-button-grey">I</a>
                                    @endif
                                    @if($a === 'Е')
                                        <a href="{{ route('search_fabricator_u', ['val'=>'Є']) }}/"
                                       class="nav-button-grey">Є</a>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        @if(!empty($letters))
                            <div class="second-alfavit">
                                @foreach($letters as $letter)
                                    <a href="{{ route('search_fabricator_u', ['val'=>$letter->FIRSTLETTER]) }}/"
                                       class="nav-button-grey">{{ $letter->FIRSTLETTER }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @if(!empty($medicines))
                @foreach($medicines as $medicine)
                    <div class="search-result">
                        <a href="{{ route('medicine_ua', ['medicine'=> $medicine->alias]) }}/">
                            <h3>{{ $medicine->title }}</h3></a>
                    </div>
                @endforeach
            @endif
            @if(!empty($fabricators))
                @foreach($fabricators as $fabricator)
                    <div class="search-result">
                        <a href="{{ route('search_fabricator_u', ['val'=>$val, 'fabricator'=> $fabricator->alias]) }}/">
                            <h3>{{ $fabricator->utitle }}</h3></a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>