<aside class="right-section m-top">
    <div class="">
        <div data-banner="1" class="banner-reklama order-first banner-1" id="banner1-main">
            @include('layouts.banners.bn1')
        </div>
        <div class="section-title-meta-icon border-top-none">
            @if(!empty($articles[0]) && (5 != $articles[0]->category_id))
                <h3>Другие статьи</h3>
            @else
                <h3>Топ статьи</h3>
            @endif
            <div class="section-meta-icon">
                <div class="section-icon">
                    <img src="{{ asset('assets') }}/images/title-icons/main-icon-4.png"
                         alt="иконка Новости медицины | статьи Медправды " title="иконка Новости медицины" width="25"
                         height="25">
                </div>
            </div>
        </div>
        <div class="news-med-arts">
            <div class="article-wrap big-news">
                @if(!empty($articles) && $articles->isNotEmpty())
                    @foreach($articles as $article)
                        @continue($loop->index>3)
                        <article class="news">
                            @if(collect(request()->segments())->last() == $article->alias)
                                <a></a>
                            @else
                                <a href="{{ route('articles', ['article_alias'=>$article->alias]) }}/">
                            @endif
                                    @if(!empty($article->image->path))
                                        <div class="article-img">
                                            <img src="{{ asset('asset').'/images/articles/ru/middle/'.$article->image->path }}"
                                                 alt="{{ !empty($article->image->alt) ? $article->image->alt : $article->title.' '.$loop->iteration.' 2' }}"
                                                 title="{{ !empty($article->image->title) ? $article->image->title : $article->title}}"
                                                    {!! image_width_height_return_tags(asset('asset').'/images/articles/ru/middle/'.$article->image->path) !!}
                                            >
                                            <div class="views"><span>{{ $article->view }}</span></div>
                                        </div>
                                    @endif

                                    <div class="article-info">
                                        <div class="article-title">{{ $article->title }}</div>
                                        <p class="article-category">{{ str_limit($article->description, 24) }}</p>
                                        <div class="article-text">{{ $article->description }}</div>
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
            <div>
                @if(!empty($articles[0]) && (5 != $articles[0]->category_id))
                    <a href="{{ route('articles') }}/" class="button-white">Все новости</a>
                @else
                    <a href="{{ route('top_articles') }}/" class="button-white">Все новости</a>
                @endif
            </div>
        </div>
    </div>

    <div class="order-third">
        <div data-banner="2" class="banner-reklama order-fourth banner-2">
            @include('layouts.banners.bn2')
        </div>
        <div class="section-title-meta-icon">
            @if(!empty($articles[0]) && (5 != $articles[0]->category_id))
                <h3>Другие статьи</h3>
            @else
                <h3>Топ статьи</h3>
            @endif
            <div class="section-meta-icon">
                <div class="section-icon">
                    <img src="{{ asset('assets') }}/images/title-icons/main-icon-2.png"
                         alt="иконка Топ статьи | Медправда" title="Топ статьи иконка| Медправда" width="25"
                         height="25">
                </div>
            </div>
        </div>
        <div class="news-med-arts">
            <div class="article-wrap big-news">
                @if(!empty($articles) && $articles->isNotEmpty())
                    @foreach($articles as $article)
                        @continue($loop->index<4)
                        <article class="news">
                            @if(collect(request()->segments())->last() == $article->alias)
                                <a></a>
                            @else
                                <a href="{{ route('articles', ['article_alias'=>$article->alias]) }}/">
                                    @endif
                                    <div class="article-img">
                                        <img src="{{ asset('asset').'/images/articles/ru/middle/'.$article->image->path }}"
                                             alt="{{ !empty($article->image->alt) ? $article->image->alt : $article->title.' '.$loop->iteration.' 3' }}"
                                             title="{{ !empty($article->image->title) ? $article->image->title : $article->title }}"
                                                {!! image_width_height_return_tags(asset('asset').'/images/articles/ru/middle/'.$article->image->path) !!}
                                        >
                                        <div class="views"><span>{{ $article->view }}</span></div>
                                    </div>
                                    <div class="article-info">
                                        <div class="article-title">{{ $article->title }}</div>
                                        <p class="article-category">{{ str_limit($article->description, 24) }}</p>
                                        <div class="article-text">{{ $article->description }}</div>
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
            <div>
                @if(!empty($articles[0]) && (5 != $articles[0]->category_id))
                    <a href="{{ route('articles') }}/" class="button-white">Все новости</a>
                @else
                    <a href="{{ route('top_articles') }}/" class="button-white">Все новости</a>
                @endif
            </div>
            <div class="banner-inner-7 banner-3">
                @include('layouts.banners.bn3')
            </div>
        </div>
    </div>
    @if(!empty($tags))
        <div class="">
            <div class="section-title-meta-icon">
                <h3>Популярные темы</h3>
                <div class="section-meta-icon">
                    <div class="section-icon">
                        <img src="{{ asset('assets') }}/images/title-icons/main-icon-6.png"
                             alt="иконка Популярные теги | Медправда" title="иконка Популярные теги" width="25"
                             height="25">
                    </div>
                </div>
            </div>
            <div class="popular-meta">
                @foreach($tags as $tag)
                    <a href="{{ route('articles_tag', ['tag_alias'=>$tag->alias]) }}/"
                       class="btn-meta">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
        </div>
    @endif
    <div class="banner-reklama order-fourth banner-4">
        <div data-banner="3">
            @include('layouts.banners.bn4')
        </div>
    </div>

</aside>