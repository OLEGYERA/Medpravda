<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class BadInstructionAdaptiveUa extends Model
{
    protected $fillable = [
        'bad_id',
        'composition',
        'pharma_props',
        'indications',
        'special_indications',
        'contraindications',
        'usage_and_dose',
        'release_form',
        'storage_conditions',
        'other',
    ];
}
