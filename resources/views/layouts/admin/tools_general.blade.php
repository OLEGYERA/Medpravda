<div class="wrap__block">
    <h2>Общее</h2>

    <div class="input__group">
        {!! Form::text('slug', null,
         ['placeholder'=>'aspirin', 'id'=>'slug', 'class'=>'form-control eng-alias']) !!}
        {{ Form::label('slug', 'URL страницы') }}
    </div>

    <div class="input__group">
        #{!! Form::text('backcolor', null,
                         ['placeholder'=>'FFF000', 'id'=>'backcolor', 'class'=>'form-control']) !!}
        {{ Form::label('backcolor', 'Фон страницы') }}
    </div>

    <div class="checkbox__several"><!--этот див если больше одного чекбокса-->
        <div class="input__group info-check label-stay"><!--чекбокс-->
            <input type="checkbox" {{ old('approved') ? 'checked' : '' }} value="1"
                   name="confirmed" id="approve1">
            <label for="approve1" class="check-box"></label>
            <label for="approve1" class="check-text">Опубликовать</label>
        </div>
        <div class="input__group info-check label-stay"><!--чекбокс-->
            <input type="checkbox" {{ old('certified') ? 'checked' : '' }} value="1"
                   name="confirmed" id="certified2">
            <label for="certified2" class="check-box"></label>
            <label for="certified2" class="check-text">Сертифицирован</label>
        </div>
    </div>

    <div class="input__group">
        {!! Form::text($modelname . '_classification', null,
         ['placeholder'=>'Диетические...', 'id'=>$modelname . '_classification', 'class'=>'form-control autocomplete',
           'autocomplete'=>'off', 'data-id'=>null]) !!}
        {{ Form::label($modelname . '_classification', 'Классификация') }}
        {!! Form::hidden('classification_id', null, ['id'=>'classification_id']) !!}
    </div>

    <div class="input__group">
        {!! Form::text('fabricator', old('fabricator') ? : '',
         ['placeholder'=>'...', 'id'=>'fabricator', 'class'=>'form-control autocomplete',
           'autocomplete'=>'off', 'data-id'=>1000]) !!}
        {{ Form::label('fabricator', 'Производитель') }}
        {!! Form::hidden('fabricator_id', old('fabricator_id') ? : '', ['id'=>'fabricator_id']) !!}
    </div>
</div>