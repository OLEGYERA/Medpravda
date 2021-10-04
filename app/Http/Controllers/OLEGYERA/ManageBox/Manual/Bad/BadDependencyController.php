<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Manual\Bad;
use Fresh\Medpravda\DepTag;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Fresh\Medpravda\BadDepTags;
use Fresh\Medpravda\BadNew;
use Fresh\Medpravda\DepBadPharma;
use Fresh\Medpravda\ClassBad;
use Fresh\Medpravda\DepFabricatorLocation;
use Fresh\Medpravda\DepFabricator;
use Illuminate\Http\Request;

class BadDependencyController extends ApiController
{

    public function __construct(BadDepTags $bad_dep_tag)
    {
        $this->bad_dep_tag = $bad_dep_tag;

    }

    protected function getBadDependency(Request $request, $alias){
        $bad = BadNew::where('alias', $alias)->first();
        if(!empty($bad)){
            $bad_pharma = $bad->dependency->pharma;
            $tags = $this->getTags($bad->dependency->tags);
            $bad_fabricator = $bad->dependency->fabricator;
            $bad_fabricator_location = $bad->dependency->fabricator_location;
            $bad_classification = $bad->dependency->classification;

            return response()->json([
                'bad_pharma' => $bad_pharma,
                'bad_tags' => $tags['bad_tags'],
                'bad_tag_ids' => $tags['bad_tag_ids'],
                'bad_fabricator' => $bad_fabricator,
                'bad_fabricator_location' => $bad_fabricator_location,
                'bad_classification' => $bad_classification,
                'bad_dep_have' => [
                    'pharms' => (DepBadPharma::count() != 0),
                    'tags' => (DepTag::count() != 0),
                    'fabricators' => (DepFabricator::count() != 0),
                    'fabricator_locations' => ((!empty($bad_fabricator)) ? ($bad_fabricator->locations->count() != 0) : false),
                    'bad_classification' => (ClassBad::count() != 0),
                ],

            ]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateBadTags(Request $request, $alias){
        $bad = BadNew::where('alias', $alias)->first();
        $bad_bad_dep_tags = $bad->dependency->tags; //получаем массив взаимосвязей ид_зависимости_препарата и ид_действ.вещества
        if(!empty($request->data)){ //проверка на наличие изменений
            foreach ($request->data as $id){
                $bad_bad_dep_tags = $bad_bad_dep_tags->where('tag_id', '!=', $id);
            }
            if(!empty($bad_bad_dep_tags)){
                foreach ($bad_bad_dep_tags as $bad_bad_dep_tag){
                    $bad_bad_dep_tag->delete();
                }
            }
            foreach ($request->data as $id){
                $bad_bad_dep_tags = $bad->dependency->tags;
                if(count($bad_bad_dep_tags->where('tag_id', $id)) == 0){
                    $this->bad_dep_tag->create(['bad_dep_id' => $bad->dependency->id, 'tag_id' => $id]);
                }
            }
        }else{ //при отсутсвии элементов, система очищает все взаимосвязи, так-как ни один элемент не выбран
            foreach ($bad_bad_dep_tags as $bad_bad_dep_tag){
                $bad_bad_dep_tag->delete();
            }
        }
        $tags = $this->getTags(BadDepTags::where('bad_dep_id', $bad->dependency->id)->get()); //ручное получение данных. Так-как реляция возвращает старые данные!
        return response()->json([
            'bad_tags' => $tags['bad_tags'],
            'bad_tag_ids' => $tags['bad_tag_ids']
        ]);
    }




    protected function updateBadPharma(Request $request, $alias){
        $bad_pharma = BadNew::where('alias', $alias)->first()->dependency->update(['pharma_id' => $request->data['id']]);
        return response()->json($bad_pharma);
    }

    protected function updateBadClassification(Request $request, $alias){
        $bad_form = BadNew::where('alias', $alias)->first()->dependency->update(['class_id' => $request->data['id']]);
        return response()->json($bad_form);
    }

    protected function updateBadFabricator(Request $request, $alias){
        $bad = BadNew::where('alias', $alias)->first();
        $bad->dependency->update(['fabricator_id' => $request->data['id']]);
        $bad->dependency->update(['fabricator_location_id' => null]);
        $bad_fabricator_location = $bad->dependency->fabricator_location;
        return response()->json([
            'bad_dep_have_fabricator_locations' => ($bad->dependency->fabricator->locations->count() != 0),
        ]);
    }

    protected function updateBadFabricatorLocation(Request $request, $alias){
        $bad_form = BadNew::where('alias', $alias)->first()->dependency->update(['fabricator_location_id' => $request->data['id']]);
        return response()->json($bad_form);
    }

    private function getTags($bad_bad_dep_tag_ids){
        $bad_tags = [];
        $bad_tag_ids = [];
        if(!empty($bad_bad_dep_tag_ids)){
            foreach ($bad_bad_dep_tag_ids as $bad_bad_dep_tag_id){
                array_push($bad_tags, $bad_bad_dep_tag_id->tag);
                array_push($bad_tag_ids, $bad_bad_dep_tag_id->tag_id);
            }
        }
        return(['bad_tags' => $bad_tags, 'bad_tag_ids' => $bad_tag_ids]);
    }
}
