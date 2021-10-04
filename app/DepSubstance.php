<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DepSubstance extends Model
{
    protected $fillable = ['title', 'utitle', 'alias', 'seo_id'];

    public function drug_deps(){
        return $this->hasMany('Fresh\Medpravda\DrugDepSubstance', 'substance_id');
    }

    public function drug_dependencies(){
        return $this->hasManyThrough('Fresh\Medpravda\DrugDep', 'Fresh\Medpravda\DrugDepSubstance', 'drug_dep_id', 'id', 'id', 'substance_id');
    }
}
