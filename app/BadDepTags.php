<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class BadDepTags extends Model
{
    protected $fillable = [
        'bad_dep_id',
        'tag_id'
    ];

    protected function tag()
    {
        return $this->belongsTo('Fresh\Medpravda\DepTag');
    }

    protected function bad_dependency()
    {
        return $this->hasOne('Fresh\Medpravda\BadDep', 'id', 'bad_dep_id');
    }
}
