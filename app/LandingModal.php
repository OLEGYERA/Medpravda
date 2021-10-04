<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class LandingModal extends Model
{
    protected $fillable = ['button1', 'button2', 'title1', 'title2', 'title3', 'list'];

    protected $casts = [
        'button1' => 'array',
        'button2' => 'array',
        'title1' => 'array',
        'title2' => 'array',
        'title3' => 'array',
        'list' => 'array'
    ];


}
