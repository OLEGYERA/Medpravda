<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\Web;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\Web\Launch;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Fresh\Medpravda\MediaArticleDep;
use Fresh\Medpravda\MediaArticle;
use Fresh\Medpravda\MediaCategory;

use Fresh\Medpravda\Repositories\CatalogRepository;

class MediaView extends Launch
{
    protected $lang;

    public function ru($id){
        $publication = MediaArticle::findOrFail($id);
        if(isset($publication->dependency->structure)){
            $structure_settings = $publication->dependency->structure->setting;
        }
        else{
            abort(404);
        }

        if(!$structure_settings->fullWidth){
            $this->fullWidth = false;
        }

        $this->lang = 'ru';
        $this->title =  $publication->title;

//        dd($structure_settings->float);

        $this->Page = view('OLEGYERA.Web.pages.media.simple.pub.ru')->with([
            'publication' => $publication,
            'side_articles' => MediaArticleDep::where('category_id', 2)->orderBy('created_at', 'desc')->take(3)->get()
        ])->render();
        return $this->Render();
    }


    public function ua($id){
        $publication = MediaArticle::findOrFail($id);
        if(isset($publication->dependency->structure)){
            $structure_settings = $publication->dependency->structure->setting;
        }
        else{
            abort(404);
        }

        if(!$structure_settings->fullWidth){
            $this->fullWidth = false;
        }

        $this->lang = 'ua';
        $this->title =  $publication->title;

//        dd($structure_settings->float);

        $this->Page = view('OLEGYERA.Web.pages.media.simple.pub.ua')->with([
            'publication' => $publication,
            'side_articles' => MediaArticleDep::where('category_id', 2)->orderBy('created_at', 'desc')->take(3)->get()
        ])->render();
        return $this->Render();
    }

}
