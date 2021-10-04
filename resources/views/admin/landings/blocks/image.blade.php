{!! Form::open(['url'=>route('landing_block_update_image', ['block_id'=>$block->id, 'loc'=>$loc]),
                    'method' => 'post', 'class' => 'form-horizontal add-image-form-image', 'files'=>true]) !!}
<div class="wrap__block">
<h2>Изображение</h2>
    <div class="two__column">
        <div>
            <div class="input__group">

                {!! Form::text('title', $block->image['title'] ?? null,
                                ['placeholder' => 'title', 'id'=> str_random(7), 'class'=>'form-control title-image']) !!}
                {{ Form::label('title', 'title (до 255 символов)') }}
            </div>
            <div class="input__group">

                {!! Form::text('alt', $block->image['alt'] ?? null,
                                ['placeholder' => 'alt', 'id'=> str_random(7), 'class'=>'form-control alt-image']) !!}
                {{ Form::label('alt', 'alt (до 255 символов)') }}
            </div>
        </div>
        <div>
            <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                <img src="{{$block->getImg('image')}}" alt="">
                @if(!empty($block->getImg('image')))

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

    {!! Form::button('Сохранить', ['class' => 'btn btn__full add-image','type'=>'submit', 'data-id'=>$block->id, 'data-source'=>'image']) !!}
</div>
{!! Form::close() !!}