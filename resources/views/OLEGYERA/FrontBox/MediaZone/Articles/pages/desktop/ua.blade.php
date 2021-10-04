@php $is_mobile = false; @endphp

<div class="full-content reactive media-zone">
    <div class="triple-wrap">
        <aside class="page-navigation">
            <div class="aside-fixed">
                @include('OLEGYERA.FrontBox.MediaZone.Articles.modules.navigation.ua')
            </div>
        </aside>
        <section class="page-content mp-anchor" id="startPage">
            <div class="row-author">
                <div class="author-data">
                    <div class="author-info">
                        <div class="author-name">
                            Автор: {{$article->dependency->editor->surname}} {{$article->dependency->editor->name}} {{$article->dependency->editor->middle_name}}
                        </div>
                        @if($article->dependency->editor->editor)
                            <div class="author-links">
                                @if($article->dependency->editor->editor->facebook)
                                    <a target="_blank" href="{{$article->dependency->editor->editor->facebook}}">
                                        <span class="glyph editor-fb"></span>
                                    </a>
                                @endif
                                @if($article->dependency->editor->editor->instagram)
                                    <a target="_blank" href="{{$article->dependency->editor->editor->instagram}}">
                                        <span class="glyph editor-in"></span>
                                    </a>
                                @endif
                                <a target="_blank" href="{{route('ru.editors')}}/#{{$article->dependency->editor->id}}">{{$article->dependency->editor->surname}} {{$article->dependency->editor->name}}</a>
                            </div>
                        @endif
                    </div>
                    @if($article->dependency->editor->editor)
                        <div class="author-specialty">
                            {{$article->dependency->editor->editor->specialty}}
                        </div>
                    @endif
                </div>

                <time datetime="{{$article->updated_at->format('Y-m-d H:i:s')}}" class="last-update">
                    Дата обновления: {{$article->updated_at->format('d')}} {{renderNameOfMonth($article->updated_at->format('M'), 'ru')}} {{$article->updated_at->format('Y')}}
                </time>
            </div>
            <div class="row-drug-presentation">
                <h1 class="drug-title">{{$article->utitle}}</h1>
                <div class="media-double-present">
                    <div class="info-col">
                        @if($article->dependency->image != null)
                            <figure class="media-img">
                                <img src="{{asset('/gallery/' . getCategoryName($article->dependency->image->category_id) . '/large/' . $article->dependency->image->path)}}" alt="{{$article->title}} фото, статья">
                            </figure>
                        @endif
                        @if($article->contentUa->definition && $article->contentUa->definition !== '<p><br></p>')
                            <div class="mp-row-present def" id="definition">
                                <h3 class="title-row">
                                    <span class="icon definition"></span>
                                    Определение:
                                </h3>
                                <div class="info-row" itemprop="articleSection">{!! $article->contentUa->definition !!}</div>
                            </div>
                        @endif

                    </div>
                    <div class="content-col">
                        <div class="navigation">
                            <h2>Зміст</h2>
                            @include('OLEGYERA.FrontBox.MediaZone.Articles.modules.anchors.ua')
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-box">
                @include('OLEGYERA.FrontBox.MediaZone.Articles.modules.official.ua')
            </div>
            <div class="row-drug-accordion">
                <div class="accordion-item open">
                    <h2 class="accordion-title mp-anchor" id="editorsData">
                        Редакция
                        <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        @include('OLEGYERA.FrontBox.MODULES.editors.ua', ['data' =>  $article->dependency, 'is_mobile' => $is_mobile])
                    </div>
                </div>
            </div>
        </section>
        @include('OLEGYERA.FrontBox.MODULES.asides.desktop.ua', ['data' => $article])
    </div>
</div>
