<div class="breadcrumb">
    <span>Редактирование витрины препаратов</span>
</div>

@include('admin.main.nav')

@if(!empty($cats))
    <div class="two__column">
        @foreach($cats as $cat)
            <div class="wrap__block">
                <h2>Блок № {{ $loop->iteration .': '. $cat->title }}</h2>
                {!! Form::open(['url'=>route('medicine_cats', $cat->id),
                                'method'=>'post', 'class' => 'form-topc', 'files'=>true]) !!}

                <div class="two__column">
                    <div class="input__group">
                        <input placeholder="Аллергия" id="title" name="title" type="text"
                               value="{{ $cat->title or '' }}" class="form-control">
                        {!! Form::label('Заголовок RU') !!}
                    </div>
                    <div class="input__group">
                        <input placeholder="Аллергия" id="utitle" name="utitle" type="text"
                               value="{{ $cat->utitle or '' }}" class="form-control">
                        {!! Form::label('Заголовок UA') !!}
                    </div>

                <div class="input__group">
                    <input placeholder="meradazol" id="alias1" name="alias1" type="text"
                           value="{{ $cat->alias1 or '' }}" class="form-control">
                    {!! Form::label('URL препарата №1') !!}
                </div>
                <div class="input__group">
                    <input placeholder="meradazol" id="alias2" name="alias2" type="text"
                           value="{{ $cat->alias2 or '' }}" class="form-control">
                    {!! Form::label('URL препарата №2') !!}
                </div>
                </div>
                <div class="input__group">
                    <input placeholder="meradazol" id="alias3" name="alias3" type="text"
                           value="{{ $cat->alias3 or '' }}" class="form-control">
                    {!! Form::label('URL препарата №3') !!}
                </div>

                {{--Image--}}
                <h4>Параметры картинки</h4>
                <div class="two__column">
                    <div class="input__group">
                        {!! Form::text('alt', $cat->alt ?? '',
                            ['placeholder'=>'Alt', 'id'=>'alt', 'class'=>'form-control']) !!}
                        {{ Form::label('alt', 'Alt') }}
                    </div>
                    <div class="input__group">
                        {!! Form::text('imgtitle', $cat->imgtitle ?? '',
                            ['placeholder'=>'imgtitle', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
                        {{ Form::label('imgtitle', 'Title') }}
                    </div>
                </div>
                @if(!empty($cat->path))
                    <div class="img__small">
                        {{ Html::image(asset('/asset/images/showcase/').'/'.$cat->path, 'a picture', array('class' => 'thumb')) }}
                    </div>
                @endif


                <label class="input__file"><!--картинка-->
                    <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(65x65px)</small></span>
                    {!! Form::file('img', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
                </label>

                {{--Image--}}
                <div>
                    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        @endforeach
    </div>
@endif