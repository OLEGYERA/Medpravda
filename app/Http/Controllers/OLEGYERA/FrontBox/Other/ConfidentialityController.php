<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\Other;

use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class ConfidentialityController extends BasicController
{

    public function getConfidentialityRu(){
        $this->lang = 'ru';
        $this->title = 'Соглашение конфиденциальности | Мед. Издание Medpravda';
        $this->description = 'Соглашение конфиденциальности. Условия использования Веб-сайта www.medpravda.ua';
        $this->breadcrumbs = [['title' => 'Соглашение конфиденциальности', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.confidentiality.desktop.ru')->render();
        return $this->renderBasic();
    }

    public function getConfidentialityRuMobile(){
        $this->lang = 'ru';
        $this->is_mobile = true;
        $this->title = 'Соглашение конфиденциальности | Мед. Издание Medpravda';
        $this->description = 'Соглашение конфиденциальности. Условия использования Веб-сайта www.medpravda.ua';
        $this->breadcrumbs = [['title' => 'Соглашение конфиденциальности', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.confidentiality.mobile.ru')->render();
        return $this->renderBasic();
    }

    public function getConfidentialityUa(){
        $this->lang = 'ua';
        $this->title = 'Угода конфіденційності | Мед. Видання Medpravda';
        $this->description = 'Угода конфіденційності. Умови використання Веб-сайту www.medpravda.ua.';
        $this->breadcrumbs = [['title' => 'Угода конфіденційності', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.confidentiality.desktop.ua')->render();
        return $this->renderBasic();
    }

    public function getConfidentialityUaMobile(){
        $this->lang = 'ua';
        $this->is_mobile = true;
        $this->title = 'Угода конфіденційності | Мед. Видання Medpravda';
        $this->description = 'Угода конфіденційності. Умови використання Веб-сайту www.medpravda.ua.';
        $this->breadcrumbs = [['title' => 'Угода конфіденційності', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.confidentiality.mobile.ua')->render();
        return $this->renderBasic();
    }
}
