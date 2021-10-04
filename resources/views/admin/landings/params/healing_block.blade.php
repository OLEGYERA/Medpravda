{!! Form::open(['url'=>route('landing.healing', $model->id),
                    'method' => 'post', 'class' => 'form-horizontal add-image-form-background', 'files'=>true]) !!}
<div class="wrap__block">
    <h2>Блок "Самолечение"</h2>

    <div class="input__group info-check label-stay"><!--чекбокс-->
        <input type="checkbox" {{ !empty($model->healing['confirmed']) ? 'checked' : ''}} value="1"
               name="healing[confirmed]" id="approve1">
        <label for="approve1" class="check-box"></label>
        <label for="approve1" class="check-text">Отобразить блок \ Скрыть блок</label>
    </div>

    <div class="input__group">
        {!! Form::text('healing[color]',  $model->healing["color"] ?? null,
                        ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control color-background']) !!}
        {{ Form::label('healing[color]', 'Основной цвет (0-9abcdf)') }}
    </div>
    <div class="input__group">
        {!! Form::text('healing[color_text]', $model->healing["color_text"] ?? null,
                        ['placeholder' => 'fff777', 'id'=> str_random(7), 'class'=>'form-control color-text']) !!}
        {{ Form::label('healing[color_text]', 'Цвет (0-9abcdf)') }}
    </div>
    <div class="input__group">
        {!! Form::text('healing[text]', $model->healing["text"] ?? null,
                        ['placeholder' => 'Текст', 'id'=>'description-text']) !!}
        {{ Form::label('healing[text]', 'Описание (до 255 символов)') }}
    </div>
    {{--TODO подключить к сайту  .minzdrav__text span--}}
    <div class="input__group">
        {!! Form::text('healing[small_text]', $model->healing["small_text"] ?? null,
                        ['placeholder' => 'Текст', 'id'=>'description-text-small']) !!}
        {{ Form::label('healing[small_text]', 'Мелкое описание') }}
    </div>

    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit', 'data-id'=>$model->id, 'data-source'=>'healing']) !!}
    {!! Form::close() !!}
</div>