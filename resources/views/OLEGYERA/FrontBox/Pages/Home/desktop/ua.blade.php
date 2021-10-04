<div class="full-content">
    <div class="home-wrap">
        @if(isset($news[0]))
            <h1 class="line-head">Новини</h1>
            <div class="news-article">
                <div class="little-articles">
                    <h3>Останні новини</h3>
                    @foreach($news as $key=>$new)
                        @if($key > 2) @continue @endif
                        <div class="little-artical">
                            <time>{{$new->created_at->format('H:i')}} {{$new->created_at->format('d')}} {{renderNameOfMonth($new->created_at->format('M'), 'ua')}} {{$new->created_at->format('Y')}}</time>
                            <h4 class="title-name">{{$new->article->utitle}}</h4>
                        </div>
                    @endforeach
                </div>
                @if(isset($news[3]))
                    <div class="top-articles">
                        <h3>Топові новини</h3>
                        <div class="articles-box">
                            <div class="article">
                                <div class="article-img" style="background-image: url({{asset('/gallery/' . getCategoryName($news[3]->article->dependency->image->category_id) . '/large/' . $news[3]->article->dependency->image->path)}});"></div>
                                <div class="article-info">
                                    <h3>{{$news[3]->article->utitle}}</h3>
                                    <div class="add-line">
                                        <a href="{{route('ru.media.article', ['alias' => $news[3]->article->alias, 'id' => $news[3]->article->id])}}" class="article-link">Детальніше</a>
                                        <time>{{$news[3]->article->created_at->format('d')}} {{renderNameOfMonth($news[3]->article->created_at->format('M'), 'ua')}} {{$news[3]->article->created_at->format('Y')}}</time>
                                    </div>
                                </div>
                            </div>
                            @if(isset($news[4]))
                                <div class="article">
                                    <div class="article-img" style="background-image: url({{asset('/gallery/' . getCategoryName($news[4]->article->dependency->image->category_id) . '/large/' . $news[4]->article->dependency->image->path)}});"></div>
                                    <div class="article-info">
                                        <h3>{{$news[4]->article->utitle}}</h3>
                                        <div class="add-line">
                                            <a href="{{route('ru.media.article', ['alias' => $news[4]->article->alias, 'id' => $news[4]->article->id])}}" class="article-link">Детальніше</a>
                                            <time>{{$news[4]->article->created_at->format('d')}} {{renderNameOfMonth($news[4]->article->created_at->format('M'), 'ua')}} {{$news[4]->article->created_at->format('Y')}}</time>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        @endif


            @if(isset($top_news[0]))
                <h2 class="line-head">Топові новини</h2>
                <div class="top-news-article">
                    @foreach($top_news as $key=>$new)
                        <div class="article">
                            <div class="article-img" style="background-image: url({{asset('/gallery/' . getCategoryName($new->article->dependency->image->category_id) . '/large/' . $new->article->dependency->image->path)}});"></div>
                            <div class="article-info">
                                <h3>{{$new->article->utitle}}</h3>
                                <div class="add-line">
                                    <a href="{{route('ru.media.article', ['alias' => $new->article->alias, 'id' => $new->article->id])}}" class="article-link">Подробнее</a>
                                    <time>{{$new->article->created_at->format('d')}} {{renderNameOfMonth($new->article->created_at->format('M'), 'ua')}} {{$new->article->created_at->format('Y')}}</time>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if(isset($interview[0]))
                <h2 class="line-head">Інтерв'ю</h2>
                <div class="top-news-article">
                    @foreach($interview as $key=>$new)
                        <div class="article">
                            <div class="article-img" style="background-image: url({{asset('/gallery/' . getCategoryName($new->article->dependency->image->category_id) . '/large/' . $new->article->dependency->image->path)}});"></div>
                            <div class="article-info">
                                <h3>{{$new->article->utitle}}</h3>
                                <div class="add-line">
                                    <a href="{{route('ru.media.article', ['alias' => $new->article->alias, 'id' => $new->article->id])}}" class="article-link">Подробнее</a>
                                    <time>{{$new->article->created_at->format('d')}} {{renderNameOfMonth($new->article->created_at->format('M'), 'ua')}} {{$new->article->created_at->format('Y')}}</time>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        @if(isset($articles[0]))
            <h2>Корисні статті</h2>
            <div class="artical-blocks">
                @php $article = $articles[0] @endphp
                <div class="main-article article">
                    <div class="article-img" style="background-image: url({{asset('/gallery/' . getCategoryName($article->dependency->image->category_id) . '/large/' . $article->dependency->image->path)}});"></div>
                    <div class="article-info">
                            <span class="article-category">
                                @if($article->dependency->category !== null)
                                    {{$article->dependency->category->utitle}}
                                @endif
                            </span>
                        <h3>{{$article->utitle}}</h3>
                        <div class="add-line">
                            <a href="{{route('ua.media.article', ['alias' => $article->alias, 'id' => $article->id])}}" class="article-link">Детальніше</a>
                            <time>{{$article->created_at->format('d')}} {{renderNameOfMonth($article->created_at->format('M'), 'ua')}} {{$article->created_at->format('Y')}}</time>
                        </div>
                    </div>
                </div>
                @if(isset($articles[1]))
                    <div class="sub-articles">
                        @foreach($articles as $key=>$article)
                            @if($key == 0) @continue @endif
                            <div class="article">
                                <div class="article-img" style="background-image: url({{asset('/gallery/' . getCategoryName($article->dependency->image->category_id) . '/large/' . $article->dependency->image->path)}});"></div>
                                <div class="article-info">
                                    <span class="article-category">
                                        @if($article->dependency->category !== null)
                                            {{$article->dependency->category->utitle}}
                                        @endif
                                    </span>
                                    <h3>{{$article->utitle}}</h3>
                                    <div class="add-line">
                                        <a href="{{route('ua.media.article', ['alias' => $article->alias, 'id' => $article->id])}}" class="article-link">Детальніше</a>
                                        <time>{{$article->created_at->format('d')}} {{renderNameOfMonth($article->created_at->format('M'), 'ua')}} {{$article->created_at->format('Y')}}</time>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif
        <h2>Інструкції</h2>
            <div class="instruction-blocks">
                <a href="{{route('ua.catalog.' . $catalog['drug']['route_name'])}}" class="instruction-block">
                    <h3 class="title">Препарати</h3>
                    <div class="instruction-img">
                        <img src="{{asset('img/FrontBox/home/drug.svg')}}" alt="">
                    </div>
                </a>
                <a href="{{route('ua.catalog.' . $catalog['ware']['route_name'])}}" class="instruction-block">
                    <h3 class="title">Медичні вироби</h3>
                    <div class="instruction-img">
                        <img src="{{asset('img/FrontBox/home/ware.svg')}}" alt="">
                    </div>
                </a>
                <a href="{{route('ua.catalog.' . $catalog['bad']['route_name'])}}" class="instruction-block">
                    <h3 class="title">Дієтичні добавки</h3>
                    <div class="instruction-img">
                        <img src="{{asset('img/FrontBox/home/bad.svg')}}" alt="">
                    </div>
                </a>
                <a href="{{route('ua.catalog.' . $catalog['cosmetic']['route_name'])}}" class="instruction-block">
                    <h3 class="title">Косметические средства</h3>
                    <div class="instruction-img">
                        <img src="{{asset('img/FrontBox/home/cosmetic.svg')}}" alt="">
                    </div>
                </a>
            </div>
        <h2>Інше</h2>
        <div class="other-blocks">
            @foreach($catalog as $key => $item)
                @if($key == 'drug' || $key == 'bad' || $key == 'ware' || $key == 'cosmetic') @continue @endif
                <a href="{{route('ua.catalog.' . $item['route_name'])}}" class="link-plate">
                    <span class="glyph {{$key}}"></span>
                    <span class="title">{{$item['utitle']}}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>
