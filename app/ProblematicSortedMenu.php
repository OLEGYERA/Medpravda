<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class ProblematicSortedMenu extends Model
{
    protected $table = 'problematic_sorted_menu';

    protected $fillable = ['root_page','child_pages','create_at', 'updated_at'];
}
