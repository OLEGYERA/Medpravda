<div class="breadcrumb">
    <a href="{{url('admin/cosmetics')}}">Косметические средства</a>
    <span>
        Редактирование косметического средства
    </span>
</div>


@include('admin.cosmetics.nav')

@include('admin.cosmetics.tabs')

{!! Form::open(['url'=>route('cosmetics.update', ['cosmetic'=>$model->slug]),
                    'method' => 'put', 'class' => 'form-horizontal', 'files'=>true]) !!}

<div class="wrap__block">
    <h2>Редактирование косметического средства</h2>
    <div class="two__column">
        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('title', $model->title,
                            ['placeholder' => 'Название диетической добавки', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
            {{ Form::label('title', 'Название') }}
        </div>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('slug', $model->slug??null,
                     ['placeholder'=>'aspirin', 'id'=>'slug', 'class'=>'form-control eng-alias']) !!}
            {{ Form::label('slug', 'URL страницы') }}
        </div>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('reg', $model->reg,
                            ['placeholder' => 'Регистрация', 'id'=>'reg', 'class'=>'form-control']) !!}
            {{ Form::label('reg', 'Регистрация') }}
        </div>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('dose', $model->dose,
                           ['placeholder' => 'Дозировка', 'id'=>'dose', 'class'=>'form-control']) !!}
            {{ Form::label('dose', 'Дозировка') }}
        </div>
    </div>
</div>

@include('layouts.admin.update_tools_general', ['modelname'=>'cosmetic'])
{{--Content--}}
@include('admin.cosmetics.sections', ['drug'=>$model])
{{--Content--}}
{{-- Слайдер --}}
@include('admin.cosmetics.slider')
{{-- Слайдер --}}
<hr>

@include('layouts.admin.single_seo')

{!! Form::button('Сохранить', ['class' => 'btn btn-blue','type'=>'submit']) !!}
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