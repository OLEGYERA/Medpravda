<?php

namespace Fresh\Medpravda;

use Illuminate\Database\Eloquent\Model;
use File;

class LandingBanner extends Model
{
    protected $fillable = ['title', 'description', 'imgalt', 'imgtitle', 'button', 'image', 'background'];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'background' => 'array',
        'button' => 'array',
    ];

    /**
     * @return string
     */
    public function getImage()
    {
        if (empty($this->image)) {
            return '/asset/images/mp.png';
        }

        return '/asset/images/lendings/banners/' . $this->image;

    }

    /**
     * @return string
     */
    public function getBgImage()
    {
        if (empty($this->background['image'])) {
            return '/asset/images/mp.png';
        }

        return '/asset/images/lendings/banners/backgrounds/' . $this->background['image'];

    }

    /**
     * @return string
     */
    public function getButtonImage()
    {
        if (empty($this->button['image'])) {
            return '/asset/images/mp.png';
        }

        return '/asset/images/lendings/banners/buttons/' . $this->button['image'];

    }

    /**
     * @param image|null $file
     * @param string $source
     * @return bool|string
     */
    public function uploadImage($file, $source)
    {
        if (null !== $file && $file->isValid()) {

            $this->removeImage($source, $this->image ?? null);

            $path = str_random(12) . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('/asset/images/lendings/banners/'), $path);
            $this->image = $path;
            $this->save();
            return $path;
        } else {
            return false;
        }
    }

    public function updateBackground($request, $model)
    {
        $background['color'] = $request->input('background.color');
        $background['secondarycolor'] = $request->input('background.secondarycolor');
//        dd($this->background);
        if ($request->hasFile('background_image')) {
            $path = $this->uploadBgImage($request->file('background_image'), 'banners/backgrounds');
            if ($path) {
                $background['image'] = $path;
            } else {
                $background['image'] = $this->background['image'] ?? null;
            }
        } else {
            $background['image'] = $this->background['image'] ?? null;
        }
//        dd($this->background['image']);
        $this->background = $background;
        $this->save();

    }

    public function uploadBgImage($file, $source)
    {
        if (null !== $file && $file->isValid()) {

            $this->removeImage($source, $this->background['image'] ?? null);

            $path = str_random(12) . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('/asset/images/lendings/banners/backgrounds/'), $path);

            return $path;
        } else {
            return false;
        }
    }
    /**
     * @param string $source
     * @param string $path
     */
    public function removeImage($source, $path)
    {
        if ($path != null) {
            if (File::exists(public_path('/asset/images/lendings/' . $source). '/' . $path)) {
                File::delete(public_path('/asset/images/lendings/' . $source). '/' . $path);
            }
        }
    }
}
