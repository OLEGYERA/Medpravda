<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class ClassBad extends Model
{
    protected $table = 'class_bads';

    protected $fillable = ['title', 'utitle', 'class', 'parent_id'];

    public function child($id)
    {
        return ClassBad::where('parent_id', $id)->get();
    }

    public function parent($id)
    {
        return ClassBad::where('id', $id)->first();
    }

    public function bads()
    {
        return $this->hasMany('Fresh\Medpravda\BadDep', 'class_id');
    }

    //для унификации названия в каталоге
    public function medicines()
    {
        return $this->hasManyThrough('Fresh\Medpravda\BadNew', 'Fresh\Medpravda\BadDep', 'class_id', 'id', 'id', 'bad_id');
    }
}
