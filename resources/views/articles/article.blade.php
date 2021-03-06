@if(!empty($article))
    {{--{{ dump($article) }}--}}
    <section class="content m-top">
        <div class="wrap">
            {{--BreadCrumbs--}}
            <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
                 itemtype="http://schema.org/BreadcrumbList">
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <a href="{{ route('main') }}" itemprop="item">
                        <span class="label1">Главная</span>
                    </a>
                    <meta itemprop="position" content="1"/>
                    <meta itemprop="name" content="Главная">
                </div>
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    @if(5 != $article->category->id)
                        <a href="{{ route('articles_cat', ['cat_alias'=>$article->category->alias]) }}"
                           itemprop="item">
                            <span itemprop="name" class="label1">{{ $article->category->title }}</span>
                        </a>
                    @else
                        <a href="{{ route('top_articles') }}"
                           itemprop="item">
                            <span itemprop="name">{{ $article->category->title }}</span>
                        </a>
                    @endif
                    <meta itemprop="position" content="2"/>
                </div>
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <span itemprop="name" class="label1">{{ $article->title ?? '' }}</span>
                    <meta itemprop="position" content="3"/>
                    <meta itemprop="item" content="{{url()->current() . '/'}}">
                </div>
            </div>
            {{--BreadCrumbs--}}
            <div class="single-article-info blue-circle">
                <h1>{{ $article->title ?? '' }}</h1>
                <div class="date-link">
                    <div class="article-date">
                        {{ $article->created_at->format('d')
                                        . ' '  . trans('ru.'.$article->created_at->format('m'))
                                        . ' '  . $article->created_at->format('Y')
                                }}
                    </div>
                    <div class="views"><span>{{ $article->view ?? '' }}</span></div>
                </div>
                <div class="admin-content">
                    <div class="full-width-image">
                        <img src="{{ asset('asset').'/images/articles/ru/main/'.$article->image->path }}"
                             alt="{{ !empty($article->image->alt) ? $article->image->alt : $article->title ." 1" }}"
                             title="{{ !empty($article->image->title) ? $article->image->title : $article->title }}"
                            {!! image_width_height_return_tags(asset('asset').'/images/articles/ru/main/'.$article->image->path) !!}
                        >
                    </div>
                    {{--Main Content--}}
                    {!! $article->content !!}
                    {{--Main Content--}}
                </div>
            </div>
            <div class="down-meta-share">
                <div class="top-meta">
                    <span class="meta-title">Популярные теги:</span>
{{--                    @php(dd($article))--}}
                    @if(!empty($article->tags) && $article->tags->isNotEmpty())
                        @foreach($article->tags as $tag)
                            <a href="{{ route('articles_tag', ['tag_alias'=>$tag->alias]) }}/"
                               class="btn-meta">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    @endif
                </div>
                <div class="share">
                    <span>Поделиться</span>
                    <a target="_blank" href="http://www.facebook.com/sharer.php?u={{url()->current() . '/'}}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    {{--<a target="_blank" href="https://t.me/medpravda"><i class="fa fa-telegram" aria-hidden="true"></i></a>--}}
                    <a target="_blank" href="https://telegram.me/share/url?url={{url()->current(). '/'}}"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://twitter.com/intent/tweet?text=Актуальные статьи о здоровье и медицине только на https://medpravda.com.ua &url={{url()->current(). '/'}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </div>
        </div>
        <section class="section-last-arts">
            <div class="section-title-meta-icon">
                <h3>Другие статьи</h3>
                <div class="section-meta-icon">
                    <div class="section-icon">
                        <img src="{{ asset('assets') }}/images/title-icons/main-icon-3.png"
                             alt="иконка Последние статьи" width="25" height="25">
                    </div>
                </div>
            </div>
            <div class="last-arts">
                <div class="two-column-articles article-wrap section-interest-art">
                    @if(null != $same[0])
                        <div class="left-column big-news">
                            <article class="news">
                                @if(collect(request()->segments())->last() == $same[0]->alias)
                                    <a>
                                @else
                                    <a href="{{ route('articles', ['article_alias'=>$same[0]->alias]) }}/">
                                @endif
                                    <div class="article-img">
                                        <img src="{{ asset('asset').'/images/articles/ru/middle/'.$same[0]->image->path }}"
                                             alt="{{ !empty($same[0]->image->alt) ? $same[0]->image->alt : $same[0]->title.' 2' }}"
                                             title="{{ !empty($same[0]->image->title) ? $same[0]->image->title : $same[0]->title }}"
                                        {!! image_width_height_return_tags(asset('asset').'/images/articles/ru/middle/'.$same[0]->image->path) !!}
                                        >
                                        <div class="views"><span>{{ $same[0]->view }}</span></div>
                                    </div>
                                    <div class="article-info">
                                        <div class="article-title">{{ $same[0]->title }}</div>
                                        <div class="article-text">{!!  str_limit($same[0]->content, 256) !!}</div>
                                        <div class="date-link">
                                            <div class="article-date">
                                                {{ $same[0]->created_at->format('d')
                                                    . ' '  . trans('ru.'.$same[0]->created_at->format('m'))
                                                    . ' '  . $same[0]->created_at->format('Y')
                                                }}
                                            </div>
                                            <span class="btn-link">Подробнее</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="article-border"></div>
                            </article>
                        </div>
                    @endif
                    <div class="right-column">
                        @if(null != $same[0])
                            @foreach($same as $item)
                                @continue($loop->first)
                                <article class="news">
                                    @if(collect(request()->segments())->last() == $item->alias)
                                        <a>
                                    @else
                                        <a href="{{ route('articles', ['article_alias'=>$item->alias]) }}/">
                                            @endif
                                        <div class="article-img">
                                            <img src="{{ asset('asset').'/images/articles/ru/small/'.$item->image->path }}"
                                                 alt="{{ !empty($item->image->alt) ? $item->image->alt : $item->title.' '.$loop->iteration.' 3 ' }}"
                                                 title="{{ !empty($item->image->title) ? $item->image->title : $item->title }}"
                                                {!! image_width_height_return_tags(asset('asset').'/images/articles/ru/small/'.$item->image->path) !!}
                                            >
                                            <div class="views"><span>{{ $item->view }}</span></div>
                                        </div>
                                        <div class="article-info">
                                            <div class="article-title">{{ $item->title }}</div>
                                            {{--<div class="article-text"></div>--}}
                                            <div class="date-link">
                                                <div class="article-date">
                                                    {{ $item->created_at->format('d')
                                                        . ' '  . trans('ru.'.$item->created_at->format('m'))
                                                        . ' '  . $item->created_at->format('Y')
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
            <div>
                @if(5 != $article->category->id)
                    <a href="{{ route('articles_cat', ['cat_alias'=>$article->category->alias]) }}/"
                       class="button-white">Больше статей</a>
                @else
                    <a href="{{ route('top_articles') }}/" class="button-white">Больше статей</a>
                @endif
            </div>
        </section>
    </section>
@endif