<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DrugDep extends Model
{
    public $fillable = ['drug_id', 'inname_id', 'pharma_id', 'form_id', 'fabricator_id', 'fabricator_location_id', 'atx_id'];


    protected function form()
    {
        return $this->belongsTo('Fresh\Medpravda\DepForm');
    }

    protected function pharma()
    {
        return $this->belongsTo('Fresh\Medpravda\DepPharma');
    }

    protected function fabricator()
    {
        return $this->belongsTo('Fresh\Medpravda\DepFabricator');
    }

    protected function fabricator_location()
    {
        return $this->belongsTo('Fresh\Medpravda\DepFabricatorLocation', 'fabricator_location_id', 'id');
    }

    protected function inname()
    {
        return $this->belongsTo('Fresh\Medpravda\DepInname');
    }

    protected function substances()
    {
        return $this->hasMany('Fresh\Medpravda\DrugDepSubstance', 'drug_dep_id');
    }

    protected function tags()
    {
        return $this->hasMany('Fresh\Medpravda\DrugDepTag', 'drug_dep_id');
    }

    protected function substancesThrough()
    {
        return $this->hasManyThrough('Fresh\Medpravda\DepSubstance', 'Fresh\Medpravda\DrugDepSubstance', 'drug_dep_id', 'id', 'id', 'substance_id');
    }

    protected function drug()
    {
        return $this->hasOne('Fresh\Medpravda\Drug', 'id','drug_id');
    }


    protected function atx()
    {
        return $this->belongsTo('Fresh\Medpravda\DepATX', 'atx_id', 'id');
    }

}
