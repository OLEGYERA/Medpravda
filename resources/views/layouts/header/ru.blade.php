<!-- HEADER -->
<div class="fixed-wrap">
    <header id="myHeader">
        <div class="wrap">
            <div class="logo">
                @if('main' == Route::currentRouteName())
                    <img src="{{ asset('assets') }}/images/main/logo_ru.png" alt="Главный логотип Медправда"
                         title="Главный логотип"
                            {!! image_width_height_return_tags(asset('assets').'/images/main/logo_ru.png') !!}
                    >
                @else
                    <a href="{{ route('main') }}/">
                        <img src="{{ asset('assets') }}/images/main/logo_ru.png" alt="Главный логотип Медправда"
                             title="Главный логотип" id="menu-main"
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
                    <div class="lang-menu desktop-display-none">
                        <span class="active">Рус</span>
                        <a href="{{ str_replace(env('APP_URL'), env('APP_URL').'/ua', Request::url()) }}/">Укр</a>
                    </div>
                    <div>
                        @if('search_alpha' == Route::currentRouteName())
                            <div class="primary-menu"><a>Справочник лекарств</a></div>
                        @else
                            <div class="primary-menu"><a href="{{ route('search_alpha') }}/"
                                                         id="menu-drugs">Справочник лекарств</a></div>
                        @endif
                        <div class="sub-menu">
                            <ul>
                                <li class="mobile-display-none"><a href="{{ route('search_alpha') }}/">По алфавиту</a></li>
                                <li class="mobile-display-none"><a href="{{ route('search_substance') }}/">По действующему веществу</a></li>
                                <li class="mobile-display-none"><a href="{{ route('search_mnn') }}/">По международному названию (МНН)</a>
                                </li>
                                <li class="mobile-display-none"><a href="{{ route('search_atx') }}/">По АТХ-классификации</a></li>
                                <li class="mobile-display-none"><a href="{{ route('search_farm') }}/">По фармакотерапевтической
                                        группе</a></li>
                                <li class="mobile-display-none"><a class="sub-menu-border-another" href="{{ route('search_fabricator') }}/">По производителю</a></li>
                                {{------------}}
                                @if('get_bads' == Route::currentRouteName())
                                    <li>
                                        <a class="active-menu">Диетические добавки</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('get_bads')}}/">Диетические добавки</a>
                                    </li>
                                @endif
                                {{------------}}
                                @if('get_cosmetics' == Route::currentRouteName())
                                    <li>
                                        <a class="active-menu">Косметические средства</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('get_cosmetics')}}/">Косметические средства</a>
                                    </li>
                                @endif
                                {{------------}}
                                @if('get_wares' == Route::currentRouteName())
                                    <li>
                                        <a class="active-menu">Изделия медицинского назначения</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('get_wares')}}/">Изделия медицинского назначения</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="primary-menu"><a href="{{ route('diseases.symptoms.list', 'bolezni') }}">Болезни и симптомы</a></div>
                        <div class="sub-menu">
                            @if(!isset($problematic_asUl))
                                <?php $problematic_asUl = Olegyera\Problematic::where('alias', 'problematics')->first()->get_child_pages();?>
                            @endif
                            @if(count($problematic_asUl))
                                <ul>
                                    @foreach($problematic_asUl as $one_problematic_asUl)
                                        @if($one_problematic_asUl->children->approved)
                                            {{------------}}
                                            @if('diseases.symptoms.list' == Route::currentRouteName() && Route::getCurrentRoute()->parameters('alias')['alias'] == $one_problematic_asUl->children->alias)
                                                <li class="active">
                                                    <a class="active-menu">{{$one_problematic_asUl->children->title}}</a>
                                                </li>
                                            @else
                                                <li class="active">
                                                    <a href="{{route('diseases.symptoms.list', $one_problematic_asUl->children->alias)}}">{{$one_problematic_asUl->children->title}}</a>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>

                            @endif
                            {{--{{dd($problematic_asUl)}}--}}
                        </div>
                    </div>
                    <div>
                        @if('articles' == Route::currentRouteName())
                            <div class="primary-menu"><a>Статьи</a></div>
                        @else
                            <div class="primary-menu"><a href="{{ route('articles') }}/" id="menu-articles">Статьи</a></div>
                        @endif
                        <div class="sub-menu">
                            <ul>
                                {{------------}}
                                @if('longreads_show' == Route::currentRouteName())
                                    <li>
                                        <a class="sub-menu-border-another active-menu" id="menu-tops">Лонгриды</a>
                                    </li>
                                @else
                                    <li>
                                        <a class="sub-menu-border-another" href="{{route('longreads_show')}}" id="menu-tops">Лонгриды</a>
                                    </li>
                                @endif
                                @if('top_articles' == Route::currentRouteName())
                                    <li>
                                        <a class="sub-menu-border-another active-menu" id="menu-tops">Топ статьи</a>
                                    </li>
                                @else
                                    <li>
                                        <a class="sub-menu-border-another" href="{{ route('top_articles') }}/" id="menu-tops">Топ
                                            статьи</a>
                                    </li>
                                @endif
                                {{------------}}
                                @if('articles_cat' == Route::currentRouteName() && Route::getCurrentRoute()->parameters('cat_alias')['cat_alias'] == 'zabluzhdeniya')
                                    <li>
                                        <a class="active-menu">Заблуждения</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('articles_cat', ['cat_alias'=> 'zabluzhdeniya'])}}/">Заблуждения</a>
                                    </li>
                                @endif
                                {{------------}}
                                @if('articles_cat' == Route::currentRouteName() && Route::getCurrentRoute()->parameters('cat_alias')['cat_alias'] == 'pitanie-i-dieta')
                                    <li>
                                        <a class="active-menu">Питание и диета</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('articles_cat', ['cat_alias'=> 'pitanie-i-dieta'])}}/">Питание и диета</a>
                                    </li>
                                @endif
                                {{------------}}
                                @if('articles_cat' == Route::currentRouteName() && Route::getCurrentRoute()->parameters('cat_alias')['cat_alias'] == 'intimnye-temy')
                                    <li>
                                        <a class="active-menu">Интимные темы</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('articles_cat', ['cat_alias'=> 'intimnye-temy'])}}/">Интимные темы</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div>
                        @if('articles_cat' == Route::currentRouteName() && Route::getCurrentRoute()->parameters('cat_alias')['cat_alias'] == 'moy-malysh')
                            <div class="primary-menu baby-button"><a>Мой малыш</a></div>
                        @else
                            <div class="primary-menu baby-button"><a href="{{route('articles_cat', ['cat_alias'=> 'moy-malysh'])}}/">Мой малыш</a>
                            </div>
                        @endif
                        {{------------}}
                        @if('themes' == Route::currentRouteName())
                            <a class="primary-menu desktop-none active-menu">ПОПУЛЯРНЫЕ ТЕМЫ</a>
                        @else
                            <a class="primary-menu desktop-none" href="{{route('themes')}}/">ПОПУЛЯРНЫЕ ТЕМЫ</a>
                        @endif


                        @if('adv' == Route::currentRouteName())
                            <div class="primary-menu desktop-none"><a>Реклама на сайте</a></div>
                        @else
                            <div class="primary-menu desktop-none"><a href="{{ route('adv') }}/">Реклама на сайте</a>
                            </div>
                        @endif

                        @if('cooperation' == Route::currentRouteName())
                            <a class="primary-menu desktop-none active-menu">СОТРУДНИЧЕСТВО</a>
                        @else
                            <a class="primary-menu desktop-none" href="{{ route('cooperation') }}/">СОТРУДНИЧЕСТВО</a>
                        @endif
                        @if('about' == Route::currentRouteName())
                            <a class="primary-menu desktop-none active-menu">О НАС</a>
                        @else
                            <a class="primary-menu desktop-none" href="{{ route('about') }}/">О НАС</a>
                        @endif
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