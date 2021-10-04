<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Manual\Ware;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\WareNew;
use Fresh\Medpravda\WareSetting;
use Fresh\Medpravda\WareInstruction;
use Fresh\Medpravda\WareInstructionUa;
use Fresh\Medpravda\WareInstructionAdaptive;
use Fresh\Medpravda\WareInstructionAdaptiveUa;
use Fresh\Medpravda\WareDep;
use Fresh\Medpravda\Repositories\ManualRepository;

class WareController extends ApiController
{
    private $repository;

    public function __construct(WareSetting $setting, WareNew $ware, WareDep $ware_dep, WareInstruction $ware_instruction, WareInstructionUa $ware_instruction_u, WareInstructionAdaptive  $ware_instruction_adaptive, WareInstructionAdaptiveUa  $ware_instruction_adaptive_u)
    {
        $this->repository = new ManualRepository(new WareNew());

        $this->setting = $setting;
        $this->ware = $ware;
        $this->ware_dep = $ware_dep;
        $this->ware_i = $ware_instruction;
        $this->ware_i_u = $ware_instruction_u;
        $this->ware_i_a = $ware_instruction_adaptive;
        $this->ware_i_a_u = $ware_instruction_adaptive_u;
    }


    protected function getWares(Request $request){
        return response()->json(['wares' => $this->repository->search($request, true, 'desc', null, $request->filter), 'count' => WareNew::count()], 200);
    }

    protected function getWare($alias){
        return $this->repository->getAcrossAlias($alias);
    }

    protected function verifyWare(Request $request){
        $ware = WareNew::where($request->item_name, $request->item)->first();
        if(!empty($ware)){
            return response()->json('Мед. изделие с таким названием уже существует.', 409);
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

    protected function createWare(Request $request){
        $settings = $this->setting->create();
        $response = $this->ware->create([
            'title' => $request->title,
            'utitle' => $request->utitle,
            'alias' => $this->createAlias($request->title),
            'image_id' => 1,
            'setting_id' => $settings->id,
            'creator_id' => \Auth::user()->id
        ]);
        $ware_dep = $this->ware_dep->create([
            'ware_id' => $response->id,
        ]);

        $this->ware_i->create(['ware_id' => $response->id]);
        $this->ware_i_u->create(['ware_id' => $response->id]);
        $this->ware_i_a->create(['ware_id' => $response->id]);
        $this->ware_i_a_u->create(['ware_id' => $response->id]);


        return response()->json($response);
    }

    protected function updateWareImage(Request $request, $alias){
        $ware = WareNew::where('alias', $alias)->first();
        if(!empty($ware)){
            if(empty($request->id)){
                $ware->update(['image_id' => 1]);
            }else{
                $ware->update(['image_id' => $request->id[0]]);
            }
            return response()->json(['ware' => $ware, 'image' => $ware->image]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function deleteWare($id){
        $ware = WareNew::findOrFail($id);
        $ware->instruction->delete();
        $ware->instruction_adaptive->delete();
        $ware->instruction_ua->delete();
        $ware->instruction_adaptive_ua->delete();

        $ware->dependency->delete();
        $setting_mem = $ware->setting;
        $ware->delete();
        $setting_mem->delete();
        return response()->json(true, 200);
    }

    protected function updateWareTitle(Request $request, $alias){
        $ware = WareNew::where('alias', $alias)->first();
        if(!empty($ware)){
            if(empty(WareNew::where('title', $request->title)->where('alias', '!=', $alias)->first())){
                if(mb_strlen($request->title) <= 0){
                    return response()->json('Название не может быть пустым.', 422);
                }
                if(mb_strlen($request->title) >= 200){
                    return response()->json('Название не должно превышать 200 символов.', 422);
                }
                $ware->update(
                    [
                        'title' => $request->title,
                    ]
                );
                return response()->json(['ware' => $ware]);
            }else{
                return response()->json(['errors' => ['title' => ['Мед. изделие с таким названием уже существует.']]], 422);
            }
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateWareUTitle(Request $request, $alias){
        $ware = WareNew::where('alias', $alias)->first();
        if(!empty($ware)){
            if(empty(WareNew::where('utitle', $request->utitle)->where('alias', '!=', $alias)->first())){
                if(mb_strlen($request->utitle) <= 0){
                    return response()->json('Название не может быть пустым.', 422);
                }
                if(mb_strlen($request->utitle) >= 200){
                    return response()->json('Название не должно превышать 200 символов.', 422);
                }
                $ware->update(
                    [
                        'utitle' => $request->utitle,
                    ]
                );
                return response()->json(['ware' => $ware]);
            }else{
                return response()->json(['errors' => ['utitle' => ['Мед. изделие с таким названием уже существует.']]], 422);
            }
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateWareDosage(Request $request, $alias){
        $ware = WareNew::where('alias', $alias)->first();
        if(!empty($ware)){
            $dosage = $request->dosage;
            if(mb_strlen($request->dosage) >= 200){
                return response()->json(['errors' => ['dosage' => ['Дозировка должна быть меньше 200 символов.']]], 422);
            }
            $ware->update(
                [
                    'dosage' => $dosage,
                ]
            );
            return response()->json(['ware' => $ware]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateWareUDosage(Request $request, $alias){
        $ware = WareNew::where('alias', $alias)->first();
        if(!empty($ware)){
            $udosage = $request->udosage;
            if(mb_strlen($request->udosage) >= 200){
                return response()->json(['errors' => ['udosage' => ['Дозировка должна быть меньше 200 символов.']]], 422);
            }
            $ware->update(
                [
                    'udosage' => $udosage,
                ]
            );
            return response()->json(['ware' => $ware]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateWareRegistration(Request $request, $alias){
        $ware = WareNew::where('alias', $alias)->first();
        if(!empty($ware)){
            $registration = $request->registration;
            if(mb_strlen($request->registration) >= 200){
                return response()->json(['errors' => ['registration' => ['Регистрация должна быть меньше 200 символов.']]], 422);
            }
            $ware->update(
                [
                    'registration' => $registration,
                ]
            );
            return response()->json(['ware' => $ware]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateWareURegistration(Request $request, $alias){
        $ware = WareNew::where('alias', $alias)->first();
        if(!empty($ware)){
            $uregistration = $request->uregistration;
            if(mb_strlen($request->uregistration) >= 200){
                return response()->json(['errors' => ['uregistration' => ['Регистрация должна быть меньше 200 символов.']]], 422);
            }
            $ware->update(
                [
                    'uregistration' => $uregistration,
                ]
            );
            return response()->json(['ware' => $ware]);
        }
        else{
            return response()->json(false, 404);
        }
    }



    protected function SwitchWareSetting(Request $request, $alias){
        $ware = WareNew::where('alias', $alias)->first();
        if(!empty($ware)){
            $ware->setting->update([$request->category => $request->switch]);
            return response()->json(['setting' => $ware->setting]);
        }
        else{
            return response()->json(false, 404);
        }
    }
}


