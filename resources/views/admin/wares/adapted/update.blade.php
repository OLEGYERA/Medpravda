<div class="breadcrumb">
    <a href="{{url('admin/wares')}}">Мед изделия</a>
    <span>
        Редактирование мед изделия
    </span>
</div>

@include('admin.wares.nav')

@include('admin.wares.tabs')

{!! Form::open(['url'=>route('wares-adapted.update', ['ware_adapted'=>$model->slug]),
                    'method' => 'put', 'class' => 'form-create', 'files'=>true]) !!}
<div class="wrap__block">
    <h2>Редактирование мед изделия</h2>

    <div class="input__group">
        {!! Form::text('title', $model->title,
                        ['placeholder' => 'Название мед изделия', 'id'=>'title', 'class'=>'form-control ru-title']) !!}

        {{ Form::label('title', 'Название') }}
    </div>

</div>
{{--Content--}}
@include('admin.wares.sections', ['drug'=>$model])
{{--Content--}}
{{-- Слайдер --}}
@include('admin.wares.slider')
{{-- Слайдер --}}


@include('layouts.admin.single_seo')

{!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
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