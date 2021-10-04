<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Administration;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Auth;
use Fresh\Medpravda\ManageRules;
use Illuminate\Http\Request;

class RulesController extends ApiController
{
    public function __construct(ManageRules $rule)
    {
        $this->rule = $rule;
    }

    protected function verifyRule(Request $request){
        $rule = ManageRules::where('alias', $this->createAlias($request->item_title))->first();
        if(!empty($rule)){
            return response()->json('Роль с таким названием уже существует.', 409);
        }
        else{
            if(mb_strlen($request->item_title) <= 4){
                return response()->json('Название роли должно быть больше 4 символов. У вас: ' . mb_strlen($request->item_title), 411);
            }
            if(mb_strlen($request->item_title) >= 30){
                return response()->json('Название роли должно быть меньше 30 символов. У вас: ' . mb_strlen($request->item_title), 411);
            }
            return response()->json(true, 200);
        }
    }

    protected function createRule(Request $request){
        $response = $this->rule->create(
            [
                'title' => $request->title,
                'alias' => $this->createAlias($request->title)
            ]
        );
        return response()->json($response);
    }

    protected function updateRuleTitle(Request $request, $alias){
        $rule = ManageRules::where('alias', $alias)->first();
        if(!empty($rule)){
            if(empty(ManageRules::where('title', $request->title)->where('alias', '!=', $alias)->first())){
                if(mb_strlen($request->title) <= 4){
                    return response()->json('Название роли должно быть больше 4 символов. У вас: ' . mb_strlen($request->title), 411);
                }
                if(mb_strlen($request->title) >= 30){
                    return response()->json('Название роли должно быть меньше 30 символов. У вас: ' . mb_strlen($request->title), 411);
                }
                $rule->update(
                    [
                        'title' => $request->title,
                        'alias' => $this->createAlias($request->title)
                    ]
                );
                return response()->json($rule);
            }else{
                return response()->json('Роль с таким названием уже существует.', 409);
            }
        }
        else{
            return response()->json(false, 404);
        }
    }


    protected function getRule($alias){
        $rule = ManageRules::where('alias', $alias)->first();
        if(!empty($rule)){
            return response()->json($rule);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function getRules(Request $request){
        if($request->search_alias){
            $rules = ManageRules::where('alias', 'like', $request->search . '%');
        }else{
            $rules = ManageRules::where('title', 'like', $request->search . '%');
        }
        if(!empty($request->filter)){
            $rules = $rules->paginate($request->filter);
        }else{
            $rules = $rules->paginate(20);
        }
        return response()->json(['rules' => $rules, 'count' => ManageRules::count()]);
    }

    protected function updateRuleStatus(Request $request, $alias){
        $rule = ManageRules::where('alias', $alias)->first();
        if(!empty($rule)){
            $rule->update([$request->alias => $request->status]);
            return response()->json($rule);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function switchRuleCategory(Request $request, $alias){
        $rule = ManageRules::where('alias', $alias)->first();
        if(!empty($rule)){
            $rule->update([$request->category => $request->switch]);
            return response()->json($rule);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function deleteRule($id){
        $rule = ManageRules::findOrFail($id);
        if(!empty($rule)){
            $rule->delete();
            return response()->json(true, 200);
        }
        else{
            return response()->json(false, 404);
        }
    }





}
