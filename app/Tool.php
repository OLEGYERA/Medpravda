<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Tool extends Model
{
    protected $casts = [
        'seo' => 'array',
    ];

    /**
     * @param $fields
     * @return mixed
     */
    public function add($fields)
    {
        return static::create($fields);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function slide()
    {
        return $this->hasMany(static::class.'Slide');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function adapted()
    {
        return $this->belongsTo(static::class . 'Adapted', 'slug', 'slug')
            ->with(['slide'])
            ;
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ua()
    {
        return $this->belongsTo(static::class . 'Ua', 'slug', 'slug')
            ->with(['slide'])
            ;
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function uaAdapted()
    {
        return $this->belongsTo(static::class . 'UaAdapted', 'slug', 'slug')
            ->with(['slide'])
            ;
    }

    public function questions()
    {
        return $this->hasOne(static::class . 'Question', 'slug', 'slug');
    }
    /**
     * @param $fields
     */
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    /**
     * @param $request
     */
    public function uploadImages($request)
    {
        $i = 0;
        foreach ($request->file('slider') as $slide) {
            $slider_path[$i]['alt'] = $request['imgalt'][$i];
            $slider_path[$i]['title'] = $request['imgtitle'][$i];
            $slider_path[$i]['path'] = $this->uploadSlide($slide);
            $i++;
        }


        // slider imgs
        if (!empty($slider_path)) {
            try {
                $this->slide()->createMany($slider_path);
            } catch (Exception $e) {
                \Log::info('Ошибка записи фотографий слайдера: ', $e->getMessage());
                $error[] = ['slider' => 'Ошибка записи фотографий слайдера'];
            }
        }
        //Slider
    }

    /**
     * @param file $slide
     * @return bool|string
     */
    public function uploadSlide($slide)
    {
        if ($slide->isValid()) {

            $source = snake_case(class_basename($this));

            $path = substr($this->slug, 0, 64) . $source .'-slider-' . str_random(2) . time() .'.'. $slide->getClientOriginalExtension();

            $slide->move(public_path('/asset/images/'.$source.'s/main/'), $path);

            return $path;
        } else {
            return false;
        }
    }

    /**
     * @param $value
     */
    public function toggleCertified($value)
    {
        if(1 != $value)
        {
            return $this->unsetCertified();
        }

        return $this->setCertified();
    }

    /**
     *
     */
    public function setCertified()
    {
        $this->certified = 1;

        $this->save();
    }

    /**
     *
     */
    public function unsetCertified()
    {
        $this->certified = 0;

        $this->save();
    }
    /**
     * @param $value
     */
    public function toggleApproved($value)
    {
        if(1 != $value)
        {
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

    public function clearCache()
    {
        Cache::forget(snake_case(class_basename($this)).'-'.$this->id);
        Cache::forget(snake_case(class_basename($this)).'_adapted-'.$this->id);
        Cache::forget(snake_case(class_basename($this)).'-ua-'.$this->id);
        Cache::forget(snake_case(class_basename($this)).'_adapted-ua-'.$this->id);
    }
}
