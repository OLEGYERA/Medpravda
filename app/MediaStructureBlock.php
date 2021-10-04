<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class MediaStructureBlock extends Model
{
    public $fillable = ['id', 'title', 'utitle', 'required', 'media_structure_id'];

    protected function instructions()
    {
        return $this->belongsTo('Fresh\Medpravda\MediaArticleContentBlock');
    }

    public function instruction($article_id)
    {
        return $this->belongsTo('Fresh\Medpravda\MediaArticleContentBlock', 'id', 'block_id')->where('article_id', $article_id)->first();
    }
}
