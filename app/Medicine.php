<?php

namespace Fresh\Medpravda;
use Fresh\Medpravda\DrugStore;
use Fresh\Medpravda\DrugStoreNetwork;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicines_test';

    protected $fillable = [
        'title',
        'alias',
//        'fabricator_id',
//        'innname_id',
//        'pharmagroup_id',
//        'classification_id',
//        'form_id',
//        'backcolor',
        'approved',
        'seo',
        'consist',
        'docs_form',
        'physicochemical_char',
        'fabricator',
        'addr_fabricator',
        'pharm_group',
        'indications',
        'pharm_prop',
        'contraindications',
        'security',
        'application_features',
        'pregnancy',
        'cars',
        'children',
        'app_mode',
        'overdose',
        'side_effects',
        'interaction',
        'shelf_life',
        'saving',
        'packaging',
        'leave_cat',
        'dose',
        'additionally',
        'reg',
    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function image()
    {
        return $this->hasMany('Fresh\Medpravda\Image');
    }

    /**
     * @return mixed
     */
    public function photo()
    {
        return $this->hasMany('Fresh\Medpravda\Photo');
    }

    /**
     * @return mixed
     */
    public function adapted()
    {
        return $this->hasOne(Amedicine::class, 'alias', 'alias');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function substance()
    {
        return $this->belongsToMany('Fresh\Medpravda\Substance', 'medicine_substance');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classification()
    {
        return $this->belongsTo('Fresh\Medpravda\Classification');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fabricator()
    {
        return $this->belongsTo('Fresh\Medpravda\Fabricator');
    }

    public function fabricator_name()
    {
        return $this->fabricator();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('Fresh\Medpravda\Question', 'alias', 'alias');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function innname()
    {
        return $this->belongsTo('Fresh\Medpravda\Innname');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pharmagroup()
    {
        return $this->belongsTo('Fresh\Medpravda\Pharmagroup');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form()
    {
        return $this->belongsTo('Fresh\Medpravda\Form');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function analogSeo()
    {
        return $this->hasOne('Fresh\Medpravda\AnalogSeo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function faqSeo()
    {
        return $this->hasOne('Fresh\Medpravda\FaqSeo');
    }

    public function getUrlAttribute()
    {
        return route('medicine', ['medicine'=> $this->alias]);
    }

    public function goods()
    {
        return $this->belongsToMany('Fresh\Medpravda\Goods','medicines_goods','medicines_id','goods_id');
    }



    public function drugstoreCounter($goods){
        $key_array = [];
        foreach ($goods as $good) {
            $drug_store_id = $good->network_id;
            if(!array_key_exists($drug_store_id, $key_array)){
                $isset_drug_store = DrugStoreNetwork::where('id', $drug_store_id)->first();
                if(!empty($isset_drug_store)){
                    $key_array = array_add($key_array, $drug_store_id, $isset_drug_store);
                }
            }
        }
            return ['has_in_drug_store'=>count($key_array), 'total_drug_store'=>DrugStoreNetwork::count()];
        // return $goods;
    }

    public function uamedicine()
    {
        return $this->belongsTo('Fresh\Medpravda\Umedicine','alias','alias');
    }
}
