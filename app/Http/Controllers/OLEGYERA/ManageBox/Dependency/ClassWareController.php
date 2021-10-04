<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Dependency;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\ClassWare;
use Fresh\Medpravda\Repositories\DependencyRepository;

class ClassWareController extends ApiController
{
    private $repository;

    public function __construct(ClassWare $classification)
    {
        $this->classification = $classification;
        $this->repository = new DependencyRepository(new ClassWare());
    }

    protected function search(Request $request){
        $class_wares = ClassWare::where('title', 'like', '%' . $request->search . '%')->orWhere('utitle', 'like', '%' . $request->search . '%')->orWhere('class', 'like', '%' . $request->search . '%')->orderBy('updated_at', 'desc')->take(30)->get();
        return response()->json($class_wares, 200);
    }

    protected function getClassWares(Request $request, $layer = null){
        $class_wares = $this->repository->search($request, true, 'desc', null, $request->filter, true, $layer);
        foreach ($class_wares as $class_ware){
            $class_ware->children = $class_ware->child($class_ware->id)->count();
        }
        return response()->json(['class_wares' => $class_wares, 'count' => ClassWare::count()], 200);
    }

    protected function getClassWare($class){
        return response()->json($this->repository->getAcrossAlias($class, false, true), 200);
    }

    protected function getPreparentClassWare($class){
        $rep_class_ware = $this->repository->getAcrossAlias($class, false, true);
        return response()->json($rep_class_ware->parent($rep_class_ware->parent_id), 200);
    }

    protected function createClassWare(Request $request){
        return response()->json($this->repository->create($request, 'classes'), 200);
    }

    protected function updateClassWare(Request $request){
        return response()->json($this->repository->update($request, false, 'classes', true), 200);
    }

    protected function deleteClassWare($id){
        return response()->json($this->clearDepClassWare($this->repository->getAcrossID($id)), 200);
    }

    protected function verifyCreatingTitles(Request $request){
        return $this->repository->errorResponse($request, false);
    }

    protected function verifyEditingTitles(Request $request, $class){
        return $this->repository->errorResponse($request, true, $class, true);
    }


    protected function getChildrenClassWares(Request $request, $class){
        return $this->getClassWares($request, $this->repository->getAcrossAlias($class, false, true)->id);
    }

    private function clearDepClassWare($classification){
        foreach ($classification->wares as $item){
            $item->class_id = null;
            $item->save();
        }
        $classification_childs = $this->classification->child($classification->id);
        foreach ($classification_childs as $item){
            $this->clearDepClassWare($item);
        }
        return $classification->delete();
    }


}
