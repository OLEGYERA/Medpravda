<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class ClassCosmetic extends Model
{
    protected $table = 'class_cosmetics';

    protected $fillable = ['title', 'utitle', 'class', 'parent_id'];

    public function child($id)
    {
        return ClassCosmetic::where('parent_id', $id)->get();
    }

    public function parent($id)
    {
        return ClassCosmetic::where('id', $id)->first();
    }

    public function cosmetics()
    {
        return $this->hasMany('Fresh\Medpravda\CosmeticDep', 'class_id');
    }

    //для унификации названия в каталоге
    public function medicines()
    {
        return $this->hasManyThrough('Fresh\Medpravda\CosmeticNew', 'Fresh\Medpravda\CosmeticDep', 'class_id', 'id', 'id', 'cosmetic_id');
    }
}
