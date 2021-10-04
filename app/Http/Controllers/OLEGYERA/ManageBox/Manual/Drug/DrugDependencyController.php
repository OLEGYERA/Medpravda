<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Manual\Drug;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Fresh\Medpravda\Drug;
use Fresh\Medpravda\DepForm;
use Fresh\Medpravda\DepSubstance;
use Fresh\Medpravda\DepPharma;
use Fresh\Medpravda\DepATX;
use Fresh\Medpravda\DepTag;
use Fresh\Medpravda\DepFabricatorLocation;
use Fresh\Medpravda\DrugDepSubstance;
use Fresh\Medpravda\DrugDepTag;

use Fresh\Medpravda\DepFabricator;
use Fresh\Medpravda\DepInname;
use Illuminate\Http\Request;

class DrugDependencyController extends ApiController
{

    public function __construct(DrugDepSubstance $drug_dep_substance, DrugDepTag $drug_dep_tag)
    {
        $this->drug_dep_substance = $drug_dep_substance;
        $this->drug_dep_tag = $drug_dep_tag;

    }

    protected function getDrugDependency(Request $request, $alias){
        $drug = Drug::where('alias', $alias)->first();
        if(!empty($drug)){
            $drug_form = $drug->dependency->form;
            $substances = $this->getSubstances($drug->dependency->substances);
            $tags = $this->getTags($drug->dependency->tags);
            $drug_pharma = $drug->dependency->pharma;
            $drug_fabricator = $drug->dependency->fabricator;
            $drug_fabricator_location = $drug->dependency->fabricator_location;
            $drug_atx = $drug->dependency->atx;
            $drug_inname = $drug->dependency->inname;
            return response()->json([
                'drug_form' => $drug_form,
                'drug_substances' => $substances['drug_substances'],
                'drug_substance_ids' => $substances['drug_substance_ids'],
                'drug_tags' => $tags['drug_tags'],
                'drug_tag_ids' => $tags['drug_tag_ids'],
                'drug_pharma' => $drug_pharma,
                'drug_fabricator' => $drug_fabricator,
                'drug_fabricator_location' => $drug_fabricator_location,
                'drug_atx' => $drug_atx,
                'drug_inname' => $drug_inname,

                'drug_dep_have' => [
                    'forms' => (DepForm::count() != 0),
                    'tags' => (DepTag::count() != 0),
                    'substances' => (DepSubstance::count() != 0),
                    'pharms' => (DepPharma::count() != 0),
                    'fabricators' => (DepFabricator::count() != 0),
                    'fabricator_locations' => ((!empty($drug_fabricator)) ? ($drug_fabricator->locations->count() != 0) : false),
                    'atxs' => (DepATX::count() != 0),
                    'innames' => (DepInname::count() != 0),
                ],

            ]);
        }
        else{
            return response()->json(false, 404);
        }
    }


    protected function updateDrugForm(Request $request, $alias){
        $drug_form = Drug::where('alias', $alias)->first()->dependency->update(['form_id' => $request->data['id']]);
        return response()->json($drug_form);
    }


    protected function updateDrugSubstances(Request $request, $alias){
        $drug = Drug::where('alias', $alias)->first();
        $drug_drug_dep_substances = $drug->dependency->substances; //получаем массив взаимосвязей ид_зависимости_препарата и ид_действ.вещества
        if(!empty($request->data)){ //проверка на наличие изменений
            foreach ($request->data as $id){
                $drug_drug_dep_substances = $drug_drug_dep_substances->where('substance_id', '!=', $id);
            }
            if(!empty($drug_drug_dep_substances)){
                foreach ($drug_drug_dep_substances as $drug_drug_dep_substance){
                    $drug_drug_dep_substance->delete();
                }
            }
            foreach ($request->data as $id){
                $drug_drug_dep_substances = $drug->dependency->substances;
                if(count($drug_drug_dep_substances->where('substance_id', $id)) == 0){
                    $this->drug_dep_substance->create(['drug_dep_id' => $drug->dependency->id, 'substance_id' => $id]);
                }
            }
        }else{ //при отсутсвии элементов, система очищает все взаимосвязи, так-как ни один элемент не выбран
            foreach ($drug_drug_dep_substances as $drug_drug_dep_substance){
                $drug_drug_dep_substance->delete();
            }
        }
        $substances = $this->getSubstances(DrugDepSubstance::where('drug_dep_id', $drug->dependency->id)->get()); //ручное получение данных. Так-как реляция возвращает старые данные!
        return response()->json([
            'drug_substances' => $substances['drug_substances'],
            'drug_substance_ids' => $substances['drug_substance_ids']
        ]);
    }

    protected function updateDrugTags(Request $request, $alias){
        $drug = Drug::where('alias', $alias)->first();
        $drug_drug_dep_tags = $drug->dependency->tags; //получаем массив взаимосвязей ид_зависимости_препарата и ид_действ.вещества
        if(!empty($request->data)){ //проверка на наличие изменений
            foreach ($request->data as $id){
                $drug_drug_dep_tags = $drug_drug_dep_tags->where('tag_id', '!=', $id);
            }
            if(!empty($drug_drug_dep_tags)){
                foreach ($drug_drug_dep_tags as $drug_drug_dep_tag){
                    $drug_drug_dep_tag->delete();
                }
            }
            foreach ($request->data as $id){
                $drug_drug_dep_tags = $drug->dependency->tags;
                if(count($drug_drug_dep_tags->where('tag_id', $id)) == 0){
                    $this->drug_dep_tag->create(['drug_dep_id' => $drug->dependency->id, 'tag_id' => $id]);
                }
            }
        }else{ //при отсутсвии элементов, система очищает все взаимосвязи, так-как ни один элемент не выбран
            foreach ($drug_drug_dep_tags as $drug_drug_dep_tag){
                $drug_drug_dep_tag->delete();
            }
        }
        $tags = $this->getTags(DrugDepTag::where('drug_dep_id', $drug->dependency->id)->get()); //ручное получение данных. Так-как реляция возвращает старые данные!
        return response()->json([
            'drug_tags' => $tags['drug_tags'],
            'drug_tag_ids' => $tags['drug_tag_ids']
        ]);
    }


    protected function updateDrugPharma(Request $request, $alias){
        $drug_form = Drug::where('alias', $alias)->first()->dependency->update(['pharma_id' => $request->data['id']]);
        return response()->json($drug_form);
    }

    protected function updateDrugFabricator(Request $request, $alias){
        $drug = Drug::where('alias', $alias)->first();
        $drug->dependency->update(['fabricator_id' => $request->data['id']]);
        $drug->dependency->update(['fabricator_location_id' => null]);
        $drug_fabricator_location = $drug->dependency->fabricator_location;
        return response()->json([
            'drug_dep_have_fabricator_locations' => ($drug->dependency->fabricator->locations->count() != 0),
        ]);
    }

    protected function updateDrugFabricatorLocation(Request $request, $alias){
        $drug_form = Drug::where('alias', $alias)->first()->dependency->update(['fabricator_location_id' => $request->data['id']]);
        return response()->json($drug_form);
    }

    protected function updateDrugATX(Request $request, $alias){
        $drug_form = Drug::where('alias', $alias)->first()->dependency->update(['atx_id' => $request->data['id']]);
        return response()->json($drug_form);
    }

    protected function updateDrugInname(Request $request, $alias){
        $drug_form = Drug::where('alias', $alias)->first()->dependency->update(['inname_id' => $request->data['id']]);
        return response()->json($drug_form);
    }



    private function getSubstances($drug_drug_dep_substance_ids){
        $drug_substances = [];
        $drug_substance_ids = [];
        if(!empty($drug_drug_dep_substance_ids)){
            foreach ($drug_drug_dep_substance_ids as $drug_drug_dep_substance_id){
                array_push($drug_substances, $drug_drug_dep_substance_id->substance);
                array_push($drug_substance_ids, $drug_drug_dep_substance_id->substance_id);
            }
        }
        return(['drug_substances' => $drug_substances, 'drug_substance_ids' => $drug_substance_ids]);
    }

    private function getTags($drug_drug_dep_tag_ids){
        $drug_tags = [];
        $drug_tag_ids = [];
        if(!empty($drug_drug_dep_tag_ids)){
            foreach ($drug_drug_dep_tag_ids as $drug_drug_dep_tag_id){
                array_push($drug_tags, $drug_drug_dep_tag_id->tag);
                array_push($drug_tag_ids, $drug_drug_dep_tag_id->tag_id);
            }
        }
        return(['drug_tags' => $drug_tags, 'drug_tag_ids' => $drug_tag_ids]);
    }

}
