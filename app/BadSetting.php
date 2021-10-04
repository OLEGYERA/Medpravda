<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class BadSetting extends Model
{
    protected $fillable = [
        'fix',
        'registration_life', //время жизни регистрации (PS. Забыл добавить time)
        'review',
        'adverising',
    ];
}
