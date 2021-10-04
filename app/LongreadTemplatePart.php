<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class LongreadTemplatePart extends Model
{
    protected $fillable = ['priority', 'longread_template_id', 'type'];
    public $timestamps = false;

    public function build()
    {
        return $this->hasOne('Fresh\Medpravda\LongreadBuilder');
    }
}
