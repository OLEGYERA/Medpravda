<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\Web\Tags;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\Web\Launch;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Fresh\Medpravda\MediaArticleDep;
use Fresh\Medpravda\MediaArticle;
use Fresh\Medpravda\MediaCategory;

use Fresh\Medpravda\Repositories\CatalogRepository;

class ArticlesView extends Launch
{
    protected $lang;

    public function ru(){
        $this->lang = 'ru';
        $this->title =  'Медицинские Статьи — Медправда';

        $this->Page = view('OLEGYERA.Web.pages.tags.articles.ru')->with([
            'media_items' => MediaArticleDep::where('category_id', 2)->orderBy('created_at', 'desc')->paginate(24),
            'side_articles' => MediaArticleDep::where('category_id', 1)->orderBy('created_at', 'desc')->take(6)->get()
        ])->render();
        return $this->Render();
    }


    public function ua(){
        $this->lang = 'ua';
        $this->title =  'Медичні статті — Медправа';

        $this->Page = view('OLEGYERA.Web.pages.tags.articles.ua')->with([
            'media_items' => MediaArticleDep::where('category_id', 2)->orderBy('created_at', 'desc')->paginate(24),
            'side_articles' => MediaArticleDep::where('category_id', 2)->orderBy('created_at', 'desc')->take(6)->get()
        ])->render();
        return $this->Render();
    }

}
