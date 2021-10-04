<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;

class LandingUa extends Model
{
    protected $fillable = ['title', 'slug', 'font_family'];

    protected $casts = [
        'logo' => 'array',
        'boolpoint' => 'array',
        'background' => 'array',
        'button' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function banner()
    {
        return $this->hasOne(LandingUaBanner::class, 'landing_id', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modals()
    {
        return $this->hasOne(LandingUaModal::class, 'landing_id', 'id');
    }

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::created(self::createBanner());
        static::created(self::createModal());

        static::updated(self::clearCache());
    }

    public static function createBanner(): \Closure
    {
        return function ($model) {

            return $model->banner()->create();
        };
    }
    /**
     * @return bool
     */
    public static function clearCache(): \Closure
    {
        return function ($model) {
            \Log::info('CAche cleared - '.$model->id);
            return true;
        };
    }

    public static function createModal(): \Closure
    {
        return function ($model) {

            return $model->modals()->create();
        };
    }
}
