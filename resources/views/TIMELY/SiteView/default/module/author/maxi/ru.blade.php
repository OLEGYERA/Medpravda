<div class="author-maxi-box">
    <figure class="author-image">
        <img src="{{asset('/gallery/' . getCategoryName($data->creator->avatar->category_id) . '/medium/' . $data->creator->avatar->path)}}" alt="{{$data->creator->avatar->alt}}">
    </figure>
    <div class="detail-information">
        <div class="author-basic-row">
            <span class="author-fio">
                Автор: {{$data->creator->surname}} {{$data->creator->name}} {{$data->creator->middle_name}}
            </span>
                <span class="author-soc">
                @if($data->creator->editor->facebook)
                        <a target="_blank" href="{{$data->creator->editor->facebook}}">
                        <span class="icon-facebook"></span>
                    </a>
                    @endif
                    @if($data->creator->editor->instagram)
                        <a target="_blank" href="{{$data->creator->editor->instagram}}">
                        <span class="icon-instagram"></span>
                    </a>
                    @endif
            </span>
        </div>
        <div class="author-specialty">
            {{$data->creator->editor->specialty}}@if($data->creator->editor->specialization != null), {{$data->creator->editor->specialization}}@endif
        </div>
        <div class="author-rank">
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
            <h4 class="education-title">Образование:</h4>
            <div class="author-education">
                {!! $data->creator->editor->education !!}
            </div>
        @endif

        <a href="#" class="go-to-author mp-btn">Подробнее</a>
    </div>
</div>
