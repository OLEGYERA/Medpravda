<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\Other;

use Fresh\Medpravda\User;
use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class EditorController extends BasicController
{

    public function getEditorsRu(){
        $only_editor_arr = [];
        foreach(User::all() as $item){
            if(!empty($item->editor)){

                if($item->editor->active == 1){
                    array_push($only_editor_arr, $item);
                }
            }
        }
        $this->lang = 'ru';
        $this->title = 'Редакторская группа | Мед. Издание Medpravda';
        $this->description = 'Полная информация о редакторской группе.';
        $this->breadcrumbs = [['title' => 'Редакторская Группа', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Other.editors.desktop.ru')->with([
            'users' => $only_editor_arr,
        ])->render();
        return $this->renderBasic();
    }

    public function getEditorsRuMobile(){
        $only_editor_arr = [];
        foreach(User::all() as $item){
            if(!empty($item->editor)){

                if($item->editor->active == 1){
                    array_push($only_editor_arr, $item);
                }
            }
        }
        $this->lang = 'ru';
        $this->is_mobile = true;
        $this->title = 'Редакторская группа | Мед. Издание Medpravda';
        $this->description = 'Полная информация о редакторской группе.';
        $this->breadcrumbs = [['title' => 'Редакторская Группа', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Other.editors.mobile.ru')->with([
            'users' => $only_editor_arr,
        ])->render();
        return $this->renderBasic();
    }

    public function getEditorsUa(){
        $only_editor_arr = [];
        foreach(User::all() as $item){
            if(!empty($item->editor)){

                if($item->editor->active == 1){
                    array_push($only_editor_arr, $item);
                }
            }
        }
        $this->lang = 'ua';
        $this->title = 'Редакторська Група | Мед. Видання Medpravda';
        $this->description = 'Повна інформація про редакторську групу.';
        $this->breadcrumbs = [['title' => 'Редакторська Група', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Other.editors.desktop.ua')->with([
            'users' => $only_editor_arr,
        ])->render();
        return $this->renderBasic();
    }

    public function getEditorsUaMobile(){
        $only_editor_arr = [];
        foreach(User::all() as $item){
            if(!empty($item->editor)){

                if($item->editor->active == 1){
                    array_push($only_editor_arr, $item);
                }
            }
        }
        $this->lang = 'ua';
        $this->is_mobile = true;
        $this->title = 'Редакторська Група | Мед. Видання Medpravda';
        $this->description = 'Повна інформація про редакторську групу.';
        $this->breadcrumbs = [['title' => 'Редакторська Група', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Other.editors.mobile.ua')->with([
            'users' => $only_editor_arr,
        ])->render();
        return $this->renderBasic();
    }
}
