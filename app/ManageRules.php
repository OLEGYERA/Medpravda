<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class ManageRules extends Model
{
    protected $fillable = [
        'title',
        'alias',
        'administration',
            'managers',
            'users',
            'rules',
        'moderation',
            'reviews',
//            'comments',
        'catalog',
            'drug',
        'dependency',
        'history',
            'backup',
        'gallery',
            'modal',
        'protection'
    ];
}
