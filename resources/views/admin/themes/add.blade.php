<div class="breadcrumb">
    <span>Добавление статьи</span>
</div>

{!! Form::open(['url'=>route('themes_add'), 'method'=>'POST', 'files'=>true]) !!}


<div class="wrap__block">
    <div class="two__column">
        <div>
            <h2>Добавить статью</h2>
        </div>
        <div>
            <a href="javascript:void(0)" class="add-info btn btn__plus">
                Загрузить фотографию
            </a>
        </div>

        <div class="input__group">
            {!! Form::text('title', old('title') ? : '' , ['placeholder'=>'Title', 'id'=>'title', 'class'=>'form-control']) !!}
            {{ Form::label('title', 'Название') }}
        </div>

        <div class="input__group">
            {!! Form::text('link', old('link') ? : '' ,
             ['placeholder'=>'link', 'id'=>'link', 'class'=>'form-control']) !!}

            {{ Form::label('link', 'URL') }}
        </div>

        <div class="input__group">
            {!! Form::text('description', old('description') ? : '' ,
                    ['placeholder'=>'description', 'id'=>'description', 'class'=>'form-control']) !!}
            {{ Form::label('description', 'Описание темы') }}
        </div>
        <div class="input__group label-stay">
            {!! Form::select('loc', [1=>'RU', 2=>'UA'],
                old('loc') ? : '' , [ 'class'=>'custom-select sources', 'placeholder'=>'RU\UA'])
            !!}
            {!! Form::label('loc', 'Локализация') !!}
        </div>
        <div class="input__group">
            {!! Form::number('priority', old('priority') ? : '' ,
                     ['id'=>'priority', 'class'=>'form-control']) !!}
            {{ Form::label('priority', 'Приоритет(0-255)') }}
        </div>
        <div class="input__group info-check label-stay"><!--чекбокс-->
            <input type="checkbox" {{ old('approved') ? 'checked' : ''}} value="1"
                   name="approved" id="asd">
            <label for="asd" class="check-box"></label>
            <label for="asd" class="check-text">Опубликовать</label>
        </div>
    </div>
    <div>
        {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>
</div>

{{--popup modal--}}
<div class="pop-up">
    <div class="pop-header">
        <h3>Основное изображение</h3>
        <div class="close"><img src="{{asset('assets/admin/imgs/close-blue.svg')}}" alt="close"></div>
    </div>
    <div class="form-inner">
        <div class="input__group">
            {!! Form::text('alt', old('alt') ? : '' , ['placeholder'=>'Alt', 'id'=>'alt', 'class'=>'form-control']) !!}
            {{ Form::label('alt', 'Image Alt') }}
        </div>

        <div class="input__group">
            {{ Form::label('imgtitle', 'Image Title') }}
            {!! Form::text('imgtitle', old('imgtitle') ? : '' , ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
        </div>
        <label class="input__file">
            <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(309х212px)</small></span>
            {!! Form::file('img', ['accept'=>'image/*', 'id'=>'img','class'=>'file']) !!}
        </label>

    </div>
    <div class="info-but">
        <button type="submit" class="btn">Сохранить</button>
    </div>
</div>

{{--end popup--}}
{!! Form::close() !!}

