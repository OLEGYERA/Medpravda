<div class="author-mini-box">
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
    <div class="author-add-row">
        <div class="author-specialty">
            @if($data->creator->editor)
                {{$data->creator->editor->specialty}}
            @endif
        </div>
        <time datetime="{{$last_mod->format('Y-m-d H:i:s')}}" class="last-update">
            <i class="icon-reading_time"></i>Дата обновления: {{$last_mod->format('d')}} {{renderNameOfMonth($last_mod->format('M'), 'ru')}} {{$last_mod->format('Y')}}
        </time>
    </div>
</div>
