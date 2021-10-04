<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\Other;

use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class CooperationController extends BasicController
{

    public function getCooperationRu(){
        $this->lang = 'ru';
        $this->title = 'Сотрудничество | Мед. Издание Medpravda';
        $this->description = 'Сотрудничество. Контакты Веб-сайта medpravda.ua';
        $this->breadcrumbs = [['title' => 'Сотрудничество', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.cooperation.desktop.ru')->render();
        return $this->renderBasic();
    }

    public function getCooperationRuMobile(){
        $this->lang = 'ru';
        $this->is_mobile = true;
        $this->title = 'Сотрудничество | Мед. Издание Medpravda';
        $this->description = 'Сотрудничество. Контакты Веб-сайта medpravda.ua';
        $this->breadcrumbs = [['title' => 'Сотрудничество', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.cooperation.mobile.ru')->render();
        return $this->renderBasic();
    }

    public function getCooperationUa(){
        $this->lang = 'ua';
        $this->title = 'Співробітництво | Мед. Видання Medpravda';
        $this->description = 'Співробітництво. Контакти Веб-сайту medpravda.ua.';
        $this->breadcrumbs = [['title' => 'Співробітництво', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.cooperation.desktop.ua')->render();
        return $this->renderBasic();
    }

    public function getCooperationUaMobile(){
        $this->lang = 'ua';
        $this->is_mobile = true;
        $this->title = 'Співробітництво | Мед. Видання Medpravda';
        $this->description = 'Співробітництво. Контакти Веб-сайту medpravda.ua.';
        $this->breadcrumbs = [['title' => 'Співробітництво', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.cooperation.mobile.ua')->render();
        return $this->renderBasic();
    }
}
