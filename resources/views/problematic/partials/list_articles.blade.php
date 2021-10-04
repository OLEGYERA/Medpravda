
@foreach($articles as $article)

    @if($article->approved)
        <article class="news">
            <a href="{{ route('problematic.read_article',['alias1'=>$main_alias, 'alias2'=>$article->alias]) }}/">
                <div class="article-img">
                    <img src="{{ asset('/asset/images/'.($article->image&&$article->image!=null ? 'problematic/'.$article->image : 'mp.png'))}}"
                         alt="" title=""
                            {!! image_width_height_return_tags(asset('/asset/images/'.($article->image&&$article->image!=null ? 'problematic/'.$article->image : 'mp.png'))) !!}
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

    @endif
@endforeach
