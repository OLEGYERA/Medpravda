<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class BadUaSlide extends Model
{
    protected $fillable = ['title', 'path', 'alt', 'bad_ua_id'];
}
