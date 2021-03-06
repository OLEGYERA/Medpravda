<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Pharmagroup extends Model
{
    protected $fillable = ['title', 'utitle', 'alias'];

    public function seo()
    {
        return $this->hasOne('Fresh\Medpravda\PharmSeo');
    }
}
