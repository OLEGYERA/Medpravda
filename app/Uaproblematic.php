<?php

namespace Fresh\Medpravda;
use Fresh\Medpravda\Http\Controllers\Admin\UaProblematicController;
use Illuminate\Database\Eloquent\Model;
use File;

class Uaproblematic extends Model
{
    protected $table = 'uaproblematic';

    protected $fillable = ['title','alias','approved', 'content', 'seo', 'root_page', 'ru_problematic'. 'main_category'];

    protected $casts = [
        'seo' => 'array'
    ];

    public function get_ru()
    {
        return $this->hasOne(Problematic::class,'id','ru_problematic')->first()->id;
    }
    public function get_ru2()
    {
        return $this->hasOne(Problematic::class,'id','ru_problematic')->first();
    }
    public function get_parent()
    {
        return ProblematicNesting::where('child_page',$this->id)->first();

    }
    public function uploadImage($file)
    {
        if ($file->isValid()) {

            $this->removeImage($this->image ?? null);

            $path = str_random(5) . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('/asset/images/problematic/'), $path);

            return $path;
        } else {
            return false;
        }
    }
    public function removeImage($path)
    {
        if ($path != null) {
            if (File::exists(public_path('/asset/images/problematic/') . $path)) {
                File::delete(public_path('/asset/images/problematic/') . $path);
            }
        }
    }
}
