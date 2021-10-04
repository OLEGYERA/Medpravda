<aside class="right-section m-top @if(!empty($banner_content)) banner-content @endif">
    <div class="banner-reklama order-first" id="banner1-main">
        {{--ПЕРВЫЙ БАННЕР--}}
        <div class="desktop-display-none">
            @include('layouts.banners.mobile.bn1')
        </div>
        <div class="mobile-display-none banner-1">
            @include('layouts.banners.bn1')
        </div>
    </div>
    <div class="article-wrap order-second">
        <div class="section-title-meta-icon desktop-display-none">
            <h3>Топ статті</h3>

        </div>
        @if(!empty($articles) && $articles->isNotEmpty())
            @foreach($articles as $article)
                @continue($loop->index>3)
                <article class="news">
                    <a href="{{ $article->link }}">
                        <div class="article-img">
                            <img src="{{ asset('asset/images/theme').'/'.$article->path }}"
                                 alt="{{ $article->alt ?? '' }}"
                                 title="{{ $article->imgtitle ?? ($article->alt ?? '') }}"
                                    {!! image_width_height_return_tags(asset('asset/images/theme').'/'.$article->path) !!}
                            >
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
    <div class="banner-reklama order-fourth">
        {{--ВТОРОЙ БАННЕР--}}
        <div class="mobile-display-none banner-2">
            @include('layouts.banners.bn2')
        </div>
    </div>
    <div class="article-wrap order-third">
        @if(!empty($articles) && $articles->isNotEmpty())
            @foreach($articles as $article)
                @continue($loop->index<4)
                <article class="news">
                    <a href="{{ $article->link }}">
                        <div class="article-img">
                            <img src="{{ asset('asset/images/theme').'/'.$article->path }}"
                                 alt="{{ $article->alt ?? '' }}"
                                 title="{{ $article->imgtitle ?? ($article->alt ?? '') }}"
                                    {!! image_width_height_return_tags(asset('asset/images/theme').'/'.$article->path) !!}
                            >
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

        {{--БАННЕР 4--}}
        <div class="banner-reklama order-fourth  banner-3">
            <div>
                @include('layouts.banners.bn3')
            </div>
        </div>

    </div>

    <div class="banner-reklama order-fourth banner-4">
        <div>
            @include('layouts.banners.bn4')
        </div>
    </div>
    {{--META TEGS--}}
    @if(!empty($tags))
        <div class="meta-block-wrap">
            <div class="section-title-meta-icon">
                <h3>{{ $blocks[0]->utitle ?? '' }}</h3>
                <div class="section-meta-icon">
                    <div class="section-icon">
                        <img src="{{ asset('assets') }}/images/title-icons/main-icon-6.png"
                             alt="иконка Популярные теги" width="25" height="25">
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
    {{--end META TEGS--}}
</aside>