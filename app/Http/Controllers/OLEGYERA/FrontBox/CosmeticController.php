<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox;
use Auth;
use Illuminate\Support\Arr;

use Fresh\Medpravda\ClassCosmetic;
use Fresh\Medpravda\CosmeticNew;
use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class CosmeticController extends BasicController
{
    protected $classificationArray = [];
    public function getCosmeticRu($alias){
        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        if(empty($cosmetic)){
            abort(404);
        }

        $this->cretateLangProps('ru', $cosmetic->title);
        $this->targeting_url = $cosmetic->alias;
        $this->branding_url = $cosmetic->alias;

        if($cosmetic->alias == 'Permin-novyy-los\'on-sprey'){
            $this->targeting_url = 'Permin-novyy-los';
            $this->branding_url = 'Permin-novyy-los';
        }

        $this->getClassificationArray($cosmetic->dependency->classification);
        $this->breadcrumbs = [['title' => 'Косметические средства', 'alias' => route('ru.catalog.cosmetic.alphabet')], ['title' => 'Инструкция', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Cosmetic.pages.desktop.ru')->with([
            'cosmetic' => $cosmetic,
            'last_mod' => $this->getLastMod($cosmetic),
            'analogs' => ['data' => $this->getAnalog($cosmetic), 'type' => 'cosmetic'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($cosmetic), 'type' => 'cosmetic'],
            'classification' => array_reverse($this->classificationArray)
        ])->render();
        return $this->renderBasic();
    }

    public function getCosmeticRuMobile($alias){

        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        if(empty($cosmetic)){
            abort(404);
        }

        $this->cretateLangProps('ru', $cosmetic->title);
        $this->targeting_url = $cosmetic->alias;
        $this->is_mobile = true;
        $this->getClassificationArray($cosmetic->dependency->classification);
        $this->breadcrumbs = [['title' => 'КС', 'alias' => route('m.ru.catalog.cosmetic.alphabet')], ['title' => 'Инструкция', 'alias' => null]];


        $this->content = view('OLEGYERA.FrontBox.Cosmetic.pages.mobile.ru')->with([
            'cosmetic' => $cosmetic,
            'last_mod' => $this->getLastMod($cosmetic),
            'analogs' => ['data' => $this->getAnalog($cosmetic), 'type' => 'cosmetic'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($cosmetic), 'type' => 'cosmetic'],
            'classification' => array_reverse($this->classificationArray)
        ])->render();
        return $this->renderBasic();
    }

    public function getCosmeticUa($alias){
        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        if(empty($cosmetic)){
            abort(404);
        }
        $this->cretateLangProps('ua', $cosmetic->utitle);
        $this->targeting_url = $cosmetic->alias;
        $this->branding_url = $cosmetic->alias;
        $this->getClassificationArray($cosmetic->dependency->classification);

        $this->breadcrumbs = [['title' => 'Косметичні засоби', 'alias' => route('ua.catalog.cosmetic.alphabet')], ['title' => 'Інструкція', 'alias' => null]];


        $this->content = view('OLEGYERA.FrontBox.Cosmetic.pages.desktop.ua')->with([
            'cosmetic' => $cosmetic,
            'last_mod' => $this->getLastMod($cosmetic),
            'analogs' => ['data' => $this->getAnalog($cosmetic), 'type' => 'cosmetic'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($cosmetic), 'type' => 'cosmetic'],
            'classification' => array_reverse($this->classificationArray)
        ])->render();
        return $this->renderBasic();
    }

    public function getCosmeticUaMobile($alias){
        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        if(empty($cosmetic)){
            abort(404);
        }
        $this->cretateLangProps('ua', $cosmetic->utitle);
        $this->targeting_url = $cosmetic->alias;
        $this->is_mobile = true;
        $this->getClassificationArray($cosmetic->dependency->classification);
        $this->breadcrumbs = [['title' => 'КЗ', 'alias' => route('m.ua.catalog.cosmetic.alphabet')], ['title' => 'Інструкція', 'alias' => null]];


        $this->content = view('OLEGYERA.FrontBox.Cosmetic.pages.mobile.ua')->with([
            'cosmetic' => $cosmetic,
            'last_mod' => $this->getLastMod($cosmetic),
            'analogs' => ['data' => $this->getAnalog($cosmetic), 'type' => 'cosmetic'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($cosmetic), 'type' => 'cosmetic'],
            'classification' => array_reverse($this->classificationArray)
        ])->render();
        return $this->renderBasic();
    }





    private function cretateLangProps($lang, $title){
        $this->lang = $lang;

        switch ($lang){
            case 'ua':
                setlocale(LC_TIME, 'ua_UA.KOI8-U');
                $this->title = mb_strtoupper($title) . ' - інструкція, склад, застосування, дозування, показання, протипоказання, відгуки | Мед. видання Medpravda';
                $this->description = mb_strtoupper($title) . ' - повна інформація про косметичний засіб від виробника з адаптованої, спрощеної інструкцією, списком хвороб, складом, показаннями, протипоказання, побічні дії, передозуванням, аналогами, відгуками.';
                break;
            case 'ru':
                setlocale(LC_TIME, 'ru_RU.UTF-8');
                $this->title = mb_strtoupper($title) . ' - инструкция, состав, применение, дозировка, показания, противопоказания, отзывы | Мед. Издание Medpravda';
                $this->description = mb_strtoupper($title) . ' - полная информация о косметическом средстве от производителя с адаптированной, упрощенной инструкцией, списком болезней, составом, показаниями, противопоказания, побочными действиями, передозировкой, аналогами, отзывами.';
                break;
            default:
                abort(404);
        }
    }

    private function getClassificationArray($classification){
        if($classification != null){
            array_push($this->classificationArray, $classification);
            if($classification->parent_id != null){
                return $this->getClassificationArray(ClassCosmetic::find($classification->parent_id));
            }
        }
        return true;
    }

    private function getAnalog($cosmetic){
        $analogs = [];
        $sub_analogs = [];
        if($cosmetic->dependency->classification == null){
            return ['title' => '', 'data' => $sub_analogs];
        }
        foreach ($cosmetic->dependency->classification->cosmetics as $cosmetic_dep){
            if($cosmetic_dep->cosmetic != null && $cosmetic->id != $cosmetic_dep->cosmetic->id){
                array_push($sub_analogs, $cosmetic_dep->cosmetic);
            }
        }
        array_push($analogs, ['title' => '', 'data' => $sub_analogs]);
        return $analogs;
    }

    private function getFabricatorProducts($cosmetic){
        $products = [];
        foreach ($cosmetic->dependency->fabricator->medicinesCosmetic as $product){
            if($cosmetic->id != $product->id){
                array_push($products, $product);
            }
        }
        return $products;
    }
}
