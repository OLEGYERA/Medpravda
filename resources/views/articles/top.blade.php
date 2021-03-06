<section class="content page-articles m-top"> 
    <div class="wrap blue-circle">
        {{--BreadCrumbs--}}
        <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
             itemtype="http://schema.org/BreadcrumbList">
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <a href="{{ route('main') }}/" itemprop="item">
                    <span itemprop="name" class="label1">Главная</span>
                </a>
                <meta itemprop="position" content="1"/>
            </div>
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <span itemprop="name" class="label1">{{ $cat->title ?? ($tag->name ?? '') }}</span>
                <meta itemprop="position" content="2"/>
                <meta itemprop="item" content="{{url()->current(). '/'}}">
            </div>
        </div>
        {{--BreadCrumbs--}}
        <h1>{{ $cat->title ?? ($tag->name ?? '') }}</h1>
    </div>
    @if(!empty($prems))
        <div class="big-news margin-minus all-big-news">
            <article class="news">
                <a href="{{ route('articles', ['article_alias'=>$prems[0]->alias]) }}/">
                    <div class="article-img">
                        @if(!empty($prems[0]->image->path))
                            <img src="{{ asset('asset').'/images/articles/ru/main/'.$prems[0]->image->path }}"
                                 alt="{{ empty($prems[0]->image->alt) ? 'Статьи Медправды' : $prems[0]->image->alt }}"
                                 {{--alt=" fresh articles  cat test alt"--}}
                                 title="{{ $prems[0]->image->title }}"
                            {!! image_width_height_return_tags(asset('asset').'/images/articles/ru/main/'.$prems[0]->image->path) !!}
                            >
                        @else
                            <img src="{{ asset('asset')}}/images/articles/mp.png"
                                 alt="MedPravda" title="MedPravda" width="270" height="270">
                        @endif
                        <div class="views"><span>{{ $prems[0]->view }}</span></div>
                    </div>
                    <div class="article-info">
                        <div class="article-title">{{ $prems[0]->title }}</div>
                        <p class="article-category">Статистика минздрава</p>
                        <div class="article-text">{!! str_limit(strip_tags($prems[0]->content), 312) !!}</div>
                        <div class="date-link">
                            <div class="article-date">
                                {{ $prems[0]->created_at->format('d')
                                        . ' '  . trans('ru.'.$prems[0]->created_at->format('m'))
                                        . ' '  . $prems[0]->created_at->format('Y')
                                }}
                            </div>
                            <span class="btn-link">
                                Подробнее
                            </span>
                        </div>
                    </div>
                </a>
            </article>
        </div>
    @endif
    @if(!empty($articles))
        <div class="two-column-articles article-wrap section-interest-art">
            <div class="two-big-news">
                @if($prems)
                    @foreach($prems as $prem)
                        @continue($loop->first)
                        <article class="news">
                            <a href="{{ route('articles', ['article_alias'=>$prem->alias]) }}/">
                                <div class="article-img">
                                    @if(!empty($prem->image->path))
                                        <img src="{{ asset('asset').'/images/articles/ru/middle/'.$prem->image->path }}"
                                             alt="{{ $prem->image->alt }}" title="{{ $prem->image->title }}"
                                            {!! image_width_height_return_tags(asset('asset').'/images/articles/ru/middle/'.$prem->image->path) !!}
                                        >
                                    @else
                                        <img src="{{ asset('asset')}}/images/articles/mp.png"
                                             alt="MedPravda" title="MedPravda" width="270" height="270">
                                    @endif
                                    <div class="views"><span>{{ $prem->view }}</span></div>
                                </div>

                                <div class="article-info">
                                    <div class="article-title">{{ $prem->title }}</div>
                                    <p class="article-category">Статистика минздрава</p>
                                    <div class="article-text">{!! str_limit(strip_tags($prem->content), 156) !!}</div>
                                    <div class="date-link">
                                        <div class="article-date">
                                            {{ $prem->created_at->format('d')
                                                    . ' '  . trans('ru.'.$prem->created_at->format('m'))
                                                    . ' '  . $prem->created_at->format('Y')
                                            }}
                                        </div>
                                        <span class="btn-link">
                                    Подробнее
                                </span>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                @endif
                @if(!empty($articles))
                    @foreach($articles as $article)
                        <article class="news">
                            <a href="{{ route('articles', ['article_alias'=>$article->alias]) }}/">
                                <div class="article-img">
                                    @if(!empty($article->image->path))
                                        <img src="{{ asset('asset').'/images/articles/ru/middle/'.$article->image->path }}"
                                             alt="{{ $article->image->alt }}" title="{{ $article->image->title }}"
                                            {!! image_width_height_return_tags(asset('asset').'/images/articles/ru/middle/'.$article->image->path) !!}
                                        >
                                    @else
                                        <img src="{{ asset('asset')}}/images/articles/mp.png"
                                             alt="MedPravda" title="MedPravda" width="270" height="270">
                                    @endif
                                    <div class="views"><span>{{ $article->view }}</span></div>
                                </div>

                                <div class="article-info">
                                    <div class="article-title">{{ $article->title }}</div>
                                    <p class="article-category">Статистика минздрава</p>
                                    <div class="article-text">{!! str_limit(strip_tags($article->content), 156) !!}</div>
                                    <div class="date-link">
                                        <div class="article-date">
                                            {{ $article->created_at->format('d')
                                                    . ' '  . trans('ru.'.$article->created_at->format('m'))
                                                    . ' '  . $article->created_at->format('Y')
                                            }}
                                        </div>
                                        <span class="btn-link">
                                    Подробнее
                                </span>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                @endif
            </div>
        </div>
    @endif
    @if(is_object($articles) && !empty($articles->lastPage()) && $articles->lastPage() > 1)
        <div class="articles-pagination">
            @if($articles->lastPage() > 1)
                @if($articles->currentPage() !== 1)
                    <a rel="prev" href="{{ $articles->url(($articles->currentPage() - 1)) }}" class="back">Назад</a>
                @endif
                @if($articles->currentPage() >= 3)
                    <a href="{{ $articles->url($articles->url(1)) }}/" class="pagin-number">1</a>
                @endif
                @if($articles->currentPage() >= 4)
                    <a>&nbsp;&nbsp;&nbsp;.&nbsp;.&nbsp;.&nbsp;&nbsp;&nbsp;</a>
                @endif
                @if($articles->currentPage() !== 1)
                    <a href="{{ $articles->url($articles->currentPage()-1) }}/"
                       class="pagin-number">{{ $articles->currentPage()-1 }}</a>
                @endif
                <a class="active-pagin-number pagin-number">{{ $articles->currentPage() }}</a>
                @if($articles->currentPage() !== $articles->lastPage())
                    <a href="{{ $articles->url($articles->currentPage()+1) }}/"
                       class="pagin-number">{{ $articles->currentPage()+1 }}</a>
                @endif
                @if($articles->currentPage() <= ($articles->lastPage()-3))
                    <a>&nbsp;&nbsp;&nbsp;.&nbsp;.&nbsp;.&nbsp;&nbsp;&nbsp;</a>
                @endif
                @if($articles->currentPage() <= ($articles->lastPage()-2))
                    <a href="{{ $articles->url($articles->lastPage()) }}/"
                       class="pagin-number">{{ $articles->lastPage() }}</a>
                @endif
                @if($articles->currentPage() !== $articles->lastPage())
                    <a rel="next" href="{{ $articles->url(($articles->currentPage() + 1)) }}" class="forward">
                        Вперед
                    </a>
                @endif

            @endif
        </div>
    @endif
</section> 