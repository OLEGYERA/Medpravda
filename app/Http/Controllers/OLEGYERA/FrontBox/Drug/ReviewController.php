<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\Drug;

use Fresh\Medpravda\Drug;
use Fresh\Medpravda\Review;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;
use Illuminate\Http\Request;

class ReviewController extends BasicController
{

    protected function addReview(Request $request, $alias){
        $drug_id = Drug::where('alias', $alias)->first()->id;

        if(!empty(Review::where('drug_id', $drug_id)->where('gid', $request->user['$U'])->first())){
            return response()->json(false, 429);
        }

        (new Review())->create([
            'fn' => $request->user['FW'],
            'ln' => $request->user['EU'],
            'email' => $request->user['yu'],
            'gid' => $request->user['$U'],
            'avatar_path' => $request->user['eL'],
            'quality' => $request->rating['quality'],
            'packaging' => $request->rating['packaging'],
            'effect' => $request->rating['effect'],
            'safety' => $request->rating['safety'],
            'availability' => $request->rating['availability'],
            'worth'=> $request->text['worth'],
            'limitations'=> $request->text['limitations'],
            'review'=> $request->text['review'],
            'drug_id' => Drug::where('alias', $alias)->first()->id,
        ]);

        return response()->json(true, 200);
    }




    public function getDrugReviewRu($alias){
        $drug = Drug::where('alias', $alias)->first();
        if(empty($drug)){
            abort(404);
        }
        else if($drug->show !== 1){
            return response(410 . ' Gone', 410);
        }
        else if(count($drug->reviews) == 0){
            abort(404);
        }

        $this->cretateLangProps('ru', $drug->title);
        $this->targeting_url = $drug->alias;
        $this->branding_url = $drug->alias;
        $this->breadcrumbs = [['title' => 'Лекарственные средства', 'alias' => route('ru.catalog.drug.alphabet')], ['title' => 'Инструкция', 'alias' => route('ru.drug', ['alias' => $alias])], ['title' => 'Отзыв', 'alias' => '']];
        $this->content = view('OLEGYERA.FrontBox.Review.pages.desktop.ru')->with([
            'drug' => $drug,
            'reviews' => Review::where('drug_id', $drug->id)->orderBy('created_at', 'desc')->get(),
            'analogs' => ['data' => $this->getAnalog($drug), 'type' => 'drug'],
            'last_mod' => $this->getLastMod($drug),
            'fabricator_products' => ['data' => $this->getFabricatorProducts($drug), 'type' => 'drug'],
        ])->render();
        return $this->renderBasic();
    }

    public function getDrugReviewRuMobile($alias){
        $drug = Drug::where('alias', $alias)->first();
        if(empty($drug)){
            abort(404);
        }
        else if($drug->show !== 1){
            return response(410 . ' Gone', 410);
        }
        else if(count($drug->reviews) == 0){
            abort(404);
        }

        $this->cretateLangProps('ru', $drug->title);
        $this->targeting_url = $drug->alias;
        $this->is_mobile = true;
        $this->breadcrumbs = [['title' => 'ЛС', 'alias' => route('m.ru.catalog.drug.alphabet')], ['title' => 'Инструкция', 'alias' => route('m.ru.drug', ['alias' => $alias])], ['title' => 'Отзыв', 'alias' => '']];
        $this->content = view('OLEGYERA.FrontBox.Review.pages.mobile.ru')->with([
            'drug' => $drug,
            'reviews' => Review::where('drug_id', $drug->id)->orderBy('created_at', 'desc')->get(),
            'analogs' => ['data' => $this->getAnalog($drug), 'type' => 'drug'],
            'last_mod' => $this->getLastMod($drug),
            'fabricator_products' => ['data' => $this->getFabricatorProducts($drug), 'type' => 'drug'],
        ])->render();
        return $this->renderBasic();
    }

    public function getDrugReviewUa($alias){
        $drug = Drug::where('alias', $alias)->first();
        if(empty($drug)){
            abort(404);
        }
        else if($drug->show !== 1){
            return response(410 . ' Gone', 410);
        }
        else if(count($drug->reviews) == 0){
            abort(404);
        }

        $this->cretateLangProps('ru', $drug->title);
        $this->targeting_url = $drug->alias;
        $this->branding_url = $drug->alias;
        $this->breadcrumbs = [['title' => 'Лікарські засоби', 'alias' => route('ua.catalog.drug.alphabet')], ['title' => 'Інструкція', route('ua.drug', ['alias' => $alias])], ['title' => 'Відгук', 'alias' => '']];
        $this->content = view('OLEGYERA.FrontBox.Review.pages.desktop.ua')->with([
            'drug' => $drug,
            'reviews' => Review::where('drug_id', $drug->id)->orderBy('created_at', 'desc')->get(),
            'analogs' => ['data' => $this->getAnalog($drug), 'type' => 'drug'],
            'last_mod' => $this->getLastMod($drug),
            'fabricator_products' => ['data' => $this->getFabricatorProducts($drug), 'type' => 'drug'],
        ])->render();
        return $this->renderBasic();
    }

    public function getDrugReviewUaMobile($alias){
        $drug = Drug::where('alias', $alias)->first();
        if(empty($drug)){
            abort(404);
        }
        else if($drug->show !== 1){
            return response(410 . ' Gone', 410);
        }
        else if(count($drug->reviews) == 0){
            abort(404);
        }

        $this->cretateLangProps('ru', $drug->title);
        $this->targeting_url = $drug->alias;
        $this->is_mobile = true;
        $this->breadcrumbs = [['title' => 'ЛЗ', 'alias' => route('m.ua.catalog.drug.alphabet')], ['title' => 'Інструкція', 'alias' => route('m.ua.drug', ['alias' => $alias])], ['title' => 'Відгук', 'alias' => '']];
        $this->content = view('OLEGYERA.FrontBox.Review.pages.mobile.ua')->with([
            'drug' => $drug,
            'reviews' => Review::where('drug_id', $drug->id)->orderBy('created_at', 'desc')->get(),
            'analogs' => ['data' => $this->getAnalog($drug), 'type' => 'drug'],
            'last_mod' => $this->getLastMod($drug),
            'fabricator_products' => ['data' => $this->getFabricatorProducts($drug), 'type' => 'drug'],
        ])->render();
        return $this->renderBasic();
    }


    private function cretateLangProps($lang, $title){
        $this->lang = $lang;

        switch ($lang){
            case 'ua':
                setlocale(LC_TIME, 'ua_UA.KOI8-U');
                $this->title = mb_strtoupper($title) . ' - відгуки | Мед. видання Medpravda';
                $this->description = mb_strtoupper($title) . ' - повна інформація про препарат з відгуками.';
                break;
            case 'ru':
                setlocale(LC_TIME, 'ru_RU.UTF-8');
                $this->title = mb_strtoupper($title) . ' - отзывы | Мед. Издание Medpravda';
                $this->description = mb_strtoupper($title) . ' - полная информация о препарате с отзывами.';
                break;
            default:
                abort(404);
        }
    }

    private function getAnalog($drug){
        $analogs = [];
        $substances = $this->clearSubstance($drug);
        if($substances !== false){
            foreach ($substances as $substance){
                $sub_analogs = [];
                foreach ($substance->drug_deps as $drug_dep){
                    if($drug_dep->drug_dependency != null && $drug->id != $drug_dep->drug_dependency->drug->id && $drug_dep->drug_dependency->drug->show == 1){
                        array_push($sub_analogs, $drug_dep->drug_dependency->drug);
                    }
                }
                array_push($analogs, ['title' => $substance, 'data' => $sub_analogs]);
            }
        }

        return $analogs;
    }

    private function clearSubstance($drug){
        $clear_id_arr = [];
        $clear_substance_arr = [];
        foreach ($drug->dependency->substancesThrough as $substance){
            if(array_search($substance->id, $clear_id_arr) === false){
                array_push($clear_id_arr, $substance->id);
                array_push($clear_substance_arr, $substance);
            }
        }
        return count($clear_substance_arr) == 0 ? false : $clear_substance_arr;
    }

    private function getFabricatorProducts($drug){
        $products = [];
        foreach ($drug->dependency->fabricator->drugs as $product){
            if($drug->id != $product->drug->id && $product->drug->show == 1){
                array_push($products, $product->drug);
            }
        }
        return $products;
    }
}
