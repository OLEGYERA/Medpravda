<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DepTerm extends Model
{
    protected $fillable = [
        'title',
        'utitle',
        'alias',
        'term',
        'uterm',
        'seo_id',
    ];
}
