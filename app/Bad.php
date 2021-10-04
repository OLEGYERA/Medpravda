<?php

namespace Fresh\Medpravda;

use Illuminate\Support\Facades\DB;

/**
 * Class Bad
 * @package Fresh\Medpravda
 *
 * @property string 'title'
 * @property string 'slug'
 * @property string 'reg'
 * @property string 'dose'
 * @property string 'backcolor'
 * @property boolean 'approved'
 * @property boolean 'classification_id'
 * @property boolean 'fabricator_id'
 * @property string 'consist'
 * @property string 'pharm_group'
 * @property string 'pharm_prop'
 * @property string 'recommendations'
 * @property string 'special_instructions'
 * @property string 'contraindications'
 * @property string 'app_mode'
 * @property string 'packaging'
 * @property string 'saving'
 * @property string 'fabricator_name'
 * @property string 'additionally'
 * @property array 'seo'
 */
class Bad extends Tool
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
        'pharm_group',
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
        return $this->belongsTo('Fresh\Medpravda\Badclassification');
    }

    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('bad_get_adapted', ['bad_slug'=>$this->slug]);
    }

    public function ua_bud()
    {
        return $this->HasOne(BadUa::class,'slug','slug');
    }

}
