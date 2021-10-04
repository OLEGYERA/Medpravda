<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\Media;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;
use Fresh\Medpravda\MediaArticle;
use Fresh\Medpravda\MediaArticleDep;
use Fresh\Medpravda\MediaCategory;
use Illuminate\Support\Arr;
use Jenssegers\Agent\Agent;


class ArticleController extends BasicController
{
    protected $atxArray = [];
    public function getArticleRu($alias, $id){
        $article = MediaArticle::where('alias', $alias)->where('id', $id)->first();
        if(isset($article->dependency->structure)){
            $structure_settings = $article->dependency->structure->setting;
        }
        else{
            abort(404);
        }


        $this->cretateLangProps('ru', $article->title);
        $this->targeting_url = $article->alias;
        $this->branding_url = $article->alias;

        $breadcrumbs = [['title' => 'Медиа', 'alias' => route('ru.catalog.drug.alphabet')]];

        if($structure_settings->bgTop){
            if($article->dependency->category !== null){
                array_push($breadcrumbs, ['title' => $article->dependency->category->title, 'alias' => null]);
            }
            $this->breadcrumbs = null;
        }
        else {
            if($article->dependency->category == null){
                $this->breadcrumbs = $breadcrumbs;
            }
            else {
                //push
            }
        }


        $this->content = view('OLEGYERA.FrontBox.Media.pages.ru')->with([
            'article' => $article,
            'aside' => MediaArticle::orderBy('created_at', 'desc')->take(10)->get(),
            'structure_settings' => $structure_settings,
            'breadcrumbs' => $breadcrumbs,
            'agent' => new Agent()
        ])->render();
        return $this->renderBasic();
    }


    public function getArticleUa($alias, $id){
        $article = MediaArticle::where('alias', $alias)->where('id', $id)->first();
        if(isset($article->dependency->structure)){
            $structure_settings = $article->dependency->structure->setting;
        }
        else{
            abort(404);
        }

        $this->cretateLangProps('ua', $article->title);
        $this->targeting_url = $article->alias;
        $this->branding_url = $article->alias;

        $breadcrumbs = [['title' => 'Медіа', 'alias' => route('ua.catalog.drug.alphabet')]];

        if($structure_settings->bgTop){
            if($article->dependency->category !== null){
                array_push($breadcrumbs, ['title' => $article->dependency->category->utitle, 'alias' => null]);
            }
            $this->breadcrumbs = null;
        }
        else {
            if($article->dependency->category == null){
                $this->breadcrumbs = $breadcrumbs;
            }
            else {
                //push
            }
        }


        $this->content = view('OLEGYERA.FrontBox.Media.pages.ua')->with([
            'article' => $article,
            'aside' => MediaArticle::orderBy('created_at', 'desc')->take(10)->get(),
            'structure_settings' => $structure_settings,
            'breadcrumbs' => $breadcrumbs,
            'agent' => new Agent()
        ])->render();
        return $this->renderBasic();
    }







    private function cretateLangProps($lang, $title){
        $this->lang = $lang;

        switch ($lang){
            case 'ua':
                setlocale(LC_TIME, 'ua_UA.KOI8-U');
                $this->title = mb_strtoupper($title) . ' - інструкція, склад, застосування, дозування, показання, протипоказання, відгуки | Мед. видання Medpravda';
                $this->description = mb_strtoupper($title) . ' - повна інформація про препарат від виробника з адаптованої, спрощеної інструкцією, списком хвороб, складом, показаннями, протипоказання, побічні дії, передозуванням, аналогами, відгуками.';
                break;
            case 'ru':
                setlocale(LC_TIME, 'ru_RU.UTF-8');
                $this->title = mb_strtoupper($title) . ' - инструкция, состав, применение, дозировка, показания, противопоказания, отзывы | Мед. Издание Medpravda';
                $this->description = mb_strtoupper($title) . ' - полная информация о препарате от производителя с адаптированной, упрощенной инструкцией, списком болезней, составом, показаниями, противопоказания, побочными действиями, передозировкой, аналогами, отзывами.';
                break;
            default:
                abort(404);
        }
    }





}
