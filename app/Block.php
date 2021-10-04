<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = [
        'id', 'title', 'utitle', 'first', 'second', 'third', 'fourth', 'fifth', 'sixth',
        'first_url', 'second_url', 'third_url', 'fourth_url', 'fifth_url', 'sixth_url'];
    public $timestamps = false;
}
