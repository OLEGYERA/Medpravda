<?php

    namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox;

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
    use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

    class HomeController extends BasicController
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

        public function homeRu(){
            $this->lang = 'ru';
            $this->title =  'Справочник лекарственных препаратов МедПравда. Описание лекарственных средств';
//            $this->content = view('OLEGYERA.FrontBox.Pages.Home.desktop.ru')->with([
//                'news' => MediaArticleDep::where('category_id', MediaCategory::where('alias', 'Novosti')->first()->id)->orderBy('created_at', 'desc')->take(5)->get(),
//                'top_news' => MediaArticleDep::where('category_id', MediaCategory::where('alias', 'Top-news')->first()->id)->orderBy('created_at', 'desc')->take(6)->get(),
//                'interview' => MediaArticleDep::where('category_id', MediaCategory::where('alias', 'Interview')->first()->id)->orderBy('created_at', 'desc')->take(6)->get(),
//                'articles' => MediaArticle::orderBy('updated_at', 'desc')->take(4)->get(),
//                'catalog' => $this->medicamentCatalog,
//            ])->render();

            $this->content = view('OLEGYERA.FrontBox.Pages.Home.desktop.ru')->with([
                'catalog' => $this->medicamentCatalog,
            ])->render();
            return $this->renderBasic();
        }


        public function homeUa(){
            $this->lang = 'ua';
            $this->title =  'Довідник лікарських препаратів МедПравда. Опис лікарських засобів';
            $this->content = view('OLEGYERA.FrontBox.Pages.Home.desktop.ua')->with([
                'news' => MediaArticleDep::where('category_id', MediaCategory::where('alias', 'Novosti')->first()->id)->orderBy('created_at', 'desc')->take(5)->get(),
                'top_news' => MediaArticleDep::where('category_id', MediaCategory::where('alias', 'Top-news')->first()->id)->orderBy('created_at', 'desc')->take(6)->get(),
                'interview' => MediaArticleDep::where('category_id', MediaCategory::where('alias', 'Interview')->first()->id)->orderBy('created_at', 'desc')->take(6)->get(),
                'articles' => MediaArticle::orderBy('updated_at', 'desc')->take(4)->get(),
                'catalog' => $this->medicamentCatalog,
            ])->render();
            return $this->renderBasic();
        }

    }
