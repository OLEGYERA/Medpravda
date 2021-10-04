<div class="wrap__block"> <!--белый блок-->
    <h2>Лого</h2>
    {!! Form::open(['url'=>route('landing.logo', $model->id),
                        'method' => 'post', 'class' => '', 'files'=>true]) !!}
    <div class="two__column">
        <div>
            <div class="input__group">
                {!! Form::text('link', $model->logo['link'] ?? null,
                            ['placeholder' => 'http://example.com', 'id'=> str_random(7), 'class'=>'form-control logo-link']) !!}
                {{ Form::label('link', 'Ссылка') }}
            </div>

        </div>
        <div>
            <div class="img img__medium"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                <img src="{{$model->getLogo()}}" alt="" class="img-thumbnail landing">
                @if($model->getLogo()!="/asset/images/mp.png")

                    <button type="button" class="btn btn__red remove-image" title="удалить эту картинку"
                            data-img="{{ $model->id }}" data-src="ua">x
                    </button>

                @endif
            </div>
            <label class="input__file"><!--картинка загузить-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>до 5 Мб</small></span>
                {!! Form::file('path', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>
        </div>
    </div>

    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit', 'data-id'=>$model->id, 'data-source'=>'logo']) !!}
    {!! Form::close() !!}
</div>
