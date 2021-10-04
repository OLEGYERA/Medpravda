<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class LongreadTemplate extends Model
{
    protected $fillable = ['title'];


    /**
     *  Get the main_img associated with the longread.
     */
    public function parts()
    {
        return $this->hasOne('Fresh\Medpravda\LongreadTemplatePart');
    }
}
