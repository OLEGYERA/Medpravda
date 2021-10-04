<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Uaimage extends Model
{
    protected $fillable = ['title', 'path', 'alt', 'uamedicine_id'];

    public function getImage()

    {
        if(!empty($this->path))
        {
            return asset('asset/images/medicine/main_aukr/'.$this->path);
        }
        else
        {
            return asset('asset/images/mp.png');
        }
    }
}
