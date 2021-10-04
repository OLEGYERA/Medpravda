@if(!empty($article))
    {{--{{ dump($article) }}--}}
    <section class="content m-top">
        <div class="wrap">
            {{--BreadCrumbs--}}
            <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
                 itemtype="http://schema.org/BreadcrumbList">
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <a href="{{ route('main', ['loc'=>'ua']) }}/" itemprop="item">
                        <span itemprop="name" class="label1">Головна</span>
                    </a>
                    <meta itemprop="position" content="1"/>
                </div>
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    @if(5 != $article->category->id)
                        <a href="{{ route('ua_articles_cat', ['cat_alias'=>$article->category->alias]) }}/"
                           itemprop="item">
                            <span class="label1" itemprop="name">{{ $article->category->utitle }}</span>
                        </a>
                    @else
                        <a href="{{ route('ua_top_articles') }}/"
                           itemprop="item">
                            <span class="label1" itemprop="name">{{ $article->category->utitle }}</span>
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
                                        . ' '  . trans('ua.'.$article->created_at->format('m'))
                                        . ' '  . $article->created_at->format('Y')
                                }}
                    </div>
                    <div class="views"><span>{{ $article->view ?? '' }}</span></div>
                </div>
                <div class="admin-content">
                    <div class="full-width-image">
                        <img src="{{ asset('asset').'/images/articles/ua/main/'.$article->image->path }}"
                             alt="{{ $article->image->alt }}" title="{{ $article->image->title }}"
                            {!! image_width_height_return_tags(asset('asset').'/images/articles/ua/main/'.$article->image->path) !!}
                        >
                    </div>

                    {{--Main Content--}}
                    {!! $article->content !!}
                    {{--Main Content--}}
                </div>
            </div>
            <div class="down-meta-share">
                <div class="top-meta">
                    <span class="meta-title">Теги:</span>
                    @if(!empty($article->tags) && $article->tags->isNotEmpty())
                        @foreach($article->tags as $tag)
                            <a href="{{ route('ua_articles_tag', ['tag_alias'=>$tag->alias]) }}/"
                               class="btn-meta">
                                {{ $tag->uname }}
                            </a>
                        @endforeach
                    @endif
                </div>
                <div class="share">

                    {{--<script type="application/ld+json">--}}
{{--{--}}
{{--"@context" : "http://schema.org",--}}
{{--"@type" : "Organization",--}}
{{--"name" : "Медправда",--}}
{{--"url" : "{{url()->current().'/'}}",--}}
{{--"sameAs" : [--}}
{{--"https://www.facebook.com/medpravda.ua",--}}
{{--"https://t.me/medpravda",--}}
{{--"https://itunes.apple.com/ua/podcast/medpravda/id1444152598?l=ru&mt=2&fbclid=IwAR3xEMeopvso6xn6rfEOL5FjO7zAg_kCH_ha7RGRZA1AFAfEUxiNAQReQQU"--}}
{{--]--}}
{{--}--}}
                    {{--</script>--}}

                    <span>Поділитися</span>
                    <a target="_blank" href="https://www.facebook.com/medpravda.ua"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://t.me/medpravda"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://itunes.apple.com/ua/podcast/medpravda/id1444152598?l=ru&mt=2&fbclid=IwAR3xEMeopvso6xn6rfEOL5FjO7zAg_kCH_ha7RGRZA1AFAfEUxiNAQReQQU"><i class="fa fa-podcast" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <section class="section-last-arts">
            <div class="section-title-meta-icon">
                <h3>Інші статті</h3>
                <div class="section-meta-icon">
                    <div class="section-icon">
                        <img src="{{ asset('assets') }}/images/title-icons/main-icon-3.png"
                             alt="иконка Последние статьи" title="иконка Последние статьи" width="25" height="25">
                    </div>
                </div>
            </div>
            <div class="last-arts">
                <div class="two-column-articles article-wrap section-interest-art">
                    @if(null != $same[0])
                        <div class="left-column big-news">
                            <article class="news">
                                <a href="{{ route('ua_articles', ['article_alias'=>$same[0]->alias]) }}/">
                                    <div class="article-img">
                                        <img src="{{ asset('asset').'/images/articles/ua/middle/'.$same[0]->image->path }}"
                                             alt="{{ $same[0]->image->alt }}" title="{{ $same[0]->image->title }}"
                                        {!! image_width_height_return_tags(asset('asset').'/images/articles/ua/middle/'.$same[0]->image->path) !!}
                                        >
                                        <div class="views"><span>{{ $same[0]->view }}</span></div>
                                    </div>
                                    <div class="article-info">
                                        <div class="article-title">{{ $same[0]->title }}</div>
                                        <div class="article-text">{!!  str_limit($same[0]->content, 256) !!}</div>
                                        <div class="date-link">
                                            <div class="article-date">
                                                {{ $same[0]->created_at->format('d')
                                                    . ' '  . trans('ua.'.$same[0]->created_at->format('m'))
                                                    . ' '  . $same[0]->created_at->format('Y')
                                                }}
                                            </div>
                                            <span class="btn-link">Детальніше</span>
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
                                    <a href="{{ route('ua_articles', ['article_alias'=>$item->alias]) }}/">
                                        <div class="article-img">
                                            <img src="{{ asset('asset').'/images/articles/ua/small/'.$item->image->path }}"
                                                 alt="{{ $item->image->alt }}" title="{{ $item->image->title }}"
                                                {!! image_width_height_return_tags(asset('asset').'/images/articles/ua/small/'.$item->image->path) !!}
                                            >
                                            <div class="views"><span>{{ $item->view }}</span></div>
                                        </div>
                                        <div class="article-info">
                                            <div class="article-title">{{ $item->title }}</div>
                                            {{--<div class="article-text"></div>--}}
                                            <div class="date-link">
                                                <div class="article-date">
                                                    {{ $item->created_at->format('d')
                                                        . ' '  . trans('ua.'.$item->created_at->format('m'))
                                                        . ' '  . $item->created_at->format('Y')
                                                    }}
                                                </div>
                                                <span class="btn-link">Детальніше</span>
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
                    <a href="{{ route('ua_articles_cat', ['cat_alias'=>$article->category->alias]) }}/"
                       class="button-white">Більше статей</a>
                @else
                    <a href="{{ route('ua_top_articles') }}/" class="button-white">Більше статей</a>
                @endif
            </div>
        </section>

    </section>
@endif