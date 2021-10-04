<!-- HEADER
{{ Route::currentRouteName() }}
        -->
<div class="fixed-wrap">
    <header id="myHeader">
        <div class="wrap">
            <div class="logo">
                @if('main' == Route::currentRouteName())
                    <img src="{{ asset('assets') }}/images/main/logo_ua.png" alt="Головний логотип Медправда"
                         title="Головний логотип"
                            {!! image_width_height_return_tags(asset('assets').'/images/main/logo_ua.png') !!}
                    >
                @else
                    <a href="{{ route('main', ['loc'=>'ua']) }}/">

                        {{-- @if('ua' == Request::segment(1))
                                 @else
                                     <a href="{{ route('main') }}">
                                         @endif--}}
                        <img src="{{ asset('assets') }}/images/main/logo_ua.png" alt="Головний логотип Медправда"
                             title="Головний логотип"
                                {!! image_width_height_return_tags(asset('assets').'/images/main/logo_ua.png') !!}
                        ></a>
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
            <div class="main-menu">
                <nav class="mobile-display-none">
                    <div class="lang-menu desktop-display-none">
                        <a href="{{  str_replace('/ua', '', Request::url()) }}/">Рус</a>
                        <span class="active">Укр</span>
                    </div>
                    <div>
                        @if('search_alpha_u' == Route::currentRouteName())
                            <div class="primary-menu"><a>Довідник ліків</a></div>
                        @else
                            <div class="primary-menu"><a href="{{ route('search_alpha_u') }}/">Довідник ліків</a></div>
                        @endif
                        <div class="sub-menu">
                            <ul>
                                <li class="mobile-display-none"><a href="{{ route('search_alpha_u') }}">За Алфавітом</a>
                                </li>
                                <li class="mobile-display-none"><a href="{{ route('search_substance_u') }}">За діючою речовиною</a></li>
                                <li class="mobile-display-none"><a href="{{ route('search_mnn_u') }}">За міжнародною назвою(МНН)</a></li>
                                <li class="mobile-display-none"><a href="{{ route('search_atx_u') }}">За АТХ-класифікацією</a></li>
                                <li class="mobile-display-none"><a href="{{ route('search_farm_u') }}">За фармакотерапевтичною
                                        групою</a></li>
                                <li class="mobile-display-none"><a class="sub-menu-border-another" href="{{ route('search_fabricator_u') }}/">За виробником</a></li>
                                </li>
                                {{------------}}
                                @if('get_bads_ua' == Route::currentRouteName())
                                    <li>
                                        <a class="active-menu">Дієтичні добавки</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('get_bads_ua')}}/">Дієтичні добавки</a>
                                    </li>
                                @endif
                                {{------------}}
                                @if('get_cosmetics_ua' == Route::currentRouteName())
                                    <li>
                                        <a class="active-menu">Косметичні засоби</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('get_cosmetics_ua')}}/">Косметичні засоби</a>
                                    </li>
                                @endif
                                {{------------}}
                                @if('get_wares_ua' == Route::currentRouteName())
                                    <li>
                                        <a class="active-menu">Вироби медичного призначення</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('get_wares_ua')}}/">Вироби медичного призначення</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="primary-menu"><a href="{{ route('ua_diseases.symptoms.list', 'bolezni') }}">Хвороби та симптоми</a></div>
                        <div class="sub-menu">
                            @if(!isset($problematic_asUl))
                                <?php $problematic_asUl = Fresh\Medpravda\Uaproblematic::where('alias', 'problematics')->first()->get_ru2()->get_child_pages();?>
                            @endif
                            @if(count($problematic_asUl))
                                <ul>
                                    @foreach($problematic_asUl as $one_problematic_asUl)
                                        @if($one_problematic_asUl->children->get_ua()->approved)
                                            @if('ua_diseases.symptoms.list' == Route::currentRouteName() && Route::getCurrentRoute()->parameters('alias')['alias'] == $one_problematic_asUl->children->get_ua()->alias)
                                                <li class="active">
                                                    <a class="active-menu">{{$one_problematic_asUl->children->get_ua()->title}}</a>
                                                </li>
                                            @else
                                                <li class="active">
                                                    <a href="{{route('ua_diseases.symptoms.list', $one_problematic_asUl->children->get_ua()->alias)}}">{{$one_problematic_asUl->children->get_ua()->title}}</a>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div>
                        <?php
                        $menus = Fresh\Medpravda\Menu::where('own', 'ua')->get();
                        ?>
                        @if('ua_articles' == Route::currentRouteName())
                            <div class="primary-menu"><a>Статті</a></div>
                        @else
                            <div class="primary-menu"><a href="{{ route('ua_articles') }}/">Статті</a></div>
                        @endif
                        <div class="sub-menu">
                            <ul>
                                @if('longreads_show' == Route::currentRouteName())
                                    <li>
                                        <a class="sub-menu-border-another active-menu" id="menu-tops">Лонгріди</a>
                                    </li>
                                @else
                                    <li>
                                        <a class="sub-menu-border-another" href="{{route('longreads_show_ua')}}" id="menu-tops">Лонгріди</a>
                                    </li>
                                @endif
                                {{------------}}
                                @if('ua_top_articles' == Route::currentRouteName())
                                    <li>
                                        <a class="sub-menu-border-another active-menu" id="menu-tops">Топ статті</a>
                                    </li>
                                @else
                                    <li>
                                        <a class="sub-menu-border-another" href="{{ route('ua_top_articles') }}/" id="menu-tops">Топ статті</a>
                                    </li>
                                @endif
                                {{------------}}
                                @if('ua_articles_cat' == Route::currentRouteName() && Route::getCurrentRoute()->parameters('cat_alias')['cat_alias'] == 'zabluzhdeniya')
                                    <li>
                                        <a class="active-menu">Хибні
                                            уявлення</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('ua_articles_cat', ['cat_alias'=> 'zabluzhdeniya'])}}/">Хибні
                                            уявлення</a>
                                    </li>
                                @endif
                                {{------------}}
                                @if('ua_articles_cat' == Route::currentRouteName() && Route::getCurrentRoute()->parameters('cat_alias')['cat_alias'] == 'pitanie-i-dieta')
                                    <li>
                                        <a class="active-menu">Харчування та дієта</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('ua_articles_cat', ['cat_alias'=> 'pitanie-i-dieta'])}}/">Харчування та дієта</a>
                                    </li>
                                @endif
                                {{------------}}
                                @if('ua_articles_cat' == Route::currentRouteName() && Route::getCurrentRoute()->parameters('cat_alias')['cat_alias'] == 'intimnye-temy')
                                    <li>
                                        <a class="active-menu">Інтимні теми</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('ua_articles_cat', ['cat_alias'=> 'intimnye-temy'])}}/">Інтимні теми</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div>
                        @if('ua_articles_cat' == Route::currentRouteName() && Route::getCurrentRoute()->parameters('cat_alias')['cat_alias'] == 'moy-malysh')
                            <div class="primary-menu baby-button"><a>Мій малюк</a></div>
                        @else
                            <div class="primary-menu baby-button"><a href="{{route('ua_articles_cat', ['cat_alias'=> 'moy-malysh'])}}/">Мій малюк</a>
                            </div>
                        @endif

                        {{------------}}
                        @if('ua_themes' == Route::currentRouteName())
                            <a class="primary-menu desktop-none active-menu">ПОПУЛЯРНІ ТЕМИ</a>
                        @else
                            <a class="primary-menu desktop-none" href="{{route('ua_themes')}}/">ПОПУЛЯРНІ ТЕМИ</a>
                        @endif

                        @if('ua_adv' == Route::currentRouteName())
                            <div class="primary-menu desktop-none active-menu"><a>Реклама на сайті</a></div>
                        @else
                            <div class="primary-menu desktop-none"><a href="{{ route('ua_adv') }}/">Реклама на сайті</a>
                            </div>
                        @endif

                        @if('ua_cooperation' == Route::currentRouteName())
                            <a class="primary-menu desktop-none active-menu">СПІВРОБІТНИЦТВО</a>
                        @else
                            <a class="primary-menu desktop-none"
                               href="{{ route('ua_cooperation') }}/">СПІВРОБІТНИЦТВО</a>
                        @endif

                        @if('ua_about' == Route::currentRouteName())
                            <a class="primary-menu desktop-none active-menu">ПРО НАС</a>
                        @else
                            <a class="primary-menu desktop-none" href="{{ route('ua_about') }}/">ПРО НАС</a>
                        @endif
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