<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class MediaArticleContentBlock extends Model
{
    public $fillable = ['ru', 'ua', 'block_id', 'article_id'];

}
