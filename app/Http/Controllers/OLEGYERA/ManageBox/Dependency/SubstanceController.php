<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Dependency;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\DepSubstance;
use Fresh\Medpravda\Repositories\DependencyRepository;

class SubstanceController extends ApiController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new DependencyRepository(new DepSubstance());
    }


    protected function search(Request $request){
        return response()->json($this->repository->search($request, true,'desc', 30, null), 200);
    }

    protected function getSubstances(Request $request){
        return response()->json(['substances' => $this->repository->search($request, true, 'desc', null, $request->filter), 'count' => DepSubstance::count()], 200);
    }

    protected function getSubstance($alias){
        return response()->json($this->repository->getAcrossAlias($alias, true), 200);
    }

    protected function createSubstance(Request $request){
        return response()->json($this->repository->create($request, 'titles'), 200);
    }

    protected function updateSubstance(Request $request){
        return response()->json($this->repository->update($request, true, 'titles'), 200);
    }

    protected function deleteSubstance($id){
        foreach ($this->repository->getAcrossID($id)->drug_deps as $item){
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








}
