<?php
namespace Fresh\Medpravda\Repositories;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;
use Illuminate\Support\Arr;


class CatalogRepository extends ApiController
{
    private $alphabetCollection = [
        'num' => ['0','1','2','3','4','5','6','7','8','9'],
        'ru' => ['а','б','в','г','д','е','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','э','ю','я'],
        'ua' => ['а','б','в','г','д','е','є','ж','з','и','і','ї','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ю','я',],
        'en' => ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z']
    ];
    private $medicamentCatalog = [
        'drug' => ['title' => 'Алфавитный указатель препаратов', 'utitle' => 'Алфавітний покажчик препаратів', 'route_name' => 'drug.alphabet'],
        'bad' => ['title' => 'Алфавитный указатель диетических добавок', 'utitle' => 'Алфавітний покажчик дієтичних добавок', 'route_name' => 'bad.alphabet'],
        'ware' => ['title' => 'Алфавитный указатель изделий медицинского назначения', 'utitle' => 'Алфавітний покажчик виробів медичного призначення', 'route_name' => 'ware.alphabet'],
        'cosmetic' => ['title' => 'Алфавитный указатель косметических средств', 'utitle' => 'Алфавітний покажчик косметичних засобів', 'route_name' => 'cosmetic.alphabet'],
        'inname' => ['title' => 'Алфавитный указатель международных названий препаратов', 'utitle' => 'Алфавітний покажчик міжнародних назв препаратів', 'route_name' => 'inname.alphabet'],
        'pharma' => ['title' => 'Алфавитный указатель фармакотерапевтических групп для препаратов', 'utitle' => 'Алфавітний покажчик фармакотерапевтичних груп для препаратів', 'route_name' => 'pharma.alphabet'],
        'pharma_bad' => ['title' => 'Алфавитный указатель групп диетических добавок', 'utitle' => 'Алфавітний покажчик груп дієтичних добавок', 'route_name' => 'pharma_bad.list'],
        'fabricator' => ['title' => 'Алфавитный указатель производителей', 'utitle' => 'Алфавітний покажчик виробників', 'route_name' => 'fabricator.alphabet'],
        'drug_atx' => ['title' => 'ATX-классификация препаратов', 'utitle' => 'ATX-класифікація препаратів', 'route_name' => 'drug.atx', 'route_item' => 'drug'],
        'bad_atx' => ['title' => 'Классификация диетических добавок', 'utitle' => 'Класифікація дієтичних добавок', 'route_name' => 'bad.atx', 'route_item' => 'bad'],
        'ware_atx' => ['title' => 'Классификация изделий медицинского назначения', 'utitle' => 'Класифікація виробів медичного призначення', 'route_name' => 'ware.atx', 'route_item' => 'ware'],
        'cosmetic_atx' => ['title' => 'Классификация косметических средств', 'utitle' => 'Класифікація косметичних засобів', 'route_name' => 'cosmetic.atx', 'route_item' => 'cosmetic'],
    ];
    private $view_path = 'OLEGYERA.FrontBox.Pages.Catalog.';
    private $model;
    private $atx;
    private $type;
    private $is_mobile;
    private $lang;


    public function __construct($model, $type, $is_mobile, $lang, $atx = null)
    {
        $this->model = $model;
        $this->type = $type;
        $this->is_mobile = $is_mobile;
        $this->lang = $lang;
        $this->atx = $atx;
    }

    public function alphabetValVerification($val){
        if($val == null || mb_strlen($val) > 1 || ($this->type == 'inname' ? $this->model->where('title', 'like', $val . '%')->count() : $this->model->where($this->lang == 'ru' ? 'title' : 'utitle', 'like', $val . '%')->count()) == 0){
            $alphabet = $this->AlphabetGenerator();
            //присутсвует тех.ошибка, если бд пустая и нет соответсвий
            return ['status' => 'redirect', 'route' => ($this->is_mobile ? 'm.' : '') . $this->lang . '.catalog.' . $this->type . '.alphabet', 'val' => $alphabet['num'] == null ? ($alphabet['let'] == null ? mb_strtoupper($alphabet['let_en'][0]) : mb_strtoupper($alphabet['let'][0])) : mb_strtoupper($alphabet['num'][0])];
        }
    }

    public function alphabetDataContent($val){
        switch ($this->type){
            case 'drug':
                $medicamentData = $this->model->select($this->lang == 'ru' ? ['title AS name', $this->model->getTable() . '.*'] : ['utitle AS name', $this->model->getTable() . '.*'])->where($this->lang == 'ru' ? 'title' : 'utitle', 'like', $val . '%')->orderBy($this->lang == 'ru' ? 'title' : 'utitle', 'ASC')->paginate(50);
                $routeNameItem = ($this->lang == 'ru' ? 'ru.' : 'ua.') . $this->type;
                break;
            case 'inname':
                $medicamentData = $this->model->select(['title AS name', $this->model->getTable() . '.*'])->where('title', 'like', $val . '%')->orderBy('title', 'ASC')->paginate(50);
                $routeNameItem = ($this->is_mobile ? 'm.' : '') . ($this->lang == 'ru' ? 'ru.' : 'ua.') . 'catalog.drug.' . $this->type;
                break;
            case 'pharma':
                $medicamentData = $this->model->select($this->lang == 'ru' ? ['title AS name', $this->model->getTable() . '.*'] : ['utitle AS name', $this->model->getTable() . '.*'])->where($this->lang == 'ru' ? 'title' : 'utitle', 'like', $val . '%')->orderBy($this->lang == 'ru' ? 'title' : 'utitle', 'ASC')->paginate(50);
                $routeNameItem = ($this->is_mobile ? 'm.' : '') . ($this->lang == 'ru' ? 'ru.' : 'ua.') . 'catalog.drug.' . $this->type;
                break;
            case 'pharma_bad':
                $medicamentData = $this->model->select($this->lang == 'ru' ? ['title AS name', $this->model->getTable() . '.*'] : ['utitle AS name', $this->model->getTable() . '.*'])->orderBy($this->lang == 'ru' ? 'title' : 'utitle', 'ASC')->paginate(50);
                $routeNameItem = ($this->is_mobile ? 'm.' : '') . ($this->lang == 'ru' ? 'ru.' : 'ua.') . 'catalog.bad.' . $this->type;
                break;
            case 'fabricator':
                $medicamentData = $this->model->select($this->lang == 'ru' ? ['title AS name', $this->model->getTable() . '.*'] : ['utitle AS name', $this->model->getTable() . '.*'])->where($this->lang == 'ru' ? 'title' : 'utitle', 'like', $val . '%')->orderBy($this->lang == 'ru' ? 'title' : 'utitle', 'ASC')->paginate(50);
                $routeNameItem = ($this->is_mobile ? 'm.' : '') . ($this->lang == 'ru' ? 'ru.' : 'ua.') . 'catalog.list.' . $this->type;
                break;
            default:
                $medicamentData = $this->model->select($this->lang == 'ru' ? ['title AS name', $this->model->getTable() . '.*'] : ['utitle AS name', $this->model->getTable() . '.*'])->where($this->lang == 'ru' ? 'title' : 'utitle', 'like', $val . '%')->orderBy($this->lang == 'ru' ? 'title' : 'utitle', 'ASC')->paginate(50);
                $routeNameItem = $this->type == 'inname' ?  : ($this->is_mobile ? 'm.' : '') . ($this->lang == 'ru' ? 'ru.' : 'ua.') . $this->type;
                break;
        }

        $seo_view_path = 'OLEGYERA.FrontBox.Pages.Catalog.seo.'. $this->type . '.' . $this->lang;

        return view($this->view_path . 'basic.' . $this->ResponseIsMobile() . '.' . $this->lang)->with([
            $this->type == 'pharma_bad' ? '' : 'alphabet' => $this->AlphabetGenerator(),
            'medicamentCatalog' => $this->medicamentCatalog,
            'medicamentData' => $medicamentData,
            'currentDataName' =>  $this->type,
            'currentAlpha' => $val,
            'routeNameAlphabet' => ($this->is_mobile ? 'm.' : '') . $this->lang . '.catalog.' . $this->type . '.alphabet',
            'routeNameItem' => $routeNameItem,
            'includeDataPath' => $this->view_path . '.alphabet',
            'seoText' => view()->exists($seo_view_path) ? view($seo_view_path)->render() : '',
        ])->render();
    }

    public function ResultDataContent($val){
        switch ($this->type){
            case 'inname':
                $parent = $this->model->where('title', $val)->select(['title AS name', $this->model->getTable() . '.*'])->first();
                if($val != null && $parent == null){
                    abort(404);
                }
                $medicamentData = $parent->medicines()->select($this->lang == 'ru' ? ['title AS name', 'drugs.*'] : ['utitle AS name', 'drugs.*'])->orderBy($this->lang == 'ru' ? 'title' : 'utitle', 'ASC')->paginate(50);
                $routeNameItem = ($this->is_mobile ? 'm.' : '') . ($this->lang == 'ru' ? 'ru.' : 'ua.') . 'drug';
                break;
            case 'pharma':
                $parent = $this->model->where('alias', $val)->select($this->lang == 'ru' ? ['title AS name', $this->model->getTable() . '.*'] : ['utitle AS name', $this->model->getTable() . '.*'])->first();
                if($val != null && $parent == null){
                    abort(404);
                }
                $medicamentData = $parent->medicines()->select($this->lang == 'ru' ? ['title AS name', 'drugs.*'] : ['utitle AS name', 'drugs.*'])->orderBy($this->lang == 'ru' ? 'title' : 'utitle', 'ASC')->paginate(50);
                $routeNameItem = ($this->is_mobile ? 'm.' : '') . ($this->lang == 'ru' ? 'ru.' : 'ua.') . 'drug';
                break;
            case 'pharma_bad':
                $parent = $this->model->where('alias', $val)->select($this->lang == 'ru' ? ['title AS name', $this->model->getTable() . '.*'] : ['utitle AS name', $this->model->getTable() . '.*'])->first();
                if($val != null && $parent == null){
                    abort(404);
                }
                $medicamentData = $parent->medicines()->select($this->lang == 'ru' ? ['title AS name', 'bad_news.*'] : ['utitle AS name', 'bad_news.*'])->orderBy($this->lang == 'ru' ? 'title' : 'utitle', 'ASC')->paginate(50);
                $routeNameItem = ($this->is_mobile ? 'm.' : '') . ($this->lang == 'ru' ? 'ru.' : 'ua.') . 'bad';
                break;
            case 'fabricator':
                $parent = $this->model->where('alias', $val)->select($this->lang == 'ru' ? ['title AS name', $this->model->getTable() . '.*'] : ['utitle AS name', $this->model->getTable() . '.*'])->first();
                if($val != null && $parent == null){
                    abort(404);
                }
                $medicamentData = $parent->medicines($parent, $this->lang);
                $routeNameItem = ($this->is_mobile ? 'm.' : '') . ($this->lang == 'ru' ? 'ru.' : 'ua.');
                break;
        }

        $seo_view_path = 'OLEGYERA.FrontBox.Pages.Catalog.seo.'. $this->type . '.list.' . $this->lang;
//        $this->model->select($this->lang == 'ru' ? ['title AS name', $this->model->getTable() . '.*'] : ['utitle AS name', $this->model->getTable() . '.*'])->where($this->lang == 'ru' ? 'title' : 'utitle', 'like', $val . '%')->orderBy($this->lang == 'ru' ? 'title' : 'utitle', 'ASC')->paginate(50),

        return view($this->view_path . 'basic.' . $this->ResponseIsMobile() . '.' . $this->lang)->with([
            'medicamentCatalog' => $this->medicamentCatalog,
            'itemParent' => $parent,
            'medicamentData' =>  $medicamentData,
            'currentDataName' =>  $this->type,
            'routeNameAlphabet' => ($this->is_mobile ? 'm.' : '') . $this->lang . '.catalog.' . $this->type . '.alphabet',
            'routeNameItem' => $routeNameItem,
            'includeDataPath' => $this->view_path . '.result',
            'lang' => $this->lang,
            'seoText' => view()->exists($seo_view_path) ? view($seo_view_path)->with(['title' => $parent->name])->render() : '',
        ])->render();
    }

    public function atxDataContent($val){
        $table_name = $this->atx->getTable(); //создаем переменную, так-как модель перезатирается ниже!
        $table_medicine_name = $this->type == 'drug_atx' ? 'drugs' : ($this->type == 'bad_atx' ? 'bad_news' : ($this->type == 'ware_atx' ? 'ware_news' : 'cosmetic_news'));
        $parent = $val == null ? null: $this->atx->where('class', $val)->select($this->lang == 'ru' ? ['title AS name', $table_name . '.*'] : ['utitle AS name', $table_name . '.*'])->first();
        if($val != null && $parent == null){
            abort(404);
        }
        $this->atx = $val == null ? $this->atx->where('parent_id', null) : $this->atx->where('parent_id', $parent->id);
        $seo_view_path = $parent == null ? 'OLEGYERA.FrontBox.Pages.Catalog.seo.'. $this->type . '.' . $this->lang : 'OLEGYERA.FrontBox.Pages.Catalog.seo.'. $this->type . '.list.' . $this->lang;

        return view($this->view_path . 'basic.' . $this->ResponseIsMobile() . '.' . $this->lang)->with([
            'medicamentCatalog' => $this->medicamentCatalog,
            'atxData' => $this->atx->select($this->lang == 'ru' ? ['title AS name', $table_name . '.*'] : ['utitle AS name', $table_name . '.*'])->orderByRaw($this->type == 'drug_atx' ? 'class ASC' : 'LENGTH(class) ASC')->get(),
            'atxParent' => $parent,
            'atxParentMedicines' => is_object($parent) ? $parent->medicines()->select($this->lang == 'ru' ? ['title AS name', $table_medicine_name . '.*'] : ['utitle AS name', $table_medicine_name . '.*'])->orderBy($this->lang == 'ru' ? 'title' : 'utitle', 'ASC')->paginate(50) : [],
            'currentDataName' =>  $this->type,
            'routeNameAlphabet' => ($this->is_mobile ? 'm.' : '') . $this->lang . '.catalog.' . $this->type,
            'routeNameAtx' => ($this->is_mobile ? 'm.' : '') . ($this->lang == 'ru' ? 'ru.' : 'ua.') . 'catalog.' . $this->medicamentCatalog[$this->type]['route_name'],
            'routeNameItem' => ($this->is_mobile ? 'm.' : '') . ($this->lang == 'ru' ? 'ru.' : 'ua.') . $this->medicamentCatalog[$this->type]['route_item'],
            'includeDataPath' => $this->view_path . '.atx',
            'lang' => $this->lang,
            'seoText' => $parent == null ? (view()->exists($seo_view_path) ? view($seo_view_path)->render() : '') : (view()->exists($seo_view_path) ? view($seo_view_path)->with(['title' => $parent->class . ' - ' . $parent->name])->render() : ''),
        ])->render();
    }

    public function CatalogTitle(){
        return $this->medicamentCatalog[$this->type][$this->lang == 'ru' ? 'title' : 'utitle'] . '| ' . ($this->lang == 'ru' ? 'Мед. Издание Medpravda' : 'Мед. видання Medpravda');
    }

    private function ResponseIsMobile(){
        return $this->is_mobile ? 'mobile': 'desktop';
    }


    private function AlphabetGenerator(){
        $alphabetSuccessCollection = [];
        $numCollection = [];
        $letCollection = [];
        $lenEnCollection = [];

        //separates model for clearing search

        foreach ($this->alphabetCollection['num'] as $num){
            $alpha_num_model = $this->model;
            if($this->type == 'drug')
                $alpha_num_model = $alpha_num_model;
            $counter = $this->type == 'inname' ? $alpha_num_model->where('title', 'like', $num . '%')->count() : $alpha_num_model->newQuery()->where($this->lang == 'ru' ? 'title' : 'utitle', 'like', $num . '%')->count();
            if($counter != 0){
                array_push($numCollection, $num);
            }
        }
        $alphabetSuccessCollection = Arr::add($alphabetSuccessCollection, 'num' , $numCollection);


        foreach ($this->alphabetCollection[$this->lang == 'ru' ? 'ru' : 'ua'] as $key => $let){
            $alpha_let_ru_model = $this->model;
            if($this->type == 'drug')
                $alpha_let_ru_model = $alpha_let_ru_model;

            $counter = $this->type == 'inname' ? $alpha_let_ru_model->where('title', 'like', $let . '%')->count() : $alpha_let_ru_model->where($this->lang == 'ru' ? 'title' : 'utitle', 'like', $let . '%')->count();

            if($counter !== 0){
                array_push($letCollection, $let);
            }
        }

        $alphabetSuccessCollection = Arr::add($alphabetSuccessCollection, 'let' , $letCollection);

        foreach ($this->alphabetCollection['en'] as $let_en){
            $alpha__let_en_model = $this->model;
            if($this->type == 'drug')
                $alpha__let_en_model = $alpha__let_en_model;
            $counter = $this->type == 'inname' ? $alpha__let_en_model->where('title', 'like', $let_en . '%')->count() : $alpha__let_en_model->where($this->lang == 'ru' ? 'title' : 'utitle', 'like', $let_en . '%')->count();
            if($counter != 0){
                array_push($lenEnCollection, $let_en);
            }
        }
        $alphabetSuccessCollection = Arr::add($alphabetSuccessCollection, 'let_en' , $lenEnCollection);

        return $alphabetSuccessCollection;
    }


}
