<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['description', 'text', 'link', 'path', 'alt', 'title', 'approved'];

    public function mainicon()
    {
        return $this->hasOne(SliderIcon::class)->where('status', 'main');
    }

    public function hideicon()
    {
        return $this->hasOne(SliderIcon::class)->where('status', 'hide');
    }

    public function getIconMain()
    {
        if ($this->mainicon()->exists()) {
            return asset('/asset/images/slider/icons') . '/' . $this->mainicon->getIconFilename();
        } else {
            return asset('/asset/images/slider/icons/noimage.png');
        }
    }

    public function getIconHide()
    {
        if ($this->hideicon()->exists()) {
            return asset('/asset/images/slider/icons') . '/' . $this->hideicon->getIconFilename();
        } else {
            return asset('/asset/images/slider/icons/noimage.png');
        }
    }
}
