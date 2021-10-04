<?php

namespace Fresh\Medpravda;

class BadUa extends BadChild
{
    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('bad_get_adapted_ua', ['bad_slug'=>$this->slug]);
    }
}
