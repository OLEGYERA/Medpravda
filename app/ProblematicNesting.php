<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class ProblematicNesting extends Model
{
    protected $table = 'problematic_nesting';
    protected $fillable = ['root_page','child_page'];

    public function children()
    {
        return $this->hasOne(Problematic::class, 'id', 'child_page');
    }

    public function root()
    {
        return $this->hasOne(Problematic::class, 'id', 'root_page');
    }

    public function current()
    {
        return $this->hasOne(Problematic::class, 'id', 'child_page');
    }
    public function children2()
    {
        return $this->hasMany(ProblematicNesting::class, 'root_page', 'child_page');
    }
}
