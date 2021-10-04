<?php
namespace Fresh\Medpravda\Repositories;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;
use Illuminate\Support\Arr;


class MediaRepository extends ApiController {

    public $model;


    public function __construct($model)
    {
        $this->model = $model;
    }

    public function search($request, $is_alias, $order, $take, $paginate, $layer = null){
        $search_sql = $is_alias ? $this->model->where(function ($q) use ($request) {$q->where('title', 'like', $request->search . '%')->orWhere('alias', 'like', $request->search . '%');}) : $this->model->Where('title', 'like', $request->search . '%');
        if($layer !== false){
            $search_sql = $search_sql->where('parent_id', $layer);
        }
        $search_sql = $order ? $search_sql->orderBy('updated_at', $order) : $search_sql;
        $search_sql = $take ? $search_sql->take($take) : $search_sql;
        return $paginate ? $search_sql->paginate($paginate) : $search_sql->get();
    }

//    public function search($request, $is_alias, $order, $take, $paginate){
//        $search_sql = $is_alias ? $this->model->where(function ($q) use ($request) {$q->where('title', 'like', $request->search . '%')->orWhere('alias', 'like', $request->search . '%');}) : $this->model->Where('title', 'like', $request->search . '%');
//        $search_sql = $order ? $search_sql->orderBy('updated_at', $order) : $search_sql;
//        $search_sql = $take ? $search_sql->take($take) : $search_sql;
//        return $paginate ? $search_sql->paginate($paginate) : $search_sql->get();
//    }

//    public function getAcrossAlias($alias){
//        $this->model = $this->model->where('alias', $alias)->first();
//        return !empty($this->model) ?
//            response()->json([
//                'model' =>  $this->model->with('setting')->get(),
//                'dependency' => $this->model->dependency()->with('image')->get(),
//                'editor' => $this->model->dependency->editor()->with('avatar')->get(),
//            ], 200) : response()->json(false, 404);
//    }

    public function getAcrossAlias($alias, $is_alias){
        return $is_alias ? $this->model->where('alias', $alias)->first() : $this->model->where('title', $alias)->first();
    }

    public function getGroupAlias($alias){
        $this->model = $this->model->where('alias', $alias)->first();
        $this->model->setting;
        return !empty($this->model) ?
            response()->json([
                'model' =>  $this->model,
            ], 200) : response()->json(false, 404);
    }


    public function getArticleGroupAlias($alias){
        $this->model = $this->model->where('alias', $alias)->first();
        $structure = $this->model->dependency->structure;
        if($structure){
            $structure = $structure->setting;
        }
        return !empty($this->model) ?
            response()->json([
                'model' =>  $this->model,
                'structure_setting' => $structure,
                'image' =>  $this->model->dependency->image,
                'creator' =>  $this->model->dependency->creator,
                'creator_avatar' =>  $this->model->dependency->creator->avatar,
                'setting' =>  $this->model->setting,
            ], 200) : response()->json(false, 404);
    }

    public function create($request, $type, $id = null){
        return $this->model->create($this->CollectData($request, $type, $id));
    }

    public function update($request, $is_alias, $type){
        $this->model = $this->getAcrossAlias($request->alias, $is_alias);
        $this->model->update($this->CollectData($request, $type));
        return $this->model;
    }

    public function errorResponse($request, $dublicate, $alias = null, $alternate = false){
        if($alternate){
            $status = empty($this->model->where($request->item_name, $request->item)->where('class', '!=', $alias)->first());
        }
        else{
            $status = $dublicate ? empty($this->model->where($request->item_name, $request->item)->where('alias', '!=', $alias)->first()) : empty($this->model->where($request->item_name, $request->item)->first());
        }
        if($status){
            if(mb_strlen($request->item) <= 0){
                return response()->json('Название не может быть пустым.', 422);
            }
            if(mb_strlen($request->item) >= 200){
                return response()->json('Название не должно превышать 200 символов.', 422);
            }
            return response()->json(true, 200);
        }else{
            return response()->json('Название уже существует.', 422);
        }
    }

    public function getAcrossID($id){
        return $this->model->findOrFail($id);
    }

    private function CollectData($request, $type, $id = null)
    {
        switch ($type) {
            case 'title':
                return [
                    'title' => $request->title,
                ];
                break;
            case 'titles':
                return [
                    'title' => $request->title,
                    'utitle' => $request->utitle,
                    'alias' => $this->createAlias($request->title)
                ];
                break;
            case 'categories':
                return $id !== "null" ? [
                    'title' => $request->title,
                    'utitle' => $request->utitle,
                    'alias' => $this->createAlias($request->title),
                    'parent_id' => $id
                ] :
                    [
                        'title' => $request->title,
                        'utitle' => $request->utitle,
                        'alias' => $this->createAlias($request->title),
                    ];
                break;
        }
    }

}


