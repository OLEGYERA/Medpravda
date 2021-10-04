<div class="wrap m-top blue-circle">
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
            <span itemprop="name" class="label1">Категории</span>
            <meta itemprop="position" content="2"/>
            <meta itemprop="item" content="{{url()->current() . '/'}}">
        </div>
    </div>
    {{--BreadCrumbs--}}
    <h1>Категории</h1>
</div>


{{--лонгриды--}}
<section>
    <div class="section-title-meta-icon">
        <h3>Лонгриды</h3>
        <div class="section-meta-icon">

        </div>
    </div>
    <div class="section-interest-art wrap">
        @if(!empty($lg))
            @foreach($lg as $longread)
                <article class="article-articles">
                    <a href="{{ route('longread_show',
                                                    ['alias'=>$longread->alias]) }}/">
                        <div class="article-img">
{{--                            @php(dd($longread))--}}
                            <img src="{{$longread->image()->first()->path}}"
                                 alt="{{ !empty($longread->image()->first()->alt) ? $longread->image()->first()->alt : $longread->title. ' 1 '.$loop->iteration }}"
                                 title="{{ !empty($longread->image()->first()->title) ? $longread->image()->first()->title : $longread->title  }}"
                                    {!! image_width_height_return_tags($longread->image()->first()->path) !!}
                            >
                            <div class="views"><span></span></div>
                        </div>
                        <div class="article-info">
                            <div class="article-title">{{ $longread->title }}</div>
                            <div class="date-link">
                                <div class="article-date">
                                    {{ $longread->created_at->format('d')
                                        . ' '  . trans('ru.'.$longread->created_at->format('m'))
                                        . ' '  . $longread->created_at->format('Y')
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
        <a href="{{ route('longreads_show') }}/"
           class="button-white">Больше лонгридов</a>
    </div>
</section>
{{--конец лонгридов--}}


@if(!empty($cats))
    @foreach($cats as $k=>$articles)
        <section>
            <div class="section-title-meta-icon">
                <h3>{{ $articles['cat'] }}</h3>
                <div class="section-meta-icon">

                </div>
            </div>
            <div class="section-interest-art wrap">
                @if(!empty($articles['articles']))
                    @foreach($articles['articles'] as $article)
                        <article class="article-articles">
                            <a href="{{ route('articles',
                                                    ['article_alias'=>$article->alias]) }}/">
                                <div class="article-img">
                                    @if(isset($article->image->path))
                                    <img src="{{ asset('asset/images/articles/ru/middle').'/'.$article->image->path }}"
                                         alt="{{ !empty($article->image->alt) ? $article->image->alt : $article->title. ' 1 '.$loop->iteration }}"
                                         title="{{ !empty($article->image->title) ? $article->image->title : $article->title  }}"
                                        {!! image_width_height_return_tags(asset('asset/images/articles/ru/middle').'/'.$article->image->path) !!}
                                    >
                                    @endif
                                    <div class="views"><span>{{ $article->view }}</span></div>
                                </div>
                                <div class="article-info">
                                    <div class="article-title">{{ $article->title }}</div>
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
                @if($k == 'top-articles')
                    <a href="{{ route('top_articles') }}/"
                       class="button-white">Больше статей</a>
                @else
                    <a href="{{ route('articles_cat', ['cat_alias'=>$k]) }}/"
                        class="button-white">Больше статей</a>
                @endif
            </div>
        </section>
    @endforeach
@endif