<div class="breadcrumb">
    <a href="{{url('admin/cosmetics')}}">Косметические средства</a>
    <span> Создание косметических средств</span>
</div>
@include('admin.cosmetics.nav')
{!! Form::open(['url'=>route('cosmetics.store'),
                    'method' => 'post', 'class' => 'form-horizontal', 'files'=>true]) !!}


<div class="wrap__block">
        <h2>Создание косметического средства</h2>


    <div class="input__group"><!--обычный инпут-->
        {!! Form::text('title', null,
                    ['placeholder' => 'Название косметического средства', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
        {{ Form::label('title', 'Название') }}
    </div>

    <div class="input__group"><!--обычный инпут-->
        {!! Form::text('slug', null,
                 ['placeholder'=>'aspirin', 'id'=>'slug', 'class'=>'form-control eng-alias']) !!}
        {{ Form::label('slug', 'URL страницы') }}
    </div>

    <div class="input__group"><!--обычный инпут-->
        {!! Form::text('reg', null,
                        ['placeholder' => 'Регистрация', 'id'=>'reg', 'class'=>'form-control']) !!}
        {{ Form::label('reg', 'Регистрация') }}
    </div>

    <div class="input__group"><!--обычный инпут-->
        {!! Form::text('dose', null,
                        ['placeholder' => 'Дозировка', 'id'=>'dose', 'class'=>'form-control']) !!}

        {{ Form::label('dose', 'Дозировка') }}
    </div>
</div>


@include('layouts.admin.tools_general', ['modelname'=>'cosmetic'])
{{--Content--}}
@include('admin.cosmetics.sections')
{{--Content--}}
{{-- Слайдер --}}
@include('admin.cosmetics.slider')
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