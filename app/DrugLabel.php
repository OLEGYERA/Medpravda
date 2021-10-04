<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DrugLabel extends Model
{
    protected $fillable = [
        'drug_id',
        'title', //время жизни регистрации (PS. Забыл добавить time)
        'utitle',
    ];
}
