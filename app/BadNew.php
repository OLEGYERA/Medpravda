<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class BadNew extends Model
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
        return $this->belongsTo('Fresh\Medpravda\BadSetting');
    }

    protected function dependency()
    {
        return $this->hasOne('Fresh\Medpravda\BadDep', 'bad_id');
    }

    protected function instruction()
    {
        return $this->hasOne('Fresh\Medpravda\BadInstruction','bad_id', 'id');
    }

    protected function instruction_adaptive()
    {
        return $this->hasOne('Fresh\Medpravda\BadInstructionAdaptive','bad_id', 'id');
    }

    protected function instruction_ua()
    {
        return $this->hasOne('Fresh\Medpravda\BadInstructionUa','bad_id', 'id');
    }

    protected function instruction_adaptive_ua()
    {
        return $this->hasOne('Fresh\Medpravda\BadInstructionAdaptiveUa','bad_id', 'id');
    }
}
