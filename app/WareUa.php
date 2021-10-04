<?php

namespace Fresh\Medpravda;

class WareUa extends WareChild
{
    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('ware_get_adapted_ua', ['ware_slug'=>$this->slug]);
    }
}
