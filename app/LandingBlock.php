<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;
use File;

class LandingBlock extends Model
{
//    protected $fillable = ['title', 'source', 'position'];
    protected $fillable = ['title', 'source', 'position', 'boolpoint', 'background', 'image'];

    protected $casts = [
        'boolpoint' => 'array',
        'background' => 'array',
        'button1' => 'array',
        'button2' => 'array',
        'title1' => 'array',
        'title2' => 'array',
        'title3' => 'array',
        'description1' => 'array',
        'description2' => 'array',
        'image' => 'array',
        'custom' => 'array',

    ];

    public function slider()
    {
        return $this->hasMany(LandingSlider::class)->orderBy('position');
    }

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

    public function toggleBanner($value)
    {
        if(1 != $value)
        {
            return $this->unsetBanner();
        }

        return $this->setBanner();
    }

    /**
     *
     */
    public function setBanner()
    {
        $this->banner = 1;

        $this->save();
    }

    /**
     *
     */
    public function unsetBanner()
    {
        $this->banner = 0;

        $this->save();
    }

    /**
     * @param string $source boolpoint|background
     * @return string
     */
    public function getImg($source)
    {
        if (empty($this->{$source}['path'])) {
            return '/asset/images/mp.png';
        }

        return '/asset/images/lendings/blocks/'.$source.'s/' . $this->{$source}['path'];

    }

    /**
     * @param \Illuminate\Http\UploadedFile|null $file
     * @param string $source boolpoint|background
     * @return bool|string
     */
    public function uploadImage($file, $source)
    {
        if ($file->isValid()) {

            $this->removeImage($source, $this->{$source}['path'] ?? null);

            $path = $source . str_random(5) . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('/asset/images/lendings/blocks/' . $source . 's/'), $path);

            return $path;
        } else {
            return false;
        }
    }

    /**
     * @param string $source boolpoint|background
     * @param string|null $path filename
     */
    public function removeImage($source, $path)
    {
        if ($path != null) {
            if (File::exists(public_path('/asset/images/lendings/blocks/' . $source . 's/') . $path)) {
                File::delete(public_path('/asset/images/lendings/blocks/' . $source . 's/') . $path);
            }
        }
    }
}
