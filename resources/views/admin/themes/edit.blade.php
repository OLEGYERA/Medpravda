<div class="breadcrumb">
    <span>Редактирование темы : {{($theme->title ?? '')}}</span>
</div>

{!! Form::open(['url'=>route('themes_update', ['theme' => $theme->id]),
    'method'=>'POST', 'class'=>'', 'files'=>true]) !!}

{{--popup modal--}}
<div class="pop-up">
    <div class="pop-header">
        <h3>Основное изображение</h3>
        <div class="close"><img src="{{asset('assets/admin/imgs/close-blue.svg')}}" alt="close"></div>
    </div>
    <div class="form-inner">
        @if(!empty($theme->path))
            <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                {{ Html::image(asset('/asset/images/theme').'/'.$theme->path, 'a picture', array('class' => 'img-thumbnail', 'alt' => 'old')) }}
                @if(!empty($theme->path))
                    <button type="button" class="btn btn__red remove-image" title="удалить эту картинку"
                            data-img="{{ $theme->id }}" data-src="ua">x
                    </button>
                @endif
            </div>
        @endif
        <label class="input__file"><!--картинка загузить-->
            <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(309х212px)</small></span>
            {!! Form::file('img', ['accept'=>'image/*', 'id'=>'img', 'class'=>'file']) !!}
        </label>

        <div class="input__group">
            {!! Form::text('alt', old('alt') ? : ($theme->alt ?? ''),
                        ['placeholder'=>'Alt', 'id'=>'alt', 'class'=>'form-control']) !!}
            {{ Form::label('alt', 'Image Alt') }}
        </div>

        <div class="input__group">
            {!! Form::text('imgtitle', old('imgtitle') ? : ($theme->imgtitle ?? ''),
                   ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
            {{ Form::label('imgtitle', 'Image Title') }}

        </div>
    </div>
    <div class="info-but">
        <button type="submit" class="btn">Сохранить</button>
    </div>
</div>

{{--end popup--}}


<div class="wrap__block">
    <div class="two__column">
        <div class="create-panel">
            <h3>Редактировать статью</h3>
        </div>

        <div>
            <a href="javascript:void(0)" class="btn btn__plus add-info">
                Загрузить фотографию
            </a>
        </div>
        <div class="input__group">
            {!! Form::text('title', old('title') ? : ($theme->title ?? '') , ['placeholder'=>'Title', 'id'=>'title', 'class'=>'form-control']) !!}
            {{ Form::label('title', 'Название') }}
        </div>

        <div class="input__group">
            {!! Form::text('link', old('link') ? : ($theme->link ?? ''),
                               ['placeholder'=>'link', 'id'=>'link', 'class'=>'form-control']) !!}
            {{ Form::label('link', 'URL') }}
        </div>

        <div class="input__group">
            {!! Form::text('description', old('description') ? : ($theme->description ?? ''),
                                ['placeholder'=>'description', 'id'=>'description', 'class'=>'form-control']) !!}
            {{ Form::label('description', 'Описание темы') }}
        </div>

        <div class="input__group">
            {!! Form::number('priority', old('priority') ? : ($theme->priority ?? ''),
             ['id'=>'priority', 'class'=>'form-control']) !!}

            {{ Form::label('priority', 'Приоритет(0-255)') }}
        </div>
        <div class="input__group info-check label-stay"><!--чекбокс-->
            <input type="checkbox" {{ (old('approved') || !empty($theme->approved)) ? 'checked' : ''}} value="1"
                   name="confirmed" id="approve{{$theme->iteration}}">
            <label for="approve{{$theme->iteration}}" class="check-box"></label>
            <label for="approve{{$theme->iteration}}" class="check-text">Опубликовать</label>
        </div>
        <div class="input__group label-stay">
            {!! Form::select('loc', [1=>'RU', 2=>'UA'],
                            old('loc') ? : ($theme->loc_id ?? ''), [ 'class'=>'custom-select sources', 'placeholder'=>'RU\UA'])
                        !!}
            {!! Form::label('loc', 'Локализация') !!}
        </div>
    </div>
    <div class="input_full">
        {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>
</div>

{!! Form::close() !!}
