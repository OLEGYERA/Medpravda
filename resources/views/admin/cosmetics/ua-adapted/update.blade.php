<div class="breadcrumb">
    <a href="{{url('admin/cosmetics')}}">Косметические средства</a>
    <span>
        Редактирование UA-адаптированной инструкции
    </span>
</div>

@include('admin.cosmetics.nav')
@include('admin.cosmetics.tabs')

{!! Form::open(['url'=>route('cosmetics-ua-adapted.update', ['cosmetic_adapted'=>$model->slug]),
                    'method' => 'put', 'class' => 'form-horizontal', 'files'=>true]) !!}
<div class="wrap__block"> <!--белый блок-->
    <h2>Редактирование косметического средства</h2>
    <div class="input__group"><!--обычный инпут-->
        {!! Form::text('title', $model->title,
                        ['placeholder' => 'Название косметического средства', 'id'=>'title', 'class'=>'form-control ru-title']) !!}

        {{ Form::label('title', 'Название') }}
    </div>
</div>

{{--Content--}}
@include('admin.cosmetics.sections', ['drug'=>$model])
{{--Content--}}

{{-- Слайдер --}}
@include('admin.cosmetics.slider')
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