<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Dependency;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\DepATX;
use Fresh\Medpravda\Repositories\DependencyRepository;

class ATXController extends ApiController
{
    private $repository;

    public function __construct(DepATX $atx)
    {
        $this->atx = $atx;
        $this->repository = new DependencyRepository(new DepATX());
    }

    protected function search(Request $request){
        $atxs = DepATX::where('title', 'like', '%' . $request->search . '%')->orWhere('utitle', 'like', '%' . $request->search . '%')->orWhere('class', 'like', '%' . $request->search . '%')->orderBy('updated_at', 'desc')->take(30)->get();
        return response()->json($atxs, 200);
    }

    protected function getATXs(Request $request, $layer = null){
        $atxs = $this->repository->search($request, true, 'desc', null, $request->filter, true, $layer);
        foreach ($atxs as $atx){
            $atx->children = $atx->child($atx->id)->count();
        }
        return response()->json(['atxs' => $atxs, 'count' => DepATX::count()], 200);
    }

    protected function getATX($class){
        return response()->json($this->repository->getAcrossAlias($class, false, true), 200);
    }

    protected function getPreparentATX($class){
        $rep_atx = $this->repository->getAcrossAlias($class, false, true);
        return response()->json($rep_atx->parent($rep_atx->parent_id), 200);
    }



    protected function createATX(Request $request){
        return response()->json($this->repository->create($request, 'classes'), 200);
    }

    protected function updateATX(Request $request){
        return response()->json($this->repository->update($request, false, 'classes', true), 200);
    }

    protected function deleteATX($id){
        return response()->json($this->clearDepAtx($this->repository->getAcrossID($id)), 200);
    }

    protected function verifyCreatingTitles(Request $request){
        return $this->repository->errorResponse($request, false);
    }

    protected function verifyEditingTitles(Request $request, $class){
        return $this->repository->errorResponse($request, true, $class, true);
    }


    protected function getChildrenATXs(Request $request, $class){
        return $this->getATXs($request, $this->repository->getAcrossAlias($class, false, true)->id);
    }

    private function clearDepAtx($atx){
        foreach ($atx->drugs as $item){
            $item->atx_id = null;
            $item->save();
        }
        $atx_childs = $this->atx->child($atx->id);
        foreach ($atx_childs as $item){
            $this->clearDepAtx($item);
        }
        return $atx->delete();
    }

}
