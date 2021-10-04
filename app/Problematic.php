<?php

namespace Fresh\Medpravda;

use Fresh\Medpravda\Http\Controllers\Admin\UaProblematicController;
use Illuminate\Database\Eloquent\Model;
use File;

class Problematic extends Model
{
    protected $table = 'problematic2';

    protected $fillable = ['title','alias','approved', 'content', 'seo',
        'root_page', 'image', 'view', 'main_category'];

    protected $casts = [
        'seo' => 'array'
    ];


    public function get_child_pages()
    {
        return ProblematicNesting::where('root_page',$this->id)->with('children')->get();
    }

    public function menuSort()
    {
        return $this->hasOne(ProblematicSortedMenu::class,'root_page','id');
    }

    public function get_ua()
    {
        return $this->hasOne(Uaproblematic::class,'ru_problematic','id')->first();
    }

    public function get_parent()
    {
        if(ProblematicNesting::where('child_page',$this->id)->first())
        {
            return ProblematicNesting::where('child_page',$this->id)->first()->root_page;
        }else
        {
            return false;
        }

    }
    public function get_parent2()
    {
        return ProblematicNesting::where('child_page',$this->id)->first();
    }

    public function get_parent_object()
    {
        return ProblematicNesting::where('child_page',$this->id)->first();
    }

    public static function get_object_by_parent_and_child_id($root_id,$child_id)
    {
        return ProblematicNesting::where('child_page',$child_id)->where('root_page', $root_id)->first();
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
    public function getMainCategory()
    {
        return $this->belongsTo(Problematic::class,'main_category','id');
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
