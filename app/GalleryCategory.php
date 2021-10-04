<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $fillable = ['name', 'alias'];


    public function getImages()
    {
        return $this->hasOne('Fresh\Medpravda\Gallery', 'category_id', 'id');
    }
}
