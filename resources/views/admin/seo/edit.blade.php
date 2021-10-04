<div class="breadcrumb">
    <span>Редактирование SEO </span>
</div>

@include('admin.static.nav')

{!! Form::open(['url'=>route('seo_update', $seo->id), 'method'=>'post', 'class'=>'form-horizontal']) !!}


<div class="wrap__block">
    <h2>URI: "{{ $seo->uri }}"</h2>

    <div class="input__group">
        {!! Form::text('seo_title', old('seo_title') ? : ($seo->seo_title ?? '') ,
        ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
        {{ Form::label('seo_title', 'SEO_TITLE') }}
    </div>

    <div class="input__group">
        {!! Form::text('seo_description', old('seo_description') ? : ($seo->seo_description ?? '') ,
        ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
        {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
    </div>

    <div class="input__group">
        {!! Form::text('og_image', old('og_image') ? : ($seo->og_image ?? '') ,
        ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
        {{ Form::label('og_image', 'OG_IMAGE') }}
    </div>

    <div class="input__group">
        {!! Form::text('og_description', old('og_description') ? : ($seo->og_description ?? '') ,
        ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control']) !!}
        {{ Form::label('og_description', 'OG_DESCRIPTION') }}
    </div>

    <h3>SEO_TEXT</h3>

    <textarea name="seo_text"
              class="form-control editor">{!! old('seo_text') ? : ($seo->seo_text ?? '') !!}</textarea>

    <div>
        {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>
</div>

{!! Form::close() !!}
<!-- SEO -->