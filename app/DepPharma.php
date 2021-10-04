<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DepPharma extends Model
{
    protected $fillable = ['title', 'utitle', 'alias'];

    public function drugs()
    {
        return $this->hasMany('Fresh\Medpravda\DrugDep', 'pharma_id');
    }

    //для унификации названия в каталоге
    public function medicines()
    {
        return $this->hasManyThrough('Fresh\Medpravda\Drug', 'Fresh\Medpravda\DrugDep', 'pharma_id', 'id', 'id', 'drug_id');
    }
}
