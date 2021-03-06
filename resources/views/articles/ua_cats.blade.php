<div class="wrap m-top blue-circle">
    {{--BreadCrumbs--}}
    <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
         itemtype="http://schema.org/BreadcrumbList">
        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
            <a href="{{ route('main', ['loc'=>'ua']) }}/" itemprop="item">
                <span class="label1" itemprop="name">Головна</span>
            </a>
            <meta itemprop="position" content="1"/>
        </div>
        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
            <span itemprop="name" class="label1">Категорії</span>
            <meta itemprop="position" content="2"/>
            <meta itemprop="item" content="{{url()->current() . '/'}}">
        </div>
    </div>
    {{--BreadCrumbs--}}
    <h1>Категорії</h1>
</div>
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
                            <a href="{{ route('ua_articles',
                                                    ['ua_article_alias'=>$article->alias]) }}/">
                                <div class="article-img">
                                    <img src="{{ asset('asset/images/articles/ua/middle').'/'.$article->image->path }}"
                                         alt="{{ $article->image->alt ?? '' }}"
                                         title="{{ $article->image->title ?? ($article->image->alt ?? '') }}"
                                        {!! image_width_height_return_tags(asset('asset/images/articles/ua/middle').'/'.$article->image->path) !!}
                                    >
                                    <div class="views"><span>{{ $article->view }}</span></div>
                                </div>
                                <div class="article-info">
                                    <div class="article-title">{{ $article->title }}</div>
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
                <a href="{{ route('ua_articles_cat', ['cat_alias'=>$k]) }}/"
                   class="button-white">Більше статей</a>
            </div>
        </section>
    @endforeach
@endif