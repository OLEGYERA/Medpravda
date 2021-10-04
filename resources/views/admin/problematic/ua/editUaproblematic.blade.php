{{--@if($problematic->root_page)--}}
        <div class="breadcrumb">

            {!! $bread_crumb !!}

        </div>


        <div class="top__nav">
            {!! Form::open(['url' => route('problematic.edit', $problematic->get_ru()),'class'=>'form-horizontal','method'=>'GET']) !!}
            {!! Form::button('Редактировать RU', ['class' => 'btn btn__full','type'=>'submit']) !!}
            {!! Form::close() !!}
        </div>
        {!! Form::open([
            'method' => 'POST',
            'route' => array('ua.problematic.update', $id),
            'class' => 'form-horizontal',
            'files'=>true
        ]) !!}
        {!! Form::hidden('root_id',$id) !!}
        <div class="wrap__block">
            <h2>{{$problematic->title}} / UA-версия</h2>
            <div class="input__group">
                <input type="text" class="form-control ru-title" name="title" value="{{old('title',$problematic->title)}}">
                <label for="title">Название </label>
            </div>
            <div class="input__group info-check label-stay"><!--чекбокс-->
                <input type="checkbox" name="approved" id="approved" class="cosmetics-checkbox" value="1" @if($problematic->approved) checked @endif>
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
                                data-img="{{ $problematic->id }}" data-src="ua">x
                        </button>

                    @endif
                </div>
            @endif
            <label class="input__file"><!--картинка загузить-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>до 5 Мб</small></span>
                {!! Form::file('path', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>


            <div class="">
                <h3 for="approved">Контент</h3>
                <textarea name="content" id="content" name="content" class="form-control editor" cols="30" rows="50" >
                    {{old('content', $problematic->content)}}
                </textarea>
            </div>
        </div>
        {{--SEO CONTENT--}}

        <div class="wrap__block">
                <h2>SEO контент </h2>
            <div class="input__group">
                {!! Form::text('seo_title', $problematic->seo ? json_decode($problematic->seo)->seo_title : '', ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
                {{ Form::label('seo_title', 'SEO_TITLE') }}
            </div>
            <div class="input__group">
                {!! Form::text('seo_description', $problematic->seo ? json_decode($problematic->seo)->seo_description : '', ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
                {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
            </div>
            <div class="input__group">

                {!! Form::text('og_image', $problematic->seo ? json_decode($problematic->seo)->og_image : '', ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
                {{ Form::label('og_image', 'OG_IMAGE') }}
            </div>
            <div class="input__group">
                {!! Form::text('og_title', $problematic->seo ? json_decode($problematic->seo)->og_title : '', ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}
                {{ Form::label('og_title', 'OG_TITLE') }}
            </div>
            <div class="input__group">
                {!! Form::text('og_description', $problematic->seo&&isset(json_decode($problematic->seo)->og_description) ? json_decode($problematic->seo)->og_description : '', ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control']) !!}
                {{ Form::label('og_description', 'OG_DESCRIPTION') }}
            </div>
            <div class="textarea-edit">
                <h3>SEO TEXT</h3>
                <textarea name="seo_text" rows="10"
                          class="form-control ">{!! $problematic->seo ? json_decode($problematic->seo)->seo_text : '' !!}</textarea>

            </div>
        </div>
        {{--END SEO CONTENT--}}


            {!! Form::submit('Обновить', ['class' => 'btn btn__full' ]) !!}

        {!! Form::close() !!}


{{--@else--}}
    {{--<div class="breadcrumb">--}}
        {{--{!! $bread_crumb !!}--}}
    {{--</div>--}}
    {{--<div class="top__nav">--}}
        {{--{!! Form::open(['url' => route('problematic.edit', $problematic->get_ru()), 'class'=>'form-horizontal','method'=>'GET']) !!}--}}
        {{--{!! Form::button('Редактировать RU', ['class' => 'btn','type'=>'submit']) !!}--}}
        {{--{!! Form::close() !!}--}}
    {{--</div>--}}
    {{--<div class="wrap__block"> <!--белый блок-->--}}
        {{--<h2>{{$problematic->title}} / RU-версия</h2>--}}

        {{--{!! Form::open([--}}
            {{--'method' => 'POST',--}}
            {{--'route' => array('ua.problematic.update', $id),--}}
            {{--'class' => 'form-horizontal'--}}
        {{--]) !!}--}}

        {{--{!! Form::hidden('root_id',$id) !!}--}}
        {{--<div class="input__group"><!--обычный инпут-->--}}
            {{--<input type="text" class="form-control ru-title" name="title"--}}
                   {{--value="{{old('title',$problematic->title)}}">--}}
            {{--<label for="title">Название</label>--}}
        {{--</div>--}}

        {{--<div class="input__group info-check label-stay"><!--чекбокс-->--}}
            {{--<input type="checkbox" name="approved" class="cosmetics-checkbox" value="1" id="approved"--}}
                   {{--@if($problematic->approved) checked @endif>--}}
            {{--<label for="approved" class="check-box"></label>--}}
            {{--<label for="approved" class="check-text">Отображать директорию</label>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--SEO CONTENT--}}

    {{--<div class="wrap__block"> <!--белый блок-->--}}
        {{--<h2>SEO контент</h2>--}}
        {{--<div class="two__column"><!--две колонки-->--}}

            {{--<div class="input__group"><!--обычный инпут-->--}}
            {{--{!! Form::text('seo_title', $problematic->seo ? json_decode($problematic->seo)->seo_title : '', ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}--}}
            {{--{{ Form::label('seo_title', 'SEO_TITLE') }}--}}
        {{--</div>--}}
        {{--<div class="input__group"><!--обычный инпут-->--}}
            {{--{!! Form::text('seo_keywords', $problematic->seo ? json_decode($problematic->seo)->seo_keywords : '', ['placeholder'=>'seo_keywords', 'id'=>'seo_keywords', 'class'=>'form-control']) !!}--}}
            {{--{{ Form::label('seo_keywords', 'SEO_KEYWORDS') }}--}}
        {{--</div>--}}
        {{--<div class="input__group"><!--обычный инпут-->--}}
            {{--{!! Form::text('seo_description', $problematic->seo ? json_decode($problematic->seo)->seo_description : '', ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}--}}
            {{--{{ Form::label('seo_description', 'SEO_DESCRIPTION') }}--}}
        {{--</div>--}}
        {{--<div class="input__group"><!--обычный инпут-->--}}
            {{--{!! Form::text('og_image', $problematic->seo ? json_decode($problematic->seo)->og_image : '', ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}--}}
            {{--{{ Form::label('og_image', 'OG_IMAGE') }}--}}
        {{--</div>--}}
        {{--<div class="input__group"><!--обычный инпут-->--}}
            {{--{!! Form::text('og_title', $problematic->seo ? json_decode($problematic->seo)->og_title : '', ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}--}}
            {{--{{ Form::label('og_title', 'OG_TITLE') }}--}}
        {{--</div>--}}
        {{--<div class="input__group"><!--обычный инпут-->--}}
            {{--{!! Form::text('og_description', $problematic->seo ? json_decode($problematic->seo)->og_description : '' , ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control']) !!}--}}
            {{--{{ Form::label('og_description', 'OG_DESCRIPTION') }}--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<h3>SEO TEXT</h3>--}}
        {{--<textarea name="seo_text"--}}
                  {{--rows="10">{!! $problematic->seo ? json_decode($problematic->seo)->seo_text : '' !!}</textarea>--}}
    {{--</div>--}}
    {{--END SEO CONTENT--}}
    {{--{!! Form::submit('Обновить', ['class' => 'btn btn__full' ]) !!}--}}
    {{--{!! Form::close() !!}--}}

{{--@endif--}}
