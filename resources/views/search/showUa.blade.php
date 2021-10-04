<section class="content m-top">
    <div class="wrap">
        {{--BreadCrumbs--}}
        <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
             itemtype="http://schema.org/BreadcrumbList">
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <a href="{{ route('main') }}/" itemprop="item">Головна</a>
                <meta itemprop="position" content="1"/>
            </div>
            @if(!empty($search))
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <span itemprop="name" class="label1">Пошук по запиту "{{ $search }}"</span>
                    <meta itemprop="position" content="2"/>
                    <meta itemprop="item" content="{{url()->current() . '/'}}">
                </div>
            @else
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <span itemprop="name" class="label1">Пошук</span>
                    <meta itemprop="position" content="2"/>
                    <meta itemprop="item" content="{{url()->current() . '/'}}">
                </div>
            @endif
        </div>
        {{--BreadCrumbs--}}
        <h1>Результати пошуку за запитом:&nbsp;<a href="#!">{{ $search ?? '' }}</a></h1>
    </div>

    <div class="section-title-meta-icon serch-height">
        @if(!empty($result['medicines']))
            <h3>Пошук препаратів:<a href="#!">{{ $search .' ('.($search_count ?? 0).')'}}</a></h3>
        @else
            <h3>Пошук препаратів:</h3>
        @endif
        <div class="section-meta-icon">
            <div class="section-icon">
                <img src="{{ asset('assets') }}/images/title-icons/found.png" alt="иконка Также ищут"
                        {!! image_width_height_return_tags(asset('assets').'/images/title-icons/found.png') !!}
                >
            </div>
        </div>

    </div>
    <div class="wrap">
        @if(!empty($result['medicines']) || !empty($result['substances']) || !empty($result['pharma']) || !empty($result['innnames']) || !empty($result['fabricators']) || !empty($result['bads']))
            @if(!empty($result['medicines']))
                <div class="lang-row">
                    <div class="lang-box"><span class="ru-f"></span>Російська версія</div>
                    <div class="lang-box"><span class="ua-f"></span>Українська версія</div>
                </div>
                <h3>Препарати</h3>
                @foreach($result['medicines'] as $title)
                    <div class="search-result">
                        <div class="result-item">
                            <a href="{{ route('medicine', $title->alias) }}/">
                                <h3>{{ $title->title }}</h3>
                            </a>
                            <a href="{{ route('medicine_ua', $title->alias) }}/">
                                <h3>{{ $title->utitle }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            @if(!empty($result['substances']))
                <h3>Діючі речовини</h3>
                @foreach($result['substances'] as $title)
                    <div class="search-result">
                        <div class="result-item">
                            <a href="{{ route('search_substance', $title->alias) }}/">
                                <h3>{{ $title->title }}</h3>
                            </a>
                            <a href="{{ route('search_substance_u', $title->alias) }}/">
                                <h3>{{ $title->utitle }}</h3>
                            </a>
                        </div>    
                    </div>
                @endforeach
            @endif

            @if(!empty($result['innnames']))
                <h3>Міжнародні назви</h3>
                @foreach($result['innnames'] as $title)
                    <div class="search-result">
                        <div class="result-item">
                            <a href="{{ route('search_mnn_u',  ['val'=>$title->alias]) }}/">
                                <h3>{{ $title->title }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            @if(!empty($result['pharma']))
                <h3>Фармакотерапевтичні групи</h3>
                @foreach($result['pharma'] as $title)
                    <div class="search-result">
                        <div class="result-item">
                            <a href="{{ route('search_farm', $title->alias) }}/">
                                <h3>{{ $title->title }}</h3>
                            </a>
                            <a href="{{ route('search_farm_u', $title->alias) }}/">
                                <h3>{{ $title->utitle }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            
            @if(!empty($result['fabricators']))
                <h3>Виробники</h3>
                @foreach($result['fabricators'] as $title)
                    <div class="search-result">
                        <div class="result-item">
                            <a href="{{ route('search_fabricator', ['val'=>'result', 'fabricator'=>$title->alias]) }}/">
                                <h3>{{ $title->title }}</h3>
                            </a>
                            <a href="{{ route('search_fabricator_u', ['val'=>'result', 'fabricator'=>$title->alias]) }}/">
                                <h3>{{ $title->utitle }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif

            @if(!empty($result['bads']))
                <h3>Дієтичні добавки</h3>
                @foreach($result['bads'] as $title)
                    <div class="search-result">
                        <div class="result-item">
                            <a href="{{ route('bad_get_adapted', ['bad_slug'=>$bad_item['ru']->slug]) }}/">
                                <h3>{{ $bad_item['ru']->title }}</h3>
                            </a>
                            <a href="{{ route('bad_get_adapted_ua', ['bad_slug'=>$bad_item['ua']->slug]) }}/">
                                <h3>{{ $bad_item['ua']->title }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        @else
            <div>
                Введіть в рядок пошуку назву ліків (АТХ-код, МНН, назва виробника, діюча речовина).
                Після вибору конкретного препарату Ви знайдете:

                інструкцію;
                ціни в аптеках міста;
                варіанти доставки з аптек;
                аналоги.
            </div>
        @endif
    </div>
    



    @if(!empty($articles))
        <section>
            <div class="section-title-meta-icon serch-height">
                <h3>Поиск статей:<a href="#!">{{ $search }} </a></h3>
                <div class="section-meta-icon">
                    <div class="section-icon">
                        <img src="{{ asset('assets') }}/images/title-icons/main-icon-7.png"
                             alt="иконка Коммерчиские статьи"
                                {!! image_width_height_return_tags(asset('assets').'/images/title-icons/main-icon-7.png') !!}
                        >
                    </div>
                </div>
            </div>
            <div class="last-arts">
                <div class="two-column-articles article-wrap section-interest-art">
                    <div class="two-big-news">
                        @if(!empty($articles) && $articles->isNotEmpty())
                            <article class="news">
                                <a href="{{ route('articles',
                                                    ['article_alias'=>$articles[0]->alias]) }}/">
                                    <div class="article-img">
                                        <img src="{{ asset('asset/images/articles/ru/middle').'/'.$articles[0]->image->path }}"
                                             alt="{{ $articles[0]->image->alt ?? '' }}"
                                             title="{{ $articles[0]->image->title ?? ($articles[0]->image->alt ?? '') }}"
                                        {!! image_width_height_return_tags(asset('asset/images/articles/ru/middle').'/'.$articles[0]->image->path) !!}
                                        >
                                        <div class="views"><span>{{ $articles[0]->view }}</span></div>
                                    </div>
                                    <div class="article-info">
                                        <div class="article-title">{{ $articles[0]->title }}</div>
                                        <div class="article-text">
                                            {!! str_limit($articles[0]->content, 160) !!}
                                        </div>
                                        <div class="date-link">
                                            <div class="article-date">
                                                {{ $articles[0]->created_at->format('d')
                                                    . ' '  . trans('ru.'.$articles[0]->created_at->format('m'))
                                                    . ' '  . $articles[0]->created_at->format('Y')
                                                }}
                                            </div>
                                            <span class="btn-link">Подробнее</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="article-border"></div>
                            </article>
                            @if(!empty($titles['articles'][1]))
                                <article class="news">
                                    <a href="{{ route('articles',
                                                    ['article_alias'=>$titles['articles'][1]->alias]) }}/">
                                        <div class="article-img">
                                            <img src="{{ asset('asset/images/articles/ru/middle').'/'.$titles['articles'][1]->image->path }}"
                                                 alt="{{ $titles['articles'][1]->image->alt ?? '' }}"
                                                 title="{{ $titles['articles'][1]->image->title ?? ($titles['articles'][1]->image->alt ?? '') }}"
                                            {!! image_width_height_return_tags(asset('asset/images/articles/ru/middle').'/'.$titles['articles'][1]->image->path) !!}
                                            >
                                            <div class="views"><span>{{ $titles['articles'][1]->view }}</span></div>
                                        </div>
                                        <div class="article-info">
                                            <div class="article-title">{{ $titles['articles'][1]->title }}</div>
                                            <div class="article-text">
                                                {!! str_limit($titles['articles'][1]->content, 160) !!}
                                            </div>
                                            <div class="date-link">
                                                <div class="article-date">
                                                    {{ $titles['articles'][1]->created_at->format('d')
                                                        . ' '  . trans('ru.'.$titles['articles'][1]->created_at->format('m'))
                                                        . ' '  . $titles['articles'][1]->created_at->format('Y')
                                                    }}
                                                </div>
                                                <span class="btn-link">Подробнее</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="article-border"></div>
                                </article>
                            @endif
                        @endif
                    </div>
                    <div>
                        <div class="small-news">
                            @if(!empty($titles['articles']) && $titles['articles']->isNotEmpty())
                                @foreach($titles['articles'] as $article)
                                    @continue($loop->first)
                                    @continue(1 == $loop->index)
                                    <article class="news">
                                        <a href="{{ route('articles',
                                                    ['article_alias'=>$article->alias]) }}/">
                                            <div class="article-img">
                                                <img src="{{ asset('asset/images/articles/ru/small').'/'.$article->image->path }}"
                                                {!! image_width_height_return_tags(asset('asset/images/articles/ru/small').'/'.$article->image->path) !!}
                                                >
                                                <div class="views"><span>{{ $article->view }}</span></div>
                                            </div>
                                            <div class="article-info">
                                                <div class="article-title">{{ $article->title }}</div>
                                                <div class="date-link">
                                                    <div class="article-date">
                                                        {{ $article->created_at->format('d')
                                                            . ' '  . trans('ru.'.$article->created_at->format('m'))
                                                            . ' '  . $article->created_at->format('Y')
                                                        }}
                                                    </div>
                                                    <span class="btn-link">Подробнее</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="article-border"></div>
                                    </article>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                </div>
            <div>
                <a href="#!" class="button-white">Більше статей</a>
            </div>
        </section>
    @endif
</section>