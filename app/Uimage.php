<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Uimage extends Model
{
    protected $fillable = ['title', 'path', 'alt', 'umedicine_id'];

    public function getImage()
    {
        if(!empty($this->path))
        {
            return asset('asset/images/medicine/main_ukr/'.$this->path);
        }
        else
        {
            return asset('asset/images/mp.png');
        }
    }
}
