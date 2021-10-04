<?php
    $main_category = Fresh\Medpravda\Problematic::where('alias', $alias)->first();
    $articles = Fresh\Medpravda\Problematic::where('main_category', $main_category->id)->where('approved', true)->where('root_page', false)->take(8)->get();
?>

@foreach($articles as $article)
    <article class="news">
        <a href="{{ route('problematic.read_article',['alias1'=>$alias, 'alias2'=>$article->alias]) }}/">
            <div class="article-img">
                <img src="{{ asset('/asset/images/'.($article->image&&$article->image!=null ? 'problematic/'.$article->image : 'mp.png'))}}"
                     alt="" title=""
                        {!! image_width_height_return_tags(asset('/asset/images/'.($article->image&&$article->image!=null ? 'problematic/'.$article->image : 'mp.png'))) !!}
                >
                <div class="views"><span>{{ $article->view }}</span></div>
            </div>
            <div class="article-info">
                <div class="article-title">{{ $article->title }}</div>
                <p class="article-category">{{str_limit(strip_tags($article->content), 24)}}</p>
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