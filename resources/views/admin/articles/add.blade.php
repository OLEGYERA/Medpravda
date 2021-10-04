<div class="breadcrumb">
    <a href="{{route('articles_admin')}}">Статьи</a>
    <span>Добавление статьи</span>
</div>

@include('admin.articles.nav')

{!! Form::open(['url'=>route('create_article'), 'method'=>'POST', 'class'=>'form-horizontal', 'files'=>true]) !!}
<div class="pop-up">
    <div class="pop-header">
        <h3>Загрузить фотографию</h3>
        <div class="close"><img src="{{asset('assets/admin/imgs/close-blue.svg')}}" alt="close"></div>
    </div>
    <div class="form-inner">
            <h2>Параметры картинки</h2>
            <div class="input__group">
                {!! Form::text('imgalt', old('imgalt') ? : '' , ['placeholder'=>'Alt', 'id'=>'imgalt', 'class'=>'form-control']) !!}
                {{ Form::label('img', 'alt image') }}
            </div>
            <div class="input__group">
                {!! Form::text('imgtitle', old('imgtitle') ? : '' , ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
                {{ Form::label('img', 'title image') }}
            </div>
            <label class="input__file">
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(653х415, не более 5Мб)</small></span>
                {!! Form::file('img', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>
    </div>
    <div class="info-but">
        <button type="submit" class="btn">Создать</button>
    </div>
</div>

<div class="wrap__block">
    <div class="two__column">
        <div>
            <h2>Добавление новой статьи</h2>
        </div>
        <div>
            <a href="javascript:void(0)" class="btn btn__plus add-info">
                Загрузить фотографию
            </a>
        </div>

        <div class="input__group">
            {!! Form::text('title', old('title') ? : '' , ['placeholder'=>'Title', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
            {{ Form::label('title', 'Заголовок страницы') }}
        </div>

        <div class="input__group">
            {!! Form::text('alias', old('alias') ? : '' , ['placeholder'=>'psevdonim-stranici', 'id'=>'alias', 'class'=>'form-control eng-alias']) !!}
            {{ Form::label('alias', 'URL страницы') }}
        </div>


        <div class="input__group label-stay">
            {!! Form::select('category_id', $cats ?? [],
                old('category_id') ? : '' , [ 'class'=>'custom-select sources', 'placeholder'=>'Категория'])
            !!}
            {{ Form::label('category_id', 'Категория') }}
        </div>

        <div class="input__group">
            {!! Form::text('description', old('description') ? : '' ,
                     ['placeholder'=>'description', 'id'=>'description', 'class'=>'form-control']) !!}
            {{ Form::label('description', 'Описание страницы(160 символов)') }}
        </div>

        <div class="input__group label-stay">
            <input type="text" name="outputtime" id="outputtime"
                   value="{{ old('outputtime') ? : date('Y-m-d H:i') }}">
            {!! Form::label('outputtime', 'Дата публикации') !!}
        </div>

        <div class="input__group">
            {!! Form::text('description', old('description') ? : '' ,
                     ['placeholder'=>'description', 'id'=>'description', 'class'=>'form-control']) !!}
            {{ Form::label('priority', 'Приоритет(0-255)') }}
        </div>
        <div class="input__group info-check label-stay">
            <input type="checkbox" {{ old('confirmed') ? 'checked' : ''}} value="1" name="confirmed" id="asd">
            <label for="asd" class="check-box"></label>
            <label for="asd" class="check-text">Опубликовать</label>
        </div>
    </div>
    <hr>
    <h3>Контент статьи</h3>
    <textarea name="content" class="form-control editor">{!! old('content') ? : '' !!}</textarea>
</div>


{{--SEO FIELDS--}}
<div class="wrap__block">
    <h2>SEO поля</h2>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('seo_title', old('seo_title') ? : '' ,
            ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
            {{ Form::label('seo_title', 'SEO_TITLE') }}
        </div>
        <div class="input__group">

            {!! Form::text('seo_description', old('seo_description') ? : '' ,
            ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
            {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
        </div>
        <div class="input__group">
            {!! Form::text('og_image', old('og_image') ? : '' ,
            ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
            {{ Form::label('og_image', 'OG_IMAGE') }}
        </div>
        <div class="input__group">

            {!! Form::text('og_title', old('og_title') ? : '' ,
            ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}
            {{ Form::label('og_title', 'OG_TITLE') }}
        </div>
        <div class="input__group">

            {!! Form::text('og_description', old('og_description') ? : '' ,
            ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control']) !!}
            {{ Form::label('og_description', 'OG_DESCRIPTION') }}
        </div>
    </div>
    <h4>SEO_TEXT</h4>
    <textarea name="seo_text" rows="20">{!! old('seo_text') ? : '' !!}</textarea>
</div>

{!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
{!! Form::close() !!}
