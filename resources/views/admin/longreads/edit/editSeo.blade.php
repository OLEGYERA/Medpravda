<div class="breadcrumb">
    <a href="{{route('longreads')}}">Лонгриды</a>
    <span>Редактирование Лонгрида <b>[SEO]</b></span>
</div>

@include('admin.longreads.nav')
@include('admin.longreads.aside', ['id' => $longread_seo->longreads_id])

{!! Form::open(['url'=>route('longread_edit_seo', ['id' =>$longread_seo->longreads_id]), 'method'=>'POST', 'class'=>'form-horizontal']) !!}


<div class="lg">
    <div class="wrap__block lg-2">
        <h2>Лонгрид Ru</h2>
        <div class="input__group">
            {!! Form::text('seo_title', old('seo_title') ? : ($longread_seo->seo_title ?? '') , ['placeholder'=>'Заголовок SEO', 'id'=>'seo_title', 'class'=>'form-control']) !!}
            {{ Form::label('seo_title', 'Заголовок SEO') }}
        </div>

        <div class="input__group">
            {!! Form::text('seo_description', old('seo_description') ? : ($longread_seo->seo_description ?? '') , ['placeholder'=>'Описание SEO', 'id'=>'seo_description', 'class'=>'form-control']) !!}
            {{ Form::label('seo_description', 'Описание SEO') }}
        </div>

        <div class="input__group">
            {!! Form::text('og_image', old('og_image') ? : ($longread_seo->og_image ?? '') , ['placeholder'=>'Ссылка на изображение OG', 'id'=>'og_image', 'class'=>'form-control']) !!}
            {{ Form::label('og_image', 'Ссылка на изображение OG') }}
        </div>

        <div class="input__group">
            {!! Form::text('og_title', old('og_title') ? : ($longread_seo->og_title ?? '') , ['placeholder'=>'Заголовок OG', 'id'=>'og_title', 'class'=>'form-control']) !!}
            {{ Form::label('og_title', 'Заголовок OG') }}
        </div>

        <div class="input__group">
            {!! Form::text('og_description', old('og_description') ? : ($longread_seo->og_description ?? '') , ['placeholder'=>'Описание OG', 'id'=>'og_description', 'class'=>'form-control']) !!}
            {{ Form::label('og_description', 'Описание OG') }}
        </div>



    </div>
    <div class="wrap__block lg-2">
        <h2>Лонгрид Ua</h2>

        <div class="input__group">
            {!! Form::text('useo_title', old('useo_title') ? : ($longread_seo->useo_title ?? '') , ['placeholder'=>'Заголовок SEO', 'id'=>'useo_title', 'class'=>'form-control']) !!}
            {{ Form::label('useo_title', 'Заголовок SEO') }}
        </div>

        <div class="input__group">
            {!! Form::text('useo_description', old('useo_description') ? : ($longread_seo->useo_description ?? '') , ['placeholder'=>'Описание SEO', 'id'=>'useo_description', 'class'=>'form-control']) !!}
            {{ Form::label('useo_description', 'Описание SEO') }}
        </div>

        <div class="input__group">
            {!! Form::text('uog_image', old('uog_image') ? : ($longread_seo->uog_image ?? '') , ['placeholder'=>'Ссылка на изображение OG', 'id'=>'uog_image', 'class'=>'form-control']) !!}
            {{ Form::label('uog_image', 'Ссылка на изображение OG') }}
        </div>

        <div class="input__group">
            {!! Form::text('uog_title', old('uog_title') ? : ($longread_seo->uog_title ?? '') , ['placeholder'=>'Заголовок OG', 'id'=>'uog_title', 'class'=>'form-control']) !!}
            {{ Form::label('uog_title', 'Заголовок OG') }}
        </div>

        <div class="input__group">
            {!! Form::text('uog_description', old('uog_description') ? : ($longread_seo->uog_description ?? '') , ['placeholder'=>'Описание OG', 'id'=>'uog_description', 'class'=>'form-control']) !!}
            {{ Form::label('uog_description', 'Описание OG') }}
        </div>


    </div>
</div>




{!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
{!! Form::close() !!}

