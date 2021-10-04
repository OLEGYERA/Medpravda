<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class BadInstruction extends Model
{
    protected $fillable = [
        'bad_id',
        'composition',
        'pharma_props',
        'indications',
        'special_indications',
        'contraindications',
        'usage_and_dose',
        'storage_conditions',
        'release_form',
        'other',
    ];
}
