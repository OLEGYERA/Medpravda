<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox;
use Auth;
use Illuminate\Support\Arr;

use Fresh\Medpravda\DepTerm;
use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class TermController extends BasicController
{

    public function getTermRu($alias){
        $term = DepTerm::where('alias', $alias)->first();
        if(empty($term)){
            abort(404);
        }
        $this->cretateLangProps('ru', $term->title);
        $this->targeting_url = $term->alias;
        $this->branding_url = $term->alias;
        $this->breadcrumbs = [['title' => 'Термины', 'alias' => route('ru.catalog.term.alphabet')], ['title' => $term->title, 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Terms.ru')->with([
            'term' => $term,
            'last_mod' => $term->updated_at,
        ])->render();
        return $this->renderBasic();
    }


    public function getTermUa($alias){
        $term = DepTerm::where('alias', $alias)->first();
        if(empty($term)){
            abort(404);
        }

        $this->cretateLangProps('ua', $term->utitle);
        $this->targeting_url = $term->alias;
        $this->branding_url = $term->alias;
        $this->breadcrumbs = [['title' => 'Терміни', 'alias' => route('ua.catalog.term.alphabet')], ['title' => $term->utitle, 'alias' => null]];


        $this->content = view('OLEGYERA.FrontBox.Terms.ua')->with([
            'term' => $term,
            'last_mod' => $term->updated_at,
        ])->render();
        return $this->renderBasic();
    }




    private function cretateLangProps($lang, $title){
        $this->lang = $lang;

        switch ($lang){
            case 'ua':
                setlocale(LC_TIME, 'ua_UA.KOI8-U');
                $this->title = mb_strtoupper($title) . ' - терминология | Мед. видання Medpravda';
                $this->description = mb_strtoupper($title) . ' - терминология';
                break;
            case 'ru':
                setlocale(LC_TIME, 'ru_RU.UTF-8');
                $this->title = mb_strtoupper($title) . ' - термінологія | Мед. Издание Medpravda';
                $this->description = mb_strtoupper($title) . ' - термінологія.';
                break;
            default:
                abort(404);
        }
    }

}
