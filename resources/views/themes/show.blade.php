<section class="content page-themes m-top">
    <div class="wrap blue-circle">
        {{--BreadCrumbs--}}
        <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
             itemtype="http://schema.org/BreadcrumbList">
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                @if(empty($loc))
                    <a href="{{ route('main') }}/" itemprop="item">Главная</a>
                @else
                    <a href="{{ route('main', ['loc'=>'ua']) }}/" itemprop="item">Головна</a>
                @endif
                <meta itemprop="position" content="1"/>
            </div>
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                @if(empty($loc))
                    <span itemprop="name" class="label1">Популярные темы</span>
                @else
                    <span itemprop="name" class="label1">Популярні теми</span>
                @endif
                <meta itemprop="position" content="2"/>
            </div>
        </div>
        {{--BreadCrumbs--}}
        @if(empty($loc))
            <h1>Популярные темы</h1>
        @else
            <h1>Популярні теми</h1>
        @endif
    </div>
    @if(!empty($themes))
        <div class="two-column-articles article-wrap section-interest-art">
            <div class="two-big-news">
                @foreach($themes as $theme)
                    <article class="news">
                        <a href="{{ $theme->link }}/">
                            <div class="article-img">
                                <img src="{{ asset('asset/images/theme').'/'.$theme->path }}"
                                     alt="{{ $theme->alt ?? '' }}"
                                     title="{{ $theme->imgtitle ?? ($theme->alt ?? '') }}">
                            </div>
                            <div class="article-info">
                                <div class="article-title">{{ $theme->title }}</div>
                                <p class="article-text">{{ $theme->description }}</p>
                                <div class="date-link">
                                    @if(empty($loc))
                                        <div class="article-date">
                                            {{ $theme->updated_at->format('d')
                                                    . ' '  . trans('ru.'.$theme->updated_at->format('m'))
                                                    . ' '  . $theme->updated_at->format('Y')
                                            }}
                                        </div>
                                    @else
                                        <div class="article-date">
                                            {{ $theme->updated_at->format('d')
                                                    . ' '  . trans('ua.'.$theme->updated_at->format('m'))
                                                    . ' '  . $theme->updated_at->format('Y')
                                            }}
                                        </div>
                                    @endif
                                    <span class="btn-link">

                                        {{ empty($loc) ? 'Подробнее' : 'Докладніше' }}

                                    </span>
                                </div>
                            </div>
                        </a>
                        <div class="article-border"></div>
                    </article>
                @endforeach
            </div>
        </div>
    @endif
    @if(is_object($themes) && !empty($themes->lastPage()) && $themes->lastPage() > 1)
        <div class="themes-pagination">
            @if($themes->lastPage() > 1)
                @if($themes->currentPage() !== 1)
                    <a href="{{ $themes->url(($themes->currentPage() - 1)) }}/" class="back">Назад</a>
                @endif
                @if($themes->currentPage() >= 3)
                    <a href="{{ $themes->url($themes->url(1)) }}/" class="pagin-number">1</a>
                @endif
                @if($themes->currentPage() >= 4)
                    <a>&nbsp;&nbsp;&nbsp;.&nbsp;.&nbsp;.&nbsp;&nbsp;&nbsp;</a>
                @endif
                @if($themes->currentPage() !== 1)
                    <a href="{{ $themes->url($themes->currentPage()-1) }}/"
                       class="pagin-number">{{ $themes->currentPage()-1 }}</a>
                @endif
                <a class="active-pagin-number pagin-number">{{ $themes->currentPage() }}</a>
                @if($themes->currentPage() !== $themes->lastPage())
                    <a href="{{ $themes->url($themes->currentPage()+1) }}/"
                       class="pagin-number">{{ $themes->currentPage()+1 }}</a>
                @endif
                @if($themes->currentPage() <= ($themes->lastPage()-3))
                    <a>&nbsp;&nbsp;&nbsp;.&nbsp;.&nbsp;.&nbsp;&nbsp;&nbsp;</a>
                @endif
                @if($themes->currentPage() <= ($themes->lastPage()-2))
                    <a href="{{ $themes->url($themes->lastPage()) }}/"
                       class="pagin-number">{{ $themes->lastPage() }}</a>
                @endif
                @if($themes->currentPage() !== $themes->lastPage())
                    <a rel="next" href="{{ $themes->url(($themes->currentPage() + 1)) }}/" class="forward">
                        Вперед
                    </a>
                @endif

            @endif
        </div>
    @endif

</section>
