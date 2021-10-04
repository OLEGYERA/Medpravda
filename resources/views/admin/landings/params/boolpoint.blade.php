{!! Form::open(['url'=>route('landing.boolpoint', $model->id),
                    'method' => 'post', 'class' => 'form-horizontal add-image-form-boolpoint', 'files'=>true]) !!}
<div class="wrap__block">
    <h2>Бул-поинты</h2>
    <div class="two__column">
        <div> <div class="input__group">
                {!! Form::text('color', $model->boolpoint['color'] ?? null,
                           ['placeholder' => 'fff777', 'id'=> str_random(7), 'class'=>'form-control color-boolpoint']) !!}
                {{ Form::label('color', 'Основной цвет. Цвет по умолчанию (0-9abcdf)') }}
            </div>
            <div class="input__group label-stay"><!--выпадающий список-->
                {{ Form::selectRange('style',
                         1, 10,
                         $model->boolpoint['style'],
                         ['class' => 'custom-select sources', 'style' => 'display: none'])
                     }}
                {{ Form::label('style', 'Основной стиль (1-10)') }}
            </div></div>
        <div> <div class="img img__small"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                <img src="{{$model->getImg('boolpoint')}}" alt="">
                @if($model->boolpoint["path"])
                    <button class="btn btn__red"
                            data-url="{{route('landing-block.remove-img-db')}}"
                            data-source="boolpoint"
                            data-id="{{$model->id}}"
                            data-model="Landing">
                        x
                    </button>
                @endif
            </div>

            <label class="input__file"><!--картинка загузить-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>до 5 Мб</small></span>
                {!! Form::file('img', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>
        </div>
    </div>
    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit', 'data-id'=>$model->id, 'data-source'=>'boolpoint']) !!}
    {!! Form::close() !!}
</div>