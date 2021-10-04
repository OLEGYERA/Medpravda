<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Medicinemap extends Model
{
    public $timestamps = false;

    protected $table = 'medicinemapsview';

    public function image()
    {
        return $this->hasMany('Fresh\Medpravda\Image', 'medicine_id', 'id');
    }

    public function adapted()
    {
        return $this->hasOne(Amedicine::class, 'alias', 'alias');
    }
}
