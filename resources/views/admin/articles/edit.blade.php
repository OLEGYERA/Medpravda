<div class="breadcrumb">
    <a href="{{route('articles_admin')}}">Статьи</a>
    <span>Редактирование статьи</span>
</div>

@include('admin.articles.nav')

<div class="top__nav">
    @if('ru' == $spec)
        {!! Form::open(['url' => route('edit_article',['spec' => 'ua','article'=> $article->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
        {!! Form::button('Редактировать UA', ['class' => 'btn btn__full','type'=>'submit']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['url' => route('edit_article',['spec' => 'ru','article'=> $article->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
        {!! Form::button('Редактировать RU', ['class' => 'btn btn__full','type'=>'submit']) !!}
        {!! Form::close() !!}
    @endif
</div>

{!! Form::open(['url'=>route('edit_article', ['spec' => $spec , 'article' => $article->id , 'class' => 'form-search']),
    'method'=>'POST', 'files'=>true]) !!}

{{--POPUP HEADER--}}
<div class="pop-up">
    <div class="pop-header">
        <h3>Загрузить фотографию</h3>
        <div class="close"><img src="{{asset('assets/admin/imgs/close-blue.svg')}}" alt="close"></div>
    </div>
    <div class="form-inner">
        @if(!empty($article->image))
            <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                {{ Html::image(asset('/asset/images/articles/'.$spec.'/main').'/'.$article->image->path, 'a picture', array('class' => 'thumb')) }}
                @if(!empty($article->image->path))

                    <button type="button" class="btn btn__red remove-image" title="удалить эту картинку"
                            data-img="{{ $article->id }}" data-src="ua">x
                    </button>

                @endif
            </div>
        @endif

        <label class="input__file"><!--картинка загузить-->
            <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(653х415, не более 5Мб)</small></span>
            {!! Form::file('img', ['accept'=>'image/*', 'id'=>'img']) !!}
        </label>
        <div class="input__group">
            {!! Form::text('imgalt', old('imgalt') ? : ($article->image->alt ?? ''),
                ['placeholder'=>'Alt', 'id'=>'imgalt', 'class'=>'form-control']) !!}
            {{ Form::label('img', 'alt image') }}
        </div>
        <div class="input__group">
            {!! Form::text('imgtitle', old('imgtitle') ? : ($article->image->title ?? ''),
               ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
            {{ Form::label('img', 'title image') }}
        </div>

    </div>
    <div class="info-but">
        {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
    </div>

</div>

<div class="wrap__block">
    <h2>Редактирование статьи : {{$article->title ?? ''}}</h2>
    <div class="two__column flex__center">

        <div class="input__group">
            {!! Form::text('title', old('title') ? : ($article->title ?? '') , ['placeholder'=>'Title', 'id'=>'title', 'class'=>'form-control ru-title']) !!}

            {{ Form::label('title', 'Заголовок страницы') }}
        </div>

        @if('ru' == $spec)
            <div class="input__group">
                {!! Form::text('alias', old('alias') ? : ($article->alias ?? '') , ['placeholder'=>'psevdonim-stranici', 'id'=>'alias', 'class'=>'form-control eng-alias']) !!}
                {{ Form::label('alias', 'URL страницы') }}
            </div>
            <div class="input__group label-stay">

                {!! Form::select('category_id', $cats ?? [],
                old('category_id') ? : ($article->category_id ?? '') , [ 'class'=>'custom-select sources', 'data-value' => $article->category_id])
            !!}
                {{ Form::label('category_id', 'Категория') }}
            </div>
        @endif
        <div class="input__group">
            {!! Form::text('description', old('description') ? : ($article->description ?? ''),
             ['placeholder'=>'description', 'id'=>'description', 'class'=>'form-control']) !!}

            {{ Form::label('description', 'Описание страницы(160 символов)') }}
        </div>
        <div class="input-prepend input__group">

            <input type="text" name="outputtime" id="outputtime"
                   value="{{ old('outputtime') ? : (date('Y-m-d H:i', strtotime($article->created_at)) ?? date('Y-m-d H:i')) }}">
            {!! Form::label('outputtime', 'Дата публикации') !!}
        </div>
        <div class="input__group">
            @if('ru' == $spec)
                {!! Form::number('priority', old('priority') ? : ($article->priority ?? ''),
                 ['id'=>'priority', 'class'=>'form-control']) !!}
                {{ Form::label('priority', 'Приоритет(0-255)') }}
            @endif
        </div>
        <div class="input__group info-check label-stay"><!--чекбокс-->
            <input type="checkbox" {{ (old('confirmed') || !empty($article->approved)) ? 'checked' : '' }} value="1"
                   name="confirmed" id="approve{{$article->iteration}}">
            <label for="approve{{$article->iteration}}" class="check-box"></label>
            <label for="approve{{$article->iteration}}" class="check-text">Опубликовать</label>
        </div>
        <div>
            <a href="javascript:void(0)" class="btn btn__plus add-info">
                Загрузить фотографию</a>
        </div>

    </div>
    <h3>Контент статьи</h3>
    <textarea name="content"
              class="form-control editor">{!! old('content') ? : ($article->content ?? '') !!}</textarea>
</div>


<!-- SEO -->
<div class="wrap__block">
        <h2>SEO поля</h2>
    <div class="two__column">
        <div>
            <div class="input__group">
                {!! Form::text('seo_title', old('seo_title') ? : ($article->seo->seo_title ?? '') ,
                ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
                {{ Form::label('seo_title', 'SEO_TITLE') }}
            </div>
            <div class="input__group">
                {!! Form::text('seo_description', old('seo_description') ? : ($article->seo->seo_description ?? '') ,
                        ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
                {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
            </div>
        </div>
        <div>
            <div class="input__group">
                {!! Form::text('og_image', old('og_image') ? : ($article->seo->seo_image ?? '') ,
                        ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
                {{ Form::label('og_image', 'OG_IMAGE') }}
            </div>
            <div class="input__group">
                {!! Form::text('og_title', old('og_title') ? : ($article->seo->og_title ?? '') ,
                        ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}
                {{ Form::label('og_title', 'OG_TITLE') }}
            </div>
            <div class="input__group">
                {!! Form::text('og_description', old('og_description') ? : ($article->seo->og_description ?? '') ,
                          ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control', 'rows'=>20]) !!}
                {{ Form::label('og_description', 'OG_DESCRIPTION') }}
            </div>
        </div>
    </div>
    <h3>SEO_TEXT</h3>
    <textarea name="seo_text" rows="20">{!! old('seo_text') ? : ($article->seo->seo_text ?? '') !!}</textarea>

    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
</div>
{!! Form::close() !!}
