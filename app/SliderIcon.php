<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;
use File;
/**
 * Class SliderIcon
 * @package Fresh\Medpravda
 * @property string 'filename'
 * @property string 'status'
 */

class SliderIcon extends Model
{
    protected $fillable = ['filename', 'status'];

    public function getIconFilename()
    {
        return $this->filename ?? 'noimage.png';
    }

    public function uploadIcon($icon)
    {
        dd('test');
        if ($icon->isValid()) {

            $this->deleteOldIcon($this->filename);
            if($icon->getClientOriginalExtension()=="svg")
            {
                $filename = $icon->getClientOriginalName();
                $filepath = public_path('/asset/images/slider/icons/');
                $icon->move($filepath, $filename);
//                $filename = public_path('/asset/images/slider/icons/').$filename;
            }else
            {
                $filename = str_random(10) . time() . '.' . $icon->getClientOriginalExtension();

                $icon->move(public_path('/asset/images/slider/icons/'), $filename);
            }
            $this->filename = $filename;

            $this->save();
            return $filename;
        } else {
            return false;
        }
    }

    public function deleteOldIcon($filename)
    {
        if (null != $this->filename) {
            if (File::exists(public_path('/asset/images/slider/icons' . '/') . $filename)) {
                File::delete(public_path('/asset/images/slider/icons' . '/') . $filename);
            }
        }

        return true;
    }
}
