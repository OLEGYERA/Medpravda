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
                <span itemprop="name" class="label1">Лонгриды</span>
                <meta itemprop="position" content="2"/>
                <meta itemprop="item" content="{{url()->current(). '/'}}">
            </div>
        </div>
        {{--BreadCrumbs--}}
        <h1>Лонгриды</h1>
    </div>
    @if(!empty($longreads))
        <div class="big-news margin-minus all-big-news">
            <article class="news">
                <a href="{{ route('longread_show', ['alias'=>$longreads[0]->alias]) }}/">
                    <div class="article-img">
                        @if(!empty($longreads[0]->image()->first()))
                            <img src="{{ $longreads[0]->image()->first()->path }}"
                                 alt="{{ $longreads[0]->image()->first()->alt }}" title="{{ $longreads[0]->image()->first()->title }}"
                                    {!! image_width_height_return_tags($longreads[0]->image()->first()->path) !!}
                            >
                        @else
                            <img src="{{ asset('asset')}}/images/articles/mp.png"
                                 alt="MedPravda" title="MedPravda" width="270" height="270">
                        @endif
                        <div class="views"><span></span></div>
                    </div>

                    <div class="article-info">
                        <div class="article-title">{{ $longreads[0]->title }}</div>
                        <p class="article-category">Лонгриды</p>
                        <div class="article-text">{!! str_limit(strip_tags($longreads[0]->description), 156) !!}</div>
                        <div class="date-link">
                            <div class="article-date">
                                {{ $longreads[0]->created_at->format('d')
                                        . ' '  . trans('ru.'.$longreads[0]->created_at->format('m'))
                                        . ' '  . $longreads[0]->created_at->format('Y')
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
        <div class="two-column-articles article-wrap section-interest-art">
            <div class="two-big-news">
                @foreach($longreads as $key => $longread)
                    @continue($key == 0)
                    <article class="news">
                        <a href="{{ route('longread_show', ['alias'=>$longread->alias]) }}/">
                            <div class="article-img">
                                @if(!empty($longread->image()->first()))
                                    <img src="{{ $longread->image()->first()->path }}"
                                         alt="{{ $longread->image()->first()->alt }}" title="{{ $longread->image()->first()->title }}"
                                            {!! image_width_height_return_tags($longread->image()->first()->path) !!}
                                    >
                                @else
                                    <img src="{{ asset('asset')}}/images/articles/mp.png"
                                         alt="MedPravda" title="MedPravda" width="270" height="270">
                                @endif
                                <div class="views"><span></span></div>
                            </div>

                            <div class="article-info">
                                <div class="article-title">{{ $longread->title }}</div>
                                <p class="article-category">Лонгриды</p>
                                <div class="article-text">{!! str_limit(strip_tags($longread->description), 156) !!}</div>
                                <div class="date-link">
                                    <div class="article-date">
                                        {{ $longread->created_at->format('d')
                                                . ' '  . trans('ru.'.$longread->created_at->format('m'))
                                                . ' '  . $longread->created_at->format('Y')
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
            </div>
        </div>
    @endif
{{--    @if(is_object($articles) && !empty($articles->lastPage()) && $articles->lastPage() > 1)--}}
{{--        <div class="articles-pagination">--}}
{{--            @if($articles->lastPage() > 1)--}}
{{--                @if($articles->currentPage() !== 1)--}}
{{--                    <a rel="prev" href="{{ $articles->url(($articles->currentPage() - 1)) }}" class="back">Назад</a>--}}
{{--                @endif--}}
{{--                @if($articles->currentPage() >= 3)--}}
{{--                    <a href="{{ $articles->url($articles->url(1)) }}/" class="pagin-number">1</a>--}}
{{--                @endif--}}
{{--                @if($articles->currentPage() >= 4)--}}
{{--                    <a>&nbsp;&nbsp;&nbsp;.&nbsp;.&nbsp;.&nbsp;&nbsp;&nbsp;</a>--}}
{{--                @endif--}}
{{--                @if($articles->currentPage() !== 1)--}}
{{--                    <a href="{{ $articles->url($articles->currentPage()-1) }}/"--}}
{{--                       class="pagin-number">{{ $articles->currentPage()-1 }}</a>--}}
{{--                @endif--}}
{{--                <a class="active-pagin-number pagin-number">{{ $articles->currentPage() }}</a>--}}
{{--                @if($articles->currentPage() !== $articles->lastPage())--}}
{{--                    <a href="{{ $articles->url($articles->currentPage()+1) }}/"--}}
{{--                       class="pagin-number">{{ $articles->currentPage()+1 }}</a>--}}
{{--                @endif--}}
{{--                @if($articles->currentPage() <= ($articles->lastPage()-3))--}}
{{--                    <a>&nbsp;&nbsp;&nbsp;.&nbsp;.&nbsp;.&nbsp;&nbsp;&nbsp;</a>--}}
{{--                @endif--}}
{{--                @if($articles->currentPage() <= ($articles->lastPage()-2))--}}
{{--                    <a href="{{ $articles->url($articles->lastPage()) }}/"--}}
{{--                       class="pagin-number">{{ $articles->lastPage() }}</a>--}}
{{--                @endif--}}
{{--                @if($articles->currentPage() !== $articles->lastPage())--}}
{{--                    <a rel="next" href="{{ $articles->url(($articles->currentPage() + 1)) }}" class="forward">--}}
{{--                        Вперед--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--            @endif--}}
{{--        </div>--}}
{{--    @endif--}}
</section>