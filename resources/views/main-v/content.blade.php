
<div class="full-content m-top">
    <!-- MOBILE SLIDER -->
    <div class="mobile-first-screen desktop-display-none">

        @if(!empty($sliders))
            <div class="mobile-first-screen-image">
                <img src="{{ asset('asset') }}/images/slider/{{ $sliders[0]->path }}"
                     alt="{{ $sliders[0]->alt }}" title="{{ $sliders[0]->title }}"
                        {!! image_width_height_return_tags(asset('asset').'/images/slider/'.$sliders[0]->path) !!}
                >
            </div>
        @endif

    </div>
    <!-- END MOBILE SLIDER -->
    <!-- SLIDER -->
    <section class="main-slider mobile-display-none">
        <div id="main-page-top-slider" class="slider">
            @if(!empty($sliders))
                @foreach($sliders as $slider)
                    <div class="slide">
                        <a href="{{ $slider->link ?? route('sort') }}/" class="slider-images">
                            <img src="{{ asset('asset') }}/images/slider/{{ $slider->path }}"
                                 alt="{{ $slider->alt }}" title="{{ $slider->title }}"
                                    {!! image_width_height_return_tags(asset('asset').'/images/slider/'.$sliders[0]->path) !!}
                            >
                        </a>
                        <div class="slider-info">
                            <a href="{{ $slider->link ?? route('sort') }}/" class="slider-info-text">
                                <h2>{{ $slider->description }}</h2>
                                <p>{{ $slider->text }}</p>
                            </a>
                            <a href="{{ $slider->link ?? route('sort') }}/" class="button-blue">Подробнее</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="pagination">
            @if($sliders)
                @forelse($sliders as $slider)
                    <div class="slide">
                        <div class="inner">
                            <img class="pagination-active"
                                 src="{{ $slider->getIconMain() }}"
                                 alt="" title=""
                                    {!! image_width_height_return_tags($slider->getIconMain()) !!}
                            >
                            <img class="pagination-hover"
                                 src="{{ $slider->getIconHide() }}"
                                 alt=""
                                 title=""
                                    {!! image_width_height_return_tags($slider->getIconHide()) !!}
                            >
                        </div>
                    </div>
                @empty
                    <div class="slide">
                        <div class="inner">
                            <img class="pagination-active" src="{{ $slider->getIconMain() }}"
                                 alt="" title=""
                                    {!! image_width_height_return_tags($slider->getIconMain()) !!}
                            >
                            <img class="pagination-hover" src="{{ $slider->getIconHide() }}"
                                 alt=""
                                 title=""
                                    {!! image_width_height_return_tags($slider->getIconHide()) !!}
                            >
                        </div>
                    </div>
                @endforelse
            @endif
        </div>
    </section>
    <!-- end SLIDER -->

    <!-- НА САЙТЕ -->
    <section class="section-on-site">
        <div class="section-title-meta-icon">
            <h3>На сайте</h3>
            <div class="section-meta-icon">
                <div class="section-icon">
                    <img src="{{ asset('assets') }}/images/title-icons/main-icon-1.png" alt="иконка на сайте" width="25"
                         height="25">
                </div>
            </div>
        </div>
        <div class="box-number-three">
            @forelse($infoblocks as $infoblock)
                <a href="{{ $infoblock->link }}/" class="box-number">
                    <img src="{{ asset('/asset/images/numbers').'/'.$infoblock->image }}"
                         alt="{{ $infoblock->alt }}" title="{{ $infoblock->title }}"
                            {!! image_width_height_return_tags(asset('/asset/images/numbers').'/'.$infoblock->image) !!}
                    >
                    <div class="box-number-info">
                        <div class="box-number-num">
                            {{ $infoblock->nums ?? 0}}
                        </div>
                        <div class="box-number-info-text">
                            {{ $infoblock->description }}
                        </div>
                        <span class="button-blue">
                            {{ $infoblock->button }}
                        </span>
                    </div>
                </a>
            @empty
            @endforelse
        </div>
    </section>
    <!-- end НА САЙТЕ -->

    <!-- Поиск препаратов -->
    <section class="section-product-search">
        <div class="section-title-meta-icon">
            <h3>{{ $blocks[1]->title ?? '' }}</h3>
            <div class="section-meta-icon">
                <div class="section-title-meta-icon-btn-meta">
                    @if(!empty($blocks[1]->first))
                        {{ link_to_route('search', $blocks[1]->first, ['search' =>$blocks[1]->first]) }}
                    @endif
                    @if(!empty($blocks[1]->second))
                        {{ link_to_route('search', $blocks[1]->second, ['search' =>$blocks[1]->second]) }}
                    @endif
                    @if(!empty($blocks[1]->third))
                        {{ link_to_route('search', $blocks[1]->third, ['search' =>$blocks[1]->third]) }}
                    @endif

                </div>
                <div class="section-icon">
                    <img src="{{ asset('assets') }}/images/title-icons/found.png" alt="иконка Также ищут" width="25"
                         height="25">
                </div>
            </div>
        </div>
        <div class="product-search">
            {{--Витрина--}}
            @include('main.medicines_cats', $med_cats)
            {{--Витрина--}}
            <div>
                <a href="{{ route('sort') }}/" class="button-white">Больше препаратов</a>
            </div>
        </div>
    </section>
    <!-- end Поиск препаратов -->

    <!-- ТОП СТАТЬИ -->
    {{--<section class="mobile-display-none">--}}
    <section>
        <div class="section-title-meta-icon">
            <h3>{{ $blocks[2]->title ?? '' }}</h3>
            <div class="section-meta-icon">
                <div class="section-title-meta-icon-btn-meta">
                    @if(!empty($blocks[2]->first))
                        {{ link_to_route('search', $blocks[2]->first, ['search' =>$blocks[2]->first]) }}
                    @endif
                    @if(!empty($blocks[2]->second))
                        {{ link_to_route('search', $blocks[2]->second, ['search' =>$blocks[2]->second]) }}
                    @endif
                    @if(!empty($blocks[2]->third))
                        {{ link_to_route('search', $blocks[2]->third, ['search' =>$blocks[2]->third]) }}
                    @endif
                </div>
                <div class="section-icon">
                    <img src="{{ asset('assets') }}/images/title-icons/main-icon-2.png" alt="иконка Топ статьи"
                         width="25" height="25">
                </div>
            </div>
        </div>
        <div class="section-interest-art wrap">
            @if(!empty($articles['themes']) && $articles['themes']->isNotEmpty())
                @foreach($articles['themes'] as $theme)
                    <article class="article-articles">
                        <a href="{{ $theme->link }}/">
                            <div class="article-img">
                                <img src="{{ asset('asset/images/theme').'/'.$theme->path }}"
                                     alt="{{ $theme->alt ?? '' }}"
                                     title="{{ $theme->imgtitle ?? ($theme->alt ?? '') }}"
                                        {!! image_width_height_return_tags(asset('asset/images/theme').'/'.$theme->path) !!}
                                >
                                <div class="views"></div>
                            </div>
                            <div class="article-info">
                                <div class="article-title">{{ $theme->title }}</div>
                                <div class="date-link">
                                    <div class="article-date">
                                        {{ $theme->updated_at->format('d')
                                            . ' '  . trans('ua.'.$theme->updated_at->format('m'))
                                            . ' '  . $theme->updated_at->format('Y')
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
            <a href="{{ route('themes') }}/" class="button-white">
                Больше тематик</a>
        </div>
        @if(!empty($problematics))
            <div class="box-number-three">
                @foreach($problematics as $problematic)
                    <a href="{{ route('diseases.symptoms.list', $problematic->children->alias) }}/" class="box-number">
                        <img src="{{ $problematic->children->image ? asset('asset/images/problematic').'/'.$problematic->children->image : asset('asset/images/mp.png') }}"
                             alt="{{ $problematic->children->title ?? '' }}"
                             title="{{ $problematic->children->title ?? '' }}"
                                {!! image_width_height_return_tags($problematic->children->image ? asset('asset/images/problematic').'/'.$problematic->children->image : asset('asset/images/mp.png')) !!}
                        >
                        <div class="box-number-info">
                            <div class="box-number-info-text">
                                {{ $problematic->children->title ?? ''}}
                            </div>
                            <span class="button-blue">
                                {{ $problematic->children->title ?? ''}}
                            </span>
                        </div>
                    </a>
                    {{--<article class="article-articles">--}}
                    {{--<a href="{{ route('diseases.symptoms.list', $problematic->alias) }}/">--}}
                    {{--<div class="article-img">--}}
                    {{--<img src="{{ $problematic->image ? asset('asset/images/problematic').'/'.$problematic->image : asset('asset/images/mp.png') }}"--}}
                    {{--alt="{{ $problematic->title ?? '' }}"--}}
                    {{--title="{{ $problematic->title ?? '' }}"--}}
                    {{--{!! image_width_height_return_tags($problematic->image ? asset('asset/images/problematic').'/'.$problematic->image : asset('asset/images/mp.png')) !!}--}}
                    {{-->--}}
                    {{--<div class="views"></div>--}}
                    {{--</div>--}}
                    {{--<div class="article-info">--}}
                    {{--<div class="article-title">{{ $problematic->title }}</div>--}}
                    {{--<div class="date-link">--}}
                    {{--<div class="article-date">--}}
                    {{--{{ $problematic->updated_at->format('d')--}}
                    {{--. ' '  . trans('ru.'.$problematic->updated_at->format('m'))--}}
                    {{--. ' '  . $problematic->updated_at->format('Y')--}}
                    {{--}}--}}
                    {{--</div>--}}
                    {{--<span class="btn-link">Подробнее</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</a>--}}
                    {{--<div class="article-border"></div>--}}
                    {{--</article>--}}
                @endforeach
            </div>
        @endif
    </section>
    <!-- end ТОП СТАТЬИ -->

    <!-- НОВОСТИ -->
    <div class="news-aside mobile-display-none">
        <div class="content last-commercial">
            <section class="section-last-arts">
                <div class="section-title-meta-icon">
                    <h3>{{ $blocks[3]->title ?? '' }}</h3>
                    <div class="section-meta-icon">
                        <div class="section-title-meta-icon-btn-meta">
                            @if(!empty($blocks[3]->first))
                                {{ link_to_route('search', $blocks[3]->first, ['search' =>$blocks[3]->first]) }}
                            @endif
                            @if(!empty($blocks[3]->second))
                                {{ link_to_route('search', $blocks[3]->second, ['search' =>$blocks[3]->second]) }}
                            @endif
                            @if(!empty($blocks[3]->third))
                                {{ link_to_route('search', $blocks[3]->third, ['search' =>$blocks[3]->third]) }}
                            @endif
                        </div>
                        <div class="section-icon">
                            <img src="{{ asset('assets') }}/images/title-icons/main-icon-3.png"
                                 alt="иконка Последние статьи" width="25" height="25">
                        </div>
                    </div>
                </div>
                <div class="last-arts">
                    <div class="two-column-articles article-wrap section-interest-art">
                        <div class="left-column big-news">
                            @if(!empty($articles['tops']) && $articles['tops']->isNotEmpty())
                                <article class="news">
                                    <a href="{{ route('articles',
                                                    ['article_alias'=>$articles['tops'][0]->alias]) }}/">
                                        <div class="article-img">
                                            <img src="{{ asset('asset/images/articles/ru/middle').'/'.$articles['tops'][0]->image->path }}"
                                                 alt="{{ $articles['tops'][0]->image->alt ?? '' }}"
                                                 title="{{ $articles['tops'][0]->image->title ?? ($articles['tops'][0]->image->alt ?? '') }}"
                                                    {!! image_width_height_return_tags(asset('asset/images/articles/ru/middle').'/'.$articles['tops'][0]->image->path) !!}
                                            >
                                            <div class="views"><span>{{ $articles['tops'][0]->view }}</span></div>
                                        </div>
                                        <div class="article-info">
                                            <div class="article-title">{{ $articles['tops'][0]->title }}</div>
                                            <div class="article-text">
                                                {!! str_limit($articles['tops'][0]->content, 160) !!}
                                            </div>
                                            <div class="date-link">
                                                <div class="article-date">
                                                    {{ $articles['tops'][0]->created_at->format('d')
                                                        . ' '  . trans('ru.'.$articles['tops'][0]->created_at->format('m'))
                                                        . ' '  . $articles['tops'][0]->created_at->format('Y')
                                                    }}
                                                </div>
                                                <span class="btn-link">Подробнее</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="article-border"></div>
                                </article>
                            @endif
                        </div>
                        <div class="right-column">
                            @if(!empty($articles['tops']) && $articles['tops']->isNotEmpty())
                                @foreach($articles['tops'] as $article)
                                    @continue($loop->first)
                                    <article class="news">
                                        <a href="{{ route('articles',
                                                    ['article_alias'=>$article->alias]) }}/">
                                            <div class="article-img">
                                                <img src="{{ asset('asset/images/articles/ru/small').'/'.$article->image->path }}"
                                                     alt="" title=""
                                                        {!! image_width_height_return_tags(asset('asset/images/articles/ru/small').'/'.$article->image->path) !!}
                                                >
                                                <div class="views"><span>{{ $article->view }}</span></div>
                                            </div>
                                            <div class="article-info">
                                                <div class="article-title">{{ $article->title }}</div>
                                                <p class="article-category">
                                                    {{ str_limit($article->description, 24) }}
                                                </p>
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
                    </div>
                </div>
                <div>
                    <a href="{{ route('top_articles') }}/"
                       class="button-white">Больше статей</a>
                </div>
            </section>
            <section class="section-commercial-arts">
                <div class="section-title-meta-icon">
                    <h3>{{ $blocks[4]->title ?? '' }}</h3>
                    <div class="section-meta-icon">
                        <div class="section-title-meta-icon-btn-meta">
                            @if(!empty($blocks[4]->first))
                                {{ link_to_route('search', $blocks[4]->first, ['search' =>$blocks[4]->first]) }}
                            @endif
                            @if(!empty($blocks[4]->second))
                                {{ link_to_route('search', $blocks[4]->second, ['search' =>$blocks[4]->second]) }}
                            @endif
                            @if(!empty($blocks[4]->third))
                                {{ link_to_route('search', $blocks[4]->third, ['search' =>$blocks[4]->third]) }}
                            @endif
                        </div>
                        <div class="section-icon">
                            <img src="{{ asset('assets') }}/images/title-icons/intim.jpg"
                                 alt="иконка Коммерчиские статьи" width="25" height="25">
                        </div>
                    </div>
                </div>
                <div class="last-arts">
                    <div class="two-column-articles article-wrap section-interest-art">
                        <div class="two-big-news">
                            @if(!empty($articles['intims']) && $articles['intims']->isNotEmpty())
                                <article class="news">
                                    <a href="{{ route('articles',
                                                    ['article_alias'=>$articles['intims'][0]->alias]) }}/">
                                        <div class="article-img">
                                            <img src="{{ asset('asset/images/articles/ru/middle').'/'.$articles['intims'][0]->image->path }}"
                                                 alt="{{ $articles['intims'][0]->image->alt ?? '' }}"
                                                 title="{{ $articles['intims'][0]->image->title ?? ($articles['intims'][0]->image->alt ?? '') }}"
                                                    {!! image_width_height_return_tags(asset('asset/images/articles/ru/middle').'/'.$articles['intims'][0]->image->path) !!}
                                            >
                                            <div class="views"><span>{{ $articles['intims'][0]->view }}</span></div>
                                        </div>
                                        <div class="article-info">
                                            <div class="article-title">{{ $articles['intims'][0]->title }}</div>
                                            <div class="article-text">
                                                {!! str_limit($articles['intims'][0]->content, 160) !!}
                                            </div>
                                            <div class="date-link">
                                                <div class="article-date">
                                                    {{ $articles['intims'][0]->created_at->format('d')
                                                        . ' '  . trans('ru.'.$articles['intims'][0]->created_at->format('m'))
                                                        . ' '  . $articles['intims'][0]->created_at->format('Y')
                                                    }}
                                                </div>
                                                <span class="btn-link">Подробнее</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="article-border"></div>
                                </article>
                                <article class="news">
                                    <a href="{{ route('articles',
                                                    ['article_alias'=>$articles['intims'][1]->alias]) }}/">
                                        <div class="article-img">
                                            <img src="{{ asset('asset/images/articles/ru/middle').'/'.$articles['intims'][1]->image->path }}"
                                                 alt="{{ $articles['intims'][1]->image->alt ?? '' }}"
                                                 title="{{ $articles['intims'][1]->image->title ?? ($articles['intims'][1]->image->alt ?? '') }}"
                                                    {!! image_width_height_return_tags(asset('asset/images/articles/ru/middle').'/'.$articles['intims'][1]->image->path) !!}
                                            >
                                            <div class="views"><span>{{ $articles['intims'][1]->view }}</span></div>
                                        </div>
                                        <div class="article-info">
                                            <div class="article-title">{{ $articles['intims'][1]->title }}</div>
                                            <div class="article-text">
                                                {!! str_limit($articles['intims'][1]->content, 160) !!}
                                            </div>
                                            <div class="date-link">
                                                <div class="article-date">
                                                    {{ $articles['intims'][1]->created_at->format('d')
                                                        . ' '  . trans('ru.'.$articles['intims'][1]->created_at->format('m'))
                                                        . ' '  . $articles['intims'][1]->created_at->format('Y')
                                                    }}
                                                </div>
                                                <span class="btn-link">Подробнее</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="article-border"></div>
                                </article>
                            @endif
                        </div>
                        <!--<div>-->
                        <div class="small-news">
                            @if(!empty($articles['intims']) && $articles['intims']->isNotEmpty())
                                @foreach($articles['intims'] as $article)
                                    @continue($loop->first)
                                    @continue(1 == $loop->index)
                                    <article class="news">
                                        <a href="{{ route('articles',
                                                    ['article_alias'=>$article->alias]) }}/">
                                            <div class="article-img">
                                                <img src="{{ asset('asset/images/articles/ru/small').'/'.$article->image->path }}"
                                                     alt="" title=""
                                                        {!! image_width_height_return_tags(asset('asset/images/articles/ru/small').'/'.$article->image->path) !!}
                                                >
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
                        <!--</div>-->
                    </div>
                    <div>
                        <a href="{{ route('articles_cat', ['cat_alias'=>'intimnye-temy']) }}/"
                           class="button-white">Больше статей</a>
                    </div>
                </div>
            </section>
        </div>


        <aside class="news-med">
            <div class="section-title-meta-icon">
                <h3>{{ $blocks[6]->title ?? '' }}</h3>
                <div class="section-meta-icon">
                    <div class="section-title-meta-icon-btn-meta">
                        @if(!empty($blocks[6]->first))
                            {{ link_to_route('search', $blocks[6]->first, ['search' =>$blocks[6]->first]) }}
                        @endif
                        {{--@if(!empty($blocks[6]->second))--}}
                        {{--{{ link_to_route('search', $blocks[6]->second, ['search' =>$blocks[6]->second]) }}--}}
                        {{--@endif--}}
                        {{--@if(!empty($blocks[6]->third))--}}
                        {{--{{ link_to_route('search', $blocks[6]->third, ['search' =>$blocks[6]->third]) }}--}}
                        {{--@endif--}}
                    </div>
                    <div class="section-icon">
                        <img src="{{ asset('assets') }}/images/title-icons/main-icon-4.png"
                             alt="иконка Новости медицины" width="25" height="25">
                    </div>
                </div>
            </div>

            <div class="news-med-arts">
                <div class="article-wrap big-news">
                    @if(!empty($articles['delusions']) && $articles['delusions']->isNotEmpty())
                        @foreach($articles['delusions'] as $article)
                            <article class="news">
                                <a href="{{ route('articles',
                                                ['article_alias'=>$article->alias]) }}/">
                                    <div class="article-img">
                                        <img src="{{ asset('asset/images/articles/ru/small').'/'.$article->image->path }}"
                                             alt="" title=""
                                                {!! image_width_height_return_tags(asset('asset/images/articles/ru/small').'/'.$article->image->path) !!}
                                        >
                                        <div class="views"><span>{{ $article->view }}</span></div>
                                    </div>
                                    <div class="article-info">
                                        <div class="article-title">{{ $article->title }}</div>
                                        @if($loop->first)
                                            <div class="article-text">
                                                {!! str_limit($article->content, 160) !!}
                                            </div>
                                        @endif
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
                    <a href="{{ route('articles_cat', ['cat_alias'=>'zabluzhdeniya']) }}/"
                       class="button-white">Все новости</a>
                </div>
            </div>
            @if(!empty($tags))
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
            @endif
            {{--<div class="index-aside-promo">--}}
                {{--<a href="{{ route('adv') }}/">--}}
                    {{--<img src="{{ asset('assets') }}/images/promotion/main-reclama.jpg" alt="Реклама на сайте, промо 1"--}}
                         {{--title="Реклама на сайте, промо 1" width="380" height="260">--}}
                {{--</a>--}}
            {{--</div>--}}

        </aside>

    </div>
    <!-- end НОВОСТИ -->
    <!-- Нижний слайдер -->
    <div class="down-slider-image mobile-display-none">
        <div class="only-slider-text-wrap section-down-slider">
            <div class="only-slider-text">
                Нельзя лечить неопознанную болезнь.
            </div>
            <div class="only-slider-text">
                Истина в вине, здоровье в воде.
            </div>
            <div class="only-slider-text">
                Сильнодействующее лекарство в руке неопытного, как мечь в руке (правой) безумного.
            </div>
            <div class="only-slider-text">
                Лечи умом, а не лекарствами.
            </div>
            <div class="only-slider-text">
                Врач - не что другое, как утешение для души.
            </div>
            <div class="only-slider-text">
                Врач - это философ, ведь нет большой разницы между мудростью и медициной. Гиппократ.
            </div>
            <div class="only-slider-text">
                Ничто так не мешает здоровью, как частая смена лекарств.
            </div>
            <div class="only-slider-text">
                Если помогает, хвалят природу, если не помогает, обвиняют врача.
            </div>
            <div class="only-slider-text">
                Подобное излечивается подобным.
            </div>
            <div class="only-slider-text">
                С устранением причины устраняется болезнь.
            </div>
        </div>
    </div>
    <!-- end Нижний слайдер -->
    <!-- Интересные СТАТЬИ -->
    <section class="mobile-display-none">
        <div class="section-title-meta-icon">
            <h3>{{ $blocks[5]->title ?? '' }}</h3>
            <div class="section-meta-icon">
                <div class="section-title-meta-icon-btn-meta">
                    @if(!empty($blocks[5]->first))
                        {{ link_to_route('search', $blocks[5]->first, ['search' =>$blocks[5]->first]) }}
                    @endif
                    @if(!empty($blocks[5]->second))
                        {{ link_to_route('search', $blocks[5]->second, ['search' =>$blocks[5]->second]) }}
                    @endif
                    @if(!empty($blocks[5]->third))
                        {{ link_to_route('search', $blocks[5]->third, ['search' =>$blocks[5]->third]) }}
                    @endif
                </div>
                <div class="section-icon">
                    <img src="{{ asset('assets') }}/images/title-icons/main-icon-2.png" alt="иконка Топ статьи"
                         width="25" height="25">
                </div>
            </div>
        </div>
        <div class="section-interest-art wrap">
            @if(!empty($articles['diets']) && $articles['diets']->isNotEmpty())
                @foreach($articles['diets'] as $article)
                    <article class="article-articles">
                        <a href="{{ route('articles',
                                                ['article_alias'=>$article->alias]) }}/">
                            <div class="article-img">
                                <img src="{{ asset('asset/images/articles/ru/middle').'/'.$article->image->path }}"
                                     alt="" title=""
                                        {!! image_width_height_return_tags(asset('asset/images/articles/ru/middle').'/'.$article->image->path) !!}
                                >
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
            <a href="{{ route('articles_cat', ['cat_alias'=>'pitanie-i-dieta']) }}/"
               class="button-white">Больше статей</a>
        </div>
    </section>
    <!-- end Интересные СТАТЬИ -->
</div>