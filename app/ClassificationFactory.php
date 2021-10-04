<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;
use Cache;

abstract class ClassificationFactory extends Model
{
    /**
     * ClassificationFactory constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->fillable = ['name', 'uname', 'class', 'parent', 'seo', 'uaseo'];
        $this->casts = [
            'seo' => 'array',
            'uaseo' => 'array',
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parents()
    {
        return $this->belongsTo(static::class, 'parent', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(static::class, 'parent', 'id')->with(['children']);
    }

    /**
     * @param array $fields
     * @return static
     */
    public function addClassification($fields)
    {
        $classification = new static;
        $classification->fill($fields);
        $classification->save();
        $this->clearCache();

        return $classification;
    }

    /**
     * @return bool|string
     */
    public function getParentClassName()
    {
        return substr(class_basename($this),0, strpos(strtolower(class_basename($this)),'classification'));
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $result = $this->whereNull('parent')->with(['children'])->get();

        return $this->getTools($result);
    }

    /**
     * @param $classifications
     * @return mixed
     */
    public function getTools($classifications)
    {
        $classifications->transform(function ($item) {

            $item->load('tools');

            return $item;

        });
//        dd($classifications);
        return $classifications;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tools()
    {
        return $this->hasMany('Fresh\Medpravda\\'.$this->getParentClassName(), 'classification_id');
    }

    /**
     * @param $key
     */
    public function clearCache()
    {
        Cache::forget('sort-'.strtolower($this->getParentClassName()).'s');
        Cache::forget('sort-'.strtolower($this->getParentClassName()).'s-ua');
    }
}
