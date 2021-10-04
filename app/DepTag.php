<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DepTag extends Model
{
    protected $fillable = [
        'title',
        'utitle',
        'alias',
        'term',
        'uterm',
    ];
}
