<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\MediaZone;

use Fresh\Medpravda\Http\Controllers\Controller;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;
use Illuminate\Http\Request;
use Fresh\Medpravda\MediaArticle;

class ArticleController extends BasicController
{
    public function getArticleRu($alias, $id){
        $article = MediaArticle::where('alias', $alias)->first();
        if(empty($article)){
            abort(404);
        }
        else if($article->setting->show !== 1){
            return response(410 . ' Gone', 410);
        }
        $this->cretateLangProps('ru', $article->title);
        $this->targeting_url = $article->alias;
        $this->branding_url = $article->alias;
        $this->breadcrumbs = [['title' => 'Медиа-зона', 'alias' => null], ['title' => 'Новые Статьи', 'alias' => null], ['title' => $article->title, 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.MediaZone.Articles.pages.desktop.ru')->with([
            'article' => $article,
        ])->render();
        return $this->renderBasic();
    }

    public function getArticleRuMobile($alias){
        $article = MediaArticle::where('alias', $alias)->first();
        if(empty($article)){
            abort(404);
        }
        else if($article->setting->show !== 1){
            return response(410 . ' Gone', 410);
        }
        $this->cretateLangProps('ru', $article->title);
        $this->is_mobile = true;
        $this->targeting_url = $article->alias;
        $this->branding_url = $article->alias;
        $this->breadcrumbs = [['title' => 'МЗ', 'alias' => null], ['title' => 'НС', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.MediaZone.Articles.pages.mobile.ru')->with([
            'article' => $article,
        ])->render();
        return $this->renderBasic();
    }

    public function getArticleUa($alias){
        $article = MediaArticle::where('alias', $alias)->first();
        if(empty($article)){
            abort(404);
        }
        else if($article->setting->show !== 1){
            return response(410 . ' Gone', 410);
        }
        $this->cretateLangProps('ua', $article->utitle);
        $this->targeting_url = $article->alias;
        $this->branding_url = $article->alias;
        $this->breadcrumbs = [['title' => 'Медіа-зона', 'alias' => null], ['title' => 'Нові Статті', 'alias' => null], ['title' => $article->utitle, 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.MediaZone.Articles.pages.desktop.ua')->with([
            'article' => $article,
        ])->render();
        return $this->renderBasic();
    }

    public function getArticleUaMobile($alias){
        $article = MediaArticle::where('alias', $alias)->first();
        if(empty($article)){
            abort(404);
        }
        else if($article->setting->show !== 1){
            return response(410 . ' Gone', 410);
        }
        $this->is_mobile = true;
        $this->cretateLangProps('ua', $article->utitle);
        $this->targeting_url = $article->alias;
        $this->branding_url = $article->alias;
        $this->breadcrumbs = [['title' => 'МЗ', 'alias' => null], ['title' => 'НС', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.MediaZone.Articles.pages.mobile.ua')->with([
            'article' => $article,
        ])->render();
        return $this->renderBasic();
    }


    private function cretateLangProps($lang, $title){
        $this->lang = $lang;

        switch ($lang){
            case 'ua':
                setlocale(LC_TIME, 'ua_UA.KOI8-U');
                $this->title = mb_strtoupper($title) . ' - статья | Мед. видання Medpravda';
                $this->description = '';
                break;
            case 'ru':
                setlocale(LC_TIME, 'ru_RU.UTF-8');
                $this->title = mb_strtoupper($title) . ' - стаття | Мед. Издание Medpravda';
                $this->description = '';
                break;
            default:
                abort(404);
        }
    }

}
