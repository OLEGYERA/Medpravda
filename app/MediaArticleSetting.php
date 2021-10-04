<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class MediaArticleSetting extends Model
{
    public $fillable = ['id', 'show', 'pin', 'comment', 'adv'];
}
