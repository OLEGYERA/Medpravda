{!! Form::open(['url'=>route('landing_block_update_script', ['block_id'=>$block->id, 'loc'=>$loc]),
'method' => 'post', 'class' => 'form-horizontal add-image-form-script']) !!}
<div class="wrap__block">
    <h2 class="help-block">Скрипт</h2>
    <div class="input__group"><!--обычный инпут-->
        {!! Form::textarea('script', $block->script ?? null,
                        ['placeholder' => 'Скрипт', 'class'=>'form-control script-script']) !!}
    </div>

    {!! Form::button('Сохранить', ['class' => 'btn btn__full add-image','type'=>'submit', 'data-id'=>$block->id, 'data-source'=>'script']) !!}
</div>
{!! Form::close() !!}