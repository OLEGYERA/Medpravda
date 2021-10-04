<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class DepFabricator extends Model
{
    protected $fillable = ['title', 'utitle', 'alias'];

    public function drugs()
    {
        return $this->hasMany('Fresh\Medpravda\DrugDep', 'fabricator_id');
    }

    public function locations()
    {
        return $this->hasMany('Fresh\Medpravda\DepFabricatorLocation', 'fabricator_id');
    }

    public function medicines($parent, $lang)
    {
        return [
            'drugs' => ['data' => $parent->medicinesDrug()->where('show', 1)->select($lang == 'ru' ? ['title AS name', 'drugs.*'] : ['utitle AS name', 'drugs.*'])->orderBy($lang == 'ru' ? 'title' : 'utitle', 'ASC')->get(), 'type' => 'drug'],
            'bads' => ['data' => $parent->medicinesBad()->select($lang == 'ru' ? ['title AS name', 'bad_news.*'] : ['utitle AS name', 'bad_news.*'])->orderBy($lang == 'ru' ? 'title' : 'utitle', 'ASC')->get(), 'type' => 'bad'],
            'cosmetics' => ['data' => $parent->medicinesCosmetic()->select($lang == 'ru' ? ['title AS name', 'cosmetic_news.*'] : ['utitle AS name', 'cosmetic_news.*'])->orderBy($lang == 'ru' ? 'title' : 'utitle', 'ASC')->get(), 'type' => 'cosmetic'],
            'wares' => ['data' => $parent->medicinesWare()->select($lang == 'ru' ? ['title AS name', 'ware_news.*'] : ['utitle AS name', 'ware_news.*'])->orderBy($lang == 'ru' ? 'title' : 'utitle', 'ASC')->get(), 'type' => 'ware'],
        ];
    }

    //для унификации названия в каталоге
    public function medicinesDrug()
    {
        return $this->hasManyThrough('Fresh\Medpravda\Drug', 'Fresh\Medpravda\DrugDep', 'fabricator_id', 'id', 'id', 'drug_id');
    }

    public function medicinesBad()
    {
        return $this->hasManyThrough('Fresh\Medpravda\BadNew', 'Fresh\Medpravda\BadDep', 'fabricator_id', 'id', 'id', 'bad_id');
    }

    public function medicinesCosmetic()
    {
        return $this->hasManyThrough('Fresh\Medpravda\CosmeticNew', 'Fresh\Medpravda\CosmeticDep', 'fabricator_id', 'id', 'id', 'cosmetic_id');
    }

    public function medicinesWare()
    {
        return $this->hasManyThrough('Fresh\Medpravda\WareNew', 'Fresh\Medpravda\WareDep', 'fabricator_id', 'id', 'id', 'ware_id');
    }
}
