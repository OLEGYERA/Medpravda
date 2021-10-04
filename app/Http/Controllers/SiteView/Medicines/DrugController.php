<?php

namespace Fresh\Medpravda\Http\Controllers\SiteView\Medicines;

use Fresh\Medpravda\DepTerm;
use Fresh\Medpravda\Http\Controllers\SiteView\ViewController;

use Auth;
use Illuminate\Support\Arr;

use Fresh\Medpravda\DepATX;
use Fresh\Medpravda\Drug;
use Fresh\Medpravda\Substance;
use Illuminate\Http\Request;

class DrugController extends ViewController
{
    protected $contentTypeData = 'drug';
    protected $contentTypeCategory = 'medicines';

    protected $atxArray = [];
    public function getDrugRu($alias){
        $this->contentType = 3;
        $this->lang = 'ru';

//        dd(123);
        $drug = Drug::where('alias', $alias)->first();
        $drugInstructionColumnName = ['composition',
            'physical_chemical',
            'pharma_props',
            'indications',
            'contraindications',
            'security',
            'features',
            'pregnancy',
            'driver',
            'children',
            'usage_and_dose',
            'overdose',
            'side_effects',
            'interaction',
            'time_life',
            'storage_conditions',
            'release_form',
            'other'];
//        if(empty($drug)){
//            abort(404);
//        }
//        else if($drug->show !== 1){
//            return response(410 . ' Gone', 410);
//        }
//        $this->cretateLangProps('ru', $drug->title);
//        $this->targeting_url = $drug->alias;
//        $this->branding_url = $drug->alias;
        $this->getAtxArray($drug->dependency->atx);
//        $this->breadcrumbs = [['title' => 'Лекарственные средства', 'alias' => route('ru.catalog.drug.alphabet')], ['title' => 'Инструкция', 'alias' => null]];
//        $this->content = view('OLEGYERA.FrontBox.Drug.pages.desktop.ru')->with([
//            'drug' => $drug,
//            'reviews' => $drug->reviews,
//            'last_mod' => $this->getLastMod($drug),
//            'analogs' => ['data' => $this->getAnalog($drug), 'type' => 'drug'],
//            'fabricator_products' => ['data' => $this->getFabricatorProducts($drug), 'type' => 'drug'],
//            'atx' => array_reverse($this->atxArray)
//        ])->render();

        $termCollections = collect();


        $termCollections = $this->getTerms($drug->instruction, $drugInstructionColumnName, $termCollections);
        $termCollections = $this->getTerms($drug->instruction_adaptive, $drugInstructionColumnName, $termCollections);


        $this->contentTitle = $drug->title;
        $this->content = view($this->template . 'medicines.drug.information.ru')->with([
            'data' => $drug,
            'last_mod' => $this->getLastMod($drug),
            'type' => $this->contentTypeData,
            'atx' => array_reverse($this->atxArray),
            'terms' => $termCollections
        ]);
        return $this->render();
    }

    protected function getTerms($instruction, $drugInstructionColumnName, $collections){
        $terms_title_array = [];
        foreach ($drugInstructionColumnName as $colName){
            $exploded_strings = explode('-term', $instruction[$colName]);
            $terms_id_array = [];
            //collect term`s id
            foreach ($exploded_strings as $exploded_string){
                if(strpos($exploded_string, 'href="#') != false){
                    array_push($terms_id_array, explode('href="#', $exploded_string)[1]);
                }
            }
            $terms_id_array = array_unique($terms_id_array);
            //collect term`s title
            foreach ($terms_id_array as $id){
                $exploded_string = explode('<a href="#' . $id . '-term">', $instruction[$colName])[1];
                $exploded_string = explode('</a>', $exploded_string)[0];
                $terms_title_array = Arr::add($terms_title_array, $id, $exploded_string);
            }
        }



        foreach ($terms_title_array as $key => $item){
            $finded_term = DepTerm::find($key);
            if(!empty($finded_term)){
                $collections->push($finded_term);
            }
        }

        return $collections;
    }

    public function getDrugRuMobile($alias){

        $drug = Drug::where('alias', $alias)->first();
        if(empty($drug)){
            abort(404);
        }else if($drug->show !== 1){
            return response(410 . ' Gone', 410);
        }
        $this->cretateLangProps('ru', $drug->title);
        $this->targeting_url = $drug->alias;
        $this->is_mobile = true;
        $this->getAtxArray($drug->dependency->atx);
        $this->breadcrumbs = [['title' => 'ЛС', 'alias' => route('m.ru.catalog.drug.alphabet')], ['title' => 'Инструкция', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Drug.pages.mobile.ru')->with([
            'drug' => $drug,
            'reviews' => $drug->reviews,
            'last_mod' => $this->getLastMod($drug),
            'analogs' => ['data' => $this->getAnalog($drug), 'type' => 'drug'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($drug), 'type' => 'drug'],
            'atx' => array_reverse($this->atxArray)

        ])->render();
        return $this->renderBasic();
    }

    public function getDrugUa($alias){
        $drug = Drug::where('alias', $alias)->first();
        if(empty($drug)){
            abort(404);
        }else if($drug->show !== 1){
            return response(410 . ' Gone', 410);
        }

        $this->cretateLangProps('ua', $drug->utitle);
        $this->targeting_url = $drug->alias;
        $this->branding_url = $drug->alias;
        $this->getAtxArray($drug->dependency->atx);
        $this->breadcrumbs = [['title' => 'Лікарські засоби', 'alias' => route('ua.catalog.drug.alphabet')], ['title' => 'Інструкція', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Drug.pages.desktop.ua')->with([
            'drug' => $drug,
            'reviews' => $drug->reviews,
            'last_mod' => $this->getLastMod($drug),
            'analogs' => ['data' => $this->getAnalog($drug), 'type' => 'drug'],            'fabricator_products' => ['data' => $this->getFabricatorProducts($drug), 'type' => 'drug'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($drug), 'type' => 'drug'],
            'atx' => array_reverse($this->atxArray)

        ])->render();
        return $this->renderBasic();
    }

    public function getDrugUaMobile($alias){
        $drug = Drug::where('alias', $alias)->first();
        if(empty($drug)){
            abort(404);
        }else if($drug->show !== 1){
            return response(410 . ' Gone', 410);
        }
        $this->cretateLangProps('ua', $drug->utitle);
        $this->targeting_url = $drug->alias;
        $this->is_mobile = true;
        $this->getAtxArray($drug->dependency->atx);
        $this->breadcrumbs = [['title' => 'ЛЗ', 'alias' => route('m.ua.catalog.drug.alphabet')], ['title' => 'Інструкція', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Drug.pages.mobile.ua')->with([
            'drug' => $drug,
            'reviews' => $drug->reviews,
            'last_mod' => $this->getLastMod($drug),
            'analogs' => ['data' => $this->getAnalog($drug), 'type' => 'drug'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($drug), 'type' => 'drug'],
            'atx' => array_reverse($this->atxArray)

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

    private function getAtxArray($atx){
        array_push($this->atxArray, $atx);
        if($atx->parent_id != null){
            return $this->getAtxArray(DepATX::find($atx->parent_id));
        }
        return true;
    }

    private function getAnalog($drug){
        $analogs = [];
        $substances = $this->clearSubstance($drug);
        if($substances !== false){
            foreach ($substances as $substance){
                $sub_analogs = [];
                foreach ($substance->drug_deps as $drug_dep){
                    if($drug_dep->drug_dependency != null && $drug->id != $drug_dep->drug_dependency->drug->id && $drug_dep->drug_dependency->drug->show == 1){
                        array_push($sub_analogs, $drug_dep->drug_dependency->drug);
                    }
                }
                array_push($analogs, ['title' => $substance, 'data' => $sub_analogs]);
            }
        }

        return $analogs;
    }

    private function clearSubstance($drug){
        $clear_id_arr = [];
        $clear_substance_arr = [];
        foreach ($drug->dependency->substancesThrough as $substance){
            if(array_search($substance->id, $clear_id_arr) === false){
                array_push($clear_id_arr, $substance->id);
                array_push($clear_substance_arr, $substance);
            }
        }
        return count($clear_substance_arr) == 0 ? false : $clear_substance_arr;
    }

    private function getFabricatorProducts($drug){
        $products = [];
        if($drug->dependency->fabricator !== null)
            foreach ($drug->dependency->fabricator->drugs as $product){
                if($drug->id != $product->drug->id && $product->drug->show == 1){
                    array_push($products, $product->drug);
                }
            }
        return $products;
    }
}
