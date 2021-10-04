<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Manual\Ware;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Fresh\Medpravda\WareNew;
use Fresh\Medpravda\ClassWare;
use Fresh\Medpravda\DepFabricatorLocation;
use Fresh\Medpravda\DepFabricator;
use Illuminate\Http\Request;

class WareDependencyController extends ApiController
{

    protected function getWareDependency(Request $request, $alias){
        $ware = WareNew::where('alias', $alias)->first();
        if(!empty($ware)){
            $ware_fabricator = $ware->dependency->fabricator;
            $ware_fabricator_location = $ware->dependency->fabricator_location;
            $ware_classification = $ware->dependency->classification;

            return response()->json([
                'ware_fabricator' => $ware_fabricator,
                'ware_fabricator_location' => $ware_fabricator_location,
                'ware_classification' => $ware_classification,
                'ware_dep_have' => [
                    'fabricators' => (DepFabricator::count() != 0),
                    'fabricator_locations' => ((!empty($ware_fabricator)) ? ($ware_fabricator->locations->count() != 0) : false),
                    'ware_classification' => (ClassWare::count() != 0),
                ],

            ]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateWareClassification(Request $request, $alias){
        $ware_form = WareNew::where('alias', $alias)->first()->dependency->update(['class_id' => $request->data['id']]);
        return response()->json($ware_form);
    }

    protected function updateWareFabricator(Request $request, $alias){
        $ware = WareNew::where('alias', $alias)->first();
        $ware->dependency->update(['fabricator_id' => $request->data['id']]);
        $ware->dependency->update(['fabricator_location_id' => null]);
        $ware_fabricator_location = $ware->dependency->fabricator_location;
        return response()->json([
            'ware_dep_have_fabricator_locations' => ($ware->dependency->fabricator->locations->count() != 0),
        ]);
    }

    protected function updateWareFabricatorLocation(Request $request, $alias){
        $ware_form = WareNew::where('alias', $alias)->first()->dependency->update(['fabricator_location_id' => $request->data['id']]);
        return response()->json($ware_form);
    }
}
