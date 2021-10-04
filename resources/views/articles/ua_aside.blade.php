<aside class="right-section m-top">
    <div class="">
        <div data-banner="1" class="banner-reklama order-first banner-1" id="banner1-main">
            @include('layouts.banners.bn1')
        </div>
        <div class="section-title-meta-icon border-top-none">
            @if(!empty($articles[0]) && (5 != $articles[0]->category_id))
                <h3>Інші статті</h3>
            @else
                <h3>Топ статті</h3>
            @endif
            <div class="section-meta-icon">
                <div class="section-icon">
                    <img src="{{ asset('assets') }}/images/title-icons/main-icon-4.png"
                         alt="иконка Новости медицины" title="иконка Новости медицины" width="25" height="25">
                </div>
            </div>
        </div>
        <div class="news-med-arts">
            <div class="article-wrap big-news">
                @if(!empty($articles) && $articles->isNotEmpty())
                    @foreach($articles as $article)
                        @continue($loop->index>3)
                        <article class="news">
                            <a href="{{ route('ua_articles', ['ua_article_alias'=>$article->alias]) }}/">
                                <div class="article-img">
                                    <img src="{{ asset('asset').'/images/articles/ua/middle/'.$article->image->path }}"
                                         alt="{{ $article->image->alt }}" title="{{ $article->image->title }}"
                                            {!! image_width_height_return_tags(asset('asset').'/images/articles/ua/middle/'.$article->image->path) !!}
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
                                                . ' '  . trans('ua.'.$article->created_at->format('m'))
                                                . ' '  . $article->created_at->format('Y')
                                        }}
                                        </div>
                                        <span class="btn-link">Докладніше</span>
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
                    <a href="{{ route('ua_articles') }}/" class="button-white">Всі новини</a>
                @else
                    <a href="{{ route('ua_top_articles') }}/" class="button-white">Всі новини</a>
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
                <h3>Інші статті</h3>
            @else
                <h3>Топ статті</h3>
            @endif
            <div class="section-meta-icon">
                <div class="section-icon">
                    <img src="{{ asset('assets') }}/images/title-icons/main-icon-2.png"
                         alt="иконка Топ статьи" title="иконка Топ статьи" width="25" height="25">
                </div>
            </div>
        </div>
        <div class="news-med-arts">
            <div class="article-wrap big-news">
                @if(!empty($articles) && $articles->isNotEmpty())
                    @foreach($articles as $article)
                        @continue($loop->index<4)
                        <article class="news">
                            <a href="{{ route('ua_articles', ['ua_article_alias'=>$article->alias]) }}/">
                                <div class="article-img">
                                    <img src="{{ asset('asset').'/images/articles/ua/middle/'.$article->image->path }}"
                                         alt="{{ $article->image->alt }}" title="{{ $article->image->title }}"
                                            {!! image_width_height_return_tags(asset('asset').'/images/articles/ua/middle/'.$article->image->path) !!}
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
                                                . ' '  . trans('ua.'.$article->created_at->format('m'))
                                                . ' '  . $article->created_at->format('Y')
                                        }}
                                        </div>
                                        <span class="btn-link">Докладніше</span>
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
                    <a href="{{ route('ua_articles') }}/" class="button-white">Всі новини</a>
                @else
                    <a href="{{ route('ua_top_articles') }}/" class="button-white">Всі новини</a>
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
                <h3>Популярні теми</h3>
                <div class="section-meta-icon">
                    <div class="section-icon">
                        <img src="{{ asset('assets') }}/images/title-icons/main-icon-6.png"
                             alt="иконка Популярные теги" title="иконка Популярные теги" width="25" height="25">
                    </div>
                </div>
            </div>
            <div class="popular-meta">
                @foreach($tags as $tag)
                    <a href="{{ route('ua_articles_tag', ['tag_alias'=>$tag->alias]) }}/"
                       class="btn-meta">
                        {{ $tag->uname }}
                    </a>
                @endforeach
            </div>
        </div>
    @endif
    <div class="banner-reklama order-fourth banner-4">
        <div>
            @include('layouts.banners.bn4')
        </div>
    </div>

</aside>