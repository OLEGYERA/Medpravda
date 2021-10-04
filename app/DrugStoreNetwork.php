<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DrugStoreNetwork extends Model
{
    protected $fillable =
        [
            'first_name', 'middle_name', 'last_name',
            'specialty' , 'specialization', 'academic_degree',
            'place',
            'education_img',
            'about',
            'experience',
            'author_1', 'author_2', 'author_3', 'author_4',
            'section_author'
        ];
}
