<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class MediaArticleContent extends Model
{
    public $fillable = ['id', 'ru', 'ua', 'media_article_id'];
}
