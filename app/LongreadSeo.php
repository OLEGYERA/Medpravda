<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class LongreadSeo extends Model
{
    protected $fillable = ['seo_title', 'useo_title', 'seo_description', 'useo_description', 'og_image', 'uog_image', 'og_title', 'uog_title', 'og_description', 'uog_description', 'longreads_id'];
    public $timestamps = false;
}
