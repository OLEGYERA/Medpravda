<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'path', 'alt', 'category_id', 'user_id'];


    public function getCategory()
    {
        return $this->belongsTo('Fresh\Medpravda\GalleryCategory', 'category_id', 'id');
    }


    public function users(){
        return $this->hasMany('Fresh\Medpravda\User', 'avatar_id');
    }

    public function editor_diploms(){
        return $this->hasMany('Fresh\Medpravda\EditorDiploms', 'diplom_id');
    }

    public function drugs(){
        return $this->hasMany('Fresh\Medpravda\Drug', 'image_id');
    }

    public function bads(){
        return $this->hasMany('Fresh\Medpravda\BadNew', 'image_id');
    }

    public function wares(){
        return $this->hasMany('Fresh\Medpravda\WareNew', 'image_id');
    }

    public function cosmetics(){
        return $this->hasMany('Fresh\Medpravda\CosmeticNew', 'image_id');
    }
}
