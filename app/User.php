<?php

namespace Fresh\Medpravda;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password', 'name', 'middle_name', 'surname', 'country', 'city', 'rule_id', 'avatar_id', 'aside',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function avatar()
    {
        return $this->belongsTo('Fresh\Medpravda\Gallery');
    }

    public function uploaded()
    {
        return $this->hasOne('Fresh\Medpravda\Gallery');
    }

    public function editor()
    {
        return $this->hasOne('Fresh\Medpravda\Editor');
    }



}
