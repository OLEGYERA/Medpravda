{{--@foreach($child_pages as $ch_page)--}}

{{--    @if(count($ch_page->children()->get()))--}}
{{--        @foreach($ch_page->children()->get() as $article)--}}
{{--            @if(!$article->get_ua()->root_page&&$article->get_ua()->approved)--}}

{{--                <article class="news">--}}
{{--                    <a href="{{ route('ua_problematic.read_article',['alias1'=>$main_alias, 'alias2'=>$article->get_ua()->alias]) }}/">--}}
{{--                        <div class="article-img">--}}
{{--                            <img src="{{ asset('/asset/images/'.($article->get_ua()->image&&$article->get_ua()->image!=null ? 'problematic/'.$article->get_ua()->image : 'mp.png'))}}"--}}
{{--                                 alt="" title=""--}}
{{--                                    {!! image_width_height_return_tags(asset('/asset/images/'.($article->get_ua()->image&&$article->get_ua()->image!=null ? 'problematic/'.$article->get_ua()->image : 'mp.png'))) !!}--}}
{{--                            >--}}
{{--                            <div class="views"><span>{{ $article->get_ua()->view }}</span></div>--}}
{{--                        </div>--}}
{{--                        <div class="article-info">--}}
{{--                            <div class="article-title">{{ $article->get_ua()->title }}</div>--}}
{{--                            <p class="article-category">{{str_limit(strip_tags($article->get_ua()->content), 24)}}</p>--}}
{{--                            --}}{{--<p class="article-category">--}}
{{--                                --}}{{--{{ str_limit($article->get_ua()->description, 24) }}--}}
{{--                            --}}{{--</p>--}}
{{--                            <div class="date-link">--}}
{{--                                <div class="article-date">--}}
{{--                                    {{ $article->get_ua()->created_at->format('d')--}}
{{--                                        . ' '  . trans('ua.'.$article->get_ua()->created_at->format('m'))--}}
{{--                                        . ' '  . $article->get_ua()->created_at->format('Y')--}}
{{--                                    }}--}}
{{--                                </div>--}}
{{--                                <span class="btn-link">Детальніше</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="article-border"></div>--}}
{{--                </article>--}}
{{--            @else--}}
{{--                @include('problematic.partials.uk_find_articles', ['child_pages' => $article->get_child_pages()])--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--    @endif--}}

{{--@endforeach--}}

<?php
$main_category = Fresh\Medpravda\Problematic::where('alias', $alias)->first();
$articles = Fresh\Medpravda\Problematic::where('main_category', $main_category->id)->where('approved', true)->where('root_page', false)->take(8)->get();
//dd($articles[0]->get_ua());
?>

@foreach($articles as $article)
    <article class="news">
        <a href="{{ route('ua_problematic.read_article',['alias1'=>$main_alias, 'alias2'=>$article->get_ua()->alias]) }}/">
            <div class="article-img">
                <img src="{{ asset('/asset/images/'.($article->get_ua()->image&&$article->get_ua()->image!=null ? 'problematic/'.$article->get_ua()->image : 'mp.png'))}}"
                     alt="" title=""
                        {!! image_width_height_return_tags(asset('/asset/images/'.($article->get_ua()->image&&$article->get_ua()->image!=null ? 'problematic/'.$article->get_ua()->image : 'mp.png'))) !!}
                >
                <div class="views"><span>{{ $article->get_ua()->view }}</span></div>
            </div>
            <div class="article-info">
                <div class="article-title">{{ $article->get_ua()->title }}</div>
                <p class="article-category">{{str_limit(strip_tags($article->get_ua()->content), 24)}}</p>
                <p class="article-category">
                    {{ str_limit($article->get_ua()->description, 24) }}
                </p>
                <div class="date-link">
                    <div class="article-date">
                        {{ $article->get_ua()->created_at->format('d')
                            . ' '  . trans('ua.'.$article->get_ua()->created_at->format('m'))
                            . ' '  . $article->get_ua()->created_at->format('Y')
                        }}
                    </div>
                    <span class="btn-link">Детальніше</span>
                </div>
            </div>
        </a>
        <div class="article-border"></div>
    </article>
@endforeach