{!! Form::open(['url' => route('atx_update',['atx'=> $class->id]),'method'=>'POST' ]) !!}
<div class="breadcrumb">
    <span>ATX</span>
</div>

<div class="wrap__block">
    <h2>ATX: {{ $class->class ?? '' }}</h2>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('name', old('name') ? : ($class->name ?? ''),
                                ['placeholder'=>'Средства, влияющие на...', 'id'=>'name', 'class'=>'form-control']) !!}
            {{ Form::label('name', 'Название') }}
        </div>
        <div class="input__group">
            {!! Form::text('uname', old('uname') ? : ($class->uname ?? ''),
                            ['placeholder'=>'uname', 'id'=>'uname', 'class'=>'form-control']) !!}

            {{ Form::label('uname', 'UA-Название') }}
        </div>
    </div>
</div>
<div class="two__column">
    <div class="wrap__block">
        <h2>SEO</h2>
        <div class="two__column">
            <div class="input__group">
                {!! Form::text('seo_title', old('seo_title') ? : ($class->seo->seo_title ?? ''),
                                        ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
                {{ Form::label('seo_title', 'SEO_TITLE') }}
            </div>
            <div class="input__group">
                {!! Form::text('seo_description', old('seo_description') ? : ($class->seo->seo_description ?? ''),
                                ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
                {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
            </div>
            <div class="input__group">
                {!! Form::text('og_image', old('og_image') ? : ($class->seo->og_image ?? ''),
                                ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
                {{ Form::label('og_image', 'OG_IMAGE') }}
            </div>
            <div class="input__group">
                {!! Form::text('og_title', old('og_title') ? : ($class->seo->og_title ?? ''),
                                ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}
                {{ Form::label('og_title', 'OG_TITLE') }}
            </div>
            <div class="input__group">
                {!! Form::text('og_description', old('og_description') ? : ($class->seo->og_description ?? ''),
                                    ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control']) !!}
                {{ Form::label('og_description', 'OG_DESCRIPTION') }}
            </div>
        </div>

        <h4>SEO_TEXT</h4>
        <textarea name="seo_text" rows="20">{!! old('seo_text') ? : ($class->seo->seo_text ?? '') !!}</textarea>

    </div>
    <!-- SEO -->
    <!-- SEO -->
    <div class="wrap__block">
        <h2>#UA SEO</h2>
        <div class="two__column">
            <div class="input__group">
                {!! Form::text('useo_title', old('useo_title') ? : ($class->seo->useo_title ?? ''),
                                    ['placeholder'=>'seo_title', 'id'=>'useo_title', 'class'=>'form-control']) !!}
                {{ Form::label('useo_title', 'SEO_TITLE') }}
            </div>
            <div class="input__group">
                {!! Form::text('useo_description', old('useo_description') ? : ($class->seo->useo_description ?? ''),
                        ['placeholder'=>'seo_description', 'id'=>'useo_description', 'class'=>'form-control']) !!}

                {{ Form::label('useo_description', 'SEO_DESCRIPTION') }}
            </div>
            <div class="input__group">
                {!! Form::text('uog_image', old('uog_image') ? : ($class->seo->uog_image ?? ''),
                               ['placeholder'=>'og_image', 'id'=>'uog_image', 'class'=>'form-control']) !!}

                {{ Form::label('uog_image', 'OG_IMAGE') }}
            </div>
            <div class="input__group">
                {!! Form::text('uog_title', old('uog_title') ? : ($class->seo->uog_title ?? ''),
                                ['placeholder'=>'og_title', 'id'=>'uog_title', 'class'=>'form-control']) !!}

                {{ Form::label('uog_title', 'OG_TITLE') }}
            </div>
            <div class="input__group">
                {!! Form::text('uog_description', old('uog_description') ? : ($class->seo->uog_description ?? ''),
                                            ['placeholder'=>'og_description', 'id'=>'uog_description', 'class'=>'form-control']) !!}
                {{ Form::label('uog_description', 'OG_DESCRIPTION') }}
            </div>
        </div>
        <h4>SEO_TEXT</h4>
        <textarea name="useo_text" rows="20">{!! old('useo_text') ? : ($class->seo->useo_text ?? '') !!}</textarea>
    </div>
</div>


<!-- SEO -->
<div class="input_full">
    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
</div>
{!! Form::close() !!}
