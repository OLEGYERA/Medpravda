<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Dependency;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\DepForm;
use Fresh\Medpravda\Repositories\DependencyRepository;

class FormController extends ApiController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new DependencyRepository(new DepForm());
    }


    protected function search(Request $request){
        return response()->json($this->repository->search($request, true,'desc', 30, null), 200);
    }

    protected function getForms(Request $request){
        return response()->json(['forms' => $this->repository->search($request, true, 'desc', null, $request->filter), 'count' => DepForm::count()], 200);
    }

    protected function getForm($alias){
        return response()->json($this->repository->getAcrossAlias($alias, true), 200);
    }

    protected function createForm(Request $request){
        return response()->json($this->repository->create($request, 'titles'), 200);
    }

    protected function updateForm(Request $request){
        return response()->json($this->repository->update($request, true, 'titles'), 200);
    }

    protected function deleteForm($id){
        foreach ($this->repository->getAcrossID($id)->drugs as $item){
            $item->form_id = null;
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
