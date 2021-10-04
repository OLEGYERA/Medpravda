<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class MediaStructure extends Model
{
    public $fillable = ['id', 'title', 'alias'];

    protected function setting()
    {
        return $this->hasOne('Fresh\Medpravda\MediaStructureSetting');
    }

    public function blocks()
    {
        return $this->hasMany('Fresh\Medpravda\MediaStructureBlock');
    }
}
