<?php

namespace Fresh\Medpravda;

class CosmeticUa extends CosmeticChild
{
    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('cosmetic_get_adapted_ua', ['cosmetic_slug'=>$this->slug]);
    }
}
