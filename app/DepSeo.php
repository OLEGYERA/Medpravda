<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DepSeo extends Model
{
    protected $fillable = ['title', 'utitle', 'desc', 'udesc', 'ogimage', 'uogimage', 'ogtitle', 'uogtitle', 'ogdesc', 'uogdesc'];

}
