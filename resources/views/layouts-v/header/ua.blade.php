<!-- HEADER
{{ Route::currentRouteName() }}
-->
    <div class="@if('price' == Route::currentRouteName()) fixed-wrap-no-width @else fixed-wrap @endif">
    <header id="myHeader">
        <div class="wrap">
            <div class="logo">
                @if('main' == Route::currentRouteName())
                    <img src="{{ asset('assets') }}/images/main/logo_ua.png" alt="Головний логотип Медправда" title="Головний логотип"
                        {!! image_width_height_return_tags(asset('assets').'/images/main/logo_ua.png') !!}
                    >
                @else
                    <a href="{{ route('main', ['loc'=>'ua']) }}/">

                    {{-- @if('ua' == Request::segment(1))
                             @else
                                 <a href="{{ route('main') }}">
                                     @endif--}}
                    <img src="{{ asset('assets') }}/images/main/logo_ua.png" alt="Головний логотип Медправда" title="Головний логотип"
                            {!! image_width_height_return_tags(asset('assets').'/images/main/logo_ua.png') !!}
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
                        @if('search_alpha_u' == Route::currentRouteName())
                            <div class="primary-menu"><a>Довідник</a></div>
                        @else
                            <div class="primary-menu"><a href="{{ route('search_alpha_u') }}/">Довідник</a></div>
                        @endif
                    </div>
                    <div>

                            <div class="primary-menu"><a>Хвороби та симптоми</a></div>

                            <div class="sub-menu">
                                @if(!isset($problematic_asUl))
                                    <?php $problematic_asUl = Fresh\Medpravda\Uaproblematic::where('alias', 'problematics')->first()->get_ru2()->get_child_pages();?>
                                @endif
                                @if(count($problematic_asUl))
                                    <ul>
                                    @foreach($problematic_asUl as $one_problematic_asUl)
                                        @if($one_problematic_asUl->children->get_ua()->approved)
                                            <li class="active">
                                                <a href="{{route('ua_diseases.symptoms.list', $one_problematic_asUl->children->get_ua()->alias)}}">{{$one_problematic_asUl->children->get_ua()->title}}</a>
                                            </li>
                                            @endif
                                    @endforeach
                                    </ul>

                                @endif
                            </div>
                    </div>
                    <div>
                        @if('ua_top_articles' == Route::currentRouteName())
                            <div class="primary-menu"><a>Топ статті</a></div>
                        @else
                            <div class="primary-menu"><a href="{{ route('ua_top_articles') }}/">Топ статті</a></div>
                        @endif
                    </div>
                    <div>
                        {{--{{dd($cats)}}--}}
                        <?php
                        $menus = Fresh\Medpravda\Menu::where('own', 'ua')->get();
                        ?>
                        @if('ua_articles' == Route::currentRouteName() && null == Request::segment(3))
                            <div class="primary-menu"><a>Свіжі статті</a></div>
                            <div class="sub-menu">


                                    <ul>
                                        @foreach($menus as $m)
                                            <li><a href="{{route('ua_articles',$m->category->alias)}}">{{$m->category->utitle}}</a></li>
                                        @endforeach
                                    </ul>
                            </div>
                        @else
                            <div class="primary-menu"><a href="{{ route('ua_articles') }}/">Свіжі статті</a></div>
{{--                            {{dd($cats->asUl())}}--}}
                            <div class="sub-menu">
                                <ul>
                                    @foreach($menus as $m)
                                        <li><a href="{{route('ua_articles',$m->category->alias)}}">{{$m->category->utitle}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    {{--<div>--}}
                        {{--@if('ua_adv' == Route::currentRouteName())--}}
                            {{--<div class="primary-menu"><a>Реклама</a></div>--}}
                        {{--@else--}}
                            {{--<div class="primary-menu"><a href="{{ route('ua_adv') }}">Реклама</a></div>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    <div>
                        @if('ua_articles_cat' == Route::currentRouteName())
                            <div class="primary-menu baby-button"><a>Мій малюк</a></div>
                        @else
                            <div class="primary-menu baby-button"><a href="{{route('ua_articles_cat', ['cat_alias'=> 'moy-malysh'])}}/">Мій малюк</a></div>
                        @endif

                        @if('get_wares_ua' == Route::currentRouteName())
                            <div class="primary-menu desktop-none"><a>Вироби медичного призначення</a></div>
                        @else
                            <div class="primary-menu desktop-none"><a href="{{ route('get_wares_ua') }}/">Вироби медичного призначення</a></div>
                        @endif

                        @if('get_cosmetics_ua' == Route::currentRouteName())
                            <div class="primary-menu desktop-none"><a>Косметичні засоби</a></div>
                        @else
                            <div class="primary-menu desktop-none"><a href="{{ route('get_cosmetics_ua') }}/">Касметичні засоби</a></div>
                        @endif

                        @if('ua_adv' == Route::currentRouteName())
                            <div class="primary-menu desktop-none"><a>Реклама на сайті</a></div>
                        @else
                            <div class="primary-menu desktop-none"><a href="{{ route('ua_adv') }}/">Реклама на сайті</a></div>
                        @endif

                        @if('get_bads_ua' == Route::currentRouteName())
                            <div class="primary-menu desktop-none"><a>Діетичні добавки</a></div>
                        @else
                            <div class="primary-menu desktop-none"><a href="https://medpravda.ua/ua/sort/bads/all/">Діетичні добавки</a></div>
                        @endif


                    </div>
                    <div class="lang-menu desktop-display-none">
                        <a href="{{  str_replace('/ua', '', Request::url()) }}/">Рус</a>
                        <span class="active">Укр</span>
                    </div>
                </nav>
                <a class="burgerBtn">
                    <span></span>
                </a>
            </div>
            <div class="lang-menu mobile-display-none">
                <a href="{{  str_replace('/ua', '', Request::url()) }}/">Рус</a>
                <span class="active">Укр</span>
            </div>
        </div>
    </header>
    <section class="top-meta-section">
        <div class="wrap">
            <div class="top-meta mobile-display-none">
            <span class="meta-title">
                {{ $block->utitle ?? '' }}
            </span>
                @if(!empty($block->fourth) && !empty($block->fourth_url))
                    @if(collect(Request::segments())->last() == $block->fourth_url)
                        <a class="btn-meta">{{$block->fourth}}</a>
                        @else
                         {{ link_to_route('medicine_ua', $block->fourth, ['alias' =>$block->fourth_url], ['class'=>'btn-meta']) }}
                        @endif
                @endif

                @if(!empty($block->fifth) && !empty($block->fifth_url))
                        @if(collect(Request::segments())->last() == $block->fifth_url)
                            <a class="btn-meta">{{$block->fifth}}</a>
                        @else
                            {{ link_to_route('medicine_ua', $block->fifth, ['alias' =>$block->fifth_url], ['class'=>'btn-meta']) }}
                        @endif
                @endif

                @if(!empty($block->sixth) && !empty($block->sixth_url))
                        @if(collect(Request::segments())->last() == $block->sixth_url)
                            <a class="btn-meta">{{$block->sixth}}</a>
                        @else
                            {{ link_to_route('medicine_ua', $block->sixth, ['alias' =>$block->sixth_url], ['class'=>'btn-meta']) }}
                        @endif

                @endif
            </div>
            <div class="search">
                {!! Form::open(['url'=>route('search'), 'method'=>'post']) !!}
                <input autocomplete="off" type="search" name="search" class="search-placeholder"
                       placeholder="Пошук по сайту">
                <input type="hidden" name="stats">
                <div class="wrap-search"></div>
                {{ Form::close() }}
                <span class="img-search"></span>
            </div>
        </div>
    </section>
</div>
<!-- end HEADER -->