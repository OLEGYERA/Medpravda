<div class="editor-box"
     itemprop="publisher" itemscope="" itemtype="http://schema.org/Organization">
    <div class="main-editor-row">
        <div class="main-editor-img">
            <figure class="avatar">
                <img src="{{asset('/gallery/' . getCategoryName($data->creator->avatar->category_id) . '/medium/' . $data->creator->avatar->path)}}" alt="{{$data->creator->avatar->alt}}">
            </figure>
        </div>
        <div class="main-editor-data">
            <div class="main-editor-info">
                <div class="editor-name">
                    Автор: {{$data->creator->surname}} {{$data->creator->name}} {{$data->creator->middle_name}}
                </div>
                @if($data->creator->editor)
                    <div class="editor-links">
                        @if($data->creator->editor->facebook)
                            <a target="_blank" href="{{$data->creator->editor->facebook}}">
                                <span class="glyph editor-fb"></span>
                            </a>
                        @endif
                        @if($data->creator->editor->instagram)
                            <a target="_blank" href="{{$data->creator->editor->instagram}}">
                                <span class="glyph editor-in"></span>
                            </a>
                        @endif
                        <a target="_blank" href="{{route('ru.editors')}}/#{{$data->creator->id}}">{{$data->creator->surname}} {{$data->creator->name}}</a>
                    </div>
                    <div class="editor-specialty">
                        {{$data->creator->editor->specialty}}
                    </div>
                    <div class="editor-specialization">
                        {{$data->creator->editor->specialization}}
                    </div>
                    <div class="editor-rank">
                        @switch($data->creator->editor->rank_id)
                            @case(2)
                            Кандидат медицинских наук
                            @break
                            @case(3)
                            Доктор медицинских наук
                            @break
                        @endswitch
                    </div>
                    @if($data->creator->editor->education)
                        <div class="editor-education">
                            {!! $data->creator->editor->education !!}
                        </div>
                    @endif
                @endif
            </div>
            <div class="relocate-to-editor">
                <a href="{{route('ru.editors')}}/#{{$data->creator->id}}" class="under-title">Подробнее</a>
                <link itemprop="sameAs" href="{{ route('ru.editors')}}/#{{$data->creator->id}}" />
                <link itemprop="url" href="{{route('ru.editors')}}">
                <meta itemprop="name" content="Medpravda">
                <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                    <link itemprop="image" href="{{asset('img/FrontBox/Logo/ru.svg')}}"/>
                    <link itemprop="url" href="{{asset('img/FrontBox/social_networks/mp.png')}}"/>
                </div>
            </div>
        </div>
    </div>
    <div class="editors-col">

    </div>
</div>
