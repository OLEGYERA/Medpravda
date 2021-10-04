<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DrugDepTag extends Model
{
    protected $fillable = [
        'drug_dep_id',
        'tag_id'
    ];

    protected function tag()
    {
        return $this->belongsTo('Fresh\Medpravda\DepTag');
    }

    protected function drug_dependency()
    {
        return $this->hasOne('Fresh\Medpravda\DrugDep', 'id', 'drug_dep_id');
    }
}
