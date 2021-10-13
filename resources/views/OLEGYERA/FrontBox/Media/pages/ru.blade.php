@if ($agent->isMobile())
    @php $is_mobile = true; @endphp
@else
    @php $is_mobile = false; @endphp
@endif

<div class="full-content @if($structure_settings->bgTop) full @endif">
    <div class="media-wrap">
        @if($structure_settings->bgTop)
            <div class="article-preloader" style="background-image: url({{'https://medpravda.ua/gallery/' . getCategoryName($article->dependency->image->category_id) . '/large/' . $article->dependency->image->path}});">
                <div class="preloader-content">
                    <div class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
                        <div class="breadcrumb"
                             itemprop="itemListElement" itemscope
                             itemtype="https://schema.org/ListItem">
                            <a itemprop="item"
                               href="{{ route('ru.home') }}">
                                <span class="label1" itemprop="name">Главная</span>/
                                <meta itemprop="position" content="1"/>
                            </a>
                        </div>
                        @foreach($breadcrumbs as $key => $breadcrumb)
                            <div class="breadcrumb"
                                 itemprop="itemListElement" itemscope
                                 itemtype="https://schema.org/ListItem">
                                <a itemprop="item"
                                   @if($breadcrumb['alias']) href="{{ $breadcrumb['alias'] }}" itemid="{{ $breadcrumb['alias'] }}" @endif>
                                    <span class="label1" itemprop="name">{{$breadcrumb['title']}}</span> @if($key !== count($breadcrumbs) - 1) / @endif
                                    <meta itemprop="position" content="{{$key + 2}}"/>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <h1 class="article-title">{{$article->title}}</h1>
                </div>
            </div>
        @endif

        <div class="article-base">
{{--            <div class="article-content full    ">--}}
            <div class="article-content @if($structure_settings->fullWidth) full @endif">
                <div class="row-author">
                    <div class="author-data"
                         itemprop="author" itemscope="" itemtype="http://schema.org/Person">
                        <div class="author-info">
                            <link itemprop="image" href="{{asset('/gallery/' . getCategoryName($article->dependency->creator->avatar->category_id) . '/medium/' . $article->dependency->creator->avatar->path)}}">
                            <div class="author-name">
                                Автор: {{$article->dependency->creator->surname}} {{$article->dependency->creator->name}} {{$article->dependency->creator->middle_name}}
                            </div>
                            <meta itemprop="name" content="{{$article->dependency->creator->surname}} {{$article->dependency->creator->name}} {{$article->dependency->creator->middle_name}}">
                            @if($article->dependency->creator->editor)
                                <div class="author-links">
                                    @if($article->dependency->creator->editor->facebook)
                                        <a target="_blank" href="{{$article->dependency->creator->editor->facebook}}">
                                            <span class="glyph editor-fb"></span>
                                        </a>
                                    @endif
                                    @if($article->dependency->creator->editor->instagram)
                                        <a target="_blank" href="{{$article->dependency->creator->editor->instagram}}">
                                            <span class="glyph editor-in"></span>
                                        </a>
                                    @endif
                                    <link itemprop="sameAs" href="{{route('ru.editors')}}/#{{$article->dependency->creator->id}}" />
                                    <a target="_blank" href="{{route('ru.editors')}}/#{{$article->dependency->creator->id}}">{{$article->dependency->creator->surname}} {{$article->dependency->creator->name}}</a>
                                </div>
                            @endif
                        </div>
                        @if($article->dependency->creator->editor)
                            <div class="author-specialty">
                                {{$article->dependency->creator->editor->specialty}}
                            </div>
                        @endif
                    </div>
                    <meta itemprop="datePublished" content="{{$article->created_at}}">
                    <meta itemprop="dateModified" content="{{$article->created_at}}">

                    <time datetime="{{$article->created_at->format('Y-m-d H:i:s')}}" class="last-update">
                        Дата обновления: {{$article->created_at->format('d')}} {{renderNameOfMonth($article->created_at->format('M'), 'ru')}} {{$article->created_at->format('Y')}}
                    </time>
                </div>
                @if(!$structure_settings->bgTop)
                    <div class="row-article-presentation">
                        <h1 itemprop="headline name" class="article-title">
                            {{$article->title}}
                        </h1>
                        <div class="article-img">
                            <figure class="avatar">
                                <img src="{{asset('/gallery/' . getCategoryName($article->dependency->image->category_id) . '/large/' . $article->dependency->image->path)}}" alt="{{$article->title}} фото, инструкция">
                            </figure>
                            <link itemprop="image" href="{{asset('/gallery/' . getCategoryName($article->dependency->image->category_id) . '/large/' . $article->dependency->image->path)}}">
                        </div>
                    </div>
                @endif

                @if($structure_settings->float)
                    <div class="article-blocks">
                        @foreach($article->dependency->structure->blocks as $block)
                            @php $block_article = $block->instruction($article->id); @endphp
                            @if($block_article === null && $block_article->ru === null && $block_article->ru === '')
                                @continue
                            @endif
                            <div class="article-block">
                                <h3 class="title-row" itemprop="name">
                                    {{$block->title}}:
                                </h3>
                                <div class="info-row" itemprop="articleSection"><p>{!! $block_article->ru !!}</p></div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="article-blocks">
                        <div class="article-block">
                            <div class="info-row" itemprop="articleSection"><p>{!! $article->content->ru !!}</p></div>
                        </div>
                    </div>
                @endif


            </div>
            @if(!$structure_settings->fullWidth)
                <aside class="article-aside">
                   <div class="aside-box">
                       <h3 class="aside-box-title">
                           Новостная лента
                       </h3>
                       <div class="aside-box-list">
                           @foreach($aside as $key=>$new)
                               <div class="article">
                                   <div class="article-img" style="background-image: url({{asset('/gallery/' . getCategoryName($new->dependency->image->category_id) . '/large/' . $new->dependency->image->path)}});"></div>
                                   <a href="{{route('ru.media.article', ['alias' => $new->alias, 'id' => $new->id])}}" class="article-title">{{$new->title}}</a>
                               </div>
                           @endforeach
                       </div>
                   </div>
                </aside>
            @endif
        </div>
    </div>

</div>
