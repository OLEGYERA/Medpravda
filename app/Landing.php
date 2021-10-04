<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;
use DB;
use File;

class Landing extends Model
{
    protected $fillable = ['title', 'slug', 'font_family', 'full_screen', 'boolpoint', 'healing',
        'welcome_window', 'modal', 'approved'];

    protected $casts = [
        'logo' => 'array',
        'boolpoint' => 'array',
        'background' => 'array',
        'button' => 'array',
        'healing' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function banner()
    {
        return $this->hasOne(LandingBanner::class, 'landing_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modals()
    {
        return $this->hasOne(LandingModal::class, 'landing_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function block()
    {
        return $this->hasMany(LandingBlock::class)->orderBy('position');
    }

    public function activeBlocks()
    {
        return $this->hasMany(LandingBlock::class)
            ->where('approved', 1)->with('slider')->orderBy('position');
    }

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::created(self::createUa());
        static::created(self::createBanner());
        static::created(self::createModal());

        static::updated(self::clearCache());
    }

    /**
     * @return \Closure
     */
    public static function createUa(): \Closure
    {
        return function ($model) {

            return $model->ua()->create([
                'title' => $model->title,
                'slug' => str_limit($model->slug, 5, '') . str_random(5) . time(),
            ]);
        };
    }

    public static function createBanner(): \Closure
    {
        return function ($model) {

            return $model->banner()->create();
        };
    }

    public static function createModal(): \Closure
    {
        return function ($model) {

            return $model->modals()->create();
        };
    }

    /**
     * @param $fields
     * @return mixed
     */
    public static function add($fields)
    {
        return static::create($fields);
    }

    /**
     * @param $fields
     */
    public function edit($fields)
    {
//        dd($fields);
        $this->fill($fields);
        $this->save();
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ua()
    {
        return $this->hasOne(LandingUa::class);
    }

    public function getActiveUaAttribute()
    {
        return $this->ua->approved;
    }

    /**
     * @param $value
     */
    public function toggleModal($value)
    {
        if (1 != $value) {
            return $this->unsetModal();
        }

        return $this->setModal();
    }

    /**
     *
     */
    public function setModal()
    {
        $this->modal = 1;

        $this->save();
    }

    /**
     *
     */
    public function unsetModal()
    {
        $this->modal = 0;

        $this->save();
    }

    /**
     * @param $value
     */
    public function toggleApproved($value)
    {
        if (1 != $value) {
            return $this->unsetApproved();
        }

        return $this->setApproved();
    }

    /**
     *
     */
    public function setApproved()
    {
        $this->approved = 1;

        $this->save();
    }

    /**
     *
     */
    public function unsetApproved()
    {
        $this->approved = 0;

        $this->save();
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        if (empty($this->logo['path'])) {
            return '/asset/images/mp.png';
        }

        return '/asset/images/lendings/logos/' . $this->logo['path'];

    }

    public function getImg($source)
    {
        if (empty($this->{$source}['path'])) {
            return '/asset/images/mp.png';
        }

        return '/asset/images/lendings/'.$source.'s/' . $this->{$source}['path'];

    }

    public function uploadImage($file, $source)
    {
        if ($file->isValid()) {

            $this->removeImage($source, $this->{$source}['path'] ?? null);

            $path = substr($this->slug, 0, 64) . $source . str_random(2) . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('/asset/images/lendings/' . $source . 's/'), $path);

            return $path;
        } else {
            return false;
        }
    }

    public function removeImage($source, $path)
    {
        if ($path != null) {
            if (File::exists(public_path('/asset/images/lendings/' . $source . 's/') . $path)) {
                File::delete(public_path('/asset/images/lendings/' . $source . 's/') . $path);
            }
        }
    }
}
