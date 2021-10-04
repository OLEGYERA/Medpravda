{!! Form::open(['url'=>route('landing.button', $model->id),
                    'method' => 'post', 'class' => 'form-horizontal add-image-form-button']) !!}
<div class="wrap__block">
    <h2>Кнопки</h2>
    <div class="input__group">
        {!! Form::text('color', $model->button['color'] ?? null,
                        ['placeholder' => 'fff777', 'id'=> str_random(7), 'class'=>'form-control color-button']) !!}
        {{ Form::label('color', 'Основной цвет ( 0-9abcdf )') }}
        <span class="help-block">Цвет по умолчанию </span>
    </div>
    <div class="input__group label-stay"><!--выпадающий список-->
        {{ Form::selectRange('style',
            1, 100,
            $model->button['style'],
            ['class' => 'custom-select'])
        }}
        {{ Form::label('style', 'Основной стиль ( 1-100 )') }}
    </div>
    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit', 'data-id'=>$model->id, 'data-source'=>'button']) !!}
    {!! Form::close() !!}
</div>