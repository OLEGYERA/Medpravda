<div class="breadcrumb">
    <a href="{{route('medicine_admin')}}">Препараты</a>
    <span>Редактирование препарата ({{$drug->title}})</span>
</div>

@if(!empty($drug))
    <div class="top__nav">
        @if('ru' == $spec)
            <a class="btn btn__full">RU-инструкция</a>
        @else
            <a href="{{ route('medicine_edit',['spec'=>'ru', 'medicine'=> $drug->alias]) }}"
               class="btn">RU-инструкция</a>
        @endif
        @if('ua' == $spec)
            <a class="btn btn__full">UA-инструкция</a>
        @else
            <a href="{{ route('medicine_edit',['spec'=>'ua', 'medicine'=> $drug->alias]) }} "
               class="btn">UA-инструкция</a>
        @endif
        @if('aru' == $spec)
            <a class="btn btn__full">RU-адаптированная инструкция</a>
        @else
            <a href="{{ route('medicine_edit',['spec'=>'aru', 'medicine'=> $drug->alias]) }}" class="btn">RU-адаптированная
                инструкция</a>
        @endif
        @if('aua' == $spec)
            <a class="btn btn__full">UA-адаптированная инструкция</a>
        @else
            <a href="{{ route('medicine_edit',['spec'=>'aua', 'medicine'=> $drug->alias]) }}" class="btn">UA-адаптированная
                инструкция</a>
        @endif

        @if('ru' === $spec || 'ua' === $spec )
            <a href="{{ route('faq', ['spec'=>$spec, 'medicine'=>$drug->alias]) }}" class="btn">FAQ</a>
        @endif
    </div>
@endif



{!! Form::open(['url'=>route('medicine_edit',['spec'=>$spec, 'medicine'=> $drug->alias]),
                    'method' => 'post', 'class' => 'form-create', 'files'=>true]) !!}

@if('ru' == $spec)
    <div class="pop-up" style="top:190px!important;">
        <div class="pop-header">
            <h3>Дополнительные сведенья</h3>
            <div class="close"><img src="{{asset('assets/admin/imgs/close-blue.svg')}}" alt="close"></div>
        </div>
        <div class="form-inner">
            <div class="input__group">
                {!! Form::text('backcolor', old('backcolor') ? : ($drug->backcolor ?? '') ,
                     ['placeholder'=>'FFF000', 'id'=>'backcolor', 'class'=>'form-control']) !!}
                {{ Form::label('backcolor', 'Фон страницы (#)') }}
            </div>

            <div class="checkbox__several"><!--этот див если больше одного чекбокса-->
                <div class="input__group info-check label-stay"><!--чекбокс-->
                    <input type="checkbox" {{ (old('approved') || !empty($drug->approved)) ? 'checked' : '' }} value="1"
                           name="approved" id="approve{{$drug->iteration}}">
                    <label for="approve{{$drug->iteration}}" class="check-box"></label>
                    <label for="approve{{$drug->iteration}}" class="check-text">Опубликовать</label>
                </div>
                <div class="input__group info-check label-stay"><!--чекбокс-->
                    <input type="checkbox"
                           {{ (old('certified') || !empty($drug->certified)) ? 'checked' : '' }} value="1"
                           name="certified" id="certified{{$drug->iteration}}">
                    <label for="certified{{$drug->iteration}}" class="check-box"></label>
                    <label for="certified{{$drug->iteration}}" class="check-text">Сертифицирован</label>
                </div>
            </div>

            <div class="input__group">
                {!! Form::text('form', old('form') ? : ($drug->form->name ?? '') ,
                     ['placeholder'=>'ATX', 'id'=>'form', 'class'=>'form-control autocomplete',
                       'autocomplete'=>'off', 'data-id'=>$drug->form->id]) !!}
                {!! Form::hidden('form_id', old('form_id') ? : $drug->form->id, ['id'=>'form_id']) !!}
                {{ Form::label('form', 'Форма выпуска') }}
            </div>
            <div class="input__group">
                {!! Form::text('innname', old('innname') ? : ($drug->innname->title ?? '') ,
                 ['placeholder'=>'...', 'id'=>'innname', 'autocomplete'=>'off',
                    'class'=>'form-control autocomplete', 'data-id'=>$drug->innname->id]) !!}
                {!! Form::hidden('innname_id', old('innname_id') ? : $drug->innname->id, ['id'=>'innname_id']) !!}
                {{ Form::label('innname', 'Международное название') }}
            </div>
            <div class="input__group">
                {!! Form::text('classification', old('classification') ? : ($drug->classification->class ?? '') ,
                     ['placeholder'=>'ATX', 'id'=>'classification', 'class'=>'form-control autocomplete',
                       'autocomplete'=>'off', 'data-id'=>$drug->classification->class]) !!}
                {!! Form::hidden('classification_id', old('classification_id') ? : $drug->classification->id, ['id'=>'classification_id']) !!}
                {{ Form::label('classification', 'Классификация') }}
            </div>
            <div class="input__group">
                {!! Form::text('pharmagroup_name', old('pharmagroup_name') ? : ($drug->pharmagroup->title ?? '') ,
                     ['placeholder'=>'Фарм. группа', 'id'=>'pharmagroup_name', 'class'=>'form-control autocomplete',
                       'autocomplete'=>'off','data-id'=>$drug->pharmagroup->title]) !!}
                {!! Form::hidden('pharmagroup_name_id', old('pharmagroup_name_id') ? : $drug->pharmagroup->id, ['id'=>'pharmagroup_name_id']) !!}
                {{ Form::label('pharmagroup_name', 'Фарм. группа') }}
            </div>
            <div class="input__group">
                {!! Form::text('fabricator_name', old('fabricator_name') ? : ($drug->fabricator_name->title ?? '') ,
                     ['placeholder'=>'...', 'id'=>'fabricator_name', 'class'=>'form-control autocomplete',
                       'autocomplete'=>'off', 'data-id'=>$drug->fabricator_name->id]) !!}
                {!! Form::hidden('fabricator_name_id', old('fabricator_name_id') ? : $drug->fabricator_name->id, ['id'=>'fabricator_name_id']) !!}
                {{ Form::label('fabricator_name', 'Производитель') }}
            </div>
            @if(is_object($drug->substance) && $drug->substance->isNotEmpty())
                <div class="input__group">
                    <label for="substance" style="top:-18px;">Действующее вещество</label>
                    {{ Form::select('substance[]', $substance, $drug->substance, ['multiple' => 'multiple', 'class'=>'form-control substance', 'style'=>"max-width: 100%;"]) }}
                    {!! Form::hidden('substance_id[]', old('substance_id') ? : $drug->substance[0]->id, ['id'=>'substance_id']) !!}
                </div>
            @endif
            <div class="info-but" style="margin-top: 30px;">
                {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
            </div>
        </div>
    </div>
@endif

<div class="wrap__block">

    <div class="two__column"><!--две колонки-->
        <div>
            <h2>Редактирование препaрата</h2>
        </div>
        <div>
            @if('ru' == $spec)
                <a href="javascript:void(0)" class="btn btn__plus add-info">
                    <!--кнопка с иконками, в основном открывает попап-->
                    Дополнительные сведенья
                </a>
            @endif
        </div>
        <div class="input__group">
            {!! Form::text('title', old('title') ? : $drug->title,
                        ['placeholder' => 'Название преперата', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
            {{ Form::label('title', 'Название') }}
        </div>
        @if('ru' == $spec)
            <div class="input__group">
                {!! Form::text('alias', old('alias') ? : ($drug->alias ?? '') ,
                             ['placeholder'=>'aspirin', 'id'=>'alias', 'class'=>'form-control eng-alias']) !!}
                {{ Form::label('alias', 'URL страницы') }}
            </div>
        @endif
        <div class="input__group">
            {!! Form::text('reg', old('reg') ? : ($drug->reg ?? ''),
                           ['placeholder' => 'Регистрация', 'id'=>'reg', 'class'=>'form-control']) !!}
            {{ Form::label('reg', 'Регистрация') }}
        </div>
        <div class="input__group">
            {!! Form::text('dose', old('dose') ? : ($drug->dose ?? ''),
                            ['placeholder' => 'Дозировка', 'id'=>'dose', 'class'=>'form-control']) !!}
            {{ Form::label('dose', 'Дозировка') }}
        </div>
        <div class="input__group" style="display: flex; margin-bottom: 15px;">
            <label for="editor" style="position: relative; top: 3px; color: #0a0a0a; margin-right: 15px;">Редактор</label>
            <select name="editor" id="editor" class = 'form-control substance' style = "max-width: 100%;">
            @foreach($editors as $editor)
                @if($editor->id == $drug->editor)
                        <option value="{{$editor->id}}" selected>{{$editor->last_name}} {{$editor->first_name}} {{$editor->middle_name}}</option>
                    @else
                        <option value="{{$editor->id}}" selected>{{$editor->last_name}} {{$editor->first_name}} {{$editor->middle_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <hr>
    </div>
    <div class="two__column">
        <div>
            <h3>Слайдер</h3>
            @include('admin.medicine.image-select-section')
        </div>
        <div>
            <h3>Новый елемент слайдера</h3>
            <label class="input__file"><!--картинка загузить-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small></small></span>
                {!! Form::file('slider[]', ['accept'=>'image/*', 'class'=>'file', 'id' => 'slider_img']) !!}
            </label>

            <div class="input__group">
                {!! Form::text('imgalt[]', null,
                                            ['placeholder'=>'Alt', 'id'=>'imgalt', 'class'=>'form-control']) !!}
                {{ Form::label('imgalt', 'Alt image') }}
            </div>
            <div class="input__group">
                {!! Form::text('imgtitle[]', null,
                                            ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
                {{ Form::label('imgtitle', 'Title image') }}
            </div>
        </div>
    </div>
</div>

@include('admin.medicine.content-block', $drug)

<!-- SEO -->
<div class="wrap__block">
    <h2>SEO контент</h2>
    <div class="two__column">
        <div>
            <div class="input__group">
                {!! Form::text('seo_title', old('seo_title') ? : ($drug->seo->seo_title ?? '') ,
                ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
                {{ Form::label('seo_title', 'SEO_TITLE') }}
            </div>
            <div class="input__group">
                {!! Form::text('seo_description', old('seo_description') ? : ($drug->seo->seo_description ?? '') ,
                        ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
                {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
            </div>
        </div>
        <div>
            <div class="input__group">
                {!! Form::text('og_image', old('og_image') ? : ($drug->seo->seo_image ?? '') ,
                        ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
                {{ Form::label('og_image', 'OG_IMAGE') }}
            </div>
            <div class="input__group">
                {!! Form::text('og_title', old('og_title') ? : ($drug->seo->og_title ?? '') ,
                        ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}
                {{ Form::label('og_title', 'OG_TITLE') }}
            </div>
            <div class="input__group">

                {!! Form::text('og_description', old('og_description') ? : ($drug->seo->og_description ?? '') ,
                          ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control', 'rows'=>20]) !!}
                {{ Form::label('og_description', 'OG_DESCRIPTION') }}
            </div>
        </div>
    </div>
    <h3>SEO_TEXT</h3>

    <textarea name="seo_text" class="form-control"
              rows="20">{!! old('seo_text') ? : ($drug->seo->seo_text ?? '') !!}</textarea>
</div>
<div>
    {!! Form::button('Сохранить', ['class' => 'btn btn__full buttn-save','type'=>'submit']) !!}
</div>
<!-- SEO -->

{{--popup sections--}}
{!! Form::close() !!}


<div class="shablon" style="display:none">
    <div>
        {!! Form::file('slider[]', ['accept'=>'image/*', 'class'=>'form-control']) !!}
        <span class="remove-this"><button type="button" class="btn btn-danger">-</button></span>
        {{ Form::label('imgalt', 'Параметры картинки') }}
        <div class="">
            <div class="col-lg-6">
                {!! Form::text('imgalt[]', null,
                                ['placeholder'=>'Alt', 'id'=>'imgalt', 'class'=>'form-control']) !!}
            </div>
            <div class="col-lg-6">
                {!! Form::text('imgtitle[]', null,
                                ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
            </div>
            <hr>
        </div>
    </div>
    <hr>
</div>
<div class="shablon-substance" style="display:none">
    <div>
        {!! Form::text('substance[]', null, ['placeholder'=>'...', 'class'=>'form-control autocomplete',
              'autocomplete'=>'off']) !!}
        {!! Form::hidden('substance_id[]') !!}
        <span class="remove-this"><button type="button" class="btn btn-danger">-</button></span>
    </div>
</div>

