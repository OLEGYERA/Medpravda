<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\Other;

use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class TermsUseController extends BasicController
{

    public function getTermsUseRu(){
        $this->lang = 'ru';
        $this->title = 'Пользовательское соглашение | Мед. Издание Medpravda';
        $this->description = 'Пользовательское соглашение. Условия использования Веб-сайта www.medpravda.ua.';
        $this->breadcrumbs = [['title' => 'Пользовательское соглашение', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.terms_use.desktop.ru')->render();
        return $this->renderBasic();
    }

    public function getTermsUseRuMobile(){
        $this->lang = 'ru';
        $this->is_mobile = true;
        $this->title = 'Пользовательское соглашение | Мед. Издание Medpravda';
        $this->description = 'Пользовательское соглашение. Условия использования Веб-сайта www.medpravda.ua.';
        $this->breadcrumbs = [['title' => 'Пользовательское соглашение', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.terms_use.mobile.ru')->render();
        return $this->renderBasic();
    }

    public function getTermsUseUa(){
        $this->lang = 'ua';
        $this->title = 'Угода користувача | Мед. Видання Medpravda';
        $this->description = 'Угода користувача. Умови використання Веб-сайту www.medpravda.ua.';
        $this->breadcrumbs = [['title' => 'Угода користувача', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.terms_use.desktop.ua')->render();
        return $this->renderBasic();
    }

    public function getTermsUseUaMobile(){
        $this->lang = 'ua';
        $this->is_mobile = true;
        $this->title = 'Угода користувача | Мед. Видання Medpravda';
        $this->description = 'Угода користувача. Умови використання Веб-сайту www.medpravda.ua.';
        $this->breadcrumbs = [['title' => 'Угода користувача', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.terms_use.mobile.ua')->render();
        return $this->renderBasic();
    }
}
