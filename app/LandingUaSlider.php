<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;
use File;

class LandingUaSlider extends Model
{
    protected $fillable = ['alt', 'title', 'video', 'description', 'position', 'color'];

    public function block()
    {
        return $this->belongsTo(LandingUaBlock::class, 'landing_ua_block_id');
    }

    /**
     * @return string
     */
    public function getImg()
    {
        if (empty($this->path)) {
            return '/asset/images/mp.png';
        }

        return '/asset/images/lendings/blocks/sliders/' . $this->path;
    }

    /**
     * @param $file
     * @return bool|string
     */
    public function uploadImage($file)
    {
        if ($file == null) {
            return;
        }

        if ($file->isValid()) {

            $this->removeImage($this->path ?? null);

            $filename = str_random(10) . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('/asset/images/lendings/blocks/sliders/'), $filename);

            $this->path = $filename;
            $this->save();
        } else {
            return false;
        }
    }

    public function remove()
    {
        $this->removeImage($this->path ?? null);
        $this->delete();
    }

    /**
     * @param $path
     */
    public function removeImage($path)
    {
        if ($path != null) {
            if (File::exists(public_path('/asset/images/lendings/blocks/sliders/') . $path)) {
                File::delete(public_path('/asset/images/lendings/blocks/sliders/') . $path);
            }
        }
    }
}
