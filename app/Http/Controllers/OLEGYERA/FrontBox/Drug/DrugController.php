<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\Drug;
use Auth;
use Illuminate\Support\Arr;

use Fresh\Medpravda\DepATX;
use Fresh\Medpravda\Drug;
use Fresh\Medpravda\Substance;
use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class DrugController extends BasicController
{
    protected $atxArray = [];
    public function getDrugRu($alias){
        $drug = Drug::where('alias', $alias)->first();
        if(empty($drug)){
            abort(404);
        }
        else if($drug->show !== 1){
            return response(410 . ' Gone', 410);
        }
        $this->cretateLangProps('ru', $drug->title);
        $this->targeting_url = $drug->alias;
        $this->branding_url = $drug->alias;
        $this->getAtxArray($drug->dependency->atx);
        $this->breadcrumbs = [['title' => 'Лекарственные средства', 'alias' => route('ru.catalog.drug.alphabet')], ['title' => 'Инструкция', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Drug.pages.desktop.ru')->with([
            'drug' => $drug,
            'reviews' => $drug->reviews,
            'last_mod' => $this->getLastMod($drug),
            'analogs' => ['data' => $this->getAnalog($drug), 'type' => 'drug'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($drug), 'type' => 'drug'],
            'atx' => array_reverse($this->atxArray)
        ])->render();
        return $this->renderBasic();
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
