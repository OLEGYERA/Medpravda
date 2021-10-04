<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class MediaArticleDep extends Model
{
    public $fillable = ['id', 'image_id', 'editor_id', 'category_id', 'structure_id'];

    public function editor(){
        return $this->hasOne('Fresh\Medpravda\User', 'id', 'editor_id');
    }

    public function creator(){
        return $this->hasOne('Fresh\Medpravda\User', 'id', 'editor_id');
    }

    public function image(){
        return $this->hasOne('Fresh\Medpravda\Gallery', 'id', 'image_id');
    }

    public function category(){
        return $this->hasOne('Fresh\Medpravda\MediaCategory', 'id', 'category_id');
    }

    public function structure(){
        return $this->hasOne('Fresh\Medpravda\MediaStructure', 'id', 'structure_id');
    }

    public function article(){
        return $this->belongsTo('Fresh\Medpravda\MediaArticle', 'id', 'id');
    }
}
