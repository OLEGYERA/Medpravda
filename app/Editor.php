<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    protected $fillable = ['active', 'specialty', 'specialization', 'rank_id', 'user_id', 'experience', 'facebook', 'instagram', 'education'];

    public function diploms()
    {
        return $this->hasMany('Fresh\Medpravda\EditorDiploms');
    }
}
