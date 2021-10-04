<?php

namespace Fresh\Medpravda;

use Illuminate\Support\Facades\DB;

class Ware extends Tool
{
    protected $fillable = [
        'title',
        'slug',
        'reg',
        'dose',
        'backcolor',
        'approved',
        'certified',
        'classification_id',
        'fabricator_id',
        //                content
        'consist',
        'pharm_prop',
        'recommendations',
        'special_instructions',
        'contraindications',
        'app_mode',
        'packaging',
        'saving',
        'fabricator_name',
        'additionally',
//                content
        'seo',
    ];


    protected static function boot()
    {
        parent::boot();

        static::created(self::createAdapted());
        static::created(self::createUa());
        static::created(self::createUaAdapted());
    }


    public static function createAdapted(): \Closure
    {
        return function ($model) {
            return DB::table(snake_case(class_basename($model)) . '_adapteds')
                ->insert([
                    'title' => $model->title,
                    'slug' => $model->slug,
                ]);
        };
    }

    public static function createUa()
    {
        return function ($model) {
            return DB::table(snake_case(class_basename($model)) . '_uas')
                ->insert([
                    'title' => $model->title,
                    'slug' => $model->slug,
                ]);
        };
    }

    public static function createUaAdapted()
    {
        return function ($model) {
            return DB::table(snake_case(class_basename($model)) . '_ua_adapteds')
                ->insert([
                    'title' => $model->title,
                    'slug' => $model->slug,
                ]);
        };
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fabricator()
    {
        return $this->belongsTo('Fresh\Medpravda\Fabricator');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classification()
    {
        return $this->belongsTo('Fresh\Medpravda\WareClassification');
    }

    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('ware_get_adapted', ['ware_slug'=>$this->slug]);
    }
}
