<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class ClassWare extends Model
{
    protected $table = 'class_wares';

    protected $fillable = ['title', 'utitle', 'class', 'parent_id'];

    public function child($id)
    {
        return ClassWare::where('parent_id', $id)->get();
    }

    public function parent($id)
    {
        return ClassWare::where('id', $id)->first();
    }

    public function wares()
    {
        return $this->hasMany('Fresh\Medpravda\WareDep', 'class_id');
    }

    //для унификации названия в каталоге
    public function medicines()
    {
        return $this->hasManyThrough('Fresh\Medpravda\WareNew', 'Fresh\Medpravda\WareDep', 'class_id', 'id', 'id', 'ware_id');
    }
}
