<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\Web;
use Carbon\Carbon;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\Web\Launch;

use Fresh\Medpravda\MediaArticleDep;
use Illuminate\Http\Request;
use Auth;

use Fresh\Medpravda\MediaArticle;
use Fresh\Medpravda\MediaCategory;

use Fresh\Medpravda\Drug;
use Fresh\Medpravda\BadNew;
use Fresh\Medpravda\WareNew;
use Fresh\Medpravda\CosmeticNew;
use Fresh\Medpravda\Repositories\CatalogRepository;

class HomeView extends Launch
{
    protected $lang;
    private $medicamentCatalog = [
        'drug' => ['title' => 'Препараты', 'utitle' => 'Препарати', 'route_name' => 'drug.alphabet'],
        'bad' => ['title' => 'Диетические добавки', 'utitle' => 'Дієтичні добавки', 'route_name' => 'bad.alphabet'],
        'ware' => ['title' => 'Медицинские изделия', 'utitle' => 'Медичні вироби', 'route_name' => 'ware.alphabet'],
        'cosmetic' => ['title' => 'Косметические средства', 'utitle' => 'Косметичні засоби', 'route_name' => 'cosmetic.alphabet'],
        'inname' => ['title' => 'Международные названия', 'utitle' => 'Міжнародні назви', 'route_name' => 'inname.alphabet'],
        'pharma' => ['title' => 'Фарм. группы препаратов', 'utitle' => 'Фарм. групи препаратів', 'route_name' => 'pharma.alphabet'],
        'pharma_bad' => ['title' => 'Группы диетических добавок', 'utitle' => 'Групи дієтичних добавок', 'route_name' => 'pharma_bad.list'],
        'fabricator' => ['title' => 'Производители', 'utitle' => 'Виробники', 'route_name' => 'fabricator.alphabet'],
        'drug_atx' => ['title' => 'ATX-классификация препаратов', 'utitle' => 'ATX-класифікація препаратів', 'route_name' => 'drug.atx', 'route_item' => 'drug'],
        'bad_atx' => ['title' => 'Классификация диетических добавок', 'utitle' => 'Класифікація дієтичних добавок', 'route_name' => 'bad.atx', 'route_item' => 'bad'],
        'ware_atx' => ['title' => 'Классификация медицинских изделий', 'utitle' => 'Класифікація медичних виробів', 'route_name' => 'ware.atx', 'route_item' => 'ware'],
        'cosmetic_atx' => ['title' => 'Классификация косметических средств', 'utitle' => 'Класифікація косметичних засобів', 'route_name' => 'cosmetic.atx', 'route_item' => 'cosmetic'],
    ];

    public function ru(){
        $this->lang = 'ru';
        $this->title =  'Справочник лекарственных препаратов МедПравда. Описание лекарственных средств';
//            $this->content = view('OLEGYERA.FrontBox.Pages.Home.desktop.ru')->with([
//                'news' => MediaArticleDep::where('category_id', MediaCategory::where('alias', 'Novosti')->first()->id)->orderBy('created_at', 'desc')->take(5)->get(),
//                'top_news' => MediaArticleDep::where('category_id', MediaCategory::where('alias', 'Top-news')->first()->id)->orderBy('created_at', 'desc')->take(6)->get(),
//                'interview' => MediaArticleDep::where('category_id', MediaCategory::where('alias', 'Interview')->first()->id)->orderBy('created_at', 'desc')->take(6)->get(),
//                'articles' => MediaArticle::orderBy('updated_at', 'desc')->take(4)->get(),
//                'catalog' => $this->medicamentCatalog,
//            ])->render();

        $this->Page = view('OLEGYERA.Web.pages.home.ru')->with([
            'popular' => [
                'count' => MediaArticle::count(),
                'data' => MediaArticle::orderBy('view', 'desc')->take(14)->get(),
            ],
            'news' => [
                'count' => MediaArticleDep::where('category_id', 1)->count(),
                'last' => MediaArticleDep::where('category_id', 1)->orderBy('created_at', 'desc')->take(14)->get(),
                'popular' => MediaArticleDep::where('category_id', 1)->orderBy('created_at', 'asc')->take(6)->get(),
            ],
            'interviews' => [
                'count' => MediaArticleDep::where('category_id', 3)->count(),
                'items' => MediaArticleDep::where('category_id', 3)->orderBy('created_at', 'desc')->take(4)->get(),
            ],
            'articles' => [
                'count' => MediaArticleDep::where('category_id', 2)->count(),
                'last' => MediaArticleDep::where('category_id', 2)->orderBy('created_at', 'desc')->take(7)->get(),
                'popular' => MediaArticleDep::where('category_id', 2)->orderBy('created_at', 'asc')->take(4)->get(),
            ],
            'columns' => [
                'count' => MediaArticleDep::where('category_id', 13)->count(),
                'items' => MediaArticleDep::where('category_id', 13)->orderBy('created_at', 'desc')->take(6)->get(),
            ],
            'podcasts' => [
                'count' => MediaArticleDep::where('category_id', 14)->count(),
                'items' => MediaArticleDep::where('category_id', 14)->orderBy('created_at', 'desc')->take(6)->get(),
            ],
            'protocols' => [
                'count' => MediaArticleDep::where('category_id', 15)->count(),
                'items' => MediaArticleDep::where('category_id', 15)->orderBy('created_at', 'desc')->take(6)->get(),
            ],
            'specials' => [
                'count' => MediaArticleDep::where('category_id', 9)->count(),
                'items' => MediaArticleDep::where('category_id', 9)->orderBy('created_at', 'desc')->take(3)->get(),
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


    public function ua(){
        $this->lang = 'ua';
        $this->title =  'Довідник лікарських препаратів МедПравда. Опис лікарських засобів';


        $this->Page = view('OLEGYERA.Web.pages.home.ua')->with([
            'popular' => [
                'count' => MediaArticle::count(),
                'data' => MediaArticle::orderBy('view', 'desc')->take(14)->get(),
            ],
            'news' => [
                'count' => MediaArticleDep::where('category_id', 1)->count(),
                'last' => MediaArticleDep::where('category_id', 1)->orderBy('created_at', 'desc')->take(14)->get(),
                'popular' => MediaArticleDep::where('category_id', 1)->orderBy('created_at', 'asc')->take(6)->get(),
            ],
            'interviews' => [
                'count' => MediaArticleDep::where('category_id', 3)->count(),
                'items' => MediaArticleDep::where('category_id', 3)->orderBy('created_at', 'desc')->take(4)->get(),
            ],
            'articles' => [
                'count' => MediaArticleDep::where('category_id', 2)->count(),
                'last' => MediaArticleDep::where('category_id', 2)->orderBy('created_at', 'desc')->take(7)->get(),
                'popular' => MediaArticleDep::where('category_id', 2)->orderBy('created_at', 'asc')->take(4)->get(),
            ],
            'columns' => [
                'count' => MediaArticleDep::where('category_id', 13)->count(),
                'items' => MediaArticleDep::where('category_id', 13)->orderBy('created_at', 'desc')->take(6)->get(),
            ],
            'podcasts' => [
                'count' => MediaArticleDep::where('category_id', 14)->count(),
                'items' => MediaArticleDep::where('category_id', 14)->orderBy('created_at', 'desc')->take(6)->get(),
            ],
            'protocols' => [
                'count' => MediaArticleDep::where('category_id', 15)->count(),
                'items' => MediaArticleDep::where('category_id', 15)->orderBy('created_at', 'desc')->take(6)->get(),
            ],
            'specials' => [
                'count' => MediaArticleDep::where('category_id', 9)->count(),
                'items' => MediaArticleDep::where('category_id', 9)->orderBy('created_at', 'desc')->take(3)->get(),
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
