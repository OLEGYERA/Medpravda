<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class WareNew extends Model
{
    protected $fillable = [
        'title',
        'utitle',
        'alias',
        'dosage',
        'udosage',
        'registration',
        'uregistration',
        'image_id',
        'setting_id',
        'seo_id',
        'creator_id',
    ];


    public function image()
    {
        return $this->belongsTo('Fresh\Medpravda\Gallery');
    }

    protected function creator()
    {
        return $this->belongsTo('Fresh\Medpravda\User');
    }

    protected function setting()
    {
        return $this->belongsTo('Fresh\Medpravda\WareSetting');
    }

    protected function dependency()
    {
        return $this->hasOne('Fresh\Medpravda\WareDep', 'ware_id');
    }

    protected function labels()
    {
        return $this->hasMany('Fresh\Medpravda\WareLabels', 'ware_id', 'id');
    }

    protected function instruction()
    {
        return $this->hasOne('Fresh\Medpravda\WareInstruction','ware_id', 'id');
    }

    protected function instruction_adaptive()
    {
        return $this->hasOne('Fresh\Medpravda\WareInstructionAdaptive','ware_id', 'id');
    }

    protected function instruction_ua()
    {
        return $this->hasOne('Fresh\Medpravda\WareInstructionUa','ware_id', 'id');
    }

    protected function instruction_adaptive_ua()
    {
        return $this->hasOne('Fresh\Medpravda\WareInstructionAdaptiveUa','ware_id', 'id');
    }
}
