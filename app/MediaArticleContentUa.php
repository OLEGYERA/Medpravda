<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class MediaArticleContentUa extends Model
{
    public $fillable = [
        'id', 'definition', 'occurrence', 'symptoms', 'diagnostics',
        'development_stages', 'doctor', 'treat', 'diet',
        'remedies', 'complications', 'children', 'pregnant_lactating',
        'people', 'spread', 'prevention', 'vaccination',
        'provisions', 'sources'
    ];
}
