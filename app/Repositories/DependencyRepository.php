<?php
namespace Fresh\Medpravda\Repositories;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;


class DependencyRepository extends ApiController
{

    public $model;


    public function __construct($model)
    {
        $this->model = $model;
    }

    public function search($request, $is_alias, $order, $take, $paginate, $alternate = false, $layer = null){
        if($alternate){
            $search_sql = $this->model->where(function ($q) use ($request) {$q->where('title', 'like', $request->search . '%')->orWhere('class', 'like', $request->search . '%');})->where('parent_id', $layer);
        }
        else{
            $search_sql = $is_alias ? $this->model->where(function ($q) use ($request) {$q->where('title', 'like', $request->search . '%')->orWhere('alias', 'like', $request->search . '%');}) : $this->model->Where('title', 'like', $request->search . '%');
        }
        $search_sql = $order ? $search_sql->orderBy('updated_at', $order) : $search_sql;
        $search_sql = $take ? $search_sql->take($take) : $search_sql;
        return $paginate ? $search_sql->paginate($paginate) : $search_sql->get();
    }

    public function getAcrossAlias($alias, $is_alias, $alternate = false){
        if($alternate){
            return $this->model->where('class', $alias)->first();
        }
        else{
            return $is_alias ? $this->model->where('alias', $alias)->first() : $this->model->where('title', $alias)->first();
        }
    }

    public function getAcrossID($id){
       return $this->model->findOrFail($id);
    }


    public function create($request, $type, $id = null){
        return $this->model->create($this->CollectData($request, $type, $id));
    }

    public function update($request, $is_alias, $type, $alternate = false){
        $this->model = $this->getAcrossAlias($request->alias, $is_alias, $alternate);
        $this->model->update($this->CollectData($request, $type));
        return $this->model;
    }

    public function delete($id){
        return $this->getAcrossID($id)->delete();
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


    private function CollectData($request, $type, $id = null){
        switch ($type){
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
            case '4titles':
                return [
                    'title' => $request->title,
                    'utitle' => $request->utitle,
                    'full_title' => $request->full_title,
                    'full_utitle' => $request->full_utitle,
                    'alias' => $this->createAlias($request->title),
                    'fabricator_id' => $id,
                ];
                break;
            case 'classes':
                return [
                    'title' => $request->title,
                    'utitle' => $request->utitle,
                    'class' => $request->class,
                    'parent_id' => $request->id == 'null' ? null : $request->id,
                ];
                break;
        }
    }



}
