{!! Form::open(['url'=>route('landing_block_update_description', ['block_id'=>$block->id, 'description' => $description, 'loc'=>$loc]),
                    'method' => 'post', 'class' => 'form-horizontal add-image-form-description'.$description]) !!}
<div class="wrap__block">
    <h2>Описание {{ $description ?? '' }}</h2>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('table', $block->{'description'.$description}['table'] ?? null,
                            ['placeholder' => 'fff777', 'id'=> str_random(7), 'class'=>'form-control table-description'.$description]) !!}
            {{ Form::label('table', 'Цвет таблицы (0-9abcdf)') }}
        </div>

        <div class="input__group">
            {!! Form::text('color', $block->{'description'.$description}['color'] ?? null,
                            ['placeholder' => 'fff777', 'id'=> str_random(7), 'class'=>'form-control color-description'.$description]) !!}
            {{ Form::label('color', 'Цвет текста (0-9abcdf)') }}
        </div>

        <div class="input__group label-stay">
            {{Form::select('style',
                $fonts,
                $block->{'description'.$description}['style'],
                ['class' => 'custom-select style-description'.$description])
            }}
            <label for="style">Шрифт</label>
        </div>
        <div class="input__group">

            {{ Form::number('size',
                $block->{'description'.$description}['size'] ?? 100,
                ['class' => 'landing-number size-description'.$description])
            }}
            {{ Form::label('size', 'Размер шрифта (0-1000%)') }}
        </div>
    </div>
    <div>
        <h3>Контент</h3>
        {!! Form::textarea('contents', $block->{'description'.$description}['contents'] ?? null,
                        ['placeholder' => 'Контент', 'id'=> str_random(7),
                         'class'=>'form-control editor contents-description'.$description]) !!}
    </div>
    {!! Form::button('Сохранить', [
            'class' => 'btn btn__full add-image',
            'type'=>'submit',
            'data-id'=>$block->id,
            'data-source'=>'description'.$description
            ]) !!}
</div>
{!! Form::close() !!}