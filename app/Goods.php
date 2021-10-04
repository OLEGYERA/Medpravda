<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //model for medicines goods from drug store

    public function medicines()
    {
        return $this->belongsToMany('Fresh\Medpravda\Medicine','medicines_goods','goods_id','medicines_id');
    }

    public function network()
    {
        return $this->belongsTo(DrugStoreNetwork::class,'network_id','id');
    }
    public function producer()
    {
        return $this->belongsTo(Producer::class,'id_producer','id');
    }

    public function rest()
    {
        return $this->hasMany(RestGood::class, 'good_id','goods_id')
            ->with('drug_store');
    }
}
