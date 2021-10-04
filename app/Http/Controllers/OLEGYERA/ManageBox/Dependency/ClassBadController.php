<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Dependency;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\ClassBad;
use Fresh\Medpravda\Repositories\DependencyRepository;

class ClassBadController extends ApiController
{
    private $repository;

    public function __construct(ClassBad $classification)
    {
        $this->classification = $classification;
        $this->repository = new DependencyRepository(new ClassBad());
    }

    protected function search(Request $request){
        $class_bads = ClassBad::where('title', 'like', '%' . $request->search . '%')->orWhere('utitle', 'like', '%' . $request->search . '%')->orWhere('class', 'like', '%' . $request->search . '%')->orderBy('updated_at', 'desc')->take(30)->get();
        return response()->json($class_bads, 200);
    }

    protected function getClassBads(Request $request, $layer = null){
        $class_bads = $this->repository->search($request, true, 'desc', null, $request->filter, true, $layer);
        foreach ($class_bads as $class_bad){
            $class_bad->children = $class_bad->child($class_bad->id)->count();
        }
        return response()->json(['class_bads' => $class_bads, 'count' => ClassBad::count()], 200);
    }

    protected function getClassBad($class){
        return response()->json($this->repository->getAcrossAlias($class, false, true), 200);
    }

    protected function getPreparentClassBad($class){
        $rep_class_bad = $this->repository->getAcrossAlias($class, false, true);
        return response()->json($rep_class_bad->parent($rep_class_bad->parent_id), 200);
    }



    protected function createClassBad(Request $request){
        return response()->json($this->repository->create($request, 'classes'), 200);
    }

    protected function updateClassBad(Request $request){
        return response()->json($this->repository->update($request, false, 'classes', true), 200);
    }

    protected function deleteClassBad($id){
        return response()->json($this->clearDepClassBad($this->repository->getAcrossID($id)), 200);
    }

    protected function verifyCreatingTitles(Request $request){
        return $this->repository->errorResponse($request, false);
    }

    protected function verifyEditingTitles(Request $request, $class){
        return $this->repository->errorResponse($request, true, $class, true);
    }


    protected function getChildrenClassBads(Request $request, $class){
        return $this->getClassBads($request, $this->repository->getAcrossAlias($class, false, true)->id);
    }


    private function clearDepClassBad($classification){
        foreach ($classification->bads as $item){
            $item->class_id = null;
            $item->save();
        }
        $classification_childs = $this->classification->child($classification->id);
        foreach ($classification_childs as $item){
            $this->clearDepClassBad($item);
        }
        return $classification->delete();
    }

}
