{!! Form::open(['url'=>route('landing_block_update_boolpoint', ['block_id'=>$block->id, 'loc'=>$loc]),
                    'method' => 'post', 'class' => 'form-horizontal add-image-form-boolpoint', 'files'=>true]) !!}
<div class="wrap__block">
    <h2>Бул-поинты</h2>
    <div class="two__column">
        <div>
            <div class="input__group">
                {!! Form::text('color', $block->boolpoint['color']??null,
                                ['placeholder' => 'fff777', 'id'=> str_random(7), 'class'=>'form-control color-boolpoint']) !!}
                {{ Form::label('color', 'Основной цвет (0-9abcdf)') }}
            </div>
            <div class="input__group label-stay">
                {{ Form::selectRange('style',
                    1, 10,
                    $block->boolpoint['style']??null,
                    ['class' => 'custom-select'])
                }}
                {{ Form::label('style', 'Стиль( 1-10 )') }}
            </div>
        </div>
        <div>
            <div class="img img__small"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                <img src="{{$block->getImg('boolpoint')}}" alt="">
                @if($block->getImg('boolpoint')!="/asset/images/mp.png")

                    <button type="button" class="btn btn__red remove-image" title="удалить эту картинку"
                            data-img="{{ $block->id }}" data-src="ua">x
                    </button>

                @endif
            </div>
            <label class="input__file"><!--картинка загузить-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>до 5 Мб</small></span>
                {!! Form::file('img', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>
        </div>
    </div>


    {!! Form::button('Сохранить', ['class' => 'btn btn__full add-image','type'=>'submit', 'data-id'=>$block->id, 'data-source'=>'boolpoint']) !!}
</div>
{!! Form::close() !!}