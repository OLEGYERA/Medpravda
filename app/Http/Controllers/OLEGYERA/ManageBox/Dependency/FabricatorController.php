<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Dependency;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\DepFabricator;
use Fresh\Medpravda\DepFabricatorLocation;
use Fresh\Medpravda\Repositories\DependencyRepository;

class FabricatorController extends ApiController
{
    private $repository;
    private $fabricator_location;

    public function __construct(DepFabricatorLocation $fabricator_location)
    {
        $this->repository = new DependencyRepository(new DepFabricator());
        $this->fabricator_location = $fabricator_location;
    }


    protected function search(Request $request){
        return response()->json($this->repository->search($request, true,'desc', 30, null), 200);
    }

    protected function getFabricators(Request $request){
        $fabricators = $this->repository->search($request, true, 'desc', null, $request->filter);
        foreach ($fabricators as $fabricator){
            $fabricator->location_count = $fabricator->locations->count();
        }
        return response()->json(['fabricators' => $fabricators, 'count' => DepFabricator::count()], 200);
    }

    protected function getFabricator($alias){
        return response()->json($this->repository->getAcrossAlias($alias, true), 200);
    }

    protected function createFabricator(Request $request){
        return response()->json($this->repository->create($request, 'titles'), 200);
    }

    protected function updateFabricator(Request $request){
        return response()->json($this->repository->update($request, true, 'titles'), 200);
    }

    protected function deleteFabricator($id){
        foreach ($this->repository->getAcrossID($id)->drugs as $item){
            $item->fabricator_id = null;
            $item->fabricator_location_id = null;
            $item->save();
        }
        foreach ($this->repository->getAcrossID($id)->locations as $item){
            $item->delete();
        }
        return response()->json($this->repository->delete($id), 200);
    }

    protected function verifyCreatingTitles(Request $request){
        return $this->repository->errorResponse($request, false);
    }

    protected function verifyEditingTitles(Request $request, $alias){
        return $this->repository->errorResponse($request, true, $alias);
    }



    //location //костыль

    protected function searchLocation(Request $request, $fabricator_alias){
        $this->repository = new DependencyRepository(DepFabricator::where('alias', $fabricator_alias)->first()->locations());
        return response()->json($this->repository->search($request, true,'desc', 30, null), 200);

//        $fabricators_locations = DepFabricatorLocation::where('title', 'like', '%' . $request->search . '%')->orWhere('utitle', 'like', '%' . $request->search . '%')->orWhere('alias', 'like', '%' . $request->search . '%')->orderBy('updated_at', 'desc')->take(30)->get();
//        $fabricator_locations = [];
//        foreach ($fabricators_locations as $fabricators_location){
//            if($fabricators_location->fabricator_id == $id){
//                array_push($fabricator_locations, $fabricators_location);
//            }
//        }
//        return response()->json($fabricator_locations, 200);
    }

    protected function getLocations(Request $request, $fabricator_alias){
        $this->repository = new DependencyRepository(DepFabricator::where('alias', $fabricator_alias)->first()->locations());
        return response()->json(['locations' => $this->repository->search($request, true, 'desc', null, $request->filter), 'count' => DepFabricator::where('alias', $fabricator_alias)->first()->locations->count()], 200);
    }

    protected function getLocation(Request $request, $fabricator_alias, $alias){
        $this->repository = new DependencyRepository(DepFabricator::where('alias', $fabricator_alias)->first()->locations());
        return response()->json($this->repository->getAcrossAlias($alias, true), 200);
    }
    protected function createFabricatorLocation(Request $request, $fabricator_alias){
        $this->repository = new DependencyRepository(new DepFabricatorLocation());
        return response()->json($this->repository->create($request, '4titles', DepFabricator::where('alias', $fabricator_alias)->first()->id), 200);
    }
    protected function updateFabricatorLocation(Request $request, $fabricator_alias){
        $this->repository = new DependencyRepository(DepFabricator::where('alias', $fabricator_alias)->first()->locations());
        return response()->json($this->repository->update($request, true, 'titles'), 200);
    }

    protected function deleteFabricatorLocation($fabricator_alias, $id){
        $this->repository = new DependencyRepository(DepFabricatorLocation::findOrFail($id));
        return response()->json($this->repository->delete($id), 200);
    }


    protected function verifyCreatingLocationTitles(Request $request,  $fabricator_alias){
        $this->repository = new DependencyRepository(DepFabricator::where('alias', $fabricator_alias)->first()->locations());
        return $this->repository->errorResponse($request, false);
    }

    protected function verifyEditingLocationTitles(Request $request, $fabricator_alias, $alias){
        $this->repository = new DependencyRepository(DepFabricator::where('alias', $fabricator_alias)->first()->locations());
        return $this->repository->errorResponse($request, true, $alias);
    }




}
