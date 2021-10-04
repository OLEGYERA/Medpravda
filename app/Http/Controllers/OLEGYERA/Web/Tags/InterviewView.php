<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\Web\Tags;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\Web\Launch;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Fresh\Medpravda\MediaArticleDep;
use Fresh\Medpravda\MediaArticle;
use Fresh\Medpravda\MediaCategory;

use Fresh\Medpravda\Repositories\CatalogRepository;

class InterviewView extends Launch
{
    protected $lang;

    public function ru(){
        $this->lang = 'ru';
        $this->title =  'Интервью — Медправда';

        $this->Page = view('OLEGYERA.Web.pages.tags.interview.ru')->with([
            'media_items' => MediaArticleDep::where('category_id', 3)->orderBy('created_at', 'desc')->paginate(24),
            'side_articles' => MediaArticleDep::where('category_id', 1)->orderBy('created_at', 'desc')->take(6)->get()
        ])->render();
        return $this->Render();
    }


    public function ua(){
        $this->lang = 'ua';
        $this->title =  'Новини України та світу в галузі медицини сьогодні 2021, карантин, коронавірус, обмеження — Медправа';

        $this->Page = view('OLEGYERA.Web.pages.tags.interview.ua')->with([
            'media_items' => MediaArticleDep::where('category_id', 3)->orderBy('created_at', 'desc')->paginate(24),
            'side_articles' => MediaArticleDep::where('category_id', 1)->orderBy('created_at', 'desc')->take(6)->get()
        ])->render();
        return $this->Render();
    }

}
