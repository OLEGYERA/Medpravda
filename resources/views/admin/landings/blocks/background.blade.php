{!! Form::open(['url'=>route('landing_block_update_background', ['block_id'=>$block->id, 'loc'=>$loc]),
                    'method' => 'post', 'class' => 'form-horizontal add-image-form-background', 'files'=>true]) !!}
<div class="wrap__block">
    <h2>Заливка</h2>
    <div class="two__column">
        <div>
            <div class="input__group">
                {!! Form::text('color', $block->background['color'] ?? null,
                                ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control color-background']) !!}
                {{ Form::label('color', 'Основной цвет (0-9abcdf)') }}
            </div>

            <div class="input__group">
                {!! Form::text('secondarycolor', $block->background['secondarycolor'] ?? null,
                                ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control secondarycolor-background']) !!}
                {{ Form::label('secondarycolor', 'Дополнительный цвет (0-9abcdf)') }}
            </div>
        </div>
        <div>
            <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                <img src="{{$block->getImg('background')}}" alt="">

                @if($block->getImg('background')!="/asset/images/mp.png")

                    <button type="button" class="btn btn__red remove-image" title="удалить эту картинку"
                            data-img="{{ $block->id }}" data-src="ua">x
                    </button>

                @endif
            </div>
            <label class="input__file"><!--картинка загузить-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>~1900x830(инфо отступ 100px слева/справа)</small></span>
                {!! Form::file('path', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>
        </div>
    </div>
    {!! Form::button('Сохранить', ['class' => 'btn btn__full add-image','type'=>'submit', 'data-id'=>$block->id, 'data-source'=>'background']) !!}
</div>
{!! Form::close() !!}