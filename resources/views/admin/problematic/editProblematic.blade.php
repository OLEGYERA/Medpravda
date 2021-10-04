@if($problematic->get_parent())
    <div class="breadcrumb">

        {!! $bread_crumb !!}

    </div>

    {{--FORM FOR UPDATE PROBLEMATIC LIKE ARTICLE--}}


    <div class="top__nav">
        {!! Form::open(['url' => route('ua.problematic.edit',$problematic->get_ua()->id),'class'=>'form-horizontal','method'=>'GET', 'files'=>true]) !!}
        {!! Form::button('Редактировать UA', ['class' => 'btn btn__full','type'=>'submit']) !!}
        {!! Form::close() !!}
    </div>

    {{ Form::open([
        'method' => 'PUT',
        'route' => array('problematic.update', $id),
        'class' => 'form-horizontal',
        'files'=>true
    ]) }}

    {!! Form::hidden('root_id',$id) !!}
    <div class="wrap__block">
        <h2>{{$problematic->title}} / RU-версия</h2>
        <div class="input__group">
            <input type="text" class="form-control ru-title" name="title" value="{{old('title',$problematic->title)}}">
            <label for="title">Название</label>
        </div>

        <div class="input__group">
            <input type="text" name="alias" class="form-control eng-alias" name="title"
                   value="{{old('title',$problematic->alias)}}">
            <label for="title">URL</label>
        </div>
        <div class="input__group info-check label-stay"><!--чекбокс-->
            <input type="checkbox" name="approved" id="approved" class="cosmetics-checkbox" value="1"
                   @if($problematic->approved) checked @endif>
            <label for="approved" class="check-box"></label>
            <label for="approved" class="check-text">Публиковать на сайте</label>
        </div>
        <hr>
        <h3>Изображение:</h3>
        @if($problematic->image)
            <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                <img src="/asset/images/problematic/{{$problematic->image}}" alt="">
                @if(!empty($problematic->image))

                    <button type="button" class="btn btn__red remove-image-problematic" title="удалить эту картинку"
                            data-img="{{ $problematic->id }}" data-src="ru">x
                    </button>

                @endif
            </div>
        @endif
        <label class="input__file"><!--картинка загузить-->
            <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>до 5 Мб</small></span>
            {!! Form::file('path', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
        </label>

        <h3 for="approved">Контент</h3>
        <textarea name="content" id="content" name="content" class="form-control editor" cols="30" rows="50">
                {{old('content', $problematic->content)}}
            </textarea>
    </div>

    {{--SEO CONTENT--}}

    <div class="wrap__block">
        <h2>SEO контент</h2>
        <div class="input__group">
            {!! Form::text('seo_title', old('seo_title') ? : ($seo->seo_title ?? '') , ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
            {{ Form::label('seo_title', 'SEO_TITLE') }}
        </div>
        <div class="input__group">
            {!! Form::text('seo_description', old('seo_description') ? : ($seo->seo_description ?? '') , ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
            {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
        </div>
        <div class="input__group">
            {!! Form::text('og_image', old('og_image') ? : ($seo->og_image ?? '') , ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
            {{ Form::label('og_image', 'OG_IMAGE') }}
        </div>
        <div class="input__group">
            {!! Form::text('og_title', old('og_title') ? : ($seo->og_title ?? '') , ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}
            {{ Form::label('og_title', 'OG_TITLE') }}
        </div>
        <div class="input__group">
            {!! Form::text('og_description', old('og_description') ? : ($seo->og_description ?? '') , ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control']) !!}
            {{ Form::label('og_description', 'OG_DESCRIPTION') }}
        </div>
        <div class="textarea-edit">
            <h3>SEO TEXT</h3>
            <textarea name="seo_text" rows="10"
                      class="form-control ">{!! old('seo_text') ? : ($seo->seo_text ?? '') !!}</textarea>
        </div>

    </div>
    {{--END SEO CONTENT--}}

    {!! Form::submit('Обновить', ['class' => 'btn btn__full' ]) !!}
    {!! Form::close() !!}

@else


    {{--FORM FOR UPDATE PROBLEMATIC IF DIRECTORY--}}
    <ul class="nav top-main">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('ua.problematic.edit', ['id' => $problematic->get_ua()->id])}}">Редактировать
                UA</a>
        </li>
    </ul>
    {!! Form::open([
        'method' => 'PUT',
        'route' => array('problematic.update', $id),
        'class' => 'form-horizontal'
    ]) !!}
    {!! Form::hidden('root_id',$id) !!}
    <div class="bads-general">
        <div class="">
            <input type="text" class="form-control ru-title" name="title" value="{{old('title',$problematic->title)}}">
            <label for="title">Название</label>
        </div>
        <div class="">
            <input type="text" name="alias" class="form-control eng-alias" name="title"
                   value="{{old('title',$problematic->alias)}}">
            <label for="title">URL</label>
        </div>

        <div class="">
            <input type="checkbox" name="approved" class="cosmetics-checkbox" value="1"
                   @if($problematic->approved) checked @endif>
            <label for="approved" class="cosmetics-checkbox-label">Отображать директорию</label>
        </div>
    </div>

    {{--SEO CONTENT--}}

    <div class="bads-general bads-seo">
        <div style="width: 100%">
            <h3 class="text-center">SEO контент</h3>
        </div>
        <div>
            {!! Form::text('seo_title', old('seo_title') ? : ($seo->seo_title ?? '') , ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
            {{ Form::label('seo_title', 'SEO_TITLE') }}
        </div>
        <div>
            {!! Form::text('seo_description', old('seo_description') ? : ($seo->seo_description ?? '') , ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
            {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
        </div>
        <div>
            {{--<span class="input-group-btn">--}}
            {{--<a id="og_image_file" data-input="og_image" data-preview="holder" class="btn btn-blue">--}}
            {{--<i class="fa fa-picture-o"></i> Выбрать--}}
            {{--</a>--}}
            {{--</span>--}}
            {!! Form::text('og_image', old('og_image') ? : ($seo->og_image ?? '') , ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
            {{ Form::label('og_image', 'OG_IMAGE') }}
        </div>
        <div>
            {!! Form::text('og_title', old('og_title') ? : ($seo->og_title ?? '') , ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}
            {{ Form::label('og_title', 'OG_TITLE') }}
        </div>
        <div>
            {!! Form::text('og_description', old('og_description') ? : ($seo->og_description ?? '') , ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control']) !!}
            {{ Form::label('og_description', 'OG_DESCRIPTION') }}
        </div>
        <div class="textarea-edit">
            {{--{{ Form::label('seo_text', 'SEO_TEXT') }}--}}
            <sapn>SEO TEXT</sapn>

            <textarea name="seo_text" rows="10"
                      class="form-control ">{!! old('seo_text') ? : ($seo->seo_text ?? '') !!}</textarea>
        </div>
    </div>
    {{--END SEO CONTENT--}}


    <div style="width: 200px;">
        {!! Form::submit('Обновить', ['class' => 'btn btn-blue' ]) !!}
    </div>

    {!! Form::close() !!}

@endif
