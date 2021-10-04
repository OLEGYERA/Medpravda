<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox;
use Auth;
use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class NavigationController extends Controller
{

    protected $title;
    protected $js;

    public function getAdministrationManager(){
        $this->title = 'Администрирование Менеджерами';
        $this->js = "<script src='" . asset('js/ManageBox/administration.js') . "'></script>";
        return $this->renderManage();
    }

    public function getAdministrationRolling(){
        $this->title = 'Администрирование Роллированием';
        $this->js = "<script src='" . asset('js/ManageBox/administration.js') . "'></script>";
        return $this->renderManage();
    }

    public function getDependencySubstance(){
        $this->title = 'Действующее Вещество';
        $this->js = "<script src='" . asset('js/ManageBox/dependency.js') . "'></script>";
        return $this->renderManage();
    }

    public function getDependencyInname(){
        $this->title = 'Международное Название';
        $this->js = "<script src='" . asset('js/ManageBox/dependency.js') . "'></script>";
        return $this->renderManage();
    }

    public function getDependencyPharma(){
        $this->title = 'Фармакотерапевтическая группа';
        $this->js = "<script src='" . asset('js/ManageBox/dependency.js') . "'></script>";
        return $this->renderManage();
    }

    public function getDependencyPharmaBad(){
        $this->title = 'Группа Бадов';
        $this->js = "<script src='" . asset('js/ManageBox/dependency.js') . "'></script>";
        return $this->renderManage();
    }

    public function getDependencyForm(){
        $this->title = 'Лекарственная Форма';
        $this->js = "<script src='" . asset('js/ManageBox/dependency.js') . "'></script>";
        return $this->renderManage();
    }

    public function getDependencyFabricator(){
        $this->title = 'Производители';
        $this->js = "<script src='" . asset('js/ManageBox/dependency.js') . "'></script>";
        return $this->renderManage();
    }

    public function getDependencyATX(){
        $this->title = 'ATX';
        $this->js = "<script src='" . asset('js/ManageBox/dependency.js') . "'></script>";
        return $this->renderManage();
    }

    public function getDependencyClassBad(){
        $this->title = 'Классификация Бадов';
        $this->js = "<script src='" . asset('js/ManageBox/dependency.js') . "'></script>";
        return $this->renderManage();
    }

    public function getDependencyClassWare(){
        $this->title = 'Классификация Мед. Изделий';
        $this->js = "<script src='" . asset('js/ManageBox/dependency.js') . "'></script>";
        return $this->renderManage();
    }

    public function getDependencyClassCosmetic(){
        $this->title = 'Классификация Косм. Средств';
        $this->js = "<script src='" . asset('js/ManageBox/dependency.js') . "'></script>";
        return $this->renderManage();
    }

    public function getDependencyTerm(){
        $this->title = 'Термины';
        $this->js = "<script src='" . asset('js/ManageBox/dependency.js') . "'></script>";
        return $this->renderManage();
    }

    public function getDependencyTag(){
        $this->title = 'Теги';
        $this->js = "<script src='" . asset('js/ManageBox/dependency.js') . "'></script>";
        return $this->renderManage();
    }

    public function getManualDrug(){
        $this->title = 'Препараты';
        $this->js = "<script src='" . asset('js/ManageBox/manual.js') . "'></script>";
        return $this->renderManage();
    }

    public function getManualBad(){
        $this->title = 'Диетические добавки';
        $this->js = "<script src='" . asset('js/ManageBox/manual.js') . "'></script>";
        return $this->renderManage();
    }

    public function getManualWare(){
        $this->title = 'Изделия медицинского назначения';
        $this->js = "<script src='" . asset('js/ManageBox/manual.js') . "'></script>";
        return $this->renderManage();
    }

    public function getManualCosmetic(){
        $this->title = 'Косметические средства';
        $this->js = "<script src='" . asset('js/ManageBox/manual.js') . "'></script>";
        return $this->renderManage();
    }

    public function getMediaCategory(){
        $this->title = 'Категории';
        $this->js = "<script src='" . asset('js/ManageBox/media.js') . "'></script>";
        return $this->renderManage();
    }

    public function getMediaStructure(){
        $this->title = 'Структура';
        $this->js = "<script src='" . asset('js/ManageBox/media.js') . "'></script>";
        return $this->renderManage();
    }

    public function getManualMedia(){
        $this->title = 'Статьи';
        $this->js = "<script src='" . asset('js/ManageBox/media.js') . "'></script>";
        return $this->renderManage();
    }


    protected function renderManage(){
        $dependencies = [];
        if($this->title){
            $dependencies = Arr::add($dependencies, 'title', $this->title);
        }
        if($this->js){
            $dependencies = Arr::add($dependencies, 'js', $this->js);
        }
        $dependencies = Arr::add($dependencies, 'manager', Auth::user());
        return view('OLEGYERA.ManageBox.template')->with($dependencies);

    }
}
