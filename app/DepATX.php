<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DepATX extends Model
{
    protected $table = 'dep_atxs';

    protected $fillable = ['title', 'utitle', 'class', 'parent_id'];

    public function child($id)
    {
        return DepATX::where('parent_id', $id)->get();
    }

    public function parent($id)
    {
        return DepATX::where('id', $id)->first();
    }

    public function drugs()
    {
        return $this->hasMany('Fresh\Medpravda\DrugDep', 'atx_id');
    }
    //для унификации названия в каталоге
    public function medicines()
    {
        return $this->hasManyThrough('Fresh\Medpravda\Drug', 'Fresh\Medpravda\DrugDep', 'atx_id', 'id', 'id', 'drug_id');
    }
}
