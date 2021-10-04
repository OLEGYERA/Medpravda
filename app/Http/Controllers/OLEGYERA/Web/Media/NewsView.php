<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\Web\Media;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\Web\Launch;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Fresh\Medpravda\MediaArticleDep;
use Fresh\Medpravda\MediaArticle;
use Fresh\Medpravda\MediaCategory;

use Fresh\Medpravda\Repositories\CatalogRepository;

class NewsView extends Launch
{
    protected $lang;

    public function ru(){
        $this->lang = 'ru';
        $this->title =  'Новости Украины и мира в области медицины сегодня 2021, карантин, коронавирус, ограничения — Медправда';


        $this->Page = view('OLEGYERA.Web.pages.home.ru')->with([

        ])->render();
        return $this->Render();
    }


    public function ua(){
        $this->lang = 'ua';
        $this->title =  'Довідник лікарських препаратів МедПравда. Опис лікарських засобів';


        $this->Page = view('OLEGYERA.Web.pages.home.ua')->with([
            'popular' => [
                'count' => MediaArticleDep::where('category_id', 3)->count(),
                'data' => MediaArticleDep::where('category_id', 3)->orderBy('created_at', 'desc')->take(14)->get(),
            ],
            'news' => [
                'count' => MediaArticleDep::where('category_id', 1)->count(),
                'last' => MediaArticleDep::where('category_id', 1)->orderBy('created_at', 'desc')->take(14)->get(),
                'popular' => MediaArticleDep::where('category_id', 1)->orderBy('created_at', 'asc')->take(6)->get(),
            ],
            'articles' => [
                'count' => MediaArticleDep::where('category_id', 2)->count(),
                'last' => MediaArticleDep::where('category_id', 2)->orderBy('created_at', 'desc')->take(7)->get(),
                'popular' => MediaArticleDep::where('category_id', 2)->orderBy('created_at', 'asc')->take(4)->get(),
            ],
            'catalog' => $this->medicamentCatalog,
            'drugs' => [
                'last' => Drug::orderBy('created_at', 'desc')->take(4)->get(),
                'popular' => Drug::orderBy('created_at', 'asc')->take(4)->get(),
            ],
            'cosmetics' => [
                'last' => CosmeticNew::orderBy('created_at', 'desc')->take(4)->get(),
                'popular' => CosmeticNew::orderBy('created_at', 'asc')->take(4)->get(),
            ],
            'wares' => [
                'last' => WareNew::orderBy('created_at', 'desc')->take(4)->get(),
                'popular' => WareNew::orderBy('created_at', 'asc')->take(4)->get(),
            ],
            'bads' => [
                'last' => BadNew::orderBy('created_at', 'desc')->take(4)->get(),
                'popular' => BadNew::orderBy('created_at', 'asc')->take(4)->get(),
            ]
        ])->render();
        return $this->Render();
    }

}
