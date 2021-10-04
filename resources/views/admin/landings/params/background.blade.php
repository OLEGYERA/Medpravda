{!! Form::open(['url'=>route('landing.background', $model->id),
                    'method' => 'post', 'class' => 'form-horizontal add-image-form-background', 'files'=>true]) !!}
<div class="wrap__block">
    <h2>Заливка</h2>
    <div class="two__column">
        <div>
            <div class="input__group">
                {!! Form::text('color', $model->background['color'] ?? null,
                                ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control color-background']) !!}
                {{ Form::label('color', 'Основной цвет( 0-9abcdf )') }}
            </div>

            <div class="input__group">
                {!! Form::text('secondarycolor', $model->background['secondarycolor'] ?? null,
                                ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control secondarycolor-background']) !!}
                {{ Form::label('secondarycolor', 'Дополнительный цвет( 0-9abcdf )') }}
            </div>
        </div>
        <div>
            <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                <img src="{{$model->getImg('background')}}" alt="">
                @if($model->getImg('background')!="/asset/images/mp.png")
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
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>~1900x830(инфо отступ 100px слева/справа)</small></span>
                {!! Form::file('path', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label></div>
    </div>

    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit', 'data-id'=>$model->id, 'data-source'=>'background']) !!}
    {!! Form::close() !!}
</div>