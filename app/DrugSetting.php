<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DrugSetting extends Model
{
    protected $fillable = [
        'show',
        'fix',
        'registration_life', //время жизни регистрации (PS. Забыл добавить time)
        'recipe',
        'review',
        'adverising',
    ];


    protected function drug()
    {
        return $this->hasOne('Fresh\Medpravda\Drug', 'setting_id');
    }

}
