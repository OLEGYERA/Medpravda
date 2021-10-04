<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class CatSeo extends Model
{
    protected $fillable = [
        'seo_title',
        'seo_description',
        'seo_text',
        'og_image',
        'og_title',
        'og_description',

        'useo_title',
        'useo_description',
        'useo_text',
        'uog_image',
        'uog_title',
        'uog_description',
    ];
}
