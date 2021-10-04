<div class="breadcrumb">
    <a href="{{route('medicine_admin')}}">Препараты</a>
    <span>Редактирование SEO-блоков для вопросов препаратов.</span>
</div>


{!! Form::open(['url'=>route('seo_faq', $medicine->id), 'method'=>'post', 'class'=>'form-horizontal']) !!}<!-- SEO -->
<div class="two__column">
    <div class="wrap__block">
        <h3>SEO-аналоги</h3>
        <div class="two__column">
            <div class="input__group">
                {!! Form::text('seo_title', old('seo_title') ? : ($seo->seo_title ?? ''),
                        ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
                {{ Form::label('seo_title', 'SEO_TITLE') }}
            </div>

            <div class="input__group">
                {!! Form::text('seo_description', old('seo_description') ? : ($seo->seo_description ?? ''),
                        ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
                {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
            </div>

            <div class="input__group">
                {!! Form::text('og_image', old('og_image') ? : ($seo->og_image ?? ''),
                        ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
                {{ Form::label('og_image', 'OG_IMAGE') }}
            </div>

            <div class="input__group">
                {!! Form::text('og_title', old('og_title') ? : ($seo->og_title ?? ''),
                        ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}
                {{ Form::label('og_title', 'OG_TITLE') }}
            </div>

            <div class="input__group">
                {!! Form::text('og_description', old('og_description') ? : ($seo->og_description ?? ''),
                        ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control']) !!}
                {{ Form::label('og_description', 'OG_DESCRIPTION') }}
            </div>
        </div>
        <h4>SEO_TEXT</h4>
        <textarea name="seo_text" rows="20">{!! old('seo_text') ? : ($seo->seo_text ?? '') !!}</textarea>

        <div>
            {!! Form::submit('Сохранить', ['class'=>'btn btn__full']) !!}
        </div>
    </div>
    <!-- SEO -->


    <!-- SEO -->
    <div class="wrap__block">
        <h3>UA SEO-аналоги</h3>
        <div class="two__column">
            <div class="input__group">
                {!! Form::text('useo_title', old('useo_title') ? : ($seo->useo_title ?? ''),
                        ['placeholder'=>'seo_title', 'id'=>'useo_title', 'class'=>'form-control']) !!}
                {{ Form::label('useo_title', 'SEO_TITLE') }}
            </div>

            <div class="input__group">
                {!! Form::text('useo_description', old('useo_description') ? : ($seo->useo_description ?? ''),
                        ['placeholder'=>'seo_description', 'id'=>'useo_description', 'class'=>'form-control']) !!}
                {{ Form::label('useo_description', 'SEO_DESCRIPTION') }}
            </div>

            <div class="input__group">
                {!! Form::text('uog_image', old('uog_image') ? : ($seo->uog_image ?? ''),
                        ['placeholder'=>'og_image', 'id'=>'uog_image', 'class'=>'form-control']) !!}
                {{ Form::label('uog_image', 'OG_IMAGE') }}
            </div>

            <div class="input__group">
                {!! Form::text('uog_title', old('uog_title') ? : ($seo->uog_title ?? ''),
                        ['placeholder'=>'og_title', 'id'=>'uog_title', 'class'=>'form-control']) !!}
                {{ Form::label('uog_title', 'OG_TITLE') }}
            </div>

            <div class="input__group">
                {!! Form::text('uog_description', old('uog_description') ? : ($seo->uog_description ?? ''),
                                ['placeholder'=>'og_description', 'id'=>'uog_description', 'class'=>'form-control']) !!}
                {{ Form::label('uog_description', 'OG_DESCRIPTION') }}
            </div>
        </div>
        <h4>SEO_TEXT</h4>

        <textarea name="useo_text" rows="20">{!! old('useo_text') ? : ($seo->useo_text ?? '') !!}</textarea>

        <div>
            {!! Form::submit('Сохранить', ['class'=>'btn btn__full']) !!}
        </div>
    </div>
</div>


{!! Form::close() !!}
