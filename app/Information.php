<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;
use File;
use Cache;

class Information extends Model
{
    protected $fillable = ['description', 'button', 'nums', 'link', 'alt', 'title', 'image'];

    /**
     * @param $fields
     */
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }


    /**
     * @return string
     */
    public function getImg()
    {
        if (empty($this->image)) {
            return '/asset/images/mp.png';
        }

        return '/asset/images/numbers/' . $this->image;

    }

    /**
     * @param $path
     */
    public function removeImage($path)
    {
        if ($path != null) {
            if (File::exists(public_path('/asset/images/numbers/') . $path)) {
                File::delete(public_path('/asset/images/numbers/') . $path);
            }
        }
    }

    /**
     * @param $file
     * @return bool|string
     */
    public function uploadImage($file)
    {
        if (null != $file && $file->isValid()) {

            $this->removeImage($this->image ?? null);

            $path = str_random(10) . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('/asset/images/numbers/'), $path);

            $this->image = $path;
            $this->save();

            return $this;
        } else {
            return false;
        }
    }

    public function clearCache()
    {
        Cache::forget('main');
        Cache::forget('ua-main');
    }
    /**
     * @return mixed
     */
    public static function getRu()
    {
        return self::where('loc', 'ru')->get();
    }
    /**
     * @return mixed
     */
    public static function getUa()
    {
        return self::where('loc', 'ua')->get();
    }
}
