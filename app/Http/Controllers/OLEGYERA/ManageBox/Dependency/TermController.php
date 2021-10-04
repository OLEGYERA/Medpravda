<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Dependency;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\DepTerm;
use Fresh\Medpravda\Repositories\DependencyRepository;

class TermController extends ApiController
{

    private $repository;

    public function __construct()
    {
        $this->repository = new DependencyRepository(new DepTerm());
    }

    protected function search(Request $request){
        return response()->json($this->repository->search($request, true,'desc', 30, null), 200);
    }

    public function getTerms(Request $request){
        return response()->json(['terms' => $this->repository->search($request, true, 'desc', null, $request->filter), 'count' => DepTerm::count()], 200);
    }

    public function getTerm($alias){
        $res = $this->repository->getAcrossAlias($alias, true);
        return empty($res) ? response()->json(false, 404) : response()->json($res, 200);
    }

    public function getTermID($id){
        $res = DepTerm::find($id);
        return empty($res) ? response()->json(false, 404) : response()->json($res, 200);
    }

    protected function createTerm(Request $request){
        return response()->json($this->repository->create($request, 'titles'), 200);
    }

    protected function updateTerm(Request $request, $alias){
        $finded_term = $this->repository->getAcrossAlias($alias, true);
        if($request->item_name == 'title'){
            $finded_term->update([$request->item_name => $request->item, 'alias' => $this->createAlias($request->item)]);
        }
        else{
            $finded_term->update([$request->item_name => $request->item]);
        }
        return response()->json($finded_term, 200);
    }

    protected function deleteTerm($id){
        return response()->json($this->repository->delete($id), 200);
    }

    protected function verifyCreatingTitles(Request $request){
        return $this->repository->errorResponse($request, false);
    }

    protected function verifyEditingTitles(Request $request, $alias){
        return $this->repository->errorResponse($request, true, $alias);
    }
}
