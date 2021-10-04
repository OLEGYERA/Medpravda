<div class="breadcrumb">
    <span>Редактирование тэга</span>
</div>
{!! Form::open(['url' => route('admin.tag.update', $tag->id), 'class'=>'form-horizontal','method'=>'patch' ]) !!}
<div class="wrap__block">
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('tag', old('tag') ? : ($tag->name ?? '') , ['placeholder'=>'Психиатрия...', 'id'=>'tag', 'class'=>'form-control ru-title']) !!}
            {{ Form::label('tag', 'Название тэга') }}
        </div>
        <div class="input__group">
            {!! Form::text('utag', old('utag') ? : ($tag->uname ?? '') , ['placeholder'=>'Психиатрiя...', 'id'=>'utag', 'class'=>'form-control']) !!}
            {{ Form::label('utag', 'UA-Название тэга') }}
        </div>
        <div class="input__group">
            {!! Form::text('alias', old('alias') ? : ($tag->alias ?? '') , ['placeholder'=>'psihiatr...', 'id'=>'alias', 'class'=>'form-control eng-alias']) !!}
            {{ Form::label('alias', 'URL') }}
        </div>
        <div class="input__group info-check label-stay">
            <input type="checkbox" {{ (old('approved') || !empty($tag->approved)) ? 'checked' : ''}} value="1"
                   name="confirmed" id="asd">
            <label for="asd" class="check-box"></label>
            <label for="asd" class="check-text">Опубликовать</label>
        </div>
    </div>
    <label class="input__file">
        <span class="btn" data-default='Загрузить файл'>Загрузить файл <small></small></span>
        {!! Form::file('img', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
    </label>
</div>

<div class="two__column">
    <div class="wrap__block">
        <h2>SEO</h2>
        <div class="input__group">
            {!! Form::text('seo_title', old('seo_title') ? : ($tag->seo->seo_title ?? '') , ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
            {{ Form::label('seo_title', 'SEO_TITLE') }}
        </div>
        <div class="input__group">
            {!! Form::text('seo_description', old('seo_description') ? : ($tag->seo->seo_description ?? '') , ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
            {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
        </div>
        <div class="input__group">
            {!! Form::text('og_image', old('og_image') ? : ($tag->seo->og_image ?? '') , ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
            {{ Form::label('og_image', 'OG_IMAGE') }}
        </div>
        <div class="input__group">
            {!! Form::text('og_title', old('og_title') ? : ($tag->seo->og_title ?? '') , ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}
            {{ Form::label('og_title', 'OG_TITLE') }}
        </div>
        <div class="input__group">
            {!! Form::text('og_description', old('og_description') ? : ($tag->seo->og_description ?? '') , ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control']) !!}
            {{ Form::label('og_description', 'OG_DESCRIPTION') }}
        </div>
        <h4>{{ Form::label('seo_text', 'SEO_TEXT') }}</h4>
        <textarea name="seo_text" rows="20">{!! old('seo_text') ? : ($tag->seo->seo_text ?? '') !!}</textarea>
    </div>

    <div class="wrap__block">
        <h2>UA-SEO</h2>
        <div class="input__group">
            {!! Form::text('useo_title', old('useo_title') ? : ($tag->useo->useo_title ?? ''),
                        ['placeholder'=>'seo_title', 'id'=>'useo_title', 'class'=>'form-control']) !!}
            {{ Form::label('useo_title', 'SEO_TITLE') }}
        </div>

        <div class="input__group">
            {!! Form::text('useo_description', old('useo_description') ? : ($tag->useo->useo_description ?? ''),
             ['placeholder'=>'seo_description', 'id'=>'useo_description', 'class'=>'form-control']) !!}
            {{ Form::label('useo_description', 'SEO_DESCRIPTION') }}
        </div>

        <div class="input__group">
            {!! Form::text('uog_image', old('uog_image') ? : ($tag->useo->uog_image ?? ''),
                    ['placeholder'=>'og_image', 'id'=>'uog_image', 'class'=>'form-control']) !!}
            {{ Form::label('uog_image', 'OG_IMAGE') }}
        </div>

        <div class="input__group">
            {!! Form::text('uog_title', old('uog_title') ? : ($tag->useo->uog_title ?? ''),
                    ['placeholder'=>'og_title', 'id'=>'uog_title', 'class'=>'form-control']) !!}
            {{ Form::label('uog_title', 'OG_TITLE') }}
        </div>

        <div class="input__group">
            {!! Form::text('uog_description', old('uog_description') ? : ($tag->useo->uog_description ?? ''),
                    ['placeholder'=>'og_description', 'id'=>'uog_description', 'class'=>'form-control']) !!}
            {{ Form::label('uog_description', 'OG_DESCRIPTION') }}
        </div>
        <h4>{{ Form::label('useo_text', 'SEO_TEXT') }}</h4>
        <textarea name="useo_text" rows="20">{!! old('useo_text') ? : ($tag->useo->useo_text ?? '') !!}</textarea>

    </div>
</div>

<div class="">
    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
</div>
{!! Form::close() !!}
