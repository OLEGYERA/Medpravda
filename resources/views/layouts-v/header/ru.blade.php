<!-- HEADER -->
<div class="@if('price' == Route::currentRouteName()) fixed-wrap-no-width @else fixed-wrap @endif">
    <header id="myHeader">
        <div class="wrap">
            <div class="logo">
                @if('main' == Route::currentRouteName())
                    <img src="{{ asset('assets') }}/images/main/logo_ru.png" alt="Главный логотип Медправда" title="Главный логотип"
                                {!! image_width_height_return_tags(asset('assets').'/images/main/logo_ru.png') !!}
                    >
                @else
                    <a href="{{ route('main') }}/">
                        <img src="{{ asset('assets') }}/images/main/logo_ru.png" alt="Главный логотип Медправда" title="Главный логотип" id="menu-main"
                                {!! image_width_height_return_tags(asset('assets').'/images/main/logo_ru.png') !!}
                        ></a>
                @endif
            </div>
            <div class="search">
                {!! Form::open(['url'=>route('search'), 'method'=>'post']) !!}
                <input autocomplete="off" type="search" name="search" class="search-placeholder"
                       placeholder="Поиск по сайту">
                <input type="hidden" name="stats">
                <div class="wrap-search"></div>
                {{ Form::close() }}
                <span class="img-search"></span>
            </div>
            <div class="main-menu">
                <nav class="mobile-display-none">
                    <div>
                        @if('search_alpha' == Route::currentRouteName())
                            <div class="primary-menu"><a>Справочник</a></div>
                        @else
                            <div class="primary-menu"><a href="{{ route('search_alpha') }}/"
                                                         id="menu-drugs">Справочник</a></div>
                        @endif
                    </div>
                    <div>
                        <div class="primary-menu"><a>Болезни и симптомы</a></div>
                        <div class="sub-menu">
                            @if(!isset($problematic_asUl))
                                <?php $problematic_asUl = Fresh\Medpravda\Problematic::where('alias', 'problematics')->first()->get_child_pages();?>
                            @endif
                            @if(count($problematic_asUl))
                                <ul>
                                    @foreach($problematic_asUl as $one_problematic_asUl)
                                        @if($one_problematic_asUl->children->approved)
                                            <li class="active">
                                                <a href="{{route('diseases.symptoms.list', $one_problematic_asUl->children->alias)}}">{{$one_problematic_asUl->children->title}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>

                            @endif
                            {{--{{dd($problematic_asUl)}}--}}
                        </div>
                    </div>
                    <div>
                        @if('top_articles' == Route::currentRouteName())
                            <div class="primary-menu"><a>Топ статьи</a></div>
                        @else
                            <div class="primary-menu"><a href="{{ route('top_articles') }}/" id="menu-tops">Топ
                                    статьи</a></div>
                        @endif
                    </div>
                    <div>
                        @if('articles' == Route::currentRouteName() && null == Request::segment(2))
                            <div class="primary-menu"><a>Свежие статьи</a></div>
                            <div class="sub-menu">{!! $cats->asUl() !!}</div>
                        @else
                            <div class="primary-menu"><a href="{{ route('articles') }}/" id="menu-articles">Свежие
                                    статьи</a></div>
                            <div class="sub-menu">{!! $cats->asUl() !!}</div>
                        @endif
                    </div>
                    {{--<div>--}}
                    {{--@if('adv' == Route::currentRouteName())--}}
                    {{--<div class="primary-menu"><a>Реклама</a></div>--}}
                    {{--@else--}}
                    {{--<div class="primary-menu"><a href="{{ route('adv') }}" id="menu-rek">Реклама</a></div>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    <div>
                        @if('articles_cat' == Route::currentRouteName())
                            <div class="primary-menu baby-button"><a>Мой малыш</a></div>
                        @else
                            <div class="primary-menu baby-button"><a
                                        href="{{route('articles_cat', ['cat_alias'=> 'moy-malysh'])}}/">Мой малыш</a>
                            </div>
                        @endif

                        @if('get_wares' == Route::currentRouteName())
                            <div class="primary-menu desktop-none"><a>Изделия медицинского назначения</a></div>
                        @else
                            <div class="primary-menu desktop-none"><a href="{{ route('get_wares') }}/">Изделия медицинского назначения</a></div>
                        @endif

                        @if('get_cosmetics' == Route::currentRouteName())
                            <div class="primary-menu desktop-none"><a>Косметические средства</a></div>
                        @else
                            <div class="primary-menu desktop-none"><a href="{{ route('get_cosmetics') }}/">Косметические средства</a></div>
                        @endif

                        @if('adv' == Route::currentRouteName())
                            <div class="primary-menu desktop-none"><a>Реклама на сайте</a></div>
                        @else
                            <div class="primary-menu desktop-none"><a href="{{ route('adv') }}/">Реклама на сайте</a></div>
                        @endif

                        @if('get_bads' == Route::currentRouteName())
                            <div class="primary-menu desktop-none"><a>Диетические добавки</a></div>
                        @else
                            <div class="primary-menu desktop-none"><a href="https://medpravda.ua/sort/bads/all/">Диетические добавки</a></div>
                        @endif




                    </div>
                    <div class="lang-menu desktop-display-none">
                        <span class="active">Рус</span>
                        <a href="{{ str_replace(env('APP_URL'), env('APP_URL').'/ua', Request::url()) }}/">Укр</a>
                    </div>
                </nav>
                <a class="burgerBtn">
                    <span></span>
                </a>
            </div>
            <div class="lang-menu mobile-display-none">
                <span class="active">Рус</span>
                <a href="{{ str_replace(env('APP_URL'), env('APP_URL').'/ua', Request::url()) }}/">Укр</a>
            </div>
        </div>
    </header>
    <div class="top-meta-section">
        <div class="wrap">
            <div class="top-meta mobile-display-none">
            <span class="meta-title">
                {{ $block->title ?? '' }}
            </span>
                @if(!empty($block->first) && !empty($block->first_url))
                    @if(collect(Request::segments())->last() == $block->first_url)
                        <a class="btn-meta">{{$block->first}}</a>
                    @else
                        {{--                        {{ link_to_route('medicine', $block->first, ['alias' =>$block->first_url], ['class'=>'btn-meta']) }}--}}
                        <a class="btn-meta"
                           href="{{route('medicine',['alias' =>$block->first_url])}}/">{{$block->first}}</a>
                    @endif

                @endif
                @if(!empty($block->second) && !empty($block->second_url))
                    @if(collect(Request::segments())->last() == $block->second_url)
                        <a class="btn-meta">{{$block->second}}</a>
                    @else
                        {{--{{ link_to_route('medicine', $block->second, ['alias' =>$block->second_url], ['class'=>'btn-meta']) }}--}}
                        <a class="btn-meta"
                           href="{{route('medicine',['alias' =>$block->second_url])}}/">{{$block->second}}</a>
                    @endif
                @endif
                @if(!empty($block->third) && !empty($block->third_url))
                    @if(collect(Request::segments())->last() == $block->third_url)
                        <a class="btn-meta">{{$block->third}}</a>
                    @else
                        {{--{{ link_to_route('medicine', $block->third, ['alias' =>$block->third_url], ['class'=>'btn-meta']) }}--}}
                        <a class="btn-meta"
                           href="{{route('medicine',['alias' =>$block->third_url])}}/">{{$block->third}}</a>
                    @endif
                @endif
            </div>
            <div class="search">
                {!! Form::open(['url'=>route('search'), 'method'=>'post']) !!}
                <input autocomplete="off" type="search" name="search" class="search-placeholder"
                       placeholder="Поиск по сайту">
                <input type="hidden" name="stats">
                <div class="wrap-search"></div>
                {{ Form::close() }}
                <span class="img-search"></span>
            </div>
        </div>
    </div>
</div>
<!-- end HEADER -->