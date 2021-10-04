<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DepFabricatorLocation extends Model
{
    protected $fillable = ['title', 'utitle', 'full_title', 'full_utitle', 'alias', 'fabricator_id'];

    public function drugs()
    {
        return $this->hasMany('Fresh\Medpravda\DrugDep', 'fabricator_location_id');
    }
}
