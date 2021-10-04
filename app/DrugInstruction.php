<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DrugInstruction extends Model
{
    protected $fillable = [
        'drug_id',
        'composition',
        'physical_chemical',
        'pharma_props',
        'indications',
        'contraindications',
        'security',
        'features',
        'pregnancy',
        'driver',
        'children',
        'usage_and_dose',
        'overdose',
        'side_effects',
        'interaction',
        'time_life',
        'storage_conditions',
        'release_form',
        'other',
    ];
}
