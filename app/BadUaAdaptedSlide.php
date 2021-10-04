<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class BadUaAdaptedSlide extends Model
{
    protected $fillable = ['title', 'path', 'alt', 'bad_ua_adapted_id'];
}
