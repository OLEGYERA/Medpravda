{!! Form::open(['url'=>route('landing_block_update_title', ['block_id'=>$block->id, 'title' => $title, 'loc'=>$loc]),
                    'method' => 'post', 'class' => 'form-horizontal add-image-form-title'.$title]) !!}
<div class="wrap__block">
    <h2>Заголовок {{ $title ?? '' }}</h2>
    <div class="two__column">
        <div class="input__group">

            {!! Form::text('title', $block->{'title'.$title}['title'] ?? null,
                            ['placeholder' => 'Название', 'id'=> str_random(7), 'class'=>'form-control title-title'.$title]) !!}
            {{ Form::label('title', 'Название') }}
        </div>

        <div class="input__group">

            {!! Form::text('color', $block->{'title'.$title}['color'] ?? null,
                            ['placeholder' => 'fff777', 'id'=> str_random(7), 'class'=>'form-control color-title'.$title]) !!}
            {{ Form::label('color', 'Цвет (0-9abcdf)') }}
        </div>

        <div class="input__group label-stay">
            {{Form::select('style',
                $fonts,
                $block->{'title'.$title}['style'],
                ['class' => 'custom-select style-title'.$title])
            }}
            <label for="style">Шрифт</label>
        </div>

        <div class="input__group">
            {{ Form::number('size',
                $block->{'title'.$title}['size'] ?? 100,
                ['class' => 'landing-number size-title'.$title])
            }}
            {{ Form::label('size', 'Размер шрифта (0-1000%)') }}
        </div>
    </div>
    {!! Form::button('Сохранить', ['class' => 'btn btn__full add-image','type'=>'submit', 'data-id'=>$block->id, 'data-source'=>'title'.$title]) !!}
</div>
{!! Form::close() !!}