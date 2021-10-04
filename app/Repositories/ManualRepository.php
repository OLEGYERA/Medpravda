<?php
namespace Fresh\Medpravda\Repositories;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;


class ManualRepository extends ApiController
{

    public $model;


    public function __construct($model)
    {
        $this->model = $model;
    }

    public function search($request, $is_alias, $order, $take, $paginate){
        $search_sql = $is_alias ? $this->model->where(function ($q) use ($request) {$q->where('title', 'like', $request->search . '%')->orWhere('alias', 'like', $request->search . '%');}) : $this->model->Where('title', 'like', $request->search . '%');
        $search_sql = $order ? $search_sql->orderBy('updated_at', $order) : $search_sql;
        $search_sql = $take ? $search_sql->take($take) : $search_sql;
        return $paginate ? $search_sql->paginate($paginate) : $search_sql->get();
    }

    public function getAcrossAlias($alias){
        $this->model = $this->model->where('alias', $alias)->first();
        return !empty($this->model) ?
            response()->json([
            'model' =>  $this->model,
            'setting' => $this->model->setting,
            'image' => $this->model->image,
            'creator' => $this->model->creator,
            'creator_avatar' => $this->model->creator->avatar
        ], 200) : response()->json(false, 404);
    }


    public function delete($id){
        return $this->model->findOrFail($id)->delete();
    }

}
