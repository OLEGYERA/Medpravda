<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Manual\Cosmetic;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Fresh\Medpravda\CosmeticNew;
use Fresh\Medpravda\ClassCosmetic;
use Fresh\Medpravda\DepFabricatorLocation;
use Fresh\Medpravda\DepFabricator;
use Illuminate\Http\Request;

class CosmeticDependencyController extends ApiController
{

    protected function getCosmeticDependency(Request $request, $alias){
        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        if(!empty($cosmetic)){
            $cosmetic_fabricator = $cosmetic->dependency->fabricator;
            $cosmetic_fabricator_location = $cosmetic->dependency->fabricator_location;
            $cosmetic_classification = $cosmetic->dependency->classification;

            return response()->json([
                'cosmetic_fabricator' => $cosmetic_fabricator,
                'cosmetic_fabricator_location' => $cosmetic_fabricator_location,
                'cosmetic_classification' => $cosmetic_classification,
                'cosmetic_dep_have' => [
                    'fabricators' => (DepFabricator::count() != 0),
                    'fabricator_locations' => ((!empty($cosmetic_fabricator)) ? ($cosmetic_fabricator->locations->count() != 0) : false),
                    'cosmetic_classification' => (ClassCosmetic::count() != 0),
                ],

            ]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateCosmeticClassification(Request $request, $alias){
        $cosmetic_form = CosmeticNew::where('alias', $alias)->first()->dependency->update(['class_id' => $request->data['id']]);
        return response()->json($cosmetic_form);
    }

    protected function updateCosmeticFabricator(Request $request, $alias){
        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        $cosmetic->dependency->update(['fabricator_id' => $request->data['id']]);
        $cosmetic->dependency->update(['fabricator_location_id' => null]);
        $cosmetic_fabricator_location = $cosmetic->dependency->fabricator_location;
        return response()->json([
            'cosmetic_dep_have_fabricator_locations' => ($cosmetic->dependency->fabricator->locations->count() != 0),
        ]);
    }

    protected function updateCosmeticFabricatorLocation(Request $request, $alias){
        $cosmetic_form = CosmeticNew::where('alias', $alias)->first()->dependency->update(['fabricator_location_id' => $request->data['id']]);
        return response()->json($cosmetic_form);
    }
}
