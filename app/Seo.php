<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = ['seo_title', 'seo_description',
        'seo_text', 'og_title', 'og_description', 'og_image'];
}
