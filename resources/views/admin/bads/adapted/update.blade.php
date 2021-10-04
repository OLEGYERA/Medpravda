<div class="breadcrumb">
    <a href="{{route('bads.index')}}">диетические добавки</a>
    <span>Создание диетической добавки</span>
</div>

@include('admin.bads.nav')

@include('admin.bads.tabs')

{!! Form::open(['url'=>route('bads-adapted.update', ['bad_adapted'=>$model->slug]),
                    'method' => 'put', 'class' => 'form-create', 'files'=>true]) !!}
<div class="wrap__block">
        <h2>Редактирование диетической добавки</h2>


    <div class="input__group">
        {!! Form::text('title', $model->title,
                        ['placeholder' => 'Название диетической добавки', 'id'=>'title', 'class'=>'form-control ru-title']) !!}

        {{ Form::label('title', 'Название') }}
    </div>

</div>


{{--Content--}}
@include('admin.bads.sections', ['drug'=>$model])
{{--Content--}}
{{-- Слайдер --}}
@include('admin.bads.slider')
{{-- Слайдер --}}

@include('layouts.admin.single_seo')

{!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
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
            </div>
            <hr>
        </div>
    </div>
    <hr>
</div>
{{--Slider--}}