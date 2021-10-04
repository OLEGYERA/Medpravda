<?php

namespace Fresh\Medpravda;

class CosmeticChild extends Tool
{
    protected $fillable = [
        'title',
        'reg',
        'dose',
        //                content
        'consist',
        'pharm_prop',
        'recommendations',
        'special_instructions',
        'contraindications',
        'app_mode',
        'packaging',
        'saving',
        'fabricator_name',
        'additionally',
        //                content
        'seo',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('Fresh\Medpravda\Cosmetic', 'slug');
    }
}
