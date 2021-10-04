<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Dependency;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\ClassCosmetic;
use Fresh\Medpravda\Repositories\DependencyRepository;

class ClassCosmeticController extends ApiController
{
    private $repository;

    public function __construct(ClassCosmetic $classification)
    {
        $this->classification = $classification;
        $this->repository = new DependencyRepository(new ClassCosmetic());
    }

    protected function search(Request $request){
        $class_cosmetics = ClassCosmetic::where('title', 'like', '%' . $request->search . '%')->orWhere('utitle', 'like', '%' . $request->search . '%')->orWhere('class', 'like', '%' . $request->search . '%')->orderBy('updated_at', 'desc')->take(30)->get();
        return response()->json($class_cosmetics, 200);
    }

    protected function getClassCosmetics(Request $request, $layer = null){
        $class_cosmetics = $this->repository->search($request, true, 'desc', null, $request->filter, true, $layer);
        foreach ($class_cosmetics as $class_cosmetic){
            $class_cosmetic->children = $class_cosmetic->child($class_cosmetic->id)->count();
        }
        return response()->json(['class_cosmetics' => $class_cosmetics, 'count' => ClassCosmetic::count()], 200);
    }

    protected function getClassCosmetic($class){
        return response()->json($this->repository->getAcrossAlias($class, false, true), 200);
    }

    protected function getPreparentClassCosmetic($class){
        $rep_class_cosmetic = $this->repository->getAcrossAlias($class, false, true);
        return response()->json($rep_class_cosmetic->parent($rep_class_cosmetic->parent_id), 200);
    }



    protected function createClassCosmetic(Request $request){
        return response()->json($this->repository->create($request, 'classes'), 200);
    }

    protected function updateClassCosmetic(Request $request){
        return response()->json($this->repository->update($request, false, 'classes', true), 200);
    }

    protected function deleteClassCosmetic($id){
        return response()->json($this->clearDepClassCosmetic($this->repository->getAcrossID($id)), 200);
    }

    protected function verifyCreatingTitles(Request $request){
        return $this->repository->errorResponse($request, false);
    }

    protected function verifyEditingTitles(Request $request, $class){
        return $this->repository->errorResponse($request, true, $class, true);
    }


    protected function getChildrenClassCosmetics(Request $request, $class){
        return $this->getClassCosmetics($request, $this->repository->getAcrossAlias($class, false, true)->id);
    }


    private function clearDepClassCosmetic($classification){
        foreach ($classification->cosmetics as $item){
            $item->class_id = null;
            $item->save();
        }
        $classification_childs = $this->classification->child($classification->id);
        foreach ($classification_childs as $item){
            $this->clearDepClassCosmetic($item);
        }
        return $classification->delete();
    }

}
