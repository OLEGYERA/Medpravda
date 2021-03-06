<section class="content m-top">
    <div class="wrap">
        {{--BreadCrumbs--}}
        <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
             itemtype="http://schema.org/BreadcrumbList">
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <a href="{{ route('main') }}/" itemprop="item">
                    <span class="label1" itemprop="name">Главная</span>
                </a>
                <meta itemprop="position" content="1"/>
            </div>
            @if(!empty($letter))
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <a href="{{ route('search_alpha') }}/" itemprop="item">
                        <span class="label1" itemprop="name">Сортировка по алфавиту</span>
                    </a>
                    <meta itemprop="position" content="2"/>
                </div>
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <span class="label1" itemprop="name">{{ $letter }}</span>
                    <meta itemprop="position" content="3"/>
                    <meta itemprop="item" content="{{url()->current() . '/'}}">
                </div>
            @else
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <span itemprop="name" class="label1">Сортировка по алфавиту</span>
                    <meta itemprop="position" content="2"/>
                    <meta itemprop="item" content="{{url()->current() . '/'}}">
                </div>
            @endif
        </div>
        {{--BreadCrumbs--}}
        {{--<h1 class="product-title">Сортировка по:</h1>--}}
        @if(!empty($letter))
            <h1>Сортировка по: {{"Алфавиту на букву - ".$letter}}</h1>
            @else
            <h1>Сортировка по: Алфавиту</h1>
        @endif

        @include('search.nav')
    </div>
    <div class="section-title-meta-icon serch-height">
        <h3>Сортировка препаратов по алфавиту:
            @if(!empty($letter))
                <a>{{ $letter }}</a>
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
                                    <a href="{{ route('search_alpha', ['val'=>$a]) }}/"
                                       class="nav-button-grey">{{$a}}</a>
                                @endforeach
                            </div>
                        @endif
                        @if(!empty($alphabet['ru']))
                            <div class="second-alfavit">
                                @foreach($alphabet['ru'] as $a)
                                    <a href="{{ route('search_alpha', ['val'=>$a]) }}/"
                                       class="nav-button-grey">{{$a}}</a>
                                @endforeach
                            </div>
                        @endif
                        @if(!empty($letters))
                            <div class="second-alfavit">
                                @foreach($letters as $letter)
                                    @continue($current_val == 'М' && $letter->FIRSTLETTER == 'М ')
                                    <a href="{{ route('search_alpha', ['val'=>$letter->FIRSTLETTER]) }}/"
                                       class="nav-button-grey">{{ $letter->FIRSTLETTER }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @if(!empty($medicines))
                <div class="search-result">
                    @foreach($medicines as $medicine)
                        <a href="{{ route('medicine', ['medicine'=> $medicine->alias]) }}/">
                            <h3>{{ $medicine->title }}</h3></a>
                    @endforeach
                </div>
                @if(count($medicines)>10)
                    <a class="btn-link" id="show">Показать больше <i class="fa fa-angle-down"
                                                                     aria-hidden="true"></i></a>
                @endif
            @endif
        </div>
    </div>
</section>