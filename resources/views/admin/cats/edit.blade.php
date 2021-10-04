<div class="breadcrumb">
    <a href="{{route('articles_admin')}}">Статьи</a>
    <span>Редактирование категории - {{($category->title ?? '')}}</span>
</div>

<div class="top__nav">
    @if('cats' == Route::currentRouteName())
        <a class="btn btn__full">Категории</a>
    @else
        <a class="btn" href="{{ route('cats') }}">Категории</a>
    @endif
    @if('create_article' == Route::currentRouteName())
        <a class="btn btn__full">UA-инструкция</a>
    @else
        <a class="btn" href="{{ route('create_article') }}">Создать статью</a>
    @endif
</div>


{!! Form::open(['url' => route('edit_cats', $category->id), 'class'=>'form-horizontal','method'=>'POST' ]) !!}

<div class="wrap__block">
    <h2>Редактирование категории - {{($category->title ?? '')}}</h2>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('title', old('title') ? : ($category->title ?? ''),
                ['placeholder'=>'Психиатр...', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
            {{ Form::label('title', 'Название категории') }}
        </div>
        <div class="input__group">
            {!! Form::text('utitle', old('utitle') ? : ($category->utitle ?? ''),
               ['placeholder'=>'Психиатр...', 'id'=>'utitle', 'class'=>'form-control']) !!}
            {{ Form::label('utitle', 'UA-Название категории') }}
        </div>
    </div>
    <div class="input__group">
        {!! Form::text('alias', old('alias') ? : ($category->alias ?? ''),
            ['placeholder'=>'psihiatr...', 'id'=>'alias', 'class'=>'form-control eng-alias']) !!}
        {{ Form::label('title', 'URL категории') }}
    </div>
</div>

<div class="two__column">
    <!-- SEO -->
    <div class="wrap__block"> <!--белый блок-->
        <h2>SEO</h2>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('seo_title', old('seo_title') ? : ($category->seo->seo_title ?? ''),
                            ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
            {{ Form::label('seo_title', 'SEO_TITLE') }}
        </div>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('seo_description', old('seo_description') ? : ($category->seo->seo_description ?? ''),
                            ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
            {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
        </div>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('og_image', old('og_image') ? : ($category->seo->og_image ?? ''),
                            ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
            {{ Form::label('og_image', 'OG_IMAGE') }}
        </div>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('og_title', old('og_title') ? : ($category->seo->og_title ?? ''),
                            ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}
            {{ Form::label('og_title', 'OG_TITLE') }}
        </div>
        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('og_description', old('og_description') ? : ($category->seo->og_description ?? ''),
                        ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control']) !!}
            {{ Form::label('og_description', 'OG_DESCRIPTION') }}
        </div>

        <h3>SEO_TEXT</h3>
        <textarea name="seo_text" rows="10">{!! old('seo_text') ? : ($category->seo->seo_text ?? '') !!}</textarea>
    </div>
    <!-- SEO -->
    <!-- SEO -->
    <div class="wrap__block"> <!--белый блок-->
        <h2>UA-SEO</h2>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('useo_title', old('useo_title') ? : ($category->seo->useo_title ?? ''),
                        ['placeholder'=>'seo_title', 'id'=>'useo_title', 'class'=>'form-control']) !!}
            {{ Form::label('useo_title', 'SEO_TITLE') }}
        </div>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('useo_description', old('useo_description') ? : ($category->seo->useo_description ?? ''),
             ['placeholder'=>'seo_description', 'id'=>'useo_description', 'class'=>'form-control']) !!}
            {{ Form::label('useo_description', 'SEO_DESCRIPTION') }}
        </div>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('uog_image', old('uog_image') ? : ($category->seo->uog_image ?? ''),
                    ['placeholder'=>'og_image', 'id'=>'uog_image', 'class'=>'form-control']) !!}
            {{ Form::label('uog_image', 'OG_IMAGE') }}
        </div>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('uog_title', old('uog_title') ? : ($category->seo->uog_title ?? ''),
                    ['placeholder'=>'og_title', 'id'=>'uog_title', 'class'=>'form-control']) !!}
            {{ Form::label('uog_title', 'OG_TITLE') }}
        </div>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('uog_description', old('uog_description') ? : ($category->seo->uog_description ?? ''),
                    ['placeholder'=>'og_description', 'id'=>'uog_description', 'class'=>'form-control']) !!}
            {{ Form::label('uog_description', 'OG_DESCRIPTION') }}
        </div>
        <h3>SEO_TEXT</h3>
        <textarea name="useo_text" rows="10">{!! old('useo_text') ? : ($category->seo->useo_text ?? '') !!}</textarea>
    </div>
</div>
<!-- SEO -->
{!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
{!! Form::close() !!}
