<section class="content page-articles m-top fixed">
<div class="wrap blue-circle">
    {{--BreadCrumbs--}}
    <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
         itemtype="http://schema.org/BreadcrumbList">
        @isset($bread_crumb)
            {!! $bread_crumb !!}
        @endisset
    </div>
    {{--BreadCrumbs--}}
    <h1>Статті з розділу {{$main_category->title}}</h1>
</div>
@if(count($articles))
    <div class="two-column-articles-mini">
        @foreach($articles as $article)
            <article class="news">
                <a href="{{ route('ua_problematic.read_article', ['alias1' => $main_alias,'article2'=>$articles[0]->get_ua()->alias]) }}/">
                    <div class="article-img">
                        @if(!empty($article->get_ua()->image))
                            <img src="{{ asset('asset').'/images/problematic/'.$article->get_ua()->image }}"
                                 alt="" title=""
                                    {!! image_width_height_return_tags(asset('asset').'/images/problematic/'.$article->get_ua()->image) !!}
                            >
                        @else
                            <img src="{{ asset('asset')}}/images/mp.png"
                                 alt="MedPravda" title="MedPravda" width="270" height="270">
                        @endif
                        <div class="views"><span>{{ $article->get_ua()->view }}</span></div>
                    </div>
                    <div class="article-info">
                        <div class="article-title">{{ $article->get_ua()->title }}</div>
                        <p class="article-category">{{str_limit(strip_tags($article->get_ua()->content), 24)}}...</p>
                        <div class="article-text">{!! str_limit(strip_tags($article->get_ua()->content), 312) !!}</div>
                        <div class="date-link">
                            <div class="article-date">
                                {{ $article->get_ua()->created_at->format('d')
                                        . ' '  . trans('ua.'.$article->get_ua()->created_at->format('m'))
                                        . ' '  . $article->get_ua()->created_at->format('Y')
                                }}
                            </div>
                            <span class="btn-link">Детальніше </span>
                        </div>
                    </div>
                </a>
            </article>
        @endforeach
    </div>
    {{--<div class="two-column-articles article-wrap section-interest-art">--}}
        {{--<div class="two-big-news">--}}
            {{--@foreach($articles as $article)--}}
                {{--@continue($loop->first)--}}
                {{--<div class="article-border"></div>--}}
                {{--<article class="news">--}}
                    {{--<a href="{{ route('ua_problematic.read_article', ['alias1' => $main_alias,'article2'=>$article->alias]) }}/">--}}
                        {{--<div class="article-img">--}}
                            {{--@if(!empty($article->image))--}}
                                {{--<img src="{{ asset('asset').'/images/problematic/'.$article->image }}"--}}
                                     {{--alt="" title=""--}}
                                        {{--{!! image_width_height_return_tags(asset('asset').'/images/problematic/'.$article->image) !!}--}}
                                {{-->--}}
                            {{--@else--}}
                                {{--<img src="{{ asset('asset/images/mp.png') }}"--}}
                                     {{--alt="MedPravda" title="MedPravda" width="270" height="270">--}}
                            {{--@endif--}}
                            {{--<div class="views"><span>{{ $article->view }}</span></div>--}}
                        {{--</div>--}}

                        {{--<div class="article-info">--}}
                            {{--<div class="article-title">{{ $article->title }}</div>--}}
                            {{--<p class="article-category">Статистика мінохорони здоров'я</p>--}}
                            {{--<div class="article-text">{!! str_limit(strip_tags($article->content), 156) !!}</div>--}}
                            {{--<div class="date-link">--}}
                                {{--<div class="article-date">--}}
                                    {{--{{ $article->created_at->format('d')--}}
                                            {{--. ' '  . trans('ua.'.$article->created_at->format('m'))--}}
                                            {{--. ' '  . $article->created_at->format('Y')--}}
                                    {{--}}--}}
                                {{--</div>--}}
                                {{--<span class="btn-link">Детальніше</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</article>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}
@endif
@if(is_object($articles) && !empty($articles->lastPage()) && $articles->lastPage() > 1)
    <div class="articles-pagination">
        @if($articles->lastPage() > 1)
            @if($articles->currentPage() !== 1)
                <a rel="prev" href="{{ $articles->url(($articles->currentPage() - 1)) }}" class="back">Назад</a>
            @endif
            @if($articles->currentPage() >= 3)
                <a href="{{ $articles->url($articles->url(1)) }}" class="pagin-number">1</a>
            @endif
            @if($articles->currentPage() >= 4)
                <a>&nbsp;&nbsp;&nbsp;.&nbsp;.&nbsp;.&nbsp;&nbsp;&nbsp;</a>
            @endif
            @if($articles->currentPage() !== 1)
                <a href="{{ $articles->url($articles->currentPage()-1) }}"
                   class="pagin-number">{{ $articles->currentPage()-1 }}</a>
            @endif
            <a class="active-pagin-number pagin-number">{{ $articles->currentPage() }}</a>
            @if($articles->currentPage() !== $articles->lastPage())
                <a href="{{ $articles->url($articles->currentPage()+1) }}"
                   class="pagin-number">{{ $articles->currentPage()+1 }}</a>
            @endif
            @if($articles->currentPage() <= ($articles->lastPage()-3))
                <a>&nbsp;&nbsp;&nbsp;.&nbsp;.&nbsp;.&nbsp;&nbsp;&nbsp;</a>
            @endif
            @if($articles->currentPage() <= ($articles->lastPage()-2))
                <a href="{{ $articles->url($articles->lastPage()) }}"
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