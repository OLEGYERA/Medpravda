<div class="breadcrumb">
    <a href="{{route('longreads')}}">Лонгриды</a>
    <span>Редактирование Лонгрида</span>
</div>

@include('admin.longreads.nav')
@include('admin.longreads.aside', ['id' => $longread->id])

{!! Form::open(['url'=>route('longread_edit_main', ['id' => $longread->id]), 'method'=>'POST', 'class'=>'form-horizontal']) !!}


<div class="wrap__block lg">
    <h2>Лонгрид Ru</h2>
    <div class="input__group">
        {!! Form::text('title', old('title') ? : ($longread->title ?? '') , ['placeholder'=>'Заголовок страницы', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
        {{ Form::label('title', 'Заголовок страницы') }}
    </div>

    <div class="input__group">
        {!! Form::text('description', old('description') ? : ($longread->description ?? '') ,
                 ['placeholder'=>'Описание страницы', 'id'=>'description', 'class'=>'form-control']) !!}
        {{ Form::label('description', 'Описание страницы(160 символов)') }}
    </div>


    <div class="input__group info-check label-stay">
        <input type="checkbox" {{ (old('confirmed_ru') || !empty($longread->approved)) ? 'checked' : '' }} value="1" name="confirmed_ru" id="confirmed_ru">
        <label for="confirmed_ru" class="check-box"></label>
        <label for="confirmed_ru" class="check-text">Опубликовать</label>
    </div>


</div>

<div class="wrap__block lg">
    <h2>Лонгрид Ua</h2>
    <div class="input__group">
        {!! Form::text('utitle', old('utitle') ? : ($longread->utitle ?? '') , ['placeholder'=>'Заголовок сторінки', 'id'=>'utitle', 'class'=>'form-control']) !!}
        {{ Form::label('utitle', 'Заголовок сторінки') }}
    </div>

    <div class="input__group">
        {!! Form::text('udescription', old('udescription') ? : ($longread->udescription ?? '') ,
                 ['placeholder'=>'Опис сторінки', 'id'=>'udescription', 'class'=>'form-control']) !!}
        {{ Form::label('udescription', 'Опис сторінки(160 символів)') }}
    </div>


    <div class="input__group info-check label-stay">
        <input type="checkbox" {{ (old('confirmed_ua') || !empty($longread->uapproved)) ? 'checked' : '' }} value="1" name="confirmed_ua" id="confirmed_ua">
        <label for="confirmed_ua" class="check-box"></label>
        <label for="confirmed_ua" class="check-text">Опублікувати</label>
    </div>


</div>

<div class="wrap__block lg">
    <h2>Лонгрид Настройка</h2>

    <div class="input__group label-stay">
        <input type="text" name="outputtime" id="outputtime"
               value="{{ old('outputtime') ? : (date('Y-m-d H:i', strtotime($longread->created_at)) ?? date('Y-m-d H:i'))}}">
        {!! Form::label('outputtime', 'Дата публикации') !!}
    </div>

    <div class="input__group">
        {!! Form::text('alias', old('alias') ? : ($longread->alias ?? '') , ['placeholder'=>'psevdonim-stranici', 'id'=>'alias', 'class'=>'form-control eng-alias']) !!}
        {{ Form::label('alias', 'URL страницы') }}
    </div>

{{--!!!--}}
    <div class="input__group">
        {!! Form::text('priority',  old('priority') ? : ($longread->priority ?? 0) ,
                 ['placeholder'=>'priority', 'id'=>'priority', 'class'=>'form-control']) !!}
        {{ Form::label('priority', 'Приоритет(0-255)') }}
    </div>

    <div class="input__group">
        <select value="{{ old('template_id') ? : null}}" id="template_id" name="template_id" style="width: 100%; margin-bottom: 10px;" placeholder = 'Выберите шаблон'>
            @foreach($longread_templates as $longread_template)
                @if($longread_template->id == $longread->longread_template_id)
                    <option value="{{$longread_template->id}}" selected> {{$longread_template->title}}</option>
                @else
                    <option value="{{$longread_template->id}}">{{$longread_template->title}}</option>
                @endif
            @endforeach
        </select>
    </div>

</div>
{!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
{!! Form::close() !!}

