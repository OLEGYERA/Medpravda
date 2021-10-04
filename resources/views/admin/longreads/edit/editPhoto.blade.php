<div class="breadcrumb">
    <a href="{{route('longreads')}}">Лонгриды</a>
    <span>Редактирование Лонгрида</span>
</div>

@include('admin.longreads.nav')
@include('admin.longreads.aside', ['id' => $longread_img->longreads_id])

{!! Form::open(['url'=>route('longread_edit_photo', ['id' =>$longread_img->longreads_id]), 'method'=>'POST', 'class'=>'form-horizontal', 'files'=>true]) !!}


<div class="lg">
    <div class="wrap__block lg-2">
        <h2>Лонгрид Ru</h2>
        <div class="input__group">
            {!! Form::text('title', old('title') ? : ($longread_img->title ?? '') , ['placeholder'=>'Заголовок изображения', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
            {{ Form::label('title', 'Заголовок страницы') }}
        </div>

        <div class="input__group">
            {!! Form::text('alt', old('alt') ? : ($longread_img->alt ?? '') ,
                     ['placeholder'=>'Описание изображения', 'id'=>'alt', 'class'=>'form-control']) !!}
            {{ Form::label('alt', 'Описание страницы(160 символов)') }}
        </div>

        <div class="lg-box-img">
            <img src="{{$longread_img->path}}" alt="">
        </div>

        <label class="input__file">
            <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(450х300, не более 5Мб)</small></span>
            {!! Form::file('lg_img', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
        </label>


    </div>
    <div class="wrap__block lg-2">
        <h2>Лонгрид Ua</h2>

        <div class="input__group">
            {!! Form::text('utitle', old('utitle') ? : ($longread_img->utitle ?? '') , ['placeholder'=>'Заголовок зображення', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
            {{ Form::label('utitle', 'Заголовок страницы') }}
        </div>

        <div class="input__group">
            {!! Form::text('ualt', old('ualt') ? : ($longread_img->alt ?? '') ,
                     ['placeholder'=>'Опис зображення', 'id'=>'ualt', 'class'=>'form-control']) !!}
            {{ Form::label('ualt', 'Опис зображення(160 символов)') }}
        </div>

        <div class="lg-box-img">
            <img src="{{$longread_img->upath}}" alt="">
        </div>

        <label class="input__file">
            <span class="btn" data-default='Завантажити файл'>Завантажити файл <small>(450х300, не более 5Мб)</small></span>
            {!! Form::file('lg_img_ua', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img_ua']) !!}
        </label>


    </div>
</div>




{!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
{!! Form::close() !!}

