<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['title', 'path', 'alt', 'medicine_id'];

    public function getImage()

    {
        if(!empty($this->path))
        {
            return asset('asset/images/medicine/main/'.$this->path);
        }
        else
        {
            return asset('asset/images/mp.png');
        }
    }
}
