<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class BadSlide extends Model
{
    protected $fillable = ['title', 'path', 'alt', 'bad_id'];

}
