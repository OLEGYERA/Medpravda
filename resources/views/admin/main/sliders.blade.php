<div class="breadcrumb">
    <span>Главный слайдер</span>
</div>
@include('admin.main.nav')

@if(!empty($sliders))
    <div class="two__column">
        @foreach($sliders as $slider)
            <div class="wrap__block">
                <h3># @if('ua' == $slider->loc) UA-вариант - @endif {{ $slider->description }}:</h3>
                {!! Form::open(['url'=>route('main_slider', $slider->id), 'method'=>'post', 'files'=>true]) !!}
                <div class="input__group">
                    {!! Form::text('description', $slider->description ?? '',
                     ['placeholder'=>'Заголовок', 'class'=>'form-control']) !!}
                    {{ Form::label('description', 'Заголовок') }}
                </div>
                <div class="input__group">
                    {!! Form::text('text', $slider->text ?? '',
                     ['placeholder'=>'Текст', 'class'=>'form-control']) !!}

                    {{ Form::label('text', 'Текст (160 символов)') }}
                </div>
                <div class="input__group">
                    {!! Form::text('link', $slider->link ?? '',
                     ['placeholder'=>'Ссылка', 'class'=>'form-control']) !!}
                    {{ Form::label('link', 'Ссылка') }}
                </div>
                {{--Image--}}
                <h3>Параметры картинки</h3>
                <div class="input__group">
                    {!! Form::text('alt', $slider->alt ?? '',
                        ['placeholder'=>'Alt', 'id'=>'alt', 'class'=>'form-control']) !!}
                    {{ Form::label('alt', 'Alt') }}
                </div>
                <div class="input__group">
                    {!! Form::text('title', $slider->title ?? '',
                        ['placeholder'=>'Title', 'id'=>'title', 'class'=>'form-control']) !!}
                    {{ Form::label('title', 'Title') }}
                </div>
                @if(!empty($slider->path))
                    <div class="img__full">
                        {{ Html::image(asset('/asset/images/slider/').'/'.$slider->path, 'a picture', array('class' => 'thumb img-thumbnail', 'style' => 'width:100%;height:100%')) }}
                    </div>
                @endif
                <label class="input__file"><!--картинка-->
                    <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(1080х496, Вес: 350 Кб)</small></span>
                    {!! Form::file('img', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
                </label>

                {{--Image--}}
                <h3>Параметры иконок (Синяя)</h3>


                        @if(!empty($slider->mainicon))
                            <div class="img__small">
                                {{ Html::image($slider->getIconMain(),
                                        'a picture', array('class' => 'thumb img-thumbnail')) }}
                            </div>
                        @endif

                        <label class="input__file"><!--картинка-->
                            <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(25x25px, Вес: 350 Кб)</small></span>
                            {!! Form::file('mainicon', ['accept'=>'image/*', 'id'=>'mainicon', 'class'=>'file']) !!}
                        </label>
                <h3>Параметры иконок (Белая)</h3>
                        @if(!empty($slider->hideicon))
                            <div class="img__small">
                                {{ Html::image($slider->getIconHide(),
                                        'a picture', array('class' => 'thumb img-thumbnail')) }}
                            </div>
                        @endif

                        <label class="input__file"><!--картинка-->
                            <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(25x25px, Вес: 350 Кб)</small></span>
                            {!! Form::file('hideicon', ['accept'=>'image/*', 'id'=>'hideicon', 'class'=>'file']) !!}
                        </label>



                <div class="input__group info-check label-stay"><!--чекбокс-->
                    <input type="checkbox" {{ !empty($slider->approved) ? 'checked' : '' }} value="1"
                           name="approved" id="approve{{$loop->iteration}}">
                    <label for="approve{{$loop->iteration}}" class="check-box"></label>
                    <label for="approve{{$loop->iteration}}" class="check-text">Опубликовать</label>
                </div>


                {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
                {!! Form::close() !!}

                @if(0 == $loop->iteration%2)

                @endif
            </div>
        @endforeach
    </div>
@endif