<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DepForm extends Model
{
    protected $fillable = ['title', 'utitle', 'alias'];

    public function drugs()
    {
        return $this->hasMany('Fresh\Medpravda\DrugDep', 'form_id');
    }
}
