<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class MediaCategory extends Model
{
    public $fillable = ['id', 'title', 'utitle', 'alias', 'parent_id'];

    public function child($id)
    {
        return MediaCategory::where('parent_id', $id)->get();
    }

    public function parent($id)
    {
        return MediaCategory::where('id', $id)->first();
    }

}
