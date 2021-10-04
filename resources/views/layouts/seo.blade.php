<div class="two__column"><!--две колонки-->
    <!-- SEO -->
    <div class="wrap__block">
        <h2>SEO</h2>
        <div class="two__column"><!--две колонки-->
            <div class="input__group">
                {!! Form::text('seo[seo_title]', $classification->seo['seo_title']??null,
                                ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
                {{ Form::label('seo_title', 'SEO_TITLE') }}
            </div>
            <div class="input__group">
                {!! Form::text('seo[seo_description]', $classification->seo['seo_description']??null,
                                ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
                {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
            </div>
            <div class="input__group">
                {!! Form::text('seo[og_image]', $classification->seo['og_image']??null,
                                ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
                {{ Form::label('og_image', 'OG_IMAGE') }}
            </div>
            <div class="input__group">
                {!! Form::text('seo[og_title]', $classification->seo['og_title']??null,
                                ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}
                {{ Form::label('og_title', 'OG_TITLE') }}
            </div>
            <div class="input__group">
                {!! Form::text('seo[og_description]', $classification->seo['og_description']??null,
                            ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control']) !!}
                {{ Form::label('og_description', 'OG_DESCRIPTION') }}
            </div>
        </div>
        <h3>SEO_TEXT</h3>
        <div class="textarea-edit">
            {!! Form::textarea('seo[seo_text]', $classification->seo['seo_text']??null,
                                    ['placeholder'=>'seo_text', 'id'=>'seo_text', 'class'=>'form-control']) !!}
        </div>
    </div>
    <!-- SEO -->
    <!-- SEO -->
    <div class="wrap__block">
        <h2>UA-SEO</h2>
        <div class="two__column"><!--две колонки-->
            <div class="input__group">
                {!! Form::text('uaseo[seo_title]', $classification->uaseo['seo_title']??null,
                            ['placeholder'=>'seo_title', 'id'=>'uaseo_title', 'class'=>'form-control']) !!}
                {{ Form::label('uaseo_title', 'SEO_TITLE') }}
            </div>
            <div class="input__group">
                {!! Form::text('uaseo[seo_description]', $classification->uaseo['seo_description']??null,
                 ['placeholder'=>'seo_description', 'id'=>'uaseo_description', 'class'=>'form-control']) !!}
                {{ Form::label('uaseo_description', 'SEO_DESCRIPTION') }}
            </div>
            <div class="input__group">
                {!! Form::text('uaseo[og_image]', $classification->uaseo['og_image']??null,
                        ['placeholder'=>'og_image', 'id'=>'uaog_image', 'class'=>'form-control']) !!}
                {{ Form::label('uaog_image', 'OG_IMAGE') }}
            </div>
            <div class="input__group">
                {!! Form::text('uaseo[og_title]', $classification->uaseo['og_title']??null,
                        ['placeholder'=>'og_title', 'id'=>'uaog_title', 'class'=>'form-control']) !!}
                {{ Form::label('uaog_title', 'OG_TITLE') }}
            </div>
            <div class="input__group">
                {!! Form::text('uaseo[og_description]', $classification->uaseo['og_description']??null,
                        ['placeholder'=>'og_description', 'id'=>'uaog_description', 'class'=>'form-control']) !!}
                {{ Form::label('uaog_description', 'OG_DESCRIPTION') }}
            </div>
        </div>
        <h3>SEO_TEXT UA</h3>
        <div class="textarea-edit">
            {!! Form::textarea('uaseo[seo_text]', $classification->uaseo['seo_text']??null,
                                    ['placeholder'=>'ua-seo_text', 'id'=>'uaseo_text', 'class'=>'form-control']) !!}
        </div>
    </div>
    <!-- SEO -->
</div>

