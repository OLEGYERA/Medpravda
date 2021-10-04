<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class WareDep extends Model
{
    public $fillable = ['ware_id', 'fabricator_id', 'fabricator_location_id', 'class_id'];


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
        return $this->belongsTo('Fresh\Medpravda\ClassWare', 'class_id', 'id');
    }

    protected function ware()
    {
        return $this->hasOne('Fresh\Medpravda\WareNew', 'id','ware_id');
    }
}
