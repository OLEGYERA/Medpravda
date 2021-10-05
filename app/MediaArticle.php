<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class MediaArticle extends Model
{
    public $fillable = ['title', 'utitle', 'alias', 'view'];

    public function content(){
        return $this->hasOne('Fresh\Medpravda\MediaArticleContent', 'media_article_id', 'id');
    }

    public function dependency(){
        return $this->hasOne('Fresh\Medpravda\MediaArticleDep', 'id');
    }

    public function dependencies(){
        return $this->belongsToMany('Fresh\Medpravda\MediaArticleDep', 'id');
    }

    public function setting(){
        return $this->hasOne('Fresh\Medpravda\MediaArticleSetting', 'id');
    }
}
