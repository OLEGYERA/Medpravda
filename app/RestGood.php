<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class RestGood extends Model
{
    protected $table = 'rest';

    public function drug_store()
    {
        return $this->hasOne(DrugStore::class,'id','branch_id');
    }
}
