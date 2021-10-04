<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class FactoryQuestion extends Model
{
    protected $fillable = ['slug', 'ru', 'ua'];
    protected $casts = [
        'ru'=>'array',
        'ua'=>'array',
    ];
}
