<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class LongreadBuilder extends Model
{
    protected $fillable = ['longreads_id', 'longread_template_part_id', 'title', 'img', 'priority', 'alt', 'content', 'lang'];

}
