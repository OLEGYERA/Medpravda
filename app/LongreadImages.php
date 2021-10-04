<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class LongreadImages extends Model
{
    protected $fillable = ['title', 'utitle', 'path', 'upath', 'alt', 'ualt', 'longreads_id'];
    public $timestamps = false;
}
