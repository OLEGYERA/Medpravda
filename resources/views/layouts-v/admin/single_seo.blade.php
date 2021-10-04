<div class="wrap__block">
    <h2>SEO</h2>
    <div class="two__column"><!--две колонки-->
        <div class="input__group">
            {!! Form::text('seo[seo_title]', $model->seo['seo_title']??null,
             ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
            {{ Form::label('seo_title', 'SEO_TITLE') }}
        </div>
        <div class="input__group">
            {!! Form::text('seo[seo_description]', $model->seo['seo_description']??null,
             ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
            {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
        </div>
        <div class="input__group">
            {!! Form::text('seo[og_image]', $model->seo['og_image']??null,
             ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
            {{ Form::label('og_image', 'OG_IMAGE') }}
        </div>
        <div class="input__group">
            {!! Form::text('seo[og_title]', $model->seo['og_title']??null,
             ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}
            {{ Form::label('og_title', 'OG_TITLE') }}
        </div>
        <div class="input__group">
            {!! Form::text('seo[og_description]', $model->seo['og_description']??null,
             ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control']) !!}
            {{ Form::label('og_description', 'OG_DESCRIPTION') }}
        </div>
    </div>
    <h3>SEO_TEXT</h3>
    <div class="textarea-edit">
        {!! Form::textarea('seo[seo_text]', $model->seo['seo_text']??null,
                                    ['placeholder'=>'seo_text', 'id'=>'seo_text', 'class'=>'form-control']) !!}
    </div>
</div>