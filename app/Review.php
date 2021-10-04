<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $fillable = [
        'fn', 'ln', 'email', 'gid', 'avatar_path',
        'quality', 'packaging', 'effect', 'safety', 'availability',
        'worth', 'limitations', 'review', 'drug_id',
    ];

}
