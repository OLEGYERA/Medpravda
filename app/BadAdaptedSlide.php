<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class BadAdaptedSlide extends Model
{
    protected $fillable = ['title', 'path', 'alt', 'bad_adapted_id'];
}
