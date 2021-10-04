<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Manual\Cosmetic;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\CosmeticNew;
use Fresh\Medpravda\CosmeticSetting;
use Fresh\Medpravda\CosmeticInstruction;
use Fresh\Medpravda\CosmeticInstructionUa;
use Fresh\Medpravda\CosmeticInstructionAdaptive;
use Fresh\Medpravda\CosmeticInstructionAdaptiveUa;
use Fresh\Medpravda\CosmeticDep;
use Fresh\Medpravda\Repositories\ManualRepository;

class CosmeticController extends ApiController
{
    private $repository;

    public function __construct(CosmeticSetting $setting, CosmeticNew $cosmetic, CosmeticDep $cosmetic_dep, CosmeticInstruction $cosmetic_instruction, CosmeticInstructionUa $cosmetic_instruction_u, CosmeticInstructionAdaptive  $cosmetic_instruction_adaptive, CosmeticInstructionAdaptiveUa  $cosmetic_instruction_adaptive_u)
    {
        $this->repository = new ManualRepository(new CosmeticNew());

        $this->setting = $setting;
        $this->cosmetic = $cosmetic;
        $this->cosmetic_dep = $cosmetic_dep;
        $this->cosmetic_i = $cosmetic_instruction;
        $this->cosmetic_i_u = $cosmetic_instruction_u;
        $this->cosmetic_i_a = $cosmetic_instruction_adaptive;
        $this->cosmetic_i_a_u = $cosmetic_instruction_adaptive_u;
    }


    protected function getCosmetics(Request $request){
        return response()->json(['cosmetics' => $this->repository->search($request, true, 'desc', null, $request->filter), 'count' => CosmeticNew::count()], 200);
    }

    protected function getCosmetic($alias){
        return $this->repository->getAcrossAlias($alias);
    }

    protected function verifyCosmetic(Request $request){
        $cosmetic = CosmeticNew::where($request->item_name, $request->item)->first();
        if(!empty($cosmetic)){
            return response()->json('Косм. средство с таким названием уже существует.', 409);
        }
        else{
            if(mb_strlen($request->item) <= 0){
                return response()->json('Название не может быть пустым.', 422);
            }
            if(mb_strlen($request->item) >= 200){
                return response()->json('Название не должно превышать 200 символов.', 422);
            }
            return response()->json(true, 200);
        }
    }

    protected function createCosmetic(Request $request){
        $settings = $this->setting->create();
        $response = $this->cosmetic->create([
            'title' => $request->title,
            'utitle' => $request->utitle,
            'alias' => $this->createAlias($request->title),
            'image_id' => 1,
            'setting_id' => $settings->id,
            'creator_id' => \Auth::user()->id
        ]);
        $cosmetic_dep = $this->cosmetic_dep->create([
            'cosmetic_id' => $response->id,
        ]);

        $this->cosmetic_i->create(['cosmetic_id' => $response->id]);
        $this->cosmetic_i_u->create(['cosmetic_id' => $response->id]);
        $this->cosmetic_i_a->create(['cosmetic_id' => $response->id]);
        $this->cosmetic_i_a_u->create(['cosmetic_id' => $response->id]);


        return response()->json($response);
    }

    protected function updateCosmeticImage(Request $request, $alias){
        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        if(!empty($cosmetic)){
            if(empty($request->id)){
                $cosmetic->update(['image_id' => 1]);
            }else{
                $cosmetic->update(['image_id' => $request->id[0]]);
            }
            return response()->json(['cosmetic' => $cosmetic, 'image' => $cosmetic->image]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function deleteCosmetic($id){
        $cosmetic = CosmeticNew::findOrFail($id);
        $cosmetic->instruction->delete();
        $cosmetic->instruction_adaptive->delete();
        $cosmetic->instruction_ua->delete();
        $cosmetic->instruction_adaptive_ua->delete();

        $cosmetic->dependency->delete();
        $setting_mem = $cosmetic->setting;
        $cosmetic->delete();
        $setting_mem->delete();
        return response()->json(true, 200);
    }

    protected function updateCosmeticTitle(Request $request, $alias){
        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        if(!empty($cosmetic)){
            if(empty(CosmeticNew::where('title', $request->title)->where('alias', '!=', $alias)->first())){
                if(mb_strlen($request->title) <= 0){
                    return response()->json('Название не может быть пустым.', 422);
                }
                if(mb_strlen($request->title) >= 200){
                    return response()->json('Название не должно превышать 200 символов.', 422);
                }
                $cosmetic->update(
                    [
                        'title' => $request->title,
                    ]
                );
                return response()->json(['cosmetic' => $cosmetic]);
            }else{
                return response()->json(['errors' => ['title' => ['Косм. средство с таким названием уже существует.']]], 422);
            }
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateCosmeticUTitle(Request $request, $alias){
        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        if(!empty($cosmetic)){
            if(empty(CosmeticNew::where('utitle', $request->utitle)->where('alias', '!=', $alias)->first())){
                if(mb_strlen($request->utitle) <= 0){
                    return response()->json('Название не может быть пустым.', 422);
                }
                if(mb_strlen($request->utitle) >= 200){
                    return response()->json('Название не должно превышать 200 символов.', 422);
                }
                $cosmetic->update(
                    [
                        'utitle' => $request->utitle,
                    ]
                );
                return response()->json(['cosmetic' => $cosmetic]);
            }else{
                return response()->json(['errors' => ['utitle' => ['Косм. средство с таким названием уже существует.']]], 422);
            }
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateCosmeticDosage(Request $request, $alias){
        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        if(!empty($cosmetic)){
            $dosage = $request->dosage;
            if(mb_strlen($request->dosage) >= 200){
                return response()->json(['errors' => ['dosage' => ['Дозировка должна быть меньше 200 символов.']]], 422);
            }
            $cosmetic->update(
                [
                    'dosage' => $dosage,
                ]
            );
            return response()->json(['cosmetic' => $cosmetic]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateCosmeticUDosage(Request $request, $alias){
        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        if(!empty($cosmetic)){
            $udosage = $request->udosage;
            if(mb_strlen($request->udosage) >= 200){
                return response()->json(['errors' => ['udosage' => ['Дозировка должна быть меньше 200 символов.']]], 422);
            }
            $cosmetic->update(
                [
                    'udosage' => $udosage,
                ]
            );
            return response()->json(['cosmetic' => $cosmetic]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateCosmeticRegistration(Request $request, $alias){
        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        if(!empty($cosmetic)){
            $registration = $request->registration;
            if(mb_strlen($request->registration) >= 200){
                return response()->json(['errors' => ['registration' => ['Регистрация должна быть меньше 200 символов.']]], 422);
            }
            $cosmetic->update(
                [
                    'registration' => $registration,
                ]
            );
            return response()->json(['cosmetic' => $cosmetic]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateCosmeticURegistration(Request $request, $alias){
        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        if(!empty($cosmetic)){
            $uregistration = $request->uregistration;
            if(mb_strlen($request->uregistration) >= 200){
                return response()->json(['errors' => ['uregistration' => ['Регистрация должна быть меньше 200 символов.']]], 422);
            }
            $cosmetic->update(
                [
                    'uregistration' => $uregistration,
                ]
            );
            return response()->json(['cosmetic' => $cosmetic]);
        }
        else{
            return response()->json(false, 404);
        }
    }



    protected function SwitchCosmeticSetting(Request $request, $alias){
        $cosmetic = CosmeticNew::where('alias', $alias)->first();
        if(!empty($cosmetic)){
            $cosmetic->setting->update([$request->category => $request->switch]);
            return response()->json(['setting' => $cosmetic->setting]);
        }
        else{
            return response()->json(false, 404);
        }
    }
}
