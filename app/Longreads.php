<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Longreads extends Model
{
    protected $fillable = ['longread_template_id', 'title', 'utitle', 'alias', 'priority', 'approved', 'uapproved', 'created_at', 'description',
        'udescription'];


    /**
     *  Get the main_img associated with the longread.
     */
    public function image()
    {
        return $this->hasOne('Fresh\Medpravda\LongreadImages');
    }

    public function seo()
    {
        return $this->hasOne('Fresh\Medpravda\LongreadSeo');
    }
}
