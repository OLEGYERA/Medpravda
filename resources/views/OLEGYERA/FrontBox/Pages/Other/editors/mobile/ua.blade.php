<div class="full-content">
    <div class="page-content">
        <h1 class="pointer page-title">Редакторська Група</h1>
        <div class="row-editors">
            @foreach($users as $user)
                <article class="editor-box" id="{{$user->id}}">
                    <div class="editor-img">
                        <figure class="avatar">
                            <img src="{{asset('/gallery/' . getCategoryName($user->avatar->category_id) . '/large/' . $user->avatar->path)}}" alt="{{$user->avatar->alt}}">
                        </figure>
                    </div>
                    <div class="editor-data">
                        <h2 class="editor-name">
                            Автор: {{$user->surname}} {{$user->name}} {{$user->middle_name}}
                            @if($user->editor->facebook)
                                <a target="_blank" href="{{$user->editor->facebook}}">
                                    <span class="glyph editor-fb"></span>
                                </a>
                            @endif
                            @if($user->editor->instagram)
                                <a target="_blank" href="{{$user->editor->instagram}}">
                                    <span class="glyph editor-in"></span>
                                </a>
                            @endif
                        </h2>
                        @if($user->editor->specialty)
                            <h3 class="editor-specialty">
                                {{$user->editor->specialty}}
                            </h3>
                        @endif
                        @if($user->editor->specialization)
                            <div class="editor-specialization">
                                Спеціалізація - {{$user->editor->specialization}}
                            </div>
                        @endif
                        @switch($user->editor->rank_id)
                            @case(2)
                            <div class="editor-rank">
                                Кандидат медичних наук
                            </div>
                            @break
                            @case(3)
                            <div class="editor-rank">
                                Доктор медичних наук
                            </div>
                            @break
                        @endswitch
                        <div class="editor-location">
                            {{$user->country}}, {{$user->city}}
                        </div>
                        @if(count($user->editor->diploms) != null)
                            <div class="editor-diploms">
                                <div class="diplom-title">
                                    Освіта:
                                </div>
                                <div class="diplom-gallery">
                                    @foreach($user->editor->diploms as $diplom)
                                        <a href="{{asset('/gallery/' . getCategoryName($diplom->photo->category_id) . '/large/' . $diplom->photo->path)}}" target="_blank" class="diplom-link">
                                            <figure class="diplom">
                                                <img src="{{asset('/gallery/' . getCategoryName($diplom->photo->category_id) . '/small/' . $diplom->photo->path)}}" alt="{{$diplom->photo->alt}}">
                                            </figure>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if($user->editor->education)
                            <div class="editor-education">
                                {!! $user->editor->education !!}
                            </div>
                        @endif
                        @if($user->editor->experience)
                            <div class="editor-experience">
                                Стаж: {{ $user->editor->experience }} роки(-ів)
                            </div>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</div>
