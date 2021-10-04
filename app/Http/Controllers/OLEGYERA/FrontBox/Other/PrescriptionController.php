<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\Other;

use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class PrescriptionController extends BasicController
{

    public function getPrescriptionRu(){
        $this->lang = 'ru';
        $this->title = 'Соглашение о рецептурных препаратах | Мед. Издание Medpravda';
        $this->description = 'Соглашение с пользователем о получении информации о рецептурных препараты.';
        $this->breadcrumbs = [['title' => 'Соглашение о рецептурных препаратах', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.prescription.desktop.ru')->render();
        return $this->renderBasic();
    }

    public function getPrescriptionRuMobile(){
        $this->lang = 'ru';
        $this->is_mobile = true;
        $this->title = 'Соглашение о рецептурных препаратах | Мед. Издание Medpravda';
        $this->description = 'Соглашение с пользователем о получении информации о рецептурных препараты.';
        $this->breadcrumbs = [['title' => 'Соглашение о рецептурных препаратах', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.prescription.mobile.ru')->render();
        return $this->renderBasic();
    }

    public function getPrescriptionUa(){
        $this->lang = 'ua';
        $this->title = 'Угода про рецептурні препарати | Мед. Видання Medpravda';
        $this->description = 'Угода з користувачем про отримання інформації про рецептурні препарати.';
        $this->breadcrumbs = [['title' => 'Угода про рецептурні препарати', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.prescription.desktop.ua')->render();
        return $this->renderBasic();
    }

    public function getPrescriptionUaMobile(){
        $this->lang = 'ua';
        $this->is_mobile = true;
        $this->title = 'Угода про рецептурні препарати | Мед. Видання Medpravda';
        $this->description = 'Угода з користувачем про отримання інформації про рецептурні препарати.';
        $this->breadcrumbs = [['title' => 'Угода про рецептурні препарати', 'alias' => null]];
        $this->content = view('OLEGYERA.FrontBox.Pages.Other.prescription.mobile.ua')->render();
        return $this->renderBasic();
    }
}
