{!! Form::open(['url'=>route('landing.update', $model->id),
                    'method' => 'put', 'class' => 'form-horizontal']) !!}
<div class="wrap__block">
    <h2>Основные параметры</h2>
    <div class="input__group">
        {!! Form::text('title', $model->title ?? null,
                        ['placeholder' => 'Название Лендинга', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
        {{ Form::label('title', 'Название') }}
    </div>
    <div class="input__group">
        {!! Form::text('slug', $model->slug ?? null , ['placeholder'=>'nazvanie', 'id'=>'slug', 'class'=>'form-control eng-alias']) !!}
        {{ Form::label('slug', 'URL страницы') }}
    </div>
    <div class="input__group label-stay"><!--выпадающий список-->
        {{Form::select('font_family',
            $fonts,
            $model->font_family,
             ['class' => 'custom-select sources', 'style' => 'display: none'])
        }}
        {{ Form::label('param', 'Основной шрифт') }}
    </div>
    <div class="checkbox__several"><!--этот див если больше одного чекбокса-->
        <div class="input__group info-check label-stay"><!--чекбокс-->
            <input type="checkbox" {{$model->approved ? 'checked' : ''}} value="1"
                   name="confirmed" id="approve{{$model->iteration}}">
            <label for="approve{{$model->iteration}}" class="check-box"></label>
            <label for="approve{{$model->iteration}}" class="check-text">Опубликовать</label>
        </div>
        <div class="input__group info-check label-stay"><!--чекбокс-->
            <input type="checkbox" {{$model->modal ? 'checked' : ''}} value="1"
                   name="modal" id="modal">
            <label for="modal" class="check-box"></label>
            <label for="modal" class="check-text">Окно приветствия</label>
        </div>
        <div class="input__group info-check label-stay"><!--чекбокс-->
            <input type="checkbox" {{$model->full_screen ? 'checked' : ''}} value="1"
                   name="full_screen" id="full_screen">
            <label for="full_screen" class="check-box"></label>
            <label for="full_screen" class="check-text">Full screen</label>
        </div>
    </div>


    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
    {!! Form::close() !!}
</div>


<div class="wrap__block">
    <div class="two__column"><!--две колонки-->
        <div>
            <h2 class="panel-title">Блоки</h2>
        </div>
        <div>
            <a href="{{ route('landing_block_create', ['landing'=>$model->id, 'loc'=>$loc]) }}"
               class="btn btn__full">Создать блок</a>
        </div>
    </div>
    @include('admin.landings.params.blocks')
</div>

