{!! Form::open(['url'=>route('landing_block_update_custom', ['block_id'=>$block->id, 'loc'=>$loc]),
                    'method' => 'post', 'class' => 'form-horizontal add-image-form-custom']) !!}
<div class="wrap__block">
    <h2>Дополнительно(Карта)</h2>
    <div class="input__group">
        {!! Form::text('longitude', $block->custom['longitude']??null,
                        ['placeholder' => '50.2525254', 'id'=> str_random(7), 'class'=>'form-control longitude-custom']) !!}
        {{ Form::label('longitude', 'Долгота (до 10 символов)') }}
    </div>
    <div class="input__group">
        {!! Form::text('latitude', $block->custom['latitude']??null,
                        ['placeholder' => '50.2525254', 'id'=> str_random(7), 'class'=>'form-control latitude-custom']) !!}
        {{ Form::label('latitude', 'Широта (до 10 символов)') }}
    </div>

{!! Form::button('Сохранить', ['class' => 'btn btn__full add-image','type'=>'submit', 'data-id'=>$block->id, 'data-source'=>'custom']) !!}
</div>
{!! Form::close() !!}