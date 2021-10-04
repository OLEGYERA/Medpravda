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
            <h3>Топ статьи</h3>

        </div>
        @if(!empty($articles) && $articles->isNotEmpty())
            @foreach($articles as $article)
                @continue($loop->index>3)
                <article class="news">
                    <a href="{{ $article->link }}/">
                        <div class="article-img">
                            <img src="{{ asset('asset/images/theme').'/'.$article->path }}"
                                 alt="{{ $article->alt ?? '' }}"
                                 title="{{ $article->imgtitle ?? ($article->alt ?? '') }}" width="255" height="175">
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
                    <a href="{{ $article->link }}/">
                        <div class="article-img">
                            <img src="{{ asset('asset/images/theme').'/'.$article->path }}"
                                 alt="{{ $article->alt ?? '' }}"
                                 {{--change img->title--}}
                                 title="{{ $article->imgtitle ?? ($article->alt ?? '') }}" width="255" height="175">
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

        {{--БАННЕР 3--}}
        <div class="banner-inner-7 banner-3">
            <div>
                @include('layouts.banners.bn3')
            </div>
        </div>

        {{--БАННЕР 4--}}
        <div class="banner-reklama order-fourth banner-4">
            <div>
                @include('layouts.banners.bn4')
            </div>
        </div>
        {{--META TEGS--}}
        @if(!empty($tags))
            <div class="meta-block-wrap">
                <div class="section-title-meta-icon">
                    <h3>{{ $blocks[0]->title ?? '' }}</h3>
                    <div class="section-meta-icon">
                        <div class="section-icon">
                            <img src="{{ asset('assets') }}/images/title-icons/main-icon-6.png"
                                 alt="иконка Популярные теги" width="25" height="25">
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
        {{--end META TEGS--}}
    </div>


</aside>