<div class="full-content m-top">
    <!-- MOBILE SLIDER -->
    <div class="mobile-first-screen desktop-display-none">

        @if(!empty($sliders))
            <div class="mobile-first-screen-image">
                <img src="{{ asset('asset') }}/images/slider/{{ $sliders[0]->path }}"
                     alt="{{ $sliders[0]->alt }}" title="{{ $sliders[0]->title }}"
                        {!! image_width_height_return_tags(asset('assets').'/images/slider/'.$sliders[0]->path) !!}
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
                                    {!! image_width_height_return_tags(asset('asset').'/images/slider/'.$slider->path) !!}
                            >
                        </a>
                        <div class="slider-info">
                            <a href="{{ $slider->link ?? route('sort') }}/" class="slider-info-text">
                                <h2>{{ $slider->description }}</h2>
                                <p>{{ $slider->text }}</p>
                            </a>
                            <a href="{{ $slider->link ?? route('sort') }}/" class="button-blue">Детальніше</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="pagination">
            @forelse($sliders as $slider)
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
        </div>
    </section>
    <!-- end SLIDER -->

    <!-- НА САЙТЕ -->
    <section class="section-on-site">
        <div class="section-title-meta-icon">
            <h3>На сайті</h3>
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
            <h3>{{ $blocks[1]->utitle ?? '' }}</h3>
            <div class="section-meta-icon">
                <div class="section-title-meta-icon-btn-meta">
                    @if(!empty($blocks[1]->fourth))
                        {{ link_to_route('search', $blocks[1]->fourth, ['search' =>$blocks[1]->fourth]) }}
                    @endif
                    @if(!empty($blocks[1]->fifth))
                        {{ link_to_route('search', $blocks[1]->fifth, ['search' =>$blocks[1]->fifth]) }}
                    @endif
                    @if(!empty($blocks[1]->sixth))
                        {{ link_to_route('search', $blocks[1]->sixth, ['search' =>$blocks[1]->sixth]) }}
                    @endif
                </div>
                <div class="section-icon">
                    <img src="{{ asset('assets') }}/images/title-icons/found.png" alt="иконка Также ищут"
                            {!! image_width_height_return_tags(asset('assets').'/images/title-icons/found.png') !!}
                    >
                </div>
            </div>
        </div>
        <div class="product-search">
            {{--Витрина--}}
            @include('main.ua_medicines_cats', $med_cats)
            {{--Витрина--}}
            <div>
                <a href="{{ route('search_alpha_u') }}/" class="button-white">Більше препаратів</a>
            </div>
        </div>
    </section>
    <!-- end Поиск препаратов -->
    <!-- ТОП СТАТЬИ -->
    {{--<section class="mobile-display-none">--}}
    <section>
        <div class="section-title-meta-icon">
            <h3>{{ $blocks[2]->utitle ?? '' }}</h3>
            <div class="section-meta-icon">
                <div class="section-title-meta-icon-btn-meta">
                    @if(!empty($blocks[2]->fourth))
                        {{ link_to_route('search', $blocks[2]->fourth, ['search' =>$blocks[2]->fourth]) }}
                    @endif
                    @if(!empty($blocks[2]->fifth))
                        {{ link_to_route('search', $blocks[2]->fifth, ['search' =>$blocks[2]->fifth]) }}
                    @endif
                    @if(!empty($blocks[2]->sixth))
                        {{ link_to_route('search', $blocks[2]->sixth, ['search' =>$blocks[2]->sixth]) }}
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
            <a href="{{ route('ua_themes') }}/" class="button-white">
                Більше тем</a>
        </div>
        @if(!empty($problematics))
            <div class="box-number-three">
                @foreach($problematics as $problematic)
                    <a href="{{ route('ua_diseases.symptoms.list', $problematic->children->get_ua()->alias) }}/" class="box-number">
                        <img src="{{ $problematic->children->image ? asset('asset/images/problematic').'/'.$problematic->children->image : asset('asset/images/mp.png') }}"
                             alt="{{ $problematic->children->title ?? '' }}"
                             title="{{ $problematic->children->get_ua()->title ?? '' }}"
                                {!! image_width_height_return_tags($problematic->children->image ? asset('asset/images/problematic').'/'.$problematic->children->image : asset('asset/images/mp.png')) !!}
                        >
                        <div class="box-number-info">
                            <div class="box-number-info-text">
                                {{ $problematic->children->get_ua()->title ?? ''}}
                            </div>
                            <span class="button-blue">
                                {{ $problematic->children->get_ua()->title ?? ''}}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </section>
    <!-- end ТОП СТАТЬИ -->
    <!-- НОВОСТИ -->
    <div class="news-aside">
        <div class="content last-commercial">
            <section class="section-last-arts">
                <div class="section-title-meta-icon">
                    <h3>{{ $blocks[3]->utitle ?? '' }}</h3>
                    <div class="section-meta-icon">
                        <div class="section-title-meta-icon-btn-meta">
                            @if(!empty($blocks[3]->fourth))
                                {{ link_to_route('search', $blocks[3]->fourth, ['search' =>$blocks[3]->fourth]) }}
                            @endif
                            @if(!empty($blocks[3]->fifth))
                                {{ link_to_route('search', $blocks[3]->fifth, ['search' =>$blocks[3]->fifth]) }}
                            @endif
                            @if(!empty($blocks[3]->sixth))
                                {{ link_to_route('search', $blocks[3]->sixth, ['search' =>$blocks[3]->sixth]) }}
                            @endif
                        </div>
                        <div class="section-icon">
                            <img src="{{ asset('assets') }}/images/title-icons/main-icon-3.png"
                                 alt="Последние статьи" width="25" height="25">
                        </div>
                    </div>
                </div>
                <div class="last-arts">
                    <div class="two-column-articles article-wrap section-interest-art">
                        <div class="left-column big-news">
                            @if(!empty($articles['tops']) && $articles['tops']->isNotEmpty())
                                <article class="news">
                                    <a href="{{ route('ua_articles',
                                                    ['ua_article_alias'=>$articles['tops'][0]->alias]) }}/">
                                        <div class="article-img">
                                            <img src="{{ asset('asset/images/articles/ua/middle').'/'.$articles['tops'][0]->image->path }}"
                                                 alt="{{ $articles['tops'][0]->image->alt ?? '' }}"
                                                 title="{{ $articles['tops'][0]->image->title ?? ($articles['tops'][0]->image->alt ?? '') }}"
                                                    {!! image_width_height_return_tags(asset('asset/images/articles/ua/middle').'/'.$articles['tops'][0]->image->path) !!}
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
                                                        . ' '  . trans('ua.'.$articles['tops'][0]->created_at->format('m'))
                                                        . ' '  . $articles['tops'][0]->created_at->format('Y')
                                                    }}
                                                </div>
                                                <span class="btn-link">Докладніше</span>
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
                                        <a href="{{ route('ua_articles', ['ua_article_alias'=>$article->alias]) }}/">
                                            <div class="article-img">
                                                <img src="{{ asset('asset/images/articles/ua/small').'/'.$article->image->path }}"
                                                        {!! image_width_height_return_tags(asset('asset/images/articles/ua/small').'/'.$article->image->path) !!}
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
                    </div>
                </div>
                <div>
                    <a href="{{ route('ua_top_articles') }}/"
                       class="button-white">Більше статей</a>
                </div>
            </section>
            <section class="section-commercial-arts">
                <div class="section-title-meta-icon">
                    <h3>{{ $blocks[4]->utitle ?? '' }}</h3>
                    <div class="section-meta-icon">
                        <div class="section-title-meta-icon-btn-meta">
                            @if(!empty($blocks[4]->fourth))
                                {{ link_to_route('search', $blocks[4]->fourth, ['search' =>$blocks[4]->fourth]) }}
                            @endif
                            @if(!empty($blocks[4]->fifth))
                                {{ link_to_route('search', $blocks[4]->fifth, ['search' =>$blocks[4]->fifth]) }}
                            @endif
                            @if(!empty($blocks[4]->sixth))
                                {{ link_to_route('search', $blocks[4]->sixth, ['search' =>$blocks[4]->sixth]) }}
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
                                    <a href="{{ route('ua_articles',
                                                    ['ua_article_alias'=>$articles['intims'][0]->alias]) }}/">
                                        <div class="article-img">
                                            <img src="{{ asset('asset/images/articles/ua/middle').'/'.$articles['intims'][0]->image->path }}"
                                                 alt="{{ $articles['intims'][0]->image->alt ?? '' }}"
                                                 title="{{ $articles['intims'][0]->image->title ?? ($articles['intims'][0]->image->alt ?? '') }}"
                                                    {!! image_width_height_return_tags(asset('asset/images/articles/ua/middle').'/'.$articles['intims'][0]->image->path) !!}
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
                                                        . ' '  . trans('ua.'.$articles['intims'][0]->created_at->format('m'))
                                                        . ' '  . $articles['intims'][0]->created_at->format('Y')
                                                    }}
                                                </div>
                                                <span class="btn-link">Докладніше</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="article-border"></div>
                                </article>
                                @if(!empty($articles['intims'][1]))
                                    <article class="news">
                                        <a href="{{ route('ua_articles',
                                                    ['ua_article_alias'=>$articles['intims'][1]->alias]) }}/">
                                            <div class="article-img">
                                                <img src="{{ asset('asset/images/articles/ua/middle').'/'.$articles['intims'][1]->image->path }}"
                                                     alt="{{ $articles['intims'][1]->image->alt ?? '' }}"
                                                     title="{{ $articles['intims'][1]->image->title ?? ($articles['intims'][1]->image->alt ?? '') }}"
                                                        {!! image_width_height_return_tags(asset('asset/images/articles/ua/middle').'/'.$articles['intims'][1]->image->path) !!}
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
                                                            . ' '  . trans('ua.'.$articles['intims'][1]->created_at->format('m'))
                                                            . ' '  . $articles['intims'][1]->created_at->format('Y')
                                                        }}
                                                    </div>
                                                    <span class="btn-link">Докладніше</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="article-border"></div>
                                    </article>
                                @endif
                            @endif
                        </div>
                        <div>
                            <div class="small-news">
                                @if(!empty($articles['intims']) && $articles['intims']->isNotEmpty())
                                    @foreach($articles['intims'] as $article)
                                        @continue($loop->index < 2)
                                        <article class="news">
                                            <a href="{{ route('ua_articles', ['ua_article_alias'=>$article->alias]) }}/">
                                                <div class="article-img">
                                                    <img src="{{ asset('asset/images/articles/ua/small').'/'.$article->image->path }}"
                                                            {!! image_width_height_return_tags(asset('asset/images/articles/ua/small').'/'.$article->image->path) !!}>
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
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('ua_articles_cat', ['cat_alias'=>'intimnye-temy']) }}/"
                           class="button-white">Більше статей</a>
                    </div>
            </section>
        </div>
        <aside class="news-med">
            <div class="section-title-meta-icon">
                <h3>{{ $blocks[6]->utitle ?? '' }}</h3>
                <div class="section-meta-icon">
                    <div class="section-title-meta-icon-btn-meta">
                        @if(!empty($blocks[6]->fourth))
                            {{ link_to_route('search', $blocks[6]->fourth, ['search' =>$blocks[6]->fourth]) }}
                        @endif
                        {{--@if(!empty($blocks[6]->fifth))--}}
                        {{--{{ link_to_route('search', $blocks[6]->fifth, ['search' =>$blocks[6]->fifth]) }}--}}
                        {{--@endif--}}
                        {{--@if(!empty($blocks[6]->sixth))--}}
                        {{--{{ link_to_route('search', $blocks[6]->sixth, ['search' =>$blocks[6]->sixth]) }}--}}
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
                                <a href="{{ route('ua_articles', ['ua_article_alias'=>$article->alias]) }}/">
                                    <div class="article-img">
                                        @if(!empty($article->image->path))
                                            @if($loop->first)
                                                <img src="{{ asset('asset/images/articles/ua/middle').'/'.$article->image->path }}"
                                                        {!! image_width_height_return_tags(asset('asset/images/articles/ua/middle').'/'.$article->image->path) !!}
                                                >
                                            @else
                                                <img src="{{ asset('asset/images/articles/ua/small').'/'.$article->image->path }}"
                                                        {!! image_width_height_return_tags(asset('asset/images/articles/ua/small').'/'.$article->image->path) !!}
                                                >
                                            @endif
                                        @else
                                            <img src="{{ asset('asset/images/articles/mp.png') }}"
                                                    {!! image_width_height_return_tags(asset('asset/images/articles/mp.png')) !!}
                                            >
                                        @endif
                                        <div class="views"><span>{{ $article->view ?? 0}}</span></div>
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
                    <a href="{{ route('ua_articles_cat', ['cat_alias'=>'zabluzhdeniya']) }}/"
                       class="button-white">Всі новини</a>
                </div>
            </div>
            {{--META TEGS--}}
            @if(!empty($tags))
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
            @endif
            {{--end META TEGS--}}
            {{--<div class="index-aside-promo">--}}
                {{--<a href="{{ route('ua_adv') }}/">--}}
                    {{--<img src="{{ asset('assets') }}/images/promotion/main-reclama.jpg"--}}
                         {{--alt="Реклама на сайті, промо 1" title="Реклама на сайті, промо 1" width="380" height="260"--}}
                {{--</a>--}}
            {{--</div>--}}

        </aside>

    </div>
    <!-- end НОВОСТИ -->
    <!-- Нижний слайдер -->
    <section class="down-slider-image mobile-display-none">
        <div class="only-slider-text-wrap section-down-slider">
            <div class="only-slider-text">
                Не можна лікувати невідому хворобу.
            </div>
            <div class="only-slider-text">
                Істина у вині, здоров'я у воді.
            </div>
            <div class="only-slider-text">
                Сильнодіючі ліки в руці недосвідченого, як меч в руці (правої) божевільного.
            </div>
            <div class="only-slider-text">
                Лікуй розумом, а не ліками.
            </div>
            <div class="only-slider-text">
                Лікар - не що інше, як розраду для душі.
            </div>
            <div class="only-slider-text">
                Лікар - це філософ, адже немає великої різниці між мудрістю і медициною. Гіппократ.
            </div>
            <div class="only-slider-text">
                Ніщо так не заважає здоров'ю, як часта зміна ліків.
            </div>
            <div class="only-slider-text">
                Якщо допомагає, хвалять природу, якщо не допомагає, звинувачують лікаря.
            </div>
            <div class="only-slider-text">
                Подібне виліковується подібним.
            </div>
            <div class="only-slider-text">
                З усуненням причини усувається хвороба.
            </div>
        </div>
    </section>
    <!-- end Нижний слайдер -->
    <!-- Интересные СТАТЬИ -->
    <section class="">
        <div class="section-title-meta-icon">
            <h3>{{ $blocks[5]->utitle ?? '' }}</h3>
            <div class="section-meta-icon">
                <div class="section-title-meta-icon-btn-meta">
                    @if(!empty($blocks[5]->fourth))
                        {{ link_to_route('search', $blocks[5]->fourth, ['search' =>$blocks[5]->fourth]) }}
                    @endif
                    @if(!empty($blocks[5]->fifth))
                        {{ link_to_route('search', $blocks[5]->fifth, ['search' =>$blocks[5]->fifth]) }}
                    @endif
                    @if(!empty($blocks[5]->sixth))
                        {{ link_to_route('search', $blocks[5]->sixth, ['search' =>$blocks[5]->sixth]) }}
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
                        <a href="{{ route('ua_articles',
                                                ['ua_article_alias'=>$article->alias]) }}/">
                            <div class="article-img">
                                <img src="{{ asset('asset/images/articles/ua/middle').'/'.$article->image->path }}"
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
            <a href="{{ route('ua_articles_cat', ['cat_alias'=>'pitanie-i-dieta']) }}/"
               class="button-white">Більше статей</a>
        </div>
    </section>
    <!-- end Интересные СТАТЬИ -->
</div>
