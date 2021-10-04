<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox;
use Auth;
use Illuminate\Support\Arr;

use Fresh\Medpravda\ClassWare;
use Fresh\Medpravda\WareNew;
use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class WareController extends BasicController
{
    protected $classificationArray = [];
    public function getWareRu($alias){
        $ware = WareNew::where('alias', $alias)->first();
        if(empty($ware)){
            abort(404);
        }
        $this->cretateLangProps('ru', $ware->title);
        $this->targeting_url = $ware->alias;
        $this->branding_url = $ware->alias;
        $this->getClassificationArray($ware->dependency->classification);
        $this->breadcrumbs = [['title' => 'ИМН', 'alias' => route('ru.catalog.ware.alphabet')], ['title' => 'Инструкция', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Ware.pages.desktop.ru')->with([
            'ware' => $ware,
            'last_mod' => $this->getLastMod($ware),
            'analogs' => ['data' => $this->getAnalog($ware), 'type' => 'ware'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($ware), 'type' => 'ware'],
            'classification' => array_reverse($this->classificationArray)
        ])->render();
        return $this->renderBasic();
    }

    public function getWareRuMobile($alias){

        $ware = WareNew::where('alias', $alias)->first();
        if(empty($ware)){
            abort(404);
        }

        $this->cretateLangProps('ru', $ware->title);
        $this->targeting_url = $ware->alias;
        $this->is_mobile = true;
        $this->getClassificationArray($ware->dependency->classification);
        $this->breadcrumbs = [['title' => 'Изделия медицинского назначения', 'alias' => route('m.ru.catalog.ware.alphabet')], ['title' => 'Инструкция', 'alias' => null]];


        $this->content = view('OLEGYERA.FrontBox.Ware.pages.mobile.ru')->with([
            'ware' => $ware,
            'last_mod' => $this->getLastMod($ware),
            'analogs' => ['data' => $this->getAnalog($ware), 'type' => 'ware'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($ware), 'type' => 'ware'],
            'classification' => array_reverse($this->classificationArray)
        ])->render();
        return $this->renderBasic();
    }

    public function getWareUa($alias){
        $ware = WareNew::where('alias', $alias)->first();
        if(empty($ware)){
            abort(404);
        }

        $this->cretateLangProps('ua', $ware->utitle);
        $this->targeting_url = $ware->alias;
        $this->branding_url = $ware->alias;
        $this->getClassificationArray($ware->dependency->classification);
        $this->breadcrumbs = [['title' => 'Вироби медичного призначення', 'alias' => route('ua.catalog.ware.alphabet')], ['title' => 'Інструкція', 'alias' => null]];


        $this->content = view('OLEGYERA.FrontBox.Ware.pages.desktop.ua')->with([
            'ware' => $ware,
            'last_mod' => $this->getLastMod($ware),
            'analogs' => ['data' => $this->getAnalog($ware), 'type' => 'ware'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($ware), 'type' => 'ware'],
            'classification' => array_reverse($this->classificationArray)
        ])->render();
        return $this->renderBasic();
    }

    public function getWareUaMobile($alias){
        $ware = WareNew::where('alias', $alias)->first();
        if(empty($ware)){
            abort(404);
        }
        $this->cretateLangProps('ua', $ware->utitle);
        $this->targeting_url = $ware->alias;
        $this->is_mobile = true;
        $this->getClassificationArray($ware->dependency->classification);
        $this->breadcrumbs = [['title' => 'ВМП', 'alias' => route('m.ua.catalog.ware.alphabet')], ['title' => 'Інструкція', 'alias' => null]];


        $this->content = view('OLEGYERA.FrontBox.Ware.pages.mobile.ua')->with([
            'ware' => $ware,
            'last_mod' => $this->getLastMod($ware),
            'analogs' => ['data' => $this->getAnalog($ware), 'type' => 'ware'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($ware), 'type' => 'ware'],
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
                $this->description = mb_strtoupper($title) . ' - повна інформація про медичний виріб від виробника з адаптованої, спрощеної інструкцією, списком хвороб, складом, показаннями, протипоказання, побічні дії, передозуванням, аналогами, відгуками.';
                break;
            case 'ru':
                setlocale(LC_TIME, 'ru_RU.UTF-8');
                $this->title = mb_strtoupper($title) . ' - инструкция, состав, применение, дозировка, показания, противопоказания, отзывы | Мед. Издание Medpravda';
                $this->description = mb_strtoupper($title) . ' - полная информация о медицинском изделии от производителя с адаптированной, упрощенной инструкцией, списком болезней, составом, показаниями, противопоказания, побочными действиями, передозировкой, аналогами, отзывами.';
                break;
            default:
                abort(404);
        }
    }

    private function getClassificationArray($classification){
        if($classification != null) {
            array_push($this->classificationArray, $classification);
            if ($classification->parent_id != null) {
                return $this->getClassificationArray(ClassWare::find($classification->parent_id));
            }
        }
        return true;
    }

    private function getAnalog($ware){
        $analogs = [];
        $sub_analogs = [];
        if($ware->dependency->classification == null){
            return ['title' => '', 'data' => $sub_analogs];
        }
        foreach ($ware->dependency->classification->wares as $ware_dep){
            if($ware_dep->ware != null && $ware->id != $ware_dep->ware->id){
                array_push($sub_analogs, $ware_dep->ware);
            }
        }
        array_push($analogs, ['title' => '', 'data' => $sub_analogs]);
        return $analogs;
    }

    private function getFabricatorProducts($ware){
        $products = [];
        foreach ($ware->dependency->fabricator->medicinesWare as $product){
            if($ware->id != $product->id){
                array_push($products, $product);
            }
        }
        return $products;
    }
}
