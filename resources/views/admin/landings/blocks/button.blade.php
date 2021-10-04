{!! Form::open(['url'=>route('landing_block_update_button', ['block_id'=>$block->id, 'button' => $button, 'loc'=>$loc]),
                   'method' => 'post', 'class' => 'form-horizontal add-image-form-button'.$button]) !!}
<div class="wrap__block">
    <h2>Кнопка {{ $button ?? '' }}</h2>
    <div class="two__column"><!--две колонки-->
        <div class="input__group">
            {!! Form::text('title', $block->{'button'.$button}['title'] ?? null,
                            ['placeholder' => 'Название', 'id'=> str_random(7), 'class'=>'form-control title-button'.$button]) !!}
            {{ Form::label('title', 'Название') }}
        </div>
        <div class="input__group">
            {!! Form::text('link', $block->{'button'.$button}['link'] ?? null,
                            ['placeholder' => 'Url', 'id'=> str_random(7), 'class'=>'form-control link-button'.$button]) !!}
            {{ Form::label('link', 'Url') }}
        </div>
        <div class="input__group">
            {!! Form::text('color', $block->{'button'.$button}['color'] ?? null,
                            ['placeholder' => 'fff777', 'id'=> str_random(7), 'class'=>'form-control color-button'.$button]) !!}
            {{ Form::label('color', 'Цвет (0-9abcdf)') }}
        </div>
        <div class="input__group">
            {!! Form::text('background', $block->{'button'.$button}['background'] ?? null,
                            ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control background-button'.$button ]) !!}
            {{ Form::label('background', 'Цвет кнопки (0-9abcdf)') }}
        </div>
    </div>
    <div class="input__group label-stay">
        {{ Form::selectRange('style',
            1, 10,
            $block->{'button'.$button}['style'],
            ['class' => 'custom-select'])
        }}
        <label for="style">Стиль( 1-10 )</label>
    </div>

    {!! Form::button('Сохранить', ['class' => 'btn btn__full add-image','type'=>'submit', 'data-id'=>$block->id, 'data-source'=>'button'.$button]) !!}

    {!! Form::close() !!}
</div>