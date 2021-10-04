<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class BadDep extends Model
{
    public $fillable = ['bad_id', 'pharma_id', 'fabricator_id', 'fabricator_location_id', 'class_id'];

    protected function pharma()
    {
        return $this->belongsTo('Fresh\Medpravda\DepBadPharma');
    }

    protected function fabricator()
    {
        return $this->belongsTo('Fresh\Medpravda\DepFabricator');
    }

    protected function fabricator_location()
    {
        return $this->belongsTo('Fresh\Medpravda\DepFabricatorLocation', 'fabricator_location_id', 'id');
    }

    protected function classification()
    {
        return $this->belongsTo('Fresh\Medpravda\ClassBad', 'class_id', 'id');
    }

    protected function bad()
    {
        return $this->hasOne('Fresh\Medpravda\BadNew', 'id','bad_id');
    }

    protected function tags()
    {
        return $this->hasMany('Fresh\Medpravda\BadDepTags', 'bad_dep_id');
    }
}
