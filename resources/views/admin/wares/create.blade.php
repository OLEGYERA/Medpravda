<div class="breadcrumb">
    <a href="{{url('admin/wares')}}">медицинские изделия</a>
    <span>Создание мед изделия</span>
</div>

@include('admin.wares.nav')


{!! Form::open(['url'=>route('wares.store'),
                    'method' => 'post', 'class' => 'form-create', 'files'=>true]) !!}

@include('layouts.admin.tools_general', ['modelname'=>'ware'])

<div class="wrap__block">
        <h2>Создание мед изделия</h2>


    <div class="input__group">
        {{ Form::label('title', 'Название') }}
        {!! Form::text('title', null,
                   ['placeholder' => 'Название мед изделия', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
    </div>

    <div class="input__group">
        {{ Form::label('slug', 'URL страницы') }}
        {!! Form::text('slug', null,
                 ['placeholder'=>'aspirin', 'id'=>'slug', 'class'=>'form-control eng-alias']) !!}
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
@include('admin.wares.sections')
{{--Content--}}
{{-- Слайдер --}}
@include('admin.wares.slider')
{{-- Слайдер --}}
<hr>

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