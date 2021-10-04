<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\Other;

use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class AdvertisingController extends BasicController
{

    public function getAdvertisingRu(){
        $this->lang = 'ru';
        $this->title = 'Рекламные Возможности | Мед. Издание Medpravda';
        $this->description = 'Рекламные Возможности. Контакты Веб-сайта medpravda.ua';
        $this->breadcrumbs = [['title' => 'Рекламные Возможности', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.advertising.desktop.ru')->render();
        return $this->renderBasic();
    }

    public function getAdvertisingRuMobile(){
        $this->lang = 'ru';
        $this->is_mobile = true;
        $this->title = 'Рекламные Возможности | Мед. Издание Medpravda';
        $this->description = 'Рекламные Возможности. Контакты Веб-сайта medpravda.ua';
        $this->breadcrumbs = [['title' => 'Рекламные Возможности', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.advertising.mobile.ru')->render();
        return $this->renderBasic();
    }

    public function getAdvertisingUa(){
        $this->lang = 'ua';
        $this->title = 'Рекламні Можливості | Мед. Видання Medpravda';
        $this->description = 'Рекламні Можливості. Контакти Веб-сайту medpravda.ua.';
        $this->breadcrumbs = [['title' => 'Рекламні Можливості', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.advertising.desktop.ua')->render();
        return $this->renderBasic();
    }

    public function getAdvertisingUaMobile(){
        $this->lang = 'ua';
        $this->is_mobile = true;
        $this->title = 'Рекламні Можливості | Мед. Видання Medpravda';
        $this->description = 'Рекламні Можливості. Контакти Веб-сайту medpravda.ua.';
        $this->breadcrumbs = [['title' => 'Рекламні Можливості', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.advertising.mobile.ua')->render();
        return $this->renderBasic();
    }
}
