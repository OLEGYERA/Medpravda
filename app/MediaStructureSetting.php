<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class MediaStructureSetting extends Model
{
    public $fillable = ['id', 'fullWidth', 'bgTop', 'float', 'media_structure_id'];
}
