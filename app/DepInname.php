<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DepInname extends Model
{
    protected $fillable = ['title'];

    public function drugs()
    {
        return $this->hasMany('Fresh\Medpravda\DrugDep', 'inname_id');
    }

    //для унификации названия в каталоге
    public function medicines()
    {
        return $this->hasManyThrough('Fresh\Medpravda\Drug', 'Fresh\Medpravda\DrugDep', 'inname_id', 'id', 'id', 'drug_id');
    }
}
