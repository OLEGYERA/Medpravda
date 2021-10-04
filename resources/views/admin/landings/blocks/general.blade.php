{{ Form::open(['url'=>route('landing_block_update',
                ['block_id' => $block->id, 'loc' => $loc])],
                 ['method'=>'post', 'class' => 'form-horizontal']
                 ) }}
<div class="wrap__block">
    <h2>Основные параметры</h2>
    <div class="input__group">
        {{ Form::text('title', $block->title??null, ['class'=>'form-control', 'placeholder' => 'Название Блока',]) }}
        {{ Form::label('title', 'Название (до 255 символов)') }}
    </div>
    <div class="input__group label-stay">
        {{ Form::selectRange('source', 1, 11, $block->source??null, ['class'=>'custom-select']) }}
        {{ Form::label('source', 'Тип блока (1-11)') }}
    </div>
    <div class="input__group label-stay">

        {{ Form::selectRange('position', 1, 100, $block->position??null, ['class'=>'custom-select']) }}
        {{ Form::label('position', 'Позиция (1-100)') }}
    </div>
    <div class="checkbox__several"><!--этот див если больше одного чекбокса-->
        <div class="input__group info-check label-stay"><!--чекбокс-->
            <input type="checkbox" {{ (old('approved') || !empty($block->approved)) ? 'checked' : ''}} value="1"
                   name="approved" id="approve{{$block->iteration}}">
            <label for="approve" class="check-box"></label>
            <label for="approve{{$block->iteration}}" class="check-text">Отобразить блок \ Скрыть блок</label>
        </div>
        <div class="input__group info-check label-stay"><!--чекбокс-->
            <input type="checkbox" {{ (old('banner') || !empty($block->banner)) ? 'checked' : ''}} value="1"
                   name="banner" id="banner">
            <label for="banner" class="check-box"></label>
            <label for="banner" class="check-text">Показать баннер в данном блоке \ Скрыть</label>
        </div>
    </div>

    <div>
        {{ Form::submit('Сохранить', ['class'=>'btn btn__full']) }}
    </div>
</div>
{{ Form::close() }}