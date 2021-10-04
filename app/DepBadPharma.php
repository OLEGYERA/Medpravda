<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DepBadPharma extends Model
{
    protected $fillable = ['title', 'utitle', 'alias', 'seo_id'];

    public function bads()
    {
        return $this->hasMany('Fresh\Medpravda\BadDep', 'pharma_id');
    }

    //для унификации названия в каталоге
    public function medicines()
    {
        return $this->hasManyThrough('Fresh\Medpravda\BadNew', 'Fresh\Medpravda\BadDep', 'pharma_id', 'id', 'id', 'bad_id');
    }
}
