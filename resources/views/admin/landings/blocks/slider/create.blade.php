<div class="breadcrumb">
    <a href="{{ route('landing_block_edit', ['block_id'=>$block->id, 'loc'=>$loc]) }}">Назад</a>

    <span>Добавление слайда</span>
</div>

{{ Form::open(['url'=>route('landing_block_add_slider', ['block_id'=>$block->id, 'loc' => $loc]),
                    'class' => 'form-horizontal block-slider', 'method'=>'post', 'files'=>true
            ]) }}

<div class="wrap__block">
    <h2>Добавление слайда</h2>
    <div class="two__column">
        <div class="input__group">
            {{ Form::text('title', null, ['placeholder'=>'title', 'class'=>'form-control']) }}
            {{ Form::label('title', 'title (до 255 символов)') }}
        </div>
        <div class="input__group">
            {{ Form::text('alt', null, ['placeholder'=>'alt', 'class'=>'form-control']) }}
            {{ Form::label('alt', 'alt (до 255 символов)') }}
        </div>
        <div class="input__group">
            {{ Form::text('video', null, ['placeholder'=>'video', 'class'=>'form-control']) }}
            {{ Form::label('video', 'Youtube id(до 255 символов)') }}
        </div>
        <div class="input__group label-stay">
            {{ Form::selectRange('position', 1, 100, null, ['class'=>'custom-select']) }}
            {{ Form::label('position', 'Позиция (1-100)') }}
        </div>
        <div class="input__group">
            {!! Form::text('color', null,
                            ['placeholder' => 'fff777', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('color', 'Цвет текста (0-9abcdf)') }}
        </div>
        <div>
            <label class="input__file"><!--картинка загузить-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>до 5 Мб</small></span>
                {!! Form::file('img', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>
        </div>
    </div>


    <h3>Вставка текста</h3>
    {!! Form::textarea('description', null,
                    ['placeholder' => 'Описание', 'id'=> str_random(7),
                     'class'=>'form-control',
                     'style'=>'width : 100%']) !!}
    {!! Form::button('Добавить', ['class' => 'btn btn__full','type'=>'submit']) !!}
</div>
{{ Form::close() }}