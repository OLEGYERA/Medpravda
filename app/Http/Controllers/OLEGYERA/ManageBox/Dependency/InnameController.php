<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Dependency;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\DepInname;
use Fresh\Medpravda\Repositories\DependencyRepository;

class InnameController extends ApiController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new DependencyRepository(new DepInname());
    }


    protected function search(Request $request){
        return response()->json($this->repository->search($request, false, 'desc', 30, null), 200);
    }

    protected function getInnames(Request $request){
        return response()->json(['innames' => $this->repository->search($request, false,'desc', null, $request->filter), 'count' => DepInname::count()], 200);
    }

    protected function getInname($alias){
        return response()->json($this->repository->getAcrossAlias($alias, false), 200);
    }

    protected function createInname(Request $request){
        return response()->json($this->repository->create($request, 'title'), 200);
    }

    protected function updateInname(Request $request){
        return response()->json($this->repository->update($request,false, 'title'), 200);
    }

    protected function deleteInname($id){
        foreach ($this->repository->getAcrossID($id)->drugs as $item){
            $item->inname_id = null;
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
