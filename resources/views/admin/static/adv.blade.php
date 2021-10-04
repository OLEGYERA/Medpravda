<div class="breadcrumb">
    <span>Страница рекламы</span>
</div>

@include('admin.static.nav')

@if(is_object($advs) && $advs->isNotEmpty())
    @foreach($advs as $adv)
        {!! Form::open(['url' => route('adv_admin', $adv->id), 'method' => 'post','id' => "form_adv_$adv->id", 'files' => true]) !!}
        <div class="wrap__block">
            <h2># {{ $adv->title }}</h2>

            <div class="two__column">
                <div>
                    <div class="input__group">
                        {!! Form::text('title', $adv->title ?? '',
                             ['placeholder'=>'Баннеры', 'class'=>'form-control']) !!}

                        {{ Form::label('title', 'RU-Заголовок') }}
                    </div>
                    <div class="img img__full">
                        {{ Html::image(asset('/asset/images/rk/ru').'/'.$adv->path, 'ru picture', array('class' => 'img-thumbnail')) }}
                        <button type="button" class="btn btn__red remove-image" title="удалить эту картинку"
                                data-img="{{ $adv->id }}" data-src="ru">x
                        </button>
                    </div>
                    <label class="input__file"><!--картинка загузить-->
                        <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(1020х660, не более 5Мб)</small></span>
                        {!! Form::file('image', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
                    </label>
                    <div class="input__group">
                        {!! Form::text('imgalt', $adv->img_alt ?? '',
                                                ['placeholder'=>'Alt', 'id'=>'imgalt', 'class'=>'form-control']) !!}
                        {{ Form::label('imgalt', 'Image Alt') }}
                    </div>
                    <div class="input__group">
                        {!! Form::text('imgtitle', $adv->img_title ?? '',
                                        ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
                        {{ Form::label('imgtitle', 'Image Title') }}
                    </div>
                    <h3>
                        RU-текст
                    </h3>

                    {{ Form::textarea('text', $adv->text ?? '', ['placeholder'=>'RU-Text', 'class'=>'form-control editor']) }}


                </div>
                <div>
                    <div class="input__group">
                        {!! Form::text('utitle', $adv->utitle ?? '',
                             ['placeholder'=>'Баннеры', 'class'=>'form-control']) !!}
                        {{ Form::label('utitle', 'UA-Заголовок') }}
                    </div>
                    <div class="img img__full">
                        {{ Html::image(asset('/asset/images/rk/ua').'/'.$adv->upath, 'ua picture', array('class' => 'img-thumbnail')) }}
                        @if(!empty($adv->upath))

                            <button type="button" class="btn btn__red remove-image" title="удалить эту картинку"
                                    data-img="{{ $adv->id }}" data-src="ua">x
                            </button>

                        @endif
                    </div>
                    <label class="input__file"><!--картинка загузить-->
                        <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(1020х660, не более 5Мб)</small></span>
                        {!! Form::file('uimage', ['accept'=>'image/*', 'class'=>'file', 'id'=>'uimage']) !!}
                    </label>
                    <div class="input__group">
                        {!! Form::text('uimgalt', $adv->uimg_alt ?? '',
                                                ['placeholder'=>'Alt', 'id'=>'uimgalt', 'class'=>'form-control']) !!}
                        {{ Form::label('uimgalt', 'Image alt') }}
                    </div>

                    <div class="input__group">
                        {!! Form::text('uimgtitle', $adv->uimg_title ?? '',
                                               ['placeholder'=>'Title', 'id'=>'uimgtitle', 'class'=>'form-control']) !!}
                        {{ Form::label('uimgtitle', 'Image title') }}
                    </div>
                    <h3>
                        UA-текст
                    </h3>

                    {{ Form::textarea('utext', $adv->utext ?? '', ['placeholder'=>'UA-Text', 'class'=>'form-control editor']) }}


                </div>
            </div>

            <div class="input__group info-check label-stay"><!--чекбокс-->
                <input type="checkbox" {{ old('confirmed') ? 'checked' : ($adv->approved ? 'checked' : '')}} value="1"
                       name="confirmed" id="approve{{$loop->iteration}}">
                <label for="approve{{$loop->iteration}}" class="check-box"></label>
                <label for="approve{{$loop->iteration}}" class="check-text">Опубликовать</label>
            </div>

            <div class="two__column">
                <div>{!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}</div>
                <div>
                    <button type="button" class="btn btn__red__full remove-block" data-source="adv"
                            data-id="{{ $adv->id }}">Удалить блок
                    </button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    @endforeach
@endif

{!! Form::open(['url' => route('adv_admin'), 'method' => 'post', 'files'=>true]) !!}
<div class="wrap__block">
    <h2># Добавить новый</h2>

    <div class="two__column">
        <div>
            <div class="input__group">
                {!! Form::text('title', old('title') ?? '',
                                ['placeholder'=>'Баннеры', 'class'=>'form-control']) !!}

                {{ Form::label('title', 'RU-Заголовок') }}
            </div>
            <label class="input__file"><!--картинка загузить-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(1020х660, не более 5Мб)</small></span>
                {!! Form::file('image', ['accept'=>'image/*', 'class'=>'file', 'id'=>'uimage']) !!}
            </label>
            <div class="input__group">
                {!! Form::text('imgalt', old('imgalt') ?? '',
                                        ['placeholder'=>'Alt', 'id'=>'imgalt', 'class'=>'form-control']) !!}
                {{ Form::label('imgalt', 'Image Alt') }}
            </div>
            <div class="input__group">
                {!! Form::text('imgtitle', old('imgtitle') ?? '',
                                ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
                {{ Form::label('imgtitle', 'Image Title') }}
            </div>

            <h3>
                RU-текст
            </h3>

            {{ Form::textarea('text', old('text') ?? '', ['placeholder'=>'RU-Text', 'class'=>'form-control editor']) }}
        </div>
        <div>
            <div class="input__group">
                {!! Form::text('utitle', old('utitle') ?? '',
                                ['placeholder'=>'Баннеры', 'class'=>'form-control']) !!}
                {{ Form::label('title', 'UA-Заголовок') }}
            </div>
            <label class="input__file"><!--картинка загузить-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(1020х660, не более 5Мб)</small></span>
                {!! Form::file('uimage', ['accept'=>'image/*', 'class'=>'file', 'id'=>'uimage']) !!}
            </label>
            <div class="input__group">
                {!! Form::text('uimgalt', old('uimgalt') ?? '',
                                        ['placeholder'=>'Alt', 'id'=>'uimgalt', 'class'=>'form-control']) !!}
                {{ Form::label('uimgalt', 'Image alt') }}
            </div>

            <div class="input__group">
                {!! Form::text('uimgtitle', old('uimgtitle') ?? '',
                                       ['placeholder'=>'Title', 'id'=>'uimgtitle', 'class'=>'form-control']) !!}
                {{ Form::label('uimgtitle', 'Image title') }}
            </div>

            <h3>
                UA-текст
            </h3>

            {{ Form::textarea('utext', old('utext') ?? '', ['placeholder'=>'UA-Text', 'class'=>'form-control editor']) }}
        </div>
    </div>


    <div class="input__group info-check label-stay"><!--чекбокс-->
        <input type="checkbox" {{ old('confirmed') ? 'checked' : ''}} value="1"
               name="confirmed" id="approved">
        <label for="approved" class="check-box"></label>
        <label for="approved" class="check-text">Опубликовать</label>
    </div>
    <div class="two__column">
        <div> {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}</div>
        <div>
            <button type="button" class="btn btn__red__full remove-block" data-source="adv"
                    data-id="{{ $adv->id }}">
                Удалить
            </button>
        </div>
    </div>

</div>
{!! Form::close() !!}