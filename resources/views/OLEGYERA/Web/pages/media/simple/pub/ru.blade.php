<div class="full-content">
    @if($structure_settings->bgTop)
        <div class="publication-full-preloader" style="background-image: url({{'https://medpravda.ua/gallery/' . getCategoryName($publication->dependency->image->category_id) . '/large/' . $publication->dependency->image->path}});">
            <div class="preloader-content">
                @include('OLEGYERA.Web.pages.media.modules.breadcrumbs', [
                    'breadcrumbs' => $breadcrumbs
                ])
                <h1 class="pub-title">{{$publication->title}}</h1>
                <div class="pub-social">
                    <div class="social-links">
                        <a href="#">
                            <img src="{{asset('Web/img/social/fb.svg')}}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{asset('Web/img/social/tg.svg')}}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{asset('Web/img/social/tw.svg')}}" alt="">
                        </a>
                    </div>
                    <div class="watcher-counter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="11" viewBox="0 0 17 11">
                            <path d="M16.892 5.17482C16.7401 4.96707 13.1215 0.0878906 8.49992 0.0878906C3.87834 0.0878906 0.259583 4.96707 0.107877 5.17462C-0.0359591 5.37172 -0.0359591 5.63904 0.107877 5.83613C0.259583 6.04388 3.87834 10.9231 8.49992 10.9231C13.1215 10.9231 16.7401 6.04385 16.892 5.8363C17.036 5.63924 17.036 5.37172 16.892 5.17482ZM8.49992 9.80219C5.09563 9.80219 2.14715 6.56378 1.27434 5.5051C2.14602 4.44548 5.08833 1.20876 8.49992 1.20876C11.9041 1.20876 14.8523 4.44661 15.7255 5.50586C14.8538 6.56544 11.9115 9.80219 8.49992 9.80219Z" fill="currentColor"/>
                            <path d="M8.49937 2.14293C6.64524 2.14293 5.13672 3.65145 5.13672 5.50558C5.13672 7.35972 6.64524 8.86824 8.49937 8.86824C10.3535 8.86824 11.862 7.35972 11.862 5.50558C11.862 3.65145 10.3535 2.14293 8.49937 2.14293ZM8.49937 7.74733C7.26322 7.74733 6.25762 6.74171 6.25762 5.50558C6.25762 4.26946 7.26325 3.26384 8.49937 3.26384C9.73549 3.26384 10.7411 4.26946 10.7411 5.50558C10.7411 6.74171 9.73552 7.74733 8.49937 7.74733Z" fill="currentColor"/>
                        </svg>
                        <span class="counter">{{$publication->view}}</span>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="mp-box pub-st">
        <div class="publication-content @if($structure_settings->fullWidth) full @endif">
            @if(!$structure_settings->bgTop)
                <div class="pub-intro">
                    <h1 itemprop="headline name" class="pub-title">{{$publication->title}}</h1>
                    <div class="pub-date">
                        @php $pub_dt = daysOrMonth($publication->created_at, 'ru') @endphp
                        <div class="dt-separator">Дата создания: {{$pub_dt['date']}}, {{$pub_dt['time']}}</div>
                        @php $pub_dt = daysOrMonth($publication->content->updated_at, 'ru') @endphp
                        <div class="dt-separator">Дата обновления: {{$pub_dt['date']}}, {{$pub_dt['time']}}</div>
                    </div>
                    <div class="pub-author">
                        <div class="author-logo">
                            <img src="{{asset('/gallery/' . getCategoryName($publication->dependency->creator->avatar->category_id) . '/medium/' . $publication->dependency->creator->avatar->path)}}" alt="">
                        </div>
                        <div class="content-box">
                            <a href="{{route('ru.editors')}}" class="author-title">
                                Автор: {{$publication->dependency->creator->surname}} {{$publication->dependency->creator->name}} {{$publication->dependency->creator->middle_name}}
                            </a>
                            @if($publication->dependency->creator->editor)
                                <div class="author-specialty">
                                    {{$publication->dependency->creator->editor->specialty}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="pub-social">
                        <div class="social-links">
                            <a href="#">
                                <img src="{{asset('Web/img/social/fb.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{asset('Web/img/social/tg.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{asset('Web/img/social/tw.svg')}}" alt="">
                            </a>
                        </div>
                        <div class="watcher-counter">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="11" viewBox="0 0 17 11">
                                <path d="M16.892 5.17482C16.7401 4.96707 13.1215 0.0878906 8.49992 0.0878906C3.87834 0.0878906 0.259583 4.96707 0.107877 5.17462C-0.0359591 5.37172 -0.0359591 5.63904 0.107877 5.83613C0.259583 6.04388 3.87834 10.9231 8.49992 10.9231C13.1215 10.9231 16.7401 6.04385 16.892 5.8363C17.036 5.63924 17.036 5.37172 16.892 5.17482ZM8.49992 9.80219C5.09563 9.80219 2.14715 6.56378 1.27434 5.5051C2.14602 4.44548 5.08833 1.20876 8.49992 1.20876C11.9041 1.20876 14.8523 4.44661 15.7255 5.50586C14.8538 6.56544 11.9115 9.80219 8.49992 9.80219Z" fill="currentColor"/>
                                <path d="M8.49937 2.14293C6.64524 2.14293 5.13672 3.65145 5.13672 5.50558C5.13672 7.35972 6.64524 8.86824 8.49937 8.86824C10.3535 8.86824 11.862 7.35972 11.862 5.50558C11.862 3.65145 10.3535 2.14293 8.49937 2.14293ZM8.49937 7.74733C7.26322 7.74733 6.25762 6.74171 6.25762 5.50558C6.25762 4.26946 7.26325 3.26384 8.49937 3.26384C9.73549 3.26384 10.7411 4.26946 10.7411 5.50558C10.7411 6.74171 9.73552 7.74733 8.49937 7.74733Z" fill="currentColor"/>
                            </svg>
                            <span class="counter">{{$publication->view}}</span>
                        </div>

                    </div>
                    <div class="pub-photo">
                        <img width="900" height="600" src="{{'https://medpravda.ua/gallery/' . getCategoryName($publication->dependency->image->category_id) . '/large/' . $publication->dependency->image->path}}" alt="{{$publication->title}} фото">
                        <link itemprop="image" href="{{'https://medpravda.ua/gallery/' . getCategoryName($publication->dependency->image->category_id) . '/large/' . $publication->dependency->image->path}}">
                    </div>
                </div>
            @else
                <div class="pub-intro">
                    <div class="pub-date">
                        @php $pub_dt = daysOrMonth($publication->created_at, 'ru') @endphp
                        <div class="dt-separator">Дата создания: {{$pub_dt['date']}}, {{$pub_dt['time']}}</div>
                        @php $pub_dt = daysOrMonth($publication->content->updated_at, 'ru') @endphp
                        <div class="dt-separator">Дата обновления: {{$pub_dt['date']}}, {{$pub_dt['time']}}</div>
                    </div>
                    <div class="pub-author">
                        <div class="author-logo">
                            <img src="{{asset('/gallery/' . getCategoryName($publication->dependency->creator->avatar->category_id) . '/medium/' . $publication->dependency->creator->avatar->path)}}" alt="">
                        </div>
                        <div class="content-box">
                            <a href="{{route('ru.editors')}}" class="author-title">
                                Автор: {{$publication->dependency->creator->surname}} {{$publication->dependency->creator->name}} {{$publication->dependency->creator->middle_name}}
                            </a>
                            @if($publication->dependency->creator->editor)
                                <div class="author-specialty">
                                    {{$publication->dependency->creator->editor->specialty}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif


            @if($structure_settings->float)
                <div class="publication-blocks">
                    @foreach($publication->dependency->structure->blocks as $block)
                        @php $block_article = $block->instruction($publication->id); @endphp
                        @if($block_article === null && $block_article->ru === null && $block_article->ru === '')
                            @continue
                        @endif
                        <div class="publication-block">
                            <h3 class="title-row" itemprop="name">
                                {{$block->title}}:
                            </h3>
                            <div class="publication-text">
                                {!! $publication->content->ru !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="publication-text">
                    {!! $publication->content->ru !!}
                </div>
            @endif
        </div>
        @if(!$structure_settings->fullWidth)
            <aside class="publication-aside">
                @include('OLEGYERA.FrontBox.MODULES.banners.bn1', ['key_word' => 'pub_' . $publication->id])
                @foreach($aside_articles as $key=>$aside_article)
                    @switch($key)
                        @case(2)
                        @include('OLEGYERA.FrontBox.MODULES.banners.bn2', ['key_word' => 'pub_' . $publication->id])
                        @break
                        @case(4)
                        @include('OLEGYERA.FrontBox.MODULES.banners.bn3', ['key_word' => 'pub_' . $publication->id])
                        @break
                    @endswitch
                    @include('OLEGYERA.FrontBox.particles.article', [
                        'type' => 'mini',
                        'eclipsed' => true,
                        'link' => route('ru.pub', ['id' => $aside_article->id]),
                        'time' => daysOrMonth($aside_article->created_at, 'ru'),
                        'counter' => $aside_article->view,
                        'title' => $aside_article->title,
                        'author' => '@ ' . $aside_article->dependency->editor->name . ' ' . $aside_article->dependency->editor->surname,
                        'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($aside_article->dependency->image->category_id) . '/large/' . $aside_article->dependency->image->path,

                    ])
                @endforeach
                @include('OLEGYERA.FrontBox.MODULES.banners.bn4', ['key_word' => 'pub_' . $publication->id])
            </aside>
        @endif
    </div>
</div>
