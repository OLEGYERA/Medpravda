<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\Other;

use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class AboutController extends BasicController
{

    public function getAboutRu(){
        $this->lang = 'ru';
        $this->title = 'О нас | Мед. Издание Medpravda';
        $this->description = 'О нас. Контакты Веб-сайта medpravda.ua';
        $this->breadcrumbs = [['title' => 'О нас', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.about.desktop.ru')->render();
        return $this->renderBasic();
    }

    public function getAboutRuMobile(){
        $this->lang = 'ru';
        $this->is_mobile = true;
        $this->title = 'О нас | Мед. Издание Medpravda';
        $this->description = 'О нас. Контакты Веб-сайта medpravda.ua';
        $this->breadcrumbs = [['title' => 'О нас', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.about.mobile.ru')->render();
        return $this->renderBasic();
    }

    public function getAboutUa(){
        $this->lang = 'ua';
        $this->title = 'Про нас | Мед. Видання Medpravda';
        $this->description = 'Про нас. Контакти Веб-сайту medpravda.ua.';
        $this->breadcrumbs = [['title' => 'Про нас', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.about.desktop.ua')->render();
        return $this->renderBasic();
    }

    public function getAboutUaMobile(){
        $this->lang = 'ua';
        $this->is_mobile = true;
        $this->title = 'Про нас | Мед. Видання Medpravda';
        $this->description = 'Про нас. Контакти Веб-сайту medpravda.ua.';
        $this->breadcrumbs = [['title' => 'Про нас', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.about.mobile.ua')->render();
        return $this->renderBasic();
    }
}
