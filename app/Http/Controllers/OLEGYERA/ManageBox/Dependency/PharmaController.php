<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Dependency;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\DepPharma;
use Fresh\Medpravda\Repositories\DependencyRepository;

class PharmaController extends ApiController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new DependencyRepository(new DepPharma());
    }


    protected function search(Request $request){
        return response()->json($this->repository->search($request, true,'desc', 30, null), 200);
    }

    protected function getPharmas(Request $request){
        return response()->json(['pharmas' => $this->repository->search($request, true, 'desc', null, $request->filter), 'count' => DepPharma::count()], 200);
    }

    protected function getPharma($alias){
        return response()->json($this->repository->getAcrossAlias($alias, true), 200);
    }

    protected function createPharma(Request $request){
        return response()->json($this->repository->create($request, 'titles'), 200);
    }

    protected function updatePharma(Request $request){
        return response()->json($this->repository->update($request, true, 'titles'), 200);
    }

    protected function deletePharma($id){
        foreach ($this->repository->getAcrossID($id)->drugs as $item){
            $item->pharma_id = null;
            $item->save();
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
