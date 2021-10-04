<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;
use Auth;
use Image;
use Fresh\Medpravda\Gallery;
use Fresh\Medpravda\GalleryCategory;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Http\Request;

class GalleryController extends ApiController
{
    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }


//
    protected function uploadFile(Request $request){
        if($request->title !== 'null'){
            $title = $request->title . '_' . date('d-m-Y-H-i');
            $path = $this->createAlias($title) . '.' . $request->file->getClientOriginalExtension();
        }
        else{
            $title = explode('.'.$request->file->getClientOriginalExtension(), $request->file->getClientOriginalName())[0] . '_' . date('d-m-Y-H-i');
            $path = $title . '.' . $request->file->getClientOriginalExtension();
        }

        if($request->alt !== 'null'){
            $alt = $request->alt;
        }
        else{
            $alt = null;
        }

        $extension = $request->file->getClientOriginalExtension();

        $sizes = ['large', 'medium', 'small'];
        foreach ($sizes as $size){
            $damp_img = Image::make($request->file->getRealPath());
            $img_size = $this->mathtSize($damp_img->width(), $damp_img->height(), $size);
            $damp_img->resize($img_size['width'], $img_size['height']);
            $full_path = public_path('/gallery/' . GalleryCategory::find($request->category)->alias . '/' . $size);
            if (!file_exists($full_path)) {
                return response()->json('Возникла ошибка директорий! Обратитесь к разработчику!', 403);
            }
            $damp_img->save($full_path . '/' . $path, 60);
        }

        $res = $this->gallery->create(['title'=>$title, 'path'=>$path, 'alt'=>$alt, 'category_id' => $request->category, 'user_id' => \Auth::user()->id]);

        return response()->json($res->id, 200);
    }

    protected function getFile($id){
        $file = Gallery::findOrFail($id);
        $file_path = asset('/gallery/'. $file->getCategory->alias . '/' . 'medium' . '/' . $file->path);
        return response()->json(['file' => $file, 'file_path' => $file_path], 200);
    }

    protected function getFiles(Request $request){
        switch ($request->category){
            case 1:
            case 2:
            case 3:
            case 4:
                $gallery_files = GalleryCategory::where('id', $request->category)->first()->getImages()->orderBy('created_at', 'desc')->paginate(12);
                break;
            case 5:
                $gallery_files = Gallery::paginate(12);
                break;
            case 6:
                $gallery_files = \Auth::user()->uploaded()->paginate(12);
                break;
        }
        return response()->json(['gallery_files'=>$gallery_files], 200);
    }

    protected function editFile(Request $request, $id){
        $file = Gallery::findOrFail($id);
        if($file){
            foreach ($request->except('_token') as $key => $part) {
                if($key == 'title'){
                    if($file->title != $part){
                        $category = $file->getCategory()->first()->alias;
                        $new_title = $part . '_' . date('d-m-Y-H-i');
                        $new_alias = $this->createAlias($new_title) ;
                        $new_path = $new_alias . '.' . File::extension('/gallery/'. $category . '/medium/' . $file->path);
                        $sizes = ['large', 'medium', 'small'];
                        foreach ($sizes as $size){
                            rename(public_path('/gallery/'. $category . '/' . $size . '/' . $file->path), public_path('/gallery/'. $category . '/' . $size . '/' . $new_path));
                        }
                        $file->update([
                            'title' => $new_title,
                            'alias' => $new_alias,
                            'path' => $new_path
                        ]);
                    }
                }else{
                    if($file->alt != $part) {
                        $file->update($request->all());
                    }
                }
            }
            return response()->json($file, 200);
        }else{
            return response()->json(false, 501);
        }
    }

    protected function deleteFile($id){
        $file = Gallery::findOrFail($id);
        //clear Users Avatar
        foreach ($file->users as $item){
            $item->avatar_id = 1;
            $item->save();
        }
        //clear Editors Diploms
        foreach ($file->editor_diploms as $item){
            $item->delete();
        }
        //clear Drugs Photo
        foreach ($file->drugs as $item){
            $item->image_id = 1;
            $item->save();
        }
        //clear Bads Photo
        foreach ($file->bads as $item){
            $item->image_id = 1;
            $item->save();
        }
        //clear Wares Photo
        foreach ($file->wares as $item){
            $item->image_id = 1;
            $item->save();
        }
        //clear Cosmetics Photo
        foreach ($file->cosmetics as $item){
            $item->image_id = 1;
            $item->save();
        }
        $sizes = ['large', 'medium', 'small'];
        if(!$file->protection){
            foreach ($sizes as $size){
                File::delete(public_path('/gallery/'. $file->getCategory()->first()->alias . '/' . $size . '/' . $file->path));
            }
            $file->delete();
            return response()->json($file, 200);
        }
        else{
            return response()->json(false, 200);
        }
    }


    private function mathtSize($width, $height, $type){
        switch ($type){
            case 'large':
                if($width > 2000){
                    $img_width = 1160;
                    $img_heigth = ceil(($img_width * $height) / $width);
                }else if($width > 800 && $width < 1160){
                    $img_width = 900;
                    $img_heigth = ceil(($img_width * $height) / $width);
                }
                else if($width > 600 && $width < 900){
                    $img_width = 750;
                    $img_heigth = ceil(($img_width * $height) / $width);
                }else{
                    $img_width = 600;
                    $img_heigth = ceil(($img_width * $height) / $width);
                }
                return ['width' => $img_width, 'height' => $img_heigth];
                break;
            case 'medium':
                $large_size = $this->mathtSize($width, $height, 'large');
                return ['width' => ceil($large_size['width'] / 1.5), 'height' => ceil($large_size['height'] / 1.5)];
                break;
            case 'small':
                $medium_size = $this->mathtSize($width, $height, 'medium');
                return ['width' => ceil($medium_size['width'] / 1.5), 'height' => ceil($medium_size['height'] / 1.5)];
                break;
        }
    }
}
