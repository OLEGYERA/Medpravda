<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Media;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\MediaCategory;
use Fresh\Medpravda\Repositories\MediaRepository;

class CategoryController extends ApiController
{
    private $repository;
    /**
     * @var MediaCategory
     */
    private $category;

    public function __construct(MediaCategory $category)
    {
        $this->category = $category;
        $this->repository = new MediaRepository(new MediaCategory());
    }

    protected function search(Request $request){
        $categories = MediaCategory::where('title', 'like', '%' . $request->search . '%')->orWhere('utitle', 'like', '%' . $request->search . '%')->orWhere('alias', 'like', '%' . $request->search . '%')->orderBy('updated_at', 'desc')->take(30)->get();
        return response()->json($categories, 200);
    }

    protected function getCategories(Request $request, $layer = null){
        $categories = $this->repository->search($request, true, 'desc', null, $request->filter, $layer);
        foreach ($categories as $category){
            $category->children = $category->child($category->id)->count();
        }
        return response()->json(['categories' => $categories, 'count' => MediaCategory::count()], 200);
    }

    protected function getCategory($alias){
        return response()->json($this->repository->getAcrossAlias($alias, true), 200);
    }

    protected function getPreparentCategory($alias){
        $rep_category = $this->repository->getAcrossAlias($alias, true);
        return response()->json($rep_category->parent($rep_category->parent_id), 200);
    }



    protected function createCategory(Request $request, $id){
        return response()->json($this->repository->create($request, 'categories', $id), 200);
    }





    protected function deleteCategory($id){
        return response()->json($this->clearMediaDepCategories($this->repository->getAcrossID($id)), 200);
    }

    protected function verifyCreatingTitles(Request $request){
        return $this->repository->errorResponse($request, false);
    }    protected function updateCategory(Request $request){
    return response()->json($this->repository->update($request, true, 'titles'), 200);
}

    protected function verifyEditingTitles(Request $request, $alias){
        return $this->repository->errorResponse($request, true, $alias, true);
    }


    protected function getChildrenCategories(Request $request, $alias){
        return $this->getCategories($request, $this->repository->getAcrossAlias($alias, true)->id);
    }

    private function clearMediaDepCategories($category){
//        foreach ($category->drugs as $item){
//            $item->category_id = null;
//            $item->save();
//        }
        $category_childs = $this->category->child($category->id);
        foreach ($category_childs as $item){
            $this->clearMediaDepCategories($item);
        }
        return $category->delete();
    }

}
