<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Dependency;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\DepTag;
use Fresh\Medpravda\Repositories\DependencyRepository;

class TagController extends ApiController
{

    private $repository;

    public function __construct()
    {
        $this->repository = new DependencyRepository(new DepTag());
    }

    protected function search(Request $request){
        return response()->json($this->repository->search($request, true,'desc', 30, null), 200);
    }

    public function getTags(Request $request){
        return response()->json(['tags' => $this->repository->search($request, true, 'desc', null, $request->filter), 'count' => DepTag::count()], 200);
    }

    public function getTag($alias){
        $res = $this->repository->getAcrossAlias($alias, true);
        return empty($res) ? response()->json(false, 404) : response()->json($res, 200);
    }

    public function getTagID($id){
        $res = DepTag::find($id);
        return empty($res) ? response()->json(false, 404) : response()->json($res, 200);
    }

    protected function createTag(Request $request){
        return response()->json($this->repository->create($request, 'titles'), 200);
    }

    protected function updateTag(Request $request, $alias){
        $finded_tag = $this->repository->getAcrossAlias($alias, true);
        if($request->item_name == 'title'){
            $finded_tag->update([$request->item_name => $request->item, 'alias' => $this->createAlias($request->item)]);
        }
        else{
            $finded_tag->update([$request->item_name => $request->item]);
        }
        return response()->json($finded_tag, 200);
    }

    protected function deleteTag($id){
        return response()->json($this->repository->delete($id), 200);
    }

    protected function verifyCreatingTitles(Request $request){
        return $this->repository->errorResponse($request, false);
    }

    protected function verifyEditingTitles(Request $request, $alias){
        return $this->repository->errorResponse($request, true, $alias);
    }
}
