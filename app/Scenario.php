<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Scenario
 * @package Fresh\Medpravda
 * @property title
 * @property step1
 * @property step2
 * @property step3
 * @property step4
 * @property step5
 * @property rules
 */

class Scenario extends Model
{
    protected $fillable = ['title', 'step1', 'step2', 'step3', 'step4', 'step5'];
    protected $casts = [
        'step1' => 'array',
        'step2' => 'array',
        'step3' => 'array',
        'step4' => 'array',
        'step5' => 'array',
    ];

    public static $rules = [
        'title' =>'required|string|max:255',
        'step1' => ['nullable', 'array'],
        'step2' => ['nullable', 'array'],
        'step3' => ['nullable', 'array'],
        'step4' => ['nullable', 'array'],
        'step5' => ['nullable', 'array'],

        'step1.option' => 'nullable|string|max:4',
        'step2.option' => 'nullable|string|max:4',
        'step3.option' => 'nullable|string|max:4',
        'step4.option' => 'nullable|string|max:4',
        'step5.option' => 'nullable|string|max:4',
        'step1.delay' => 'nullable|numeric|between:1,10',
        'step2.delay' => 'nullable|numeric|between:1,10',
        'step3.delay' => 'nullable|numeric|between:1,10',
        'step4.delay' => 'nullable|numeric|between:1,10',
        'step5.delay' => 'nullable|numeric|between:1,10',
    ];
}
