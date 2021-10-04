<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class CosmeticDep extends Model
{
    public $fillable = ['cosmetic_id', 'fabricator_id', 'fabricator_location_id', 'class_id'];

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
        return $this->belongsTo('Fresh\Medpravda\ClassCosmetic', 'class_id', 'id');
    }

    protected function cosmetic()
    {
        return $this->hasOne('Fresh\Medpravda\CosmeticNew', 'id','cosmetic_id');
    }
}
