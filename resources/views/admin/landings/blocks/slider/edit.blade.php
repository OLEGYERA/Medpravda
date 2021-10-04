<div class="breadcrumb">
    <a href="{{ route('landing_block_edit', ['block_id'=>$slide->block->id, 'loc'=>$loc]) }}">Назад</a>
    <span>Редактирование слайда</span>
</div>

{{ Form::open(['url'=>route('landing_block_update_slider', ['slide_id'=>$slide->id, 'loc' => $loc]),
                    'class' => 'form-horizontal', 'method'=>'post', 'files'=>true
            ]) }}

<div class="wrap__block"> <!--белый блок-->
    <h2>Редактирование слайда</h2>
    <div class="two__column">
        <div>
            <div class="input__group">
                {{ Form::text('title', $slide->title??null, ['placeholder'=>'title', 'class'=>'form-control']) }}
                {{ Form::label('title', 'title (до 255 символов)') }}
            </div>
            <div class="input__group">
                {{ Form::text('alt', $slide->alt??null, ['placeholder'=>'alt', 'class'=>'form-control']) }}
                {{ Form::label('alt', 'alt (до 255 символов)') }}
            </div>
            <div class="input__group">
                {{ Form::text('video', $slide->video??null, ['placeholder'=>'video', 'class'=>'form-control']) }}
                {{ Form::label('video', 'Youtube id (до 255 символов)') }}
            </div>

            <div class="input__group label-stay">
                {{ Form::selectRange('position', 1, 100, $slide->position??null, ['class'=>'custom-select']) }}
                {{ Form::label('position', 'Позиция (1-100)') }}
            </div>
            <div class="input__group">


                {{ Form::number('text_size',
                    $slide->text_size ?? 100,
                    ['class' => 'landing-number'])
                }}
                {{ Form::label('text_size', 'Размер шрифта') }}
                <span class="help-block">(0-1000)%</span>
            </div>
            <div class="input__group">
                {!! Form::text('color', $slide->color??null,
                                ['placeholder' => 'fff777', 'id'=> str_random(7), 'class'=>'form-control']) !!}
                {{ Form::label('color', 'Цвет текста (0-9abcdf)') }}
            </div>
        </div>
        <div>
            <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                <img src="{{$slide->getImg()}}" alt="">
                @if(!empty($slide->getImg()))

                    <button type="button" class="btn btn__red remove-image" title="удалить эту картинку"
                            data-img="{{ $slide->id }}" data-src="ua">x
                    </button>

                @endif
            </div>
            <label class="input__file"><!--картинка загузить-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>340х240 px</small></span>
                {!! Form::file('img', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>
        </div>
    </div>


    <h3>Вставка текста</h3>
    {!! Form::textarea('description', $slide->description??null,
                    ['placeholder' => 'Описание',
                     'class'=>'form-control']) !!}
    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
    {{ Form::close() }}
</div>