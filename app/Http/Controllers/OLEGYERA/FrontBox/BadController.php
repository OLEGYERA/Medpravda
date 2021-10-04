<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox;
use Auth;
use Illuminate\Support\Arr;

use Fresh\Medpravda\ClassBad;
use Fresh\Medpravda\BadNew;
use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class BadController extends BasicController
{
    protected $classificationArray = [];
    public function getBadRu($alias){
        $bad = BadNew::where('alias', $alias)->first();
        if(empty($bad)){
            abort(404);
        }
        $this->cretateLangProps('ru', $bad->title);
        $this->targeting_url = $bad->alias;
        $this->branding_url = $bad->alias;
        $this->getClassificationArray($bad->dependency->classification);
        $this->breadcrumbs = [['title' => 'Диетические добавки', 'alias' => route('ru.catalog.bad.alphabet')], ['title' => 'Инструкция', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Bad.pages.desktop.ru')->with([
            'bad' => $bad,
            'last_mod' => $this->getLastMod($bad),
            'analogs' => ['data' => $this->getAnalog($bad), 'type' => 'bad'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($bad), 'type' => 'bad'],
            'classification' => array_reverse($this->classificationArray)
        ])->render();
        return $this->renderBasic();
    }

    public function getBadRuMobile($alias){

        $bad = BadNew::where('alias', $alias)->first();
        if(empty($bad)){
            abort(404);
        }

        $this->cretateLangProps('ru', $bad->title);
        $this->targeting_url = $bad->alias;
        $this->is_mobile = true;
        $this->getClassificationArray($bad->dependency->classification);
        $this->breadcrumbs = [['title' => 'ДД', 'alias' => route('m.ru.catalog.bad.alphabet')], ['title' => 'Инструкция', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Bad.pages.mobile.ru')->with([
            'bad' => $bad,
            'last_mod' => $this->getLastMod($bad),
            'analogs' => ['data' => $this->getAnalog($bad), 'type' => 'bad'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($bad), 'type' => 'bad'],
            'classification' => array_reverse($this->classificationArray)

        ])->render();
        return $this->renderBasic();
    }

    public function getBadUa($alias){
        $bad = BadNew::where('alias', $alias)->first();
        if(empty($bad)){
            abort(404);
        }

        $this->cretateLangProps('ua', $bad->utitle);
        $this->targeting_url = $bad->alias;
        $this->branding_url = $bad->alias;
        $this->getClassificationArray($bad->dependency->classification);
        $this->breadcrumbs = [['title' => 'Дієтичні добавки', 'alias' => route('ua.catalog.bad.alphabet')], ['title' => 'Інструкція', 'alias' => null]];


        $this->content = view('OLEGYERA.FrontBox.Bad.pages.desktop.ua')->with([
            'bad' => $bad,
            'last_mod' => $this->getLastMod($bad),
            'analogs' => ['data' => $this->getAnalog($bad), 'type' => 'bad'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($bad), 'type' => 'bad'],
            'classification' => array_reverse($this->classificationArray)
        ])->render();
        return $this->renderBasic();
    }

    public function getBadUaMobile($alias){
        $bad = BadNew::where('alias', $alias)->first();
        if(empty($bad)){
            abort(404);
        }
        $this->cretateLangProps('ua', $bad->utitle);
        $this->targeting_url = $bad->alias;
        $this->is_mobile = true;
        $this->getClassificationArray($bad->dependency->classification);
        $this->breadcrumbs = [['title' => 'ДД', 'alias' => route('m.ua.catalog.bad.alphabet')], ['title' => 'Інструкція', 'alias' => null]];


        $this->content = view('OLEGYERA.FrontBox.Bad.pages.mobile.ua')->with([
            'bad' => $bad,
            'last_mod' => $this->getLastMod($bad),
            'analogs' => ['data' => $this->getAnalog($bad), 'type' => 'bad'],
            'fabricator_products' => ['data' => $this->getFabricatorProducts($bad), 'type' => 'bad'],
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
                $this->description = mb_strtoupper($title) . ' - повна інформація про дієтичну добавку від виробника з адаптованої, спрощеної інструкцією, списком хвороб, складом, показаннями, протипоказання, побічні дії, передозуванням, аналогами, відгуками.';
                break;
            case 'ru':
                setlocale(LC_TIME, 'ru_RU.UTF-8');
                $this->title = mb_strtoupper($title) . ' - инструкция, состав, применение, дозировка, показания, противопоказания, отзывы | Мед. Издание Medpravda';
                $this->description = mb_strtoupper($title) . ' - полная информация о диетической добавке от производителя с адаптированной, упрощенной инструкцией, списком болезней, составом, показаниями, противопоказания, побочными действиями, передозировкой, аналогами, отзывами.';
                break;
            default:
                abort(404);
        }
    }

    private function getClassificationArray($classification){
        if($classification != null) {
            array_push($this->classificationArray, $classification);
            if ($classification->parent_id != null) {
                return $this->getClassificationArray(ClassBad::find($classification->parent_id));
            }
        }
        return true;
    }

    private function getAnalog($bad){
        $analogs = [];
        $sub_analogs = [];
        if($bad->dependency->classification == null){
            return ['title' => '', 'data' => $sub_analogs];
        }
        foreach ($bad->dependency->classification->bads as $bad_dep){
            if($bad_dep->bad != null && $bad->id != $bad_dep->bad->id){
                array_push($sub_analogs, $bad_dep->bad);
            }
        }
        array_push($analogs, ['title' => '', 'data' => $sub_analogs]);
        return $analogs;
    }

    private function getFabricatorProducts($bad){
        $products = [];
        foreach ($bad->dependency->fabricator->medicinesBad as $product){
            if($bad->id != $product->id){
                array_push($products, $product);
            }
        }
        return $products;
    }
}
