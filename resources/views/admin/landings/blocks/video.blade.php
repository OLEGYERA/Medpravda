{!! Form::open(['url'=>route('landing_block_update_video', ['block_id'=>$block->id, 'loc'=>$loc]),
                    'method' => 'post', 'class' => 'form-horizontal add-image-form-video']) !!}
<div class="wrap__block">
    <h2>Видео</h2>
    <div class="input__group">

        {!! Form::text('video', $block->video ?? null,
                        ['placeholder' => '2yU5CMti5S8', 'id'=> str_random(7), 'class'=>'form-control video-video']) !!}
        {{ Form::label('video', 'Youtube id (до 255 символов)') }}
    </div>


    {!! Form::button('Сохранить', ['class' => 'btn btn__full add-image','type'=>'submit', 'data-id'=>$block->id, 'data-source'=>'video']) !!}
</div>
{!! Form::close() !!}