<!-- HEADER -->
<div class="fixed-wrap">
    <header id="myHeader">
        <div class="wrap">
            <div class="logo">
                @if('main' == Route::currentRouteName())
                    <img src="{{ asset('assets') }}/images/main/logo_ru.png" alt="Главный логотип Медправда" title="Главный логотип">
                @else
                    <a href="{{ route('main') }}/">
                        <img src="{{ asset('assets') }}/images/main/logo_ru.png" alt="Главный логотип Медправда" title="Главный логотип"></a>
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
                            <div class="primary-menu"><a>Препараты</a></div>
                        @else
                            <div class="primary-menu"><a href="{{ route('search_alpha') }}/">Препараты</a></div>
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
                        @if('themes' == Route::currentRouteName())
                            <div class="primary-menu"><a>Популярные темы</a></div>
                            <div class="sub-menu">{!! $themes->asUl() !!}</div>
                        @else
                            <div class="primary-menu"><a href="{{ route('themes') }}/">Популярные темы</a></div>
                            <div class="sub-menu">{!! $themes->asUl() !!}</div>
                        @endif
                    </div>
                    <div>
                        @if('top_articles' == Route::currentRouteName())
                            <div class="primary-menu"><a>Топ статьи</a></div>
                        @else
                            <div class="primary-menu"><a href="{{ route('top_articles') }}/">Топ статьи</a></div>
                        @endif
                    </div>
                    <div>
                        @if('articles' == Route::currentRouteName() && null == Request::segment(2))
                            <div class="primary-menu"><a>Свежие статьи</a></div>
                            <div class="sub-menu">{!! $menu->asUl() !!}</div>
                        @else
                            <div class="primary-menu"><a href="{{ route('articles') }}/">Свежие статьи</a></div>
                            <div class="sub-menu">{!! $menu->asUl() !!}</div>
                        @endif
                    </div>
                    <div>
                        @if('adv' == Route::currentRouteName())
                            <div class="primary-menu"><a>Реклама</a></div>
                        @else
                            <div class="primary-menu"><a href="{{ route('adv') }}/">Реклама</a></div>
                        @endif
                    </div>
                    <div class="lang-menu desktop-display-none">
                        <span class="active">Рус</span>
                        <a>Укр</a>
                    </div>
                </nav>
                <a class="burgerBtn">
                    <span></span>
                </a>
            </div>
            <div class="lang-menu mobile-display-none">
                <span class="active">Рус</span>
                <a>Укр</a>
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
                    {{ link_to_route('medicine', $block->first, ['alias' =>$block->first_url], ['class'=>'btn-meta']) }}
                @endif
                @if(!empty($block->second) && !empty($block->second_url))
                    {{ link_to_route('medicine', $block->second, ['alias' =>$block->second_url], ['class'=>'btn-meta']) }}
                @endif
                @if(!empty($block->third) && !empty($block->third_url))
                    {{ link_to_route('medicine', $block->third, ['alias' =>$block->third_url], ['class'=>'btn-meta']) }}
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