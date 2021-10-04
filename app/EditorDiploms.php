<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class EditorDiploms extends Model
{
    protected $fillable = ['editor_id', 'diplom_id'];

    public function photo()
    {
        return $this->hasOne('Fresh\Medpravda\Gallery', 'id', 'diplom_id');
    }
}
