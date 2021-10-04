<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class CosmeticNew extends Model
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
        return $this->belongsTo('Fresh\Medpravda\CosmeticSetting');
    }

    protected function dependency()
    {
        return $this->hasOne('Fresh\Medpravda\CosmeticDep', 'cosmetic_id');
    }

    protected function labels()
    {
        return $this->hasMany('Fresh\Medpravda\CosmeticLabels', 'cosmetic_id', 'id');
    }

    protected function instruction()
    {
        return $this->hasOne('Fresh\Medpravda\CosmeticInstruction','cosmetic_id', 'id');
    }

    protected function instruction_adaptive()
    {
        return $this->hasOne('Fresh\Medpravda\CosmeticInstructionAdaptive','cosmetic_id', 'id');
    }

    protected function instruction_ua()
    {
        return $this->hasOne('Fresh\Medpravda\CosmeticInstructionUa','cosmetic_id', 'id');
    }

    protected function instruction_adaptive_ua()
    {
        return $this->hasOne('Fresh\Medpravda\CosmeticInstructionAdaptiveUa','cosmetic_id', 'id');
    }
}
