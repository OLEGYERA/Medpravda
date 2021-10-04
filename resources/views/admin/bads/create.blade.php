<div class="breadcrumb">
    <a href="{{route('bads.index')}}">диетические добавки</a>
    <span>Создание диетической добавки</span>
</div>


@include('admin.bads.nav')

{!! Form::open(['url'=>route('bads.store'),
                    'method' => 'post', 'class' => 'form-create', 'files'=>true]) !!}


@include('layouts.admin.tools_general', ['modelname'=>'bad'])


<div class="wrap__block two__column">
    <div>
        <h2>Создание диетической добавки</h2>
    </div>
    <div>
        <a href="javascript:void(0)" class="btn btn__plus">
            Общее
        </a>
    </div>
    <div class="input__group">

        {!! Form::text('title', null,
                    ['placeholder' => 'Название диетической добавки', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
        {{ Form::label('title', 'Название') }}
    </div>

    <div class="input__group">

        {!! Form::text('slug', null,
                 ['placeholder'=>'aspirin', 'id'=>'slug', 'class'=>'form-control eng-alias']) !!}
        {{ Form::label('slug', 'URL страницы') }}
    </div>

    <div class="input__group">
        {!! Form::text('reg', null,
                        ['placeholder' => 'Регистрация', 'id'=>'reg', 'class'=>'form-control']) !!}
        {{ Form::label('reg', 'Регистрация') }}
    </div>

    <div class="input__group">
        {!! Form::text('dose', null,
                        ['placeholder' => 'Дозировка', 'id'=>'dose', 'class'=>'form-control']) !!}

        {{ Form::label('dose', 'Дозировка') }}
    </div>
</div>


{{--Content--}}
@include('admin.bads.sections')
{{--Content--}}
{{-- Слайдер --}}
@include('admin.bads.slider')
{{-- Слайдер --}}

@include('layouts.admin.single_seo')

{!! Form::button('Добавить', ['class' => 'btn btn__full','type'=>'submit']) !!}
{!! Form::close() !!}

{{--Slider--}}
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
{{--Slider--}}