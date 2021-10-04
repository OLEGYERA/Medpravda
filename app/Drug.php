<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
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
        'creator_id',
        'show'
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
        return $this->belongsTo('Fresh\Medpravda\DrugSetting');
    }

    protected function dependency()
    {
        return $this->hasOne('Fresh\Medpravda\DrugDep');
    }

    protected function labels()
    {
        return $this->hasMany('Fresh\Medpravda\DrugLabel','drug_id', 'id');
    }

    protected function reviews()
    {
        return $this->hasMany('Fresh\Medpravda\Review','drug_id', 'id');
    }

    protected function instruction()
    {
        return $this->hasOne('Fresh\Medpravda\DrugInstruction','drug_id', 'id');
    }

    protected function instruction_adaptive()
    {
        return $this->hasOne('Fresh\Medpravda\DrugInstructionAdaptive','drug_id', 'id');
    }

    protected function instruction_ua()
    {
        return $this->hasOne('Fresh\Medpravda\DrugInstructionUa','drug_id', 'id');
    }

    protected function instruction_adaptive_ua()
    {
        return $this->hasOne('Fresh\Medpravda\DrugInstructionAdaptiveUa','drug_id', 'id');
    }
}
