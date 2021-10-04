@if(!empty($article))
    {{--{{ dump($article) }}--}}
    <section class="content m-top">
        <div class="wrap single-article">
            {{--BreadCrumbs--}}
            <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
                 itemtype="http://schema.org/BreadcrumbList">
                @isset($bread_crumb)
                    {!! $bread_crumb !!}
                @endisset
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
                        <img src="{{ $article->image&&$article->image!=null ? asset('asset').'/images/problematic/'.$article->image : asset('asset').'/images/mp.png' }}"
                             alt="test"
                             title="test"
                                {!! image_width_height_return_tags($article->image&&$article->image!=null ? asset('asset').'/images/problematic/'.$article->image : asset('asset').'/images/mp.png') !!}
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
                    <a target="_blank" href="https://twitter.com/intent/tweet?text=Актуальные статьи о здоровье и медицине только на https://medpravda.ua &url={{url()->current(). '/'}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <section class="section-last-arts">
            <div class="section-title-meta-icon">
                <h3>Другие статьи</h3>
                <div class="section-meta-icon">
                    <div class="section-icon">
                        <img src="{{ asset('assets/images/title-icons/main-icon-3.png') }}"
                             alt="иконка Последние статьи" width="25" height="25">
                    </div>
                </div>
            </div>
            <div class="last-arts">
                <div class="two-column-articles article-wrap section-interest-art">

                    @if(count($articles))
                        <div class="left-column big-news">
                            <article class="news">
                                @if(collect(request()->segments())->last() == $articles->first()->alias)
                                    <a>
                                        @else
                                            <a href="{{ route('ua_problematic.read_article', ['alias1'=>$main_alias, 'alias2'=>$articles->first()->alias]) }}/">
                                                @endif
                                                <div class="article-img">
                                                    <img src="{{ $articles->first()->image&&$articles->first()->image!=null ? asset('asset').'/images/problematic/'.$articles->first()->image : asset('asset').'/images/mp.png' }}"
                                                         alt=""
                                                         title=""
                                                            {!! image_width_height_return_tags($articles->first()->image&&$articles->first()->image!=null ? asset('asset').'/images/problematic/'.$articles->first()->image : asset('asset').'/images/mp.png') !!}
                                                    >
                                                    <div class="views"><span>{{ $articles->first()->view }}</span></div>
                                                </div>
                                                <div class="article-info">
                                                    <div class="article-title">{{ $articles->first()->title }}</div>
                                                    <div class="article-text">{!!  str_limit($articles->first()->content, 256) !!}</div>
                                                    <div class="date-link">
                                                        <div class="article-date">
                                                            {{ $articles->first()->created_at->format('d')
                                                                . ' '  . trans('ua.'.$articles->first()->created_at->format('m'))
                                                                . ' '  . $articles->first()->created_at->format('Y')
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
                        @include('problematic.partials.list_articles', ['articles'=>$articles->slice(1)])
                    </div>
                </div>
            </div>
            <div>
                <a href="{{ route('ua_problematic.articles_cat', $main_alias) }}/" class="button-white">Більше статей</a>
            </div>
        </section>
    </section>
@endif