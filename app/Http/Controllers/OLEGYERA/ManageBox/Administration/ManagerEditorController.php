<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Administration;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Fresh\Medpravda\Gallery;
use Fresh\Medpravda\User;
use Fresh\Medpravda\ManageRules;
use Fresh\Medpravda\Editor;
use Fresh\Medpravda\EditorDiploms;
use Fresh\Medpravda\EditorRank;
use Illuminate\Http\Request;

class ManagerEditorController extends ApiController
{
    public function __construct(User $user, Editor $editor, EditorDiploms $diplom)
    {
        $this->user = $user;
        $this->editor = $editor;
        $this->diplom = $diplom;
    }

    protected function getEditor($email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)){
            $editor = $manager->editor;
            $ranks = EditorRank::select('name as title', 'id as value')->orderBy('created_at', 'asc')->get();
            if(empty($editor)){
                $editor = $this->editor->create(['active' => true, 'user_id' => $manager->id]);
                $this->diplom->create(['editor_id' => $editor->id, 'diplom_id' => 1]);
            }
            $diploms = $editor->diploms;
            $photo_diploms = [];
            $photo_id_diploms = [];

            if(!empty($diploms)){
                foreach ($diploms as $diplom){
                    $photo = $diplom->photo()->first();
                    if(!empty($photo)){
                        array_push($photo_diploms, $photo);
                        array_push($photo_id_diploms, $photo->id);
                    }
                }
            }
            return response()->json(['manager' => $manager, 'editor' => $editor, 'ranks' => $ranks, 'diploms' => $photo_diploms, 'id_diploms' => $photo_id_diploms]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateEditorDiploms(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)){
            $editor = $manager->editor()->first();
            if(empty($editor)){
                return response()->json(false, 404);
            }

            $will_delete_diploms = $editor->diploms()->get();
            foreach ($will_delete_diploms as $delete_diplom){
                $delete_diplom->delete();
            }

            $photo_diploms = [];
            $photo_id_diploms = [];

            if(!empty($request->ids)){
                foreach ($request->ids as $id){
                    $diplom = $this->diplom->create(['editor_id' => $editor->id, 'diplom_id' => $id]);
                    $photo = $diplom->photo()->first();
                    if(!empty($photo)){
                        array_push($photo_diploms, $photo);
                        array_push($photo_id_diploms, $id);
                    }
                }
            }else{
                $diplom = $this->diplom->create(['editor_id' => $editor->id, 'diplom_id' => 1]);
                $photo = $diplom->photo()->first();
                array_push($photo_diploms, $photo);
                array_push($photo_id_diploms, 1);
            }
            return response()->json(['diploms' => $photo_diploms, 'id_diploms' => $photo_id_diploms]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateEditorSpecialty(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)) {
            $editor = $manager->editor()->first();
            if(empty($editor)){
                return response()->json(false, 404);
            }
            if ($editor->specialty != $request->specialty) {
                $editor->update(['specialty' => $request->specialty]);
            }
            return response()->json(['editor' => $editor]);
        }
        else{
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }

    protected function updateEditorSpecialization(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)) {
            $editor = $manager->editor()->first();
            if(empty($editor)){
                return response()->json(false, 404);
            }
            if ($editor->specialization != $request->specialization) {
                $editor->update(['specialization' => $request->specialization]);
            }
            return response()->json(['editor' => $editor]);
        }
        else{
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }

    protected function updateEditorRank(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)) {
            $editor = $manager->editor()->first();
            if(empty($editor)){
                return response()->json(false, 404);
            }
            if ($editor->rank_id != $request->rank) {
                $editor->update(['rank_id' => $request->rank]);
            }
            return response()->json(['editor' => $editor]);
        }
        else{
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }

    protected function updateEditorFacebook(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)) {
            $editor = $manager->editor()->first();
            if(empty($editor)){
                return response()->json(false, 404);
            }
            if ($editor->facebook != $request->facebook) {
                $editor->update(['facebook' => $request->facebook]);
            }
            return response()->json(['editor' => $editor]);
        }
        else{
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }

    protected function updateEditorInstagram(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)) {
            $editor = $manager->editor()->first();
            if(empty($editor)){
                return response()->json(false, 404);
            }
            if ($editor->instagram != $request->instagram) {
                $editor->update(['instagram' => $request->instagram]);
            }
            return response()->json(['editor' => $editor]);
        }
        else{
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }

    protected function updateEditorEducation(Request $request, $email){
        $manager = User::where('email', $email)->first();
        if(!empty($manager)) {
            $editor = $manager->editor()->first();
            if(empty($editor)){
                return response()->json(false, 404);
            }
            if ($editor->education != $request->education) {
                $editor->update(['education' => $request->education]);
            }
            return response()->json(['editor' => $editor]);
        }
        else{
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
    }















}
