<div class="wrap__block">
    <h2>Общее</h2>
    <div class="two__column"><!--две колонки-->
        <div class="input__group">
            {!! Form::text('slug', $model->slug??null,
             ['placeholder'=>'aspirin', 'id'=>'slug', 'class'=>'form-control eng-alias']) !!}
            {{ Form::label('slug', 'URL страницы') }}
        </div>
        <div class="input__group">
            {!! Form::text('backcolor', $model->backcolor??null,
                 ['placeholder'=>'FFF000', 'id'=>'backcolor', 'class'=>'form-control']) !!}
            {{ Form::label('backcolor', 'Фон страницы') }}
        </div>
        <div class="input__group">
            @if(!empty($model->classification))
                {!! Form::text($modelname . '_classification', $model->classification->name,
                 ['placeholder'=>'Классификация', 'id'=>$modelname . '_classification', 'class'=>'form-control autocomplete',
                   'autocomplete'=>'off', 'data-id'=>$model->classification->name]) !!}
                {!! Form::hidden('classification_id', $model->classification->id, ['id'=>'classification_id']) !!}
            @else
                {{ Form::label($modelname . '_classification', 'Классификация') }}
                {!! Form::text($modelname . '_classification', null,
                 ['placeholder'=>'Диетические...', 'id'=>$modelname . '_classification', 'class'=>'form-control autocomplete',
                   'autocomplete'=>'off', 'data-id'=>null]) !!}
                {!! Form::hidden('classification_id', null, ['id'=>'classification_id']) !!}
            @endif
            {{ Form::label($modelname . '_classification', 'Классификация') }}
        </div>
        <div class="input__group">
            {!! Form::text('fabricator', $model->fabricator->title??null,
             ['placeholder'=>'...', 'id'=>'fabricator', 'class'=>'form-control autocomplete',
               'autocomplete'=>'off', 'data-id'=>$model->fabricator->title??null]) !!}
            {{ Form::label('fabricator', 'Производитель') }}
            {!! Form::hidden('fabricator_id', $model->fabricator->id??null, ['id'=>'fabricator_id']) !!}
        </div>
    </div>
    <div class="checkbox__several"><!--этот див если больше одного чекбокса-->
        <div class="input__group info-check label-stay"><!--чекбокс-->
            {{Form::checkbox('approved', true, $model->approved??null, ['class'=>'minimal cosmetics-checkbox', 'id'=>'approve'])}}
            <label for="approve" class="check-box"></label>
            <label for="approve" class="check-text">Опубликовать</label>
        </div>
        <div class="input__group info-check label-stay"><!--чекбокс-->
            {{Form::checkbox('certified', true, $model->certified??null, ['class'=>'minimal cosmetics-checkbox', 'id'=>'certified'])}}
            <label for="certified" class="check-box"></label>
            <label for="certified" class="check-text">Сертифицирован</label>
        </div>
    </div>
</div>
