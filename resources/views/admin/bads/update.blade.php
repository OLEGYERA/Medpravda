<div class="breadcrumb">
    <a href="{{url('admin/bads')}}">Диетические добавки</a>
    <span>
        Редактирование диетической добавки
    </span>
</div>
@include('admin.bads.nav')

@include('admin.bads.tabs')

{!! Form::open(['url'=>route('bads.update', ['bad'=>$model->slug]),
                    'method' => 'put', 'class' => 'form-create', 'files'=>true]) !!}

{{--POPUP WITH GENERAL INFORMATION--}}
@include('layouts.admin.update_tools_general', ['modelname'=>'bad'])

<div class="wrap__block">
        <h2>Создание диетической добавки</h2>

    <div class="input__group">
        {!! Form::text('title', $model->title,
                        ['placeholder' => 'Название диетической добавки', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
        {{ Form::label('title', 'Название') }}
    </div>

    <div class="input__group">
        {!! Form::text('slug', $model->slug??null,
                 ['placeholder'=>'aspirin', 'id'=>'slug', 'class'=>'form-control eng-alias']) !!}
        {{ Form::label('slug', 'URL страницы') }}
    </div>

    <div class="input__group">
        {!! Form::text('reg', $model->reg,
                        ['placeholder' => 'Регистрация', 'id'=>'reg', 'class'=>'form-control']) !!}
        {{ Form::label('reg', 'Регистрация') }}
    </div>

    <div class="input__group">
        {!! Form::text('dose', $model->dose,
                       ['placeholder' => 'Дозировка', 'id'=>'dose', 'class'=>'form-control']) !!}
        {{ Form::label('dose', 'Дозировка') }}
    </div>

</div>


{{--Content--}}
@include('admin.bads.sections', ['drug'=>$model])
{{--Content--}}
{{-- Слайдер --}}
@include('admin.bads.slider')
{{-- Слайдер --}}
  

@include('layouts.admin.single_seo')

{!! Form::button('Сохранить', ['class' => 'btn btn-blue','type'=>'submit']) !!}
{!! Form::close() !!}

{{--Slider--}}
<div class="shablon" style="display:none">
    <div>
        {!! Form::file('slider[]', ['accept'=>'image/*', 'class'=>'form-control']) !!}
        <span class="remove-this"><button type="button" class="btn btn-blue">-</button></span>
        <div class="bads_edit_form">
            <div class="col-lg-6">
                {!! Form::text('imgalt[]', null,
                                ['placeholder'=>'Alt', 'id'=>'imgalt', 'class'=>'form-control']) !!}
                {{ Form::label('imgalt', 'Параметры картинки') }}
            </div>
            <div class="col-lg-6">
                {!! Form::text('imgtitle[]', null,
                                ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
                {{ Form::label('imgtitle', 'Описание картинки') }}
            </div>
              
        </div>
    </div>
</div>
{{--Slider--}}