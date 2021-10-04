<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Administration;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Dirape\Token\Token;
use Fresh\Medpravda\Gallery;
use Fresh\Medpravda\User;
use Fresh\Medpravda\ManageRules;
use Fresh\Medpravda\EditorDiploms;
use Fresh\Medpravda\Editor;
use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Requests\GlobalUserRequest as GUR;

class ManagersController extends ApiController
{
    public function __construct(User $user, Editor $editor, EditorDiploms $diplom)
    {
        $this->user = $user;
        $this->editor = $editor;
        $this->diplom = $diplom;
    }



    protected function verifyManager(GUR $request){
         return response()->json(true, 200);
    }

    protected function createManager(Request $request){
        $token_login = (new Token())->Unique('users', 'login', 16);
        $token_pass = (new Token())->Unique('users', 'password', 16);
        $response = $this->user->create(
            [
                'email' => $request->email,
                'login' =>  $token_login,
                'password' =>  bcrypt($token_pass),
            ]
        );
        return response()->json($response);
    }

    protected function getManager($email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)){
            $rules = ManageRules::select('title', 'id as value')->orderBy('created_at', 'asc')->get();
            $editor = $manager->editor()->first();
            if(empty($editor)){
                $editor = ['active' => false];
            }
            return response()->json(['manager' => $manager, 'avatar' => $manager->avatar, 'rules' => $rules, 'editor' => $editor]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function getManagers(Request $request){
        if($request->search_email){
            $managers = User::where('email', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%');
        }else{
            $managers = User::where('email', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%');
        }
        if(!empty($request->filter)){
            $managers = $managers->paginate($request->filter);
        }else{
            $managers = $managers->paginate(15);
        }
        return response()->json(['managers' => $managers, 'count' => User::count()]);
    }

    protected function updateAvatar(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)){
            if(empty($request->id)){
                $manager->update(['avatar_id' => 1]);
            }else{
                $manager->update(['avatar_id' => $request->id[0]]);
            }
            return response()->json(['manager' => $manager, 'avatar' => $manager->avatar]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateRule(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)){
            if($manager->rule_id != $request->rule){
                $manager->update(['rule_id' => $request->rule]);
            }
            return response()->json(['manager' => $manager]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function switchEditor(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)){
            $editor = $manager->editor()->first();
            if(empty($editor)){
                $response = $this->editor->create(['active' => true, 'user_id' => $manager->id]);
                $this->diplom->create(['editor_id' => $response->id, 'diplom_id' => 1]);
            }else{
                if($editor->active != $request->editor){
                    $editor->update(['active' => $request->editor]);
                }
                $response = $editor;
            }
            return response()->json(['manager' => $manager, 'editor' => $response]);
        }
        else{
            return response()->json(false, 404);
        }
    }



    protected function updateEmail(GUR $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)) {
            if ($manager->email != $request->email) {
                $is_unique = User::where('email', $request->email)->first();
                if (!empty($is_unique)) {
                    return response()->json(['errors' => ['email' => ['E-mail адрес уже зарегистрирован.']]], 422);
                }
                $manager->update(['email' => $request->email]);
            }
            return response()->json(['manager' => $manager]);
        }
        else{
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }

    protected function updateLogin(GUR $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)) {
            if ($manager->login != $request->login) {
                $is_unique = User::where('login', $request->login)->first();
                if (!empty($is_unique)) {
                    return response()->json(['errors' => ['login' => ['Логин уже зарегистрирован.']]], 422);
                }
                $manager->update(['login' => $request->login]);
            }
            return response()->json(['manager' => $manager]);
        }
        else{
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }

    protected function updateSurName(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)) {
            if ($manager->surname != $request->surname) {
                $manager->update(['surname' => $request->surname]);
            }
            return response()->json(['manager' => $manager]);
        }
        else{
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }

    protected function updateName(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)) {
            $manager->update(['name' => $request->name]);
            return response()->json(['manager' => $manager]);
        }
        else{
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }


    protected function  updateMiddleName(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)) {
            if ($manager->surname != $request->surname) {
                $manager->update(['middle_name' => $request->middle_name]);
            }
            return response()->json(['manager' => $manager]);
        }
        else{
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }

    protected function updateCountry(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)) {
            if ($manager->surname != $request->surname) {
                $manager->update(['country' => $request->country]);
            }
            return response()->json(['manager' => $manager]);
        }
        else{
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }

    protected function updateCity(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)) {
            if ($manager->surname != $request->surname) {
                $manager->update(['city' => $request->city]);
            }
            return response()->json(['manager' => $manager]);
        }
        else{
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }









}
