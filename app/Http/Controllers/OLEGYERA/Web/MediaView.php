<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\Web;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\Web\Launch;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Fresh\Medpravda\MediaArticleDep;
use Fresh\Medpravda\MediaArticle;
use Fresh\Medpravda\MediaCategory;

use Fresh\Medpravda\Repositories\CatalogRepository;
use Illuminate\Support\Facades\Cache;

class MediaView extends Launch
{



    public function ru($id){
        $this->lang = 'ru';
        $this->targeting_url = 'pub_' . $id;
        $this->branding_url = 'pub_' . $id;

        $publication = MediaArticle::findOrFail($id);

        if(isset($publication->dependency->structure)){
            $structure_settings = $publication->dependency->structure->setting;
        }
        else{
            abort(404);
        }

        $breadcrumbs = $this->generateBreadCrumbs($publication->dependency->category);

        if(!$structure_settings->fullWidth) $this->fullWidth = false;


        $cache_result = [
            'publication' => $publication,
            'breadcrumbs' => $breadcrumbs,
            'structure_settings' => $structure_settings,
            'aside_articles' => MediaArticle::orderBy('view', 'desc')->take(6)->get()

        ];

        $this->title =  $cache_result['publication']->title;

        $publication->view = $publication->view + 1;
        $publication->save();

        $this->Page = view('OLEGYERA.Web.pages.media.simple.pub.ru')->with($cache_result)->render();
        return $this->Render();
    }


    public function ua($id){
        $this->lang = 'ua';
        $this->targeting_url = 'pub_' . $id;
        $this->branding_url = 'pub_' . $id;

        $publication = MediaArticle::findOrFail($id);

        if(isset($publication->dependency->structure)){
            $structure_settings = $publication->dependency->structure->setting;
        }
        else{
            abort(404);
        }

        $breadcrumbs = $this->generateBreadCrumbs($publication->dependency->category);

        if(!$structure_settings->fullWidth) $this->fullWidth = false;


        $cache_result = [
            'publication' => $publication,
            'breadcrumbs' => $breadcrumbs,
            'structure_settings' => $structure_settings,
            'aside_articles' => MediaArticle::orderBy('view', 'desc')->take(6)->get()

        ];

        $this->title =  $cache_result['publication']->utitle;

//        $publication->view = $publication->view + 1;
//        $publication->save();

        $this->Page = view('OLEGYERA.Web.pages.media.simple.pub.ua')->with($cache_result)->render();
        return $this->Render();
    }

    private function generateBreadCrumbs($category, $breadcrumbs = []){
        array_unshift($breadcrumbs, [
            'title' => $this->lang == 'ru' ? $category->title : $category->utitle,
            'alias' => route($this->lang.'.tags.optionally', ['alias' => $category->alias])
        ]);

        if($category->parent_id != null)
            return $this->generateBreadCrumbs(MediaCategory::find($category->parent_id), $breadcrumbs);


        $fullBreadCrumbsLength = count($breadcrumbs);

        while (count($breadcrumbs) > 2)
            array_shift($breadcrumbs);

        if($fullBreadCrumbsLength > 2)
            array_unshift($breadcrumbs, [
                'title' => '...',
                'alias' => null
            ]);

        array_unshift($breadcrumbs, [
            'title' => $this->lang == 'ru' ? 'Главная' : 'Головна',
            'alias' => route($this->lang.'.home')
        ]);

        return $breadcrumbs;
    }
}
