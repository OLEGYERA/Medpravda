<div class="breadcrumb">
    <span>Страница сотрудничества</span>
</div>

@include('admin.static.nav')

@if(is_object($cooperations) && $cooperations->isNotEmpty())
    @foreach($cooperations as $adv)
        {!! Form::open(['url' => route('cooperation_admin', $adv->id), 'method' => 'post','id' => "form_adv_$adv->id", 'class' => 'form-create', 'files' => true]) !!}
        <div class="wrap__block">
            <h2># {{ $adv->title }}</h2>
            <div class="two__column"><!--две колонки-->
                <div><!--ru-->
                    <div class="input__group"><!--обычный инпут-->
                        {!! Form::text('title', $adv->title ?? '',
                             ['placeholder'=>'Баннеры', 'class'=>'form-control']) !!}

                        {{ Form::label('title', 'RU-Заголовок') }}
                    </div>
                    <h3>RU image</h3>
                    <div>
                        <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                            {{ Html::image(asset('/asset/images/rk/ru').'/'.$adv->path, 'ru picture', array('class' => 'img-thumbnail')) }}
                            @if(!empty($adv->path))
                                <button type="button" class="btn btn__red"
                                        data-img="{{ $adv->id }}" data-src="ru">Х
                                </button>
                            @endif
                        </div>
                        <label class="input__file"><!--картинка загузить-->
                            <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(1020х660, не более 5Мб)</small></span>
                            {!! Form::file('image', ['accept'=>'image/*', 'class'=>'file', 'id' => 'image_'.$adv->id]) !!}
                        </label>
                    </div>
                    <div class="input__group"><!--обычный инпут-->
                        {!! Form::text('imgalt', $adv->img_alt ?? '',
                                                ['placeholder'=>'Alt', 'id'=>'imgalt', 'class'=>'form-control']) !!}
                        {{ Form::label('imgalt', 'Image Alt') }}
                    </div>
                    <div class="input__group"><!--обычный инпут-->
                        {!! Form::text('imgtitle', $adv->img_title ?? '',
                                        ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
                        {{ Form::label('imgtitle', 'Image Title') }}
                    </div>
                    <h4>
                        RU-текст
                    </h4>

                    {{ Form::textarea('text', $adv->text ?? '', ['placeholder'=>'RU-Text', 'class'=>'form-control editor']) }}


                </div>
                <div><!--ukr-->
                    <div class="input__group"><!--обычный инпут-->
                        {!! Form::text('utitle', $adv->utitle ?? '',
                             ['placeholder'=>'Баннеры', 'class'=>'form-control']) !!}
                        {{ Form::label('utitle', 'UA-Заголовок') }}
                    </div>
                    <h3>UA image</h3>
                    <div>
                        <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                            {{ Html::image(asset('/asset/images/rk/ua').'/'.$adv->upath, 'ua picture', array('class' => 'img-thumbnail')) }}
                            @if(!empty($adv->path))
                                <button type="button" class="btn btn__red"
                                        data-img="{{ $adv->id }}" data-src="ru">Х
                                </button>
                            @endif
                        </div>
                        <label class="input__file"><!--картинка загузить-->
                            <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(1020х660, не более 5Мб)</small></span>
                            {!! Form::file('uimage', ['accept'=>'image/*', 'class'=>'file', 'id' => 'uimage_'.$adv->id]) !!}
                        </label>
                    </div>

                    <div class="input__group"><!--обычный инпут-->
                        {!! Form::text('uimgalt', $adv->uimg_alt ?? '',
                                                ['placeholder'=>'Alt', 'id'=>'uimgalt', 'class'=>'form-control']) !!}
                        {{ Form::label('uimgalt', 'Image Alt') }}
                    </div>

                    <div class="input__group"><!--обычный инпут-->
                        {!! Form::text('uimgtitle', $adv->uimg_title ?? '',
                                               ['placeholder'=>'Title', 'id'=>'uimgtitle', 'class'=>'form-control']) !!}
                        {{ Form::label('uimgtitle', 'Image title') }}
                    </div>
                    <h4>
                        UA-текст
                    </h4>

                    {{ Form::textarea('utext', $adv->utext ?? '', ['placeholder'=>'UA-Text', 'class'=>'form-control editor']) }}


                </div>
            </div>
            <div class="input__group info-check label-stay"><!--чекбокс-->
                <input type="checkbox"
                       id="approve-article{{$loop->iteration}}"
                       {{ old('confirmed') ? 'checked' : ($adv->approved ? 'checked' : '')}} value="1"
                       name="confirmed">
                <label for="approve-article{{$loop->iteration}}" class="check-box"></label>
                <label for="approve-article{{$loop->iteration}}" class="check-text">Опубликовать</label>
            </div>

                       <div class="two__column"><!--две колонки-->
                <div>
                    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
                </div>
                <div>
                    <button type="button" class="btn btn__red remove-block" data-source="adv"
                            data-id="{{ $adv->id }}">Удалить
                    </button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    @endforeach
@endif