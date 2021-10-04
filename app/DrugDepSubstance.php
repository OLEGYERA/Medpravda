<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DrugDepSubstance extends Model
{
   protected $fillable = [
       'drug_dep_id',
       'substance_id'
   ];

    protected function substance()
    {
        return $this->belongsTo('Fresh\Medpravda\DepSubstance');
    }

    protected function drug_dependency()
    {
        return $this->hasOne('Fresh\Medpravda\DrugDep', 'id', 'drug_dep_id');
    }
}
